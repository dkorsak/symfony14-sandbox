<?php

class navigationGeneratorConfiguration extends BaseNavigationGeneratorConfiguration
{
    public function getFieldsDefault()
    {
        $res = parent::getFieldsDefault();
        $res['url']['is_real'] = false;
        $res['display']['is_real'] = false;
    
        return $res;
    }
}
