<?php

/**
 * expenses actions.
 *
 * @package    siwapp
 * @subpackage expenses
 * @author     Siwapp Team
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class expensesActions extends sfActions
{
  public function preExecute()
  {
    $this->currency = $this->getUser()->getAttribute('currency');
    $this->culture  = $this->getUser()->getCulture();
  }
  
  private function getExpense(sfWebRequest $request)
  {
    $this->forward404Unless($invoice = Doctrine::getTable('Expense')->find($request->getParameter('id')),
      sprintf('Object invoice does not exist with id %s', $request->getParameter('id')));
      
    return $invoice;
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $namespace  = $request->getParameter('searchNamespace');
    $search     = $this->getUser()->getAttribute('search', null, $namespace);
    $sort       = $this->getUser()->getAttribute('sort', array('issue_date', 'desc'), $namespace);
    $page       = $this->getUser()->getAttribute('page', 1, $namespace);
    $maxResults = $this->getUser()->getPaginationMaxResults();
    
    $q = ExpenseQuery::create()->Where('company_id = ?', sfContext::getInstance()->getUser()->getAttribute('company_id'))->search($search)->orderBy("$sort[0] $sort[1], number $sort[1]");
    // totals
    $this->gross = $q->total('gross_amount');
    $this->due   = $q->total('due_amount');
    
    $this->pager = new sfDoctrinePager('Expense', $maxResults);
    $this->pager->setQuery($q);
    $this->pager->setPage($page);
    $this->pager->init();
    
    // this is for the redirect of the payments forms
    $this->getUser()->setAttribute('module', $request->getParameter('module'));
    $this->getUser()->setAttribute('page', $request->getParameter('page'));
    
    $this->sort = $sort;
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->invoice = $this->getExpense($request);
  }

  public function executeNew(sfWebRequest $request)
  {
    $i18n = $this->getContext()->getI18N();
    $expense = new Expense();

    $this->invoiceForm = new ExpenseForm($expense, array('culture'=>$this->culture));
    $this->title       = $i18n->__('New Expense');
    $this->action      = 'create';
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->invoiceForm = new ExpenseForm(null, array('culture' => $this->culture));
    $this->title = $this->getContext()->getI18N()->__('New Expense');
    $this->action = 'create';

    $this->processForm($request, $this->invoiceForm);
    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $invoice = $this->getExpense($request);

    // if the invoice is not a draft, forward to the show action unless the referer is edit or show
    if($invoice->status != Expense::DRAFT)
    {
      $comes_from_edit = substr_count($request->getReferer(), '/edit') > 0 ? true : false;
      $this->forwardIf(!$comes_from_edit, 'expenses', 'show');
    }
    // save the original draft state
    $this->db_draft = $invoice->draft;
    // set draft=0 by default always
    $invoice->setDraft(false);
    $this->invoiceForm = new ExpenseForm($invoice, array('culture'=>$this->culture));
    
    $i18n = $this->getContext()->getI18N();
    $this->title = $i18n->__('Edit Expense').' '.$invoice;
    $this->action = 'update';
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $invoice_params = $request->getParameter('expense');
    $request->setParameter('id', $invoice_params['id']);
    $this->forward404Unless($request->isMethod('post'));
    $invoice = $this->getExpense($request);
    $this->invoiceForm = new ExpenseForm($invoice, array('culture'=>$this->culture));
    $this->processForm($request, $this->invoiceForm);
    
    $i18n = $this->getContext()->getI18N();
    $this->title = $i18n->__('Edit Expense');
    $this->action = 'update';
    
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $invoice = $this->getExpense($request);
    $invoice->delete();

    $this->redirect('expenses/index');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $i18n = $this->getContext()->getI18N();
    $invoice_params = $request->getParameter($form->getName());
    $form->bind($invoice_params, $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $invoice = $form->save();
      $invoice->setDraft((int) $invoice_params['draft']);
      $invoice->save();
      // update totals with saved values
      $invoice->refresh(true)->setAmounts()->save();

      $this->getUser()->info($i18n->__('The expense was successfully saved.'));
      $this->redirect('expenses/edit?id='.$invoice->id);
    }
    else
    {
      $this->getUser()->error($i18n->__('The expense has not been saved due to some errors.'));
    }
  }
  
  /**
   * batch actions
   *
   * @return void
   **/
  public function executeExport(sfWebRequest $request)
  {
      $n = 0;
      $objPHPExcel = new sfPhpExcel();
      $objPHPExcel->setActiveSheetIndex(0);
      //Generate Headers.
      $objPHPExcel->getActiveSheet()->setTitle('GASTOS');
      $objPHPExcel->getActiveSheet()->setCellValue('A1', 'FECHA');
      $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NUM. FACTURA');
      $objPHPExcel->getActiveSheet()->setCellValue('C1', 'PROVEEDOR');
      $objPHPExcel->getActiveSheet()->setCellValue('D1', 'TIPO GASTOS');
      $objPHPExcel->getActiveSheet()->setCellValue('E1', 'BASE');
      $objPHPExcel->getActiveSheet()->setCellValue('F1', 'IMPUESTOS');
      $objPHPExcel->getActiveSheet()->setCellValue('G1', 'TOTAL');
      foreach($request->getParameter('ids', array()) as $id)
      {
        if($invoice = Doctrine::getTable('Expense')->find($id))
        {
              #foreach ($invoice->getGrupedTaxes() as $expenseType => $value) 
              foreach ($invoice->getGrupedExpenseTypes() as $expenseType => $value) 
              {
                  $objPHPExcel->getActiveSheet()->setCellValue('A'. ($n+2),date('d/m/Y',strtotime($invoice->getIssueDate()))); //FECHA
                  $objPHPExcel->getActiveSheet()->setCellValue('B'. ($n+2), $invoice->getSupplierReference().''); //NUM. FACTURA
                  $objPHPExcel->getActiveSheet()->setCellValue('C'. ($n+2), $invoice->getSupplierName()); //PROVEEDOR
                  $objPHPExcel->getActiveSheet()->setCellValue('D'. ($n+2), $expenseType); //TIPO GASTO
                  $objPHPExcel->getActiveSheet()->setCellValue('E'. ($n+2), $value['base']); //BASE 
                  $objPHPExcel->getActiveSheet()->setCellValue('F'. ($n+2), $value['tax']); //%IVA
                  $objPHPExcel->getActiveSheet()->setCellValue('G'. ($n+2), $value['total']); //TOTAL
                  $n++;
              }
        }
      }

    $this->setLayout(false);
    $response = $this->getContext()->getResponse();
    $response->clearHttpHeaders();
    $response->setHttpHeader('Content-Type', 'application/vnd.ms-excel;charset=utf-8');
    $response->setHttpHeader('Content-Disposition:', 'attachment;filename=export.xls'); 

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    ob_start();
    $objWriter->save('php://output');
    $response->setContent(ob_get_clean());
    return sfView::NONE;
  }

  /**
   * batch actions
   *
   * @return void
   **/
  public function executeBatch(sfWebRequest $request)
  {
    $i18n = $this->getContext()->getI18N();
    $form = new sfForm();
    $form->bind(array('_csrf_token' => $request->getParameter('_csrf_token')));
    
    if($form->isValid() || $this->getContext()->getConfiguration()->getEnvironment() == 'test')
    {
      $n = 0;
      foreach($request->getParameter('ids', array()) as $id)
      {
        if($invoice = Doctrine::getTable('Expense')->find($id))
        {
          switch($request->getParameter('batch_action'))
          {
            case 'delete':
              if ($invoice->delete()) $n++;
              break;
          }
        }
      }
      switch($request->getParameter('batch_action'))
      {
        case 'delete':
          $this->getUser()->info(sprintf($i18n->__('%d expenses were successfully deleted.'), $n));
          break;
      }
    }

    $this->redirect('@expenses');
  }
  
}
