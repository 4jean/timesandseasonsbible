<?php
$system_title  =	$this->cj_model->get_system_title();
$system_name  =	$this->cj_model->get_system_name();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include 'meta.php';?>
	<title><?php echo $meta_title;?><?php if($page_name !== 'home'){echo ' | '.$system_title;}?></title>
    <!-- Stylesheets-->
    <?php include 'includes_top.php';?>
<?php include 'tracking.php';?>
</head>
<body class="stretched no-transition" id="page_body">
<div id="wrapper" class="clearfix">
<?php include 'header.php';?>
<?php include ''.$page_name.'.php'.'' ;?>
<?php include 'social_share.php';?>
<?php include 'footer.php';?>
</div>

<?php include 'includes_bottom.php';?>
</body>
</html>