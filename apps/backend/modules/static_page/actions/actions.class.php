<?php

require_once dirname(__FILE__).'/../lib/static_pageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/static_pageGeneratorHelper.class.php';

/**
 * static_page actions.
 *
 * @package    comgroup
 * @subpackage static_page
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class static_pageActions extends autoStatic_pageActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'static_page');
        parent::preExecute();
    }
}
