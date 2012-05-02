<?php


/**
 * This class defines the structure of the 'listing_to_availability' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 04/28/12 16:40:16
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ListingToAvailabilityTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ListingToAvailabilityTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('listing_to_availability');
		$this->setPhpName('ListingToAvailability');
		$this->setClassname('ListingToAvailability');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignKey('LISTING_ID', 'ListingId', 'INTEGER', 'listing', 'LISTING_ID', true, 11, null);
		$this->addForeignKey('AVAILABILITY_ID', 'AvailabilityId', 'INTEGER', 'availability', 'AVAILABILITY_ID', true, 11, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Listing', 'Listing', RelationMap::MANY_TO_ONE, array('listing_id' => 'listing_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Availability', 'Availability', RelationMap::MANY_TO_ONE, array('availability_id' => 'availability_id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // ListingToAvailabilityTableMap