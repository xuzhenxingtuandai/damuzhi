<?php

if (!defined('ROOT'))exit('Can\'t Access !');
$check_code = array();
$check_code['admin_system_admin'] = '58e8aa3a236ff07ab2667edca1ac780e';//文件 lib\admin\admin_system_.php 校验值
$check_code['admin_system_table'] = '71538392c25df7baf0c8ba34c34dcc35';//文件 lib\table\admin_system_.php 校验值
$check_code['view_phpcheck'] = '576d8c91c00ddf77672285cb5ddbc092';//文件 lib\inc\view.php 校验值
$check_code['run_phpcheck'] = 'a49000411bdf40468bc5ca2baf9a77d0';//文件 lib\table\run.php 校验值
$check_code['getinf_phpcheck'] = '0d0980a72b0bebe03f34abc2dc60295b';//文件 lib\tool\getinfo.php 校验值


//以下语句为调试程序时使用，正式发布时需删除。实际发布时以上方变量为准。
$check_code['admin_system_admin']= md5_file(ROOT.'/lib/admin/admin_system_.php');
$check_code['admin_system_table'] = md5_file(ROOT.'/lib/table/admin_system_.php');
$check_code['view_phpcheck'] = md5_file(ROOT.'/lib/inc/view.php');
$check_code['run_phpcheck'] = md5_file(ROOT.'/lib/table/run.php');
$check_code['getinf_phpcheck'] = md5_file(ROOT.'/lib/tool/getinf.php');