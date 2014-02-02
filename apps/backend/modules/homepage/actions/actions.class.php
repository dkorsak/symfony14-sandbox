<?php

/**
 * homepage actions.
 *
 * @package    comgroup
 * @subpackage homepage
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class homepageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      return sfView::SUCCESS;
  }
}
