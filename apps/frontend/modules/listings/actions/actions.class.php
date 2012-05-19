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
		$this->redirect('@login');
	}
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	$parameters = $request->getParameter($form->getName());
  	$form->bind(
		$parameters,
		$request->getFiles($form->getName())
	);
	
	if($form->isValid()){
		
		$listing = $form->save();
		
		foreach ($listing->getListingToCategorys() as $row) {
			$row->delete();
		}
		foreach($parameters['categories'] as $parameter){
			$category = CategoryPeer::retrieveByPK($parameter);
			$listingCategory = new ListingToCategory();
			$listingCategory->setListing($listing);
			$listingCategory->setCategory($category);
			$listingCategory->save();
		}
		
		$this->redirect('@list_view');
  	}
  }
  
  public function executeEdit(sfWebRequest $request){
  	$listing = ListingPeer::getListingByOwner($this->getUser()->getAttribute('account_id'), $request->getParameter('id'));
	
	if ($listing) {
		$this->form = new ListingForm($listing);
		
		if ('POST' == $request->getMethod()) {
			$this->processForm($request, $this->form);
		}
	} else {
		$this->redirect('@list_view');
	}
   }

  public function executeDelete(sfWebRequest $request){
  	$listing = ListingPeer::getListingByOwner($this->getUser()->getAttribute('account_id'),$request->getParameter('id'));
	$listing->getMapInfo()->delete();
	foreach ($listing->getListingToCategorys() as $row) {
		$row->delete();
	}
	$listing->delete();
  	$this->redirect('@list_view'); 
  }
  
  public function executeView(sfWebRequest $request){
  	$this->requestedlisting = ListingPeer::getListingByOwner($this->getUser()->getAttribute('account_id'),$request->getParameter('id'));
  	
	if (!$this->requestedlisting) {
		$this->redirect('@list_view');
	}
  	
	$this->listingCategory = array();
	$assoCategory = $this->requestedlisting->getListingToCategorys();
	foreach ( $assoCategory as $category) {
		$this->listingCategory[] = CategoryPeer::retrieveByPK($category->getCategoryId())->getName();
	}
 
  }
 
 	// code will be transferred to apps/client/modules/listing
}
