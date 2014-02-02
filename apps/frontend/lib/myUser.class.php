<?php

class myUser extends sfBasicSecurityUser
{
    private $currentPage = null;
     
    public function setPage(Navigation $page)
    {
        $this->currentPage = $page;
    }
    
    public function getPage()
    {
        return $this->currentPage;
    }
}
