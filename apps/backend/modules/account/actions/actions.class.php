<?php

require_once dirname(__FILE__).'/../lib/accountGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/accountGeneratorHelper.class.php';

/**
 * account actions.
 *
 * @package    comgroup
 * @subpackage account
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 */
class accountActions extends autoAccountActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'users');
        parent::preExecute();
    }
    
    public function executeIndex(sfWebRequest $request)
    {
        $this->redirect('@account_edit?id='.$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'));
    }
    
    public function executeCreate(sfWebRequest $request)
    {
        $this->redirect('@account_edit?id='.$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'));
    }
    
    public function executeNew(sfWebRequest $request)
    {
        $this->redirect('@account_edit?id='.$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'));
    }
    
    public function executeDelete(sfWebRequest $request)
    {
        $this->redirect('@account_edit?id='.$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'));
    }
    
    public function executeBatch(sfWebRequest $request)
    {
        $this->redirect('@account_edit?id='.$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'));
    }
    
    public function executeEdit(sfWebRequest $request)
    {
        parent::executeEdit($request);
        if ($this->sfGuardUser->getId() != $this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser')) {
            $this->redirect('@account_edit?id='.$this->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser'));
        }
    }
}
