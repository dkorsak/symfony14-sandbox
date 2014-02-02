<?php


/**
 * Base class that represents a row from the 'sf_guard_group' table.
 *
 *
 *
 * @package    propel.generator.plugins.sfGuardPlugin.lib.model.om
 */
abstract class BasesfGuardGroup extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'sfGuardGroupPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        sfGuardGroupPeer
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
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * @var        PropelObjectCollection|sfGuardGroupPermission[] Collection to store aggregation of sfGuardGroupPermission objects.
     */
    protected $collsfGuardGroupPermissions;
    protected $collsfGuardGroupPermissionsPartial;

    /**
     * @var        PropelObjectCollection|sfGuardUserGroup[] Collection to store aggregation of sfGuardUserGroup objects.
     */
    protected $collsfGuardUserGroups;
    protected $collsfGuardUserGroupsPartial;

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

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardGroupPermissionsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sfGuardUserGroupsScheduledForDeletion = null;

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
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {

        return $this->description;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = sfGuardGroupPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = sfGuardGroupPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [description] column.
     *
     * @param  string $v new value
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = sfGuardGroupPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

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
            $this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = sfGuardGroupPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating sfGuardGroup object", $e);
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
            $con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = sfGuardGroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collsfGuardGroupPermissions = null;

            $this->collsfGuardUserGroups = null;

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
            $con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = sfGuardGroupQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BasesfGuardGroup:delete:pre') as $callable)
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
                // symfony_behaviors behavior
                foreach (sfMixer::getCallables('BasesfGuardGroup:delete:post') as $callable)
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
            $con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            // symfony_behaviors behavior
            foreach (sfMixer::getCallables('BasesfGuardGroup:save:pre') as $callable)
            {
              if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
              {
                  $con->commit();
                return $affectedRows;
              }
            }

            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
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
                foreach (sfMixer::getCallables('BasesfGuardGroup:save:post') as $callable)
                {
                  call_user_func($callable, $this, $con, $affectedRows);
                }

                sfGuardGroupPeer::addInstanceToPool($this);
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

            if ($this->sfGuardGroupPermissionsScheduledForDeletion !== null) {
                if (!$this->sfGuardGroupPermissionsScheduledForDeletion->isEmpty()) {
                    sfGuardGroupPermissionQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardGroupPermissionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardGroupPermissionsScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardGroupPermissions !== null) {
                foreach ($this->collsfGuardGroupPermissions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sfGuardUserGroupsScheduledForDeletion !== null) {
                if (!$this->sfGuardUserGroupsScheduledForDeletion->isEmpty()) {
                    sfGuardUserGroupQuery::create()
                        ->filterByPrimaryKeys($this->sfGuardUserGroupsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sfGuardUserGroupsScheduledForDeletion = null;
                }
            }

            if ($this->collsfGuardUserGroups !== null) {
                foreach ($this->collsfGuardUserGroups as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = sfGuardGroupPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . sfGuardGroupPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(sfGuardGroupPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(sfGuardGroupPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(sfGuardGroupPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }

        $sql = sprintf(
            'INSERT INTO `sf_guard_group` (%s) VALUES (%s)',
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
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
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


            if (($retval = sfGuardGroupPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collsfGuardGroupPermissions !== null) {
                    foreach ($this->collsfGuardGroupPermissions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collsfGuardUserGroups !== null) {
                    foreach ($this->collsfGuardUserGroups as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
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
        $pos = sfGuardGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDescription();
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
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['sfGuardGroup'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['sfGuardGroup'][$this->getPrimaryKey()] = true;
        $keys = sfGuardGroupPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getDescription(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collsfGuardGroupPermissions) {
                $result['sfGuardGroupPermissions'] = $this->collsfGuardGroupPermissions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collsfGuardUserGroups) {
                $result['sfGuardUserGroups'] = $this->collsfGuardUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
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
        $pos = sfGuardGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDescription($value);
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
        $keys = sfGuardGroupPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(sfGuardGroupPeer::DATABASE_NAME);

        if ($this->isColumnModified(sfGuardGroupPeer::ID)) $criteria->add(sfGuardGroupPeer::ID, $this->id);
        if ($this->isColumnModified(sfGuardGroupPeer::NAME)) $criteria->add(sfGuardGroupPeer::NAME, $this->name);
        if ($this->isColumnModified(sfGuardGroupPeer::DESCRIPTION)) $criteria->add(sfGuardGroupPeer::DESCRIPTION, $this->description);

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
        $criteria = new Criteria(sfGuardGroupPeer::DATABASE_NAME);
        $criteria->add(sfGuardGroupPeer::ID, $this->id);

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
     * @param object $copyObj An object of sfGuardGroup (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setDescription($this->getDescription());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getsfGuardGroupPermissions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardGroupPermission($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getsfGuardUserGroups() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addsfGuardUserGroup($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

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
     * @return sfGuardGroup Clone of current object.
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
     * @return sfGuardGroupPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new sfGuardGroupPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('sfGuardGroupPermission' == $relationName) {
            $this->initsfGuardGroupPermissions();
        }
        if ('sfGuardUserGroup' == $relationName) {
            $this->initsfGuardUserGroups();
        }
    }

    /**
     * Clears out the collsfGuardGroupPermissions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return sfGuardGroup The current object (for fluent API support)
     * @see        addsfGuardGroupPermissions()
     */
    public function clearsfGuardGroupPermissions()
    {
        $this->collsfGuardGroupPermissions = null; // important to set this to null since that means it is uninitialized
        $this->collsfGuardGroupPermissionsPartial = null;

        return $this;
    }

    /**
     * reset is the collsfGuardGroupPermissions collection loaded partially
     *
     * @return void
     */
    public function resetPartialsfGuardGroupPermissions($v = true)
    {
        $this->collsfGuardGroupPermissionsPartial = $v;
    }

    /**
     * Initializes the collsfGuardGroupPermissions collection.
     *
     * By default this just sets the collsfGuardGroupPermissions collection to an empty array (like clearcollsfGuardGroupPermissions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardGroupPermissions($overrideExisting = true)
    {
        if (null !== $this->collsfGuardGroupPermissions && !$overrideExisting) {
            return;
        }
        $this->collsfGuardGroupPermissions = new PropelObjectCollection();
        $this->collsfGuardGroupPermissions->setModel('sfGuardGroupPermission');
    }

    /**
     * Gets an array of sfGuardGroupPermission objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardGroupPermission[] List of sfGuardGroupPermission objects
     * @throws PropelException
     */
    public function getsfGuardGroupPermissions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collsfGuardGroupPermissionsPartial && !$this->isNew();
        if (null === $this->collsfGuardGroupPermissions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collsfGuardGroupPermissions) {
                // return empty collection
                $this->initsfGuardGroupPermissions();
            } else {
                $collsfGuardGroupPermissions = sfGuardGroupPermissionQuery::create(null, $criteria)
                    ->filterBysfGuardGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collsfGuardGroupPermissionsPartial && count($collsfGuardGroupPermissions)) {
                      $this->initsfGuardGroupPermissions(false);

                      foreach ($collsfGuardGroupPermissions as $obj) {
                        if (false == $this->collsfGuardGroupPermissions->contains($obj)) {
                          $this->collsfGuardGroupPermissions->append($obj);
                        }
                      }

                      $this->collsfGuardGroupPermissionsPartial = true;
                    }

                    $collsfGuardGroupPermissions->getInternalIterator()->rewind();

                    return $collsfGuardGroupPermissions;
                }

                if ($partial && $this->collsfGuardGroupPermissions) {
                    foreach ($this->collsfGuardGroupPermissions as $obj) {
                        if ($obj->isNew()) {
                            $collsfGuardGroupPermissions[] = $obj;
                        }
                    }
                }

                $this->collsfGuardGroupPermissions = $collsfGuardGroupPermissions;
                $this->collsfGuardGroupPermissionsPartial = false;
            }
        }

        return $this->collsfGuardGroupPermissions;
    }

    /**
     * Sets a collection of sfGuardGroupPermission objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sfGuardGroupPermissions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function setsfGuardGroupPermissions(PropelCollection $sfGuardGroupPermissions, PropelPDO $con = null)
    {
        $sfGuardGroupPermissionsToDelete = $this->getsfGuardGroupPermissions(new Criteria(), $con)->diff($sfGuardGroupPermissions);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->sfGuardGroupPermissionsScheduledForDeletion = clone $sfGuardGroupPermissionsToDelete;

        foreach ($sfGuardGroupPermissionsToDelete as $sfGuardGroupPermissionRemoved) {
            $sfGuardGroupPermissionRemoved->setsfGuardGroup(null);
        }

        $this->collsfGuardGroupPermissions = null;
        foreach ($sfGuardGroupPermissions as $sfGuardGroupPermission) {
            $this->addsfGuardGroupPermission($sfGuardGroupPermission);
        }

        $this->collsfGuardGroupPermissions = $sfGuardGroupPermissions;
        $this->collsfGuardGroupPermissionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related sfGuardGroupPermission objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related sfGuardGroupPermission objects.
     * @throws PropelException
     */
    public function countsfGuardGroupPermissions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collsfGuardGroupPermissionsPartial && !$this->isNew();
        if (null === $this->collsfGuardGroupPermissions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collsfGuardGroupPermissions) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getsfGuardGroupPermissions());
            }
            $query = sfGuardGroupPermissionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBysfGuardGroup($this)
                ->count($con);
        }

        return count($this->collsfGuardGroupPermissions);
    }

    /**
     * Method called to associate a sfGuardGroupPermission object to this object
     * through the sfGuardGroupPermission foreign key attribute.
     *
     * @param    sfGuardGroupPermission $l sfGuardGroupPermission
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function addsfGuardGroupPermission(sfGuardGroupPermission $l)
    {
        if ($this->collsfGuardGroupPermissions === null) {
            $this->initsfGuardGroupPermissions();
            $this->collsfGuardGroupPermissionsPartial = true;
        }

        if (!in_array($l, $this->collsfGuardGroupPermissions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardGroupPermission($l);

            if ($this->sfGuardGroupPermissionsScheduledForDeletion and $this->sfGuardGroupPermissionsScheduledForDeletion->contains($l)) {
                $this->sfGuardGroupPermissionsScheduledForDeletion->remove($this->sfGuardGroupPermissionsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	sfGuardGroupPermission $sfGuardGroupPermission The sfGuardGroupPermission object to add.
     */
    protected function doAddsfGuardGroupPermission($sfGuardGroupPermission)
    {
        $this->collsfGuardGroupPermissions[]= $sfGuardGroupPermission;
        $sfGuardGroupPermission->setsfGuardGroup($this);
    }

    /**
     * @param	sfGuardGroupPermission $sfGuardGroupPermission The sfGuardGroupPermission object to remove.
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function removesfGuardGroupPermission($sfGuardGroupPermission)
    {
        if ($this->getsfGuardGroupPermissions()->contains($sfGuardGroupPermission)) {
            $this->collsfGuardGroupPermissions->remove($this->collsfGuardGroupPermissions->search($sfGuardGroupPermission));
            if (null === $this->sfGuardGroupPermissionsScheduledForDeletion) {
                $this->sfGuardGroupPermissionsScheduledForDeletion = clone $this->collsfGuardGroupPermissions;
                $this->sfGuardGroupPermissionsScheduledForDeletion->clear();
            }
            $this->sfGuardGroupPermissionsScheduledForDeletion[]= clone $sfGuardGroupPermission;
            $sfGuardGroupPermission->setsfGuardGroup(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardGroup is new, it will return
     * an empty collection; or if this sfGuardGroup has previously
     * been saved, it will retrieve related sfGuardGroupPermissions from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardGroupPermission[] List of sfGuardGroupPermission objects
     */
    public function getsfGuardGroupPermissionsJoinsfGuardPermission($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardGroupPermissionQuery::create(null, $criteria);
        $query->joinWith('sfGuardPermission', $join_behavior);

        return $this->getsfGuardGroupPermissions($query, $con);
    }

    /**
     * Clears out the collsfGuardUserGroups collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return sfGuardGroup The current object (for fluent API support)
     * @see        addsfGuardUserGroups()
     */
    public function clearsfGuardUserGroups()
    {
        $this->collsfGuardUserGroups = null; // important to set this to null since that means it is uninitialized
        $this->collsfGuardUserGroupsPartial = null;

        return $this;
    }

    /**
     * reset is the collsfGuardUserGroups collection loaded partially
     *
     * @return void
     */
    public function resetPartialsfGuardUserGroups($v = true)
    {
        $this->collsfGuardUserGroupsPartial = $v;
    }

    /**
     * Initializes the collsfGuardUserGroups collection.
     *
     * By default this just sets the collsfGuardUserGroups collection to an empty array (like clearcollsfGuardUserGroups());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initsfGuardUserGroups($overrideExisting = true)
    {
        if (null !== $this->collsfGuardUserGroups && !$overrideExisting) {
            return;
        }
        $this->collsfGuardUserGroups = new PropelObjectCollection();
        $this->collsfGuardUserGroups->setModel('sfGuardUserGroup');
    }

    /**
     * Gets an array of sfGuardUserGroup objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this sfGuardGroup is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|sfGuardUserGroup[] List of sfGuardUserGroup objects
     * @throws PropelException
     */
    public function getsfGuardUserGroups($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collsfGuardUserGroupsPartial && !$this->isNew();
        if (null === $this->collsfGuardUserGroups || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collsfGuardUserGroups) {
                // return empty collection
                $this->initsfGuardUserGroups();
            } else {
                $collsfGuardUserGroups = sfGuardUserGroupQuery::create(null, $criteria)
                    ->filterBysfGuardGroup($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collsfGuardUserGroupsPartial && count($collsfGuardUserGroups)) {
                      $this->initsfGuardUserGroups(false);

                      foreach ($collsfGuardUserGroups as $obj) {
                        if (false == $this->collsfGuardUserGroups->contains($obj)) {
                          $this->collsfGuardUserGroups->append($obj);
                        }
                      }

                      $this->collsfGuardUserGroupsPartial = true;
                    }

                    $collsfGuardUserGroups->getInternalIterator()->rewind();

                    return $collsfGuardUserGroups;
                }

                if ($partial && $this->collsfGuardUserGroups) {
                    foreach ($this->collsfGuardUserGroups as $obj) {
                        if ($obj->isNew()) {
                            $collsfGuardUserGroups[] = $obj;
                        }
                    }
                }

                $this->collsfGuardUserGroups = $collsfGuardUserGroups;
                $this->collsfGuardUserGroupsPartial = false;
            }
        }

        return $this->collsfGuardUserGroups;
    }

    /**
     * Sets a collection of sfGuardUserGroup objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sfGuardUserGroups A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function setsfGuardUserGroups(PropelCollection $sfGuardUserGroups, PropelPDO $con = null)
    {
        $sfGuardUserGroupsToDelete = $this->getsfGuardUserGroups(new Criteria(), $con)->diff($sfGuardUserGroups);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->sfGuardUserGroupsScheduledForDeletion = clone $sfGuardUserGroupsToDelete;

        foreach ($sfGuardUserGroupsToDelete as $sfGuardUserGroupRemoved) {
            $sfGuardUserGroupRemoved->setsfGuardGroup(null);
        }

        $this->collsfGuardUserGroups = null;
        foreach ($sfGuardUserGroups as $sfGuardUserGroup) {
            $this->addsfGuardUserGroup($sfGuardUserGroup);
        }

        $this->collsfGuardUserGroups = $sfGuardUserGroups;
        $this->collsfGuardUserGroupsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related sfGuardUserGroup objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related sfGuardUserGroup objects.
     * @throws PropelException
     */
    public function countsfGuardUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collsfGuardUserGroupsPartial && !$this->isNew();
        if (null === $this->collsfGuardUserGroups || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collsfGuardUserGroups) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getsfGuardUserGroups());
            }
            $query = sfGuardUserGroupQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBysfGuardGroup($this)
                ->count($con);
        }

        return count($this->collsfGuardUserGroups);
    }

    /**
     * Method called to associate a sfGuardUserGroup object to this object
     * through the sfGuardUserGroup foreign key attribute.
     *
     * @param    sfGuardUserGroup $l sfGuardUserGroup
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function addsfGuardUserGroup(sfGuardUserGroup $l)
    {
        if ($this->collsfGuardUserGroups === null) {
            $this->initsfGuardUserGroups();
            $this->collsfGuardUserGroupsPartial = true;
        }

        if (!in_array($l, $this->collsfGuardUserGroups->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddsfGuardUserGroup($l);

            if ($this->sfGuardUserGroupsScheduledForDeletion and $this->sfGuardUserGroupsScheduledForDeletion->contains($l)) {
                $this->sfGuardUserGroupsScheduledForDeletion->remove($this->sfGuardUserGroupsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	sfGuardUserGroup $sfGuardUserGroup The sfGuardUserGroup object to add.
     */
    protected function doAddsfGuardUserGroup($sfGuardUserGroup)
    {
        $this->collsfGuardUserGroups[]= $sfGuardUserGroup;
        $sfGuardUserGroup->setsfGuardGroup($this);
    }

    /**
     * @param	sfGuardUserGroup $sfGuardUserGroup The sfGuardUserGroup object to remove.
     * @return sfGuardGroup The current object (for fluent API support)
     */
    public function removesfGuardUserGroup($sfGuardUserGroup)
    {
        if ($this->getsfGuardUserGroups()->contains($sfGuardUserGroup)) {
            $this->collsfGuardUserGroups->remove($this->collsfGuardUserGroups->search($sfGuardUserGroup));
            if (null === $this->sfGuardUserGroupsScheduledForDeletion) {
                $this->sfGuardUserGroupsScheduledForDeletion = clone $this->collsfGuardUserGroups;
                $this->sfGuardUserGroupsScheduledForDeletion->clear();
            }
            $this->sfGuardUserGroupsScheduledForDeletion[]= clone $sfGuardUserGroup;
            $sfGuardUserGroup->setsfGuardGroup(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this sfGuardGroup is new, it will return
     * an empty collection; or if this sfGuardGroup has previously
     * been saved, it will retrieve related sfGuardUserGroups from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in sfGuardGroup.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|sfGuardUserGroup[] List of sfGuardUserGroup objects
     */
    public function getsfGuardUserGroupsJoinsfGuardUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = sfGuardUserGroupQuery::create(null, $criteria);
        $query->joinWith('sfGuardUser', $join_behavior);

        return $this->getsfGuardUserGroups($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->description = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
            if ($this->collsfGuardGroupPermissions) {
                foreach ($this->collsfGuardGroupPermissions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collsfGuardUserGroups) {
                foreach ($this->collsfGuardUserGroups as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collsfGuardGroupPermissions instanceof PropelCollection) {
            $this->collsfGuardGroupPermissions->clearIterator();
        }
        $this->collsfGuardGroupPermissions = null;
        if ($this->collsfGuardUserGroups instanceof PropelCollection) {
            $this->collsfGuardUserGroups->clearIterator();
        }
        $this->collsfGuardUserGroups = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(sfGuardGroupPeer::DEFAULT_STRING_FORMAT);
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

    /**
     * Catches calls to virtual methods
     */
    public function __call($name, $params)
    {

        // symfony_behaviors behavior
        if ($callable = sfMixer::getCallable('BasesfGuardGroup:' . $name))
        {
          array_unshift($params, $this);
          return call_user_func_array($callable, $params);
        }


        return parent::__call($name, $params);
    }

}
