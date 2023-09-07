<div class="wrapper">
	<div class="row-fluid kr-row-fluid">
		<div class="span12">
            <?php require SERVER_ROOT.'/protected/setting/eaters/eater_sidebar.php';?>
            <div class="span8 kr-span">
            
            <div class="row-fluid">
            <div class="span12">
            <div class="span6"><h3>Edit Your Review And Rating</h3></div>
            <div class="span6"><?php echo $display_review;?></div>
            </div>
             </div> 
         <div class="kr-hr"></div> 
         <div class="row-fluid">
         <div class="span12">
         <h3 class="review-fooder"><?php echo $get_fooder_name['0'];?></h3>
         </div>
         </div> 
  			<div class="content kr-span">
					<div class="review-box">
						<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
							<input type="hidden" name="review_edit_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
							
							<div class="row-fluid">
							<div class="span12">
										<div class="box2">
											<h4 class="sub-head">1) Provide Rating :</h4>
											<div class="row-fluid">
												<div class="span12" style="margin-top: 20px;">
													<div class="span2">
														<span class="rate-title">SPEED</span>
													</div>
													<div class="span10" style="padding-left: 23px;">
														<input autocomplete="off" id="input-5a"
															name="speed" type="number" class="rating" data-size="xs" value="<?php echo $get_reviews['speed'];?>">
													</div>
												</div>
											</div>

											<div class="row-fluid">
												<div class="span12" style="margin-top: 10px;">
													<div class="span2">
														<span class="rate-title">TASTE</span>
													</div>
													<div class="span10" style="padding-left: 23px;">
														<input autocomplete="off" id="input-5a"
															name="taste" type="number" class="rating" data-size="xs" value="<?php echo $get_reviews['taste'];?>">
													</div>
												</div>
											</div>

											<div class="row-fluid">
												<div class="span12" style="margin-top: 10px;">
													<div class="span3">
														<span class="rate-title">SERVICE</span>
													</div>
													<div class="span9">
														<input autocomplete="off" id="input-5a"
															name="service" type="number" class="rating"
															data-size="xs" value="<?php echo $get_reviews['service'];?>">
													</div>
												</div>
											</div>
										</div>
							</div>
							</div>
						<br>
							<div class="row-fluid">
								<div class="span12">
										<div class="box1" style="padding:0px;">
											<div class="fltlft">
												<h4 class="sub-head">2) Edit your review :</h4>
												<p class="rv-note">
													(Please do not include: HTML, <br>references to other retailers,<br> pricing, personal information,<br> any profane, inflammatory or<br> copyrighted comments,<br> or any copied content.)
												</p>
											</div>
											<textarea name="comment"
												class="rv-textar textarea" minlength="50"><?php echo $get_reviews['comment'];?></textarea>

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
								<div class="span6"></div>
								<div class="span2">
										<button type="submit" name="review_save">
											<i class="icon-ok"></i> Save
										</button>
										</div>
										<div class="span4">
										<a href="<?php echo $link->link('reviews',eaters);?>" class="kr-button-warning">
											<i class="icon-reply icon-only"></i> Back To Review
										</a>
										</div>
										
									</div>
								</div>
						</form>
					</div>
					<!-- review-box -->
			</div>
				<!-- /content -->
			
         			
			</div>
			
		</div>
		
	</div>
	
</div>
<!-- /wrapper -->

