<?php

/**
 * ListingToCategory form base class.
 *
 * @method ListingToCategory getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseListingToCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => false)),
      'listing_id'  => new sfWidgetFormPropelChoice(array('model' => 'Listing', 'add_empty' => false)),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'category_id' => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'category_id')),
      'listing_id'  => new sfValidatorPropelChoice(array('model' => 'Listing', 'column' => 'listing_id')),
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('listing_to_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ListingToCategory';
  }


}
