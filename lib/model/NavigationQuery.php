<?php



/**
 * Skeleton subclass for performing query and update operations on the 'navigation' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class NavigationQuery extends BaseNavigationQuery 
{

    public function doSelectAsOptions()
    {
        return $this->addAscendingOrderByColumn(NavigationPeer::LTF);
    }
    
    public function doSelectTree()
    {
        return $this->orderByLtf()->where('Navigation.CategoryLevel > 0');
    }
}