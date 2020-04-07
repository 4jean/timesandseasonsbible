<?php if($prev):?>
    <a class="prev-link" data-toggle="tooltip" href="<?php echo base_url('bible/passage/').$prev['book'].'/'.$prev['chapter'].'/';?>" title="<?php echo $prev['book'].' '.$prev['chapter'];?>"><span class="icon-arrow-left"></span><span><?php echo $prev['book'].' '.$prev['chapter'];?></span></a>
<?php endif;?>
<?php if($next):?>
    <a class="next-link" data-toggle="tooltip" href="<?php echo base_url('bible/passage/').$next['book'].'/'.$next['chapter'].'/';?>" title="<?php echo $next['book'].' '.$next['chapter'];?>"><span><?php echo $next['book'].' '.$next['chapter'];?></span><span class="icon-arrow-right"></span></a>
<?php endif;?>