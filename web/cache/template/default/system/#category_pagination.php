<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="pages">
    <span><?php echo pages('record_count');?><?php echo lang(nrecord);?>/<?php echo pages('page_count');?><?php echo lang(npage);?></span>
    <?php if(pages('up')) { ?>
    <a href="<?php echo category::url($catid,pages('up'));?>"><?php echo lang(uppage);?></a>
    <?php } ?>
    <?php foreach(pages() as $p) { ?>
    <?php if($p==$page) { ?>
    <strong><?php echo $p;?></strong>
    <?php } else { ?>
    <a href="<?php echo category::url($catid,$p);?>"><?php echo $p;?></a>
    <?php } ?>

    <?php } ?>
    <?php if(pages('down')) { ?>
    <a href="<?php echo category::url($catid,pages('down'));?>"><?php echo lang(downpage);?></a>
    <?php } ?>
</div>