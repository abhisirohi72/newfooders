<?php echo $display_product; ?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo fppro;?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>

			</small>
		</h1>
	</div>
	<!--/.page-header-->
	<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>"
		name="products" method="post" enctype="multipart/form-data">
		<input autocomplete="off" type="hidden" name="save_product_ip"
			value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
				<?php if($edit_id){?>
	<input type="hidden" name="product_id" value="<?php echo $get_product['0']['id']; ?>">	
	<?php }?>
		<div class="row-fluid">

			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
					
					<div class="span6">
					<div class="control-group">
						<label class="control-label green" for="form-field-1"><b><?php echo fpmc;?></b></label>
						<div class="controls">
							<select name="menus" class="chzn-select" id="form-field-select-3"
								data-placeholder="<?php echo fpcm;?>">
								<option value=""></option>
									<?php
									foreach ( $get_menu as $key ) {
										?>
									<option
									class="<?php if($key['status']=='0'){echo "label label-important";}?>" value="<?php echo $key['id'];?>"
									<?php if(($key['id']==$get_product['0']['menu_id']) || $key['id']==$menu_id) echo "selected"; ?>><?php  echo $key['name'];?></option>
									<?php } ?>
								</select> <span class="help-button-required" data-rel="popover"
								data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fppopmc;?>" title="<?php echo popr;?>">?</span>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label green" for="form-field-6"><b> <?php echo fpnam;?></b>
						</label>
						<div class="controls">
							<input autocomplete="off" name="product_name" type="text"
								id="form-field-6" placeholder="Product Name"
								value="<?php if($edit_id) echo $get_product['0']['name'];else echo $product_name; ?>" /> <span
								class="help-button-required" data-rel="popover"
								data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fppoppn;?>" title="<?php echo popr;?>">?</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label green" for="form-field-6"><b> <?php echo fpsecname;?></b>
						</label>
						<div class="controls">
						<select name="product_type" class="form-control" id="form-field-select-3">
								<option value=""></option>
								<option class="" value="0" <?php if((isset($edit_id) && $get_product['0']['product_type']=='0') || $product_type=='0') echo "selected"; ?>><?php  echo fpsecoptveg;?></option>
								<option class="" value="1" <?php if((isset($edit_id) && $get_product['0']['product_type']=='1') || $product_type=='1') echo "selected"; ?>><?php  echo fpsecoptnonveg;?></option>
								</select> <span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fpsec;?>" title="<?php echo popr;?>">?</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label green" for="form-field-6"><b> Time for preparation</b>
						</label>
						<div class="controls">
						<select name="preparation_time" class="form-control" id="form-field-select-3">
							    <?php 
								foreach (range(5, 60, 5) as $pt) {
									?>
									<option value="<?php echo $pt; ?>" <?php if($get_product['0']['preparation_time']==$pt) echo "selected"; ?>><?php echo $pt; ?></option>
							<?php }?>
								</select> 
								<span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="select dish preparation time in minutes" title="<?php echo popr;?>">?</span>
						</div>
					</div>
					
					
					<div class="control-group">
						<label class="control-label green" for="form-field-1"><b><?php echo fppr;?></b>
						</label>
						<div class="controls">
							<div class="input-append">
								<input autocomplete="off" class="input-medium" type="text"
									name="price" value="<?php if(isset($edit_id)) echo $get_product['0']['price']; else echo $price; ?>">
								<span class="btn btn-small btn-info"> <i class="icon-inr"></i> </span>
							</div>
							<span class="help-button-required" data-rel="popover"
								data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fppoppr;?>" title="<?php echo popr;?>">?</span>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label green" for="form-field-1"><b><?php echo fpprp;?></b></label>
						<div class="controls">
							<div class="input-append">
								<input autocomplete="off" class="input-medium" type="text"
									name="proprice"
									value="<?php if(isset($edit_id)) echo $get_product['0']['proprice']; else echo $proprice; ?>"> <span
									class="btn btn-small btn-info"> <i class="icon-inr"></i> </span>
							</div>
							<span class="help-button" data-rel="popover" data-trigger="hover"
								data-placement="bottom" data-content="<?php echo fppoppmpr;?>"
								title="<?php popb;?>">?</span>
						</div>
					</div>
					
												<div class="control-group">
												<label class="control-label green" for="form-field-1"><b>Rank</b></label>
												<div class="controls">
												<div class="checkbox inline" style="padding-left:0px;">
													<label>
														<input name="top_rated" type="checkbox" class="ace ace-checkbox-2" value="1" <?php if(isset($edit_id) && $get_product['0']['top_rated']=='1') echo 'checked'; elseif($top_rated=='1') echo 'checked'; ?>>
														<span class="lbl"> Top Rated</span>
													</label>
												</div>

												<div class="checkbox inline">
													<label>
														<input name="most_ordered" type="checkbox" class="ace ace-checkbox-2"  value='1' <?php if(isset($edit_id) && $get_product['0']['most_ordered']=='1') echo 'checked'; elseif($most_ordered=='1') echo 'checked'; ?>>
														<span class="lbl"> Most Ordered</span>
													</label>
												</div>

												<div class="checkbox inline">
													<label>
														<input name="best_seller" class="ace ace-checkbox-2" type="checkbox"  value='1' <?php if(isset($edit_id) && $get_product['0']['best_seller']=='1') echo 'checked'; elseif($best_seller=='1') echo 'checked'; ?>>
														<span class="lbl"> Best Seller</span>
													</label>
												</div>
													</div>			
											</div>


					<div class="control-group">
						<label class="control-label green" for="form-field-1"><b><?php echo fpst;?></b></label>
						<div class="controls">
							<input autocomplete="off" name="status"
								class="ace-switch ace-switch-3" type="checkbox"
								<?php if($get_product['0']['status']=='1') echo "checked"; elseif($get_product['0']['status']=='0'){} else echo "checked";?>>
							<span class="lbl"></span>
						</div>
					</div>
					
				</div>
				<div class="span6">
				<div class="control-group">
						<label class="control-label green" for="form-field-tags"><b> <?php echo fptag;?></b></label>
						<div class="controls">
							<input autocomplete="off" type="text" name="product_tags"
								id="form-field-tags"
								value="<?php if(isset($edit_id)) echo $get_product['0']['tags']; else echo $product_tags; ?>"
								placeholder="Enter tags ..." /> <span class="help-button"
								data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fppoptg;?>" title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<?php if($edit_id){?>
					<div class="control-group">
													<div class="controls">
													<?php
													if ($get_product['0']['picture'] != '' ) {
														?>
													<img alt="Dish Image"
															src="<?php echo SITE_URL . "/uploads/fooders/" . $fooder_id . "/product/" . $get_product['0']['picture'] .'?'.rand(1,10); ?>" style="width: 100px; height: auto;">
													<?php }else{?>
													<img alt="Dish Image" src="<?php echo SITE_URL.'/assets/fooders/img/noimage.png'?>" style="width: 100px; height: auto;">
													<?php }?>
													</div>
												</div>
												<?php } ?>
												<div class="control-group" style="margin-bottom:0px;">
													<label class="control-label green" for="form-field-1"><b><?php echo fpdisimage;?></b></label>
													<div class="controls">
													<label class="span4"><input autocomplete="off"
															type="file" name="file" class="input-medium" id="id-input-file-2" /></label>
														&nbsp; &nbsp; 
														<span class="help-button" data-rel="popover"
								data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fpdishvalidimage;?>" title="<?php echo popb;?>">?</span>
													</div>
												</div>
												<div class="control-group">
						<label class="control-label green" for="form-field-1"><b>Description</b></label>
						<div class="controls">
						<textarea name="description" rows="5"><?php if(isset($edit_id)) echo $get_product['0']['description']; else echo $description; ?></textarea>	
						</div>
					</div>

				</div>
				<!-- <div class="span5">
				<?php
				
				$pathofimages = SERVER_ROOT . '/uploads/advertisements/';
				$gallery_images = glob ( $pathofimages . '*' );
				if (is_array ( $gallery_images ) && count ( $gallery_images ) !== 0) {
					?>
					<img
						src="<?php echo SITE_URL.'/uploads/advertisements/'.basename($gallery_images[(array_rand($gallery_images,1))]);?>">
						<?php }?>
				</div> -->
			</div>
			<div class="hr"></div>
			<div class="row-fluid">
				<div class="span12">
					<div class="form-actions">
						<button class="btn btn-large btn-info" type="submit"
							value="submit" name="save_products">
							<i class="icon-ok bigger-110"></i> <?php echo fpbs;?>
						</button>
					</div>
				</div>
			</div>

		</div>
	</form>
</div>

