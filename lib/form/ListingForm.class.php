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
  	$categories = CategoryPeer::doSelect(new Criteria());

	$categoriesArray = array();	
	foreach ($categories as $category) {
		$categoriesArray[$category->getCategoryId()] = $category->getName();
	}
	
  	$this->useFields(array(
		'name', 'complete_address', 'details', 'contact_person', 'contact_number'
	));
	
	$this->widgetSchema['categories'] = new sfWidgetFormChoice(array(
		'expanded' => true,
		'multiple' => true,
 		'choices'  => $categoriesArray
	));
	//$this->setDefault('categories', array(4, 2));
	if ($this->getObject()->isNew()) {
		$map = new MapInfo();
		$map->setListing($this->getObject());
	} else {
		$selectedCategories = $this->getObject()->getListingToCategorys();
		$assocCategories = array();
		foreach($selectedCategories as $category){
			$assocCategories[] = $category->getCategoryId();
		}
		$this->setDefault('categories', $assocCategories);
		$map = $this->getObject()->getMapInfo();
	}
	
	$mapForm = new MapInfoForm($map);
	$this->embedForm('map', $mapForm);
	
	$this->validatorSchema->setOption('allow_extra_fields', true);
  }
}
