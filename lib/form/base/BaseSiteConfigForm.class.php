<?php

/**
 * SiteConfig form base class.
 *
 * @method SiteConfig getObject() Returns the current form's model object
 *
 * @package    comgroup
 * @subpackage form
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 */
abstract class BaseSiteConfigForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'contact_email'    => new sfWidgetFormInputText(),
      'meta_title'       => new sfWidgetFormInputText(),
      'meta_description' => new sfWidgetFormTextarea(),
      'meta_keys'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'contact_email'    => new sfValidatorString(array('max_length' => 150)),
      'meta_title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_description' => new sfValidatorString(array('required' => false)),
      'meta_keys'        => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('site_config[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SiteConfig';
  }


}
