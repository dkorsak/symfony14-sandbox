<?php


/**
 * Base class that represents a query for the 'config' table.
 *
 *
 *
 * @method SiteConfigQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SiteConfigQuery orderByContactEmail($order = Criteria::ASC) Order by the contact_email column
 * @method SiteConfigQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method SiteConfigQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method SiteConfigQuery orderByMetaKeys($order = Criteria::ASC) Order by the meta_keys column
 *
 * @method SiteConfigQuery groupById() Group by the id column
 * @method SiteConfigQuery groupByContactEmail() Group by the contact_email column
 * @method SiteConfigQuery groupByMetaTitle() Group by the meta_title column
 * @method SiteConfigQuery groupByMetaDescription() Group by the meta_description column
 * @method SiteConfigQuery groupByMetaKeys() Group by the meta_keys column
 *
 * @method SiteConfigQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SiteConfigQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SiteConfigQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SiteConfig findOne(PropelPDO $con = null) Return the first SiteConfig matching the query
 * @method SiteConfig findOneOrCreate(PropelPDO $con = null) Return the first SiteConfig matching the query, or a new SiteConfig object populated from the query conditions when no match is found
 *
 * @method SiteConfig findOneByContactEmail(string $contact_email) Return the first SiteConfig filtered by the contact_email column
 * @method SiteConfig findOneByMetaTitle(string $meta_title) Return the first SiteConfig filtered by the meta_title column
 * @method SiteConfig findOneByMetaDescription(string $meta_description) Return the first SiteConfig filtered by the meta_description column
 * @method SiteConfig findOneByMetaKeys(string $meta_keys) Return the first SiteConfig filtered by the meta_keys column
 *
 * @method array findById(int $id) Return SiteConfig objects filtered by the id column
 * @method array findByContactEmail(string $contact_email) Return SiteConfig objects filtered by the contact_email column
 * @method array findByMetaTitle(string $meta_title) Return SiteConfig objects filtered by the meta_title column
 * @method array findByMetaDescription(string $meta_description) Return SiteConfig objects filtered by the meta_description column
 * @method array findByMetaKeys(string $meta_keys) Return SiteConfig objects filtered by the meta_keys column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSiteConfigQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSiteConfigQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'propel';
        }
        if (null === $modelName) {
            $modelName = 'SiteConfig';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SiteConfigQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SiteConfigQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SiteConfigQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SiteConfigQuery) {
            return $criteria;
        }
        $query = new SiteConfigQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SiteConfig|SiteConfig[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SiteConfigPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SiteConfigPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SiteConfig A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SiteConfig A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `contact_email`, `meta_title`, `meta_description`, `meta_keys` FROM `config` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SiteConfig();
            $obj->hydrate($row);
            SiteConfigPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return SiteConfig|SiteConfig[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SiteConfig[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SiteConfigPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SiteConfigPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SiteConfigPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SiteConfigPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SiteConfigPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the contact_email column
     *
     * Example usage:
     * <code>
     * $query->filterByContactEmail('fooValue');   // WHERE contact_email = 'fooValue'
     * $query->filterByContactEmail('%fooValue%'); // WHERE contact_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterByContactEmail($contactEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contactEmail)) {
                $contactEmail = str_replace('*', '%', $contactEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SiteConfigPeer::CONTACT_EMAIL, $contactEmail, $comparison);
    }

    /**
     * Filter the query on the meta_title column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaTitle('fooValue');   // WHERE meta_title = 'fooValue'
     * $query->filterByMetaTitle('%fooValue%'); // WHERE meta_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterByMetaTitle($metaTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaTitle)) {
                $metaTitle = str_replace('*', '%', $metaTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SiteConfigPeer::META_TITLE, $metaTitle, $comparison);
    }

    /**
     * Filter the query on the meta_description column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaDescription('fooValue');   // WHERE meta_description = 'fooValue'
     * $query->filterByMetaDescription('%fooValue%'); // WHERE meta_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterByMetaDescription($metaDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaDescription)) {
                $metaDescription = str_replace('*', '%', $metaDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SiteConfigPeer::META_DESCRIPTION, $metaDescription, $comparison);
    }

    /**
     * Filter the query on the meta_keys column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaKeys('fooValue');   // WHERE meta_keys = 'fooValue'
     * $query->filterByMetaKeys('%fooValue%'); // WHERE meta_keys LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaKeys The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function filterByMetaKeys($metaKeys = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaKeys)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaKeys)) {
                $metaKeys = str_replace('*', '%', $metaKeys);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SiteConfigPeer::META_KEYS, $metaKeys, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   SiteConfig $siteConfig Object to remove from the list of results
     *
     * @return SiteConfigQuery The current query, for fluid interface
     */
    public function prune($siteConfig = null)
    {
        if ($siteConfig) {
            $this->addUsingAlias(SiteConfigPeer::ID, $siteConfig->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
