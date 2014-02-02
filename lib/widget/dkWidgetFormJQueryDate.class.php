<?php

class dkWidgetFormJQueryDate extends sfWidgetFormDate
{
    /**
     * Configures the current widget.
     *
     * Available options:
     *
     *  * image:   The image path to represent the widget (false by default)
     *  * config:  A JavaScript array that configures the JQuery date widget
     *  * culture: The user culture
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetForm
     */
    protected function configure($options = array(), $attributes = array())
    {
        $this->addOption('image', '/images/admin/calendar.gif');
        $this->addOption('config', '{}');
        $this->addOption('culture', 'pl');
        $this->addOption('theme', 'redmond');
        $this->addOption('include_jquery', false);
        $this->addOption('range_from', 50);
        $this->addOption('range_to', 6);
        parent::configure($options, $attributes);
        $this->addOption('format', '%day%.%month%.%year%');
    }
  
    /**
     * @param  string $name        The element name
     * @param  string $value       The date displayed in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $years = range(date('Y') - $this->getOption('range_from'), date('Y') + $this->getOption('range_to'));
        $this->addOption('years', array_combine($years, $years));
        
        $prefix = $this->generateId($name);
    
        $image = '';
        if (false !== $this->getOption('image')) {
            $image = sprintf(', buttonImage: "%s", buttonImageOnly: true', $this->getOption('image'));
        }
  
        return parent::render($name, $value, $attributes, $errors).
            $this->renderTag('input', array('type' => 'hidden', 'size' => 10, 'id' => $id = $this->generateId($name).'_jquery_control', 'disabled' => 'disabled', 'name' => $id = $this->generateId($name).'_jquery_control', 'class' => 'required')).
            sprintf(<<<EOF
  <script type="text/javascript">
    function wfd_%s_read_linked()
    {
      jQuery("#%s").val(jQuery("#%s").val() + "-" + jQuery("#%s").val() + "-" + jQuery("#%s").val());
  
      return {};
    }
  
    function wfd_%s_update_linked(date)
    {
      jQuery("#%s").val(date.substring(0, 4));
      var m = date.substring(5, 7);
      if (m != 10){m = m.replace("0", "");}
      jQuery("#%s").val(m);
      var d = date.substring(8)
      if (d != 10 && d != 20 && d !=30 ){d = d.replace("0", "");}
      jQuery("#%s").val(d);
    }
  
    function wfd_%s_check_linked_days()
    {
      var daysInMonth = 32 - new Date(jQuery("#%s").val(), jQuery("#%s").val() - 1, 32).getDate();
      jQuery("#%s option").removeAttr("disabled");
      jQuery("#%s option:gt(" + (%s) +")").attr("disabled", "disabled");
  
      if (jQuery("#%s").val() > daysInMonth)
      {
        jQuery("#%s").val(daysInMonth);
      }
    }
  
    jQuery(document).ready(function() {
      jQuery("#%s").datepicker(jQuery.extend({}, {
        minDate:    new Date(%s, 1 - 1, 1),
        maxDate:    new Date(%s, 12 - 1, 31),
        beforeShow: wfd_%s_read_linked,
        onSelect:   wfd_%s_update_linked,
        showOn:     "button"
        %s
      }, jQuery.datepicker.regional["%s"], %s, {dateFormat: "yy-mm-dd"}));
    });
  
    jQuery("#%s, #%s, #%s").change(wfd_%s_check_linked_days);
  </script>
EOF
        ,
        $prefix, $id,
        $this->generateId($name.'[year]'), $this->generateId($name.'[month]'), $this->generateId($name.'[day]'),
        $prefix,
        $this->generateId($name.'[year]'), $this->generateId($name.'[month]'), $this->generateId($name.'[day]'),
        $prefix,
        $this->generateId($name.'[year]'), $this->generateId($name.'[month]'),
        $this->generateId($name.'[day]'), $this->generateId($name.'[day]'),
        ($this->getOption('can_be_empty') ? 'daysInMonth' : 'daysInMonth - 1'),
        $this->generateId($name.'[day]'), $this->generateId($name.'[day]'),
        $id,
        min($this->getOption('years')), max($this->getOption('years')),
        $prefix, $prefix, $image, $this->getOption('culture'), $this->getOption('config'),
        $this->generateId($name.'[day]'), $this->generateId($name.'[month]'), $this->generateId($name.'[year]'),
        $prefix
      );
  }
  
  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavaScripts()
  {
      $js = array();
      if ($this->getOption('include_jquery') == true) {
          $js[] = '/js/jquery.min.js';
      }
      $js[] = '/js/jqueryui/ui/jquery.ui.core.js';
      $js[] = '/js/jqueryui/ui/jquery.ui.datepicker.js';
      if ($this->getOption('culture') != 'en') {
          $js[] = '/js/jqueryui/ui/i18n/jquery.ui.datepicker-'.$this->getOption('culture').'.js';
      }
      return $js;
  }
  
  /**
   * Gets the stylesheet paths associated with the widget.
   *
   * The array keys are files and values are the media names (separated by a ,):
   *
   *   array('/path/to/file.css' => 'all', '/another/file.css' => 'screen,print')
   *
   * @return array An array of stylesheet paths
   */
  public function getStylesheets()
  {
      return array('/js/jqueryui/css/'.$this->getOption('theme').'/jquery.custom.css' => 'all');
  }
}

