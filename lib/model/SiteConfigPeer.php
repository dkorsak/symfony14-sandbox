<?php



/**
 * Skeleton subclass for performing query and update operations on the 'config' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class SiteConfigPeer extends BaseSiteConfigPeer 
{
  
    public static $configObj = null;
    
    public static function getConfig()
    {
        if (is_null(self::$configObj)) {
            self::$configObj = self::doSelectOne(new Criteria());
        }
        return self::$configObj;
    }

} // SiteConfigPeer
