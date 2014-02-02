<?php



/**
 * Skeleton subclass for representing a row from the 'navigation' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Navigation extends BaseNavigation {

    public function __toString()
    {
        return $this->getName();
    }
  
    public function getSpacesCategoryName()
    {
        $spaces = Utils::spaces(2* ($this->getCategoryLevel()-1)) . $this->getName();
        if ($this->getCategoryLevel() == 1) {
            return ''.$spaces.'';
        }
        return $spaces;
    }
  
    public function getListCategoryName()
    {
        if ($this->getCategoryLevel() == 1) {
            return '<strong>'.$this->getName().'</strong>';
        }
        return '<span style="display: block; margin-left: '.($this->getCategoryLevel()*5).'px;">'.$this->getName().'</span>';
    }
} // Navigation
