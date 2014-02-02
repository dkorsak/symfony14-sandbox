<?php

require_once dirname(__FILE__).'/../lib/navigationGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/navigationGeneratorHelper.class.php';

class navigationActions extends autoNavigationActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'navigaton');
        parent::preExecute();
    }
    
    public function executeMoveUp()
    {
        $id = $this->getRequestParameter('id');
        $this->forward404Unless($id);
        $nav = NavigationPeer::retrieveByPK($id);
        $this->forward404Unless($nav);
        $prev_nav = $nav->retrievePrevSibling();
        if ($prev_nav != NULL) {
            $nav->moveToPrevSiblingOf($prev_nav);
            $nav->save();
        }
        $this->redirect('@navigation');
    }
    
    public function executeMoveDown()
    {
        $id = $this->getRequestParameter('id');
        $this->forward404Unless($id);
        $nav = NavigationPeer::retrieveByPK($id);
        $this->forward404Unless($nav);
        $next_nav = $nav->retrieveNextSibling();
        if ($next_nav != NULL) {
            $nav->moveToNextSiblingOf($next_nav);
            $nav->save();
        }
        $this->redirect('@navigation');
    }
    
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
    
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
        $object = $this->getRoute()->getObject();
        // check if category has childrens
        if ($object->hasChildren()) {
            $this->getUser()->setFlash('error', 'Nie można usunąć tej pozycji: <strong>'.$object->getName().'</strong>. Usuń najpierw wszystkie podpozycje.');
            $this->redirect('@navigation');
        }
        try {
            $object->delete();
        } catch (Exception $e) {
            $this->getUser()->setFlash('error', $e->getMessage());
            $this->redirect('@navigation');
        }
        $this->redirect('@navigation');
    }
}
