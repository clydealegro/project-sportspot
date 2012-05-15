<?php

/**
 * list actions.
 *
 * @package    project-sportspot
 * @subpackage list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class listActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeView(sfWebRequest $request){
  	if($this->getUser()->isAuthenticated()){
  		$this->listings = ListingPeer::getUserListings($this->getUser()->getAttribute('account_id'));
	}
	else{ 
		$this->redirect('login/index');
	}
  }
}
