<?php


/**
 * This class defines the structure of the 'listing_to_photo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 04/28/12 16:40:17
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ListingToPhotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ListingToPhotoTableMap';

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
		$this->setName('listing_to_photo');
		$this->setPhpName('ListingToPhoto');
		$this->setClassname('ListingToPhoto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignKey('LISTING_ID', 'ListingId', 'INTEGER', 'listing', 'LISTING_ID', true, 11, null);
		$this->addForeignKey('PHOTO_ID', 'PhotoId', 'INTEGER', 'photo', 'PHOTO_ID', true, 11, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Listing', 'Listing', RelationMap::MANY_TO_ONE, array('listing_id' => 'listing_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Photo', 'Photo', RelationMap::MANY_TO_ONE, array('photo_id' => 'photo_id', ), 'RESTRICT', 'RESTRICT');
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

} // ListingToPhotoTableMap