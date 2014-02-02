<?php

/**
 * Navigation form.
 *
 * @package    comgroup
 * @subpackage form
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 */
class NavigationForm extends BaseNavigationForm
{
    public function configure()
    {
        $this->useFields(array('name', 'parent_tree_id', 'url', 'meta_title', 'meta_description', 'meta_keys', 'display'));
        $this->setRoot();
            
        $this->setWidget('parent_tree_id', new sfWidgetFormPropelChoice(array('model' => 'Navigation', 'query_methods' => array('doSelectAsOptions'), 'method' => 'getSpacesCategoryName')));
        $this->setValidator('parent_tree_id', new sfValidatorAnd(array(
            new sfValidatorPropelChoice(array('model' => 'Navigation', 'required' => false)),
            new cValidatorNumber(array('model' => 'Navigation', 'min' => 0, 'max'=> 1), array('max' => 'Nie można utworzyć opcji nawigacji o niższym poziomie'))
        )));
        
        $this->validatorSchema->setPostValidator(
            new sfValidatorPropelUnique(array('model' => 'Navigation', 'column' => array('url')), array('invalid' => 'Nawigacja o takim URL już istnieje'))
        );
        
        $this->setDefault('url', '/');
    }

  
    public function save($con = null)
    {
        $this->updateNestedSet();
        // save object
        parent::save($con);
        $this->setRoute();
        if ($this->getObject()->hasChildren() && $this->getObject()->getDisplay() == 0 && $this->getObject()->getCategoryLevel() == 1) {
            NavigationPeer::disableAllChildren($this->getObject()->getId());
        }
        if ($this->getObject()->getCategoryLevel() == 2 && $this->getObject()->getDisplay() == 1) {
            $parent = $this->getObject()->getParent();
            if ($parent) {
                $parent->setDisplay(1);
                $parent->save();
            }
        }
        return $this->getObject();
    }
    
    private function updateNestedSet()
    {
        $parent = $this->getValue('parent_tree_id');
        $parentObj = NavigationPeer::retrieveByPK($parent);
        if ($this->isNew()) {
            $this->getObject()->insertAsLastChildOf($parentObj);
        } else {
            if ($parentObj->getId() != $this->getObject()->getParentTreeId()) {
                $this->getObject()->moveToLastChildOf($parentObj);
            } 
        }
    }
    
    private function setRoot()
    {
        if (NavigationPeer::doCount(new Criteria()) == 0) {
            $nav = new Navigation();
            $nav->setName('Menu główne');
            $nav->makeRoot();
            $nav->save();
        }
    }
}
