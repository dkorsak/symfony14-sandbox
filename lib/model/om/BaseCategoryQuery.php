<?php


/**
 * Base class that represents a query for the 'categories' table.
 *
 *
 *
 * @method CategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method CategoryQuery orderByParentTreeId($order = Criteria::ASC) Order by the parent_tree_id column
 * @method CategoryQuery orderByCategoryLevel($order = Criteria::ASC) Order by the category_level column
 * @method CategoryQuery orderByLtf($order = Criteria::ASC) Order by the ltf column
 * @method CategoryQuery orderByRgt($order = Criteria::ASC) Order by the rgt column
 * @method CategoryQuery orderByScope($order = Criteria::ASC) Order by the scope column
 * @method CategoryQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method CategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method CategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method CategoryQuery groupById() Group by the id column
 * @method CategoryQuery groupByName() Group by the name column
 * @method CategoryQuery groupByParentTreeId() Group by the parent_tree_id column
 * @method CategoryQuery groupByCategoryLevel() Group by the category_level column
 * @method CategoryQuery groupByLtf() Group by the ltf column
 * @method CategoryQuery groupByRgt() Group by the rgt column
 * @method CategoryQuery groupByScope() Group by the scope column
 * @method CategoryQuery groupBySlug() Group by the slug column
 * @method CategoryQuery groupByCreatedAt() Group by the created_at column
 * @method CategoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method CategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Category findOne(PropelPDO $con = null) Return the first Category matching the query
 * @method Category findOneOrCreate(PropelPDO $con = null) Return the first Category matching the query, or a new Category object populated from the query conditions when no match is found
 *
 * @method Category findOneByName(string $name) Return the first Category filtered by the name column
 * @method Category findOneByParentTreeId(int $parent_tree_id) Return the first Category filtered by the parent_tree_id column
 * @method Category findOneByCategoryLevel(int $category_level) Return the first Category filtered by the category_level column
 * @method Category findOneByLtf(int $ltf) Return the first Category filtered by the ltf column
 * @method Category findOneByRgt(int $rgt) Return the first Category filtered by the rgt column
 * @method Category findOneByScope(int $scope) Return the first Category filtered by the scope column
 * @method Category findOneBySlug(string $slug) Return the first Category filtered by the slug column
 * @method Category findOneByCreatedAt(string $created_at) Return the first Category filtered by the created_at column
 * @method Category findOneByUpdatedAt(string $updated_at) Return the first Category filtered by the updated_at column
 *
 * @method array findById(int $id) Return Category objects filtered by the id column
 * @method array findByName(string $name) Return Category objects filtered by the name column
 * @method array findByParentTreeId(int $parent_tree_id) Return Category objects filtered by the parent_tree_id column
 * @method array findByCategoryLevel(int $category_level) Return Category objects filtered by the category_level column
 * @method array findByLtf(int $ltf) Return Category objects filtered by the ltf column
 * @method array findByRgt(int $rgt) Return Category objects filtered by the rgt column
 * @method array findByScope(int $scope) Return Category objects filtered by the scope column
 * @method array findBySlug(string $slug) Return Category objects filtered by the slug column
 * @method array findByCreatedAt(string $created_at) Return Category objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Category objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCategoryQuery object.
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
            $modelName = 'Category';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CategoryQuery) {
            return $criteria;
        }
        $query = new CategoryQuery(null, null, $modelAlias);

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
     * @return   Category|Category[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Category A model object, or null if the key is not found
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
     * @return                 Category A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `parent_tree_id`, `category_level`, `ltf`, `rgt`, `scope`, `slug`, `created_at`, `updated_at` FROM `categories` WHERE `id` = :p0';
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
            $obj = new Category();
            $obj->hydrate($row);
            CategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Category|Category[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Category[]|mixed the list of results, formatted by the current formatter
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryPeer::ID, $keys, Criteria::IN);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoryPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoryPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::ID, $id, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CategoryPeer::NAME, $name, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByParentTreeId($parentTreeId = null, $comparison = null)
    {
        if (is_array($parentTreeId)) {
            $useMinMax = false;
            if (isset($parentTreeId['min'])) {
                $this->addUsingAlias(CategoryPeer::PARENT_TREE_ID, $parentTreeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentTreeId['max'])) {
                $this->addUsingAlias(CategoryPeer::PARENT_TREE_ID, $parentTreeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::PARENT_TREE_ID, $parentTreeId, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryLevel($categoryLevel = null, $comparison = null)
    {
        if (is_array($categoryLevel)) {
            $useMinMax = false;
            if (isset($categoryLevel['min'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_LEVEL, $categoryLevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryLevel['max'])) {
                $this->addUsingAlias(CategoryPeer::CATEGORY_LEVEL, $categoryLevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::CATEGORY_LEVEL, $categoryLevel, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByLtf($ltf = null, $comparison = null)
    {
        if (is_array($ltf)) {
            $useMinMax = false;
            if (isset($ltf['min'])) {
                $this->addUsingAlias(CategoryPeer::LTF, $ltf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ltf['max'])) {
                $this->addUsingAlias(CategoryPeer::LTF, $ltf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::LTF, $ltf, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByRgt($rgt = null, $comparison = null)
    {
        if (is_array($rgt)) {
            $useMinMax = false;
            if (isset($rgt['min'])) {
                $this->addUsingAlias(CategoryPeer::RGT, $rgt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rgt['max'])) {
                $this->addUsingAlias(CategoryPeer::RGT, $rgt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::RGT, $rgt, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByScope($scope = null, $comparison = null)
    {
        if (is_array($scope)) {
            $useMinMax = false;
            if (isset($scope['min'])) {
                $this->addUsingAlias(CategoryPeer::SCOPE, $scope['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($scope['max'])) {
                $this->addUsingAlias(CategoryPeer::SCOPE, $scope['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::SCOPE, $scope, $comparison);
    }

    /**
     * Filter the query on the slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
     * $query->filterBySlug('%fooValue%'); // WHERE slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slug)) {
                $slug = str_replace('*', '%', $slug);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoryPeer::SLUG, $slug, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CategoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CategoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return CategoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CategoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CategoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Category $category Object to remove from the list of results
     *
     * @return CategoryQuery The current query, for fluid interface
     */
    public function prune($category = null)
    {
        if ($category) {
            $this->addUsingAlias(CategoryPeer::ID, $category->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     CategoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CategoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     CategoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CategoryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     CategoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CategoryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     CategoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CategoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     CategoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CategoryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     CategoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CategoryPeer::CREATED_AT);
    }
    // nested_set behavior

    /**
     * Filter the query to restrict the result to root objects
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function treeRoots()
    {
        return $this->addUsingAlias(CategoryPeer::LEFT_COL, 1, Criteria::EQUAL);
    }

    /**
     * Returns the objects in a certain tree, from the tree scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function inTree($scope = null)
    {
        return $this->addUsingAlias(CategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     Category $category The object to use for descendant search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function descendantsOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Category $category The object to use for branch search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function branchOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     Category $category The object to use for child search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function childrenOf($category)
    {
        return $this
            ->descendantsOf($category)
            ->addUsingAlias(CategoryPeer::LEVEL_COL, $category->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     Category $category The object to use for sibling search
     * @param      PropelPDO $con Connection to use.
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function siblingsOf($category, PropelPDO $con = null)
    {
        if ($category->isRoot()) {
            return $this->
                add(CategoryPeer::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($category->getParent($con))
                ->prune($category);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     Category $category The object to use for ancestors search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function ancestorsOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(CategoryPeer::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     Category $category The object to use for roots search
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function rootsOf($category)
    {
        return $this
            ->inTree($category->getScopeValue())
            ->addUsingAlias(CategoryPeer::LEFT_COL, $category->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(CategoryPeer::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(CategoryPeer::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(CategoryPeer::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    CategoryQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addAscendingOrderByColumn(CategoryPeer::RIGHT_COL);
        } else {
            return $this
                ->addDescendingOrderByColumn(CategoryPeer::RIGHT_COL);
        }
    }

    /**
     * Returns a root node for the tree
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     Category The tree root object
     */
    public function findRoot($scope = null, $con = null)
    {
        return $this
            ->addUsingAlias(CategoryPeer::LEFT_COL, 1, Criteria::EQUAL)
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
