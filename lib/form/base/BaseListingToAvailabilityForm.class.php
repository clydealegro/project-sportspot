<?php

/**
 * ListingToAvailability form base class.
 *
 * @method ListingToAvailability getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseListingToAvailabilityForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'listing_id'      => new sfWidgetFormPropelChoice(array('model' => 'Listing', 'add_empty' => false)),
      'availability_id' => new sfWidgetFormPropelChoice(array('model' => 'Availability', 'add_empty' => false)),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'listing_id'      => new sfValidatorPropelChoice(array('model' => 'Listing', 'column' => 'listing_id')),
      'availability_id' => new sfValidatorPropelChoice(array('model' => 'Availability', 'column' => 'availability_id')),
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('listing_to_availability[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ListingToAvailability';
  }


}
