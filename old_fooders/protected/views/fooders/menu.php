<?php echo $display_menu;?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo fmmen;?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small>
		</h1>
	</div>
	<!--/.page-header-->
	<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>" 
		name="menus" method="post" enctype="multipart/form-data">
		<input autocomplete="off" type="hidden" name="save_menu_ip"
			value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
			<?php if($edit_id){?>
			<input type="hidden" name="menu_id" value="<?php echo $get_menus['0']['id']; ?>">	
			<?php }?>
		<div class="row-fluid">
		
				
				<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<div class="span7">
					<div class="space-16"></div>
					<div class="control-group">
						<label class="control-label green" for="form-field-6"><b><?php echo fmn;?></b>
						</label>
						<div class="controls">
							<input autocomplete="off" name="menu_name" data-rel="tooltip"
								type="text" id="form-field-6" placeholder="Menu Name"
								value="<?php echo $get_menus['0']['name']; ?>" /> <span
								class="help-button-required" data-rel="popover"
								data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fmpopn;?>" title="<?php echo popr;?>">?</span>
						</div>
					</div>
					<div class="space-32"></div>
					<div class="control-group">
						<label class="control-label green" for="form-field-tags"><b> <?php echo fmt;?>
						</b></label>
						<div class="controls">
							<input autocomplete="off" type="text" class="span8"
								name="menu_tags" id="form-field-tags"
								value="<?php echo $get_menus['0']['tags']; ?>"
								placeholder="Enter Menu Tags ..." /> <span class="help-button"
								data-rel="popover" data-trigger="hover" data-placement="bottom"
								data-content="<?php echo fmpoptg;?>" title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<div class="space-32"></div>
					<div class="control-group">
						<label class="control-label green" for="form-field-1"><b><?php echo fmdes;?></b>
						</label>
						<div class="controls">
							<textarea class="span6 limited" id="form-field-9"
								data-maxlength="250" rows="3" name="description"><?php echo $get_menus['0']['description']; ?></textarea>
							<span class="help-button" data-rel="popover" data-trigger="hover"
								data-placement="bottom" data-content="<?php echo fmpopdesc;?>"
								title="<?php echo popb;?>">?</span>
						</div>
					</div>
					<div class="space-32"></div>
					<div class="control-group">
						<label class="control-label green"><b><?php echo fmst;?></b> </label>
						<div class="controls">
							<label class="span2"> <input autocomplete="off" name="status"
								class="ace-switch" type="checkbox"
								<?php if($get_menus['0']['status']=="1") echo "checked"; elseif($get_menus['0']['status']=="0"){} else echo "checked";?> />
								<span class="lbl"></span>
							</label> <label class="blue mini"> <?php echo fmcob;?></label>
						</div>
					</div>
				</div>
				<div class="span5">
				<?php
				
				$pathofimages = SERVER_ROOT . '/uploads/advertisements/';
				$gallery_images = glob ( $pathofimages . '*' );
				if (is_array ( $gallery_images ) && count ( $gallery_images ) !== 0) {
					?>
					<img
						src="<?php echo SITE_URL.'/uploads/advertisements/'.basename($gallery_images[(array_rand($gallery_images,1))]);?>">
						<?php }?>
			
				</div>
			</div>
			<div class="hr"></div>
			<div class="row-fluid">
				<div class="span12">
					<div class="form-actions">
						<button class="btn btn-large btn-info" type="submit"
							value="submit" name="save_menu">
							<i class="icon-ok bigger-110"></i> <?php echo fmbs;?>
						</button>
					</div>
				</div>
			</div>

		</div>
	</form>
</div>

