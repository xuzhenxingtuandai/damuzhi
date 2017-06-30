<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div id="footer">

<div class="footer-icons">
    	<div class="w">
        	<ul>
            	<li class="a1"><span>免费设计</span><br>Free Design</li>
                <li class="a2"><span>环保板材</span><br>Eco-Products</li>
                <li class="a3"><span>配送安装</span><br>Distribution Installation</li>
                <li class="a4"><span>终身维护</span><br>Lifetime Maintenance</li>
            </ul>
        </div>
</div>


<div class="footer_message">
  <div style="margin:0 auto; width:1100px;">
     <div class="footer_messagel">
        <ul>
          <li style="width:245px; padding-top:3px;"><img src="<?php echo $skin_path;?>/images/biaosi.jpg" /></li>
          <li>
            <div class="footer_nav">
              <a href="">网站导航</a>
              <a href="">友情链接</a>
              <a href="">法律声明</a>
              <a href="">隐私保护</a>
            </div> 
            <p>Copyright 2017-2018 大拇指品牌 【<a href="http://www.dmzyg.cn/admin" target="_blank">网站管理</a>】 <a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备17048205号</a></p>
          </li>
        </ul>
        <div style="clear:both;"></div>
     </div>
     <div class="footer_messager">
        <ul>
          <li>
            <div class="footer_dh">400-800-8080</div>
            <div class="footer_fw">24小时全天候为您服务</div>
          </li>
          <li style="width:77px; padding-left:20px;"><img src="<?php echo $skin_path;?>/images/erweima.jpg" /></li>
        </ul>
        <div style="clear:both;"></div>
     </div>
     <div style="clear:both;"></div>
  </div>
</div>



</div>



<!--返回头部开始-->

<div id="goTop" title="返回顶部" style="display: block; "></div>
<script type="text/javascript"> 
$(function(){
 
        /* 窗体滚动事件 */
        $(window).scroll(function(){
                //判断滚动条的垂直位置是否大于0，说白了就是：判断滚动条是否在顶部
                if($(window).scrollTop()<=100) {
                        //$("#goTop").stop(true,false).animate({bottom:"-156px"},500); //动画隐藏ID="doTop"的这个层
$("#goTop").hide();
                }else{
                        //$("#goTop").stop(true,false).animate({bottom:"30px"},500);  //动画显示ID="doTop"的这个层
$("#goTop").show();
                }

        });
        /* 点击返回顶部箭头的事件 */
        $("#goTop").click(function(){
                $("body,html").animate({scrollTop:0},500); //返回顶部，用JQ的animate动画
        });
$("#footer_gotop").click(function(){
                $("body,html").animate({scrollTop:0},500); //返回顶部，用JQ的animate动画
        });
 
});
</script>

<!--返回头部结束-->


<div style="display:none">Powered by <a href="http://www.cmseasy.cn" title="CmsEasy企业网站系统" target="_blank">CmsEasy</a></div>
<script type="text/javascript" src="<?php echo $base_url;?>/js/common.js"></script>

<script type="text/javascript"> 
// 公告滚动js
var t=setInterval(myfunc,1000); 
var oBox=document.getElementById("announ"); 
function myfunc(){ 
var o=oBox.firstChild 
oBox.removeChild(o) 
oBox.appendChild(o) 
} 
oBox.onmouseover=function()
{
clearInterval(t)
} 
oBox.onmouseout=function()
{
t=setInterval(myfunc,2000)//滚动时间，默认2秒
} 
</script>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>





<script>
function checkmail(str)
{
var strreg="email";
var r;
var strtext=document.all(str).value;
//strreg=/^w+((-w+)|(.w+))*@[a-za-z0-9]+((.|-)[a-za-z0-9]+)*.[a-za-z0-9]+$/i;
strreg=/^w+((-w+)|(.w+))*@{1}w+.{1}w{2,4}(.{0,1}w{2}){0,1}/ig;
r=strtext.search(strreg);
if(r==-1) {
alert("邮箱格式错误!");
document.all(str).focus();
}
}
</script>
</body>
</html>