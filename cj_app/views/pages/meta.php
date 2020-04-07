<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="title" content="<?php echo $meta_title;?><?php if($page_name !== 'home'){echo ' | '.$system_title;}?>" />
<meta name="description" content="<?=$meta_description;?>" />
<meta name="keywords" content="<?=$meta_keywords;?>" />
<meta name="author" content="Times and Seasons Bible .com" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<meta property="og:locale" content="en_US" />
<meta property="og:type" content="<?php if($page_name == 'download'){echo 'book';} else {echo 'website';}?>" />
<meta property="og:url" content="<?=base_url().$og_url;?>" />
<meta property="og:title" content="<?=$og_title;?><?php if($page_name !== 'home'){echo ' | '.$system_title;}?>" />
<meta property="og:description" content="<?=$og_description;?>" />
<meta property="og:site_name" content="<?=$system_name;?>" />
<meta property="og:image" content="<?php echo base_url().$img_path;?>" />
<meta property="fb:app_id" content="394582637589147" />

<link rel="canonical" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">