<?php


/**
 * This class defines the structure of the 'account_to_photo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 05/17/12 14:19:42
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class AccountToPhotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AccountToPhotoTableMap';

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
		$this->setName('account_to_photo');
		$this->setPhpName('AccountToPhoto');
		$this->setClassname('AccountToPhoto');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addForeignKey('ACCOUNT_ID', 'AccountId', 'INTEGER', 'account', 'ACCOUNT_ID', true, 11, null);
		$this->addForeignKey('PHOTO_ID', 'PhotoId', 'INTEGER', 'photo', 'PHOTO_ID', true, 11, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Account', 'Account', RelationMap::MANY_TO_ONE, array('account_id' => 'account_id', ), 'RESTRICT', 'RESTRICT');
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

} // AccountToPhotoTableMap
