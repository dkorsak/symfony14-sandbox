<?php

/**
 * StaticPage form.
 *
 * @package    comgroup
 * @subpackage form
 * @author     Daniel Korsak <daniel.korsak@wp.pl>
 */
class StaticPageForm extends BaseStaticPageForm
{
    public function configure()
    {
        $this->useFields(array('body'));
        $this->setWidget('body', new dkWidgetFormFCKeditor());
    }
}
