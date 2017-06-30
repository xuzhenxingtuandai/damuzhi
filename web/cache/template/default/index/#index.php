<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header1.html'); ?>
<div id="main">

<div class="wu01">
 <div class="wu01_left">
   <a href="/index.php?case=archive&act=list&catid=20"><img src="<?php echo $skin_path;?>/images/ad01.jpg" /></a>
   <p><a href="/index.php?case=archive&act=list&catid=20"><img src="<?php echo $skin_path;?>/images/yhhd.jpg" /></a></p>
 </div>
 <div class="wu01_right">
   <ul>
     <li><a href="/index.php?case=archive&act=list&catid=18"><img src="<?php echo $skin_path;?>/images/ad02.jpg" /></a></li>
     <li style="margin-right:0px;"><a href="/index.php?case=archive&act=list&catid=33"><img src="<?php echo $skin_path;?>/images/ad03.jpg" /></a></li>
     <li><a href="/index.php?case=archive&act=list&catid=26"><img src="<?php echo $skin_path;?>/images/ad04.jpg" /></a></li>
     <li style="margin-right:0px;"><a href="/index.php?case=archive&act=list&catid=3"><img src="<?php echo $skin_path;?>/images/ad05.jpg" /></a></li>
   </ul>
   <div style="clear:both;"></div>
 </div>
 <div style="clear:both;"></div>
</div>


<div class="wu02">
  <div class="wu02_title"><h2>品牌定制家居</h2></div>
  <div class="wu02_title2"><img src="<?php echo $skin_path;?>/images/ad06.jpg" /></div>
  <div class="wu02_con">
    <ul>
      <li><a href="/index.php?case=archive&act=list&catid=17"><img src="<?php echo $skin_path;?>/images/ad07.jpg" /></a></li>
      <li><a href="/index.php?case=archive&act=list&catid=18"><img src="<?php echo $skin_path;?>/images/ad08.jpg" /></a></li>
      <li><a href="/index.php?case=archive&act=list&catid=19"><img src="<?php echo $skin_path;?>/images/ad09.jpg" /></a></li>
      <li><a href="/index.php?case=archive&act=list&catid=39"><img src="<?php echo $skin_path;?>/images/ad10.jpg" /></a></li>
      <li><a href="/index.php?case=archive&act=list&catid=34"><img src="<?php echo $skin_path;?>/images/ad11.jpg" /></a></li>
      <li><a href="/index.php?case=archive&act=list&catid=36"><img src="<?php echo $skin_path;?>/images/ad12.jpg" /></a></li>
    </ul>
    <div style="clear:both;"></div>
  </div>
</div>


<div class="wu03">
<?php foreach(plugins::categoryinfo(7) as $c) { ?>      
<?php echo $c['categorycontent'];?>
<?php } ?>
</div>


<div class="wu04">
  <div class="wu04_title"><h2>关于大拇指</h2></div>
  <div class="wu04_title2"><img src="<?php echo $skin_path;?>/images/ad13.jpg" /></div>
  <div class="wu04_con">
<?php foreach(plugins::categoryinfo(1) as $c) { ?>      
<?php echo $c['categorycontent'];?>
<?php } ?>
  </div>
</div>
<?php echo template('footer.html'); ?>