<?php

/**
 * activate actions.
 *
 * @package    project-sportspot
 * @subpackage activate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activateActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	$verificationCode = $request->getParameter('verificationCode');
	$token = TokenPeer::getTokenVerificationCode($verificationCode);
	
	if( $token ){
		$account = $token->getAccount();
		$account->setStatus(AccountPeer::VERIFIED);
		$account->save();	
	}
	
	//var_dump($account); exit;
  }
}
