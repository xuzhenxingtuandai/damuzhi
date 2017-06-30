<?php

if (!defined('ROOT')) exit('Can\'t Access !');
class manage_act extends act {
    protected $_table;
    function init() {
        $user='';
        $guest = front::get('guest');
        if($guest=='1'&&config::get('opguestadd')) {
            $user = 'Guest';
        }else {
            if(cookie::get('login_username') &&cookie::get('login_password')) {
                $user=new user();
                $user=$user->getrow(array('username'=>cookie::get('login_username')));
            }
        }
        if(cookie::get('login_username') &&cookie::get('login_password')) {
            $guestuser=new user();
            $guestuser=$guestuser->getrow(array('username'=>cookie::get('login_username')));
        }
        $this->view->guestuser = $guestuser;
        if(!$user &&front::$act != 'login'&&front::$act != 'register')  front::redirect(url::create('user/login'));
        $this->view->user=$user;
        $this->_user=new user;
        $this->table=front::get('manage');
        if($this->table <>'archive'&&$this->table <>'orders') exit('PAGE NOT FOUND!');
        $this->_table=new $this->table;
        $this->_table->getFields();
        $this->view->form=$this->_table->get_form();
        $this->_pagesize=config::get('manage_pagesize');
        $this->view->manage=$this->table;
        $this->view->primary_key=$this->_table->primary_key;
        if(!front::get('page')) front::$get['page']=1;
        $manage='table_'.$this->table;
        $this->manage=new $manage;
    }
    function list_action() {
        $limit=((front::get('page')-1)*20).',20';
        $where="userid={$this->view->user['userid']}";
        $where .= ' and '.$this->_table->get_where('user_manage');
        $this->_view_table=$this->_table->getrows($where,$limit,'1 desc',$this->_table->getcols('manage'));
        $this->view->record_count=$this->_table->record_count;
    }
    function guestlist_action() {
        echo '<script type="text/javascript">
		alert("'.lang('提交完成，等待审核！').'");
		window.location.href="'.url::create('/manage/guestadd/manage/archive/guest/1').'";
		</script>';
    }
    function orderslist_action() {
        $limit=((front::get('page')-1)*20).',20';
        $where="mid={$this->view->user['userid']}";
        $this->_view_table=$this->_table->getrows($where,$limit,'1 desc',$this->_table->getcols('manage'));
        $this->view->record_count=$this->_table->record_count;
    }
    function add_action() {
        if(front::post('submit') &&$this->manage->vaild()) {
            $this->manage->filter();
            $this->manage->save_before();
            front::$post['checked']=0;
            front::$post['userid']=$this->view->user['userid'];
            front::$post['username']=$this->view->user['username'];
            front::$post['author']=$this->view->user['username'];
            front::$post['adddate']=date('Y-m-d H:i:s');
            front::$post['ip']=front::ip();
            $data=array();
            $fieldlimit=$this->_table->getcols(front::$act=='list'?'user_manage':'user_modify');
            $fieldlimits=explode(',',$fieldlimit);
            foreach(front::$post as $key=>$value) {
            	if(preg_match('/(select|union|and|\'|"|\))/i',$value)){
            		exit('非法参数');
            	}
                if(in_array($key,$fieldlimits))
                    $data[$key]=$value;
            }
            $data=array_merge($data,front::$post);
            $insert=$this->_table->rec_insert($data);
            if($insert<1) {
                front::flash(lang('记录添加失败！'));
            }
            else {
                front::flash(lang('记录添加成功！'));
                if($this->table== 'archive')
                    front::redirect(url::create('/manage/list/manage/archive/needcheck/1'));
            }
        }
        chkpwf('add_archive',$this->view->user['groupid']);
        $this->_view_table=$this->_table->getrow(null,0,null,$this->_table->getcols('user_modify'));
        $this->_view_table['data']=array();
    }
    function guestadd_action() {
        if($this->view->guestuser) {
            echo '<script type="text/javascript">
		alert("'.lang('你已经登录，自动跳转到会员发布页面！').'");
		window.location.href="'.url::create('/manage/add/manage/archive').'";
		</script>';
        }
        if(front::post('submit') &&$this->manage->vaild()) {
            $this->manage->filter();
            $this->manage->save_before();
            //front::$post['title']=addslashes(front::$post['title']);
            front::$post['checked']=0;
            front::$post['userid']='-999';
            front::$post['username']='guest';
            front::$post['author']='guest';
            front::$post['adddate']=date('Y-m-d H:i:s');
            front::$post['ip']=front::ip();
            $data=array();
            $fieldlimit=$this->_table->getcols(front::$act=='list'?'user_manage':'user_modify');
            $fieldlimits=explode(',',$fieldlimit);
            foreach(front::$post as $key=>$value) {
                if(in_array($key,$fieldlimits))
                    $data[$key]=$value;
            }
            $data=array_merge($data,front::$post);
            $insert=$this->_table->rec_insert($data);
            if($insert<1) {
                front::flash(lang('记录添加失败！'));
            }
            else {
                front::flash(lang('记录添加成功！'));
                if($this->table== 'archive')
                    front::redirect(url::create('/manage/guestlist/manage/archive/needcheck/1/guest/1'));
            }
        }
        $this->_view_table=$this->_table->getrow(null,0,null,$this->_table->getcols('user_modify'));
        $this->_view_table['data']=array();
    }
    function edit_action() {
        $from=session::get('from');
        front::check_type(front::get('id'));
        if(front::post('submit') &&$this->manage->vaild()) {
            $this->manage->filter();
            $info=$this->_table->getrow(front::get('id'));
            if($info['userid'] != $this->view->user['userid'] ) {
                front::flash('记录修改失败！(原因：未经授权！)');
                header("Location: ".$from,TRUE,302);
                exit;
            }
            if($info['checked']) {
                front::flash('记录修改失败！(原因：已通过审核！)');
                header("Location: ".$from,TRUE,302);
                exit;
            }
            $this->manage->save_before();
            $data=array();
            $fieldlimit=$this->_table->getcols(front::$act=='list'?'user_manage':'user_modify');
            $fieldlimits=explode(',',$fieldlimit);
            foreach(front::$post as $key=>$value) {
            	if(preg_match('/(select|union|and|\'|"|\))/i',$value)){
            		exit('非法参数');
            	}
                if(in_array($key,$fieldlimits))
                    $data[$key]=$value;
            }
            $update=$this->_table->rec_update($data,front::get('id'));
            if($update<1) {
                front::flash(lang('记录修改失败！'));
            }
            else {
                front::flash(lang('记录修改成功！'));
                $from=session::get('from');
                session::del('from');
                header("Location: ".$from,TRUE,302);
                exit;
            }
        }
        if(!session::get('from')) session::set('from',front::$from);
        $this->_view_table=$this->_table->getrow(front::get('id'),'1',$this->_table->getcols('modify'));
    }
    function delete_action() {
        front::check_type(front::get('id'));
        $row = $this->_table->getrow(array('id'=>front::get('id')));
        if($row['mid'] != $this->view->user['userid']){
        	exit('你没权限删除');
        }
        $delete=$this->_table->rec_delete(front::get('id'));
        if($delete)  front::flash(lang('删除记录成功！'));
        front::redirect(url::modify('act/list/manage/'.$this->table));
    }
    function view($table) {
        $this->view->data=$table['data'];
        $this->view->field=$table['field'];
    }
    function end() {
        if(!isset($this->_view_table)) return;
        if(!isset($this->_view_table['data']))
            $this->_view_table['data']=$this->_view_table;
        $this->_view_table['field']=$this->_table->getFields();
        $this->view->fieldlimit=$this->_table->getcols(front::$act=='list'?'user_manage':'user_modify');
        $this->view($this->_view_table);
        manage_form::manage($this);
        if(front::$debug)
            $this->render('style/index.html');
        else
            $this->render();
    }
}