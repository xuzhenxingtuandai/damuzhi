<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php
$item = front::get('item');
?>
<iframe id="I2" src="<?php echo $base_url;?>/bbs/admin/<?php echo $item;?>.php" width="100%" height="600" frameborder="0"></iframe>