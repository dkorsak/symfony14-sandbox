<?php

require_once dirname(__FILE__).'/../lib/static_pageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/static_pageGeneratorHelper.class.php';

class static_pageActions extends autoStatic_pageActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'static_page');
        parent::preExecute();
    }
}
