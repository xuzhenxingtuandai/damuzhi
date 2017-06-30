<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<div id="main">
  <div class="lr">


   <div class="product">
 <div class="product_title">
           <div style="float:left;"><h2><?php echo $category[$catid]['catname'];?></h2></div>
           <div style="float:right;"><?php echo template('position.html'); ?></div>
 <div style="clear:both"></div>
 </div>
 <div class="product_con">
 


<div class="wu_product_nner">
<!-- 内容缩略图列表 -->
  <ul>
<?php foreach($archives as $i => $archive) { ?>
   <li><a href="<?php echo $archive['url'];?>" target="_blank"><img src="<?php echo $archive['thumb'];?>"  width="350px;" height="252px;"/></a><br />&nbsp;&nbsp;<a href="<?php echo $archive['url'];?>" target="_blank"><?php echo cut($archive['title'],12);?></a></li>

<?php } ?> 
  </ul>	
  <div style="clear:both"></div>
</div>
<!-- 内容缩略图列表结束 -->
<div class="clear"></div>
<div class="blank30"></div>

<!-- 内容列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<!-- 内容列表分页结束 -->


<div class="clear"></div>






 
         </div>
       </div>

  </div>
</div>
<?php echo template('footer.html'); ?>