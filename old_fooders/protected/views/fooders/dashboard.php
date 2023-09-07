<?php
if ($session->check ( $_SESSION ) === FALSE) {
	
	$session->redirect ( 'login', fooders );
}
?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
							<?php echo fddas;?>
							<small> <i class="icon-double-angle-right"></i>
								<?php echo fdos;?>
							</small>
		</h1>
	</div>
	<!--/.page-header-->
	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
							<?php if(fooder_is_approved=='1'){?>
                             <div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>
				<i class="icon-warning-sign red"></i>
								<?php echo fdisapp;?>
							</div>							
							<?php }?>
							
							<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icon-remove"></i>
				</button>
				<i class="icon-ok green"></i>
								<?php echo fdwt;?>
								<strong class="green">
									<?php echo fdkf;?>
									<small>( <?php echo fdcp;?> )</small>
				</strong>
								<?php echo fdmop;?>
							</div>

			<div class="space-6"></div>

			<div class="row-fluid">
				<div class="span7 infobox-container">
					<div class="infobox infobox-green  ">
						<div class="infobox-icon">
							<i class="icon-heart"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo fooder_plan_name;?></span>
							<div class="infobox-content"><?php echo fdcup;?></div>
						</div>

					</div>

					<div class="infobox infobox-blue  ">
						<div class="infobox-icon">
							<i class="icon-list-alt tooltip-warning" data-rel="tooltip"
								data-placement="top" title=""
								data-original-title="<?php echo fdtm;?>"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo fooder_current_menus;?></span>
							<div class="infobox-content"><?php echo fdmc;?></div>
						</div>

						<div class="badge badge-primary">
											<?php
											echo $db->get_count ( 'fooders_menus', array ('status' => '1', 'fooder_id' => $fooder_id ) );
											?>
											<i class="icon-arrow-up green tooltip-success"
								data-rel="tooltip" data-placement="top" title=""
								data-original-title="<?php echo fdact;?>"></i>
											<?php echo $db->get_count('fooders_menus',array('status'=>'0','fooder_id'=>$fooder_id));?>
											<i class="icon-arrow-down red tooltip-error"
								data-rel="tooltip" data-placement="top" title=""
								data-original-title="<?php echo fdinact;?>"></i>
						</div>

					</div>

					<div class="infobox infobox-pink  ">
						<div class="infobox-icon">
							<i class="icon-food tooltip-warning" data-rel="tooltip"
								data-placement="top" title=""
								data-original-title="<?php echo fdtp;?>"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo fooder_current_products;?></span>
							<div class="infobox-content"><?php echo fddp;?></div>
						</div>
						<div class="badge badge-inverse ">
											<?php echo $db->get_count('fooders_products',array('status'=>'1','fooder_id'=>$fooder_id));?>
											<i class="icon-arrow-up green tooltip-success"
								data-rel="tooltip" data-placement="top" title=""
								data-original-title="<?php echo fdact;?>"></i>
											<?php echo $db->get_count('fooders_products',array('status'=>'0','fooder_id'=>$fooder_id));?>
											<i class="icon-arrow-down red tooltip-error"
								data-rel="tooltip" data-placement="top" title=""
								data-original-title="<?php echo fdinact;?>"></i>
						</div>
					</div>

					<div class="infobox infobox-red  ">
						<div class="infobox-icon">
							<i class="icon-calendar"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo date("d-M-Y",fooder_joining_date);?></span>
							<div class="infobox-content"><?php echo fdjo;?></div>
						</div>
					</div>

					<div class="infobox infobox-orange2  ">
						<div class="infobox-icon">
							<i class="icon-truck"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo fooder_selected_areas;?></span>
							<div class="infobox-content"><?php echo fdda;?></div>
						</div>

						<div class="badge badge-success">
											<?php echo number_format((float)((fooder_selected_areas/khateraho_selected_areas)*100), 2,'.','');?>%
											<i class="icon-arrow-up"></i>
						</div>
					</div>

					<div class="infobox infobox-blue2  ">
						<div class="infobox-progress">
							<div class="easy-pie-chart percentage"
								data-percent="<?php echo 100-number_format((float)(((fooder_allowed_menus+fooder_allowed_products+fooder_images_allowed)-(fooder_current_images+fooder_current_menus+fooder_current_products))/(fooder_allowed_menus+fooder_allowed_products+fooder_images_allowed)*100), 0, '.', '');?>"
								data-size="46">
								<span class="percent"><?php echo 100-number_format((float)(((fooder_allowed_menus+fooder_allowed_products+fooder_images_allowed)-(fooder_current_images+fooder_current_menus+fooder_current_products))/(fooder_allowed_menus+fooder_allowed_products+fooder_images_allowed)*100), 0 ,'.', '');?>%</span>

							</div>
						</div>

						<div class="infobox-data">
							<span class="infobox-text"><?php echo fdsu;?></span>

							<div class="infobox-content">
								<span class="bigger-110">~</span>
												<?php echo number_format((float)(((fooder_allowed_menus+fooder_allowed_products+fooder_images_allowed)-(fooder_current_images+fooder_current_menus+fooder_current_products))/(fooder_allowed_menus+fooder_allowed_products+fooder_images_allowed)*100), 0, '.', '');?>% remaining
											</div>
						</div>
					</div>

					<div class="space-6"></div>

					<div
						class="infobox infobox-green infobox-small infobox-dark tooltip-warning"
						data-rel="tooltip" data-placement="top" title=""
						data-original-title="<?php echo fdppc;?>">
						<div class="infobox-progress">
							<div class="easy-pie-chart percentage"
								data-percent="<?php echo $fooder_bar;?>" data-size="39">
								<span class="percent"><?php echo $fooder_bar;?></span> %
							</div>
						</div>

						<div class="infobox-data">
							<div class="infobox-content"><?php echo fdpro;?></div>
							<div class="infobox-content"><?php echo fdc;?></div>
						</div>
					</div>

					<div
						class="infobox infobox-blue infobox-small infobox-dark tooltip-info"
						data-rel="tooltip" data-placement="top" title=""
						data-original-title="<?php echo fdfmr;?>">
						<div class="infobox-icon">
							<i class="icon-star"></i>
						</div>
						<div class="infobox-data">
							<div class="infobox-data-number"><?php echo fooder_average_rating;?></div>
							<div class="infobox-content">
											<?php
											if (fooder_average_rating == 0) {
												echo "No Rating";
											} elseif (fooder_average_rating > 0 && fooder_average_rating <= 1) {
												echo fdbak;
											} elseif (fooder_average_rating > 1 && fooder_average_rating <= 2) {
												echo fdtps;
											} elseif (fooder_average_rating > 2 && fooder_average_rating <= 3) {
												echo fdkha;
											} elseif (fooder_average_rating > 3 && fooder_average_rating <= 4) {
												echo fdbin;
											} elseif (fooder_average_rating > 4 && fooder_average_rating <= 5) {
												echo fdjha;
											}
											?>
											
											</div>
						</div>
					</div>

					<div
						class="infobox infobox-grey infobox-small infobox-dark tooltip-success"
						data-rel="tooltip" data-placement="top" title=""
						data-original-title="<?php echo fdtcbe;?>">
						<div class="infobox-icon">
							<i class="icon-comments"></i>
						</div>

						<div class="infobox-data">
							<div class="infobox-data-number"><?php echo fooder_total_comments;?></div>
							<div class="infobox-content"><?php echo fdcom;?></div>
						</div>
					</div>
				</div>

				<div class="vspace"></div>

				<div class="span5">
					<div class="widget-box">
						<div class="widget-header widget-header-flat widget-header-small">
							<h5>
								<i class="icon-signal"></i>
												<?php echo fdds;?>
											</h5>

							<div class="widget-toolbar no-border">
								<span class="label label-minier label-primary dropdown-toggle"
									data-toggle="dropdown">
													<?php echo fdss;?>
												</span>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main">
								<div id="piechart-placeholder"></div>
							</div>
							<!--/widget-main-->
						</div>
						<!--/widget-body-->
					</div>
					<!--/widget-box-->
				</div>
				<!--/span-->
			</div>
			<!--/row-->

			<div class="hr hr32 hr-dotted"></div>
			<img
				src="<?php echo SITE_URL.'/assets/fooders/img/comingsoon.png';?>">
			<!--PAGE CONTENT ENDS-->
		</div>
		<!--/.span-->
	</div>
	<!--/.row-fluid-->
</div>
<!--/.page-content-->

