<?php

/**
 * Payment form base class.
 *
 * @method Payment getObject() Returns the current form's model object
 *
 * @package    siwapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaymentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'company_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'add_empty' => true)),
      'invoice_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Common'), 'add_empty' => true)),
      'date'            => new sfWidgetFormDate(),
      'amount'          => new sfWidgetFormInputText(),
      'payment_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaymentType'), 'add_empty' => true)),
      'notes'           => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'company_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Company'), 'required' => false)),
      'invoice_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Common'), 'required' => false)),
      'date'            => new sfValidatorDate(array('required' => false)),
      'amount'          => new sfValidatorNumber(array('required' => false)),
      'payment_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaymentType'), 'required' => false)),
      'notes'           => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('payment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Payment';
  }

}
