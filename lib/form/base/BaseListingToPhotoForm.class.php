<?php

/**
 * ListingToPhoto form base class.
 *
 * @method ListingToPhoto getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseListingToPhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'listing_id' => new sfWidgetFormPropelChoice(array('model' => 'Listing', 'add_empty' => false)),
      'photo_id'   => new sfWidgetFormPropelChoice(array('model' => 'Photo', 'add_empty' => false)),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'listing_id' => new sfValidatorPropelChoice(array('model' => 'Listing', 'column' => 'listing_id')),
      'photo_id'   => new sfValidatorPropelChoice(array('model' => 'Photo', 'column' => 'photo_id')),
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('listing_to_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ListingToPhoto';
  }


}
