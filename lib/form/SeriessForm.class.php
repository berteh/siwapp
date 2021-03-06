<?php

class SeriessForm extends FormsContainer
{
  public function __construct($options = array(),$CSRFSecret = null)
  {
    $this->old_series = Doctrine::getTable('Series')->createQuery()
    ->where('company_id = ?', sfContext::getInstance()->getUser()->getAttribute('company_id'))->execute();
    $forms = array();
    foreach($this->old_series as $series)
    {
      $forms['old_'.$series->id] = new SeriesForm($series,$options,false);
    }
    parent::__construct($forms,'SeriesForm',$options,$CSRFSecret);
  }
  public function configure()
  {
    $this->widgetSchema->setNameFormat('seriess[%s]');
  }
}
