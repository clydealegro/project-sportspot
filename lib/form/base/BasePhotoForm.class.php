<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id'   => new sfWidgetFormInputHidden(),
      'context'    => new sfWidgetFormInputText(),
      'context_id' => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'caption'    => new sfWidgetFormInputText(),
      'filename'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'photo_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getPhotoId()), 'empty_value' => $this->getObject()->getPhotoId(), 'required' => false)),
      'context'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'context_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'caption'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'filename'   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }


}
