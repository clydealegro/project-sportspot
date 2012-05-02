<?php

/**
 * Announcement form base class.
 *
 * @method Announcement getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAnnouncementForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'announcement_id' => new sfWidgetFormInputHidden(),
      'listing_id'      => new sfWidgetFormPropelChoice(array('model' => 'Listing', 'add_empty' => false)),
      'title'           => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'announcement_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getAnnouncementId()), 'empty_value' => $this->getObject()->getAnnouncementId(), 'required' => false)),
      'listing_id'      => new sfValidatorPropelChoice(array('model' => 'Listing', 'column' => 'listing_id')),
      'title'           => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'description'     => new sfValidatorString(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('announcement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Announcement';
  }


}
