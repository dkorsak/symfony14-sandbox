<?php

/**
 * Navigation form base class.
 *
 * @method Navigation getObject() Returns the current form's model object
 *
 * @package    comgroup
 * @subpackage form
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 */
abstract class BaseNavigationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'url'              => new sfWidgetFormInputText(),
      'route'            => new sfWidgetFormInputText(),
      'parent_tree_id'   => new sfWidgetFormInputText(),
      'category_level'   => new sfWidgetFormInputText(),
      'ltf'              => new sfWidgetFormInputText(),
      'rgt'              => new sfWidgetFormInputText(),
      'scope'            => new sfWidgetFormInputText(),
      'display'          => new sfWidgetFormInputCheckbox(),
      'meta_title'       => new sfWidgetFormInputText(),
      'meta_description' => new sfWidgetFormTextarea(),
      'meta_keys'        => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'url'              => new sfValidatorString(array('max_length' => 255)),
      'route'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'parent_tree_id'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'category_level'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ltf'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'rgt'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'scope'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'display'          => new sfValidatorBoolean(),
      'meta_title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'meta_description' => new sfValidatorString(array('required' => false)),
      'meta_keys'        => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Navigation', 'column' => array('url')))
    );

    $this->widgetSchema->setNameFormat('navigation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Navigation';
  }


}
