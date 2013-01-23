<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Customer extends BaseCustomer
{
  protected $calculated = false;
  protected $gross_amount, $paid_amount;
  
  /**
   * sets the customer data from a Common object
   *
   * @return this
   * @author Enrique Martinez
   **/
  public function setDataFrom($obj)
  {
    $this->setCompany($obj->getCompany());
    $this->setName($obj->getCustomerName());
    $this->setNameSlug(CustomerTable::slugify($obj->getCustomerName()));
    $this->setIdentification($obj->getCustomerIdentification());
    $this->setPhone($obj->getCustomerPhone());
    $this->setFax($obj->getCustomerFax());
    $this->setEmail($obj->getCustomerEmail());
    $this->setContactPerson($obj->getContactPerson());
    $this->setInvoicingAddress($obj->getInvoicingAddress());
    $this->setInvoicingCity($obj->getInvoicingCity());
    $this->setInvoicingPostalcode($obj->getInvoicingPostalcode());
    $this->setInvoicingState($obj->getInvoicingState());
    $this->setInvoicingCountry($obj->getInvoicingCountry());
    $this->setShippingAddress($obj->getShippingAddress());
    $this->setShippingCity($obj->getShippingCity());
    $this->setShippingPostalcode($obj->getShippingPostalcode());
    $this->setShippingState($obj->getShippingState());
    $this->setShippingCountry($obj->getShippingCountry());
    
    return $this;
  }
 
  /**
   * get customer gross amount
   *
   * @return double
   * @author Enrique Martinez
   **/
  public function getGrossAmount($date_range = null) {
    $this->calculateAmounts($date_range);
    return $this->gross_amount;
  }
  
  public function getPaidAmount($date_range = null) {
    $this->calculateAmounts($date_range);
    return $this->paid_amount;
  }
  
  public function getDueAmount($date_range = null)
  {
    return $this->getGrossAmount($date_range) - $this->getPaidAmount($date_range);
  }
  
  /**
   * calculate customer gross, paid amount of non draft invoices
   *
   * @return none
   * @author Marc Montañés
   **/
  protected function calculateAmounts ($date_range = null) {
    if (!$this->calculated) {
      $this->gross_amount = 0;
      $this->paid_amount = 0;
      $invoices = $this->getTable()->getNonDraftInvoices($this->getId(),$date_range);
      
      foreach ($invoices as $invoice) {
        $this->gross_amount += $invoice->getGrossAmount();
        $this->paid_amount += $invoice->getPaidAmount();
      }
      $this->calculated = true;
    }
  }

  /**
   * avoid deleting if an invoice with this customer
   * exists
   *
   * @return none
   * @author JoeZ
   **/
  public function delete(Doctrine_Connection $conn = null)
  {
    $q1 = Doctrine_Query::create()
      ->from('Common c')
      ->where('c.customer_id = ?',$this->id);
    if($q1->count() > 0)
    {
      throw new siwappIntegrityException('The customer has invoices',1);
      return false;
    }
    return parent::delete($conn);
  }

  /** 
   * takes care of sluggifying fields before saving
   */
  public function preSave($event)
  {
    if(!$this->name_slug)
    {
      $this->name_slug = CustomerTable::slugify($this->name);
    }
    parent::preSave($event);
  }
}
