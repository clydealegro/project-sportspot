<?php

/**
 * register actions.
 *
 * @package    project-sportspot
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->account =AccountPeer::doSelect(new Criteria());
    $this->form = new AccountForm();
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new AccountForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('index');
  }

  /**
   *
   * @TODO: improve message email template
   *
   *
   *
   */

  public function executeRequestResetPassword(sfWebRequest $request)
  { 
  	//improve the email message template.
  	//maybe find a better tokenizer..

  	$email = $request->getParameter('email');

  	//check if email exists



  	if($account = AccountPeer::retrieveByEmail($email)){
      $this->getUser()->setFlash('notice','Notification has been sent to you email!',true);
      $notification = new RequestResetPasswordNotification($account);
      $notification->sendMail();
  	}
    else{
      $this->getUser()->setFlash('notice','Email does not exists! May your email it not verified',true);
    }

    $this->redirect('register');
  }
	 
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind( $request->getParameter($form->getName()), $request->getFiles($form->getName()));
	 
    if ($form->isValid())
	  {
  	  $account = $form->save();
  	  $this->sendMail( $account );
  	  $this->getUser()->setFlash('notice', sprintf('Successfully registered! Activate first your account to start adding listings to Sportspot. An activation link has been sent to %s.', $account->getEmail()));
  	  $this->redirect( 'register' );
	  }
  }
  
  private function sendMail( $account )
  {
	$uniqueid = uniqid();
	$verificationCode = md5('uniqueid='.$uniqueid.'&id='.$account->getAccountId().'&email='.$account->getEmail()); 
	TokenPeer::insertToken($verificationCode,  $account->getAccountId());
	$message = $this->getMailer()->compose(
	    'nesie@projectweb.ph',
		$account->getEmail(),
		'Sportspot Account Verification',
		'Please activate your account here: http://localhost:8080/frontend_dev.php/activate/index?verificationCode='.$verificationCode);
		
	$this->getMailer()->send($message);
  }
}