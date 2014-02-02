<?php

class sfGuardUser extends PluginsfGuardUser
{
    public function getFirstName()
    {
        return $this->getProfile()->getFirstName();
    }
    
    public function getSurname()
    {
        return $this->getProfile()->getSurname();
    }
  
}
