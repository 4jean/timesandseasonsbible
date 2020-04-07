<!-- Stylesheets
============================================= -->

<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Lato:300,400,400italic,600,700', 'Raleway:300,400,500,600,700', 'Crete+Round:400italic' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>

<noscript>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic' rel='stylesheet' type='text/css' />
</noscript>


<link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css" media="none" onload="if(media!='all')media='all'" />
<link rel="stylesheet" href="<?php echo base_url();?>style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/dark.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/font-icons.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/components/bs-select.css" type="text/css" />


<link rel="stylesheet" href="<?php echo base_url();?>css/components.css" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.min.css" type="text/css" />
<?php if($page_name == 'home'){
    include 'rev_slider_css.php';
}?>
