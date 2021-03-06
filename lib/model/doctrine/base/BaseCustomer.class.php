<?php

/**
 * BaseCustomer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $company_id
 * @property string $name
 * @property string $name_slug
 * @property string $identification
 * @property string $email
 * @property string $contact_person
 * @property string $invoicing_address
 * @property string $invoicing_postalcode
 * @property string $invoicing_city
 * @property string $invoicing_state
 * @property string $invoicing_country
 * @property string $shipping_address
 * @property string $shipping_postalcode
 * @property string $shipping_city
 * @property string $shipping_state
 * @property string $shipping_country
 * @property string $website
 * @property string $phone
 * @property string $mobile
 * @property string $fax
 * @property clob $comments
 * @property string $bic
 * @property string $iban
 * @property string $entity
 * @property string $office
 * @property string $control_digit
 * @property string $account
 * @property integer $payment_type_id
 * @property decimal $discount
 * @property Company $Company
 * @property PaymentType $PaymentType
 * @property Doctrine_Collection $Commons
 * 
 * @method integer             getCompanyId()            Returns the current record's "company_id" value
 * @method string              getName()                 Returns the current record's "name" value
 * @method string              getNameSlug()             Returns the current record's "name_slug" value
 * @method string              getIdentification()       Returns the current record's "identification" value
 * @method string              getEmail()                Returns the current record's "email" value
 * @method string              getContactPerson()        Returns the current record's "contact_person" value
 * @method string              getInvoicingAddress()     Returns the current record's "invoicing_address" value
 * @method string              getInvoicingPostalcode()  Returns the current record's "invoicing_postalcode" value
 * @method string              getInvoicingCity()        Returns the current record's "invoicing_city" value
 * @method string              getInvoicingState()       Returns the current record's "invoicing_state" value
 * @method string              getInvoicingCountry()     Returns the current record's "invoicing_country" value
 * @method string              getShippingAddress()      Returns the current record's "shipping_address" value
 * @method string              getShippingPostalcode()   Returns the current record's "shipping_postalcode" value
 * @method string              getShippingCity()         Returns the current record's "shipping_city" value
 * @method string              getShippingState()        Returns the current record's "shipping_state" value
 * @method string              getShippingCountry()      Returns the current record's "shipping_country" value
 * @method string              getWebsite()              Returns the current record's "website" value
 * @method string              getPhone()                Returns the current record's "phone" value
 * @method string              getMobile()               Returns the current record's "mobile" value
 * @method string              getFax()                  Returns the current record's "fax" value
 * @method clob                getComments()             Returns the current record's "comments" value
 * @method string              getBic()                  Returns the current record's "bic" value
 * @method string              getIban()                 Returns the current record's "iban" value
 * @method string              getEntity()               Returns the current record's "entity" value
 * @method string              getOffice()               Returns the current record's "office" value
 * @method string              getControlDigit()         Returns the current record's "control_digit" value
 * @method string              getAccount()              Returns the current record's "account" value
 * @method integer             getPaymentTypeId()        Returns the current record's "payment_type_id" value
 * @method decimal             getDiscount()             Returns the current record's "discount" value
 * @method Company             getCompany()              Returns the current record's "Company" value
 * @method PaymentType         getPaymentType()          Returns the current record's "PaymentType" value
 * @method Doctrine_Collection getCommons()              Returns the current record's "Commons" collection
 * @method Customer            setCompanyId()            Sets the current record's "company_id" value
 * @method Customer            setName()                 Sets the current record's "name" value
 * @method Customer            setNameSlug()             Sets the current record's "name_slug" value
 * @method Customer            setIdentification()       Sets the current record's "identification" value
 * @method Customer            setEmail()                Sets the current record's "email" value
 * @method Customer            setContactPerson()        Sets the current record's "contact_person" value
 * @method Customer            setInvoicingAddress()     Sets the current record's "invoicing_address" value
 * @method Customer            setInvoicingPostalcode()  Sets the current record's "invoicing_postalcode" value
 * @method Customer            setInvoicingCity()        Sets the current record's "invoicing_city" value
 * @method Customer            setInvoicingState()       Sets the current record's "invoicing_state" value
 * @method Customer            setInvoicingCountry()     Sets the current record's "invoicing_country" value
 * @method Customer            setShippingAddress()      Sets the current record's "shipping_address" value
 * @method Customer            setShippingPostalcode()   Sets the current record's "shipping_postalcode" value
 * @method Customer            setShippingCity()         Sets the current record's "shipping_city" value
 * @method Customer            setShippingState()        Sets the current record's "shipping_state" value
 * @method Customer            setShippingCountry()      Sets the current record's "shipping_country" value
 * @method Customer            setWebsite()              Sets the current record's "website" value
 * @method Customer            setPhone()                Sets the current record's "phone" value
 * @method Customer            setMobile()               Sets the current record's "mobile" value
 * @method Customer            setFax()                  Sets the current record's "fax" value
 * @method Customer            setComments()             Sets the current record's "comments" value
 * @method Customer            setBic()                  Sets the current record's "bic" value
 * @method Customer            setIban()                 Sets the current record's "iban" value
 * @method Customer            setEntity()               Sets the current record's "entity" value
 * @method Customer            setOffice()               Sets the current record's "office" value
 * @method Customer            setControlDigit()         Sets the current record's "control_digit" value
 * @method Customer            setAccount()              Sets the current record's "account" value
 * @method Customer            setPaymentTypeId()        Sets the current record's "payment_type_id" value
 * @method Customer            setDiscount()             Sets the current record's "discount" value
 * @method Customer            setCompany()              Sets the current record's "Company" value
 * @method Customer            setPaymentType()          Sets the current record's "PaymentType" value
 * @method Customer            setCommons()              Sets the current record's "Commons" collection
 * 
 * @package    siwapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCustomer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('customer');
        $this->hasColumn('company_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('name_slug', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('identification', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('contact_person', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('invoicing_address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('invoicing_postalcode', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('invoicing_city', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('invoicing_state', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('invoicing_country', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('shipping_address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('shipping_postalcode', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('shipping_city', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('shipping_state', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('shipping_country', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('website', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('mobile', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('fax', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('comments', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('bic', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('iban', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('entity', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('office', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('control_digit', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('account', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('payment_type_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('discount', 'decimal', 53, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'default' => 0,
             'length' => 53,
             ));


        $this->index('cstm', array(
             'fields' => 
             array(
              0 => 'company_id',
              1 => 'name',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Company', array(
             'local' => 'company_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('PaymentType', array(
             'local' => 'payment_type_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasMany('Common as Commons', array(
             'local' => 'id',
             'foreign' => 'customer_id'));

        $taggable0 = new Taggable();
        $this->actAs($taggable0);
    }
}