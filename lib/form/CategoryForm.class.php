<?php

/**
 * Category form.
 *
 * @package    comgroup
 * @subpackage form
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CategoryForm extends BaseCategoryForm
{
    public function configure()
    {
        $this->useFields(array('name', 'parent_tree_id'));
        $this->setRoot();
            
        $this->setWidget('parent_tree_id', new sfWidgetFormPropelChoice(array('model' => 'Category', 'query_methods' => array('doSelectAsOptions'), 'method' => 'getSpacesCategoryName')));
        $this->setValidator('parent_tree_id', new sfValidatorAnd(array(
            new sfValidatorPropelChoice(array('model' => 'Category', 'required' => false)),
            new cValidatorNumber(array('model' => 'Category', 'min' => 0, 'max'=> 1), array('max' => 'Nie można utworzyć kategorii o niższym poziomie'))
        )));
      
    }
  
    public function save($con = null)
    {
        $this->updateNestedSet();
        // save object
        parent::save($con);
        return $this->getObject();
    }
    
    private function updateNestedSet()
    {
        $parent = $this->getValue('parent_tree_id');
        $parentObj = CategoryPeer::retrieveByPK($parent);
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
        if (CategoryPeer::doCount(new Criteria()) == 0) {
            $cat = new Category();
            $cat->setName('Kategoria główna');
            $cat->makeRoot();
            $cat->save();
        }
    }
}
