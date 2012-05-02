<?php

/**
 * Availability form base class.
 *
 * @method Availability getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAvailabilityForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'availability_id' => new sfWidgetFormInputHidden(),
      'day'             => new sfWidgetFormInputText(),
      'opening_time'    => new sfWidgetFormTime(),
      'closing_time'    => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'availability_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getAvailabilityId()), 'empty_value' => $this->getObject()->getAvailabilityId(), 'required' => false)),
      'day'             => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'opening_time'    => new sfValidatorTime(array('required' => false)),
      'closing_time'    => new sfValidatorTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('availability[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Availability';
  }


}
