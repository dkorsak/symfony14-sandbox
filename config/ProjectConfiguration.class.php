<?php
require __DIR__ .'/../lib/vendor/autoload.php';
require_once dirname(__FILE__).'/../lib/vendor/lexpress/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
class ProjectConfiguration extends sfProjectConfiguration
{
    static protected $zendLoaded = false;
    
    public function setup()
    {
        //setup the location for our phing and propel libs
        sfConfig::set('sf_phing_path', sfConfig::get('sf_root_dir') . '/lib/vendor/phing/phing');
        sfConfig::set('sf_propel_path', sfConfig::get('sf_root_dir') . '/lib/vendor/propel/propel1');
        sfConfig::set('sf_propel_generator_path', sfConfig::get('sf_root_dir') . '/lib/vendor/propel/propel1/generator/lib');
        
        $this->enableAllPluginsExcept(array('sfDoctrinePlugin'));
        
        // set default roles
        sfConfig::set('role_admin', 'Administrator');
        sfConfig::set('role_moderator', 'Moderator');
        setlocale(LC_CTYPE, 'pl_PL.UTF-8');
        bcscale(6);
      
        // for Lucene and others Zend modules
        //self::registerZend();
    }
  
    /**
     * Register zend libraries
     *
     */
    static public function registerZend()
    {
        if (self::$zendLoaded) {
            return;
        }
        set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
        require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }
}