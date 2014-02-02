<?php

class myUser extends sfGuardSecurityUser
{
    public function signIn($user, $remember = false, $con = null)
    {
        parent::signIn($user, $remember, $con);
        $this->setCulture('pl_PL');
    }
    
    public function isAdmin()
    {
        return $this->hasPermission(sfConfig::get('role_admin'));
    }
    
    public function getFullName()
    {
        return $this->getProfile()->getFirstName().' '.$this->getProfile()->getSurname();
    }
}
