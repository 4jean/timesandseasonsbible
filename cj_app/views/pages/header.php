<header id="header" class="<?php if($page_name !== 'contact') echo 'transparent-header full-header';?>" data-sticky-class="not-dark"">

<div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="<?php echo base_url();?>" class="standard-logo" data-dark-logo="<?php echo base_url();?>images/nowo-dark.png"><img src="<?php echo base_url();?>images/nowo.png" alt="Times and Seasons Bible"></a>
                <a href="<?php echo base_url();?>" class="retina-logo" data-dark-logo="<?php echo base_url();?>images/nowo-dark.png"><img src="<?php echo base_url();?>images/nowo.png" alt="Times and Seasons Bible"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="">

                <ul>
                    <li class="<?php if($page_name == 'home') echo 'current'; ?>"><a href="<?php echo base_url();?>"><div>Home</div></a>
                    </li>
                    <!--Study-->
                    <li class="<?php if($page_name == 'book_study' || $page_name == 'chapter_study') echo 'current'; ?>"><a href="#"><div>Study</div></a>
                        <ul>
                            <li><a href="<?php echo base_url('book_study/');?>"><div><i class="icon-book"></i>Book Study</div></a></li>
                            <li><a href="<?php echo base_url('chapter_study/');?>"><div><i class="icon-line2-book-open"></i>Chapter Study</div></a></li>
                        </ul>
                    </li>
                    <!--Bible-->
                    <li class="<?php if($page_name == 'bible') echo 'current'; ?>"><a href="<?php echo base_url();?>bible"><div>The Bible</div></a></li>
                    <!--My Season-->
                    <li class="<?php if($page_name == 'my_season') echo 'current'; ?>"><a href="#"><div>My Season</div></a></li>
					<!--Donate-->
                    <li class="<?php if($page_name == 'donate') echo 'current'; ?>"><a href="#"><div>Donate</div></a></li>
                    <!--Contact-->
                    <li class="<?php if($page_name == 'contact') echo 'current'; ?>"><a href="<?php echo base_url();?>contact"><div>Contact</div></a></li>
                </ul>



                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header>