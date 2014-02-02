<?php



/**
 * This class defines the structure of the 'navigation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class NavigationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.NavigationTableMap';

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
        $this->setName('navigation');
        $this->setPhpName('Navigation');
        $this->setClassname('Navigation');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('url', 'Url', 'VARCHAR', true, 255, null);
        $this->addColumn('route', 'Route', 'VARCHAR', false, 50, null);
        $this->addColumn('parent_tree_id', 'ParentTreeId', 'INTEGER', false, null, 0);
        $this->addColumn('category_level', 'CategoryLevel', 'INTEGER', false, null, 0);
        $this->addColumn('ltf', 'Ltf', 'INTEGER', false, null, null);
        $this->addColumn('rgt', 'Rgt', 'INTEGER', false, null, null);
        $this->addColumn('scope', 'Scope', 'INTEGER', false, null, null);
        $this->addColumn('display', 'Display', 'BOOLEAN', true, 1, true);
        $this->addColumn('meta_title', 'MetaTitle', 'VARCHAR', false, 255, null);
        $this->addColumn('meta_description', 'MetaDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('meta_keys', 'MetaKeys', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'nested_set' =>  array (
  'left_column' => 'ltf',
  'right_column' => 'rgt',
  'level_column' => 'category_level',
  'use_scope' => 'true',
  'scope_column' => 'scope',
  'method_proxies' => 'true',
),
            'symfony' =>  array (
  'form' => 'true',
  'filter' => 'false',
),
            'symfony_behaviors' =>  array (
),
        );
    } // getBehaviors()

} // NavigationTableMap
