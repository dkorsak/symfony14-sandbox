<?php

class dkWidgetFormFCKeditor extends sfWidgetFormTextarea
{
    /**
     * Constructor.
     *
     * Available options:
     *
     *  
     * config_file: The javascript configuration
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array())
    {
        $this->addOption('width', 800);
        $this->addOption('height', 350);
    }
  
    /**
     * @param  string $name        The element name
     * @param  string $value       The value selected in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $php_file = '/js/fckeditor/fckeditor.php';
    
        if (!is_readable(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$php_file)) {
            throw new sfConfigurationException('You must install FCKEditor to use this widget.');
        }
    
        // FCKEditor.php class is written with backward compatibility of PHP4.
        // This reportings are to turn off errors with public properties and already declared constructor
        $error_reporting = error_reporting(E_ALL);
    
        require_once(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$php_file);
        
        error_reporting($error_reporting);
    
        $fckeditor           = new FCKeditor($name);
        $fckeditor->BasePath = sfContext::getInstance()->getRequest()->getRelativeUrlRoot().'/js/fckeditor/';
        $fckeditor->Value    = $value;
    
        $fckeditor->Width = $this->getOption('width');
        $fckeditor->Height = $this->getOption('height');
    
        $content = $fckeditor->CreateHtml();
        
        return $content;
    }
}
