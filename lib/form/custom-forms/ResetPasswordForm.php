<?php


class ResetPasswordForm extends sfFormPropel
{
	public function configure()
	{
		$this->setWidgets(array(
			'password' => new sfWidgetFormInputPassword(),
			'confirm_password' => new sfWidgetFormInputPassword()
		));

		$this->widgetSchema->setNameFormat('confirm_password[%s]');

		$this->setValidators(array(
			'password' => new sfValidatorString(array('required'=>true),array('required'=>'Password required')),
			'confirm_password' => new sfValidatorString(array('required'=>true),array('required'=>'Password required')),
		));

		$this->mergePostValidator(new sfValidatorSchemaCompare(
      'password', sfValidatorSchemaCompare::EQUAL, 'confirm_password',array())
    );
	}

	public function getModelName()
	{
		return 'Account';
	}

	public function save($con=null)
	{
		return parent::save();
	}
}