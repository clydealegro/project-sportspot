<?php

/**
 * listings actions.
 *
 * @package    project-sportspot
 * @subpackage listings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class listingsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
   $this->forward('default', 'module');
   //$this->form = new ListingForm();
  }
  
  public function executeNew(sfWebRequest $request)
  {
  	if($this->getUser()->isAuthenticated()){
  		$listing = new Listing();
		$listing->setAccountId($this->getUser()->getAttribute('account_id'));
		
  		$this->form = new ListingForm($listing);
		
		if ('POST' == $request->getMethod()) {
			$this->processForm($request, $this->form);
		}
  	}
	else{ 
		$this->redirect('login/index');
	}
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	$form->bind(
		$request->getParameter($form->getName()),
		$request->getFiles($form->getName())
	);
	
	if($form->isValid()){
		$listing = $form->save();
  		$this->redirect('list/view');
		//var_dump($listing->getListingId());exit;
  	}
  }
  
  public function executeEdit(sfWebRequest $request){
  	//$listingAccountId = ListingPeer::getAccountIdByOwner($request->getParameter('id'))->getAccountId();
	
	//if( $this->getUser()->getAttribute('account_id') == $listingAccountId ){
		$listing = ListingPeer::getListingByOwner($this->getUser()->getAttribute('account_id'),$request->getParameter('id'));
	  	$this->form = new ListingForm($listing);
		if ('POST' == $request->getMethod()) {
			$this->form->bind( $request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()) ); 
			//$editedListing=$this->form->save();
			//var_dump($editedListing); exit;
		}
   /* }
	else{
		var_dump('error'); exit;
	} */
   }

  public function executeDelete(sfWebRequest $request){
  	$listing = ListingPeer::getListingByOwner($this->getUser()->getAttribute('account_id'),$request->getParameter('id'));
	$listing->delete();
  	$this->redirect('list/view'); 
  }
  
  public function executeView(sfWebRequest $request){
  	$this->requestedlisting = ListingPeer::getListingByOwner($this->getUser()->getAttribute('account_id'),$request->getParameter('id'));
  	$this->listingMapInfo = MapInfoPeer::getMapInfoOfListing(1); //temporary value is map_info_id, value here should be the listingId, needs to update database
  }
 
 	// code will be transferred to apps/client/modules/listing
}
