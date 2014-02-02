<?php


/**
 * Base static class for performing query and update operations on the 'navigation' table.
 *
 *
 *
 * @package propel.generator.lib.model.om
 */
abstract class BaseNavigationPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'propel';

    /** the table name for this class */
    const TABLE_NAME = 'navigation';

    /** the related Propel class for this table */
    const OM_CLASS = 'Navigation';

    /** the related TableMap class for this table */
    const TM_CLASS = 'NavigationTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the id field */
    const ID = 'navigation.id';

    /** the column name for the name field */
    const NAME = 'navigation.name';

    /** the column name for the url field */
    const URL = 'navigation.url';

    /** the column name for the route field */
    const ROUTE = 'navigation.route';

    /** the column name for the parent_tree_id field */
    const PARENT_TREE_ID = 'navigation.parent_tree_id';

    /** the column name for the category_level field */
    const CATEGORY_LEVEL = 'navigation.category_level';

    /** the column name for the ltf field */
    const LTF = 'navigation.ltf';

    /** the column name for the rgt field */
    const RGT = 'navigation.rgt';

    /** the column name for the scope field */
    const SCOPE = 'navigation.scope';

    /** the column name for the display field */
    const DISPLAY = 'navigation.display';

    /** the column name for the meta_title field */
    const META_TITLE = 'navigation.meta_title';

    /** the column name for the meta_description field */
    const META_DESCRIPTION = 'navigation.meta_description';

    /** the column name for the meta_keys field */
    const META_KEYS = 'navigation.meta_keys';

    /** the column name for the created_at field */
    const CREATED_AT = 'navigation.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'navigation.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Navigation objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Navigation[]
     */
    public static $instances = array();


    // nested_set behavior

    /**
     * Left column for the set
     */
    const LEFT_COL = 'navigation.ltf';

    /**
     * Right column for the set
     */
    const RIGHT_COL = 'navigation.rgt';

    /**
     * Level column for the set
     */
    const LEVEL_COL = 'navigation.category_level';

    /**
     * Scope column for the set
     */
    const SCOPE_COL = 'navigation.scope';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. NavigationPeer::$fieldNames[NavigationPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Url', 'Route', 'ParentTreeId', 'CategoryLevel', 'Ltf', 'Rgt', 'Scope', 'Display', 'MetaTitle', 'MetaDescription', 'MetaKeys', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'url', 'route', 'parentTreeId', 'categoryLevel', 'ltf', 'rgt', 'scope', 'display', 'metaTitle', 'metaDescription', 'metaKeys', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (NavigationPeer::ID, NavigationPeer::NAME, NavigationPeer::URL, NavigationPeer::ROUTE, NavigationPeer::PARENT_TREE_ID, NavigationPeer::CATEGORY_LEVEL, NavigationPeer::LTF, NavigationPeer::RGT, NavigationPeer::SCOPE, NavigationPeer::DISPLAY, NavigationPeer::META_TITLE, NavigationPeer::META_DESCRIPTION, NavigationPeer::META_KEYS, NavigationPeer::CREATED_AT, NavigationPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'NAME', 'URL', 'ROUTE', 'PARENT_TREE_ID', 'CATEGORY_LEVEL', 'LTF', 'RGT', 'SCOPE', 'DISPLAY', 'META_TITLE', 'META_DESCRIPTION', 'META_KEYS', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'url', 'route', 'parent_tree_id', 'category_level', 'ltf', 'rgt', 'scope', 'display', 'meta_title', 'meta_description', 'meta_keys', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. NavigationPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Url' => 2, 'Route' => 3, 'ParentTreeId' => 4, 'CategoryLevel' => 5, 'Ltf' => 6, 'Rgt' => 7, 'Scope' => 8, 'Display' => 9, 'MetaTitle' => 10, 'MetaDescription' => 11, 'MetaKeys' => 12, 'CreatedAt' => 13, 'UpdatedAt' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'url' => 2, 'route' => 3, 'parentTreeId' => 4, 'categoryLevel' => 5, 'ltf' => 6, 'rgt' => 7, 'scope' => 8, 'display' => 9, 'metaTitle' => 10, 'metaDescription' => 11, 'metaKeys' => 12, 'createdAt' => 13, 'updatedAt' => 14, ),
        BasePeer::TYPE_COLNAME => array (NavigationPeer::ID => 0, NavigationPeer::NAME => 1, NavigationPeer::URL => 2, NavigationPeer::ROUTE => 3, NavigationPeer::PARENT_TREE_ID => 4, NavigationPeer::CATEGORY_LEVEL => 5, NavigationPeer::LTF => 6, NavigationPeer::RGT => 7, NavigationPeer::SCOPE => 8, NavigationPeer::DISPLAY => 9, NavigationPeer::META_TITLE => 10, NavigationPeer::META_DESCRIPTION => 11, NavigationPeer::META_KEYS => 12, NavigationPeer::CREATED_AT => 13, NavigationPeer::UPDATED_AT => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'NAME' => 1, 'URL' => 2, 'ROUTE' => 3, 'PARENT_TREE_ID' => 4, 'CATEGORY_LEVEL' => 5, 'LTF' => 6, 'RGT' => 7, 'SCOPE' => 8, 'DISPLAY' => 9, 'META_TITLE' => 10, 'META_DESCRIPTION' => 11, 'META_KEYS' => 12, 'CREATED_AT' => 13, 'UPDATED_AT' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'url' => 2, 'route' => 3, 'parent_tree_id' => 4, 'category_level' => 5, 'ltf' => 6, 'rgt' => 7, 'scope' => 8, 'display' => 9, 'meta_title' => 10, 'meta_description' => 11, 'meta_keys' => 12, 'created_at' => 13, 'updated_at' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = NavigationPeer::getFieldNames($toType);
        $key = isset(NavigationPeer::$fieldKeys[$fromType][$name]) ? NavigationPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(NavigationPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, NavigationPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return NavigationPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. NavigationPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(NavigationPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(NavigationPeer::ID);
            $criteria->addSelectColumn(NavigationPeer::NAME);
            $criteria->addSelectColumn(NavigationPeer::URL);
            $criteria->addSelectColumn(NavigationPeer::ROUTE);
            $criteria->addSelectColumn(NavigationPeer::PARENT_TREE_ID);
            $criteria->addSelectColumn(NavigationPeer::CATEGORY_LEVEL);
            $criteria->addSelectColumn(NavigationPeer::LTF);
            $criteria->addSelectColumn(NavigationPeer::RGT);
            $criteria->addSelectColumn(NavigationPeer::SCOPE);
            $criteria->addSelectColumn(NavigationPeer::DISPLAY);
            $criteria->addSelectColumn(NavigationPeer::META_TITLE);
            $criteria->addSelectColumn(NavigationPeer::META_DESCRIPTION);
            $criteria->addSelectColumn(NavigationPeer::META_KEYS);
            $criteria->addSelectColumn(NavigationPeer::CREATED_AT);
            $criteria->addSelectColumn(NavigationPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.route');
            $criteria->addSelectColumn($alias . '.parent_tree_id');
            $criteria->addSelectColumn($alias . '.category_level');
            $criteria->addSelectColumn($alias . '.ltf');
            $criteria->addSelectColumn($alias . '.rgt');
            $criteria->addSelectColumn($alias . '.scope');
            $criteria->addSelectColumn($alias . '.display');
            $criteria->addSelectColumn($alias . '.meta_title');
            $criteria->addSelectColumn($alias . '.meta_description');
            $criteria->addSelectColumn($alias . '.meta_keys');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NavigationPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NavigationPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(NavigationPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseNavigationPeer', $criteria, $con);
        }

        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return Navigation
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = NavigationPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return NavigationPeer::populateObjects(NavigationPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            NavigationPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(NavigationPeer::DATABASE_NAME);
        // symfony_behaviors behavior
        foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
        {
          call_user_func($sf_hook, 'BaseNavigationPeer', $criteria, $con);
        }


        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param Navigation $obj A Navigation object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            NavigationPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Navigation object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Navigation) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Navigation object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(NavigationPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Navigation Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(NavigationPeer::$instances[$key])) {
                return NavigationPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (NavigationPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        NavigationPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to navigation
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = NavigationPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = NavigationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = NavigationPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NavigationPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Navigation object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = NavigationPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = NavigationPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + NavigationPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NavigationPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            NavigationPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(NavigationPeer::DATABASE_NAME)->getTable(NavigationPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseNavigationPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseNavigationPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \NavigationTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return NavigationPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Navigation or Criteria object.
     *
     * @param      mixed $values Criteria or Navigation object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Navigation object
        }

        if ($criteria->containsKey(NavigationPeer::ID) && $criteria->keyContainsValue(NavigationPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NavigationPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(NavigationPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Navigation or Criteria object.
     *
     * @param      mixed $values Criteria or Navigation object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(NavigationPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(NavigationPeer::ID);
            $value = $criteria->remove(NavigationPeer::ID);
            if ($value) {
                $selectCriteria->add(NavigationPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(NavigationPeer::TABLE_NAME);
            }

        } else { // $values is Navigation object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(NavigationPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the navigation table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(NavigationPeer::TABLE_NAME, $con, NavigationPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NavigationPeer::clearInstancePool();
            NavigationPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Navigation or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Navigation object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            NavigationPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Navigation) { // it's a model object
            // invalidate the cache for this single object
            NavigationPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
            $criteria->add(NavigationPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                NavigationPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(NavigationPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            NavigationPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Navigation object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Navigation $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(NavigationPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(NavigationPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(NavigationPeer::DATABASE_NAME, NavigationPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Navigation
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = NavigationPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $criteria->add(NavigationPeer::ID, $pk);

        $v = NavigationPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Navigation[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
            $criteria->add(NavigationPeer::ID, $pks, Criteria::IN);
            $objs = NavigationPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // nested_set behavior

    /**
     * Returns the root nodes for the tree
     *
     * @param      PropelPDO $con	Connection to use.
     * @return     Navigation			Propel object for root node
     */
    public static function retrieveRoots(Criteria $criteria = null, PropelPDO $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
        }
        $criteria->add(NavigationPeer::LEFT_COL, 1, Criteria::EQUAL);

        return NavigationPeer::doSelect($criteria, $con);
    }

    /**
     * Returns the root node for a given scope
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     * @return     Navigation			Propel object for root node
     */
    public static function retrieveRoot($scope = null, PropelPDO $con = null)
    {
        $c = new Criteria(NavigationPeer::DATABASE_NAME);
        $c->add(NavigationPeer::LEFT_COL, 1, Criteria::EQUAL);
        $c->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return NavigationPeer::doSelectOne($c, $con);
    }

    /**
     * Returns the whole tree node for a given scope
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      Criteria $criteria	Optional Criteria to filter the query
     * @param      PropelPDO $con	Connection to use.
     * @return     Navigation			Propel object for root node
     */
    public static function retrieveTree($scope = null, Criteria $criteria = null, PropelPDO $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
        }
        $criteria->addAscendingOrderByColumn(NavigationPeer::LEFT_COL);
        $criteria->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return NavigationPeer::doSelect($criteria, $con);
    }

    /**
     * Tests if node is valid
     *
     * @param      Navigation $node	Propel object for src node
     * @return     bool
     */
    public static function isValid(Navigation $node = null)
    {
        if (is_object($node) && $node->getRightValue() > $node->getLeftValue()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete an entire tree
     *
     * @param      int $scope		Scope to determine which tree to delete
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     int  The number of deleted nodes
     */
    public static function deleteTree($scope = null, PropelPDO $con = null)
    {
        $c = new Criteria(NavigationPeer::DATABASE_NAME);
        $c->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        return NavigationPeer::doDelete($c, $con);
    }

    /**
     * Adds $delta to all L and R values that are >= $first and <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta		Value to be shifted by, can be negative
     * @param      int $first		First node to be shifted
     * @param      int $last			Last node to be shifted (optional)
     * @param      int $scope		Scope to use for the shift
     * @param      PropelPDO $con		Connection to use.
     */
    public static function shiftRLValues($delta, $first, $last = null, $scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        // Shift left column values
        $whereCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(NavigationPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(NavigationPeer::LEFT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);
        $whereCriteria->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $valuesCriteria->add(NavigationPeer::LEFT_COL, array('raw' => NavigationPeer::LEFT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);

        // Shift right column values
        $whereCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(NavigationPeer::RIGHT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(NavigationPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);
        $whereCriteria->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $valuesCriteria->add(NavigationPeer::RIGHT_COL, array('raw' => NavigationPeer::RIGHT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    /**
     * Adds $delta to level for nodes having left value >= $first and right value <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta		Value to be shifted by, can be negative
     * @param      int $first		First node to be shifted
     * @param      int $last			Last node to be shifted
     * @param      int $scope		Scope to use for the shift
     * @param      PropelPDO $con		Connection to use.
     */
    public static function shiftLevel($delta, $first, $last, $scope = null, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $whereCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $whereCriteria->add(NavigationPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        $whereCriteria->add(NavigationPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL);
        $whereCriteria->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        $valuesCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $valuesCriteria->add(NavigationPeer::LEVEL_COL, array('raw' => NavigationPeer::LEVEL_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    /**
     * Reload all already loaded nodes to sync them with updated db
     *
     * @param      Navigation $prune		Object to prune from the update
     * @param      PropelPDO $con		Connection to use.
     */
    public static function updateLoadedNodes($prune = null, PropelPDO $con = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            $keys = array();
            foreach (NavigationPeer::$instances as $obj) {
                if (!$prune || !$prune->equals($obj)) {
                    $keys[] = $obj->getPrimaryKey();
                }
            }

            if (!empty($keys)) {
                // We don't need to alter the object instance pool; we're just modifying these ones
                // already in the pool.
                $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
                $criteria->add(NavigationPeer::ID, $keys, Criteria::IN);
                $stmt = NavigationPeer::doSelectStmt($criteria, $con);
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $key = NavigationPeer::getPrimaryKeyHashFromRow($row, 0);
                    if (null !== ($object = NavigationPeer::getInstanceFromPool($key))) {
                        $object->setLevel($row[5]);
                        $object->clearNestedSetChildren();
                        $object->setLeftValue($row[6]);
                        $object->setRightValue($row[7]);
                        $object->setScopeValue($row[8]);
                    }
                }
                $stmt->closeCursor();
            }
        }
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      int $left	left column value
     * @param      integer $scope	scope column value
     * @param      mixed $prune	Object to prune from the shift
     * @param      PropelPDO $con	Connection to use.
     */
    public static function makeRoomForLeaf($left, $scope, $prune = null, PropelPDO $con = null)
    {
        // Update database nodes
        NavigationPeer::shiftRLValues(2, $left, null, $scope, $con);

        // Update all loaded nodes
        NavigationPeer::updateLoadedNodes($prune, $con);
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      integer $scope	scope column value
     * @param      PropelPDO $con	Connection to use.
     */
    public static function fixLevels($scope, PropelPDO $con = null)
    {
        $c = new Criteria();
        $c->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);
        $c->addAscendingOrderByColumn(NavigationPeer::LEFT_COL);
        $stmt = NavigationPeer::doSelectStmt($c, $con);

        // set the class once to avoid overhead in the loop
        $cls = NavigationPeer::getOMClass(false);
        $level = null;
        // iterate over the statement
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {

            // hydrate object
            $key = NavigationPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null === ($obj = NavigationPeer::getInstanceFromPool($key))) {
                $obj = new $cls();
                $obj->hydrate($row);
                NavigationPeer::addInstanceToPool($obj, $key);
            }

            // compute level
            // Algorithm shamelessly stolen from sfPropelActAsNestedSetBehaviorPlugin
            // Probably authored by Tristan Rivoallan
            if ($level === null) {
                $level = 0;
                $i = 0;
                $prev = array($obj->getRightValue());
            } else {
                while ($obj->getRightValue() > $prev[$i]) {
                    $i--;
                }
                $level = ++$i;
                $prev[$i] = $obj->getRightValue();
            }

            // update level in node if necessary
            if ($obj->getLevel() !== $level) {
                $obj->setLevel($level);
                $obj->save($con);
            }
        }
        $stmt->closeCursor();
    }

    /**
     * Updates all scope values for items that has negative left (<=0) values.
     *
     * @param      mixed     $scope
     * @param      PropelPDO $con	Connection to use.
     */
    public static function setNegativeScope($scope, PropelPDO $con = null)
    {
        //adjust scope value to $scope
        $whereCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $whereCriteria->add(NavigationPeer::LEFT_COL, 0, Criteria::LESS_EQUAL);

        $valuesCriteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $valuesCriteria->add(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);

        BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
    }

    // symfony behavior

    /**
     * Returns an array of arrays that contain columns in each unique index.
     *
     * @return array
     */
    static public function getUniqueColumnNames()
    {
      return array(array('url'));
    }

    // symfony_behaviors behavior

    /**
     * Returns the name of the hook to call from inside the supplied method.
     *
     * @param string $method The calling method
     *
     * @return string A hook name for {@link sfMixer}
     *
     * @throws LogicException If the method name is not recognized
     */
    static private function getMixerPreSelectHook($method)
    {
      if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
      {
        return sprintf('BaseNavigationPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
      }

      throw new LogicException(sprintf('Unrecognized function "%s"', $method));
    }

} // BaseNavigationPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseNavigationPeer::buildTableMap();

