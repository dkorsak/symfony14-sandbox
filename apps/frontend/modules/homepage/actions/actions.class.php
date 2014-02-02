<?php

class homepageActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        return sfView::SUCCESS;
    }
    
    public function executeError404(sfWebRequest $request)
    {
        return sfView::SUCCESS;
    }
}
