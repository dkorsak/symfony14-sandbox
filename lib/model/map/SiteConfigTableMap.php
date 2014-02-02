<?php



/**
 * This class defines the structure of the 'config' table.
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
class SiteConfigTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.SiteConfigTableMap';

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
        $this->setName('config');
        $this->setPhpName('SiteConfig');
        $this->setClassname('SiteConfig');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('contact_email', 'ContactEmail', 'VARCHAR', true, 150, 'daniel.korsK@wp.pl');
        $this->addColumn('meta_title', 'MetaTitle', 'VARCHAR', false, 255, null);
        $this->addColumn('meta_description', 'MetaDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('meta_keys', 'MetaKeys', 'LONGVARCHAR', false, null, null);
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
            'symfony' =>  array (
  'form' => 'true',
  'filter' => 'false',
),
            'symfony_behaviors' =>  array (
),
        );
    } // getBehaviors()

} // SiteConfigTableMap
