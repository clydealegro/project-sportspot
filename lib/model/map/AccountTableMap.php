<?php


/**
 * This class defines the structure of the 'account' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon May 14 11:47:58 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class AccountTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AccountTableMap';

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
		$this->setName('account');
		$this->setPhpName('Account');
		$this->setClassname('Account');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ACCOUNT_ID', 'AccountId', 'INTEGER', true, 11, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 45, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 45, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', true, 45, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 45, null);
		$this->addColumn('STATUS', 'Status', 'TINYINT', true, 1, 1);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AccountToPhoto', 'AccountToPhoto', RelationMap::ONE_TO_MANY, array('account_id' => 'account_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Listing', 'Listing', RelationMap::ONE_TO_MANY, array('account_id' => 'account_id', ), 'RESTRICT', 'RESTRICT');
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // AccountTableMap
