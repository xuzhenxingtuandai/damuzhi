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
 <div class="product_con2">



<!-- 内容列表开始 -->
<?php foreach($archives as $i => $arc) { ?>
<div class="news_text">
<h5><span class="date"><?php echo $arc['adddate'];?></span><a title="<?php echo $arc['stitle'];?>" target="_blank" href="<?php echo $arc['url'];?>"><?php echo $arc['title'];?></a></h5>
<p><?php echo cut(strip_tags($arc['introduce']),100);?>…<a title="<?php echo $arc['stitle'];?>" href="<?php echo $arc['url'];?>">[<?php echo lang(more);?>]</a><p>
<div class="clear"></div>
</div>
<?php } ?>
<!-- 内容列表结束 -->

<div class="blank30"></div>

<!-- 内容列表分页开始 -->
<?php if(isset($pages)) { ?>
<?php echo category_pagination($catid);?>
<?php } ?>
<!-- 内容列表分页开始 -->


<div class="blank30"></div>
<div class="clear"></div>






 
         </div>
       </div>

  </div>
</div>
<?php echo template('footer.html'); ?>