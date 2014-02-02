<?php

require_once dirname(__FILE__).'/../lib/site_configGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/site_configGeneratorHelper.class.php';

class site_configActions extends autoSite_configActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'site_config');
        parent::preExecute();
    }
    
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward404();
    }
    
    public function executeNew(sfWebRequest $request)
    {
        $this->forward404();
    }
    
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404();
    }
}
