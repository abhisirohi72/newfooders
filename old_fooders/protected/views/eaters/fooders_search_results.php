        <div class="row">
	        <h1 class="heading fltlft">Fooders in Agra <?php if($_POST['search']!='') echo "for &quot;".$_POST['search']."&quot";
	        elseif($_REQUEST['option']!='') echo "for &quot;".$_REQUEST['option']."&quot";
	        elseif($_REQUEST['location']!='') echo "for &quot;".$_REQUEST['location']."&quot";
	        elseif($_REQUEST['cuisine']!='') echo "for &quot;".urldecode($_REQUEST['cuisine'])."&quot";
	        
	        
	        ?></h1>
           <?php if($_POST['search']!=''){?> 
           <p class="head-next"><?php if(is_array($get_all_fooders) && $all_fooders_count!=='0' && $all_fooders_count!==NULL){ echo "About ".$all_fooders_count." results (".$time." seconds)"; } ?></p>
           <?php }else{ ?>
           	<p class="head-next"><?php if(is_array($get_all_fooders) && $all_fooders_count!=='0' && $all_fooders_count!==NULL){ echo "About ".$all_fooders_count." results"; } ?></p>
           <?php }?>
        </div>
        <?php if(is_array($get_all_fooders) && $all_fooders_count!=='0' && $all_fooders_count!==NULL){?>
       <?php if($_POST['search']!=''){?>
        <div class="row">
        	<p class="related-srch">Related Searches for " <?php echo $search;?> " :  <span class="tag"><?php echo $related_search;?></span></p>
        </div>
        <?php } }?>
 
        <div class="wrapper">
        	<div class="row">
            	<div class="col-7">
                        <div class="row">
                             <div class="col-2">
                                <div class="rest-sidebar sidebar-color">
                                	<div class="browse">Browse by</div>
                                    
                                   <ul class="rest-ul">
                                        <li class="active-cuis"><a href="#" class="cuisine-act">CUISINE</a><input type="text" class="hide-cuisine-search" name="cuis_search" id="filter" value="" placeholder="Search Cuisines" style="width:55%;display:none;">
                                        <ul class="hide-cuisine location-cuisine-scrollbar" id="cuisine-data" style="display:none;"></ul>
                                        </li>
                                        <li class="active-loc"><a href="#" class="location-act">LOCATION</a><input type="text" class="hide-loc-search" name="loc_search" id="filter-loc" value="" placeholder="Search Location" style="width:52%;display:none;">
                                        <ul class="hide-location location-cuisine-scrollbar" id="location-data" style="display:none;"></ul>
                                        </li>
                                        
                                   </ul>
                                   <ul class="eat-ul">
                                   <li class="home-delivery-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('home delivery'));?>">HOME DELIVERY</a></li>
                                   <li class="take-out-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('take out'));?>">TAKE OUT</a></li>
                                   <li class="pure-veg-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('pure veg'));?>">PURE VEG</a></li>
                                   <li class="dine-in-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('dine in'));?>">DINE IN</a></li>
                                   <li class="parking-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('parking'));?>">PARKING</a></li>
                                   <li class="bar-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('bar'));?>">BAR</a></li>
                                   <li class="wi-fi-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('wi fi'));?>">WI FI</a></li>
                                   <li class="table-booking-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('table booking'));?>">TABLE BOOKING</a></li>
                                   <li class="show-delivery-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('show only free delivery'));?>">SHOW ONLY FREE DELIVERY</a></li>
                                   <li class="accept-cc-fs"><a href="<?php echo $link->link('fooders_search_results',eaters,'&option='.urlencode('credit cards acceptability'));?>">CREDIT CARDS ACCEPTABILITY</a></li>
                                   </ul>
                                </div>
                             </div><!-- /col-2 -->

                             <div class="col-5"  >
                                <input autocomplete="off" type='hidden' id='current_page' />
	                            <input autocomplete="off" type='hidden' id='show_per_page' />
                             	<div class="srch-cont" >
                                	<div class="srch-title">
                                    	<div class="row">
                                    		<span class="frst-col fltlft">ALL FOODERS ( <?php if($all_fooders_count!==NULL && $all_fooders_count!=='0'){ echo $all_fooders_count; } else { echo "0";}?> )</span>
                                            <?php if($_POST['search']!=''){?><span class="snd-col fltlft">Displaying results for "<?php echo $search;?>"</span><?php }?>
                                            <?php if(is_array($get_all_fooders) && $all_fooders_count!==NULL){?>
                                            <span class="thrd-col fltrt">Sort by:  
                                            <a class="sort_popular_asc" href="#" style="text-decoration:none;">popularity  <i class="icon-caret-down" id="icon-popularity-asc" style="display:none;"></i></a> 
                                            <a class="sort_popular_desc" href="#" style="text-decoration:none;display:none;">popularity  <i class="icon-caret-up" id="icon-popularity-desc"></i></a>
                                            
                                            <a class="sort_rating_asc" href="#" style="text-decoration:none;">rating  <i class="icon-caret-down" id="icon-rating-asc" style="display:none;"></i></a> 
                                            <a class="sort_rating_desc" href="#" style="text-decoration:none;display:none;">rating  <i class="icon-caret-up" id="icon-rating-desc"></i></a>
                                            
                                            <a class="sort_cost_asc" href="#" style="text-decoration:none;">cost  <i class="icon-caret-down" id="icon-cost-asc" style="display:none;"></i></a> 
                                            <a class="sort_cost_desc" href="#" style="text-decoration:none;display:none;">cost  <i class="icon-caret-up" id="icon-cost-desc"></i></a>
                                            
                                              <?php }?> 
                                    	</div>
                                    </div><!-- /srch-title -->
                                   
                                   
                                    <div id='content'>
                                    
                                   <?php
                                   if($all_fooders_count=="0" || $all_fooders_count==NULL){
                                   	echo "<div class='fooder-not-search'>No Data Found, Please search again.</div>";
                                   }
                                   else{
                                  
                                   if(is_array($get_all_fooders)){
                                   foreach($get_all_fooders as $alldata){
                                   $daily_hrs = unserialize($alldata['daily_hrs']);
                                   if($alldata['facilities']=="N;" || $alldata['facilities']==""){
                                   	$facilities = array();
                                   }else{
                                   	$facilities = unserialize($alldata['facilities']);
                                   }
                                   $total_locations = count(unserialize($alldata['delivery_areas']));
                                    if($alldata['type']=='1'){
                                    	$type_fooder = "Restaurant";
                                    }elseif ($alldata['type']=='2'){
                                    	$type_fooder="Confectioner";
                                    }else{
                                    	$type_fooder="Baker";
                                    }

                                   	?>
                                   <div class="page-sort">
                                    <div class="srched-rest" data-popular = <?php echo $alldata['number_of_reviews'];?> data-rating = <?php echo round($alldata['average_reviews'],'1');?> data-cost = <?php echo $alldata['minimum_order'];?>>
                                    	<div class="row-fluid">
                                    	<div class="span12">
                                    	<div class="span7">
                                        	<div class="resto-name"><a class="resto-name" href="<?php echo $link->link('fooder',eaters,'&fooder_profile_token='.$alldata['fooder_id']);?>"><?php echo $alldata['name'];?></a>
                                        	<span><?php echo $alldata['location_name'];?></span></div>
                                          </div>
                                          <div class="span3" style="padding-left: 7%;">
                                          <strong rel='tooltip' data-placement="top" data-original-title='Type of fooder'><?php echo $type_fooder;?></strong>
                                          </div>
                                          <div class="span2" style="padding-left: 3%;">

                                            <div class="resto-rate">

                                            	<div class="rate-box" data-placement="top" rel="tooltip" data-original-title="Rated : <?php echo $alldata['average_reviews'];?> based on <?php echo $alldata['number_of_reviews'];?> reviews">
                                                	<?php echo "<strong>".round($alldata['average_reviews'],'1')."</strong>";?>&nbsp;<span class="active">*</span>
                                                   <?php echo "<strong> ".$alldata['number_of_reviews']."</strong>";?> <i class="icon-comment" style="color: #31BBF1;"></i>
                                                    </div>
                                            </div>

                                            </div>
                                           </div>
                                          <!--   <div class="resto-fb-like">
                                            	<img src="<?php // echo SITE_URL.'/assets/eaters/img/fb_like.png';?>" />
                                            </div> -->
                                        </div><!-- /row -->
                                        <div class="row">
                                        	<div class="resto-info">
                                            	<?php  if($alldata['specialization']){ echo "<p><strong>Speciality</strong> : ".$alldata['specialization']."</p>";}?>

                                               <?php if($alldata['status']=='0'){
                                               	echo "<p><strong>Status : </strong>Closed</p>";
                                               } else {?>
                                                <p><strong>Open Between</strong> : <?php if(date('N')=='7'){ echo $daily_hrs['0']['open']." to ".$daily_hrs['0']['close'];
                                                }
                                                else {
                                                	echo $daily_hrs[date('N')]['open']." to ".$daily_hrs[date('N')]['close'];
                                                }?></p>
                                                <?php }
                                                echo "<p><strong>Facilities : </strong>";
                                                if($alldata['facilities']=="N;" || $alldata['facilities']==""){
                                                	$facilities = array();
                                                }else{
                                                	$facilities= unserialize($alldata['facilities']);

                                                }
                                                if(is_array($facilities) || count($facilities)!=0){

                                                	foreach($facilities as $key=>$value){
                                                		switch($value)
                                                		{
                                                			case 0: echo "<i rel='tooltip'  data-original-title='Delivery' class='icon-truck' style='color:orange;'></i>&nbsp;";
                                                			break;
                                                			case 1: echo  "<i rel='tooltip' data-original-title='Take out' class='icon-rocket' style='color:purple;'></i>&nbsp;";
                                                			break;
                                                			case 2: echo  "<i rel='tooltip' data-original-title='Veg only' class='icon-circle' style='color:green;'></i>&nbsp;";
                                                			break;
                                                			case 3: echo  "<i rel='tooltip' data-original-title='Dine-In' class='icon-food'></i>&nbsp;";
                                                			break;
                                                			case 4: echo  "<i rel='tooltip' data-original-title='Parking' class='icon-pinterest' style='color:#f79263;'></i>&nbsp;";
                                                			break;
                                                			case 5: echo  "<i rel='tooltip' data-original-title='Bar' class='icon-beer' style='color:#6fb3e0;'></i>&nbsp;";
                                                			break;
                                                			case 6: echo  "<i rel='tooltip' data-original-title='Wifi Zone' class='icon-signal'></i>&nbsp;";
                                                			break;
                                                			case 7: echo  "<i rel='tooltip' data-original-title='Accepts CC' class='icon-credit-card' style='color:#6fb3e0;'></i>&nbsp;";
                                                			break;
                                                			case 8: echo  "<i rel='tooltip' data-original-title='Table Booking' class='icon-ticket' style='color:brown;'></i>";
                                                			break;
                                                		}


                                                }} echo "</p>";?>

                                           <?php if($alldata['minimum_order']){ echo "<p><strong>Minimum Order : </strong>" .$alldata['minimum_order']." <i class='icon-inr' style='padding-top: 0.2em;'></i></p>";} ?>

                                           <?php if($alldata['delivery_time']>0){ echo "<p><strong>Delivery Time : </strong>".$alldata['delivery_time']. " min.</p>";} ?>

                                            <p>Delivers at <strong><?php echo $total_locations;?></strong> locations</p>
                                            <?php if($related_search) echo "<p><strong>Serves : </strong> ".$arr_search[array_rand($arr_search,'1')]."</p>";?>
                                            </div><!-- /resto-info -->
                                            <div class="fltrt">
                                            <?php if($alldata['logo']!="" || $alldata['logo']!=NULL){?>
                                            <a href="<?php echo $link->link('fooder','','&fooder_profile_token='.$alldata['fooder_id']);?>"><img src="<?php echo SITE_URL.'/uploads/fooders/'.$alldata['fooder_id'].'/logo/'.$alldata['logo'];?>" style="width:171px;height:89px;"></a>
                                            <?php }else{ ?>
                                             <a href="<?php echo $link->link('fooder','','&fooder_profile_token='.$alldata['fooder_id']);?>"><img src="<?php echo SITE_URL.'/assets/eaters/img/noimg.png';?>"></a>
                                             <?php }?>
                                            </div>
                                        </div><!-- /row -->
                                        <p class="more-dt"><?php echo substr($alldata['about_us'],0,150)."...";?></p>
                                  </div></div><!-- /srched-rest -->
									<?php

                                   }

                                   }
                                   }
                                   ?>
                                   </div>
                                  
                                   
                                   <?php if(is_array($get_all_fooders) && $all_fooders_count!=='0'  && $all_fooders_count!==NULL){?>
                                    <div class="srch-paging" >
                                    	<div class="row">
                                        	<?php if($_POST['search']!=''){?><p class="dis-pag">Displaying results for "<?php echo $search;?>"</p><?php }?>
                                            <p class="page-no" id='page_navigation' ></p>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="add-rsto">
                                    	<a class="mn-link" href="<?php echo $link->link('register',fooders);?>">Add A Fooder On Khate Raho&reg;</a>
                                        <p>Hey Fooder/ Restaurant/ Baker/ Confectioner, Click Above Register Your Business (which is free)</p>
                                    </div>

                                </div><!-- srch-cont-->
                             </div><!-- col-5 -->
                        </div><!-- /row -->

                </div><!-- /col-7 -->
                <div class="col-2">
<div class="row-fluid center">
		<div class="span12">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- KRAHO -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:650px"
     data-ad-client="ca-pub-8605102717299212"
     data-ad-slot="7582327314"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		
	
        </div>
		</div>
        
		<br>
		<div class="row-fluid center">
		<div class="span12">
		
		
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- KR -->
<ins class="adsbygoogle"
     style="display:inline-block;width:180px;height:150px"
     data-ad-client="ca-pub-8605102717299212"
     data-ad-slot="8388301312"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		
        </div>
		</div>
	       
                </div>
            </div>
        </div><!-- /wrapper -->
<?php if($query2=="location"){?>
<script>
$(document).ready(function(){                                   
$(".location-act").trigger('click');                                   
$(".active-loc").addClass("active-li");
$(".hide-location").show();
$(".hide-loc-search").show();
});
</script>
<?php }elseif($query2=='cuisine'){?>

<script>
$(document).ready(function(){                                   
$(".cuisine-act").trigger('click');                                   
$(".active-cuis").addClass("active-li");
$(".hide-cuisine").show();
$(".hide-cuisine-search").show();
});
</script>
<?php }?>