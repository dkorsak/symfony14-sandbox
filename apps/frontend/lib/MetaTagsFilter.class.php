<?php
class MetaTagsFilter extends sfFilter
{
    public function execute ($filterChain)
    {
        $config = SiteConfigPeer::getConfig();
        self::setMeta($config);
        $route = $this->getContext()->getRouting()->getCurrentRouteName();
        $navObj = NavigationPeer::getByRoute($route);
        if ($navObj) {  
            self::setMeta($navObj);
            $this->getContext()->getUser()->setPage($navObj);
            $parent = $navObj->getParent();
            if ($parent && $parent->getCategoryLevel() == 1) {
                //$this->getContext()->getResponse()->setSlot('nav', $parent->getRoute());
                isicsBreadcrumbs::getInstance()->addItem($parent->getName(), '@'.$parent->getRoute());
            }
            isicsBreadcrumbs::getInstance()->addItem($navObj->getName(), '@'.$route);
        }
        $filterChain->execute();
    }
    
    public static function setMeta($obj)
    {
        $response = sfContext::getInstance()->getResponse();
        if ($obj->getMetaTitle() != '') {
            $response->setTitle($obj->getMetaTitle());
        }
        if ($obj->getMetaDescription() != '') {
            $response->addMeta("description", $obj->getMetaDescription());
        }
        if ($obj->getMetaKeys() != '') {
            $response->addMeta("keywords", $obj->getMetaKeys());
        }
    }
}