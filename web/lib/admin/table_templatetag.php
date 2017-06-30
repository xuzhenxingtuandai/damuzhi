<?php

if (!defined('ROOT'))
    exit('Can\'t Access !');
class table_templatetag extends table_mode {
    function vaild() {
        if (!front::post('name')) {
            front::flash('请填写名称！');
            return false;
        }
        return true;
    }
    function save_before() {
    }
}