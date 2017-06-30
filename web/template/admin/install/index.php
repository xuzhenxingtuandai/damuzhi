<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>易通CMS-免费企业建站程序-{if $pass}填写数据库信息{else}检测数据库链接{/if}</title>
<link rel="shortcut icon" href="{$base_url}/favicon.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" media="all" href="{$skin_path}/install/install.css" />
<script language="javascript" type="text/javascript">
function changebutton(){
	document.getElementById('installbutton').value="安装中...";
}
</script>
</head>
<body>
<div id="body">

<div id="main">
<div id="logo" style="background:url({$skin_path}/install/login_logo.png) no-repeat left top !important; /*For Firefox*/*background:none;/*For IE7 & IE6*/_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{$skin_path}/install/login_logo.png',sizingMethod='crop');/*For IE6*/display: block;"><a href="http://www.cmseasy.org" target="_blank">论坛</a>	| <a href="http://www.cmseasy.org/forum-10-1.html" target="_blank">报错</a> | <a href="http://www.cmseasy.org/forum-9-1.html" target="_blank">在线教程</a></div>

<form name="form1" method="post" action="<?php echo uri();?>">
  
  <?php  if(!get('license_pass')) $this->render('install/license.php'); else { ?>
  
   <input type="hidden" value="1" id="license_pass" name="license_pass"/>

  
     <?php
  $pass=true;
  if(PHP_VERSION<5)    $pass=false;
   if(!$mysql_pass)  $pass=false;
   if(isset($adminerror))  $pass=false;
  ?>

 {if isset($install)}
 <style type="text/css">#main {height:600px;}</style>
<div style="height:88px;border:2px solid #56AED2;background:#BDE8F9;">
<div style="margin:7px;padding:30px 0px;background:white;height:14px;">
<center><span style="font-size:14px;font-weight:bold;"> 安装完毕！现在转到后台管理... </span></center>
</div>

<meta http-equiv="refresh" content="3;url={$admin_url}">
 {else}
<div style="padding:8px;border:2px solid #56AED2;background:#BDE8F9;">
<table border="0" cellspacing="1" cellpadding="4" class="list" name="table1" id="table1" align="center" width="100%">
<thead>
<tr>
 <th colspan="5">可写目录检查</th>
 </tr>
 <tr bgcolor="Silver">
 <th>项目</th> <th>最低要求</th><th>推荐要求</th> <th>系统环境</th> <th>是否通过</th>
 </tr>
 <tr>
 <td>PHP版本</td> <td>5.0以上</td> <td>5.2以上</td> <td><?php echo PHP_VERSION; ?></td> <td align="center"><?php echo helper::yes(PHP_VERSION>=5.0); ?></td>
 </tr>
  <tr>
 <td>MySQL版本</td> <td>5.1以上</td> <td>5.0以上</td> <td>{=@$mysql_verion}</td> <td align="center">
 {if $pass}
 <?php echo helper::yes($mysql_ver>=5); ?>
 {else}
   <input type="submit" name="submit"  class="button" value=" 检查 " />
 {/if}
 </td>
 </tr>
 </thead>

 <tbody>
  <tr bgcolor="Silver">
 <th>目录</th><th colspan="4">可写</th>
 </tr>
 <tr>
 <td><?php echo '/config';?></td> <td colspan="4"><?php echo helper::yes(front::file_mode_info(ROOT.'/config')>=2);  ?></td>
 </tr>
   <tr>
 <td><?php echo '/cache';?></td> <td colspan="4"><?php echo helper::yes(front::file_mode_info(ROOT.'/cache')>=2);  ?></td>
 </tr>
   <tr>
 <td><?php echo '/data';?></td> <td colspan="4"><?php echo helper::yes(front::file_mode_info(ROOT.'/data')>=2);  ?></td>
 </tr>
<tr>
 <td><?php echo '/install';?></td> <td colspan="4"><?php echo helper::yes(front::file_mode_info(ROOT.'/install')>=2);  ?></td>
 </tr>
 <tr>
 <td><?php echo '/upload';?></td> <td colspan="4"><?php echo helper::yes(front::file_mode_info(ROOT.'/upload')>=2);  ?></td>
 </tr>
 </tbody>
 

 <tbody>

 <tr>
 <th colspan="5">
 
  
<strong>MySQL设置  {if $mysql_pass}<span style="color:#08000;">( <?php echo helper::yes(1); ?> <font color="green">连接成功!</font> )</span>{else}{if get('submit')}<span style="color:red;">( <?php echo helper::yes(0); ?> 连接失败！){else}( 未测试连接！ ){/if}{/if}</span></strong>
<?php $input_disable=$pass?'':''; ?>

 </th>
 </tr>
 
 <tr>
 <td class="left">服务器</td><td colspan="4"><?php echo form::input('hostname',/*get('hostname') ? get('hostname'): */config::get('database','hostname'),$input_disable);?>&nbsp;&nbsp;&nbsp;&nbsp;默认 localhost 可不修改！</td>
 </tr>

  <tr>
 <td class="left">MySQL用户名</td><td colspan="4"><?php echo form::input('user',/*get('user') ?get('user'):*/config::get('database','user'),$input_disable);?></td>
 </tr>
   <tr>
 <td class="left">MySQL密码</td><td colspan="4"><?php echo form::input('password',/*get('password') ? get('password') :*/config::get('database','password'),$input_disable);?></td>
 </tr>
  <tr>
 <td class="left">MySQL数据库名</td><td colspan="4"><?php echo form::input('database',/*front::post('database') ?front::post('database') : */config::get('database','database'),$input_disable);?>&nbsp;&nbsp;
 <input type="checkbox" value="1" style="width:15px;height:15px;background:none;border:none;" name="createdb" {$input_disable}/>新建数据库&nbsp;&nbsp;<input type="checkbox" value="1" style="width:15px;height:15px;background:none;border:none;" name="testdata" checked />安装初始数据
 </td>
 </tr>

     <tr>
 <td class="left">前缀</td><td colspan="4"><?php echo form::input('prefix',/*get('prefix') ? get('prefix') :*/config::get('database','prefix'));?></td>
 <?php
 $_PHP_SELF = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : (isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['ORIG_PATH_INFO']);
 $_ROOTPATH = str_replace("\\","/",dirname($_PHP_SELF));
 $_ROOTPATH = strlen($_ROOTPATH)>1 ? $_ROOTPATH."/" : "/";
 $_site_url = 'http://'.$_SERVER['HTTP_HOST'].$_ROOTPATH; 
 ?>
 <input type="hidden" value="<?php echo $_site_url?>" name="site_url" />
 </tr>

 </tbody>

  <tbody>
 <tr>
 <th colspan="5">
 
  管理帐号设置

 </th>
 </tr>
 
 <tr>
 <td class="left">管理员</td><td colspan="4"><?php echo form::input('admin_username',get('admin_username') ? get('admin_username'):'');?></td>
 </tr>
  <tr>
 <td class="left">密码</td><td colspan="4"><?php echo form::password('admin_password',get('admin_password') ?get('admin_password'): '');?></td>
 </tr>
   <tr>
 <td class="left">重复密码</td><td colspan="4"><?php echo form::password('admin_password2',get('admin_password2') ? get('admin_password2') :'');?></td>
 </tr>
  </tbody>
  
    <tbody>
 <tr style="display:none;">
 <th colspan="5">
 
  选择模块

 </th>
 </tr>
 
 <tr style="display:none;">
 <td colspan="5" align="center">
   <label>
     <input type="checkbox" name="smod[]" value="celive" id="smod_0" checked />
     CElive在线客服</label>&nbsp;&nbsp;
 </td>
</tr> 
</tbody>
  
 </td>
 </tr>
 <tr>
<td colspan="5">
<div class="blank10"></div>

 {if isset($dberror)}
 <script>alert('指定数据库不存在！如果确定使用指定数据库，请勾选 “新建数据库”! ');</script>
 {/if}
 
  {if isset($adminerror)}
 <script>alert('请设置好管理帐号! ');</script>
 {/if}

 {if $pass}
 <input type="hidden" name="install" value="1"/>
 <input type="submit" id="installbutton" name="submit" value=" 安装 " style="float:right;" class="button" onclick="changebutton();if(!confirm('你确实要把数据安装在数据库 [ '+this.form.database.value+' ] 吗？')) return false;"/>
 {else}
  <input type="submit" name="submit"  class="button" value=" 检查安装环境 " style="float:right;" />
 {/if}
 {/if}
 <div class="blank10"></div>
</td>
 </tr>
 </tbody>
</table>


 </div>



<?php } ?>
</form>


<div class="blank10"></div>
<div id="footer">
<div class="copy">Copyright &copy; 2012, All rights reserved. Powered by <a href="http://www.cmseasy.cn" title="CmsEasy企业网站系统" target="_blank">CmsEasy</a></div>
</div>
</div>
</body>
</html>