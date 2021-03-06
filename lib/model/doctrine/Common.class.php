<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Common extends BaseCommon
{
  public function __get($name)
  {
    if($name == 'tax_details')
    {
      return $this->getGrupedTaxes(false);
    }
    return parent::__get($name);
  }

  private $decimals = null;
  public function getRoundedAmount($concept = 'gross')
  {
    if(!in_array($concept,array('base','discount','net','tax','gross')))
    {
      return 0;
    }
    return Tools::getRounded(parent::_get($concept.'_amount'),$this->getDecimals());
  }
  private function getDecimals()
  {
    if(!$this->decimals)
    {
      $this->decimals = PropertyTable::get('currency_decimals',2);
    }
    return $this->decimals;
  }
  public function calculate($field,$rounded = false)
  {
    $val = 0;

    switch($field)
    {
      case 'paid_amount':
        foreach ($this->getPayments() as $payment)
        {
          $val += $payment->getAmount();
        }
        break;

      default:
        foreach ($this->getItems() as $item)
        {
          $method = 'get'.sfInflector::camelize($field);
          $val += $item->$method();
        }
        break;
    }

    if($rounded)
    {
      return round($val,$this->getDecimals());
    }

    return $val;
  }

  public function preSave($event)
  {
    $this->checkStatus();
    // check for customer/supplier matching
    if($this->getType() != 'Expense')
    {
      Doctrine::getTable('Customer')->updateCustomer($this);
    }
    else
    {
      Doctrine::getTable('Supplier')->updateSupplier($this);
    }
  }

  public function postDelete($event)
  {
      //    $this->Items->delete();


/*  and it�s over. clients shouldn�t be deleted after their last invoice.
/*  see http://dev.markhaus.com/projects/siwapp/ticket/503
*/
  }

  public function setAmounts()
  {
    $this->setBaseAmount($this->calculate('base_amount'));
    $lines_discount = $this->calculate('discount_amount');
    $global_discount = 0.0;
    $discount = $this->getDiscount();
    if($discount != null && $discount > 0.0) {
        $global_discount = round($this->getBaseAmount() * ( $discount / 100.0), 2);
    }
    $this->setDiscountAmount($lines_discount + $global_discount);
    $this->setNetAmount($this->getBaseAmount() - $this->getDiscountAmount());
    $this->setTaxAmount($this->calculate('tax_amount'));
    $tax_ammount = 0.0;
    foreach($this->getTaxDetails() as $tax_value){
        $tax_ammount +=$tax_value;
    }
    $rounded_gross = round(
                           $this->getNetAmount() + $tax_ammount,
                           PropertyTable::get('currency_decimals', 2)
                           );
    $this->setGrossAmount($rounded_gross);

    return $this;
  }

  public function getTaxDetails()
  {
    $result = array();
    foreach ($this->getItems() as $item)
    {
      foreach ( $item->getTaxesDetail() as $name => $ammount)
      {
        if (isset($result[$name]))
        {
          $result[$name] += $ammount;
        }
        else
        {
          $result[$name] = $ammount;
        }
      }
    }
    //Round the items so we get no diferencies.
    foreach ( $result as $key => $val)
    {
      $result[$key] = round($val,$this->getDecimals());
    }

    return $result;
  }

  public function getBasesDetails()
  {
    $result = array();
    foreach ($this->getItems() as $item)
    {
      foreach ( $item->getBaseDetail() as $name => $ammount)
      {
        if (isset($result[$name]))
        {
          $result[$name] += $ammount;
        }
        else
        {
          $result[$name] = $ammount;
        }
      }
    }
    //Round the items so we get no diferencies.
    foreach ( $result as $key => $val)
    {
      $result[$key] = round($val,$this->getDecimals());
    }

    return $result;
  }

  /**
   * Gets tax details of the invoice grupped by tax type.
   * @author: Sergi Almacellas Abellana <sergi.almacellas@btactic.com>
   * @return Array
   */
  public function getGrupedTaxes($ret = true)
  {
    $result = array();
    $bases = $this->getBasesDetails();
    foreach ($this->getTaxDetails() as $name => $value)
    {
        $taxvalue = Doctrine::getTable('Tax')->createQuery('t')
           ->where('t.name = ?', $name)->fetchOne()->getValue();
        //Retenci�n
        if($ret && $taxvalue < 0) {
            $retencion = $value;
            $baseRetencion = $bases[$name];
            $ammount= 0;$base = 0;
            $retencionValue= $taxvalue;
        }
        else {
            $ammount=$value;
            $base = $bases[$name];
            $retencion = 0;$baseRetencion = 0;
            $retencionValue = 0;
        }
        if (isset($result[$name]))
        {
          $result[$name]['tax'] += $ammount;
          $result[$name]['base'] += $base;
          $result[$name]['total'] += ($ammount+$base+$retencion);
          $result[$name]['retencion'] += $retencion;
          $result[$name]['base_retencion'] += $baseRetencion;
          if($retencionValue!=0)
              $result[$name]['retencion_value'] = $retencionValue;
        }
        else
        {
          $result[$name] = array(
            'tax' => $ammount,
            'base' => $base,
            'total' => ($ammount+$base+$retencion),
            'retencion' => $retencion,
            'base_retencion' => $baseRetencion,
            'tax_value' => Doctrine::getTable('Tax')->createQuery('t')
               ->where('t.name = ?', $name)->fetchOne()->getValue(),
            'retencion_value' => $retencionValue,
          );
        }
    }
    //Round the items so we get no diferencies.
    foreach ( $result as $key => $val)
    {
      $result[$key]['tax'] = round($val['tax'],$this->getDecimals());
      $result[$key]['base'] = round($val['base'],$this->getDecimals());
      $result[$key]['total'] = round($val['total'],$this->getDecimals());
    }

    return $result;
  }

   /**
   * Gets an Invoice by the Estimate ID
   * @author: Sergi Almacellas Abellana <sergi.almacellas@btactic.com>
   * @return Invoice
   */
   public function findByEstimate($estimateID)
   {
      $i = Doctrine_Query::create()
            ->from('Invoice i')
            ->where("i.estimate_id = ?", $estimateID)
            ->limit(1)
            ->execute();
      return $i[0];
   }

  public function getRelatedInvoice()
  {
      $invoice = new Common();
      return $invoice->findByEstimate($this->getId());
  }
}
