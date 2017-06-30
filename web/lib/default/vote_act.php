<?php

if (!defined('ROOT')) exit('Can\'t Access !');
class vote_act extends act {
    function init() {
        if(cookie::get('login_username') &&cookie::get('login_password')) {
            $user=new user();
            $user=$user->getrow(array('username'=>cookie::get('login_username')));
            if(is_array($user) &&cookie::get('login_password')==front::cookie_encode($user['password'])) {
                $this->view->user=$user;
                $this->view->usergroupid=$user['groupid'];
            }
        }
        else $this->view->usergroupid=0;
    }
    function do_action() {
        if(front::post('submit') &&front::post('vote') &&front::post('aid')) {
            front::check_type(front::post('aid'));
            if(!isset($this->view->user)) front::flash(lang('请登陆！'));
            $vote=new vote();
            $_vote=$vote->getrow('aid='.front::post('aid'));
            if(eregi($this->view->user['username'].',',$_vote['users'])) {
                front::flash(lang('不能重复投票！'));
                front::redirect(front::$from);
            }
            $_votes=$_vote['votes'];
            if(!$_votes) $_votes=array();
            else $_votes=unserialize($_votes);
            $_votes[front::post('vote')]=$_votes[front::post('vote')]+1;
            $votes=serialize($_votes);
            $vote_data=array_merge($_vote,array('votes'=>$votes,'aid'=>front::post('aid'),'users'=>$_vote['users'].$this->view->user['username'].','));
            $vote->rec_replace($vote_data,front::post('aid'));
            front::flash(lang('投票成功！'));
        }else {
            front::flash(lang('投票失败！'));
        }
        front::redirect(front::$from);
    }
    function view_action() {
        $this->view->aid=front::get('aid');
        echo tool::text_javascript($this->fetch());
    }
    function show_action() {
        $this->render();
    }
}