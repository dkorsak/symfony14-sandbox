<?php



/**
 * Skeleton subclass for performing query and update operations on the 'categories' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class CategoryQuery extends BaseCategoryQuery 
{
  
  public function doSelectAsOptions()
  {
    return $this->addAscendingOrderByColumn(CategoryPeer::LTF);
  }
  
  public function doSelectTree()
  {
    return $this->orderByLtf()
      ->where('Category.CategoryLevel > 0');
  }

} // CategoryQuery
