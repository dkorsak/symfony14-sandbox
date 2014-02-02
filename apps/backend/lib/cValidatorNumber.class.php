<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfValidatorNumber validates a number (integer or float). It also converts the input value to a float.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatorNumber.class.php 22018 2009-09-14 16:56:28Z fabien $
 */
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
