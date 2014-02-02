<?php

class ArticleForm extends BaseArticleForm
{
  
    public function configure()
    {
        unset($this['updated_at']);
        $this->setWidget('body', new dkWidgetFormFCKeditor());
        $this->setWidget('created_at', new dkWidgetFormJQueryDate());
        $this->getWidget('created_at')->setOption('range_from', 5);
        $this->getWidget('created_at')->setOption('range_to', 10);
    }
    
    public function save($con = null)
    {
        parent::save($con);
        if ($this->getValue('created_at') == '') {
            $this->getObject()->setCreatedAt(date('Y-m-d H:i:s'));
        } else  {
            $this->getObject()->setCreatedAt(date('Y-m-d H:i:s', strtotime($this->getValue('created_at'))));
        }
        $this->getObject()->save();
        return $this->getObject();
    }
}
