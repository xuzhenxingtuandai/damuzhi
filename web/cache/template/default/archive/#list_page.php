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
         
              <!-- 内容 -->
              <?php
              $page = intval(front::$get['page']);
              if($page==0)$page=1;
              $content = $category[$catid][categorycontent];
              $contents = preg_split('%<div style="page-break-after(.*?)</div>%si', $content);
              if ($contents) {
                  $pages = count($contents);
                  front::$record_count = $pages * config::get('list_pagesize');
                  $category[$catid][categorycontent] = $contents[$page - 1];
              }
              ?>
              <?php echo $category[$catid]['categorycontent'];?>
              
              <div class="blank30"></div>
              <?php if($pages>1) { ?>
              <!-- 内页分页 -->
              <div class="blank10"></div>
              <div class="pages">
              <?php echo category_pagination($catid);?>
              </div>
              <div class="blank30"></div>
              <?php } ?>
              <a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
              <div class="blank30"></div>
              <div class="clear"></div>

         </div>
       </div>

  </div>
</div>
<?php echo template('footer.html'); ?>