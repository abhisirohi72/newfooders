<div class="wrapper">
	<div class="row-fluid kr-row-fluid">
		<div class="span12 review-margin">
            <?php require SERVER_ROOT.'/protected/setting/eaters/eater_sidebar.php';?>
            <div class="span8 kr-span">
             <div class="row-fluid">
            <div class="span12">
            <div class="span5"><h3>Reviews Posted By You </h3></div>
            <div class="span7"></div>
            </div>
         </div> 
         <div class="kr-hr"></div>  
            
               	<div id='content'>
				<?php
				
		    if (is_array ($get_all_reviews) && count($get_all_reviews)!==0) {
		    
			foreach ($get_all_reviews as $key) {
				$fooder_id = $key ['fooder_id'];
				$get_name_logo = $db->run ( "SELECT f.name, fd.average_reviews, fd.number_of_reviews, fd.logo  FROM `fooders` AS f LEFT JOIN `fooders_details` As fd ON fd.fooder_id=f.fooder_id
							WHERE f.fooder_id=$fooder_id" )->fetchAll ();
				?>
				<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
			    <input type="hidden" name="review_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
				<input type="hidden" name="fooder_id" value="<?php echo $fooder_id;?>">
				<input type="hidden" name="average_reviews" value="<?php echo $get_name_logo['0']['average_reviews'];?>">
				<input type="hidden" name="number_of_reviews" value="<?php echo $get_name_logo['0']['number_of_reviews'];?>">
				<input type="hidden" name="average" value="<?php echo $key['average'];?>">
				<input type="hidden" name="comment_id" value="<?php echo $key['id'];?>">
				<input type='hidden' id='current_page' />
				<input type='hidden' id='show_per_page' />
			
				<div class="dialogs">
						<div class="itemdiv dialogdiv">
							<div class="user">
								<img id="image" rel="tooltip"
									data-original-title="<?php echo $get_name_logo['0']['name'];?>"
									data-placement="top"
									src="<?php echo SITE_URL.'/uploads/fooders/'.$fooder_id.'/logo/'.$get_name_logo['0']['logo'];?>">
							</div>
							<div class="body">
							    <div class="row-fluid">
							    <div class="span12 krlabel">
							    <a href="<?php echo $link->link('fooder','','&fooder_profile_token='.$fooder_id);?>" target="_blank"><h3><?php echo $get_name_logo['0']['name'];?></h3></a>
							    </div>
							    </div>
							    <div class="review-hr-total"></div>
								<div class="row-fluid">
									<div class="span12">
										<div class="span3">
								<?php if($key['average']>0 && $key['average']<=1){?>
                         <img
												src="<?php echo SITE_URL.'/assets/eaters/img/rating/Bakwaas.jpg';?>"
												rel="tooltip"
												data-original-title="Average Rating : <?php echo round($key['average'],1); ?>"
												data-placement="top" />
                         <?php } elseif ($key['average']>1 && $key['average']<=2){?>
                         <img
												src="<?php echo SITE_URL.'/assets/eaters/img/rating/Timepass.jpg';?>"
												rel="tooltip"
												data-original-title="Average Rating : <?php echo round($key['average'],1); ?>"
												data-placement="top" />
                         <?php } elseif ($key['average']>2 && $key['average']<=3){?>
                         <img
												src="<?php echo SITE_URL.'/assets/eaters/img/rating/Khaas.jpg';?>"
												rel="tooltip"
												data-original-title="Average Rating : <?php echo round($key['average'],1); ?>"
												data-placement="top" />
                         <?php } elseif ($key['average']>3 && $key['average']<=4){?>
                         <img
												src="<?php echo SITE_URL.'/assets/eaters/img/rating/Bindaas.jpg';?>"
												rel="tooltip"
												data-original-title="Average Rating : <?php echo round($key['average'],1); ?>"
												data-placement="top" />
                         <?php } elseif ($key['average']>4 && $key['average']<=5){?>
                         <img
												src="<?php echo SITE_URL.'/assets/eaters/img/rating/Jhakaas.jpg';?>"
												rel="tooltip"
												data-original-title="Average Rating : <?php echo round($key['average'],1); ?>"
												data-placement="top" />
                         <?php } ?>
                          </div>
										<div class="span2 review-rate">
											<label class="label label-warning center" rel="tooltip"
												data-original-title="Speed Rating By You : <?php echo round($key['speed'],1); ?>"
												data-placement="top">SPEED : <?php echo $key['speed'];?></label>
										</div>
										<div class="span2 review-rate">
											<label class="label label-success center" rel="tooltip"
												data-original-title="Taste Rating By You : <?php echo round($key['taste'],1); ?>"
												data-placement="top">TASTE : <?php echo $key['taste'];?></label>
										</div>
										<div class="span2 review-rate">
											<label class="label label-info center" rel="tooltip"
												data-original-title="Service Rating By You : <?php echo round($key['service'],1); ?>"
												data-placement="top">SERVICE : <?php echo $key['service'];?></label>
										</div>
										<div class="span3 review-rate" rel="tooltip" data-original-title="Review Posted On" data-placement="top">
											<i class="icon-calendar"></i> <?php echo date("d M Y",strtotime($key['timestamp']));?>
										</div>
									</div>
								</div>
								<div class="review-hr-total"></div>
								<div class="row-fluid">
									<div class="span12 krlabel ">
							<?php if($key['comment']!=='') echo $key['comment'];else echo "<h3 class='center'>No Comment</h3>"?>
							</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<div class="span10"></div>
										<div class="span2 tools" style="text-align: right;">
											<a href="<?php echo $link->link('reviews_edit?edit_id='.$key['id'],eaters);?>" class="btn btn-minier btn-success"
												rel="tooltip" data-original-title="Edit"
												data-placement="top"><i class="icon-edit"></i></a>
												
												<button name="review_delete" class="btn btn-minier btn-danger" rel="tooltip" data-original-title="Delete" data-placement="top"><i
												class="icon-trash"></i></button>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
						
					</div>
					</form>
				<?php }}?>
				</div>
				<?php 
							
				if(is_array($get_all_reviews) && count($get_all_reviews)!==0  && count($get_all_reviews)!==NULL){?>
                <div class="row">
            
					<p class="page-no" id='page_navigation'></p>
				</div>
                <?php }
                else{
                	echo "<div class='fooder-not-search'>No Reviews</div>";
                }?>
			
			</div>
			
		</div>
		
	</div>
	
</div>
<!-- /wrapper -->
