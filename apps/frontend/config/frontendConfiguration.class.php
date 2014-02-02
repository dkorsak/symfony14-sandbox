<?php

class frontendConfiguration extends sfApplicationConfiguration
{
    public function configure()
    {
        $this->dispatcher->connect('routing.load_configuration', array($this, 'loadRouting'));
    }
  
    static public function loadRouting(sfEvent $event)
    {
        $r = $event->getSubject();
    
        $pages = NavigationQuery::create()->doSelectTree()->find();
        if ($pages) {
            foreach($pages as $page) {
                $r->prependRoute($page->getRoute(), new sfRoute($page->getUrl(), array('module' => 'homepage', 'action' => 'index')));
                if (sfConfig::get('sf_logging_enabled')) {
                    $message = sprintf('Tworze routing: %s, %s', $page->getRoute(), $page->getUrl());
                    sfContext::getInstance()->getLogger()->debug($message);
                }
            }
        }
    }
}
