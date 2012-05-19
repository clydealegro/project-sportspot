<?php

/**
 * Token form base class.
 *
 * @method Token getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTokenForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'expires_at' => new sfWidgetFormDateTime(),
      'token'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'expires_at' => new sfValidatorDateTime(),
      'token'      => new sfValidatorString(array('max_length' => 250)),
    ));

    $this->widgetSchema->setNameFormat('token[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Token';
  }


}
