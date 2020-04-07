<section id="content">
    <div class="content-wrap notoppadding">
        <div class="row clearfix" style="background-color: #F9F9F9; padding-top: 30px;">
            <div class="col-md-2"></div>
            <div class="col-md-8 mynotes bottommargin" style="background-color: #FFF; font-size: 16px; margin: 25px; padding: 20px;">
                <?php foreach($notes as $rown):
                    $book_name = $this->cj_model->get_book_name($rown['book_id']);?>
                    <h3 class="title-block">The Book of <?=$book_name;?></h3>
                    <?php echo $rown['notes']; ?>

                    <div class="text-center topmargin-sm">
                        <a href="<?php echo base_url('bible/passage/').$book_name;?>" class="button button-reveal button-xlarge button-rounded tright"><i class="icon-arrow-right"></i><span>Go to <?=$book_name;?></span></a>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>