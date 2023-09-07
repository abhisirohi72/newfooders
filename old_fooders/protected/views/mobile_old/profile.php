<html lang="en">

<head>
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
    elseif(count((array)$fooders_complete_details)==0 && $query1ans=='open_recipe_details'){
    	echo " <title>";
    	$recipe_id = abs($_REQUEST['recipe_id']);
        $get_recipe = $db->run( "SELECT recp.*, eat.name FROM `recipes` AS recp LEFT JOIN `eaters` As eat ON eat.eater_id=recp.eater_id where recp.id=".$recipe_id)->fetchAll();
    	if(is_array($get_recipe))
        echo "Recipe of ".$get_recipe['0']['recipe_name']." - ".SITENAME;
    	?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="<?php if(is_array($get_recipe)){ echo $get_recipe['0']['recipe_name']." Ingredients - ".$get_recipe['0']['ingredients'];} ?>">
        <meta name="keywords" content="<?php echo fooder_keyword;?>">
        <?php }
    
    else{?>
    	<title>Online Food Destination - Top Rated Restaurants, Khana, Bakeries, Cakes, Petha, Sweets in Agra at <?php echo Appname;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Khate Raho Connecting Eaters With Fooders - Order Food Online From Top Rated Restaurants, Bakers &amp; Confectioners in Agra With Free Home Delivery or Take Away. Discover Food & Restaurants in Agra &amp; Rate Them">
    <meta name="keywords" content="dosa in agra, agra restaurants, petha in agra, online khana, food delivery agra, order food online agra, methai sweets in agra">
    <?php }?>
   <meta name="author" content="<?php echo SITENAME;?>">
    <meta name="generator" content="<?php echo Appname;?>">
    <link rel="shortcut icon" href="<?php echo SITE_URL.'/assets/fooders/img/favicon.ico';?>" type="image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo SITE_URL.'/assets/mobile/css/';?>style.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.3/js/uikit.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 </head> 



<body>

    <!-- ********************************mobile menu********************************* -->
 <div class="mobile_layout">    
     <div class="profilebg">
          <div class="uk-inline">
              <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>profilebg.png" alt="">
               <div class="uk-position-right">
                 <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>cog.png" alt="" class="cogcss">
               </div>
               <div class="uk-position-center">
                 <div class="profilecss">
                   <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>profilepic.png" alt="">
                 </diV>
               </div>
          </div>
      </div>
      <div class="pnamediv">
          <span class="nm">Aishwarya Singh</span>
          <br><span class="email">shashibala@9564gmail.com</span>
     </div>
     <div class="poption">
       <div class="uk-card uk-card-default uk-card-body">
       <div class="uk-grid-small" uk-grid>
            <div class="uk-width-auto@m">
                <span class="iconcss"> <i class="fa fa-clone"></i> </span>
            </div>
            <div class="uk-width-expand@m">
                <div class="uk-card uk-card-default uk-card-body">Expand</div>
            </div>
        </div>

       </div>
     </div>
</div>    


