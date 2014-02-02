<?php

abstract class BaseFormPropel extends sfFormPropel
{
    public function setup()
    {
        
    }
    
    public function setRoute($route='')
    {
        $url = $this->getObject()->getUrl();
        if (substr($url, 0, 1) != '/') {
            $url = '/'.$url;
            $this->getObject()->setUrl($url);
        }
        
        if ($route == '') {
            $route = strtolower($this->getModelName());
        }
      
        $route = $route.'_'.$this->getObject()->getId();
        $queryClass = $this->getModelName().'Query';
        $query = $queryClass::create();
        while ($routeObj = $query->findOneByRoute($route)) {
            if ($routeObj->getId() != $this->getObject()->getId()) {
                $route .= '_'.rand(1, 10000);
            }
        }
        $this->getObject()->setRoute($route);
        $this->getObject()->save();
    }
}
