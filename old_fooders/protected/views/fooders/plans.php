<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			Khateraho Plans <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small> <small class="nav-search"> <span
				class="label label-large label-pink arrowed-right"><i
					class="icon-fire"></i> Your Current Plan : <?php echo fooder_plan_name; ?></span>
			</small>
		</h1>
	</div>
	<!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<div class="span3 pricing-span-header">
					<div class="widget-box transparent">
						<div class="widget-header">
							<h5 class="bigger-150">
								<i class="icon-book  blue"></i> Plan Name
							</h5>
						</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
								<ul class="unstyled list-striped pricing-table-header">
									<li><i class="icon-comments bigger-110 blue"></i><b
										class="grey"> Comments &amp; Reviews </b></li>
									<li><i class="icon-ok bigger-110 blue"></i><b class="grey">
											Verified Eaters</b></li>
									<li><i class="icon-camera bigger-110 blue"></i><b class="grey">
											Khateraho Exposure</b></li>
									<li><i class="icon-star bigger-110 blue"></i><b class="grey">
											Number Of Menus</b></li>
									<li><i class="icon-food bigger-110 blue"></i><b class="grey">
											Number Of Dishes/Products</b></li>
									<li><i class="icon-shopping-cart bigger-110 blue"></i><b
										class="grey"> Ordering Facility</b></li>
									<li><i class="icon-picture bigger-110 blue"></i><b class="grey">
											Number Of Images In Gallery</b></li>
									<li><i class="icon-user bigger-110 blue"></i><b class="grey">
											Staff Manager</b></li>
									<li><i class="icon-tags bigger-110 blue"></i><b class="grey">
											Coupons/Offers</b></li>
									<li><i class="icon-bookmark bigger-110 blue"></i><b
										class="grey"> Table Booking</b></li>
									<li><i class="icon-mobile-phone bigger-150 blue"></i><b
										class="grey"> Sms Notifications</b></li>
									<li><i class="icon-phone bigger-110 blue"></i><b class="grey">
											Call Notifications</b></li>
									<li><i class="icon-copy bigger-110 blue"></i><b class="grey">
											Indepth Order Reports</b></li>
									<li><i class="icon-file bigger-110 blue"></i><b class="grey">
											Specialized Reports</b></li>
									<li><i class="icon-inr bigger-110 blue"></i><b class="grey">
											Price Per Month</b></li>

								</ul>
							</div>
						</div>
					</div>
				</div>
						<?php
						
						$planarray = $db->get_all ( 'fooders_plans' );
						
						$p = array_shift ( $planarray );
						
						foreach ( $planarray as $plansdetails ) {
							$plansdetails ['plan_name'] = $fv->removespace ( $plansdetails ['plan_name'] );
							?>
								<div class="span2 pricing-span">
					<div class="widget-box pricing-box-small">
									<?php
							
							if ($plansdetails ['plan_name'] == 'Free')
								echo '<div class="widget-header header-color-red3">';
							elseif ($plansdetails ['plan_name'] == 'Silver')
								echo '<div class="widget-header header-color-orange">';
							elseif ($plansdetails ['plan_name'] == 'Gold')
								echo '<div class="widget-header header-color-blue">';
							
							elseif ($plansdetails ['plan_name'] == 'Platinum')
								echo '<div class="widget-header header-color-green">';
							
							elseif ($plansdetails ['plan_name'] == 'King')
								echo '<div class="widget-header header-color-purple">';
							?>
											<h5 class="bigger lighter">
							<i class="icon-gift"></i><?php echo $plansdetails['plan_name']?> Plan</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<ul class="unstyled list-striped pricing-table">
								<li>
												<?php
							
							if ($plansdetails ['comments_reviews'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['veryfied_eaters'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['khateraho_exposure'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li class="blue"><?php if($plansdetails['number_of_menus']=='500') echo "Unlimited"; else echo $plansdetails['number_of_menus'];?></li>
								<li class="blue"><?php if($plansdetails['number_of_products']=='500') echo "Unlimited"; else echo $plansdetails['number_of_products'];?></li>
								<li>
												<?php
							
							if ($plansdetails ['ordering_facility'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li class="blue"><?php if($plansdetails['number_of_images']=='500') echo "unlimited"; else echo $plansdetails['number_of_images'];?></li>


								<li>
												<?php
							
							if ($plansdetails ['staff_manager'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['coupons'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['table_booking'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['sms_notifications'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['call_notifications'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['order_reports'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>
								<li>
												<?php
							
							if ($plansdetails ['specialized_reports'] === '1')
								echo '<i class="icon-ok green"></i>';
							else
								echo '<i class="icon-remove red"></i>';
							?>
												 </li>

							</ul>

							<div class="price">
								<span
									class="label label-large label-inverse arrowed-in arrowed-in-right">
									<i class="icon-inr"></i> <?php echo $plansdetails['price'];?>
														<small>/month</small>
								</span>
							</div>
						</div>

						<div>
											
											<?php
							
							if ($plansdetails ['plan_name'] == 'Free')
								echo '<a href="#" class="btn btn-block btn-small btn-danger">
													<span>FREE</span>
												</a>';
							elseif ($plansdetails ['plan_name'] == 'Silver')
								echo '<a href="#" class="btn btn-block btn-small btn-warning">
													<span><i class="icon-shopping-cart"></i> PURCHASE</span>
												</a>';
							elseif ($plansdetails ['plan_name'] == 'Gold')
								echo '<a href="#" class="btn btn-block btn-small btn-primary">
													<span><i class="icon-shopping-cart"></i> PURCHASE</span>
												</a>';
							
							elseif ($plansdetails ['plan_name'] == 'Platinum')
								echo '<a href="#" class="btn btn-block btn-small btn-success">
													<span><i class="icon-shopping-cart"></i> PURCHASE</span>
												</a>';
							
							elseif ($plansdetails ['plan_name'] == 'King')
								echo '<a href="#" class="btn btn-block btn-small btn-purple">
													<span><i class="icon-shopping-cart"></i> PURCHASE</span>
												</a>';
							?>
												
											</div>
					</div>
				</div>
			</div>
<?php }?>
	</div>
	</div>
</div>
