<?php

class guestbook_act extends act {
    function init() {
    	if(!config::get('guestbook_enable')){
    		alerterror('留言本功能已关闭');
    	}
        $user='';
        if(cookie::get('login_username') &&cookie::get('login_password')) {
            $user=new user();
            $user=$user->getrow(array('username'=>cookie::get('login_username')));
        }
        $this->view->user=$user;
        $this->_user=new user;
        $this->table='guestbook';
        $this->_table=new $this->table;
        if(!$this->_table->getFields()) exit('PAGE NOT FOUND!');
        $this->view->form=$this->_table->get_form();
        $this->_pagesize=config::get('manage_pagesize');
        $this->view->manage=$this->table;
        $this->view->primary_key=$this->_table->primary_key;
        $fieldlimit=$this->_table->getcols(front::$act=='list'?'user_list':'user_modify');
        $field=$this->_table->getFields();
        helper::filterField($field,$fieldlimit);
        $this->view->field=$field;
        if(!front::get('page')) front::$get['page']=1;
    }
    function index_action() {
        $this->list_action();
        if(front::post('submit')) {
			if(!front::post('guesttel')) {
                front::flash(lang('请填写联系电话！'));
                return false;
            }
            if(!front::post('title')) {
                front::flash(lang('请填写标题！'));
                return false;
            }
            if(!front::post('content')) {
                front::flash(lang('请选择内容！'));
                return false;
            }
            if(config::get('verifycode')) {
                if(front::post('verify')<>session::get('verify')) {
                    front::flash(lang('验证码错误！'));
                    return false;
                }
            }
            front::$post['checked']=0;
            if(empty($this->view->user)) {
                front::$post['userid']=0;
                front::$post['username']='游客：'.front::$post['nickname'];
            }else {
                front::$post['userid']=$this->view->user['userid'];
                front::$post['username']=$this->view->user['username'];
            }
            front::$post['adddate']=date('Y-m-d H:i:s');
            front::$post['ip']=front::ip();
            if (!get_magic_quotes_gpc()) {
                front::$post['content'] = front::$post['content'];
            }
            front::$post['title']=strip_tags(front::$post['title']);
            $data=front::$post;
            $insert=$this->_table->rec_insert($data);
            if($insert<1) {
                front::flash(lang('留言失败！'));
            }
            else {
            	if(config::get('email_gust_send_cust') && front::$post['guestemail']){
            		$title = "您在".config::get('sitename')."的留言已提交";
            		$this->sendmail(front::$post['guestemail'], $title, $title);
            	}
            	if(config::get('email_guest_send_admin') && config::get('email')){
            		$title = '网站在' . date('Y-m-d H:i:s') . '有新留言了';
            		$this->sendmail(config::get('email'), $title, $title);
            	}
                if(config::get('sms_on') && config::get('sms_guestbook_on')){
                    sendMsg(front::$post['guesttel'],config::get('sms_guestbook'));
                }
                if(config::get('sms_on') && config::get('sms_guestbook_admin_on') && $mobile = config::get('site_mobile')){
                    sendMsg($mobile,front::$post['username'].'在'.date('Y-m-d H:i:s').'留言了');
                }
                
                front::flash(lang('留言成功！'));
                $this->view->submit_success=true;
                if(front::get('t') == 'wap'){
                	front::redirect(url::create('guestbook/index/t/wap/success/'.time()));
                }else{
                	front::redirect(url::create('guestbook/index/success/'.time()));
                }
            }
        }
    }
     //# 手机 邮件留言页面  
    function email_action() {
    	$this->view->admin_email = config::get('email'); ;
    }
    
    //# 手机 邮件留言保存页面 
    function emailpost_action() {
    	if(!front::post('guestemail')) {
    		front::flash(lang('请填写联系电话！'));
    		return false;
    	}
    	if(!front::post('title')) {
    		front::flash(lang('请填写标题！'));
    		return false;
    	}
    	if(!front::post('content')) {
    		front::flash(lang('请选择内容！'));
    		return false;
    	}
    	if(config::get('verifycode')) {
    		if(front::post('verify')<>session::get('verify')) {
    			front::flash(lang('验证码错误！'));
    			return false;
    		}
    	}
    	$smtpemailto = config::get('email'); 
    	$title = "网站留言:".front::post('title'); 
    	
    	$mailbody = "客户邮箱: ".front::post('content'); 
    		
    	$this->sendmail($smtpemailto, $title, $mailbody); 
    	
    	front::flash(lang('留言成功！'));	
    }
    private function sendmail($smtpemailto,$title,$mailbody) {
    	/*if(!$fp = @fsockopen(config::get('smtp_host'),25,$errno,$errstr,30)) {
    		$charset='utf-8';
    		$headers = "From:".config::get('smtp_user_add')."\r\n";
    		$headers .= 'Content-type: text/html; charset='.$charset."\r\n";
    		$email_subject = '=?'.$charset.'?B?'.base64_encode(str_replace("\r",'',str_replace("\n",'',$title))).'?=';
    		@mail($smtpemailto,$email_subject,$mailbody,$headers);
    	}else {*/
    		include_once(ROOT.'/lib/plugins/smtp.php');
    		$mailsubject = mb_convert_encoding($title,'GB2312','UTF-8');
    		$mailtype = "HTML";
    		$smtp = new include_smtp(config::get('smtp_mail_host'),config::get('smtp_mail_port'),config::get('smtp_mail_auth'),config::get('smtp_mail_username'),config::get('smtp_mail_password'));
    		$smtp->debug = false;
    		$smtp->sendmail($smtpemailto,config::get('smtp_user_add'),$mailsubject,$mailbody,$mailtype);
    	//}
    }
    
    function list_action() {
        $limit=((front::get('page')-1)*config::get('list_pagesize')).','.config::get('list_pagesize');
        $where=null;
        $this->_view_table=$this->_table->getrows($where,$limit,'1 desc',$this->_table->getcols('user_list'));
        $this->view->record_count=$this->_table->record_count;
    }
    function view($table) {
        $this->view->data=$table['data'];
    }
    function end() {
        if(!isset($this->_view_table['data']) &&isset($this->_view_table))
            $this->_view_table['data']=$this->_view_table;
        if(isset($this->_view_table))
            $this->view($this->_view_table);
        //# 手机邮件留言模版     
        if(front::get('act') == 'email' && front::get('t') == 'wap'){ 
        	$tpl = 'guestbook/wap_email.html';	
        }elseif(front::get('t') == 'wap'){
        	$tpl = 'guestbook/wap.html';
        }
        $this->render($tpl);
    }
}