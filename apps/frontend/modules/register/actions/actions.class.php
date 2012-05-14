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

  public function executeRequestResetPassword(sfWebRequest $request)
  { 
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

  public function executeResetPassword(sfWebRequest $request)
  {
    $token = $request->getParameter('token');

    $tokenObject = TokenPeer::retrieveByToken($token);

    if($tokenObject){
      $tokenizer = new TokenGenerator();
      $params = $tokenizer->parseToken($token);

      if($account = AccountPeer::retrieveByPk($params['id'])){
        $this->form = new ResetPasswordForm($account);

        if($request->isMethod('post')){
          $this->form->bind($request->getParameter('confirm_password'));

          if($this->form->isValid()){
            $this->form->save();

            $this->redirect('homepage');
          }
        }
      }
      else{
        //forward to 404 page
        $this->forward404();
      }

    }
    else{
      //forward to 404 page
      $this->forward404();
    }
  }
	 
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind( $request->getParameter($form->getName()), $request->getFiles($form->getName()));
	 
    if ($form->isValid())
	  {
  	  $account = $form->save();

      $notification = new VerificationEmailNotification($account);
      $notification->sendMail();
  	
  	  $this->getUser()->setFlash('notice', sprintf('Successfully registered! Activate first your account to start adding listings to Sportspot. An activation link has been sent to %s.', $account->getEmail()));
	  }
    else{
      $this->getUser()->setFlash('notice', sprintf('Error while saving! Please check fields..')); 
    }
    $this->redirect( 'register' );
  } 
}