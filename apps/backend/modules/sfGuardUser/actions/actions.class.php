<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardUserActions.class.php';

class sfGuardUserActions extends basesfGuardUserActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'users');
        parent::preExecute();
    }
}
