<?php

/**
 * Account form base class.
 *
 * @method Account getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAccountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'account_id' => new sfWidgetFormInputHidden(),
      'email'      => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'account_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getAccountId()), 'empty_value' => $this->getObject()->getAccountId(), 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'password'   => new sfValidatorString(array('max_length' => 45)),
      'first_name' => new sfValidatorString(array('max_length' => 45)),
      'last_name'  => new sfValidatorString(array('max_length' => 45)),
      'status'     => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Account', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account';
  }


}
