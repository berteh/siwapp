<?php

/**
 * BaseCompany
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $identification
 * @property string $name
 * @property string $address
 * @property string $postalcode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $email
 * @property string $phone
 * @property string $fax
 * @property string $url
 * @property clob $logo
 * @property string $currency
 * @property integer $currency_decimals
 * @property clob $legal_terms
 * @property string $pdf_orientation
 * @property string $pdf_size
 * @property string $iban
 * @property string $entity
 * @property string $office
 * @property string $control_digit
 * @property string $account
 * @property string $mercantil_registry
 * @property string $sufix
 * @property Doctrine_Collection $Company
 * 
 * @method string              getIdentification()     Returns the current record's "identification" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getAddress()            Returns the current record's "address" value
 * @method string              getPostalcode()         Returns the current record's "postalcode" value
 * @method string              getCity()               Returns the current record's "city" value
 * @method string              getState()              Returns the current record's "state" value
 * @method string              getCountry()            Returns the current record's "country" value
 * @method string              getEmail()              Returns the current record's "email" value
 * @method string              getPhone()              Returns the current record's "phone" value
 * @method string              getFax()                Returns the current record's "fax" value
 * @method string              getUrl()                Returns the current record's "url" value
 * @method clob                getLogo()               Returns the current record's "logo" value
 * @method string              getCurrency()           Returns the current record's "currency" value
 * @method integer             getCurrencyDecimals()   Returns the current record's "currency_decimals" value
 * @method clob                getLegalTerms()         Returns the current record's "legal_terms" value
 * @method string              getPdfOrientation()     Returns the current record's "pdf_orientation" value
 * @method string              getPdfSize()            Returns the current record's "pdf_size" value
 * @method string              getIban()               Returns the current record's "iban" value
 * @method string              getEntity()             Returns the current record's "entity" value
 * @method string              getOffice()             Returns the current record's "office" value
 * @method string              getControlDigit()       Returns the current record's "control_digit" value
 * @method string              getAccount()            Returns the current record's "account" value
 * @method string              getMercantilRegistry()  Returns the current record's "mercantil_registry" value
 * @method string              getSufix()              Returns the current record's "sufix" value
 * @method Doctrine_Collection getCompanyUser()        Returns the current record's "CompanyUser" collection
 * @method Doctrine_Collection getCompany()            Returns the current record's "Company" collection
 * @method Company             setIdentification()     Sets the current record's "identification" value
 * @method Company             setName()               Sets the current record's "name" value
 * @method Company             setAddress()            Sets the current record's "address" value
 * @method Company             setPostalcode()         Sets the current record's "postalcode" value
 * @method Company             setCity()               Sets the current record's "city" value
 * @method Company             setState()              Sets the current record's "state" value
 * @method Company             setCountry()            Sets the current record's "country" value
 * @method Company             setEmail()              Sets the current record's "email" value
 * @method Company             setPhone()              Sets the current record's "phone" value
 * @method Company             setFax()                Sets the current record's "fax" value
 * @method Company             setUrl()                Sets the current record's "url" value
 * @method Company             setLogo()               Sets the current record's "logo" value
 * @method Company             setCurrency()           Sets the current record's "currency" value
 * @method Company             setCurrencyDecimals()   Sets the current record's "currency_decimals" value
 * @method Company             setLegalTerms()         Sets the current record's "legal_terms" value
 * @method Company             setPdfOrientation()     Sets the current record's "pdf_orientation" value
 * @method Company             setPdfSize()            Sets the current record's "pdf_size" value
 * @method Company             setIban()               Sets the current record's "iban" value
 * @method Company             setEntity()             Sets the current record's "entity" value
 * @method Company             setOffice()             Sets the current record's "office" value
 * @method Company             setControlDigit()       Sets the current record's "control_digit" value
 * @method Company             setAccount()            Sets the current record's "account" value
 * @method Company             setMercantilRegistry()  Sets the current record's "mercantil_registry" value
 * @method Company             setSufix()              Sets the current record's "sufix" value
 * @method Company             setCompanyUser()        Sets the current record's "CompanyUser" collection
 * @method Company             setCompany()            Sets the current record's "Company" collectionUser
 * @property Doctrine_Collection $Company
 * 
 * @method string              getIdentification()     Returns the current record's "identification" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getAddress()            Returns the current record's "address" value
 * @method string              getPostalcode()         Returns the current record's "postalcode" value
 * @method string              getCity()               Returns the current record's "city" value
 * @method string              getState()              Returns the current record's "state" value
 * @method string              getCountry()            Returns the current record's "country" value
 * @method string              getEmail()              Returns the current record's "email" value
 * @method string              getPhone()              Returns the current record's "phone" value
 * @method string              getFax()                Returns the current record's "fax" value
 * @method string              getUrl()                Returns the current record's "url" value
 * @method clob                getLogo()               Returns the current record's "logo" value
 * @method string              getCurrency()           Returns the current record's "currency" value
 * @method integer             getCurrencyDecimals()   Returns the current record's "currency_decimals" value
 * @method clob                getLegalTerms()         Returns the current record's "legal_terms" value
 * @method string              getPdfOrientation()     Returns the current record's "pdf_orientation" value
 * @method string              getPdfSize()            Returns the current record's "pdf_size" value
 * @method string              getIban()               Returns the current record's "iban" value
 * @method string              getEntity()             Returns the current record's "entity" value
 * @method string              getOffice()             Returns the current record's "office" value
 * @method string              getControlDigit()       Returns the current record's "control_digit" value
 * @method string              getAccount()            Returns the current record's "account" value
 * @method string              getMercantilRegistry()  Returns the current record's "mercantil_registry" value
 * @method string              getSufix()              Returns the current record's "sufix" value
 * @method Doctrine_Collection getCompanyUser()        Returns the current record's "CompanyUser" collection
 * @method Doctrine_Collection getCompany()            Returns the current record's "Company" collection
 * @method Company             setIdentification()     Sets the current record's "identification" value
 * @method Company             setName()               Sets the current record's "name" value
 * @method Company             setAddress()            Sets the current record's "address" value
 * @method Company             setPostalcode()         Sets the current record's "postalcode" value
 * @method Company             setCity()               Sets the current record's "city" value
 * @method Company             setState()              Sets the current record's "state" value
 * @method Company             setCountry()            Sets the current record's "country" value
 * @method Company             setEmail()              Sets the current record's "email" value
 * @method Company             setPhone()              Sets the current record's "phone" value
 * @method Company             setFax()                Sets the current record's "fax" value
 * @method Company             setUrl()                Sets the current record's "url" value
 * @method Company             setLogo()               Sets the current record's "logo" value
 * @method Company             setCurrency()           Sets the current record's "currency" value
 * @method Company             setCurrencyDecimals()   Sets the current record's "currency_decimals" value
 * @method Company             setLegalTerms()         Sets the current record's "legal_terms" value
 * @method Company             setPdfOrientation()     Sets the current record's "pdf_orientation" value
 * @method Company             setPdfSize()            Sets the current record's "pdf_size" value
 * @method Company             setIban()               Sets the current record's "iban" value
 * @method Company             setEntity()             Sets the current record's "entity" value
 * @method Company             setOffice()             Sets the current record's "office" value
 * @method Company             setControlDigit()       Sets the current record's "control_digit" value
 * @method Company             setAccount()            Sets the current record's "account" value
 * @method Company             setMercantilRegistry()  Sets the current record's "mercantil_registry" value
 * @method Company             setSufix()              Sets the current record's "sufix" value
 * @method Company             setCompanyUser()        Sets the current record's "CompanyUser" collection
 * @method Company             setCompany()            Sets the current record's "Company" collection
 * 
 * @package    siwapp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCompany extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('company');
        $this->hasColumn('identification', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('postalcode', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('city', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('state', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('country', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('fax', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('logo', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('currency', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('currency_decimals', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('legal_terms', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('pdf_orientation', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('pdf_size', 'string', 50, array(
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
        $this->hasColumn('mercantil_registry', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('sufix', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));


        $this->index('cst', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'type' => 'unique',
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUser as CompanyUser', array(
             'refClass' => 'CompanyUser',
             'local' => 'company_id',
             'foreign' => 'sf_guard_user_id'));

        $this->hasMany('Customer as Company', array(
             'local' => 'id',
             'foreign' => 'company_id'));
    }
}