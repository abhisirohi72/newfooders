<?php
echo $displayimage;
?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo fimggal;?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small>
		</h1>
	</div>
	<!--/.page-header-->
	<div class="row-fluid">
		<div class="span12">
			<form method="post" action="<?php $_SERVER['PHP_SELF'];?>"
				enctype="multipart/form-data">
				<input autocomplete="off" type="hidden" name="save_gallery"
					value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
				<div class="control-group">
					<div class="controls">
						<input autocomplete="off" multiple type="file"
							id="id-input-file-3" name="file[]" /> <label> </label>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="center">
			<?php if(fooder_current_images==fooder_images_allowed && fooder_images_allowed!='-1'){?>
				<span class="bigger-120 red"><?php echo fimgyumnagi;?> (<?php echo fooder_images_allowed;?>)</span>	
				<?php
			
			} elseif (fooder_current_images > fooder_images_allowed) {
				?>
				<span class="bigger-120 red"><?php echo fimgmnoa;?> (<?php echo fooder_images_allowed;?>)<?php echo fimgpr;?> <?php echo (fooder_current_images-fooder_images_allowed)." ".fimgimta;?></span>	
				<?php
			
			} else {
				?>
				<button class="btn btn-info btn-large"
								id="<?php if($feature->getBrowser()!="IE") echo 'logo_sub';?>"
								name="save_image" type="submit">
								<i class="icon-camera"></i><?php echo fimgbsi;?></button>	
			<?php }?>
				<span class="blue" id="loader" style="display: none;"><i
								class='icon-spinner icon-spin blue bigger-200'></i> <?php echo fimgpi;?></span>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<ul class="ace-thumbnails">
				<?php
				
				foreach ( $gallery_images as $image ) {
					$imagename = basename ( $image );
					$explode = explode ( "___", $imagename );
					?>		
						<li>
						<div>
							<img style="width: 150px; height: 100px;"
								src="<?php echo SITE_URL.'/uploads/fooders/'.$fooder_id.'/gallery/'.basename($image);?>">
							<div class="text">
								<div class="inner">
									<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
										<a
											href="<?php echo SITE_URL.'/uploads/fooders/'.$fooder_id.'/gallery/'.basename($image);?>"
											data-rel="colorbox"> <i class="icon-zoom-in"></i>
										</a> <input autocomplete="off" type="hidden"
											name="del_imagename"
											value="<?php echo SERVER_ROOT.'/uploads/fooders/'.$fooder_id.'/gallery/'.$imagename;?>">

										<button type="submit" name="del_image"
											class="btn btn-danger btn-mini ">
											<i class="icon-ban-circle"></i><?php echo fimgbd;?></button>


									</form>
								</div>
							</div>
						</div>
						<?php if($explode[1]==1){?>
						 <a class="progress progress-success progress-striped"
						data-percent=""
						href="<?php echo $session->link('image_gallery',fooders,'?'.$imagename.'='.$explode[1]);?>">
								<?php echo '<div class="bar" style="width: 100%;"><i data-rel="tooltip" data-placement="top" title="" data-original-title="'.fimgctd.'" class="icon-hand-down"></i>'.fimgact.'</div>'; ?>
								 </a> 
						<?php }else{?>
						<a class="progress progress-danger progress-striped"
						data-percent=""
						href="<?php if( fooder_current_images<=fooder_images_allowed) echo $session->link('image_gallery',fooders,'?'.$imagename.'='.$explode[1]);?>">
								<?php echo '<div class="bar" style="width: 100%;"><i data-rel="tooltip" data-placement="top"  data-original-title="'.fimgcta.'" class="icon-hand-up"></i>'.fimgiact.'</div>'; ?>
								 </a>
						<?php }?>		 		 
					</li>
				<?php }?>	
				</ul>
			</div>
			<!--PAGE CONTENT ENDS-->
		</div>
		<!--/.span-->
	</div>
	<!--/.row-fluid-->
</div>
<!--/.page-content-->

