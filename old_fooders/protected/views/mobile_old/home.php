<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Khateraho</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="" alt="Khateraho">
   <meta name="author" content="Khateraho">
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
    $all_fooders = $db->run("CALL searchHome()")->fetchAll();
    //echo "<pre>",print_r($all_fooders),"</pre>";
    ?>
    <!-- ********************************mobile menu********************************* -->
 <div class="mobile_layout">    
    <nav class="uk-navbar  uk-box-shadow-small  uk-text-capitalize navcss">
         <div class="uk-navbar-left">
            <a href="" class="uk-navbar-item uk-logo logocss">
               <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>wlogo.png" class="">
            </a>
        </div>
        <div class="uk-navbar-right">
            <span class="hdtxt">"Eliminating Extra Charges"</span>
        </div>
     </nav>
     <div class="homebg">
     <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>homebg2.png" class="">
         <p class="hd">Craving Convenience?</p>
         <span class="subhd">Search Your Favorite Restaurants!</span>
         <form class="search_form">
           <div class="uk-inline">
                    <span class="uk-form-icon"><i class="fa fa-search"></i></span>
                    <input class="uk-input rsearch" type="text" placeholder="Search for restaurant, location" id="filter-fooder" aria-expanded="false">
            </div>
         </form>
     </div>

     
     <div class="restaurant_div">
     <div class="uk-text-center noFooder" style="display:none;">
        <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>nofound.png" class="nofound">
        <p>No items found that match your search/filter.</p>
    </div>

     
     <?php 
     if(is_array($all_fooders)){
         foreach($all_fooders as $fooder){
             $fid = $feature->encrypt_decrypt('encrypt',$fooder['fooder_id']);
             ?>
       <a href="<?php echo $link->link('meal_detail',mobile,'&id='.$fid); ?>" style="cursor:pointer;">
       <div class="uk-grid-collapse uk-grid-match respdbtm list-fooder" data-search="<?php echo $fooder['specialization']; ?>" uk-grid>
            <div class="uk-width-1-3">
                
                   <?php if($fooder['logo']!='' && file_exists(SERVER_ROOT.'/uploads/fooders/'.$fooder['fooder_id'].'/logo/'.$fooder['logo'])){ ?> 
                  <img src="<?php echo SITE_URL.'/uploads/fooders/'.$fooder['fooder_id'].'/logo/'.$fooder['logo'];?>" class="proimg">
                  <?php }else{ ?>
                    <img src="<?php echo SITE_URL.'/assets/eaters/img/noimg.png';?>" class="proimg">
                  <?php } ?>  
              
            </div>
            <div  class="uk-width-expand">
            <div class="detail">
            <div class="" uk-grid>
                    <div class="uk-width-expand">
                        <span class="name"><?php  
                        if (strlen($fooder['name']) > 20) echo substr($feature->textstyler($fooder['name'],1), 0, 20) . '...';
                        else echo $feature->textstyler($fooder['name'],1); ?></span>
                    </div>
                    <div class="uk-width-auto">
                    <?php if($fooder['status']=='1'){?>
                        <span class="gstatus">Open</span>  
                    <?php }else{ ?>
                        <span class="rstatus">Close</span>   
                    <?php } ?>    
                    </div>
                </div>
               <p class="uk-label phnlabel"> <i class="fa fa-phone"></i>&nbsp;&nbsp;<?php if($fooder['mobile']!='') echo $fooder['mobile']; else echo 'N/A'; ?></p>
                <div class="uk-grid-small" uk-grid>
                            <div class="uk-width-auto">
                                 <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>map.png" class="mapimg">
                            </div>
                            <div class="uk-width-expand custompd valign">
                                <div  class="address"><?php echo $fooder['location_name']; ?></div>
                            </div>
                </div>
                <div class="uk-text-right"><button class="uk-button orderbtn"> ORDER NOW</button></div>
               </div>
            </div>
        </div> 
        </a>  
        <?php } }?>


     </div>
     
 </div>    
 <script>
     $("#filter-fooder").keyup(function(){
	    // Retrieve the input field text and reset the count to zero
	    var filter = $(this).val(), count = 0;
	    // Loop through the comment list
	    $(".list-fooder").each(function(){
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
          $(".noFooder").show();  
        }else{
            $(".noFooder").hide();   
        }
	});
 </script>

