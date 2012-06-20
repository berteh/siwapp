<?php

/**
 * BaseSupplier
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $name_slug
 * @property string $identification
 * @property string $email
 * @property string $contact_person
 * @property clob $invoicing_address
 * @property clob $shipping_address
 * @property string $phone
 * @property string $fax
 * @property clob $comments
 * @property Doctrine_Collection $Commons
 * 
 * @method string              getName()              Returns the current record's "name" value
 * @method string              getNameSlug()          Returns the current record's "name_slug" value
 * @method string              getIdentification()    Returns the current record's "identification" value
 * @method string              getEmail()             Returns the current record's "email" value
 * @method string              getContactPerson()     Returns the current record's "contact_person" value
 * @method clob                getInvoicingAddress()  Returns the current record's "invoicing_address" value
 * @method clob                getShippingAddress()   Returns the current record's "shipping_address" value
 * @method string              getPhone()             Returns the current record's "phone" value
 * @method string              getFax()               Returns the current record's "fax" value
 * @method clob                getComments()          Returns the current record's "comments" value
 * @method Doctrine_Collection getCommons()           Returns the current record's "Commons" collection
 * @method Supplier            setName()              Sets the current record's "name" value
 * @method Supplier            setNameSlug()          Sets the current record's "name_slug" value
 * @method Supplier            setIdentification()    Sets the current record's "identification" value
 * @method Supplier            setEmail()             Sets the current record's "email" value
 * @method Supplier            setContactPerson()     Sets the current record's "contact_person" value
 * @method Supplier            setInvoicingAddress()  Sets the current record's "invoicing_address" value
 * @method Supplier            setShippingAddress()   Sets the current record's "shipping_address" value
 * @method Supplier            setPhone()             Sets the current record's "phone" value
 * @method Supplier            setFax()               Sets the current record's "fax" value
 * @method Supplier            setComments()          Sets the current record's "comments" value
 * @method Supplier            setCommons()           Sets the current record's "Commons" collection
 * 
 * @package    siwapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSupplier extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('supplier');
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
        $this->hasColumn('invoicing_address', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('shipping_address', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('phone', 'string', 20, array(
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


        $this->index('cstm', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'type' => 'unique',
             ));
        $this->index('cstm_slug', array(
             'fields' => 
             array(
              0 => 'name_slug',
             ),
             'type' => 'unique',
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Common as Commons', array(
             'local' => 'id',
             'foreign' => 'supplier_id'));
    }
}