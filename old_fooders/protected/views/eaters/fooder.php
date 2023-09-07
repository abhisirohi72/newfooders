<link type="text/css" media="all" rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/eaters/css/jquery.tosrus.all.css';?>" />

<script type="text/javascript" language="javascript"
	src="<?php echo SITE_URL.'/assets/eaters/js/jquery.tosrus.min.all.js';?>"></script>
<script
	src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<!-- fire the plugin onDocumentReady -->
<script type="text/javascript" language="javascript">
			jQuery(function( $ ) {
             	$('#gallery a').tosrus({
					pagination	: true,
					slides		: {
							  caption : false
					}
				});
				$('#gallery').tosrus({
					infinite	: true,
					slides		: {
						visible		: 4
					}
				});
			});
		</script>
<div class="md-modal md-effect-1" id="modal-1">
	<div class="md-content">
		<h3>Report a discrepancy <i class="icon-remove md-pro md-close"></i></h3>
		<div>
			<form method="post" id="form-discrepancy" name="discrepancy">
				<input autocomplete="off" type="hidden" name="discrepancy_ip"
					value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
				<input type="hidden" name="page_link" value="<?php echo $_SERVER['REQUEST_URI'];?>">
				<input type="hidden" name="discrepancy_check" value="discrepancy">
				 <br>
				<div class="row-fluid">
					<div class="span12">
						<input autocomplete="off" class="krinputboxes" type="text"
							name="name" id="name" value="" autofocus="autofocus"> <label
							class="krlabel">NAME</label>
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div class="span12">
						<input autocomplete="off" class="krinputboxes" type="email"
							id="email" name="email" value=""> <label class="krlabel">EMAIL</label>
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div class="span12">
						<input autocomplete="off" class="krinputboxes" type="text"
							name="page" value="<?php echo fooder_title;?>"
							disabled="disabled"> <label class="krlabel">DISCREPANCY FOR</label>
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div class="span12">
						<textarea class="krtextarea" id="description" name="description"></textarea>
						<label class="krlabel">DESCRIPTION</label>
					</div>
				</div>
				<br>
				<br>
				<div class="row-fluid">
					<div class="span12">
						<div class="span3">
							<button class="button-submit" type="submit" name="discrepancy_submit"
								id="submit">
								<i class="icon-check"></i> Submit
							</button>
						</div>
						<div class="span2">
							<img id="loading"
								src="<?php echo SITE_URL.'/assets/eaters/img/loader.gif';?>">
						</div>
					</div>
				</div>
				<br>
				<div class="row-fluid">
					<div class="span12" id="info-discrepancy"></div>
				</div>
			</form>

		</div>
	</div>
</div>
<div class="md-overlay"></div>
<!-- the overlay element -->

<div class="wrapper">
	<div class="row-fluid">
		<div class="col-7">
			<div class="content">
				<div class="row-fluid">
					<div class="col-2">
						<div style="text-align: right">
							<a href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id);?>">
							<img src="<?php echo $get_logo.'?'.rand();?>" width="220"
								alt="<?php echo $fooders_complete_details['0']['name']."_logo";?>"
								rel="tooltip"
								title="<?php echo $fooders_complete_details['0']['name']." Logo";?>" /></a>
						</div>
						<div class="rest-sidebar">
							<a
								href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id);?>">
								<h4 class="rest-news" style="margin: auto;">Overview</h4>
							</a>
							<h4 class="rest-news" style="margin: auto;">Menu</h4>
							<ul class="rest-ul">
                               		<?php 
									if($get_menus!="" && $get_menus!=NULL && is_array($get_menus)){		
                               		 foreach ($get_menus as $key){
                               		echo "<li><a href='".$link->link('fooder&fooder_profile_token='.fooder_id,eaters,'&menu_name='.str_replace(" ", "-",$key['name']))."#products'>".$key['name']."</a></li>";
                               			}
									}else {
										echo "<li>Menu Is Not Available.</li>";
									}
                               		?>
                               </ul>
						</div>
					</div>
					<!-- /col-2 -->

					<div class="col-5">
						<div class="resto-box">
							<div class="row-fluid">
								<div class="col-3">
									<a href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id);?>">
										<h1 class="rest-title" rel="tooltip"
											data-original-title="Fooder's Name"><?php echo $fooders_complete_details['0']['name'];?></h1></a>
								</div>
								<div class="col-2">
                                
                                
                                
                                <?php 
                                if(fooder_status=='0'){?>
                                	<img
										src="<?php echo SITE_URL.'/assets/eaters/img/close.gif'?>"
										class="location" rel="tooltip"
										data-original-title="Closed Right Now">
                                <?php
           $closed = '<b style="font-size:10px; color:red;"> Closed</b>';
                                }
                                
                                else{
                             	  if(date("H:i")>=$daily_hrs[date('N')]['open'] && date("H:i")<=$daily_hrs[date('N')]['close'] ){
                                	?>
                                	 <img
										src="<?php echo SITE_URL.'/assets/eaters/img/open.gif'?>"
										class="location" rel="tooltip"
										data-original-title="Working hrs <?php 
                                	 if(date('N')=='7'){
                                	 	echo $daily_hrs['0']['open'].' to '.$daily_hrs['0']['close'];}
                                	 else{
                                	 	echo $daily_hrs[date('N')]['open'].' to '.$daily_hrs[date('N')]['close'];
                                	 }?>">	
                                	<?php } else{?>
                                	<img
										src="<?php echo SITE_URL.'/assets/eaters/img/close.gif'?>"
										class="location" rel="tooltip"
										data-original-title="Working hrs <?php if(date('N')=='7'){echo $daily_hrs['0']['open'].' to '.$daily_hrs['0']['close'];}
                                	 else{
                                	 	echo $daily_hrs[date('N')]['open'].' to '.$daily_hrs[date('N')]['close'];
                                	 }?>">
                              <?php }  }
                                ?>
                                    
                                    </div>
							</div>


							<div class="row-fluid">
								<div class="col-3">
                                		<?php if($fooders_complete_details['0']['landline']!='') echo '<h4 class="rest-phone">'.$fooders_complete_details['0']['landline'].'</h4>';  ?>
                            		</div>
								<div class="col-2"></div>
							</div>

							<div class="user-rew" style="border-top: none;">
								<div class="resto-box">
									<div class="row-fluid">
										<div class="span12">
											<div class="ur_box1">
                                        	<?php if($average_reviews_decimal=='0'){echo "<h3 style='text-align:center;'><br><span class='fooder-no-reviews'>No<br> Reviews</span></h3>";}
                                        	else{?>
                                        	<div class="star-rate"><?php echo $average_reviews_decimal;?></div>
												<div class="ur-title" rel="tooltip" data-placement="top"
													data-original-title="Eaters Rating">
													<img
														src="<?php echo SITE_URL.'/assets/eaters/img/rating/Foodometer.jpg';?>" />
												</div>

												<div class="ur-rtbox" rel="tooltip"
													data-original-title="Average Rating : <?php echo $average_reviews_decimal;?><br>
													This is a generalized word used for describing eaters rating">
                                            
                                                	<?php if($average_reviews_decimal>0 && $average_reviews_decimal<=1){?>
                                            	<img
														src="<?php echo SITE_URL.'/assets/eaters/img/rating/Bakwaas.jpg';?>" />
                                                 <?php   }
                                                  elseif ($average_reviews_decimal>1 && $average_reviews_decimal<=2){?>
                                                  	<img
														src="<?php echo SITE_URL.'/assets/eaters/img/rating/Timepass.jpg';?>" />
                                                  	<?php }
                                                  elseif ($average_reviews_decimal>2 && $average_reviews_decimal<=3){?>
                                                  <img
														src="<?php echo SITE_URL.'/assets/eaters/img/rating/Khaas.jpg';?>" />
                                                  <?php }
                                                  elseif ($average_reviews_decimal>3 && $average_reviews_decimal<=4){?>
                                                  	<img
														src="<?php echo SITE_URL.'/assets/eaters/img/rating/Bindaas.jpg';?>" />
                                                  <?php }
                                                  elseif ($average_reviews_decimal>4 && $average_reviews_decimal<=5){?>
                                                  <img
														src="<?php echo SITE_URL.'/assets/eaters/img/rating/Jhakaas.jpg';?>" />
                                                  <?php } ?>
                                                	
                                                
                                                	
                                                	<!-- <div rel="tooltip" data-original-title="Average : <?php // echo $average_reviews_decimal;?>" class="comments" data="<?php echo $average_reviews_decimal;?>"></div> -->

												</div>
												<div class="ur-rtbox">
													<a href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id,eaters,'&comments='.md5(base64_encode(fooder_id)));?>" style="font-size: .8em;">based on <?php echo $count_reviews;?> reviews</a>
												</div>
                                            <?php }?>
                                        </div>
											<div class="ur_box2" style="width: 250px;">
												<div class="ur-ttrev">
													<h2 rel="tooltip" data-original-title="Eater's Comments" data-placement="top">
														<i class="icon-comments"></i>&nbsp; <?php echo $count_reviews;?></h2>
													<a href="#" id="btn-scroll-down">Write your review</a>
												</div>
												<div class="ur-ttrev">
													<h2 rel="tooltip"
														data-original-title="This <?php if(fooder_type==1) echo "Restaurant"; elseif(fooder_type==2) echo "Confectioner"; else echo "Baker";?> delivers in <?php echo fooder_delivery_locations;?> locations" data-placement="top">
														<i class="icon-truck"></i>&nbsp; <?php echo fooder_delivery_locations;?></h2>
													<a href="#" class="delivery-areas" id="<?php echo base64_encode(fooder_id); ?>">Delivery Areas</a>
												</div>
											</div>
											<div class="ur_box3" style="width: 90px; padding-top: 1.5%;">
												<a href="https://twitter.com/share"
													class="twitter-share-button" data-via="<?php Appname;?>"
													data-lang="en">Tweet</a>
												<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
												<p>
													<!-- Place this tag in your head or just before your close body tag. -->
													<script type="text/javascript"
														src="https://apis.google.com/js/platform.js">
											  {parsetags: 'explicit'}
											</script>
												<!-- Place this tag where you want the share button to render. -->
												<div class="g-plus" data-action="share"
													data-annotation="bubble"
													data-href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id);?>"></div>
												<!-- Place this render call where appropriate. -->
												<script type="text/javascript">gapi.plus.go();</script>
												<div class="fb-share-button"
													data-href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id);?>"
													data-type="button_count" data-via="<?php echo Appname;?>"></div>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
                          <?php 
                         if($menu_name!==NULL && $menu_name!=="")
                          {
                          	require SERVER_ROOT . '/protected/views/eaters/fooder_products.php';
                          }
                          elseif ($_REQUEST['comments'] && $_REQUEST['comments']==md5(base64_encode(fooder_id)) ){
                          	
                          	require SERVER_ROOT . '/protected/controller/eaters/comments_controller.php';
                          	require SERVER_ROOT . '/protected/views/eaters/comments.php';
                          	
                          }
                          else
                          {
                          	require SERVER_ROOT . '/protected/views/eaters/overview.php';
                          }
                          
                          	?>
                          	</div>
					</div>
				</div>
			</div>
			<div class="found-error" id="bottom-review">
				<button style="width: 100%;" class="md-trigger" id="modal"
					data-modal="modal-1">Found an error on this page? Report a
					discrepancy on this page to Khate Raho.</button>
			</div>

			<div class="row-fluid">
				<div class="content">
					<div class="review-box">
						<h1 class="review-title">Write a Review for the Fooder</h1>
						<form method="post" id="form-reviews">
							<input type="hidden" name="comment_ip"
								value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
							<input type="hidden" name="fooderid" value="<?php echo fooder_id;?>">
							<input type="hidden" name="comment_check" value="comment">
							<div class="row-fluid">
								<div class="span12">
									<div class="span8">
										<div class="box1">
											<div class="fltlft">
												<h4 class="sub-head">1) Write your review :</h4>
												<p class="rv-note">
													(Please do not include: HTML, <br>references to other retailers,<br> pricing, personal information,<br> any profane, inflammatory or<br> copyrighted comments,<br> or any copied content.)
												</p>
											</div>
											<textarea name="comment" id="comment"
												class="rv-textar textarea" minlength="50"></textarea>

										</div>
									</div>
									<div class="span4">
										<div class="box2">
											<h4 class="sub-head">2) Provide Rating :</h4>
											<div class="row-fluid">
												<div class="span12" style="margin-top: 20px;">
													<div class="span2">
														<span class="rate-title">SPEED</span>
													</div>
													<div class="span10" style="padding-left: 23px;">
														<input autocomplete="off" id="input-5a" id="speed"
															name="speed" type="number" class="rating" data-size="xs">
													</div>
												</div>
											</div>

											<div class="row-fluid">
												<div class="span12" style="margin-top: 10px;">
													<div class="span2">
														<span class="rate-title">TASTE</span>
													</div>
													<div class="span10" style="padding-left: 23px;">
														<input autocomplete="off" id="input-5a" id="taste"
															name="taste" type="number" class="rating" data-size="xs">
													</div>
												</div>
											</div>

											<div class="row-fluid">
												<div class="span12" style="margin-top: 10px;">
													<div class="span3">
														<span class="rate-title">SERVICE</span>
													</div>
													<div class="span9">
														<input autocomplete="off" id="input-5a" id="service"
															name="service" type="number" class="rating"
															data-size="xs">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="span2"></div>
									<div class="span8">
										<div class="char-limit" id="textarea_feedback"></div>
									</div>
									<div class="span2"></div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="span2"></div>
									<div class="span7">
										<div id="info-reviews"></div>
									</div>
									<div class="span1" style="padding-top: 3%;">
										<img id="loading2"
											src="<?php echo SITE_URL.'/assets/eaters/img/loader.gif';?>">
									</div>
									<div class="span2">
										<button type="submit" name="comment" class="rwev-submit">
											<i class="icon-check"></i> Submit
										</button>
									</div>
								</div>
							</div>

							<div style="padding: 15px 20px;">
								<?php if($count_reviews=='0'){
									  echo '<span class="delivery-area">Be The First To Comment</span>';
								}
								else{	
								?>
								<a href="<?php echo $link->link('fooder&fooder_profile_token='.fooder_id,eaters,'&comments='.md5(base64_encode(fooder_id)));?>" class="see-all-rv">See All (<?php echo $count_reviews;?>)  - Users Review Board</a>
							    <?php }?>
							</div>
						</form>
					</div>
					<!-- review-box -->
					<br />
				</div>
				<!-- /content -->
			</div>

		</div>
		<!-- /col-7 -->
		<div class="col-2">
<h3 class="red center"><i class="icon icon-food"></i> Delicious Recipes</h3><br>
		<!-- Recipes in  Right Panel of fooder-->
		<?php 
		$db->order_by="rand() LIMIT 8";
		$get_recipes = $db->get_all('recipes',array(),array('id','eater_id','recipe_name','recipe_image','views'));
		foreach($get_recipes as $recipes_view){?>
		<a href="<?php echo $link->link('open_recipe_details','','&recipe_id='.$recipes_view['id']);?>"><div class="row-fluid">
		<div class="span12">
		<div class="row-fluid">
		<div class="span12">
		<div class="span10" style="padding-left:18px;">
		<b style="color:#000;"><?php echo $recipes_view['recipe_name'];?></b>
		
		</div>
		<div class="span2">
		<i class="icon-eye-open" rel="tooltip" data-placement="left" data-original-title="Views : <?php echo $recipes_view['views'];?>"></i>
		</div>
		</div>
		</div>
		<div class="kr-hr" style="margin-left: 18px;margin-right: 18px;"></div>
		<br>
		<div class="row-fluid center">
		<div class="span12">
		<img src="<?php echo SITE_URL.'/uploads/eaters/'.md5($recipes_view['eater_id']).'/recipes/'.$recipes_view['recipe_image'];?>" style="width: 180px;">
		</div>
		</div>
		<br>
		
		<div class="grey-hr"></div>
		
		
		</div>
		</div></a>
		<?php }?>
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

</div>


