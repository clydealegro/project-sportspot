<?php

/**
 * AccountToPhoto form base class.
 *
 * @method AccountToPhoto getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAccountToPhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'account_id' => new sfWidgetFormPropelChoice(array('model' => 'Account', 'add_empty' => false)),
      'photo_id'   => new sfWidgetFormPropelChoice(array('model' => 'Photo', 'add_empty' => false)),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'account_id' => new sfValidatorPropelChoice(array('model' => 'Account', 'column' => 'account_id')),
      'photo_id'   => new sfValidatorPropelChoice(array('model' => 'Photo', 'column' => 'photo_id')),
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('account_to_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AccountToPhoto';
  }


}
