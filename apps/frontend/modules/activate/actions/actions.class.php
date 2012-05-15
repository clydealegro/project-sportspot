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
		$token = TokenPeer::retrieveByToken($verificationCode);

		if($token){

			$tokenizer = new TokenGenerator();
			$params = $tokenizer->parseToken($verificationCode);

			if($account = AccountPeer::retrieveByPk($params['id'])){
				$account->verify();
				$token->delete();
			}
			
		}
	}
}
