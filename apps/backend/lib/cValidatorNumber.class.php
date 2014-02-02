<?php

class cValidatorNumber extends sfValidatorNumber
{
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);
        $this->addOption('model');
    }
    
    /**
     * @see sfValidatorBase
     */
    protected function doClean($value)
    {
        if (!is_numeric($value)) {
            throw new sfValidatorError($this, 'invalid', array('value' => $value));
        }
    
        $clean = floatval($value);
        $ret = $clean; 
        $model = $this->getOption('model');
        $model .= 'Peer';
        $catObj = call_user_func($model."::retrieveByPK", $clean);
        if ($catObj) {
            $clean = $catObj->getLevel();
        }
        
        if ($this->hasOption('max') && $clean > $this->getOption('max')) {
            throw new sfValidatorError($this, 'max', array('value' => $value, 'max' => $this->getOption('max')));
        }
    
        if ($this->hasOption('min') && $clean < $this->getOption('min')) {
            throw new sfValidatorError($this, 'min', array('value' => $value, 'min' => $this->getOption('min')));
        }
    
        return $ret;
    }
}
