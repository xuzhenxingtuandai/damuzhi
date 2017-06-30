<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="CmsEasy 5_5_0_20140118_UTF8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo getTitle($archive,$category,$catid,$type);?> - Powered by CmsEasy</title>
<meta name="keywords" content="<?php echo getKeywords($archive,$category,$catid,$type);?>" />
<meta property="qc:admins" content="2771704753463535131636" />
<meta name="description" content="<?php echo getDescription($archive,$category,$catid,$type);?>" />
<meta name="author" content="CmsEasy Team" />
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<!-- 调用样式表 -->
<link rel="stylesheet" href="<?php echo $skin_path;?>/base.css" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo $skin_path;?>/reset.css" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo $skin_path;?>/style.css" type="text/css" media="all"  />
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript">
function killerrors()
{
return true;
}
window.onerror = killerrors;
</script>
<!-- 滚动代码JS -->
<script type="text/javascript" src="<?php echo $skin_path;?>/js/js/Index.js"> </script>
<script type="text/javascript" src="<?php echo $skin_path;?>/js/js/ScrollPicLeft.js"></script>
<script type="text/javascript" src="<?php echo $skin_path;?>/js/js/MSClass.js"></script>
<!--<script type="text/javascript" src="<?php echo $skin_path;?>/js/js/JQuery.js"></script>-->
</head>
 <body>
 
<script type="text/javascript" src="<?php echo $skin_path;?>/images/kefu/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo $skin_path;?>/images/kefu/lrtk.js"></script>
<!-- 代码 开始 -->
<div class="scrollsidebar" id="scrollsidebar">
    <div class="side_content">
        <div class="side_list">
            <div class="side_title"><a title="隐藏" class="close_btn"><span>关闭</span></a></div>
            <div class="side_center">            	
                <div class="custom_service">
                    <p>售前咨询</p>
                    <p>
                        <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&amp;uin=465001126&amp;site=www.cactussoft.cn&amp;menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=2:465001126:41"></a>
                    </p>
                    <p>
                        <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&amp;uin=465001126&amp;site=www.cactussoft.cn&amp;menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=2:465001126:41"></a>
                    </p>
                </div>     
                <div class="custom_service" style="border-top:1px solid #ddd;">
                    <p>售后咨询</p>
                    <p>
                        <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&amp;uin=465001126&amp;site=www.cactussoft.cn&amp;menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=2:465001126:41"></a>
                    </p>
                    <p>
                        <a title="点击这里给我发消息" href="http://wpa.qq.com/msgrd?v=3&amp;uin=465001126&amp;site=www.cactussoft.cn&amp;menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=2:465001126:41"></a>
                    </p>
                </div>          
                <div class="other">
                    <p>客户服务热线</p>
                    <p style=" color:#C00; font-weight:bold;">400-800-8080</p>
                </div>
            </div>
            <div class="side_bottom"></div>
        </div>
    </div>
    <div class="show_btn"><span>在线客服</span></div>
</div>
<!-- 代码 结束 -->
<script type="text/javascript"> 
$(function() { 
$("#scrollsidebar").fix({
float : 'right',	//default.left or right
//minStatue : true,
skin : 'blue',	//default.gray or blue
durationTime : 600
});
});
</script> 



<div id="left_layer" style="position:fixed; top:150px; left:0px; z-index:9999;">
  <a href="javascript:;" onclick="javascript:document.getElementById('left_layer').style.display='none';"><img src="<?php echo $skin_path;?>/images/fudong.png" /></a>
</div>





<div id="header">
 
   <div class="top">
     <div style="margin:0 auto; width:1100px;">
       <img src="<?php echo $skin_path;?>/images/top.jpg" />
     </div>
   </div>


   <div class="menu">
      <!-- 网站导航 -->
        <div class="nav">
          <ul id="nav">
            <li class="one<?php if($topid==0) { ?> on<?php } ?>"><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/">网站首页</a></li>
            <?php foreach(categories_nav() as $t) { ?>
            <li class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>">
            <a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" target="<?php if(config::get('nav_blank')==1) { ?> _blank<?php } ?>"><?php echo $t['catname'];?></a>
             <?php if(count(categories($t['catid']))) { ?>
              <ul>
                <?php foreach(categories($t['catid']) as $t1) { ?>
                <li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a></li>
                <?php } ?>
              </ul>
              <?php } ?> </li>
            <?php } ?>
          </ul>
          <div style="clear:both;"></div>
        </div>
      <!-- 导航结束 -->
   </div>


    <div class="banner">
          <script src="<?php echo $skin_path;?>/index-merge.js"></script>
          <div class="mod-banner">
              <div id="img-tab" class="img-tab">
                  <a class="f-tab-b" href="<?php echo get(slide_pic1_url);?>" target="_self">
                  <img class="fd-hide" src="<?php echo get(slide_pic1);?>"></a>
                  <a class="f-tab-b" href="<?php echo get(slide_pic2_url);?>" target="_self">
                  <img class="fd-hide" src="<?php echo get(slide_pic2);?>"></a>
                  <a class="f-tab-b" href="<?php echo get(slide_pic3_url);?>" target="_self">
                  <img class="fd-hide" src="<?php echo get(slide_pic3);?>"></a>
              </div>
          </div> 
    </div>
    

    <div class="sosoubg">
      <div style="margin:0 auto; width:1100px;">
        <div class="sosoubg_left"><img src="<?php echo $skin_path;?>/images/sosoubg_left.jpg" /></div>
        <div class="sosoubg_right">
          <!-- 搜索框 -->
          <div class="search">
          <form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
          <input type="text" name="keyword" value="产品搜索" onfocus="if(this.value=='产品搜索') {this.value=''}" onblur="if(this.value=='') this.value='产品搜索'" class="s_text" />
          <input name='submit' type="submit" value="" align="middle" class="s_btn" />
          </form>
          </div>
        </div>
        <div style="clear:both;"></div>
      </div>
    </div>


</div>

