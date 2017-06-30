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
 



<!-- 内容标题 -->
<div class="r_boxww"><h1><?php echo $archive['title'];?></h1></div>
<div class="contentinfo"><?php echo lang(author);?>：<a><?php echo $archive['author'];?></a>&nbsp;&nbsp; <?php echo lang(adddate);?>：<?php echo $archive['adddate'];?>&nbsp;&nbsp; <?php echo lang(view);?>：<?php echo view_js($archive['aid']);?><?php if($archive['attr3']) { ?>&nbsp;&nbsp; <?php echo lang(source);?>：<?php echo $archive['attr3'];?><?php } ?></div>
<div id="content" class="clear">
<!-- 正文 -->
<?php echo $archive['content'];?>
<div class="clear"></div>
</div>

<div class="blank30"></div>


<?php if($archive['attr2']) { ?>
<!-- 价格 -->
<div class="blank10"></div>
<?php echo lang(productprice);?>： <?php echo $archive['attr2'];?>
<?php } ?>

<?php if($archive['tag']) { ?>
<!-- tag -->
<div class="blank10"></div>
<?php echo lang(tag);?>： <?php echo $archive['tag'];?>
<?php } ?>

<?php if($archive['special']) { ?>
<!-- 专题 -->
<div class="blank10"></div>
<?php echo lang(special);?>： <?php echo $archive['special'];?>
<?php } ?>


<?php if($archive['type']) { ?>
<!-- 分类 -->
<div class="blank10"></div>
<?php echo lang(type);?>： <?php echo $archive['type'];?>
<?php } ?>


<?php if($archive['area']) { ?>
<!-- 地区 -->
<div class="blank10"></div>
<?php echo lang(area);?>： <?php echo $archive['area'];?>
<?php } ?>

<div class="blank30"></div>
<?php if($pages>1) { ?>
<!-- 内页分页 -->
<div class="blank10"></div>
<div class="pages">
<?php echo archive_pagination($archive);?>
</div>
<div class="blank30"></div>
<?php } ?>


<!--自动调用自定义字段-->
<?php echo $archive['my_fields'];?>

<div class="blank20"></div>


<?php if(archive_attachment($archive['aid'],'id')) { ?>
<!-- 附件 -->
<p>
<?php echo lang(attachment);?>：<?php echo attachment_js($archive['aid']);?>
</p>
<?php } ?>
<div class="blank30"></div>

<?php if(hasflash()) { ?>
<div style="color:red;font-size:16px;"><?php echo showflash(); ?></div><?php } ?>

<!-- 投票 -->
<?php echo vote_js($archive['aid']);?>

<!-- 自定义表单开始 -->
<?php if($archive['showform']) { ?>
<?php echo template('myform/nrform.html'); ?>
<?php } ?>
<!-- 自定义表单结束 -->


<script language="JavaScript">
function shutwin(){
window.close();
return;}
</script>





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

<!-- 相关文章开始 -->
<?php if(is_array($likenews)) { ?>
<div class="blank30"></div>
<div class="p_info"><?php echo lang(relatedcontent);?>：<?php echo $archive['tag'];?></div>
<div class="blank10"></div>
<ul class="news_list">
  <?php if(is_array($likenews) && !empty($likenews))
foreach($likenews as $item) { ?>
<li><a href="<?php echo archive::url($item);?>"><?php echo cut($item['title'],20);?></a></li>
  <?php } ?>
  </ul>
<?php } ?>
<!-- 相关文章结束 -->


 
         </div>
       </div>


  </div>
</div>
<?php echo template('footer.html'); ?>