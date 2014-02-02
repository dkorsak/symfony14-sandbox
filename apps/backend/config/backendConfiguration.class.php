<?php

class backendConfiguration extends sfApplicationConfiguration
{
    public function configure()
    {
        sfValidatorBase::setDefaultMessage('required', 'To pole jest wymagane');
        sfValidatorBase::setDefaultMessage('invalid', 'Nieprawidłowa wartość');
        sfConfig::set('application_name', 'Symfony 1.4 <span>Sandbox</span>');
    }
}
