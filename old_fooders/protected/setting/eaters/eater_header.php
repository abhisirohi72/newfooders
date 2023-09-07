<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="dns-prefetch" href="http://www.khateraho.com/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google-site-verification" content="nmt55-J6F_ICZTElJHpAAiTjsh526esjiT7zBJwHZBg" />
<meta name="msvalidate.01" content="C913036C69A5AFA9F15C9473BF8CE6A4" />
<meta name="norton-safeweb-site-verification" content="p8nor9tidcv-vqmuo6c845ezj0lhf9dlealrqgctcpwqm12ky-y7m8f0c0vqs49z1rfdbageusqk3ul3b35ddcfc0427xyoekv3twlplwefa409226g5s7gg7lyp2y50" />
<meta name="wot-verification" content="93482af546e4674208df"/>
   
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
    elseif(is_array($fooders_complete_details) && count($fooders_complete_details)==0 && $query1ans=='open_recipe_details'){
    	echo " <title>";
    	$recipe_id = abs($_REQUEST['recipe_id']);
        $get_recipe = $db->run( "SELECT recp.*, eat.name FROM `recipes` AS recp LEFT JOIN `eaters` As eat ON eat.eater_id=recp.eater_id where recp.id=".$recipe_id)->fetchAll();
    	if(is_array($get_recipe))
        echo "Recipe of ".$get_recipe['0']['recipe_name']." - KhateRaho.com";
    	?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="<?php if(is_array($get_recipe)){ echo $get_recipe['0']['recipe_name']." Ingredients - ".$get_recipe['0']['ingredients'];} ?>">
        <meta name="keywords" content="<?php echo fooder_keyword;?>">
        <?php }
    
    else{?>
    	<title>Online Food Destination - Restaurants In Agra, Khana, Bakeries, Cakes, Petha at Khateraho.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Khate Raho Connecting Eaters With Fooders - Order Food Online From Top Rated Restaurants, Bakers &amp; Confectioners in Agra With Free Home Delivery or Take Away. Discover Food & Restaurants in Agra &amp; Rate Them">
    <meta name="keywords" content="restaurants in agra, hotels in agra, cakes in agra, aahar restaurant , satkar restaurant , achman , mama franky, taj mahal agra, agra restaurants, petha in agra, online khana, food delivery agra, order food online agra, methai sweets in agra">
    <?php }?>
    
    
    
    <meta name="author" content="<?php echo SITENAME;?>">
    <meta name="generator" content="<?php echo Appname;?>">
    <link rel="shortcut icon" href="<?php echo SITE_URL.'/assets/fooders/img/favicon.ico';?>" type="image/x-icon">
    <!-- Le styles -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="<?php echo SITE_URL.'/assets/eaters/css/';?>uikit_style.css"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Lato&family=Nunito:wght@200&family=Poppins:wght@200&family=Roboto&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.3/js/uikit.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/js/uikit-icons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   
  <?php 
    if($query1ans=="home" || $query1ans=="fooder" || $query1ans=="fooders_search_results" || $query1ans=="reviews" || $query1ans=="eater_orders"){
    	echo	'<script src="'. SITE_URL.'/assets/eaters/js/jquery-1.8.2.min.js" type="text/javascript"></script>';
    }
    ?>
  
   
    <!-- link href="css/custom-responsive.css" rel="stylesheet" -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if gte IE 9]>
      <style type="text/css">
        .gradient {
           filter: none;
        }
      </style>
      <script type="text/javascript">
if (top.location != self.location)
top.location = self.location;
</script>
    <![endif]-->
    
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-49965090-1', 'khateraho.com');

  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script> 

</head>
 <body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5677e8b30865e0790f56a3a1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



 <?php if($query1ans=="fooder" || $query1ans=="open_recipe_details"){?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=652758598147117";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<?php }?>
   <div class="topbar"> 
    <nav class="navcss" uk-navbar>
        <div class="uk-navbar-left">
            <div class="uk-navbar-item">
                 <div>
                    <ul class="uk-navbar-nav">
    				 <li class=""><a href="<?php echo $link->link('contact',eaters);?>" class="currentli">Contact</a></li>
    				   <!--  <li class=""><a href="<?php echo $link->link('open_recipes',eaters);?>" class="">Recipes</a></li>
                       <li class=""><a href="" class="">Blog</a></li>-->
                    </ul>
                 </div>
               
            </div>
        </div>
        <div class="uk-navbar-right">
         <div class="uk-navbar-item uk-padding-remove-right">
                 <div>
                     <ul class="uk-navbar-nav">

     <?php 
         $get_social_links = $db->get_row('setting');
         ?>
         <li> <a class="brand basket-modal eater-cart-count" id="cookiedata" href="#" value="<?php if(is_array($fooders_complete_details) && count($fooders_complete_details)!==0) echo base64_encode(fooder_id);?>"></a></li>

 <?php 
         if($session->Check() && $_SESSION['type']==='eater'){
         if(eater_exist==='5' && type==='eater'){
         	?> 
                     <li><a href="<?php echo $link->link('reviews',eaters);?>"><i class="fa fa-star"></i> Reviews By You</a></li>
                        <li class="">
                            <a class="dropdown-toggle-no-caret uk-padding-remove-right" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa "></i><?php echo eater_name_styler;  ?> <i class="fa fa-caret-down"></i></a>
                            <div uk-dropdown class="header_drop">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a class="dropdown-item" href="<?php echo $link->link('profile',eaters)?>"> Eater&#146;s Stash</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $link->link('change_password',eaters);?>"> Change Password</a></li>
                                    <li class="uk-hidden@m"><a class="dropdown-item" href="<?php echo $link->link('reviews',eaters);?>"> Reviews By You</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $link->link('logout',eaters);?>"> Logout</a></li>
                                </ul>
                            </div>
                       </li>
			  <?php }}else{
          	          if($query2==='fooder_profile_token')
					{?>

          <li><a class="" href="#modal-overflow" uk-toggle><i class="fa fa-user-circle"></i> Eaters Login</a></li>
          <?php }else{?>
          <li> <a class="" href="#modal-overflow" uk-toggle><i class="fa fa-user-circle"></i> Eaters Login</a></li>
           <?php }?>
          <li><a class="uk-padding-remove-right" href="<?php echo $link->link('login',fooders);?>"><i class="fa fa-cutlery"></i> Fooders Login</a></li>
          <?php }?>
         
                        
                    </ul>
                 </div>
            </div>  
      </div>
    </nav>
</div>
    

  <?php 
    if($query1ans=="home"){?>

<div class="section1">
 <div class="secondbar"> 
    <nav class="navcss" uk-navbar>
        <div class="uk-navbar-left">
            <div class="uk-navbar-item">
                 <div>
                    <ul class="uk-navbar-nav">
    				   <li class="">
    				       <a href="<?php echo $link->link('home',eaters);?>" class="">
    				           <img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>wlogo.png" class="logowd">
    				       </a>
    				   </li>
                    </ul>
                 </div>
               
            </div>
        </div>
        <div class="uk-navbar-right">
         <div class="uk-navbar-item uk-padding-remove-right">
                 <div>
                     <ul class="uk-navbar-nav">
                        <li><a href="#" class="currentli">Home</a> </li>
                        <li><a href="#">How To Order ?</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Browse Places</a></li>
                        <li class="">
                            <a class="dropdown-toggle-no-caret" href="#" id="searchdrop" role="button" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                            <div uk-dropdown="mode:click" class="header_drop">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a class="dropdown-item" href=""> My Profile</a></li>
                                </ul>
                            </div>
                       </li>
                       <li class=""> <a href="#"><i class="fa fa-bell"></i></a></li>
                       <li class=""> <a href="" class="partnerbtn">Become a Partner</a></li>
                    </ul>
                 </div>
            </div>  
      </div>
    </nav>
</div>

<div class="container">
    
     <div class="homediv uk-grid-large" uk-grid>
        <div class="uk-width-auto@s">
          <h1 class="hd1">What do you have the</h1>
          <h1 class="hd2">TASTE</h1>
           <h1 class="hd3">FOR    <img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>quest.png" class="quest"></h1>
        </div>
        <div class="uk-width-expand@s">
           <h2 class="hd4">Order food online for Pickup & Delivery</h2>
           <form class="uk-grid-collapse" uk-grid>
             
            <!-- <div class="uk-width-auto"> 
             <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon"><i class="fa fa-map-marker"></i></span>
                    <input class="uk-input location_search" type="text" aria-label="Not clickable icon">
                    <input type="hidden" id="locid">
                      <div uk-dropdown="mode: none" class="locationdrop">
                          <div id="load_data"></div>
                      
                      
                      </div>
                      
                 </div>
              </div>
            </div>
            <div class="uk-width-auto vlinebck"> 
             <div class="vline"></div>
            </div> -->

             <div class="uk-width-expand"> 
             <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon"><i class="fa fa-search"></i></span>
                    <input class="uk-input pickup_search" type="text" placeholder="Search for restaurant, cuisine or a dish">
                      <div uk-dropdown="mode: click" class="pickupdrop">
                            <div class="uk-grid-small uk-margin-medium-bottom" uk-grid>
                                <div class="uk-width-1-3@m">
                                    <img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>img9.jpg" class="uk-border-rounded">
                                </div>
                                <div class="uk-width-expand@m ratingdt">
                                    <div class="uk-grid" uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <span class="uk-label ratinglbl">3.3&nbsp;<i class="fa fa-star"></i></span>&nbsp;<span class="ratingdcr">DINING</span>
                                                
                                            </div>
                                            <div class="uk-width-auto">
                                                   <span class="uk-label ratinglbl">3.3&nbsp;<i class="fa fa-star"></i></span>&nbsp;<span class="ratingdcr">DELIVERY</span>
                                            </div>
                                    </div>
                                    <p class="uk-margin-small-top"><span>Uttam Nagar, New Delhi</span>
                                    <br><span class="themeclr">Order Now &nbsp;<i class="fa fa-long-arrow-right"></i></span>
                                    <br><small> <i class="fa fa-clock-o"></i>&nbsp;Delivery in 15 min</small>
                                    </p>
                                </div>
                            </div>

                            <!-----2nd div ------>
                             <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@m">
                                    <img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>img9.jpg" class="uk-border-rounded">
                                </div>
                                <div class="uk-width-expand@m ratingdt">
                                    <div class="uk-grid" uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <span class="uk-label ratinglbl">3.3&nbsp;<i class="fa fa-star"></i></span>&nbsp;<span class="ratingdcr">DINING</span>
                                                
                                            </div>
                                            <div class="uk-width-auto">
                                                   <span class="uk-label ratinglbl">3.3&nbsp;<i class="fa fa-star"></i></span>&nbsp;<span class="ratingdcr">DELIVERY</span>
                                            </div>
                                    </div>
                                    <p class="uk-margin-small-top"><span>Uttam Nagar, New Delhi</span>
                                    <br><span class="themeclr">Order Now &nbsp;<i class="fa fa-long-arrow-right"></i></span>
                                    <br><small> <i class="fa fa-clock-o"></i>&nbsp;Delivery in 15 min</small>
                                    </p>
                                </div>
                            </div>
                      </div>
                    <span class="uk-form-icon uk-form-icon-flip"><i class="fa fa-close"></i></span>
                </div>
              </div>
            </div>
         </form>
        </div>
    </div>
</div>
</div>   

 <?php }?>


<div id="modal-overflow" uk-modal>
    <div class="uk-modal-dialog loginmodal">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="uk-modal-header">
            <h3>Come on in</h3>
        </div>

        <div class="uk-modal-body" uk-overflow-auto>
            <ul uk-tab>
                <li><a href="#">SIGN IN</a></li>
                <li><a href="#">I'M NEW HERE</a></li>
            </ul>
            
            <ul class="uk-switcher uk-margin">
                <li>
                    <form class="uk-form-stacked">

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Email address</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" placeholder="Enter Your Email address">
                            </div>
                        </div>

                         <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Password</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="password" placeholder="Enter Your Password">
                            </div>
                        </div>
                        <div class="uk-margin">
                                    <label><input class="uk-checkbox" type="checkbox"> 
Keep me signed in.</label>
                               </div>
                               <a href=""><label><u>Forgot your password? </u></label></a>
                                <button class="uk-button uk-button-default loginbtn">Sign In</button>
                                
                                
                                <div class="uk-text-center">
                                    OR
                                </div>
                                
                                <div>
                                    
                                    <button class="uk-button wbtn"><span><img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>google.png" class="socialimg"></span> <div class="socialtxt">Continue With Google</div></button>
                                    <button class="uk-button wbtn"><span><img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>facebook.png" class="socialimg"></span> <div class="socialtxt">Continue With Facebook</div></button>
                                </div>
                                
    

</form>
                </li>
                <li>
                    
                      <form class="uk-form-stacked">
<div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Name</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Email address</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" placeholder="Enter Your Email address">
                            </div>
                        </div>

                         <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Password</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="password" placeholder="Enter Your Password">
                            </div>
                        </div>
                        <div class="uk-margin info">
                            <input class="uk-checkbox" type="checkbox"> &nbsp; By registering, you agree to our Terms & Conditions, Privacy and Cookie Policy.
                        </div>
                        
                                <button class="uk-button uk-button-default loginbtn">Register</button>
                                
                                
                                <div class="uk-text-center">
                                    OR
                                </div>
                                
                                <div>
                                   <button class="uk-button wbtn"><span><img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>google.png" class="socialimg"></span> <div class="socialtxt">Continue With Google</div></button>
                                    <button class="uk-button wbtn"><span><img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>facebook.png" class="socialimg"></span> <div class="socialtxt">Continue With Facebook</div></button>
                                </div>
    

</form>
                </li>
             </ul>
        </div>

    </div>
</div>








<!--
<?php if($query1ans!="home"){?>
   <div class="container" id="container">
		
		<header>
        	<div class="row">
            	<a class="logo" href="<?php echo SITE_URL;?>">Khate Raho</a>
                <h1>Agra</h1>
                <div class="srch-box">
                   <div class="row-fluid" style="margin-top: 22px;">
                   <div class="span12">
                   <div class="span2" style="text-align:center;"></div>
                   <div class="span10" style="color: #fff;text-align:left;"></div>
                  
                   </div>
                   </div>
                   
                  
                	 <h3 class="find-rst" rel="tooltip" title="restaurants,confectioners &amp; bakers">Find all Fooders</h3>
                    <h3 class="show-rst" rel="tooltip" title="restaurants,confectioners &amp; bakers">Show all Fooders on Map</h3> -->
                    
                    <!-- <form name="srch" method="post" action="<?php echo $link->link('fooders_search_results',eaters);?>">
                	<input class="search" type="text" name="search" value="" placeholder="Search location, cuisine, restaurant or anything..." required="required"  pattern=".{3,}" required title="3 characters minimum" />
                    <input type="hidden" name="killhunger" />
                    <input type="hidden" name="search_data" value="search_data_val" />
                    <input type="hidden" name="search_data_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
               
                   </form>
                    
                    
                    
                    <p class="srch-expl">Top Fooders : <a href="http://khateraho.com/index.php?eaters=fooder&fooder_profile_token=2" style="color:white">Aahar</a> , <a href="http://khateraho.com/index.php?eaters=fooder&fooder_profile_token=59" style="color:white">Satkar Pastries</a> , <a href="http://khateraho.com/index.php?eaters=fooder&fooder_profile_token=69" style="color:white">Jahanpanah Restaurant</a> , <a href="http://khateraho.com/index.php?eaters=fooder&fooder_profile_token=71" style="color:white">Mama Franky House</a></p>
                </div>
            </div>
        </header>
        <?php }?>
		
	<div class="md-modal md-effect-3 modal-basket-loader" id="modal-3" style="padding:0px;">
	<div class="md-content modal-basket-content">
		<div style="padding:0px;padding-left: 10px;">
		<div class="row-fluid">
		<div class="span12">
		<div class="span2"><img src="<?php echo SITE_URL.'/assets/eaters/img/loader.gif';?>"></div>
		<div class="span10 modal-basket-text">Processing...</div>
		</div>
		</div>
		
		</div>
		</div>
		</div>
		<?php if(is_array($fooders_complete_details) && count($fooders_complete_details)!==0 && fooder_type==='1'){$type = "Restaurant"; $ftitle = fooder_title;} elseif(is_array($fooders_complete_details) && count($fooders_complete_details)!==0 && fooder_type==='2'){$type= "Confectioner"; $ftitle = fooder_title;} else {$type= "Baker"; $ftitle = '';} ?>
<div class="md-modal md-effect-9" id="modal-9">
	<div class="md-content">
		<h3>YOUR FOOD BASKET <i class="icon-remove md-pro md-close"></i></h3>
		<div>
		<div class="row-fluid blank-basket-msg"><div class="span12 center"><?php  echo $ftitle.' Is Closed This Time <br><br> Please Visit Other '.$type;?> </div></div> 
		<br>
		<div class="row-fluid blank-basket-msg"><div class="span12 center"><button type="reset" id="fooder-closed">CANCEL</button> </div></div>
		</div></div></div>-->
		
	<!-- 	<div class="md-modal md-effect-11" id="modal-11">
	<div class="md-content">
		<h3>YOUR FOOD BASKET <i class="icon-remove md-pro md-close"></i></h3>
		<div>
		<div class="row-fluid blank-basket-msg"><div class="span12">Ordering Allowed Between 11 AM To 6 PM</div></div> 
		<br>
		<div class="row-fluid blank-basket-msg"><div class="span12 center"><button type="reset" id="fooder-closed-del">CANCEL</button> </div></div>
		</div></div></div> -->
 		
<!--  <div class="md-overlay"></div>-->
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
<script>
    
    $(".location_search").keyup(function(){
        var loc = $(this).val();
        console.log(loc);
        if(loc.length>2){
            $(".locationdrop").show();
                       $.ajax({
                            url: "<?php echo $link->link('ajax', eaters); ?>",
                            dataType: "json",
                            type: "GET",
                            cache: true,
                            data: {
                                locationfilter: loc
                            },
                            success: function(data) {
                                var output = '<ul class="uk-list uk-list-striped">';
                                //var obj = JSON.parse(data); 
                                //console.log(data);
                                $.each(data, function(key, value) {
                                   output += '<li onclick="selectLoc(this,event);" id="'+value.id+'"><span>'+value.region+'</span><br><small>'+value.city+', '+value.state+'</small></li>'; 
                                }); 
                                output +='</ul>';
                               
                                $("#load_data").html(output);
                            }
                        });
        }else if(loc.length=='0'){
            $(".locationdrop").hide();  
        }
    });
    $(".pickup_search").keyup(function(){
        var loc = $(".location_search").val();
        var rest_dish = $(this).val();
        if(loc.length>2){
            var locid =  $("#locid").val(); 
            //$(".locationdrop").show();
                       $.ajax({
                            url: "<?php echo $link->link('ajax', eaters,'&rest='); ?>"+rest_dish,
                            dataType: "json",
                            type: "GET",
                            cache: true,
                            data: {
                                pickupfilter: locid
                            },
                            success: function(data) {
                                var output = '';
                                //var obj = JSON.parse(data); 
                                $.each(data, function(key, value) {
                                    console.log(value);
                                //    output += '<div class="uk-grid-small uk-margin-medium-bottom" uk-grid><div class="uk-width-1-3@m"><img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>img9.jpg" class="uk-border-rounded"></div><div class="uk-width-expand@m ratingdt"><div class="uk-grid" uk-grid=""><div class="uk-width-auto uk-first-column"><span class="uk-label ratinglbl">3.3&nbsp;<i class="fa fa-star"></i></span>&nbsp;<span class="ratingdcr">DINING</span></div><div class="uk-width-auto"><span class="uk-label ratinglbl">3.3&nbsp;<i class="fa fa-star"></i></span>&nbsp;<span class="ratingdcr">DELIVERY</span></div></div><p class="uk-margin-small-top"><span>Uttam Nagar, New Delhi</span><br><span class="themeclr">Order Now &nbsp;<i class="fa fa-long-arrow-right"></i></span><br><small> <i class="fa fa-clock-o"></i>&nbsp;Delivery in 15 min</small></p></div></div>'; 
                                 }); 
                               
                                //$("#load_data").html(output);
                            }
                        });
        }else if(loc.length=='0'){
            //$(".locationdrop").hide();  
        }
    });
    function selectLoc(t,e){
        var loc= $(t).children('span').text();
        $(".location_search").val(loc);
         var locid = $("#locid").val($(t).attr('id'));
        $(".locationdrop").hide();  

        // if($.trim(loc)!=''){

        // $.ajax({
        //                     url: "<?php echo $link->link('ajax', eaters,'&locid='); ?>"+locid,
        //                     dataType: "json",
        //                     type: "GET",
        //                     cache: true,
        //                     data: {
        //                         searchlocation: loc
        //                     },
        //                     success: function(data) {
        //                         $(".location_search").placeholder(loc);
        //  var locid = $("#locid").val($(t).attr('id'));
        // $(".locationdrop").hide();        
        //                     }
        //                 });
        // }

    }
    // $(function() {
    //             function log(message) {
    //                 $("<div>").text(message).prependTo("#log");
    //                 $("#log").scrollTop(0);
    //             }
    //             $(".location_search").autocomplete({
    //                 source: function(request, response) {
    //                     $.ajax({
    //                         url: "<?php echo $link->link('ajax', eaters); ?>",
    //                         dataType: "json",
    //                         type: "GET",
    //                         cache: true,
    //                         data: {
    //                             locationfilter: request.term
    //                         },
    //                         success: function(data) {
    //                             response(data);
    //                         }
    //                     });
    //                 },
    //                 minLength: 2,
    //                 select: function(event, ui) {
    //                   $(this).val(ui.item.region);  
    //                 }
    //             }).autocomplete("instance")._renderItem = function(ul, item) {
    //                 return $("<li class=''></li>")
    //                     .append("<div>" + item.region + "</div>")
    //                     .data("ui-autocomplete-item", item)
    //                     .appendTo(ul);

    //             }
    //         });

</script>