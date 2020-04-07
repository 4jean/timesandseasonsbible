<div class=" clearfix">
    <div class="row">
        <div class="col-md-12">
            <h2 class="topmargin leftmargin"><i class="icon-book"></i> BOOK STUDY</h2>
        </div>
    </div>
    <div class="section" style="width: 100%; padding: 30px; margin:20px 0;">
        <div class="row">
<div class="col-md-12">
    <!--Season Books Begin-->
            <h3 class="title-block">Season Books</h3>
			<h4 class="leftmargin">Study the Books of the Bible according to their seasons</h4>
            <div class="tabs tabs-responsive clearfix" id="tabs">
                <ul class="tab-nav clearfix">
                    <?php foreach($season as $row):?>
                    <li><a href="#season-<?=$row['season_id'];?>"><?=$row['name'];?></a></li>
                    <?php endforeach; ?>
                </ul>

                <div class="tab-container">
<?php
foreach($season as $row3):
                    $season_books = $this->cj_model->get_season_books($row3['season_id']);
 ?>
                    <div class="tab-content season clearfix" id="season-<?=$row3['season_id'];?>">
                        <div class="mynotes alert alert-warning" style="background-color: #FFF; padding: 20px;">
                            <?php
                            $notes = $this->cj_model->get_season_notes($row3['season_id']);
                            foreach ($notes as $rown):?>
                            <h3 class=" nobottommargin">THE <?=$row3['name'];?></h3>
                            <?php echo $rown['notes'];
                            endforeach;
                            ?>
                        </div>
    <?php foreach($season_books as $row2): ?>
                        <a class="btn btn-primary" id="book-<?=$row2['book_id'];?>" href="<?php echo base_url('book/season/'.$row2['name']);?>"><?=$row2['name'];?></a>
    <?php endforeach; ?>
                    </div>
<?php endforeach; ?>
                </div>
            </div>
        </div>
            </div>
</div><!--Season Books End-->
    <!--SS7 books begin-->
    <div class="section" style="width: 100%; padding: 30px 20px; margin:20px 0;">
        <div class="row">
            <div class="col-md-12">
                <h3 class = "title-block">Sets of Seven</h3>
				<h4 class="leftmargin">Study the Books of the Bible in sets of Seven</h4>
                <div class="tabs tabs-responsive clearfix" id="tabs">
                    <ul class="tab-nav clearfix">
                        <?php foreach($ss7 as $row):?>
                            <li><a href="#ss7-<?=$row['ss7_id'];?>"><?=$row['name'];?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="tab-container">
                        <?php
                        foreach($ss7 as $row3):
                            $ss7_books = $this->cj_model->get_ss7_books($row3['ss7_id']);
                            ?>
                            <div class="tab-content ss7 clearfix" id="ss7-<?=$row3['ss7_id'];?>">
                                <!--Notes Here-->
                                <div class="mynotes alert alert-warning" style="background-color: #FFF; padding: 20px;">
                                    <?php
                                    $notes_ss7 = $this->cj_model->get_ss7_notes($row3['ss7_id']);
                                    foreach ($notes_ss7 as $row7):?>
                                        <h3 class="nobottommargin">THE <?=$row3['name'];?></h3>
                                        <?php echo $row7['notes'];
                                    endforeach;
                                    ?>
                                </div>
                                <!--Notes End-->
                                <?php foreach($ss7_books as $row2): ?>
                                    <a class="btn btn-danger" id="book-<?=$row2['book_id'];?>" href="<?php echo base_url('book/season/'.$row2['name']);?>"><?=$row2['name'];?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ss7 books end-->
</div>