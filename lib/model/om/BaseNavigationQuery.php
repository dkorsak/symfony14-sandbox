<?php


/**
 * Base class that represents a query for the 'navigation' table.
 *
 *
 *
 * @method NavigationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NavigationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method NavigationQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method NavigationQuery orderByRoute($order = Criteria::ASC) Order by the route column
 * @method NavigationQuery orderByParentTreeId($order = Criteria::ASC) Order by the parent_tree_id column
 * @method NavigationQuery orderByCategoryLevel($order = Criteria::ASC) Order by the category_level column
 * @method NavigationQuery orderByLtf($order = Criteria::ASC) Order by the ltf column
 * @method NavigationQuery orderByRgt($order = Criteria::ASC) Order by the rgt column
 * @method NavigationQuery orderByScope($order = Criteria::ASC) Order by the scope column
 * @method NavigationQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method NavigationQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method NavigationQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method NavigationQuery orderByMetaKeys($order = Criteria::ASC) Order by the meta_keys column
 * @method NavigationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method NavigationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method NavigationQuery groupById() Group by the id column
 * @method NavigationQuery groupByName() Group by the name column
 * @method NavigationQuery groupByUrl() Group by the url column
 * @method NavigationQuery groupByRoute() Group by the route column
 * @method NavigationQuery groupByParentTreeId() Group by the parent_tree_id column
 * @method NavigationQuery groupByCategoryLevel() Group by the category_level column
 * @method NavigationQuery groupByLtf() Group by the ltf column
 * @method NavigationQuery groupByRgt() Group by the rgt column
 * @method NavigationQuery groupByScope() Group by the scope column
 * @method NavigationQuery groupByDisplay() Group by the display column
 * @method NavigationQuery groupByMetaTitle() Group by the meta_title column
 * @method NavigationQuery groupByMetaDescription() Group by the meta_description column
 * @method NavigationQuery groupByMetaKeys() Group by the meta_keys column
 * @method NavigationQuery groupByCreatedAt() Group by the created_at column
 * @method NavigationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method NavigationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NavigationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NavigationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Navigation findOne(PropelPDO $con = null) Return the first Navigation matching the query
 * @method Navigation findOneOrCreate(PropelPDO $con = null) Return the first Navigation matching the query, or a new Navigation object populated from the query conditions when no match is found
 *
 * @method Navigation findOneByName(string $name) Return the first Navigation filtered by the name column
 * @method Navigation findOneByUrl(string $url) Return the first Navigation filtered by the url column
 * @method Navigation findOneByRoute(string $route) Return the first Navigation filtered by the route column
 * @method Navigation findOneByParentTreeId(int $parent_tree_id) Return the first Navigation filtered by the parent_tree_id column
 * @method Navigation findOneByCategoryLevel(int $category_level) Return the first Navigation filtered by the category_level column
 * @method Navigation findOneByLtf(int $ltf) Return the first Navigation filtered by the ltf column
 * @method Navigation findOneByRgt(int $rgt) Return the first Navigation filtered by the rgt column
 * @method Navigation findOneByScope(int $scope) Return the first Navigation filtered by the scope column
 * @method Navigation findOneByDisplay(boolean $display) Return the first Navigation filtered by the display column
 * @method Navigation findOneByMetaTitle(string $meta_title) Return the first Navigation filtered by the meta_title column
 * @method Navigation findOneByMetaDescription(string $meta_description) Return the first Navigation filtered by the meta_description column
 * @method Navigation findOneByMetaKeys(string $meta_keys) Return the first Navigation filtered by the meta_keys column
 * @method Navigation findOneByCreatedAt(string $created_at) Return the first Navigation filtered by the created_at column
 * @method Navigation findOneByUpdatedAt(string $updated_at) Return the first Navigation filtered by the updated_at column
 *
 * @method array findById(int $id) Return Navigation objects filtered by the id column
 * @method array findByName(string $name) Return Navigation objects filtered by the name column
 * @method array findByUrl(string $url) Return Navigation objects filtered by the url column
 * @method array findByRoute(string $route) Return Navigation objects filtered by the route column
 * @method array findByParentTreeId(int $parent_tree_id) Return Navigation objects filtered by the parent_tree_id column
 * @method array findByCategoryLevel(int $category_level) Return Navigation objects filtered by the category_level column
 * @method array findByLtf(int $ltf) Return Navigation objects filtered by the ltf column
 * @method array findByRgt(int $rgt) Return Navigation objects filtered by the rgt column
 * @method array findByScope(int $scope) Return Navigation objects filtered by the scope column
 * @method array findByDisplay(boolean $display) Return Navigation objects filtered by the display column
 * @method array findByMetaTitle(string $meta_title) Return Navigation objects filtered by the meta_title column
 * @method array findByMetaDescription(string $meta_description) Return Navigation objects filtered by the meta_description column
 * @method array findByMetaKeys(string $meta_keys) Return Navigation objects filtered by the meta_keys column
 * @method array findByCreatedAt(string $created_at) Return Navigation objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Navigation objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseNavigationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNavigationQuery object.
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
            $modelName = 'Navigation';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NavigationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NavigationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NavigationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NavigationQuery) {
            return $criteria;
        }
        $query = new NavigationQuery(null, null, $modelAlias);

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
     * @return   Navigation|Navigation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NavigationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NavigationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Navigation A model object, or null if the key is not found
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
     * @return                 Navigation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `url`, `route`, `parent_tree_id`, `category_level`, `ltf`, `rgt`, `scope`, `display`, `meta_title`, `meta_description`, `meta_keys`, `created_at`, `updated_at` FROM `navigation` WHERE `id` = :p0';
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
            $obj = new Navigation();
            $obj->hydrate($row);
            NavigationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Navigation|Navigation[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Navigation[]|mixed the list of results, formatted by the current formatter
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
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NavigationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NavigationPeer::ID, $keys, Criteria::IN);
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
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NavigationPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NavigationPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NavigationPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NavigationPeer::URL, $url, $comparison);
    }

    /**
     * Filter the query on the route column
     *
     * Example usage:
     * <code>
     * $query->filterByRoute('fooValue');   // WHERE route = 'fooValue'
     * $query->filterByRoute('%fooValue%'); // WHERE route LIKE '%fooValue%'
     * </code>
     *
     * @param     string $route The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByRoute($route = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($route)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $route)) {
                $route = str_replace('*', '%', $route);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NavigationPeer::ROUTE, $route, $comparison);
    }

    /**
     * Filter the query on the parent_tree_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentTreeId(1234); // WHERE parent_tree_id = 1234
     * $query->filterByParentTreeId(array(12, 34)); // WHERE parent_tree_id IN (12, 34)
     * $query->filterByParentTreeId(array('min' => 12)); // WHERE parent_tree_id >= 12
     * $query->filterByParentTreeId(array('max' => 12)); // WHERE parent_tree_id <= 12
     * </code>
     *
     * @param     mixed $parentTreeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByParentTreeId($parentTreeId = null, $comparison = null)
    {
        if (is_array($parentTreeId)) {
            $useMinMax = false;
            if (isset($parentTreeId['min'])) {
                $this->addUsingAlias(NavigationPeer::PARENT_TREE_ID, $parentTreeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentTreeId['max'])) {
                $this->addUsingAlias(NavigationPeer::PARENT_TREE_ID, $parentTreeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::PARENT_TREE_ID, $parentTreeId, $comparison);
    }

    /**
     * Filter the query on the category_level column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryLevel(1234); // WHERE category_level = 1234
     * $query->filterByCategoryLevel(array(12, 34)); // WHERE category_level IN (12, 34)
     * $query->filterByCategoryLevel(array('min' => 12)); // WHERE category_level >= 12
     * $query->filterByCategoryLevel(array('max' => 12)); // WHERE category_level <= 12
     * </code>
     *
     * @param     mixed $categoryLevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByCategoryLevel($categoryLevel = null, $comparison = null)
    {
        if (is_array($categoryLevel)) {
            $useMinMax = false;
            if (isset($categoryLevel['min'])) {
                $this->addUsingAlias(NavigationPeer::CATEGORY_LEVEL, $categoryLevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryLevel['max'])) {
                $this->addUsingAlias(NavigationPeer::CATEGORY_LEVEL, $categoryLevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::CATEGORY_LEVEL, $categoryLevel, $comparison);
    }

    /**
     * Filter the query on the ltf column
     *
     * Example usage:
     * <code>
     * $query->filterByLtf(1234); // WHERE ltf = 1234
     * $query->filterByLtf(array(12, 34)); // WHERE ltf IN (12, 34)
     * $query->filterByLtf(array('min' => 12)); // WHERE ltf >= 12
     * $query->filterByLtf(array('max' => 12)); // WHERE ltf <= 12
     * </code>
     *
     * @param     mixed $ltf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByLtf($ltf = null, $comparison = null)
    {
        if (is_array($ltf)) {
            $useMinMax = false;
            if (isset($ltf['min'])) {
                $this->addUsingAlias(NavigationPeer::LTF, $ltf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ltf['max'])) {
                $this->addUsingAlias(NavigationPeer::LTF, $ltf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::LTF, $ltf, $comparison);
    }

    /**
     * Filter the query on the rgt column
     *
     * Example usage:
     * <code>
     * $query->filterByRgt(1234); // WHERE rgt = 1234
     * $query->filterByRgt(array(12, 34)); // WHERE rgt IN (12, 34)
     * $query->filterByRgt(array('min' => 12)); // WHERE rgt >= 12
     * $query->filterByRgt(array('max' => 12)); // WHERE rgt <= 12
     * </code>
     *
     * @param     mixed $rgt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByRgt($rgt = null, $comparison = null)
    {
        if (is_array($rgt)) {
            $useMinMax = false;
            if (isset($rgt['min'])) {
                $this->addUsingAlias(NavigationPeer::RGT, $rgt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rgt['max'])) {
                $this->addUsingAlias(NavigationPeer::RGT, $rgt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::RGT, $rgt, $comparison);
    }

    /**
     * Filter the query on the scope column
     *
     * Example usage:
     * <code>
     * $query->filterByScope(1234); // WHERE scope = 1234
     * $query->filterByScope(array(12, 34)); // WHERE scope IN (12, 34)
     * $query->filterByScope(array('min' => 12)); // WHERE scope >= 12
     * $query->filterByScope(array('max' => 12)); // WHERE scope <= 12
     * </code>
     *
     * @param     mixed $scope The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByScope($scope = null, $comparison = null)
    {
        if (is_array($scope)) {
            $useMinMax = false;
            if (isset($scope['min'])) {
                $this->addUsingAlias(NavigationPeer::SCOPE, $scope['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($scope['max'])) {
                $this->addUsingAlias(NavigationPeer::SCOPE, $scope['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::SCOPE, $scope, $comparison);
    }

    /**
     * Filter the query on the display column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplay(true); // WHERE display = true
     * $query->filterByDisplay('yes'); // WHERE display = true
     * </code>
     *
     * @param     boolean|string $display The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByDisplay($display = null, $comparison = null)
    {
        if (is_string($display)) {
            $display = in_array(strtolower($display), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(NavigationPeer::DISPLAY, $display, $comparison);
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
     * @return NavigationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NavigationPeer::META_TITLE, $metaTitle, $comparison);
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
     * @return NavigationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NavigationPeer::META_DESCRIPTION, $metaDescription, $comparison);
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
     * @return NavigationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NavigationPeer::META_KEYS, $metaKeys, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(NavigationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(NavigationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(NavigationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(NavigationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NavigationPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Navigation $navigation Object to remove from the list of results
     *
     * @return NavigationQuery The current query, for fluid interface
     */
    public function prune($navigation = null)
    {
        if ($navigation) {
            $this->addUsingAlias(NavigationPeer::ID, $navigation->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     NavigationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(NavigationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     NavigationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(NavigationPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     NavigationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(NavigationPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     NavigationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(NavigationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     NavigationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(NavigationPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     NavigationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(NavigationPeer::CREATED_AT);
    }
    // nested_set behavior

    /**
     * Filter the query to restrict the result to root objects
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function treeRoots()
    {
        return $this->addUsingAlias(NavigationPeer::LEFT_COL, 1, Criteria::EQUAL);
    }

    /**
     * Returns the objects in a certain tree, from the tree scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function inTree($scope = null)
    {
        return $this->addUsingAlias(NavigationPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     Navigation $navigation The object to use for descendant search
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function descendantsOf($navigation)
    {
        return $this
            ->inTree($navigation->getScopeValue())
            ->addUsingAlias(NavigationPeer::LEFT_COL, $navigation->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(NavigationPeer::LEFT_COL, $navigation->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Navigation $navigation The object to use for branch search
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function branchOf($navigation)
    {
        return $this
            ->inTree($navigation->getScopeValue())
            ->addUsingAlias(NavigationPeer::LEFT_COL, $navigation->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(NavigationPeer::LEFT_COL, $navigation->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     Navigation $navigation The object to use for child search
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function childrenOf($navigation)
    {
        return $this
            ->descendantsOf($navigation)
            ->addUsingAlias(NavigationPeer::LEVEL_COL, $navigation->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     Navigation $navigation The object to use for sibling search
     * @param      PropelPDO $con Connection to use.
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function siblingsOf($navigation, PropelPDO $con = null)
    {
        if ($navigation->isRoot()) {
            return $this->
                add(NavigationPeer::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($navigation->getParent($con))
                ->prune($navigation);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     Navigation $navigation The object to use for ancestors search
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function ancestorsOf($navigation)
    {
        return $this
            ->inTree($navigation->getScopeValue())
            ->addUsingAlias(NavigationPeer::LEFT_COL, $navigation->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(NavigationPeer::RIGHT_COL, $navigation->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Navigation $navigation The object to use for roots search
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function rootsOf($navigation)
    {
        return $this
            ->inTree($navigation->getScopeValue())
            ->addUsingAlias(NavigationPeer::LEFT_COL, $navigation->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(NavigationPeer::RIGHT_COL, $navigation->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(NavigationPeer::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(NavigationPeer::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    NavigationQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addAscendingOrderByColumn(NavigationPeer::RIGHT_COL);
        } else {
            return $this
                ->addDescendingOrderByColumn(NavigationPeer::RIGHT_COL);
        }
    }

    /**
     * Returns a root node for the tree
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Navigation The tree root object
     */
    public function findRoot($scope = null, $con = null)
    {
        return $this
            ->addUsingAlias(NavigationPeer::LEFT_COL, 1, Criteria::EQUAL)
            ->inTree($scope)
            ->findOne($con);
    }

    /**
     * Returns the root objects for all trees.
     *
     * @param      PropelPDO $con	Connection to use.
     *
     * @return    mixed the list of results, formatted by the current formatter
     */
    public function findRoots($con = null)
    {
        return $this
            ->treeRoots()
            ->find($con);
    }

    /**
     * Returns a tree of objects
     *
     * @param      int $scope		Scope to determine which tree node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     mixed the list of results, formatted by the current formatter
     */
    public function findTree($scope = null, $con = null)
    {
        return $this
            ->inTree($scope)
            ->orderByBranch()
            ->find($con);
    }

}
