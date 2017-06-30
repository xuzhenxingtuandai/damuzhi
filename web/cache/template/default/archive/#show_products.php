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
 



<!-- 右侧说明 -->
<div id="pro_baseinfo">
<ul>
<li style="text-align:center; font-weight:bold; font-size:16px;"><?php echo $archive['title'];?></li>
<li style="text-align:center; padding-top:10px;"><img src="<?php echo $archive['thumb'];?>" /></li>
</ul>

</div>

<div class="blank30"></div>
<div class="p_info">介绍：</div>
<div class="blank30"></div>
<!-- 内容说明 -->

<?php echo $archive['content'];?>



<div class="blank30"></div>


<!-- 上下页开始 -->
<div id="page">
<?php if($archive['p']['aid']) { ?>
<strong><?php echo lang(archivep);?>：</strong><a href="<?php echo $archive['p']['url'];?>"><?php echo $archive['p']['title'];?></a>
<?php } else { ?>
<strong><?php echo lang(archivep);?>：</strong><?php echo lang(nopage);?>	
<?php } ?>
<div class="clear"></div>
<?php if($archive['n']['aid']) { ?>
 <strong><?php echo lang(archiven);?>：</strong><a href="<?php echo $archive['n']['url'];?>"><?php echo $archive['n']['title'];?></a>
<?php } else { ?>
<strong><?php echo lang(archiven);?>：</strong><?php echo lang(nopage);?>	
<?php } ?>
</div>
<!-- 上下页结束 -->






 
         </div>
       </div>

  </div>
</div>
<?php echo template('footer.html'); ?>