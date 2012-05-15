<?php

/**
 * Listing form.
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
class ListingForm extends BaseListingForm
{
  public function configure()
  {
  	$this->useFields(array('name', 'complete_address', 'details', 'contact_person', 'contact_number'));
	
	//$mapForm = new MapInfoForm();
	
	//$this->embedForm('map_info', $mapForm);
  }
}
