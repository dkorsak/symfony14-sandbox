<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

class categoryActions extends autoCategoryActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('nav', 'category');
        parent::preExecute();
    }
  
    public function executeMoveUp()
    {
        $categoryId = $this->getRequestParameter('category_id');
        $this->forward404Unless($categoryId);
        $cat = CategoryPeer::retrieveByPK($categoryId);
        $this->forward404Unless($cat);
        $prev_cat = $cat->retrievePrevSibling();
        if ($prev_cat != NULL) {
            $cat->moveToPrevSiblingOf($prev_cat);
            $cat->save();
        }
        $this->redirect('@category');
    }
  
    public function executeMoveDown()
    {
        $categoryId = $this->getRequestParameter('category_id');
        $this->forward404Unless($categoryId);
        $cat = CategoryPeer::retrieveByPK($categoryId);
        $this->forward404Unless($cat);
        $next_cat = $cat->retrieveNextSibling();
        if ($next_cat != NULL) {
          $cat->moveToNextSiblingOf($next_cat);
          $cat->save();
        }
        $this->redirect('@category');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
    
        $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
        $object = $this->getRoute()->getObject();
        // check if category has childrens
        if ($object->hasChildren()) {
            $this->getUser()->setFlash('error', 'Nie można usunąć kategorii: <strong>'.$object->getName().'</strong>. Usuń najpierw wszystkie podkategorie.');
            $this->redirect('@category');
        }
        try {
            $object->delete();
        } catch (Exception $e) {
            $this->getUser()->setFlash('error', $e->getMessage());
            $this->redirect('@category');
        }
        $this->redirect('@category');
    }
}
