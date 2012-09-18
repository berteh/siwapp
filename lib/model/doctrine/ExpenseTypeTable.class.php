<?php

/**
 * ExpenseTypeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ExpenseTypeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ExpenseTypeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ExpenseType');
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
