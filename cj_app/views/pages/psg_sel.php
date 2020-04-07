<div class="row clearfix" style="background-color: #F9F9F9; padding-top: 30px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-12">
            <?php echo form_open(base_url() . 'bible/psg_sel' , array('role'=> 'form', 'id'=>'psg_sel'));?>

            <div class="form-process"></div>

            <div class="col_full hidden">
                <input type="text" id="cj_mask" name="cj_mask" value="" class="sm-form-control" />
            </div>
            <!--Book-->
            <div class="col_two_fifth form-group">
                <label for="book_name">Book</label>
                <input class="typeahead form-control" id="book_name" name="book_name" type="text" placeholder="Genesis" required/>
            </div>
            <!--Chapter-->
            <div class="col_one_fifth form-group ">
                <label for="chapter_id">Chapter</label>
                <input name="chapter_id" type="number" id="chapter_id" class=" form-control " placeholder="1" min="1" max="150" required/>
            </div>
            <!--Verse-->


            <div class="col_two_fifth col_last topmargin-sm">
                <button class="button button-3d btn-block nomargin" name="" type="submit" id="bk_search">Search</button>
            </div>

            <div class="clear"></div>


            <?php echo form_close();?>
        </div>
    </div>
</div>