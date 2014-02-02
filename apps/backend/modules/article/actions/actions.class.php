<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

class articleActions extends autoArticleActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'article');
        parent::preExecute();
    }
}
