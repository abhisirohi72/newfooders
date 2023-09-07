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
    <?php
    $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['id']);
    if(!isset($_REQUEST['id']) || $fooderid==''){
        $session->redirect('home',mobile);
    } 
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $fooder_details = $all_dishes['0'];
    $daily_hrs = unserialize($fooder_details['daily_hrs']);
    //echo "<pre>",print_r($daily_hrs),"</pre>";
    ?>
    <!-- ********************************mobile menu********************************* -->
 <div class="mobile_layout">    
     <div class="mealbg">
     <div id="overlay">
          <div class="uk-inline">
              <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>mealbg.png" alt="">
             <div class="uk-position-top">
                 <div  class="numdiv" uk-grid>
                    <div class="uk-width-auto">
                        <a href="<?php echo $link->link('home',mobile); ?>" style="color:#fff;"><span>  <i class="fa fa-long-arrow-left"></i> </span></a>
                    </div>
                    <!-- <div class="uk-text-right uk-width-expand">
                        <span class="phn">PH:&nbsp;<?php echo $fooder_details['mobile']; ?></span>
                    </div> -->
                </div>
                 <p class="name"><?php echo $fooder_details['foodername']; ?></p>
                 <div class="uk-width-1-1" style="padding-left: 15px;color: #fff;">
                    <a href="tel:<?php echo $fooder_details['mobile']; ?>"> <i class="fa fa-phone"></i> <?php echo $fooder_details['mobile']; ?></a>
                    </div>
                 <div  class="adddiv uk-grid-collapse" uk-grid>
                    <div class="uk-width-auto">
                        <span> <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>map1.png" class="mapimg"></span>
                    </div>
                    <div class="uk-width-expand">
                        <span  class="address"><?php echo $fooder_details['address'].'<br>'.$fooder_details['location_name'].', '.$fooder_details['city'].', '.$fooder_details['state']; ?></span>
                    </div>
                </div>
             </div>
             
             <div class="uk-position-bottom">
                 <div  class="numdiv" uk-grid>
                    <div class="uk-width-auto">
                         <span class="phn">OPEN:&nbsp;<?php echo date("g:i a", strtotime($daily_hrs[date('N')]['open']))." to ".date("g:i a", strtotime($daily_hrs[date('N')]['close'])); ?></span>
                    </div>
                </div>
             </div>
          </div>
          
          <!-- <div class="meal2">
              <div class="uk-child-width-1-2" uk-grid>
                <div>
                    <span>Menu</span>
                </div>
                <div>
                    <div class="uk-child-width-1-2 uk-text-center" uk-grid>
                        <div>
                            <span>Gallery</span>
                        </div>
                        <div>
                             <span>Takeaway</span>
                        </div>
                    </div>
                </div>
            </div>
              
          </div> -->
          
          <!-- <div class="meal3">
              <div class="uk-child-width-expand uk-grid-small" uk-grid>
                <div>
                    <div class="uk-inline">
                      <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>img3.png" alt="">
                      <div class="uk-position-bottom">
                         <p class="meal3hd">BEST SELLER!!</p>
                      </div>
                  </div>
                </div>
                <div class="meal3pd">
                    <div class="uk-inline">
                      <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>img4.png" alt="">
                      <div class="uk-position-bottom">
                          <p class="meal3hd">MOST ORDERED!!</p>
                      </div>
                  </div>
                </div>
            </div>
          </div> -->
          
          <div class="meal4">
              <div class="uk-child-width-expand uk-grid-small" uk-grid>
                <div>
                    <div class="uk-grid-collapse uk-grid-match" uk-grid>
                        <div class="uk-width-auto" >
                            <div class="taxdiv">
                             <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>img5.png" alt="" class="">
                             </div>
                        </div>
                        <div class="uk-width-expand" >
                            <div class="offdiv">
                            <p class="percen">30% OFF Upto 200</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="meal3pd">
                   <div class="uk-grid-collapse uk-grid-match" uk-grid>
                        <div class="uk-width-auto" >
                            <div class="taxdiv">
                             <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>img5.png" alt="" class="">
                             </div>
                        </div>
                        <div class="uk-width-expand" >
                            <div class="offdiv">
                            <span>Free Delivery</span><p class="abovemoney">On Order above Rs 200</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          
          
          <div class="meal5">
              <div class="uk-grid-small" uk-grid>
                <div class="uk-width-auto" >
                     <a href="" class="vegcss"><img src="<?php echo SITE_URL.'/assets/mobile/img/';?>veg.png" alt="" class="foodct">
                      &nbsp;<span>Veg</span>&nbsp;&nbsp;<i class="fa fa-close theme_color"></i></a>
                </div>
                <div class="uk-width-auto">
                 <a href="" class="vegcss"> <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>nonveg.png" alt="" class="foodct">
                     &nbsp;<span>Non-Veg</span>&nbsp;&nbsp;<i class="fa fa-close theme_color"></i></a>
                </div>
                <div class="uk-width-expand">
                   <form class="vegsearch">
                      <div class="uk-inline">
                                <span class="uk-form-icon"><i class="fa fa-search"></i></span>
                                <input class="uk-input" type="text" id="filter-dish" placeholder="Search for dishes">
                        </div>
                    </form>
                 </div>

            </div>
          </div>
          
          <div class="meal6">

          <a href="#" class="">
              <?php if(is_array($all_dishes)){
                  foreach($all_dishes as $dish){?>
              <div class="uk-grid-small list-dishes" data-search="<?php echo $dish['tags']; ?>" data-producttype="<?php echo $dish['product_type']; ?>" onclick="showDesc(event,this,'<?php echo $feature->encrypt_decrypt('encrypt',$dish['productid']); ?>');" uk-grid>
                    <div class="uk-width-auto">
                        <?php 
                        if(file_exists(SERVER_ROOT . '/uploads/fooders/' . $fooderid . '/product/'.$dish['picture']) && $dish['picture']!=''){
                        ?>  
                         <img src="<?php echo SITE_URL.'/uploads/fooders/' . $fooderid . '/product/'.$dish['picture'];?>" alt="" class="proimg"> 
                       <?php }else{ ?>
                        <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>img1.png" alt="" class="proimg">
                        <?php } ?>
                    </div>
                    <div class="uk-width-expand valign">
                        <?php if($dish['product_type']=='1'){
                            ?>
                          <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>nonveg.png" alt="" class="foodct">   
                        <?php }else{ ?>
                         <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>veg.png" alt="" class="foodct"> 
                         <?php } ?>
                         <p class="nm"><?php echo $feature->textstyler($dish['productname'],1); ?></p>
                         <?php if($dish['description']!=''){ ?>
                         <span class="desc"><?php  
                        if (strlen($dish['description']) > 50) echo substr($feature->textstyler($dish['description'],1), 0, 50) . '...';
                        else echo $feature->textstyler($dish['description'],1); ?><b>read more</b></span>
                          <br>
                         <?php } ?>
                         <?php if($dish['proprice']!=''){ ?>
                         <span class="prc">Rs <?php echo $dish['proprice']; ?> &nbsp;&nbsp;<span class="theme_color"><strike>Rs <?php echo $dish['price']; ?></strike></span></span>
                         <?php }else{ ?>
                            <span class="prc">Rs <?php echo $dish['price']; ?></span>
                         <?php } ?>   
                    </div>
                    <div class="uk-width-auto valign">
                        <button class="uk-button addtocartbtn uk-box-shadow-small uk-box-shadow-hover-large"> Add to cart</button>
                        <!-- <div class="cartcnvs">
                             <button class="uk-button uk-button-default bdmin">-</button>
                             <button class="uk-button uk-button-default bdnum">1</button>
                             <button class="uk-button uk-button-default bdplus">+</button>  
                        </div> -->

                    </div>
                </div>
                <?php }} ?>
                </a>
          </div> 
      </div>  
        
     </div>

     <div id="showDesc"></div> 

    


  <div class="footer">
        <div class="container">
         <div class="uk-child-width-expand uk-text-center uk-grid-collapse" uk-grid>
            <div class="valign">
                <div class="uk-card uk-card-body">
                  <i class="fa fa-book theme_color"></i> <br>
                     <span>MENU</span>
                     <div class="menudrop" uk-dropdown="animation: uk-animation-slide-top-small; animate-out: true;mode: click">
                         <h4>Menu</h4>
                         <div class="overflowcss">
                             <ul class="uk-nav uk-dropdown-nav">
                            <li>
                                <ul uk-accordion>
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#">Rolls<span class="uk-float-right">12</span></a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list subcat">
                                                <li>Francy Rolls <span class="uk-float-right">3</span></li>
                                                <li>Khathi Rolls <span class="uk-float-right">3</span></li>
                                                <li>Rumali Rolls <span class="uk-float-right">3</span></li>
                                                <li>Shorwarma Rolls <span class="uk-float-right">3</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                   <li class="uk-open">
                                        <a class="uk-accordion-title" href="#">Rolls<span class="uk-float-right">12</span></a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list subcat">
                                                <li>Francy Rolls <span class="uk-float-right">3</span></li>
                                                <li>Khathi Rolls <span class="uk-float-right">3</span></li>
                                                <li>Rumali Rolls <span class="uk-float-right">3</span></li>
                                                <li>Shorwarma Rolls <span class="uk-float-right">3</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#">Rolls<span class="uk-float-right">12</span></a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list subcat">
                                                <li>Francy Rolls <span class="uk-float-right">3</span></li>
                                                <li>Khathi Rolls <span class="uk-float-right">3</span></li>
                                                <li>Rumali Rolls <span class="uk-float-right">3</span></li>
                                                <li>Shorwarma Rolls <span class="uk-float-right">3</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#">Rolls<span class="uk-float-right">12</span></a>
                                        <div class="uk-accordion-content">
                                            <ul class="uk-list subcat">
                                                <li>Francy Rolls <span class="uk-float-right">3</span></li>
                                                <li>Khathi Rolls <span class="uk-float-right">3</span></li>
                                                <li>Rumali Rolls <span class="uk-float-right">3</span></li>
                                                <li>Shorwarma Rolls <span class="uk-float-right">3</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                
                            </li>
                            </ul>
                            </div>
                    </div>
                </div>
            </div>
            <div class="valign">
                 <div class="uk-card uk-card-body">
                     <?php if ($session->Check () && $_SESSION ['type'] === 'eater') {
                       ?>
                       <a href="">
                       <i class="fa fa-user theme_color"></i> <br>
                     <span>MY ACCOUNT</span></a>  
                    <?php }else{ ?>
                        <a href="<?php echo $link->link('login',mobile); ?>">
                    <i class="fa fa-user theme_color"></i> <br>
                     <span>MY ACCOUNT</span>
                    </a>
                     <?php } ?>
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
 
 <script>
     $( document ).ready(function() {
     $("#filter-dish").keyup(function(){
	    // Retrieve the input field text and reset the count to zero
	    var filter = $(this).val(), count = 0;
	    // Loop through the comment list
	    $(".list-dishes").each(function(){
        // If the list item does not contain the text phrase fade it out
	        if ($(this).text().search(new RegExp(filter, "i")) < 0 && !$(this).data('search').match(filter)) {
	            $(this).fadeOut();
	        // Show the list item if the phrase matches and increase the count by 1
	        } 
            else if($(this).data('search').match(filter)){
                $(this).show();
	            count++; 
            }
            else {
	            $(this).show();
	            count++;
	        }
	    });
	    // Update the count
	    var numberItems = count;
	    $("#filter-count").text("Number of Comments = "+count);
        if(count==0){
          //$(".noFooder").show();  
        }else{
            //$(".noFooder").hide();   
        }
	});
     });
     function showDesc(e,t,did){
         e.preventDefault();
         $.ajax({
            type: 'POST',
            url: '<?php echo $link->link('ajax',mobile);?>',
            data: "productDesc="+did,
            success: function (data) {
                var obj = JSON.parse(data);
                if(obj!=undefined){
                    var prodetails = '<div class="modaloverlay" id="prodetails"><div class="modalcss"><div class="close" onclick="closeDesc(this);" style="cursor:pointer"><i class="fa fa-close"></i></div><div class="container"><img src="'+obj.image+'" alt="" class="proimg uk-border-rounded"><div class="info uk-margin-small-top"><img src="<?php echo SITE_URL.'/assets/mobile/img/';?>veg.png" alt="" class="foodct"><p class="nm">'+obj.name+'</p>';
                    if(obj.description!=null){
                        prodetails +=  '<span class="desc">'+obj.description+'</span><br>';
                    }
                    if(obj.proprice!=''){
                        prodetails +=  '<span class="prc">Rs '+obj.proprice+' &nbsp;&nbsp;<span class="theme_color"><strike>Rs '+obj.price+'</strike></span></span>';  
                    }else{
                        prodetails +=  '<span class="prc">Rs '+obj.price+'</span>';   
                    }
                    prodetails += '</div></div></div></div>';
                    $("#showDesc").html(prodetails);
                }
                }
        });
     }
     function closeDesc(t){
        $(".modaloverlay").hide(); 
     }
 </script>


