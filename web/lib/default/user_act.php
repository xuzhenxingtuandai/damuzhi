<?php

if (!defined('ROOT')) exit('Can\'t Access !');
class user_act extends act {
    function init() {
        $user='';
        if(cookie::get('login_username') &&cookie::get('login_password')) {
            $user=new user();
            $user=$user->getrow(array('username'=>cookie::get('login_username')));
            if(cookie::get('login_password')!=front::cookie_encode($user['password'])){
            	unset($user);
            }
        }
        if(!is_array($user) &&front::$act != 'login'&&front::$act != 'ologin'&&front::$act != 'respond'&&front::$act != 'dialog_login'&&front::$act != 'space'&&front::$act != 'register'&&front::$act != 'login_js'&&front::$act != 'login_success'&&front::$act != 'getpass'&&front::$act != 'edit'){
        	front::redirect(url::create('user/login'));
        }else{
        	$this->view->user=$user;
        }
        $this->_user=new user;
        $this->view->form = $this->_user->get_form();
        $this->view->field = $this->_user->getFields();
        $this->view->primary_key=$this->_user->primary_key;
		 if(is_array($_POST)){
        	foreach ($_POST as $v){
        		if(preg_match('/(select|load_file|\[|password)/i', $v)){
        			exit('not access');
        		}
        	}
        }
    }
    function index_action() {
        $this->view->data=$this->view->user;
    }
    function space_action() {
        //$space=new user();
        //$space=$space->getrow(array('userid'=>front::get('mid')));
        //$this->view->user=$space;
        //var_dump($this->view->user);
        if(!$this->view->user['userid']){
        	alertinfo('请先登录',url::create('user/login'));
        }
        $this->_table=new archive;
        if(!front::get('page')) front::$get['page']=1;
        $limit=((front::get('page')-1)*20).',20';
        $where="userid={$this->view->user['userid']}";
        $where .= ' and '.$this->_table->get_where('user_manage');
        $this->_view_table=$this->_table->getrows($where,$limit,'1 desc',$this->_table->getcols('manage'));
        $this->view->data=$this->_view_table;
        $this->view->record_count=$this->_table->record_count;
    }
    function edit_action() {
        if(front::post('submit')) {
        	unset(front::$post['groupid']);
        	unset(front::$post['powerlist']);
        	foreach (front::$post as $k => $v){
        		if(is_array($v) && !empty($v)){
        			front::$post[$k] = implode(',', $v);
        		}
        		front::check_type(front::post($k), 'safe');
        	}
            $this->_user->rec_update(front::$post,'userid='.session::get('userid'));
            front::flash(lang('修改资料成功！'));
            front::redirect(url::create('user/index'));
        }
        $this->view->data=$this->view->user;
    }
    
    //第三方平台登录
    function ologin_action(){
        $logintype = $_GET['logtype'];
        $where = array('ologin_code'=>$logintype);
        $ologins = ologin::getInstance()->getrows($where);
        include_once ROOT.'/lib/plugins/ologin/'.$logintype.'.php';
        $loginobj = new $logintype();
        $url = $loginobj->get_code(unserialize_config($ologins[0]['ologin_config']));
        @header("Location: $url");
        exit;
    }
    
    function respond_action() {
        ini_set("display_errors","On");
        $classname = front::$get['ologin_code'];
        if(front::post('regsubmit')) {
            if(!config::get('reg_on')) {
                front::flash(lang('网站已经关闭注册！'));
                return;
            }
            if(front::post('username') != strip_tags(front::post('username'))
                    ||front::post('username') != htmlspecialchars(front::post('username'))
            ) {
                front::flash(lang('用户名不规范！'));
                return;
            }
            if(strlen(front::post('username'))<4) {
                front::flash(lang('用户名太短！'));
                return;
            }	
            if(front::post('username') &&front::post('password')) {
                $username=front::post('username');
                $password=md5(front::post('password'));
                $data=array(
                        'username'=>$username,
                        'password'=>$password,
                        'groupid'=>101,
                        'userip'=>front::ip(),
                        $classname=>session::get('openid'),
                );
                if($this->_user->getrow(array('username'=>$username))) {
                    front::flash(lang('该用户名已被注册！'));
                    return;
                }
                $insert=$this->_user->rec_insert($data);
                $_userid = $this->_user->insert_id();
                if($insert){
                    front::flash(lang('注册成功！'));
                }else {
                    front::flash(lang('注册失败！'));
                    return;
                }
                $user=$data;
                cookie::set('login_username',$user['username']);
                cookie::set('login_password',front::cookie_encode($user['password']));
                session::set('username',$user['username']);
                front::redirect(url::create('user'));
                exit;
            }
        }
        
        if (front::post('submit')) {
            if (front::post('username') && front::post('password')) {
                $username = front::post('username');
                $password = md5(front::post('password'));
                $data = array(
                    'username' => $username,
                    'password' => $password,
                );
                $user = new user();
                $row = $user->getrow(array('username' => $data['username'], 'password' => $data['password']));
                if (!is_array($row)) {
                    $this->login_false();
                    return;
                }
                $post[$classname] = session::get('openid');
                $this->_user->rec_update($post, 'userid=' . $row['userid']);
                cookie::set('login_username', $row['username']);
                cookie::set('login_password', front::cookie_encode($row['password']));
                session::set('username', $row['username']);
                front::redirect(url::create('user'));
                return;
            } else {
                $this->login_false();
                return;
            }
        }
        
        include_once ROOT.'/lib/plugins/ologin/'.$classname.'.php';
        $ologinobj = new $classname();
        $status = $ologinobj->respond();
        //var_dump(session::get('openid'));exit;
        $where[$classname] = session::get('openid');
        if(!$where[$classname]) front::redirect(url::create('user'));
        $user = new user();
        $data = $user->getrow($where);
        if(!$data){
            $this->view->data = $status;
        }else{
            cookie::set('login_username',$data['username']);
            cookie::set('login_password',front::cookie_encode($data['password']));
            session::set('username',$data['username']);
            front::redirect(url::create('user'));
        }

    }
    //////////////////////
    
    function login_action() {
        if(!$this->loginfalsemaxtimes())
            if(front::post('submit')) {
                if(config::get('verifycode')) {
                    if(!session::get('verify') ||front::post('verify')<>session::get('verify')) {
                        front::flash(lang('验证码错误！')."<a href=''>".lang('backuppage')."</a>");
                        return;
                    }
                }
                if(front::post('username') &&front::post('password')) {
                    $username=front::post('username');
                    $password=md5(front::post('password'));
                    $data=array(
                            'username'=>$username,
                            'password'=>$password,
                    );
                    $user=new user();
                    $user=$user->getrow(array('username'=>$data['username'],'password'=>$data['password']));
                    if(!is_array($user)) {
                        $this->login_false();
                        return;
                    }
                    $user=$data;
                    cookie::set('login_username',$user['username']);
                    cookie::set('login_password',front::cookie_encode($user['password']));
                    session::set('username',$user['username']);
                    $this->view->from=front::post('from')?front::post('from'):front::$from;
                    front::flash($this->fetch('user/login_success.html'));
                    return;
                }
                else {
                    $this->login_false();
                    return;
                }
            }
            $this->view->ologinlist = ologin::getInstance()->getrows('',50);
    }
    function dialog_login_action() {
        if(!$this->loginfalsemaxtimes())
            if(front::post('submit')) {
                if(config::get('verifycode')) {
                    if(!session::get('verify') ||front::post('verify')<>session::get('verify')) {
                        front::flash(lang('验证码错误！')."<a href=''>".lang('backuppage')."</a>");
                        return;
                    }
                }
                if(front::post('username') &&front::post('password')) {
                    $username=front::post('username');
                    $password=md5(front::post('password'));
                    $data=array(
                            'username'=>$username,
                            'password'=>$password,
                    );
                    $user=new user();
                    $user=$user->getrow(array('username'=>$data['username'],'password'=>$data['password']));
                    if(!is_array($user)) {
                        $this->login_false();
                        return;
                    }
                    $user=$data;
                    cookie::set('login_username',$user['username']);
                    cookie::set('login_password',front::cookie_encode($user['password']));
                    session::set('username',$user['username']);
                    session::set('userid',$user['uid']);
                    $this->view->from=front::post('from')?front::post('from'):front::$from;
                    $this->view->message=$this->fetch('user/login_success.html');
                    return;
                }
                else {
                    $this->login_false();
                    return;
                }
            }
    }
    function login_false() {
        cookie::set('loginfalse',(int) cookie::get('loginfalse')+1,time()+3600);
        event::log('loginfalse','失败 user='.front::post('username'));
        front::flash(lang('登陆失败！')."<a href=''>".lang('backuppage')."</a>");
    }
    function loginfalsemaxtimes() {
        if(cookie::get('loginfalse')>5 ||event::loginfalsemaxtimes()) {
            front::flash('帐号输入错误次数太多！请1小时后再登录！');
            return true;
        }
    }
    function login_js_action() {
        if(cookie::get('login_username') &&cookie::get('login_password')) {
            $user=$this->_user->getrow(array('username'=>cookie::get('login_username')));
            if(is_array($user) &&cookie::get('login_password')==front::cookie_encode($user['password'])) {
                $this->view->user=$user;
                session::set('username',$user['username']);
            }
        }
        echo tool::text_javascript($this->fetch());
        exit;
    }
    function logout_action() {
        cookie::del('login_username');
        cookie::del('login_password');
        session::del('username');
        front::redirect(url::create('user/login'));
        exit;
    }
    
    private function sendmail($smtpemailto,$title,$mailbody) {
    	if(!$fp = @fsockopen(config::get('smtp_host'),25,$errno,$errstr,30)) {
    		$charset='utf-8';
    		$headers = "From:".config::get('smtp_user_add')."\r\n";
    		$headers .= 'Content-type: text/html; charset='.$charset."\r\n";
    		$email_subject = '=?'.$charset.'?B?'.base64_encode(str_replace("\r",'',str_replace("\n",'',$title))).'?=';
    		@mail($smtpemailto,$email_subject,$mailbody,$headers);
    	}else {
    		include_once(ROOT.'/lib/plugins/smtp.php');
    		$mailsubject = mb_convert_encoding($title,'GB2312','UTF-8');
    		$mailtype = "HTML";
    		$smtp = new include_smtp(config::get('smtp_mail_host'),config::get('smtp_mail_port'),config::get('smtp_mail_auth'),config::get('smtp_mail_username'),config::get('smtp_mail_password'));
    		$smtp->debug = false;
    		$smtp->sendmail($smtpemailto,config::get('smtp_user_add'),$mailsubject,$mailbody,$mailtype);
    	}
    }
    
    function register_action() {
        if(front::post('submit')) {
            if(!config::get('reg_on')) {
                front::flash(lang('网站已经关闭注册！'));
                return;
            }
            if(config::get('verifycode')) {
                if(!session::get('verify') ||front::post('verify')<>session::get('verify')) {
                    front::flash(lang('验证码错误！'));
                    return;
                }
            }
            if(front::post('username') != strip_tags(front::post('username'))
                    ||front::post('username') != htmlspecialchars(front::post('username'))
            ) {
                front::flash(lang('用户名不规范！'));
                return;
            }
            if(strlen(front::post('username'))<4) {
                front::flash(lang('用户名太短！'));
                return;
            }
            if(strlen(front::post('e_mail'))<1) {
                front::flash(lang('请填写邮箱！'));
                return;
            }
			if(strlen(front::post('tel'))<1) {
                front::flash(lang('请填写手机号码！'));
                return;
            }
		
			
            if(front::post('username') &&front::post('password')) {
                $username=front::post('username');
                $password=md5(front::post('password'));
                $e_mail=front::post('e_mail');
                $tel=front::post('tel');
                if(!preg_match('/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/', front::ip())&&!preg_match('@^\s*((([0-9A-Fa-f]{1,4}:){7}(([0-9A-Fa-f]{1,4})|:))|(([0-9A-Fa-f]{1,4}:){6}(:|((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})|(:[0-9A-Fa-f]{1,4})))|(([0-9A-Fa-f]{1,4}:){5}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:){4}(:[0-9A-Fa-f]{1,4}){0,1}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:){3}(:[0-9A-Fa-f]{1,4}){0,2}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:){2}(:[0-9A-Fa-f]{1,4}){0,3}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(([0-9A-Fa-f]{1,4}:)(:[0-9A-Fa-f]{1,4}){0,4}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(:(:[0-9A-Fa-f]{1,4}){0,5}((:((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})?)|((:[0-9A-Fa-f]{1,4}){1,2})))|(((25[0-5]|2[0-4]\d|[01]?\d{1,2})(\.(25[0-5]|2[0-4]\d|[01]?\d{1,2})){3})))(%.+)?\s*$@', front::ip())){
                	exit('来源非法');
                }
                $data=array(
                        'username'=>$username,
                        'password'=>$password,
                        'e_mail'=>$e_mail,
                        'tel'=>$tel,
                        'groupid'=>101,
                        'userip'=>front::ip()
                );
                //phpox 2011-06-10
                foreach($this->view->field as $f){
                    $name=$f['name'];
                    if(!preg_match('/^my_/',$name)) {
                        unset($field[$name]);
                        continue;
                    }
                    if(!setting::$var['user'][$name]['showinreg']) {
                        continue;
                    }
                    $data[$name] = front::post($name);
                }
                if($this->_user->getrow(array('username'=>$username))) {
                    front::flash(lang('该用户名已被注册！'));
                    return;
                }
                $insert=$this->_user->rec_insert($data);
                $_userid = $this->_user->insert_id();
                if($insert){
                    if(config::get('sms_on') && config::get('sms_reg_on')){
                        sendMsg($tel,config::get('sms_reg'));
                    }
                    $cmsname = config::get('sitename');
                    if(config::get('email_reg_on')){
                    	$this->sendmail($e_mail,"欢迎注册 $cmsname !",lang('尊敬的').$username.', '.lang('您好!欢迎你注册'.$cmsname.'!'));
                    }
                    
                    front::flash(lang('注册成功！'));
                }else {
                    front::flash(lang('注册失败！'));
                    return;
                }
                if(union::getconfig('enabled')) {
                    $union_visitid = intval(cookie::get('union_visitid'));
                    $union_userid = intval(cookie::get('union_userid'));
                    if($union_visitid &&$union_userid) {
                        $union_reg = new union();
                        $r = $union_reg->getrow(array('userid'=>$union_userid));
                        if($r) {
                            $union_reg->rec_update(array('registers'=>'[registers+1]'),array('userid'=>$union_userid));
                            if($union_reg->affected_rows()) {
                                $union_visit_reg = new union_visit();
                                $union_visit_reg->rec_update(array('regusername'=>front::post('username'),'regtime'=>time()),array('visitid'=>$union_visitid));
                                $this->_user->rec_update(array('introducer'=>$union_userid),array('userid'=>$_userid));
                                $regrewardtype = union::getconfig('regrewardtype');
                                $regrewardnumber = union::getconfig('regrewardnumber');
                                switch($regrewardtype) {
                                    case 'point':
                                        union::pointadd($r['username'],$regrewardnumber,'union');
                                        break;
                                }
                            }
                        }
                    }
                }
                $user=$data;
                cookie::set('login_username',$user['username']);
                cookie::set('login_password',front::cookie_encode($user['password']));
                session::set('username',$user['username']);
                front::redirect(url::create('user'));
                exit;
            }
            else {
                front::flash(lang('注册失败！'));
                return;
            }
        }
    }
    function changepassword_action() {
        if(front::post('dosubmit') &&front::post('password')) {
            if(!front::post('oldpassword') ||!is_array($this->_user->getrow(array('password'=>md5(front::post('oldpassword'))),'userid='.$this->view->user['userid']))) {
                front::flash(lang('原密码不正确！密码修改失败！'));
                return;
            }
            $this->_user->rec_update(array('password'=>md5(front::post('password'))),'userid='.$this->view->user['userid']);
            front::flash(lang('密码修改成功！请记住新密码，并使用新密码再次登陆！'));
        }
    }
    function getpass_action() {
        if(front::post('step') == '') {
            echo template('user/getpass.html');
        }else if(front::post('step') == '1') {
            if(!session::get('verify') ||front::post('verify')<>session::get('verify')) {
                front::flash(lang('验证码错误！'));
                return;
            }
            if(strlen(front::post('username'))<4) {
                front::flash(lang('用户名太短！'));
                return;
            }
            $user=new user();
            $user=$user->getrow(array('username'=>front::post('username')));
            $this->view->user = $user;
            session::set('answer',$user['answer']);
            session::set('username',$user['username']);
            session::set('e_mail',$user['e_mail']);
            if(!empty($user['answer'])) {
                echo template('user/getpass_1.html');
            }else {
                session::set('ischk','true');
                echo template('user/getpass_2.html');
            }
        }else if (front::post('step') == '2') {
            if(strlen(front::post('answer'))<1) {
                echo '<script>alert("'.lang('请输入答案！').'");</script>';
                return;
            }
            if(front::post('answer') != session::get('answer')) {
                echo '<script>alert("'.lang('您的答案错误！').'");</script>';
                return;
            }
            session::set('ischk','true');
            echo template('user/getpass_2.html');
        }else if (front::post('step') == '3') {
            if(strlen(front::post('e_mail'))<1) {
                echo '<script>alert("'.lang('请输入注册填写的邮箱！').'");</script>';
                return;
            }
            if(front::post('e_mail') != session::get('e_mail')) {
                echo '<script>alert("'.lang('邮箱和用户不匹配！').'");</script>';
                return;
            }
            if(session::get('ischk') == 'true') {
                function randomstr($length) {
                    $str = '1234567890abcdefghijklmnopqrstuvwxyz
ABCDEFGHIJKLOMNOPQRSTUVWXYZ';
                    for($i=0;$i<$length;$i++) {
                        $str1 .= $str{mt_rand(0,35)};
                    }
                    return $str1;
                }
                $password1 = randomstr(6);
                $password = md5($password1);
                $user=new user();
                $user->rec_update(array('password'=>$password),'username="'.session::get('username').'"');
                config::setPath(ROOT.'/config/config.php');
                function sendmail($email_to,$email_subject,$email_message,$email_from = '') {
                    extract($GLOBALS,EXTR_SKIP);
                    require ROOT.'/lib/tool/sendmail_inc.php';
                }
                $mail[email]=config::get('email');
                sendmail(session::get('username').' <'.session::get('e_mail').'>',lang('会员找回密码'),' '.lang('尊敬的').session::get('username').', '.lang('您好! 您的新密码是').':'.$password1.' '.lang(您可以登录后到会员中心进行修改).'!',$mail[email]);
                echo '<script>alert("系统重新生成的密码已经发送到你的邮箱,跳转到登录页！!");
window.location="index.php?case=user&act=login"</script>';
            }else {
                echo '<script>alert("'.lang('参数错误！').'");</script>';
                return;
            }
        }
        exit;
    }
    function fckupload_action() {
        /*$uploads=array();
        if(is_array($_FILES)) {
            $upload=new upload();
            foreach($_FILES as $name=>$file) {
                $uploads[$name]=$upload->run($file);
            }
            $this->view->uploads=$uploads;
        }
        $this->render('../admin/system/fckupload.php');*/
        exit;
    }
    function fckuploadcheck_action() {
        if(empty($this->view->user) ||!$this->view->user['userid'])
            exit('PAGE NOT FOUND');
        fckuser::$user=$this->view->user;
        $this->end=false;
    }
    function end() {
        if(isset($this->end) &&!$this->end) return;
        if(front::$debug)
            $this->render('style/index.html');
        else
            $this->render();
    }
}