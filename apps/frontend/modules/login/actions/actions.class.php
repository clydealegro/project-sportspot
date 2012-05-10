<?php

/**
 * login actions.
 *
 * @package    project-sportspot
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new LoginForm();
  }
  
  public function executeSubmit(sfWebRequest $request)
  {
	$this->forward404Unless($request->isMethod('post'));
	$email = $request->getParameter('email');
	$password = $request->getParameter('password');
	
	$this->getUser()->authenticate($email,$password);
	if($this->getUser()->isAuthenticated())
		$this->redirect('home/index');
	else 
	{
		$this->getUser()->setFlash('loginerror', sprintf('Log in failed.'));
		$this->redirect('login/index');
	}
  }
}
