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
     <div class="cartdiv">   
        <a href=""><span>  <i class="fa fa-long-arrow-left backarrow"></i> </span>  <span class="name">Lava Pub & Restaurant3</span></a>
     
       <div class="delivery_time">
           <div class="uk-card uk-card-default uk-card-body">
              <i class="fa fa-clock-o"></i>&nbsp;<span class="">Delivery in <b>20-30 min</b></span>
           </div>
       </div>

       <p class="uk-text-center">ITEM(S) ADDED</p>
       <div class="itemdiv">
           <div class="uk-card uk-card-default uk-card-body">
               <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto@m valign">
                       <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>veg.png" alt="" class="typeimg"> 
                    </div>
                    <div class="uk-width-1-3@m itemdetail valign">
                        <span>Cheese Burger</span><br><span>	&#x20B9; 220</span>
                    </div>
                    <div class="uk-width-expand@m uk-text-right valign">
                        <div class="cartcnvs">
                             <button class="uk-button uk-button-default bdmin">-</button>
                             <button class="uk-button uk-button-default bdnum">1</button>
                             <button class="uk-button uk-button-default bdplus">+</button>  
                        </div>
                        <span class="prc">	&#x20B9; 220</span>
                    </div>
                </div>

                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto@m valign">
                       <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>veg.png" alt="" class="typeimg"> 
                    </div>
                    <div class="uk-width-1-3@m itemdetail valign">
                        <span>Cheese Burger</span><br><span>	&#x20B9; 220</span>
                    </div>
                    <div class="uk-width-expand@m uk-text-right valign">
                        <div class="cartcnvs">
                             <button class="uk-button uk-button-default bdmin">-</button>
                             <button class="uk-button uk-button-default bdnum">1</button>
                             <button class="uk-button uk-button-default bdplus">+</button>  
                        </div>
                        <span class="prc">	&#x20B9; 220</span>
                    </div>
                </div>
           </div>
       </div>


       <div class="adddiv">
           <div class="uk-card uk-card-default uk-card-body">
             
              <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto@m">
                         <a href=""> <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Add more items</span></a>
                    </div>
                    <div class="uk-width-expand@m uk-text-right">
                         <a href=""> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <hr>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto@m">
                         <a href=""> <i class="fa fa-percent"></i>&nbsp;&nbsp;<span>Apply Coupon</span></a>
                    </div>
                    <div class="uk-width-expand@m uk-text-right">
                         <a href=""> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <hr>
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-auto@m">
                         <a href=""> <i class="fa fa-map-marker uk-text-danger"></i>&nbsp;&nbsp;<span>Delivery at <b>Home</b></span></a>
                         <p class="address">Near Gurudwara <br>Saket Colony Shahganj, Agra, Uttar Pradesh</p>
                    </div>
                    <div class="uk-width-expand@m uk-text-right">
                         <a href=""> <span class="uk-text-danger"> <b>Change</b> </span></a>
                    </div>
                </div>   
           </div>
       </div>
    
       <p class="uk-text-center">BILL SUMMARY</p>

       <div class="billdetail">
           <div class="uk-card uk-card-default uk-card-body">
             
              <div class="uk-grid-small subtotal" uk-grid>
                    <div class="uk-width-auto@m">
                        <span><b>Subtotal</b></span><br><span class="uk-text-danger">
                            <p class="tagline">Include &#x20B9;3 Feeding Indian Donation</p></span>
                    </div>
                    <div class="uk-width-expand@m uk-text-right">
                    <span><b>&#x20B9; 220</b></span>
                    </div>
                </div>   

                <div class="uk-grid-small gst" uk-grid>
                    <div class="uk-width-auto@m">
                       <i class="fa fa-bank"></i>&nbsp;  <span><b>GST</b></span>&nbsp; <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="uk-width-expand@m uk-text-right">
                    <span><b>&#x20B9; 10.90</b></span>
                    </div>
                </div>
                <hr>
                <div class="uk-grid-small subtotal" uk-grid>
                    <div class="uk-width-auto@m">
                        <span><b>Grand Total</b></span>
                    </div>
                    <div class="uk-width-expand@m uk-text-right">
                    <span><b>&#x20B9;263.50</b></span>
                    </div>
                </div> 
           </div>
       </div>

       <div class="inforbtn">
           <div class="payoption" uk-grid>
                <div class="uk-width-auto@m valign">
                     <p>PAY USING<br><b>Cash on Delivery</b></p>
                 </div>
                <div class="uk-width-expand@m">
                       <div class="uk-text-right"><button class="uk-button orderbtn">Place Order &nbsp;<i class="fa fa-long-arrow-right"></i></button></div>
                </div>
            </div>
            </div> 
 </div>

 <div class="footer">
        <div class="container">
         <div class="uk-child-width-expand uk-text-center uk-grid-collapse" uk-grid>
            <div class="valign">
                <div class="uk-card uk-card-body">
                  <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>menu.png" alt="" class="menuimg"> <br>
                     <span>MENU</span>
                </div>
            </div>
            <div class="valign">
                 <div class="uk-card uk-card-body">
                    <i class="fa fa-user theme_color"></i> <br>
                     <span>MY ACCOUNT</span>
                </div>
            </div>

           <div class="valign">
                 <div class="uk-card uk-card-body">
                    <i class="fa fa-cart-plus theme_color"></i><sup><span class="cartcircle"> 45</span></sup> <br>
                     <span>MY CART </span>
                </div>
            </div>
        </div>
        </div>
     </div>
 </div>    


