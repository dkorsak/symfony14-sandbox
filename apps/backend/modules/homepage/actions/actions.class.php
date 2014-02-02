<?php

class homepageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      return sfView::SUCCESS;
  }
}
