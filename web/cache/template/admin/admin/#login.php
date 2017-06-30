<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="CmsEasy 5_5_0_20140118_UTF8" />
<title><?php echo get('sitename');?>管理登录 - Powered by CmsEasy.cn - Powered by CmsEasy</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo $skin_path;?>/login/login.css" type="text/css" media="all"  />
<style type="text/css">
#bg {
width:608px;
height:512px;
margin:0px auto;
padding:0px auto;
text-align:center;
background:url(<?php echo $skin_path;?>/login/login_bg.png) no-repeat left top !important; 

/*For Firefox*/
*background:none;
/*For IE7 & IE6*/
_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $skin_path;?>/login/login_bg.png',sizingMethod='crop');
}
.login {clear:both; width:127px;height:44px;line-height:26px;text-align:center; font-weight:bold; border:none;color:white;
background:url(<?php echo $skin_path;?>/login/login_btn.png) no-repeat left top !important; 
/*For Firefox*/
*background:none;
/*For IE7 & IE6*/
_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $skin_path;?>/login/login_btn.png',sizingMethod='crop');
}
</style>
</head>
<body>
<div id="bg">&nbsp;
<div id="login">
<div style="margin:150px 0px 0px 360px;">

<?php
    if(!get('submit')) flash();
    if(!get('submit') || hasflash()) {

?>

    <form name="loginform" action="<?php echo uri();?>" method="post" onsubmit="return Dcheck();">
    <input type="hidden" name="submit" value="提交">
     <input name="username" type="text" id="username" value="" class="input" tabindex="1" />
    <input name="password" type="password" id="password" value="<?php //echo $password;?>" tabindex="2" class="input" />
    <select name="expire" class="ss">
      <option selected value=''>登录有效期-当前会话</option>
      <option value='86400'>登录有效期-1天</option>
      <option value='2592000'>登录有效期-1月</option>
      <option value='31536000'>登录有效期-1年</option>
    </select>
<?php
    if($loginfalse){
?>
     <p class="code">验证码: <input type='text' id="verify"  tabindex="3"  name="verify" />&nbsp;<?php echo verify();?></p>
<?php
}
?>
     <p><input type="submit" name="submit" value=" 登 陆 " class="login" tabindex="4" /></p>
     </form>
   
   <div style="clear:both;"></div>
</div></div>

<?php
    }


    if(get('submit')) {

  if(hasflash()) {
      echo '<div style="clear:both;text-align:left;color:#A5EF54;font-size:16px;font-weight:bold;">';
  echo flash();
  } else { ?>
            <div style="padding-top:5px; text-align:left;color:#fff;font-size:16px;font-weight:bold;">
            登陆成功！
            <meta http-equiv="refresh" content="2;url=<?php echo $admin_url;?>&site=<?php echo front::get('site')?>">
<?php
      }
  echo '</div>';
}
?></div>

</div><div class="clear"></div>
</div>
<div class="clear"></div>
<div id="footer" style="display:none;">Copyright &copy; 2013 Powered by <a href="http://www.cmseasy.cn" title="CmsEasy企业网站系统" target="_blank">CmsEasy</a></div>
<script type="text/javascript">
function ResumeError()
{
    return true;
}
window.onerror = ResumeError;
document.loginform.username.focus();
</script>

</body>
</html>