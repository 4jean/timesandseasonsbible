<div class="container clearfix">
    <div class="row">
        <div class="col-md-12">
            <h2 class="topmargin"><i class="icon-line2-book-open"></i> CHAPTER STUDY</h2>
        </div>
    </div>
<div class="section" style="width: 100%; padding: 30px; margin:20px 0; overflow: visible;">
            <div class="row">
                <div class="col-md-12">
                    <!--Season Books Begin-->
                    <h3 class="title-block">Season Chapters</h3>
					<h4 class="leftmargin">Study the Chapters of the Bible according to their seasons</h4>
                    <div class="tabs tabs-responsive clearfix" id="tabs">
                        <ul class="tab-nav clearfix" >
                            <?php foreach($ch_season as $row):?>
                                <li class="nav_ch_season"><a href="#ch-season-<?=$row['ch_season_id'];?>"><?=$row['name'];?></a></li>
                            <?php endforeach; ?>
                        </ul>

                        <div class="tab-container">
                            <?php
                            foreach($ch_season as $row3):
                                $chapters_id = $this->cj_model->get_ch_season_chapters($row3['ch_season_id']);
                                ?>

                                <div class=" tab-content clearfix" id="ch-season-<?=$row3['ch_season_id'];?>">
                                    <div class="alert alert-info text-center">The <strong><?=$row3['name'];?></strong> chapters include the following - <?=$row3['chapters'];?></div>

                                    <div class="center">
                                        <label for="ch_select"></label>
                                        <select class="selectpicker" id="ch_select" onchange="chapter_season(this.value);">
                                            <option value="">Select Chapter</option>
                                            <?php for($i=0; $i<count($chapters_id); $i++): ?>
                                                <option
                                                    value="<?=$chapters_id[$i];?>"><?='Chapter '.$chapters_id[$i];;?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <!--Show Ch_season books here-->
                                    <div class="topmargin-sm ch_season_bks season"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div> <!--Season Books End-->
                </div>
            </div>
        </div>

        <!--SS7 books begin-->
        <div class="section" style="width: 100%; padding: 30px; margin:20px 0;">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-block">Sets of Seven Chapters</h3>
					    <h4 class="leftmargin">Study the Chapters of the Bible in sets of seven</h4>
                    <div class="accordion clearfix" data-state = "closed">
                        <?php foreach($ch_ss7 as $row5):?>
                            <div class="acctitle nav_ch_ss7" data-toggle="" title=""></i><i class="acc-open icon-remove-circle"></i><?php echo $row5['name'];?></div>
                            <?php
                            $ss7_ch_id = $this->cj_model->get_ch_ss7_chapters($row5['ch_ss7_id']);
                            ?>
                            <div class="acc_content clearfix">
                                <div class="alert alert-info text-center">The <strong><?=$row5['name'];?></strong> include the following - <?=$row5['chapters'];?></div>
                                <select class="selectpicker" onchange="chapter_ss7(this.value);">
                                    <option value="">Select Chapter</option>
                                    <?php for($i=0; $i<count($ss7_ch_id); $i++): ?>
                                        <option
                                            value="<?=$ss7_ch_id[$i];?>"><?='Chapter '.$ss7_ch_id[$i];;?></option>
                                    <?php endfor; ?>
                                </select>
                                <!--Show Ch_ss7 books here-->
                                <div class="topmargin-sm ch_ss7_bks ss7"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    </div>
                </div>
            </div><!--ss7 books end-->
    </div>