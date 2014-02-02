<?php
class UserAdminForm extends sfGuardUserAdminForm
{
    public function configure()
    {
        unset(
            $this['last_login'],
            $this['created_at'],
            $this['salt'],
            $this['algorithm']
        );
  
        $this->widgetSchema['sf_guard_user_group_list']->setLabel('Groups');
        $this->widgetSchema['sf_guard_user_permission_list']->setLabel('Permissions');
    
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password']->setOption('required', false);
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];
    
        $this->widgetSchema->moveField('password_again', 'after', 'password');
    
        $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(array('model' => 'sfGuardUser', 'column' => array('username')), array('invalid' => 'Użytkownik o takim adresie e-mail już istnieje')));
        
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Hasła muszą być takie same')));
    
        // profile form?
        $profileFormClass = sfConfig::get('app_sf_guard_plugin_profile_class', 'sfGuardUserProfile').'Form';
        if (class_exists($profileFormClass)) {
            $profileForm = new $profileFormClass();
            unset($profileForm[$this->getPrimaryKey()]);
            unset($profileForm[sfConfig::get('app_sf_guard_plugin_profile_field_name', 'user_id')]);
      
            $this->mergeForm($profileForm);
        }
        
        unset($this['sf_guard_user_permission_list']);
        
        $this->setWidget('sf_guard_user_permission_list', new sfWidgetFormPropelChoice(array('model' => 'sfGuardPermission')));
        $this->getWidget('sf_guard_user_permission_list')->setOption('expanded', true);
        $this->getWidget('sf_guard_user_permission_list')->setOption('multiple', true);
        
        $this->setValidator('sf_guard_user_permission_list', new sfValidatorPropelChoice(array('model' => 'sfGuardPermission', 'required' => true)));
        $this->getValidator('sf_guard_user_permission_list')->setOption('multiple', true);
    }
}