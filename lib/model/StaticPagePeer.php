<?php

require_once 'lib/model/om/BaseStaticPagePeer.php';


/**
 * Skeleton subclass for performing query and update operations on the 'static_pages' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class StaticPagePeer extends BaseStaticPagePeer 
{
    public static function getPage($identifier)
    {
        $c = new Criteria();
        $c->add(self::IDENTIFIER, $identifier);
        return self::doSelectOne($c);
    }
} // StaticPagePeer
