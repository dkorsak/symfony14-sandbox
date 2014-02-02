<?php

/**
 *
 * @package    sfGuardAuth
 * @subpackage sfGuardAuth.lib
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class LoginForm extends sfForm
{
    public function configure()
    {
        $this->setWidgets(array(
            'username' => new sfWidgetFormInput(),
            'password' => new sfWidgetFormInput(array('type' => 'password')),
            'remember' => new sfWidgetFormInputCheckbox()
        ));

        $this->setValidators(array(
            'username' => new sfValidatorString(array(), array('required' => 'Adres e-mail jest wymagany')),
            'password' => new sfValidatorString(array(), array('required' => 'Hasło jest wymagane')),
            'remember' => new sfValidatorBoolean()
        ));

        $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('required' => false, 'callback' => array($this, 'validateEmail')), array('invalid' => 'Message for given country')));

        $this->widgetSchema->setNameFormat('signin[%s]');
    
        $this->getWidget('username')->setLabel('E-mail: ');
        $this->getWidget('password')->setLabel('Hasło: ');
        $this->getWidget('remember')->setLabel('Zapamiętaj mnie na tym komputerze');
    }
  
    /**
     * callback function to validate login data
     *
     * @return array
     */
    public function validateEmail(sfValidatorCallback $validator, array $values, array $arguments)
    {
        if (!$user = sfGuardUserPeer::retrieveByUsername($values['username'])) {
            throw new sfValidatorErrorSchema(new sfValidatorString(), 
                array('username' => new sfValidatorError(new sfValidatorString(array(), array('invalid' => 'Podany adres e-mail nie istnieje')), 'invalid')));
        }
        if (!$user->checkPassword($values['password'])) {
            throw new sfValidatorErrorSchema(new sfValidatorString(), 
                array('password' => new sfValidatorError(new sfValidatorString(array(), array('invalid' => 'Nieprawidłowe hasło')), 'invalid')));
        }
        return array_merge($values, array('user' => $user));
    }
}
