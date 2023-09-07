
<!DOCTYPE html>
<html lang="en">
   <head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WCJW7W58JH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WCJW7W58JH');
</script>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php if(is_array($fooders_complete_details) && count($fooders_complete_details)!==0){
    	echo " <title>";
    	if($menu_name!='')
    	{echo $menu_name." at ";}
    	echo fooder_title.", ".$get_full_address['region'].', '.$get_full_address['city']." Khate Raho";
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="<?php if($menu_name!=''){ echo "Enjoy Your Favourite ".$menu_name." at ".fooder_title." | ".fooder_keyword;} else {echo fooder_description;}?>">
    <meta name="keywords" content="<?php echo fooder_keyword;?>">
    <?php }
    else{?>
    	<title>Directly from your favourite restaurant to you | One solution for all your orders | No Extra Charges !</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Khate Raho Connecting Eaters With Fooders - Order Food Online From Top Rated Restaurants, Bakers &amp; Confectioners in Agra With Free Home Delivery or Take Away. Discover Food & Restaurants in Agra &amp; Rate Them">
    <meta name="keywords" content="dosa in agra, agra restaurants, petha in agra, online khana, food delivery agra, order food online agra, methai sweets in agra">
    <?php }?>
   <meta name="author" content="<?php echo SITENAME;?>">
    <meta name="generator" content="<?php echo Appname;?>">
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/slick/slick-theme.min.css"/>
      <!-- Feather Icon-->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/icons/feather.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/sidebar/khateraho.css" rel="stylesheet">
   </head>
   <body class="fixed-bottom-bar">
   <!-- <div class="d-flex align-items-center justify-content-center vh-100 index-page">
<div class="text-center">
<a href="javascript:void(0);"><img src="<?php echo SITE_URL.'/assets/mobile/img/logo.png'; ?>" alt=""></a><br>
<div class="spinner"></div>
</div>
</div> -->
   