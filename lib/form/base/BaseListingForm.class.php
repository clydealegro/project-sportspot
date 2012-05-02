<?php

/**
 * Listing form base class.
 *
 * @method Listing getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseListingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'listing_id'       => new sfWidgetFormInputHidden(),
      'account_id'       => new sfWidgetFormPropelChoice(array('model' => 'Account', 'add_empty' => false)),
      'name'             => new sfWidgetFormInputText(),
      'complete_address' => new sfWidgetFormInputText(),
      'details'          => new sfWidgetFormTextarea(),
      'contact_person'   => new sfWidgetFormInputText(),
      'contact_number'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'listing_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getListingId()), 'empty_value' => $this->getObject()->getListingId(), 'required' => false)),
      'account_id'       => new sfValidatorPropelChoice(array('model' => 'Account', 'column' => 'account_id')),
      'name'             => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'complete_address' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'details'          => new sfValidatorString(array('required' => false)),
      'contact_person'   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'contact_number'   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('listing[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Listing';
  }


}
