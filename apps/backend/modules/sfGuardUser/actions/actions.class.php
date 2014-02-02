<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardUserActions.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class sfGuardUserActions extends basesfGuardUserActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'users');
        parent::preExecute();
    }
}
