<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php if(vote::title($aid,1)) { ?>

<form name="voteform" method="post" action="<?php echo url('vote/do'); ?>">
    <input type="hidden" name="aid" value="<?php echo $aid;?>"/>

        <div id="content_vote">
            <?php if(!vote::voted($aid,$user['username'])) { ?>
<h5><?php echo lang(vote);?>：</h5>
            <ul>
                <?php $i=1; while(vote::title($aid,$i)) { ?>

                <li>
                   <span class="content-num"> <?php echo $i;?></span> <span><?php echo vote::title($aid,$i);?></span>
                    <?php if(vote::img($aid,$i)) { ?>
                    <img src="<?php echo vote::img($aid,$i);?>" width="60" />
                    <?php } ?>
                   <div class=optionba> <?php echo form::radio('vote',$i,0);?> </div>
   <div class="clear">&nbsp;</div>
                </li>

                <?php $i++; } unset($i); ?>

            </ul>
 <div class="blank10">&nbsp;</div>
            <?php echo form::submit();?>
            <?php } else { ?>
<h5><?php echo lang(vote);?><?php echo lang(results);?>：</h5>
            <ul>
                
                
                <?php $i=1; while(vote::title($aid,$i)) { ?>

                <li>
                    <span class="num"><?php echo $i;?></span> <span><?php echo vote::title($aid,$i);?></span>
                        <?php if(vote::img($aid,$i)) { ?>
                        <img src="<?php echo vote::img($aid,$i);?>" />
                        <?php } ?>
      
                    <div class=optionbar><div style="width: <?php echo vote::get($aid,$i)*3+5;?>px;"></div></div>
                    <?php echo vote::get($aid,$i);?>
                    <div class="clear">&nbsp;</div>
                </li>

                <?php $i++; } unset($i);?>

            </ul>

            <?php } ?>
            </div>
</form>
<?php } ?>
