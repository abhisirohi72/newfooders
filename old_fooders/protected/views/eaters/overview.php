  
  <div class="row-fluid">
 
                             <div class="span12">   
                             
                                <?php if(fooder_description!=NULL || fooder_description!=""){
                               echo "<p class='rest-desc'>".fooder_description."</p>";
                               }
                               	?>
                             
                                <div class="resto-box">                  
                                <?php  if(is_array($gallery_images) && count($gallery_images)!=0){?>
                                <div class="row-fluid">
                                	<div class="span12">
                                		<h1 class="rest-title fltlft">Image Gallery <span>(<?php echo count($gallery_images);?> Photos)</span></h1>
                                    	<p class="img-cpyrght fltrt">All the images are Copyright&copy; of the respective Fooder</p>
                                    </div>
                                </div>
                                <br/>
                                <div style="padding:0px 15px;">
                                <div class="row-fluid">
                                <div id="gallery"  class="span12">
   					 <?php 
	                            foreach($gallery_images as $image){
	echo "<a href=".SITE_URL.'/uploads/fooders/'.$get_all_explode['getval'].'/gallery/'.basename($image).">
	<img src=".SITE_URL.'/uploads/fooders/'.$get_all_explode['getval'].'/gallery/'.basename($image)." style='width:127px; height:87px;'></a>"; 
																	}?>
				</div>
                                </div>
                                 </div>
                                <?php }?>
                               
                              <br>
                         <div class="rest-ftr">
                        <?php if($fooders_complete_details['0']['address']!=""){?>
                         <div class="row-fluid">
                          <div class="span2">
                          <div class="ftr-head ">Address</div>
                          </div>
                          <div class="span10">
                          <p><?php echo $fooders_complete_details['0']['address'].' , '.$get_full_address['region'].' , '.$get_full_address['city'].' , '.$get_full_address['state'];?></p>
                          </div>
                          </div>
                           <br>
                       <?php } if(is_array($get_facility) || count($get_facility)!=0){?>
                          <div class="row-fluid">
                          <div class="span2">
                          <div class="ftr-head ">Facilities</div>
                          </div>
                          <div class="span10">
                          <?php 
                          $counter=count($get_facility);
                       
                          $i=0;
                           
							foreach($get_facility as $key=>$value)
							{
          						if ($i % 3 == 0) {
							echo '<div class="row-fluid">';
							}
	                echo "<div class='span3'>";
                    switch($value)
                    {
                    	case 0: echo "<i class='icon-truck' style='color:orange;'></i>Delivery";
                    	break;
                    	case 1: echo  "<i class='icon-rocket' style='color:purple;'></i>Take out";
                    	break;
                    	case 2: echo  "<i class='icon-circle' style='color:green;'></i>Veg only";
                    	break;
                    	case 3: echo  "<i class='icon-food'></i>Dine - In";
                    	break;
                    	case 4: echo  "<i class='icon-pinterest' style='color:#f79263;'></i>Parking";
                    	break;
                    	case 5: echo  "<i class='icon-beer' style='color:#6fb3e0;'></i>Bar";
                    	break;
                    	case 6: echo  "<i class='icon-signal'></i>Wifi Zone";
                    	break;
                    	case 7: echo  "<i class='icon-credit-card' style='color:#6fb3e0;'></i>Accepts CC";
                    	break;
                    	case 8: echo  "<i class='icon-ticket' style='color:brown;'></i>Table Booking";
                    	break; 
                    }	
                    echo "</div>";
                    if($i%3==2 || $i==($counter-1)){
                    	echo '</div>';
                    } $i++;
}
                         ?>
                          </div>
                          </div>
                          <?php }?>
                          <br>
                          <?php if($fooders_complete_details['0']['specialization']!=""){?>
                          <div class="row-fluid">
                          <div class="span2"><div class="ftr-head ">Specialities<br>(Cuisines)</div></div>
                          <div class="span10">
                          <p><i class="icon-food" style="color: orange;"></i><?php echo $fooders_complete_details['0']['specialization'];?></p>
                          </div>
                          </div>
                          <br/>
                           <?php }?>
                          <div class="row-fluid">
                          <div class="span2"><div class="ftr-head">Open Days</div></div>
                          <div class="span4">
                          <?php 
                                  if(is_array($daily_hrs)){
                                  $current_day = date('N');
                                  foreach ($daily_hrs as $key=>$val){
										if($key==0){
										$key = 7;
										}
							      	switch ($key) {
                                        		case 1 :
                                  	                if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Monday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Monday<br/>";
                                        			}
                                        			break;
                                        		case 2 :
                                  					if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Tuesday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Tuesday<br/>";
                                        			}
                                        			break;
                                        		case 3 :
                                        			if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Wednesday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Wednesday<br/>";
                                        			}
                                        			break;
                                        		case 4 :
                                  					if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Thursday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Thursday<br/>";
                                        			}
                                        			break;
                                        		case 5 :
                                  					if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Friday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Friday<br/>";
                                        			}
                                        			break;
                                        		case 6 :
                                  	                if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Saturday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Saturday<br/>";
                                        			}
                                        			break;
                                        		default :
                                  	               if($key == $current_day){
                                        			echo "<span class='label label-inverse'> Sunday</span><br/>";
                                        			}
                                        			else {
                                        				echo "Sunday<br/>";
                                        			}
                                        			break;
                                        	}
                                  }
                                        ?>
                          </div>
                          <div class="span2"><div class="ftr-head">Timings</div></div>
                          <div class="span4">
                          <?php foreach ($daily_hrs as $key=>$value){
                            if($key==0){
                            	$key=7;
                            }
                          	if($key==$current_day){            	
                          	echo "<span class='label label-inverse'>".$value['open']."  to  ".$value['close']."</span>".$closed."<br>";
                            } 
                            else {
                            	echo $value['open']."  to  ".$value['close']."<br/>";
                            }                
                            }
                            
                                  }?>
                          </div>
                          </div> 
                         </div>
                            </div><!-- /resto-box -->
                            <br/>
                           <!--  <div class="resto-box">
                                <div class="row-fluid">
                                	<div class="col-2">
                                		<h1 class="rest-title">Directions in Map</h1>
                                        <a href="#" class="get-route"><img src="<?php echo SITE_URL.'/assets/eaters/img/get_route.jpg';?>" /></a>
                                    	<p class="rest-mapd">Dont know How to reach this Fooder. Just click on this button and get directions to the Fooder in less than a minute.</p>
                                    </div>
                                    <div class="col-3">
                                    	<div class="rest-mapc">
                                        	<img src="<?php // echo SITE_URL.'/assets/eaters/img/map.jpg';?>" />
                                        </div>
                                    </div>
                                </div>
                            </div> --><!-- /resto-box -->
                           
                           
                            </div>
                            </div>
