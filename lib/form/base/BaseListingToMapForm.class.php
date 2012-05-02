<?php

/**
 * ListingToMap form base class.
 *
 * @method ListingToMap getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseListingToMapForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'listing_id'  => new sfWidgetFormPropelChoice(array('model' => 'Listing', 'add_empty' => false)),
      'map_info_id' => new sfWidgetFormPropelChoice(array('model' => 'MapInfo', 'add_empty' => false)),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'listing_id'  => new sfValidatorPropelChoice(array('model' => 'Listing', 'column' => 'listing_id')),
      'map_info_id' => new sfValidatorPropelChoice(array('model' => 'MapInfo', 'column' => 'map_info_id')),
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('listing_to_map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ListingToMap';
  }


}
