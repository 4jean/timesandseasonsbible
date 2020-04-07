<?php
include 'psg_sel.php';
$abbr = $this->cj_model->get_abbr($book_id);
$prev = $this->cj_model->get_prev($book_id, $chapter);
$next = $this->cj_model->get_next($book_id, $chapter);
?>
<section id="content">
    <div style="padding-bottom: 20px;">
            <div class="row">
                <div class="col-md-1">></div>
                <!--Passage Main Begin-->
                <div class="col-md-10">
                    <div class="main-passage" id="main-passage">
                        <div class="wrap-main-passage">
                            <div class="bible-passage">
                                <div class="passage-bar">
                                    <div class="passage-tools">
                                        <div class="passage-details">
                                            <div class="passage-details-wrapper">
                                                <h1 class="bcv"><?php echo $book_name.' '.$chapter;?></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Passage Bar End-->
                                <!--Passage Scroll Begin-->

                                <div class="passage-scroller-top bottom-scroller">
                                    <?php include 'passage_nav.php';?>
                                    <div class="clear"></div>
                                </div>
                                <!--Passage scroll end-->
                                <!--Passsage Table Begins-->
                                <div class="passage-table">
                                    <?php if($prev):?>
                                        <a href="<?php echo base_url('bible/passage/').$prev['book'].'/'.$prev['chapter'].'/';?>" class="prev-chapter" id="prev"><span class="icon-chevron-left"></span></a>
                                        <i id="prev-tooltip" data-toggle="tooltip" title="<?php echo $prev['book'].' '.$prev['chapter'];?>" data-palcement="top" data-animation="false" data-trigger="manual"></i>
                                    <?php endif; ?>
                                    <table class="passage-cols table-responsive">
                                        <tbody><tr><td class="passage-col col-xs-12 first last">
                                                <div class="passage-text">
                                                    <div style="margin-top: 10px; padding: 0 15px;">
                                                        <div class="passage-content">
                                                            <div class="text-html ">
                                                                <h1 class="passage-display"> <span class="passage-display-bcv"><?php echo $book_name.'  '.$chapter;?></span><span class="passage-display-version"> King James Version (KJV)</span></h1>
                                                                <?php foreach ($book as $row): ?>
                                                                    <?php if($row['v'] == 1):?>
                                                                    <p class="chapter-<?=$chapter;?>"><span id="KJV-<?=$abbr.'-'.$chapter.'-'.$row['v'];?>" class="text <?=$abbr.'-'.$chapter.'-'.$row['v'];?>"><span class="chapternum"><?=$chapter;?>&nbsp;</span><?php echo $row['t'];?></span></p>
                                                                        <?php endif;?>

                                                                <?php if($row['v'] > 1):?>
                                                                        <p><span id="KJV-<?=$abbr.'-'.$chapter.'-'.$row['v'];?>" class="text <?=$abbr.'-'.$chapter.'-'.$row['v'];?>"><sup class="versenum"><?=$row['v'];?>&nbsp;</sup><?php echo $row['t'];?></span></p>
                                                                    <?php endif;?>

                                                                <?php endforeach; ?>
                                                               </div>
                                                            <!--Publisher Info-->
                                                            <div class="publisher-info-bottom with-single"><strong>King James Version (KJV)</strong><p>Public Domain</p></div>

                                                        </div>
                                                    </div>
                                            </td></tr></tbody></table>
                                    <?php if($next):?>
                                        <a href="<?php echo base_url('bible/passage/').$next['book'].'/'.$next['chapter'].'/';?>"  id="next" class="next-chapter"><span class="icon-chevron-right"></span></a>
                                        <i id="next-tooltip" data-toggle="tooltip" title="<?php echo $next['book'].' '.$next['chapter'];?>" data-palcement="top" data-animation="false" data-trigger="manual"></i>
                                    <?php endif;?>
                                </div>
                                </div><!--Passage Table Ends-->
                              <!--Bottom Passage Nav Begin-->
                                <div class="passage-scroller-top bottom-scroller">
                                      <?php include 'passage_nav.php';?>
                                    <a href="#" class="top-link" data-toggle="tooltip" title="Go To Top"><span class="icon-arrow-up"></span></a>

                                                   <div class="clear"></div>
                                </div>
                                <!--Bottom Passage Nav Ends-->

                            </div>
                        </div>
                    </div>
                <div class="col-md-1">></div>
                </div>
                <!--Passage Main End-->
            </div>
</section>