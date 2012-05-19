<?php

/**
 * MapInfo form base class.
 *
 * @method MapInfo getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMapInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'map_info_id'       => new sfWidgetFormInputHidden(),
      'listing_id'        => new sfWidgetFormPropelChoice(array('model' => 'Listing', 'add_empty' => false)),
      'region'            => new sfWidgetFormInputText(),
      'city_municipality' => new sfWidgetFormInputText(),
      'google_latitude'   => new sfWidgetFormInputText(),
      'google_longitude'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'map_info_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getMapInfoId()), 'empty_value' => $this->getObject()->getMapInfoId(), 'required' => false)),
      'listing_id'        => new sfValidatorPropelChoice(array('model' => 'Listing', 'column' => 'listing_id')),
      'region'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'city_municipality' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'google_latitude'   => new sfValidatorNumber(array('required' => false)),
      'google_longitude'  => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('map_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapInfo';
  }


}
