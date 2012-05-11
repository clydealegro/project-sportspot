<?php

class LoginForm extends BaseForm
{
  public function configure()
  {
	$this->setWidget( 'email', new sfWidgetFormInput() );
	$this->setWidget( 'password', new sfWidgetFormInputPassword() );
	$this->useFields(array('email','password'));
  }
}
