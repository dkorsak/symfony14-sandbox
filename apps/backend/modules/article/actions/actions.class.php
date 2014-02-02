<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

/**
 * article actions.
 *
 * @package    comgroup
 * @subpackage article
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class articleActions extends autoArticleActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'article');
        parent::preExecute();
    }
}
