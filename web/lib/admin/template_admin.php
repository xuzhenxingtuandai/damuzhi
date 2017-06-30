<?php

if (!defined('ROOT'))
    exit('Can\'t Access !');
class template_admin extends admin {
    function init() {
		$this->check_pw();
    }
    function note_action() {
    	chkpw('template_note');
        if (front::post('submit')) {
            unset(front::$post['submit']);
            help::$_var['template_note'] = front::$post;
            help::save();
        }
        $dir = ROOT .'/template/'.config::get('template_dir');
        $_dir = dir($dir);
        while ($file = $_dir->read()) {
            if (!preg_match('/^\./',$file) &&is_dir($dir .'/'.$file) &&!preg_match('/[#@]/',$file)  &&!preg_match('/^_/',$file)) {
                $this->view->tps[$file] = '<b>'.$file .'</b>';
                $__dir = dir($dir .'/'.$file);
                while ($_file = $__dir->read()) {
                    if (!preg_match('/^\./',$_file) &&!preg_match('/[#@]/',$_file)) {
                        if ($file=='skin'&&!preg_match('/\.(css|js)$/',$_file))
                            continue;
                        $_file = str_replace('.','_',$_file);
                        if (is_dir($dir .'/'.$file .'/'.$_file))
                            $this->view->tps[$file .'/'.$_file] = "&nbsp;&nbsp;└<b>".$_file .'</b>';
                        else
                            $this->view->tps[$file .'/'.$_file] = "&nbsp;&nbsp;└".$_file;
                    }
                }
            }
            elseif (!preg_match('/^\./',$file) &&is_file($dir .'/'.$file) &&!preg_match('/[#@]/',$file)) {
                $file = str_replace('.','_',$file);
                $tps[$file] = $file;
            }
        }
        //$this->view->tps = array_merge($tps,$this->view->tps);
        $tps_arr = array_merge($tps,$this->view->tps);
         //分页
        $limit = 20;
        if(!front::get('page'))
            $page = 1;
        else
            $page = front::get('page');
        $total = ceil(count($tps_arr)/$limit);
        if($page < 1) $page = 1;
        if($page > $total) $page = $total;
        $start = ($page-1) * $limit;
        $end = $start+$limit-1;
        $tmp = range($start,$end);
        $list_tps_arr = array();
        $i = 0;
        foreach($tps_arr as $k => $v){
        	if(in_array($i++,$tmp))
        	     $list_tps_arr[$k] = $v;
        }
        $this->view->tps = $list_tps_arr;
        $this->view->link_str = listPage($total,$limit,$page);
    }
    function tag_action() {
        if (front::post('submit')) {
            unset(front::$post['submit']);
            help::$var['tag_note2'] = array();
            help::$_var['tag_note2'] = front::post('tag');
            help::save();
        }
        for ($i = 0;$i<=49;$i++)
            $this->view->tags[$i] = null;
    }
    function edit_action() {
    	chkpw('template_edit');
        if (front::post('submit')) {
            unset(front::$post['submit']);
            help::$_var[config::get('template_dir') .'_template_note'] = front::$post;
            help::save();
        }
        $dir = ROOT .'/template/'.config::get('template_dir');
        $_dir = dir($dir);
        while ($file = $_dir->read()) {
            if (!preg_match('/^\./',$file) &&is_dir($dir .'/'.$file) &&!preg_match('/[#@]/',$file)  &&!preg_match('/^_/',$file)) {
                $this->view->tps[$file] = '<b>'.$file .'</b>';
                $__dir = dir($dir .'/'.$file);
                while ($_file = $__dir->read()) {
                    if (!preg_match('/^\./',$_file)) {
                        if ($file=='skin'&&!preg_match('/\.(css|js)$/',$_file))
                            continue;
                        $_file = str_replace('.','_',$_file);
                        if (is_dir($dir .'/'.$file .'/'.$_file)){
                            $this->view->tps[$file .'/'.$_file] = "&nbsp;&nbsp;└<b>".$_file .'</b>';
                        }else{
                            $this->view->tps[$file .'/'.$_file] = "&nbsp;&nbsp;└".$_file;
                        }
                    }
                }
            }elseif (!preg_match('/^\./',$file) &&is_file($dir .'/'.$file)) {
                $file = str_replace('.','_',$file);
                $tps[$file] = $file;
            }
        }
        //$this->view->tps = array_merge($tps,$this->view->tps);
        $tps_arr = array_merge($tps,$this->view->tps);
        //分页
        /*$limit = 20;
        if(!front::get('page'))
            $page = 1;
        else
            $page = front::get('page');
        $total = ceil(count($tps_arr)/$limit);
        if($page < 1) $page = 1;
        if($page > $total) $page = $total;
        $start = ($page-1) * $limit;
        $end = $start+$limit-1;
        $tmp = range($start,$end);
        $list_tps_arr = array();
        $i = 0;
        foreach($tps_arr as $k => $v){
        	if(in_array($i++,$tmp)){
        	    $list_tps_arr[$k] = $v;
                }
        }*/
        $this->view->tps = $tps_arr;
        //$this->view->link_str = listPage($total,$limit,$page);
    }
    function fckedit_action() {
        $id = front::post('id');
        $tpl = str_replace('#','',$id);
        $tpid = $tpl;
        $tpl = str_replace('_d_','/',$tpl);
        $tpl = str_replace('_html','.html',$tpl);
        $res = array();
        $res['content'] = file_get_contents(TEMPLATE .'/'.config::get('template_dir') .'/'.$tpl);
        $res['content'] = "<span id='{$tpid}_fck'></span>".form::editor($tpid .'_content',$res['content']);
        session::set('fcid',$tpid .'_content');
        session::set('fcid_life',time() +10);
        echo json::encode($res);
        exit;
    }
    function fetch_action() {
        $id = front::post('id');
        $tpl = str_replace('#','',$id);
        $tpid = $tpl;
        $tpl = str_replace('_d_','/',$tpl);
        $tpl = str_replace('_html','.html',$tpl);
        $tpl = str_replace('_css','.css',$tpl);
        $tpl = str_replace('_js','.js',$tpl);
        $res = array();
        $res['content'] = file_get_contents(TEMPLATE .'/'.config::get('template_dir') .'/'.$tpl);
        $res['content'] = preg_replace('%</textarea%','<&#47textarea',$res['content']);
        $res['content'] = "<textarea rows=\"20\" cols=\"78\" id=\"{$tpid}_content\" style=\"font-family: Fixedsys,verdana,宋体; font-size: 12px;\" name=\"{$tpid}_content\">$res[content]</textarea>";
        echo json::encode($res);
        exit;
    }
    function save_action() {
        $id = front::post('sid');
        $tpl = str_replace('_d_','/',$id);
        $tpl = str_replace('#','',$tpl);
        $tpl = str_replace('_html','.html',$tpl);
        $tpl = str_replace('_css','.css',$tpl);
        $tpl = str_replace('_js','.js',$tpl);
        $res = array();
        $content = htmlspecialchars_decode(front::post('scontent'));
        $content = preg_replace('%<&#47textarea%','</textarea',$content);
        if($_GET['site']!='default') {
            set_time_limit(0);
            $ftp = new nobftp();
            $ftpconfig = config::get('website');
            $ftp->connect($ftpconfig['ftpip'],$ftpconfig['ftpuser'],$ftpconfig['ftppwd'],$ftpconfig['ftpport']);
            $ftperror = $ftp->returnerror();
            if($ftperror) {
                exit($ftperror);
            }else {
                $ftp->nobchdir($ftpconfig['ftppath']);
                file_put_contents(ROOT.'/data/tpl.tmp.php',$content);
                $ftp->nobput($ftpconfig['ftppath'].'/template/'.config::get('template_dir') .'/'.$tpl,ROOT.'/data/tpl.tmp.php');
                $res['message'] = 'ok';
            }
        }else {
            if ($content) {
            	$content = stripslashes($content);
                file_put_contents(TEMPLATE .'/'.config::get('template_dir') .'/'.$tpl,$content);
                $res['message'] = 'ok';
            }
        }
        echo $res['message'];
        exit;
    }
    function end() {
        $this->render('index.php');
    }
}