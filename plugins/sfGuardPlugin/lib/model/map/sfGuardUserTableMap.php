<?php



/**
 * This class defines the structure of the 'sf_guard_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardUserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sf_guard_user');
        $this->setPhpName('sfGuardUser');
        $this->setClassname('sfGuardUser');
        $this->setPackage('plugins.sfGuardPlugin.lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('username', 'Username', 'VARCHAR', true, 128, null);
        $this->addColumn('algorithm', 'Algorithm', 'VARCHAR', true, 128, 'sha1');
        $this->addColumn('salt', 'Salt', 'VARCHAR', true, 128, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 128, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_login', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
        $this->addColumn('is_super_admin', 'IsSuperAdmin', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('sfGuardUserProfile', 'sfGuardUserProfile', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardUserProfiles');
        $this->addRelation('sfGuardUserPermission', 'sfGuardUserPermission', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardUserPermissions');
        $this->addRelation('sfGuardUserGroup', 'sfGuardUserGroup', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardUserGroups');
        $this->addRelation('sfGuardRememberKey', 'sfGuardRememberKey', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null, 'sfGuardRememberKeys');
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
            'symfony' =>  array (
  'form' => 'true',
  'filter' => 'true',
),
            'symfony_behaviors' =>  array (
),
            'symfony_timestampable' =>  array (
  'create_column' => 'created_at',
),
        );
    } // getBehaviors()

} // sfGuardUserTableMap
