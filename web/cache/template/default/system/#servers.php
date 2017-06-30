<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php $ifonserver=config::get('ifonserver');?>
<?php if($ifonserver) { ?>
<?php
if(config::get(boxopen)=='close'){
$_clear = '-126';
$_clear2 = '-126';
}elseif(config::get(boxopen)=='open'){
$_clear = '0';
$_clear2 = '120';
}
?>

<style type="text/css">

.cleft_b{
position:fixed;top:30%;left:-128px;z-index:99999;}
.cleft_b1{
position:fixed;top:30%;}
}
.cleft_box{
margin: 0px;
padding: 0px;
overflow: hidden;
width:166px; right:0px;
}

.cleft_box_content {
margin:0px;
padding:0px;
width: 128px;
overflow: hidden;
float:left;
background:none;
}

.cleft_box_content .serverlist ul li {
padding-top:5px;
line-height:180%;
    margin:0px auto;
}

.cleft_box .cright{
width: 36px;
height: 74px;
color: #fff;
font-size: 14px;
font-weight: bold;
text-align: center;
margin-top:15px;
padding-top: 35px;
cursor: pointer;
float: right;
background:url(<?php echo $base_url;?>/images/rtitleico.png) left top no-repeat;
}
 .cfooter a {display:block;width:128px;height:22px;}
 .cfooter {width:128px;height:22px;background:url(<?php echo $base_url;?>/images/leftbt.png) left top no-repeat;}

  .cleft_box_content .serverlist {
text-align:center;
width:128px;
background: url(<?php echo $base_url;?>/images/leftcontentbg.png) repeat-y;
}
.cleft_box_content .serverlist ul {
width:118px;
background:url(<?php echo $base_url;?>/images/celive_bg.gif) left top repeat-x;
list-style: none;
margin:0px 5px;
    padding:5px 0px 10px 0px;
}
.cleft_box_content .cheader {
margin:0 auto;
padding-left:20px;
height:30px;
background: url(<?php echo $base_url;?>/images/leftbg.png) left top no-repeat;
overflow:hidden;
width: 128px;
}


.cheader .ctitle{
margin:0 auto;
width:128px;
height:31px;
line-height:31px;
}

</style>
 

<div id="cleft_box" class="cleft_b" onmouseover=toBig() onmouseout=toSmall()>
  <div class="cleft_box"> 
<div class="cright">  
<span style="layout-flow:vertical-ideographic"></span>
</div> 
<div class="cleft_box_content"> 
<div class="cheader"> 
<div class="ctitle"></div> 
</div> 
<div class="serverlist"> 
<ul>
<?php if(config::get('qq1')) { ?><li><a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config::get('qq1');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo config::get('qq1');?>:41 &r=0.9360973767470568" alt="点击这里给我发消息" title="点击这里给我发消息"></a></li><?php } ?>
            <?php if(config::get('qq2')) { ?><li><a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config::get('qq2');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo config::get('qq2');?>:41 &r=0.9360973767470568" alt="点击这里给我发消息" title="点击这里给我发消息"></a></li><?php } ?>
            <?php if(config::get('qq3')) { ?><li><a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config::get('qq3');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo config::get('qq3');?>:41 &r=0.9360973767470568" alt="点击这里给我发消息" title="点击这里给我发消息"></a></li><?php } ?>
            <?php if(config::get('qq4')) { ?><li><a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config::get('qq4');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo config::get('qq4');?>:41 &r=0.9360973767470568" alt="点击这里给我发消息" title="点击这里给我发消息"></a></li><?php } ?> 
            <?php if(config::get('qq5')) { ?><li><a rel="nofollow" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config::get('qq5');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo config::get('qq5');?>:41 &r=0.9360973767470568" alt="点击这里给我发消息" title="点击这里给我发消息"></a></li><?php } ?>   
<?php if(config::get('wangwang')) { ?><li><a rel="nofollow" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo config::get('wangwang');?>&site=cntaobao&s=1&charset=utf-8" target="_blank"><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo config::get('wangwang');?>&site=cntaobao&s=1&charset=utf-8"/></a></li><?php } ?>

<?php if(config::get('ali')) { ?><li>
  <a rel="nofollow" target="_blank" href="http://web.im.alisoft.com/msg.aw?v=2&uid=<?php echo config::get('ali');?>&site=cnalichn&s=10" ><img border="0" src="http://web.im.alisoft.com/online.aw?v=2&uid=<?php echo config::get('ali');?>&site=cnalichn&s=10" alt="点击这里给我发消息" /></a></li>
<?php } ?> 
<?php if(config::get('skype')) { ?><li><a rel="nofollow" href="skype:<?php echo config::get('skype');?>?call" target="_blank"><img src="http://mystatus.skype.com/smallclassic/<?php echo config::get('skype');?>"/></a></li><?php } ?> 
<?php if(config::get('msn')) { ?><li><a rel="nofollow" target="_blank" href="msnim:add?contact=<?php echo config::get('msn');?>"><img style="border-style: none;" src="<?php echo $base_url;?>/images/msn.gif"/></a></li><?php } ?>
<?php if(config::get('weixin_pic')) { ?><li>
  <li><img border="0" src="<?php echo config::get('weixin_pic');?>" width="80" /></li>
<?php } ?> 

<?php if((config::get(webserver)=='open')) { ?>
            <?php
            if(config::get('mods')){
            
            if(config::get('liveboxtip')){
               $liveboxtip = '&liveboxtips';
            }else{
               $liveboxtip = '';
            }
            
            
            ?>
            <!-- BEGIN CmsEasy Live Code, Copyright (c) 2009 CmsEasy.cn. All Rights Reserved -->
<script type="text/javascript" language="javascript" src="<?php echo $base_url;?>/celive/js/include.php?cmseasylive&text<?php echo $liveboxtip;?>"></script>
<!-- END CmsEasy Live Code, Copyright (c) 2009 CmsEasy.cn. All Rights Reserved -->
            <?php
            }
            ?> 
<?php } else { ?>
<?php } ?>
</ul> 
</div> 
<div class="cfooter"><a href='#' title='<?php echo lang(gotop);?>' id='toTop' onfocus='this.blur()'></a></div> 
</div>
  </div> 
</div>
<script language=javascript>
celive=function (id,_top,_left){
var me=id.charAt?document.getElementById(id):id, d1=document.body, d2=document.documentElement;
d1.style.height=d2.style.height='100%';me.style.top=_top?_top+'px':0;me.style.left=_left+"px";
//[(_left>0?'left':'left')]=_left?Math.abs(_left)+'px':0;
me.style.position='absolute';
setInterval(function (){me.style.top=parseInt(me.style.top)+(Math.max(d1.scrollTop,d2.scrollTop)+_top-parseInt(me.style.top))*0.1+'px';},10+parseInt(Math.random()*20));
return arguments.callee;
};
window.onload=function (){
celive
('cleft_box',100,<?php echo $_clear;?>)
}

lastScrollY=0; 

var InterTime = 1;
var maxWidth=-1;
var minWidth=<?php echo $_clear2;?>;
var numInter = 8;

var BigInter ;
var SmallInter ;

var o =  document.getElementById("cleft_box");
var i = parseInt(o.style.left);
function Big()
{
if(parseInt(o.style.left)<maxWidth)
{
i = parseInt(o.style.left);
i += numInter;	
o.style.left=i+"px";	
if(i==maxWidth)
clearInterval(BigInter);
}
}
function toBig()
{
clearInterval(SmallInter);
clearInterval(BigInter);
BigInter = setInterval(Big,InterTime);
}
function Small()
{
if(parseInt(o.style.left)>minWidth)
{
i = parseInt(o.style.left);
i -= numInter;
o.style.left=i+"px";

if(i==minWidth)
clearInterval(SmallInter);
}
}
function toSmall()
{
clearInterval(SmallInter);
clearInterval(BigInter);
SmallInter = setInterval(Small,InterTime);

}

</script>

<?php } ?>