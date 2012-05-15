<?php

/**
 * MapInfo form.
 *
 * @package    project-sportspot
 * @subpackage form
 * @author     Your name here
 */
class MapInfoForm extends BaseMapInfoForm
{
  public function configure()
  {
  	$this->useFields(array('region', 'city_municipality', 'google_latitude', 'google_longitude'));
		
	$this->widgetSchema->setLabels(array(
		'region'             => 'Region',
		'city_municipality'  => 'City / Municipality',
		'google_latitude'    => 'Google Map Latitude',
		'google_longitude'   => 'Google Map Longitude'
	));
	
  }
}
