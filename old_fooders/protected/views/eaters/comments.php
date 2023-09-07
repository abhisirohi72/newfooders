			<div class="row-fluid">
			<div class="span12">
			<h4 class='rest-menu-title'><i class='icon-comment fooder-menu-icon'></i>Comments</h4>
			</div>
			</div>			
			<div class="hr-menu"></div>
			<?php
			
			 if(is_array($get_all_comments)){
			foreach($get_all_comments as $comments){
				?>
			<div class="dialogs">
						<div class="itemdiv dialogdiv">
							<div class="user">
								<img id="image" src="<?php echo SITE_URL.'/uploads/eaters/'.md5($comments['eater_id']).'/pictures/selfie.jpg';?>" style="max-width:50px;height:50px;">
							
							<span class="desc-open-recipe"> <?php echo date ( 'd/m/y', strtotime($comments['timestamp']));?></span>
							
							</div>
							<div class="body" style="margin-left:62px;">
							<div class="row-fluid">
							    <div class="span12">
							    <div class="span8">
							    <h3><?php echo '<span rel="tooltip" data-placement="top" data-original-title="Eater Name">'.$comments['name'].'</span>';?></h3>
							   </div>
							   <div class="span4">
							   <div class="comment-rating right-float" data-average="<?php echo round($comments['average'],1);?>" data-id="2" data-rel="popover" data-trigger="hover" data-placement="left" 
							   data-content="<?php echo '<b>Service &nbsp;:</b> '.round($comments['service'],1).' Stars <br><b>Taste &nbsp;&nbsp;&nbsp; &nbsp;: </b>'.round($comments['taste'],1).' Stars <br> <b>Speed &nbsp;&nbsp;&nbsp: </b>'.round($comments['speed'],1).' Stars';?>" title="Rated : <?php echo round($comments['average'],1);?> Stars"></div>
							   </div>
							    </div>
							    </div>
							    <div class="review-hr-total"></div>
							
								<div class="row-fluid">
									<div class="span12">
									<span class="desc-open-recipe"><?php echo html_entity_decode($comments['comment'],ENT_QUOTES,"UTF-8");?></span>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="grey-com-hr"></div>
				<?php }}?>	
	            <div class="srch-paging" style="border-top:none;border-bottom:none;">
 		<?php $tot_comments=$db->get_count('eaters_comments',array('fooder_id'=>fooder_id));
 		
 		if($page_no==0) 
 			$page_no=1; 
 		
 		$upto_results=$page_no+show_results_per_page-1;
 		if($upto_results>$tot_comments) 
 			$upto_results=$tot_comments;
 		
 		?>
                                	<div class="row">
                                        	
                                            <p class="page-no">
                                            <?php if(($_REQUEST['page_no']-1)>0)
                                               		echo '<a href="'.$link->link('fooder&fooder_profile_token='.fooder_id.'&comments='.md5(base64_encode(fooder_id)),eaters,'&page_no='.($_REQUEST['page_no']-1)).'">Previous</a>';
                                               		?>
                                                
                                               <?php if($_REQUEST['page_no']-2>0) 
                                                echo '<a href="'.$link->link('fooder&fooder_profile_token='.fooder_id.'&comments='.md5(base64_encode(fooder_id)),eaters,"&page_no=".($_REQUEST['page_no']-2)).'">'.($_REQUEST['page_no']-2).'</a>';
                                                ?>
                                                <?php if($_REQUEST['page_no']-1>0) 
                                                echo '<a href="'.$link->link('fooder&fooder_profile_token='.fooder_id.'&comments='.md5(base64_encode(fooder_id)),eaters,"&page_no=".($_REQUEST['page_no']-1)).'">'.($_REQUEST['page_no']-1).'</a>';
                                                ?>
                                                <a href="#" class="active_page"><?php if($_REQUEST['page_no']>0) echo $_REQUEST['page_no']; else echo "1" ;?></a>
                                                 <?php if(isset($_REQUEST['page_no']) && $_REQUEST['page_no']+1<=ceil($tot_comments/show_results_per_page)) 
                                                echo '<a href="'.$link->link('fooder&fooder_profile_token='.fooder_id.'&comments='.md5(base64_encode(fooder_id)),eaters,"&page_no=".($_REQUEST['page_no']+1)).'">'.($_REQUEST['page_no']+1).'</a>';
                                                ?>
                                                <?php if($_REQUEST['page_no']+2<ceil($tot_comments/show_results_per_page)) 
                                                echo '<a href="'.$link->link('fooder&fooder_profile_token='.fooder_id.'&comments='.md5(base64_encode(fooder_id)),eaters,"&page_no=".($_REQUEST['page_no']+2)).'">'.($_REQUEST['page_no']+2).'</a>';
                                                ?>
                                                <?php if($_REQUEST['page_no']+3<ceil($tot_comments/show_results_per_page)) 
                                                echo '...';
                                                ?>
                                                
                                               	<?php if(($_REQUEST['page_no']+1)<=ceil($tot_comments/show_results_per_page)) 
                                               		echo '<a href="'.$link->link('fooder&fooder_profile_token='.fooder_id.'&comments='.md5(base64_encode(fooder_id)),eaters,'&page_no='.($_REQUEST['page_no']+1)).'">Next</a>';
                                               		?>
                                              
                                            </p>
                                        </div>
                                    </div>
 			