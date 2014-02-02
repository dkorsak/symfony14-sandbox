<?php


/**
 * Base class that represents a row from the 'navigation' table.
 *
 *
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNavigation extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'NavigationPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NavigationPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the url field.
     * @var        string
     */
    protected $url;

    /**
     * The value for the route field.
     * @var        string
     */
    protected $route;

    /**
     * The value for the parent_tree_id field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $parent_tree_id;

    /**
     * The value for the category_level field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $category_level;

    /**
     * The value for the ltf field.
     * @var        int
     */
    protected $ltf;

    /**
     * The value for the rgt field.
     * @var        int
     */
    protected $rgt;

    /**
     * The value for the scope field.
     * @var        int
     */
    protected $scope;

    /**
     * The value for the display field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $display;

    /**
     * The value for the meta_title field.
     * @var        string
     */
    protected $meta_title;

    /**
     * The value for the meta_description field.
     * @var        string
     */
    protected $meta_description;

    /**
     * The value for the meta_keys field.
     * @var        string
     */
    protected $meta_keys;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    // nested_set behavior

    /**
     * Queries to be executed in the save transaction
     * @var        array
     */
    protected $nestedSetQueries = array();

    /**
     * Internal cache for children nodes
     * @var        null|PropelObjectCollection
     */
    protected $collNestedSetChildren = null;

    /**
     * Internal cache for parent node
     * @var        null|Navigation
     */
    protected $aNestedSetParent = null;


    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->parent_tree_id = 0;
        $this->category_level = 0;
        $this->display = true;
    }

    /**
     * Initializes internal state of BaseNavigation object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [url] column value.
     *
     * @return string
     */
    public function getUrl()
    {

        return $this->url;
    }

    /**
     * Get the [route] column value.
     *
     * @return string
     */
    public function getRoute()
    {

        return $this->route;
    }

    /**
     * Get the [parent_tree_id] column value.
     *
     * @return int
     */
    public function getParentTreeId()
    {

        return $this->parent_tree_id;
    }

    /**
     * Get the [category_level] column value.
     *
     * @return int
     */
    public function getCategoryLevel()
    {

        return $this->category_level;
    }

    /**
     * Get the [ltf] column value.
     *
     * @return int
     */
    public function getLtf()
    {

        return $this->ltf;
    }

    /**
     * Get the [rgt] column value.
     *
     * @return int
     */
    public function getRgt()
    {

        return $this->rgt;
    }

    /**
     * Get the [scope] column value.
     *
     * @return int
     */
    public function getScope()
    {

        return $this->scope;
    }

    /**
     * Get the [display] column value.
     *
     * @return boolean
     */
    public function getDisplay()
    {

        return $this->display;
    }

    /**
     * Get the [meta_title] column value.
     *
     * @return string
     */
    public function getMetaTitle()
    {

        return $this->meta_title;
    }

    /**
     * Get the [meta_description] column value.
     *
     * @return string
     */
    public function getMetaDescription()
    {

        return $this->meta_description;
    }

    /**
     * Get the [meta_keys] column value.
     *
     * @return string
     */
    public function getMetaKeys()
    {

        return $this->meta_keys;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = NavigationPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = NavigationPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [url] column.
     *
     * @param  string $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->url !== $v) {
            $this->url = $v;
            $this->modifiedColumns[] = NavigationPeer::URL;
        }


        return $this;
    } // setUrl()

    /**
     * Set the value of [route] column.
     *
     * @param  string $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setRoute($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->route !== $v) {
            $this->route = $v;
            $this->modifiedColumns[] = NavigationPeer::ROUTE;
        }


        return $this;
    } // setRoute()

    /**
     * Set the value of [parent_tree_id] column.
     *
     * @param  int $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setParentTreeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->parent_tree_id !== $v) {
            $this->parent_tree_id = $v;
            $this->modifiedColumns[] = NavigationPeer::PARENT_TREE_ID;
        }


        return $this;
    } // setParentTreeId()

    /**
     * Set the value of [category_level] column.
     *
     * @param  int $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setCategoryLevel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->category_level !== $v) {
            $this->category_level = $v;
            $this->modifiedColumns[] = NavigationPeer::CATEGORY_LEVEL;
        }


        return $this;
    } // setCategoryLevel()

    /**
     * Set the value of [ltf] column.
     *
     * @param  int $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setLtf($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->ltf !== $v) {
            $this->ltf = $v;
            $this->modifiedColumns[] = NavigationPeer::LTF;
        }


        return $this;
    } // setLtf()

    /**
     * Set the value of [rgt] column.
     *
     * @param  int $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setRgt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->rgt !== $v) {
            $this->rgt = $v;
            $this->modifiedColumns[] = NavigationPeer::RGT;
        }


        return $this;
    } // setRgt()

    /**
     * Set the value of [scope] column.
     *
     * @param  int $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setScope($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->scope !== $v) {
            $this->scope = $v;
            $this->modifiedColumns[] = NavigationPeer::SCOPE;
        }


        return $this;
    } // setScope()

    /**
     * Sets the value of the [display] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setDisplay($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->display !== $v) {
            $this->display = $v;
            $this->modifiedColumns[] = NavigationPeer::DISPLAY;
        }


        return $this;
    } // setDisplay()

    /**
     * Set the value of [meta_title] column.
     *
     * @param  string $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setMetaTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meta_title !== $v) {
            $this->meta_title = $v;
            $this->modifiedColumns[] = NavigationPeer::META_TITLE;
        }


        return $this;
    } // setMetaTitle()

    /**
     * Set the value of [meta_description] column.
     *
     * @param  string $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setMetaDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meta_description !== $v) {
            $this->meta_description = $v;
            $this->modifiedColumns[] = NavigationPeer::META_DESCRIPTION;
        }


        return $this;
    } // setMetaDescription()

    /**
     * Set the value of [meta_keys] column.
     *
     * @param  string $v new value
     * @return Navigation The current object (for fluent API support)
     */
    public function setMetaKeys($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->meta_keys !== $v) {
            $this->meta_keys = $v;
            $this->modifiedColumns[] = NavigationPeer::META_KEYS;
        }


        return $this;
    } // setMetaKeys()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Navigation The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = NavigationPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Navigation The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = NavigationPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->parent_tree_id !== 0) {
                return false;
            }

            if ($this->category_level !== 0) {
                return false;
            }

            if ($this->display !== true) {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->url = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->route = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->parent_tree_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->category_level = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->ltf = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->rgt = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->scope = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->display = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
            $this->meta_title = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->meta_description = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->meta_keys = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->created_at = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updated_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 15; // 15 = NavigationPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Navigation object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NavigationPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NavigationQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // nested_set behavior
            if ($this->isRoot()) {
                throw new PropelException('Deletion of a root node is disabled for nested sets. Use NavigationPeer::deleteTree($scope) instead to delete an entire tree');
            }

            if ($this->isInTree()) {
                $this->deleteDescendants($con);
            }

            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseNavigation:delete:pre') as $callable)
            {
              if (call_user_func($callable, $this, $con))
              {
                $con->commit();
                return;
              }
            }

            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                // nested_set behavior
                if ($this->isInTree()) {
                    // fill up the room that was used by the node
                    NavigationPeer::shiftRLValues(-2, $this->getRightValue() + 1, null, $this->getScopeValue(), $con);
                }

                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BaseNavigation:delete:post') as $callable)
                {
                  call_user_func($callable, $this, $con);
                }

                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // nested_set behavior
            if ($this->isNew() && $this->isRoot()) {
                // check if no other root exist in, the tree
                $nbRoots = NavigationQuery::create()
                    ->addUsingAlias(NavigationPeer::LEFT_COL, 1, Criteria::EQUAL)
                    ->addUsingAlias(NavigationPeer::SCOPE_COL, $this->getScopeValue(), Criteria::EQUAL)
                    ->count($con);
                if ($nbRoots > 0) {
                        throw new PropelException(sprintf('A root node already exists in this tree with scope "%s".', $this->getScopeValue()));
                }
            }
            $this->processNestedSetQueries($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BaseNavigation:save:pre') as $callable)
            {
              if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
              {
                  $con->commit();
                return $affectedRows;
              }
            }

            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // timestampable behavior
                if (!$this->isColumnModified(NavigationPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(NavigationPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(NavigationPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BaseNavigation:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                NavigationPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = NavigationPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . NavigationPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(NavigationPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(NavigationPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(NavigationPeer::URL)) {
            $modifiedColumns[':p' . $index++]  = '`url`';
        }
        if ($this->isColumnModified(NavigationPeer::ROUTE)) {
            $modifiedColumns[':p' . $index++]  = '`route`';
        }
        if ($this->isColumnModified(NavigationPeer::PARENT_TREE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`parent_tree_id`';
        }
        if ($this->isColumnModified(NavigationPeer::CATEGORY_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`category_level`';
        }
        if ($this->isColumnModified(NavigationPeer::LTF)) {
            $modifiedColumns[':p' . $index++]  = '`ltf`';
        }
        if ($this->isColumnModified(NavigationPeer::RGT)) {
            $modifiedColumns[':p' . $index++]  = '`rgt`';
        }
        if ($this->isColumnModified(NavigationPeer::SCOPE)) {
            $modifiedColumns[':p' . $index++]  = '`scope`';
        }
        if ($this->isColumnModified(NavigationPeer::DISPLAY)) {
            $modifiedColumns[':p' . $index++]  = '`display`';
        }
        if ($this->isColumnModified(NavigationPeer::META_TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`meta_title`';
        }
        if ($this->isColumnModified(NavigationPeer::META_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`meta_description`';
        }
        if ($this->isColumnModified(NavigationPeer::META_KEYS)) {
            $modifiedColumns[':p' . $index++]  = '`meta_keys`';
        }
        if ($this->isColumnModified(NavigationPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(NavigationPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `navigation` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`url`':
                        $stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
                        break;
                    case '`route`':
                        $stmt->bindValue($identifier, $this->route, PDO::PARAM_STR);
                        break;
                    case '`parent_tree_id`':
                        $stmt->bindValue($identifier, $this->parent_tree_id, PDO::PARAM_INT);
                        break;
                    case '`category_level`':
                        $stmt->bindValue($identifier, $this->category_level, PDO::PARAM_INT);
                        break;
                    case '`ltf`':
                        $stmt->bindValue($identifier, $this->ltf, PDO::PARAM_INT);
                        break;
                    case '`rgt`':
                        $stmt->bindValue($identifier, $this->rgt, PDO::PARAM_INT);
                        break;
                    case '`scope`':
                        $stmt->bindValue($identifier, $this->scope, PDO::PARAM_INT);
                        break;
                    case '`display`':
                        $stmt->bindValue($identifier, (int) $this->display, PDO::PARAM_INT);
                        break;
                    case '`meta_title`':
                        $stmt->bindValue($identifier, $this->meta_title, PDO::PARAM_STR);
                        break;
                    case '`meta_description`':
                        $stmt->bindValue($identifier, $this->meta_description, PDO::PARAM_STR);
                        break;
                    case '`meta_keys`':
                        $stmt->bindValue($identifier, $this->meta_keys, PDO::PARAM_STR);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = NavigationPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = NavigationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getUrl();
                break;
            case 3:
                return $this->getRoute();
                break;
            case 4:
                return $this->getParentTreeId();
                break;
            case 5:
                return $this->getCategoryLevel();
                break;
            case 6:
                return $this->getLtf();
                break;
            case 7:
                return $this->getRgt();
                break;
            case 8:
                return $this->getScope();
                break;
            case 9:
                return $this->getDisplay();
                break;
            case 10:
                return $this->getMetaTitle();
                break;
            case 11:
                return $this->getMetaDescription();
                break;
            case 12:
                return $this->getMetaKeys();
                break;
            case 13:
                return $this->getCreatedAt();
                break;
            case 14:
                return $this->getUpdatedAt();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['Navigation'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Navigation'][$this->getPrimaryKey()] = true;
        $keys = NavigationPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getUrl(),
            $keys[3] => $this->getRoute(),
            $keys[4] => $this->getParentTreeId(),
            $keys[5] => $this->getCategoryLevel(),
            $keys[6] => $this->getLtf(),
            $keys[7] => $this->getRgt(),
            $keys[8] => $this->getScope(),
            $keys[9] => $this->getDisplay(),
            $keys[10] => $this->getMetaTitle(),
            $keys[11] => $this->getMetaDescription(),
            $keys[12] => $this->getMetaKeys(),
            $keys[13] => $this->getCreatedAt(),
            $keys[14] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = NavigationPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setUrl($value);
                break;
            case 3:
                $this->setRoute($value);
                break;
            case 4:
                $this->setParentTreeId($value);
                break;
            case 5:
                $this->setCategoryLevel($value);
                break;
            case 6:
                $this->setLtf($value);
                break;
            case 7:
                $this->setRgt($value);
                break;
            case 8:
                $this->setScope($value);
                break;
            case 9:
                $this->setDisplay($value);
                break;
            case 10:
                $this->setMetaTitle($value);
                break;
            case 11:
                $this->setMetaDescription($value);
                break;
            case 12:
                $this->setMetaKeys($value);
                break;
            case 13:
                $this->setCreatedAt($value);
                break;
            case 14:
                $this->setUpdatedAt($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = NavigationPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setUrl($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRoute($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setParentTreeId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCategoryLevel($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLtf($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setRgt($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setScope($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setDisplay($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setMetaTitle($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setMetaDescription($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setMetaKeys($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(NavigationPeer::DATABASE_NAME);

        if ($this->isColumnModified(NavigationPeer::ID)) $criteria->add(NavigationPeer::ID, $this->id);
        if ($this->isColumnModified(NavigationPeer::NAME)) $criteria->add(NavigationPeer::NAME, $this->name);
        if ($this->isColumnModified(NavigationPeer::URL)) $criteria->add(NavigationPeer::URL, $this->url);
        if ($this->isColumnModified(NavigationPeer::ROUTE)) $criteria->add(NavigationPeer::ROUTE, $this->route);
        if ($this->isColumnModified(NavigationPeer::PARENT_TREE_ID)) $criteria->add(NavigationPeer::PARENT_TREE_ID, $this->parent_tree_id);
        if ($this->isColumnModified(NavigationPeer::CATEGORY_LEVEL)) $criteria->add(NavigationPeer::CATEGORY_LEVEL, $this->category_level);
        if ($this->isColumnModified(NavigationPeer::LTF)) $criteria->add(NavigationPeer::LTF, $this->ltf);
        if ($this->isColumnModified(NavigationPeer::RGT)) $criteria->add(NavigationPeer::RGT, $this->rgt);
        if ($this->isColumnModified(NavigationPeer::SCOPE)) $criteria->add(NavigationPeer::SCOPE, $this->scope);
        if ($this->isColumnModified(NavigationPeer::DISPLAY)) $criteria->add(NavigationPeer::DISPLAY, $this->display);
        if ($this->isColumnModified(NavigationPeer::META_TITLE)) $criteria->add(NavigationPeer::META_TITLE, $this->meta_title);
        if ($this->isColumnModified(NavigationPeer::META_DESCRIPTION)) $criteria->add(NavigationPeer::META_DESCRIPTION, $this->meta_description);
        if ($this->isColumnModified(NavigationPeer::META_KEYS)) $criteria->add(NavigationPeer::META_KEYS, $this->meta_keys);
        if ($this->isColumnModified(NavigationPeer::CREATED_AT)) $criteria->add(NavigationPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(NavigationPeer::UPDATED_AT)) $criteria->add(NavigationPeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(NavigationPeer::DATABASE_NAME);
        $criteria->add(NavigationPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Navigation (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setUrl($this->getUrl());
        $copyObj->setRoute($this->getRoute());
        $copyObj->setParentTreeId($this->getParentTreeId());
        $copyObj->setCategoryLevel($this->getCategoryLevel());
        $copyObj->setLtf($this->getLtf());
        $copyObj->setRgt($this->getRgt());
        $copyObj->setScope($this->getScope());
        $copyObj->setDisplay($this->getDisplay());
        $copyObj->setMetaTitle($this->getMetaTitle());
        $copyObj->setMetaDescription($this->getMetaDescription());
        $copyObj->setMetaKeys($this->getMetaKeys());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Navigation Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return NavigationPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NavigationPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->url = null;
        $this->route = null;
        $this->parent_tree_id = null;
        $this->category_level = null;
        $this->ltf = null;
        $this->rgt = null;
        $this->scope = null;
        $this->display = null;
        $this->meta_title = null;
        $this->meta_description = null;
        $this->meta_keys = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        // nested_set behavior
        $this->collNestedSetChildren = null;
        $this->aNestedSetParent = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NavigationPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     Navigation The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = NavigationPeer::UPDATED_AT;

        return $this;
    }

    // nested_set behavior

    /**
     * Execute queries that were saved to be run inside the save transaction
     */
    protected function processNestedSetQueries($con)
    {
        foreach ($this->nestedSetQueries as $query) {
            $query['arguments'][]= $con;
            call_user_func_array($query['callable'], $query['arguments']);
        }
        $this->nestedSetQueries = array();
    }

    /**
     * Proxy getter method for the left value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set left value
     */
    public function getLeftValue()
    {
        return $this->ltf;
    }

    /**
     * Proxy getter method for the right value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set right value
     */
    public function getRightValue()
    {
        return $this->rgt;
    }

    /**
     * Proxy getter method for the level value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set level value
     */
    public function getLevel()
    {
        return $this->category_level;
    }

    /**
     * Proxy getter method for the scope value of the nested set model.
     * It provides a generic way to get the value, whatever the actual column name is.
     *
     * @return     int The nested set scope value
     */
    public function getScopeValue()
    {
        return $this->scope;
    }

    /**
     * Proxy setter method for the left value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set left value
     * @return     Navigation The current object (for fluent API support)
     */
    public function setLeftValue($v)
    {
        return $this->setLtf($v);
    }

    /**
     * Proxy setter method for the right value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set right value
     * @return     Navigation The current object (for fluent API support)
     */
    public function setRightValue($v)
    {
        return $this->setRgt($v);
    }

    /**
     * Proxy setter method for the level value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set level value
     * @return     Navigation The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        return $this->setCategoryLevel($v);
    }

    /**
     * Proxy setter method for the scope value of the nested set model.
     * It provides a generic way to set the value, whatever the actual column name is.
     *
     * @param      int $v The nested set scope value
     * @return     Navigation The current object (for fluent API support)
     */
    public function setScopeValue($v)
    {
        return $this->setScope($v);
    }

    /**
     * Creates the supplied node as the root node.
     *
     * @return     Navigation The current object (for fluent API support)
     * @throws     PropelException
     */
    public function makeRoot()
    {
        if ($this->getLeftValue() || $this->getRightValue()) {
            throw new PropelException('Cannot turn an existing node into a root node.');
        }

        $this->setLeftValue(1);
        $this->setRightValue(2);
        $this->setLevel(0);

        return $this;
    }

    /**
     * Tests if onbject is a node, i.e. if it is inserted in the tree
     *
     * @return     bool
     */
    public function isInTree()
    {
        return $this->getLeftValue() > 0 && $this->getRightValue() > $this->getLeftValue();
    }

    /**
     * Tests if node is a root
     *
     * @return     bool
     */
    public function isRoot()
    {
        return $this->isInTree() && $this->getLeftValue() == 1;
    }

    /**
     * Tests if node is a leaf
     *
     * @return     bool
     */
    public function isLeaf()
    {
        return $this->isInTree() &&  ($this->getRightValue() - $this->getLeftValue()) == 1;
    }

    /**
     * Tests if node is a descendant of another node
     *
     * @param      Navigation $node Propel node object
     * @return     bool
     */
    public function isDescendantOf($parent)
    {
        if ($this->getScopeValue() !== $parent->getScopeValue()) {
            return false; //since the `this` and $parent are in different scopes, there's no way that `this` is be a descendant of $parent.
        }

        return $this->isInTree() && $this->getLeftValue() > $parent->getLeftValue() && $this->getRightValue() < $parent->getRightValue();
    }

    /**
     * Tests if node is a ancestor of another node
     *
     * @param      Navigation $node Propel node object
     * @return     bool
     */
    public function isAncestorOf($child)
    {
        return $child->isDescendantOf($this);
    }

    /**
     * Tests if object has an ancestor
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasParent(PropelPDO $con = null)
    {
        return $this->getLevel() > 0;
    }

    /**
     * Sets the cache for parent node of the current object.
     * Warning: this does not move the current object in the tree.
     * Use moveTofirstChildOf() or moveToLastChildOf() for that purpose
     *
     * @param      Navigation $parent
     * @return     Navigation The current object, for fluid interface
     */
    public function setParent($parent = null)
    {
        $this->aNestedSetParent = $parent;

        return $this;
    }

    /**
     * Gets parent node for the current object if it exists
     * The result is cached so further calls to the same method don't issue any queries
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getParent(PropelPDO $con = null)
    {
        if ($this->aNestedSetParent === null && $this->hasParent()) {
            $this->aNestedSetParent = NavigationQuery::create()
                ->ancestorsOf($this)
                ->orderByLevel(true)
                ->findOne($con);
        }

        return $this->aNestedSetParent;
    }

    /**
     * Determines if the node has previous sibling
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasPrevSibling(PropelPDO $con = null)
    {
        if (!NavigationPeer::isValid($this)) {
            return false;
        }

        return NavigationQuery::create()
            ->filterByRgt($this->getLeftValue() - 1)
            ->inTree($this->getScopeValue())
            ->count($con) > 0;
    }

    /**
     * Gets previous sibling for the given node if it exists
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getPrevSibling(PropelPDO $con = null)
    {
        return NavigationQuery::create()
            ->filterByRgt($this->getLeftValue() - 1)
            ->inTree($this->getScopeValue())
            ->findOne($con);
    }

    /**
     * Determines if the node has next sibling
     *
     * @param      PropelPDO $con Connection to use.
     * @return     bool
     */
    public function hasNextSibling(PropelPDO $con = null)
    {
        if (!NavigationPeer::isValid($this)) {
            return false;
        }

        return NavigationQuery::create()
            ->filterByLtf($this->getRightValue() + 1)
            ->inTree($this->getScopeValue())
            ->count($con) > 0;
    }

    /**
     * Gets next sibling for the given node if it exists
     *
     * @param      PropelPDO $con Connection to use.
     * @return     mixed 		Propel object if exists else false
     */
    public function getNextSibling(PropelPDO $con = null)
    {
        return NavigationQuery::create()
            ->filterByLtf($this->getRightValue() + 1)
            ->inTree($this->getScopeValue())
            ->findOne($con);
    }

    /**
     * Clears out the $collNestedSetChildren collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return     void
     */
    public function clearNestedSetChildren()
    {
        $this->collNestedSetChildren = null;
    }

    /**
     * Initializes the $collNestedSetChildren collection.
     *
     * @return     void
     */
    public function initNestedSetChildren()
    {
        $this->collNestedSetChildren = new PropelObjectCollection();
        $this->collNestedSetChildren->setModel('Navigation');
    }

    /**
     * Adds an element to the internal $collNestedSetChildren collection.
     * Beware that this doesn't insert a node in the tree.
     * This method is only used to facilitate children hydration.
     *
     * @param      Navigation $navigation
     *
     * @return     void
     */
    public function addNestedSetChild($navigation)
    {
        if ($this->collNestedSetChildren === null) {
            $this->initNestedSetChildren();
        }
        if (!in_array($navigation, $this->collNestedSetChildren->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->collNestedSetChildren[]= $navigation;
            $navigation->setParent($this);
        }
    }

    /**
     * Tests if node has children
     *
     * @return     bool
     */
    public function hasChildren()
    {
        return ($this->getRightValue() - $this->getLeftValue()) > 1;
    }

    /**
     * Gets the children of the given node
     *
     * @param      Criteria  $criteria Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array     List of Navigation objects
     */
    public function getChildren($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNestedSetChildren || null !== $criteria) {
            if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
                // return empty collection
                $this->initNestedSetChildren();
            } else {
                $collNestedSetChildren = NavigationQuery::create(null, $criteria)
                  ->childrenOf($this)
                  ->orderByBranch()
                    ->find($con);
                if (null !== $criteria) {
                    return $collNestedSetChildren;
                }
                $this->collNestedSetChildren = $collNestedSetChildren;
            }
        }

        return $this->collNestedSetChildren;
    }

    /**
     * Gets number of children for the given node
     *
     * @param      Criteria  $criteria Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     int       Number of children
     */
    public function countChildren($criteria = null, PropelPDO $con = null)
    {
        if (null === $this->collNestedSetChildren || null !== $criteria) {
            if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
                return 0;
            } else {
                return NavigationQuery::create(null, $criteria)
                    ->childrenOf($this)
                    ->count($con);
            }
        } else {
            return count($this->collNestedSetChildren);
        }
    }

    /**
     * Gets the first child of the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Navigation objects
     */
    public function getFirstChild($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return NavigationQuery::create(null, $query)
                ->childrenOf($this)
                ->orderByBranch()
                ->findOne($con);
        }
    }

    /**
     * Gets the last child of the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Navigation objects
     */
    public function getLastChild($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return NavigationQuery::create(null, $query)
                ->childrenOf($this)
                ->orderByBranch(true)
                ->findOne($con);
        }
    }

    /**
     * Gets the siblings of the given node
     *
     * @param      bool			$includeNode Whether to include the current node or not
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     *
     * @return     array 		List of Navigation objects
     */
    public function getSiblings($includeNode = false, $query = null, PropelPDO $con = null)
    {
        if ($this->isRoot()) {
            return array();
        } else {
             $query = NavigationQuery::create(null, $query)
                    ->childrenOf($this->getParent($con))
                    ->orderByBranch();
            if (!$includeNode) {
                $query->prune($this);
            }

            return $query->find($con);
        }
    }

    /**
     * Gets descendants for the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Navigation objects
     */
    public function getDescendants($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            return array();
        } else {
            return NavigationQuery::create(null, $query)
                ->descendantsOf($this)
                ->orderByBranch()
                ->find($con);
        }
    }

    /**
     * Gets number of descendants for the given node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     int 		Number of descendants
     */
    public function countDescendants($query = null, PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            // save one query
            return 0;
        } else {
            return NavigationQuery::create(null, $query)
                ->descendantsOf($this)
                ->count($con);
        }
    }

    /**
     * Gets descendants for the given node, plus the current node
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Navigation objects
     */
    public function getBranch($query = null, PropelPDO $con = null)
    {
        return NavigationQuery::create(null, $query)
            ->branchOf($this)
            ->orderByBranch()
            ->find($con);
    }

    /**
     * Gets ancestors for the given node, starting with the root node
     * Use it for breadcrumb paths for instance
     *
     * @param      Criteria $query Criteria to filter results.
     * @param      PropelPDO $con Connection to use.
     * @return     array 		List of Navigation objects
     */
    public function getAncestors($query = null, PropelPDO $con = null)
    {
        if ($this->isRoot()) {
            // save one query
            return array();
        } else {
            return NavigationQuery::create(null, $query)
                ->ancestorsOf($this)
                ->orderByBranch()
                ->find($con);
        }
    }

    /**
     * Inserts the given $child node as first child of current
     * The modifications in the current object and the tree
     * are not persisted until the child object is saved.
     *
     * @param      Navigation $child	Propel object for child node
     *
     * @return     Navigation The current Propel object
     */
    public function addChild(Navigation $child)
    {
        if ($this->isNew()) {
            throw new PropelException('A Navigation object must not be new to accept children.');
        }
        $child->insertAsFirstChildOf($this);

        return $this;
    }

    /**
     * Inserts the current node as first child of given $parent node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Navigation $parent	Propel object for parent node
     *
     * @return     Navigation The current Propel object
     */
    public function insertAsFirstChildOf($parent)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Navigation object must not already be in the tree to be inserted. Use the moveToFirstChildOf() instead.');
        }
        $left = $parent->getLeftValue() + 1;
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($parent->getLevel() + 1);
        $scope = $parent->getScopeValue();
        $this->setScopeValue($scope);
        // update the children collection of the parent
        $parent->addNestedSetChild($this);

        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('NavigationPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as last child of given $parent node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Navigation $parent	Propel object for parent node
     *
     * @return     Navigation The current Propel object
     */
    public function insertAsLastChildOf($parent)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Navigation object must not already be in the tree to be inserted. Use the moveToLastChildOf() instead.');
        }
        $left = $parent->getRightValue();
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($parent->getLevel() + 1);
        $scope = $parent->getScopeValue();
        $this->setScopeValue($scope);
        // update the children collection of the parent
        $parent->addNestedSetChild($this);

        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('NavigationPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as prev sibling given $sibling node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Navigation $sibling	Propel object for parent node
     *
     * @return     Navigation The current Propel object
     */
    public function insertAsPrevSiblingOf($sibling)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Navigation object must not already be in the tree to be inserted. Use the moveToPrevSiblingOf() instead.');
        }
        $left = $sibling->getLeftValue();
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($sibling->getLevel());
        $scope = $sibling->getScopeValue();
        $this->setScopeValue($scope);
        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('NavigationPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Inserts the current node as next sibling given $sibling node
     * The modifications in the current object and the tree
     * are not persisted until the current object is saved.
     *
     * @param      Navigation $sibling	Propel object for parent node
     *
     * @return     Navigation The current Propel object
     */
    public function insertAsNextSiblingOf($sibling)
    {
        if ($this->isInTree()) {
            throw new PropelException('A Navigation object must not already be in the tree to be inserted. Use the moveToNextSiblingOf() instead.');
        }
        $left = $sibling->getRightValue() + 1;
        // Update node properties
        $this->setLeftValue($left);
        $this->setRightValue($left + 1);
        $this->setLevel($sibling->getLevel());
        $scope = $sibling->getScopeValue();
        $this->setScopeValue($scope);
        // Keep the tree modification query for the save() transaction
        $this->nestedSetQueries []= array(
            'callable'  => array('NavigationPeer', 'makeRoomForLeaf'),
            'arguments' => array($left, $scope, $this->isNew() ? null : $this)
        );

        return $this;
    }

    /**
     * Moves current node and its subtree to be the first child of $parent
     * The modifications in the current object and the tree are immediate
     *
     * @param      Navigation $parent	Propel object for parent node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Navigation The current Propel object
     */
    public function moveToFirstChildOf($parent, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Navigation object must be already in the tree to be moved. Use the insertAsFirstChildOf() instead.');
        }
        if ($parent->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($parent->getLeftValue() + 1, $parent->getLevel() - $this->getLevel() + 1, $parent->getScopeValue(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the last child of $parent
     * The modifications in the current object and the tree are immediate
     *
     * @param      Navigation $parent	Propel object for parent node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Navigation The current Propel object
     */
    public function moveToLastChildOf($parent, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Navigation object must be already in the tree to be moved. Use the insertAsLastChildOf() instead.');
        }
        if ($parent->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($parent->getRightValue(), $parent->getLevel() - $this->getLevel() + 1, $parent->getScopeValue(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the previous sibling of $sibling
     * The modifications in the current object and the tree are immediate
     *
     * @param      Navigation $sibling	Propel object for sibling node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Navigation The current Propel object
     */
    public function moveToPrevSiblingOf($sibling, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Navigation object must be already in the tree to be moved. Use the insertAsPrevSiblingOf() instead.');
        }
        if ($sibling->isRoot()) {
            throw new PropelException('Cannot move to previous sibling of a root node.');
        }
        if ($sibling->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($sibling->getLeftValue(), $sibling->getLevel() - $this->getLevel(), $sibling->getScopeValue(), $con);

        return $this;
    }

    /**
     * Moves current node and its subtree to be the next sibling of $sibling
     * The modifications in the current object and the tree are immediate
     *
     * @param      Navigation $sibling	Propel object for sibling node
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Navigation The current Propel object
     */
    public function moveToNextSiblingOf($sibling, PropelPDO $con = null)
    {
        if (!$this->isInTree()) {
            throw new PropelException('A Navigation object must be already in the tree to be moved. Use the insertAsNextSiblingOf() instead.');
        }
        if ($sibling->isRoot()) {
            throw new PropelException('Cannot move to next sibling of a root node.');
        }
        if ($sibling->isDescendantOf($this)) {
            throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
        }

        $this->moveSubtreeTo($sibling->getRightValue() + 1, $sibling->getLevel() - $this->getLevel(), $sibling->getScopeValue(), $con);

        return $this;
    }

    /**
     * Move current node and its children to location $destLeft and updates rest of tree
     *
     * @param      int	$destLeft Destination left value
     * @param      int	$levelDelta Delta to add to the levels
     * @param      PropelPDO $con		Connection to use.
     */
    protected function moveSubtreeTo($destLeft, $levelDelta, $targetScope = null, PropelPDO $con = null)
    {
        $preventDefault = false;
        $left  = $this->getLeftValue();
        $right = $this->getRightValue();
        $scope = $this->getScopeValue();

        if ($targetScope === null) {
            $targetScope = $scope;
        }


        $treeSize = $right - $left +1;

        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {

            // make room next to the target for the subtree
            NavigationPeer::shiftRLValues($treeSize, $destLeft, null, $targetScope, $con);



            if ($targetScope != $scope) {

                //move subtree to < 0, so the items are out of scope.
                NavigationPeer::shiftRLValues(-$right, $left, $right, $scope, $con);

                //update scopes
                NavigationPeer::setNegativeScope($targetScope, $con);

                //update levels
                NavigationPeer::shiftLevel($levelDelta, $left - $right, 0, $targetScope, $con);

                //move the subtree to the target
                NavigationPeer::shiftRLValues(($right - $left) + $destLeft, $left - $right, 0, $targetScope, $con);


                $preventDefault = true;
            }


            if (!$preventDefault) {


                if ($left >= $destLeft) { // src was shifted too?
                    $left += $treeSize;
                    $right += $treeSize;
                }

                if ($levelDelta) {
                    // update the levels of the subtree
                    NavigationPeer::shiftLevel($levelDelta, $left, $right, $scope, $con);
                }

                // move the subtree to the target
                NavigationPeer::shiftRLValues($destLeft - $left, $left, $right, $scope, $con);
            }

            // remove the empty room at the previous location of the subtree
            NavigationPeer::shiftRLValues(-$treeSize, $right + 1, null, $scope, $con);

            // update all loaded nodes
            NavigationPeer::updateLoadedNodes(null, $con);

            $con->commit();
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }
    }

    /**
     * Deletes all descendants for the given node
     * Instance pooling is wiped out by this command,
     * so existing Navigation instances are probably invalid (except for the current one)
     *
     * @param      PropelPDO $con Connection to use.
     *
     * @return     int 		number of deleted nodes
     */
    public function deleteDescendants(PropelPDO $con = null)
    {
        if ($this->isLeaf()) {
            // save one query
            return;
        }
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $left = $this->getLeftValue();
        $right = $this->getRightValue();
        $scope = $this->getScopeValue();
        $con->beginTransaction();
        try {
            // delete descendant nodes (will empty the instance pool)
            $ret = NavigationQuery::create()
                ->descendantsOf($this)
                ->delete($con);

            // fill up the room that was used by descendants
            NavigationPeer::shiftRLValues($left - $right + 1, $right, null, $scope, $con);

            // fix the right value for the current node, which is now a leaf
            $this->setRightValue($left + 1);

            $con->commit();
        } catch (Exception $e) {
            $con->rollback();
            throw $e;
        }

        return $ret;
    }

    /**
     * Returns a pre-order iterator for this node and its children.
     *
     * @return     RecursiveIterator
     */
    public function getIterator()
    {
        return new NestedSetRecursiveIterator($this);
    }

    /**
     * Alias for makeRoot(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        makeRoot
     */
    public function createRoot()
    {
        return $this->makeRoot();
    }

    /**
     * Alias for getParent(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        getParent
     */
    public function retrieveParent(PropelPDO $con = null)
    {
        return $this->getParent($con);
    }

    /**
     * Alias for setParent(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        setParent
     */
    public function setParentNode($parent = null)
    {
        return $this->setParent($parent);
    }

    /**
     * Alias for countDescendants(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        setParent
     */
    public function getNumberOfDescendants(PropelPDO $con = null)
    {
        return $this->countDescendants(null, $con);
    }

    /**
     * Alias for countChildren(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        setParent
     */
    public function getNumberOfChildren(PropelPDO $con = null)
    {
        return $this->countChildren(null, $con);
    }

    /**
     * Alias for getPrevSibling(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        getParent
     */
    public function retrievePrevSibling(PropelPDO $con = null)
    {
        return $this->getPrevSibling($con);
    }

    /**
     * Alias for getNextSibling(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        getParent
     */
    public function retrieveNextSibling(PropelPDO $con = null)
    {
        return $this->getNextSibling($con);
    }

    /**
     * Alias for getFirstChild(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        getParent
     */
    public function retrieveFirstChild(PropelPDO $con = null)
    {
        return $this->getFirstChild(null, $con);
    }

    /**
     * Alias for getLastChild(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        getParent
     */
    public function retrieveLastChild(PropelPDO $con = null)
    {
        return $this->getLastChild(null, $con);
    }

    /**
     * Alias for getAncestors(), for BC with Propel 1.4 nested sets
     *
     * @deprecated since 1.5
     * @see        getAncestors
     */
    public function getPath(PropelPDO $con = null)
    {
        $path = $this->getAncestors(null, $con);
        $path []= $this;

        return $path;
    }

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {

        // symfony_behaviors behavior
        if ($callable = sfMixer::getCallable('BaseNavigation:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
