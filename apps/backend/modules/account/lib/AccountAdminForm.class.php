<?php
class AccountAdminForm extends sfGuardUserAdminForm
{
    public function configure()
    {
        unset(
            $this['last_login'],
            $this['created_at'],
            $this['salt'],
            $this['algorithm'],
            $this['is_active'],
            $this['sf_guard_user_permission_list'],
            $this['sf_guard_user_group_list'],
            $this['last_login']
        );

        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password']->setOption('required', false);
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
    
        $this->widgetSchema->moveField('password_again', 'after', 'password');
    
        $this->validatorSchema->setPostValidator(
            new sfValidatorPropelUnique(array('model' => 'sfGuardUser', 'column' => array('username')), array('invalid' => 'Użytkownik o takim adresie e-mail już istnieje'))
        );
        
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Hasła muszą być takie same')));
    
        // profile form?
        $profileFormClass = sfConfig::get('app_sf_guard_plugin_profile_class', 'sfGuardUserProfile').'Form';
        if (class_exists($profileFormClass)) {
            $profileForm = new $profileFormClass();
            unset($profileForm[$this->getPrimaryKey()]);
            unset($profileForm[sfConfig::get('app_sf_guard_plugin_profile_field_name', 'user_id')]);
            $this->mergeForm($profileForm);
        }
    }
}