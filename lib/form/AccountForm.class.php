<?php

/**
 * Account form.
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
class AccountForm extends BaseAccountForm
{
  public function configure()
  {
	unset(
      $this['created_at'], $this['updated_at'],$this['status']
    );
	
	$this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));
	
	$this->widgetSchema['email2'] = new sfWidgetFormInputText(array(
		'label' => "Confirm Email"
	));
	
	
	$this->widgetSchema['password']     = new sfWidgetFormInputPassword();
    $this->widgetSchema['password2']    = new sfWidgetFormInputPassword(array(
		'label' => "Confirm Password"
	));

    $this->setValidator( 'password', new sfValidatorString(array(
        'required' => true,
        'trim' => true,
        'min_length' => 6,
        'max_length' => 50
        )));
    $this->validatorSchema['password2'] = clone $this->validatorSchema['password'];
	$this->validatorSchema['email2'] = clone $this->validatorSchema['email'];    	

    $this->mergePostValidator(new sfValidatorSchemaCompare(
        'password', sfValidatorSchemaCompare::EQUAL, 'password2',
        array())
    );
	
	$this->mergePostValidator(new sfValidatorSchemaCompare(
        'email', sfValidatorSchemaCompare::EQUAL, 'email2',
        array())
    );
	
	$this->useFields(array('first_name','last_name','email','email2','password','password2'));
  }
}
