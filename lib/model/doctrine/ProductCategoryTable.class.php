<?php

/**
 * ProductCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ProductCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ProductCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ProductCategory');
    }

    public function getCurrentCompany()
    {
        $query = $this->createQuery('q')
                ->where('q.company_id = ?', sfContext::getInstance()->getUser()->getAttribute('company_id'))
                ->orderBy('name ASC');
        $result = $query->execute();
        return $result;
    }
}
