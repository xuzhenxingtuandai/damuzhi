<?php

class table_form  extends table_mode {
    function add_before(act $act) {
        front::$post['userid']=$act->view->user['userid'];
        front::$post['username']=$act->view->user['username'];
        front::$post['checked']=1;
        front::$post['adddate']=date('Y-m-d H:i:s');
        front::$post['ip']=front::ip();
    }
}