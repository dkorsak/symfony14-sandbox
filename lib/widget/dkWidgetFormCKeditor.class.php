<?php

/**
 * dkWidgetFormCKeditor 
 *
 * Require installed ckeditor
 *
 * @package    comgroup
 * @subpackage lib.widget
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 * @version    SVN: $Id$
 */
class dkWidgetFormCKeditor extends sfWidgetFormTextarea
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
        $this->addOption('config_file', 'ckeditor_config.js');
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
        $jsFile = '/js/ckeditor/ckeditor.js';
        if (!is_readable(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$jsFile)) {
            throw new sfConfigurationException('You must install CKeditor to use this widget (see rich_text_cke_js_dir settings).');
        }
        
        $response = sfContext::getInstance()->getResponse();
        $response->addJavascript($jsFile);
        
        if ($this->getOption('config_file') != 'ckeditor_config.js') {
            $file = sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$this->getOption('config_file');
            if (!file_exists($file)) {
                throw new sfConfigurationException('Invalid config file path "'.$file.'"');
            }
            $configFile = $this->getOption('config_file');
        } else {
            $configFile = '/js/'.$this->getOption('config_file');
        }
      
        $response->addJavascript($configFile);
      
        $content = parent::render($name, $value = null, $attributes);
        $cke_content = <<<EOF
      <script type="text/javascript">
        CKEDITOR.replace('$name',
        {
          customConfig : '$configFile',
          filebrowserBrowseUrl : '/js/ckfinder/ckfinder.html',
          filebrowserImageBrowseUrl : '/js/ckfinder/ckfinder.html?Type=Images',
          filebrowserFlashBrowseUrl : '/js/ckfinder/ckfinder.html?Type=Flash',
          filebrowserUploadUrl : '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
          filebrowserImageUploadUrl : '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
          filebrowserFlashUploadUrl : '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
      </script>
EOF;
      return $content.$cke_content;
  }
}
