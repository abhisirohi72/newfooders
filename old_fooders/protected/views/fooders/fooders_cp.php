<?php /*<div id="viewmap" class="modal hide fade in" style="display: none;">
	<iframe scrolling="no"
		src="<?php echo $link->link('foodermap',fooders);?>"
		class="row-fluid span12"
		style="width: 550px; height: 550px; border: 0px; margin: 0px;"> </iframe>
	<div class="center purple"><?php echo fcpcotc;?></div>
</div>
  */ ?>
<?php
echo $display_fooders_cp;
?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo fcpf; ?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1); ?>
			</small>
		</h1>
	</div>

	<!--/.page-header-->
	<div class="row-fluid">

		<div class="span12">
			<div id="user-profile-3" class="user-profile row-fluid">
				<div class="offset1 span12" style="margin: 0px;">
					<!-- <div class="well well-small">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						&nbsp;
						<div class="inline middle blue bigger-110">
							<?php
							if ($fooder_bar < 50)
								echo fcpcer . " " . $fooder_bar . " " . fcpcypgme;
							elseif ($fooder_bar < 70 && $fooder_bar >= 50)
								echo fcpyanc . " " . $fooder_bar . " " . fcpecyptgme;
							else
								echo fcpcyarm;
							?>
								</div>
						&nbsp; &nbsp; &nbsp;
						<div style="width: 100%;"
							data-percent="<?php echo $fooder_bar; ?>%"
							class="inline middle no-margin progress
								<?php
								if ($fooder_bar < 50)
									echo fcppd;
								elseif ($fooder_bar < 70 && $fooder_bar >= 50)
									echo fcppi;
								else
									echo fcpps;
								?> progress-striped active">
							<div class="bar" style="width: <?php echo $fooder_bar; ?>%"></div>
						</div>
					</div> -->
					<!--/well-->
					<div class="space"></div>
					<div class="tabbable">
						<ul class="nav nav-tabs padding-16">
							<li class="<?php if ($tab == 'tab-1') echo fcpact; ?>"><a data-toggle="tab" href="#edit-basic"> <i class="blue icon-edit bigger-230"></i> <?php echo fcpfbp; ?>
								</a></li>
							<li class="<?php if ($tab == 'tab-2') echo fcpact; ?>"><a data-toggle="tab" href="#edit-settings"> <i class="red icon-cog bigger-230"></i> <?php echo fcpfss; ?>
								</a></li>
							<li class="<?php if ($tab == 'tab-3') echo fcpact; ?>"><a data-toggle="tab" href="#delivery"> <i class="orange icon-truck bigger-230"></i> <?php echo fcpfdr; ?>
								</a></li>


							<li class="<?php if ($tab == 'tab-4') echo fcpact; ?>"><a data-toggle="tab" href="#delivery_charges"> <i class="orange icon-money bigger-230"></i> Delivery Charges
								</a></li>
					
						</ul>
						<div class="tab-content profile-edit-tab-content" style="overflow: hidden;">
							<div id="edit-basic" class="tab-pane in <?php if ($tab == 'tab-1') echo fcpact; ?>">
								<h3 class="blue">
									<?php echo fcpbbd; ?>
								</h3>
								<div class="hr"></div>
								<form class="form-horizontal" name="details1" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
									<input autocomplete="off" type="hidden" name="fooders_details1" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']); ?>" />
									<input autocomplete="off" type="hidden" name="old_location_id" value="<?php echo fooder_location; ?>" /> <input autocomplete="off" type="hidden" value="tab-1" name="tab">
									<div class="row-fluid">
										<div class="span6">
											<?php
											$started_date = date("d M Y", strtotime(fooder_started_on));
											?>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6"><?php echo fcpbfn; ?></label>
												<div class="controls">
													<input autocomplete="off" name="fooders_name" data-rel="tooltip" type="text" id="form-field-6" placeholder="Fooders Name" value="<?php echo fooder_name; ?>" /> <span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpbpopfn; ?>" title="<?php echo popr; ?>">?</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6"><?php echo fcpbso; ?></label>
												<div class="controls">
													<div class="row-fluid input-append">
														<input autocomplete="off" name="started_on" class="date-picker" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $started_date; ?>"> <span class="add-on"> <i class="icon-calendar"></i>
														</span>
													</div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label grey" for="form-field-1"><?php echo fcpbm; ?>
												</label>
												<div class="controls">
													<div class="input-prepend">
														<span class="add-on"> <i class="icon-mobile-phone"></i>
															&nbsp;+91
														</span> <input autocomplete="off" name="mobile"  class="input-medium" type="text" placeholder="Mobile" id123="form-field-mask-2" id="fooderMobile" value="<?php echo fooder_mobile; ?>">
													</div>

													<span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpbpopmb; ?>" title="<?php echo popr; ?>">?</span>
												</div>
											</div>
											<?php if(fooder_upi_address!=""){ ?>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6">UPI Address</label>
												<div class="controls">
														<input id="upi_address" autocomplete="off" name="upi_address" type="text" value="<?php echo fooder_upi_address; ?>" readonly="readonly">
														<p id="upi_error" style="display:none;"></p> 
												</div>  
											</div>
											<?php } ?>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6">GSTIN</label>
												<div class="controls">
														<input autocomplete="off" name="gstin" type="text" value="<?php echo fooder_gstin; ?>"> 
												</div>
											</div>

											<div class="control-group">
												<label class="control-label grey" for="form-field-6">FSSAI Number</label>
												<div class="controls">
														<input autocomplete="off" name="fssai_number" type="text" value="<?php echo fooder_fssai_number; ?>"> 
												</div>
											</div>
											
											<div class="control-group">
												<label class="control-label grey" for="form-field-6">Bill Paper Size</label>
												<div class="controls">
														
														<select name="bill_paper_size">
															<option <?php if(fooder_bill_paper_size=='80'){echo 'selected';} ?> value="80">80 MM</option>
															<option <?php if(fooder_bill_paper_size=='76'){echo 'selected';} ?> value="76">76 MM</option>
															<option <?php if(fooder_bill_paper_size=='57'){echo 'selected';} ?> value="57">57 MM</option>
														</select>
												</div>
											</div>


											<!-- <div class="control-group">
										        <div class="controls">
												<div class="radio inline" style="padding-left:0px;">
													<label>
														<input name="gst_type"  type="radio" value="1" <?php if(fooder_gst_type=='1') echo "checked"; ?>>
														<span class="lbl"> Include</span>
													</label>
												</div>
                                        	<div class="radio inline">
													<label>
														<input name="gst_type"  type="radio" value="2" <?php if(fooder_gst_type=='2') echo "checked"; ?>>
														<span class="lbl"> Exclude</span>
													</label>
												</div>
                                                </div>
											</div> -->

										

											<?php /*

											<div class="control-group"> 
										        <div class="controls">
										
                                        	<div class="radio inline" style="padding-left:0px;"> 
													<label>
														<input name="enable_online_ordering"  type="checkbox" value="1" <?php if(fooder_enable_online_ordering=='1') echo "checked"; ?>>
														<span class="lbl"> Online Ordering Enable</span>
													</label>
												</div>
                                                </div>
											</div> 

											<div class="control-group">
										        <div class="controls">
										
                                        	<div class="radio inline" style="padding-left:0px;"> 
													<label>
														<input name="order_sms_notification_enable"  type="checkbox" value="1" <?php if(fooder_order_sms_notification_enable=='1') echo "checked"; ?>>
														<span class="lbl"> SMS Order Notification Enable</span>
													</label>
												</div>
                                                </div>
											</div> */?>
											<?php /*<div class="control-group">
												<label class="control-label grey" for="form-field-6">URL</label>
												<div class="controls">
														<input autocomplete="off" name="url" type="text" value="<?php echo fooder_url; ?>"> 
												</div>
											</div>
                                             */ ?>
									
									<div class="control-group"> 
										        <div class="controls">
										
                                        	<div class="radio inline" style="padding-left:0px;"> 
													<label>
														<input name="status_order_ready_enable"  type="checkbox" value="1" <?php if(fooder_status_order_ready_enable=='1') echo "checked"; ?>>
														<span class="lbl"> Order Status Ready Enable</span> 
													</label>
												</div>
                                                </div> 
											</div> 
											<div class="control-group"> 
										        <div class="controls">
										
                                        	<div class="radio inline" style="padding-left:0px;"> 
													<label>
														<input name="status_order_ready_sms_enable"  type="checkbox" value="1" <?php if(fooder_status_order_ready_sms_enable=='1') echo "checked"; ?>>
														<span class="lbl"> Status Order Ready SMS Enable</span>
													</label>
												</div>
                                                </div> 
											</div> 

										</div> 
										<div class="span6">
											<div class="control-group">
												<label class="control-label grey" for="form-field-1"><?php echo fcpbla; ?>
												</label>
												<div class="controls">
													<div class="input-prepend">
														<span class="add-on"> <i class="icon-phone"></i>
														</span> <input autocomplete="off" name="landline" placeholder="with std code" class="input-medium landLine" type="text" id="form-field-mask-2" value="<?php echo fooder_landline; ?>">
													</div>
													<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpbpopla; ?>" title="<?php echo popb; ?>">?</span>
												</div>
											</div>
										
											<div class="control-group">
												<label class="control-label grey" for="form-field-1"><?php echo fcpbadd; ?>
												</label>
												<div class="controls">
													<textarea name="address" id="form-field-11" class="autosize-transition span7"><?php echo fooder_address; ?></textarea>
													<span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpbpopad; ?>" title="<?php echo popr; ?>">?</span>
												</div>
											</div>
											<script>
												function show(s) {
													if (window.XMLHttpRequest) {
														xmlhttp = new XMLHttpRequest();
													} else { // code for IE6, IE5
														xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
													}
													xmlhttp.onreadystatechange = function() {
														if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
															document.getElementById("val").innerHTML = xmlhttp.responseText;
														}
													}
													xmlhttp.open("GET", "<?php echo $link->link('dropdown_selector', fooders, '?value='); ?>" + s, true);
													xmlhttp.send();
												}

												function cities(s) {
													if (window.XMLHttpRequest) {
														xmlhttp = new XMLHttpRequest();
													} else { // code for IE6, IE5
														xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
													}
													xmlhttp.onreadystatechange = function() {
														if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
															document.getElementById("val1").innerHTML = xmlhttp.responseText;
														}
													}
													xmlhttp.open("GET", "<?php echo $link->link('dropdown_selector', fooders, '?city='); ?>" + s, true);
													xmlhttp.send();
												}
											</script>
											<div class="control-group">
												<label class="control-label grey" for="form-field-1"><?php echo fcpblo; ?></label>
												<div class="controls">
													<?php
													$get_location = $db->get_row('delivery_areas', array('id' => fooder_location));
													if (is_array($get_location) && count($get_location) > 0) {
														echo "<span class='blue'>" . $get_location['region'] . ' ,' . $get_location['city'] . ' ,' . $get_location['state'] . "</span>";
													?><span class="label label-warning arrowed arrowed-left" id="change" style="cursor: pointer"><?php echo fcpbcg; ?></span>
														<!-- <a class="badge badge-success" href='#viewmap' data-toggle='modal'> View Map</a> -->
													<?php  } else { ?>
														<span class="label label-warning arrowed arrowed-left" id="change" style="cursor: pointer"><?php echo fcpbsl; ?></span>
													<?php } ?>
													<span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpbpoplo; ?>" title="<?php echo popr; ?>">?</span>
													<div class="space-8"></div>
													<div class="hidedropdown" style="display: none;">
														<select name="state" onchange="show(this.value);">
															<option value="" selected="selected"><?php echo fcpbss; ?></option>
															<?php
															$db->group_by = '`state`';
															$state = $db->get_all("delivery_areas");
															foreach ($state as $rowstate) {
															?>
																<option value="<?php echo $rowstate['id']; ?>"><?php echo $rowstate['state']; ?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
											</div>


											<div class="control-group">
												<div class="controls">
													<div id="val"></div>
												</div>
											</div>
											<div class="control-group">
												<div class="controls">
													<div id="val1"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<button name="details1" class="btn btn-large btn-primary" type="submit" value="submit">
											<i class="icon-ok bigger-110"></i> <?php echo fcpbs; ?>
										</button>
									</div>
								</form>
							</div>
							<div id="edit-settings" class="tab-pane <?php if ($tab == 'tab-2') echo fcpact; ?>">
								<h3 class="green">
									<?php echo fcpssas; ?>
								</h3>
								<div class="hr"></div>
								<div class="space-10"></div>
								<form class="form-horizontal" name="2" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
									<input autocomplete="off" type="hidden" name="fooders_details2" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']); ?>" />
									<input autocomplete="off" type="hidden" value="tab-2" name="tab">

									<div class="row-fluid">
										<div class="span12">
											<div class="span5">
												<div class="space-8"></div>
												<div class="control-group">
													<div class="controls">
														<?php
														if (fooder_logo_exist != '') {
														?>
															<img alt="logo" src="<?php echo fooder_logo; ?>" style="width: 200px; height: auto;">
														<?php } else { ?>
															<img alt="logo" src="<?php echo SITE_URL . '/assets/fooders/img/noimage.png' ?>">
														<?php } ?>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpscl; ?></label>
													<div class="controls">
														<label class="span10"><input autocomplete="off" type="file" name="file" id="id-input-file-2" /></label>
														&nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspoplo; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsfs; ?></label>

													<div class="controls">
														<?php if (fooder_is_approved == "2") { ?>
															<div class="space-4"></div>
															<label class="span2"> <input autocomplete="off" name="status" class="ace-switch" type="checkbox" <?php if (fooder_status == "1") echo "checked"; ?> /> <span class="lbl"></span>
															</label> &nbsp; &nbsp; &nbsp; &nbsp; <small class="green"><?php echo fcpscobcs; ?></small>
														<?php } elseif (fooder_is_approved == "1") { ?>
															<div class="space-4"></div>
															<span class="text-warning"><?php echo fcpsap; ?></span> <small>(<a href="#"><?php echo fcpsckt; ?></a>)
															</small>
														<?php } elseif (fooder_is_approved == "3") { ?>
															<div class="space-4"></div>
															<span class="text-warning"><?php echo fcpstina; ?></span> <small>(<a href="#"><?php echo fcpsckt; ?></a>)
															</small>
														<?php } else { ?>
															<div class="space-4"></div>
															<span class="text-error"><?php echo fcpssusp; ?></span> 
														<?php } ?>
													</div>
												</div>
											 

												


												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpstp; ?></label>
													<div class="controls">
														<select class="span10" name="type" id="form-field-select-1">
															<option value="-1"><?php echo fcpsst; ?></option>
															<option value="1" <?php if (fooder_type == '1') echo "selected"; ?>><?php echo fcpsrt; ?></option>
															<option value="2" <?php if (fooder_type == '2') echo "selected"; ?>><?php echo fcpscnrs; ?></option>
															<option value="3" <?php if (fooder_type == '3') echo "selected"; ?>><?php echo fcpsbkrs; ?></option>
															<option value="4" <?php if (fooder_type == '4') echo "selected"; ?>>Multiplex</option>
														</select> <span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspopbt; ?>" title="<?php echo popr; ?>">?</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsdt; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="delivery_time" class="span10" type="text" placeholder="00" value="<?php echo fooder_delivery_time; ?>"><span class="btn btn-small btn-important"><?php echo fcpsmin; ?></span>
														</div>
														&nbsp; &nbsp;&nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspopdt; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>

												<!-- <div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsmod; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="minimum_order" class="span12" type="text" placeholder="000" value="<?php echo fooder_minimum_order; ?>"> <span class="btn btn-small btn-info"> <i class="icon-inr"></i>
															</span>
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspopmop; ?>" title="<?php echo popr; ?>">?</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsdcs; ?> </label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="delivery_charges" class="span12" type="text" id="form-field-mask-1" value="<?php echo fooder_delivery_charges; ?>" placeholder="000.00"> <span class="btn btn-small btn-success"> <i class="icon-inr"></i>
															</span>
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspopdc; ?>" title="<?php echo popb; ?>">?</span>
													</div> 
												</div> -->
												<div class="control-group">
													<label class="control-label grey" for="form-field-tags">
														<?php echo fcpsspzn; ?></label>
													<div class="controls">
														<input autocomplete="off" name="specialization" type="text" id="form-field-tags" value="<?php echo fooder_specialization; ?>" placeholder="Enter tags ..." /> &nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspopspzn; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>
											</div>
											<div class="span7">
												<div class="space-8"></div>
												<!-- <div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsvatx; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="vat" class="span12"
																type="text" id="form-field-mask-1"
																value="<?php echo fooder_vat; ?>" placeholder="00"> <span
																class="btn btn-small btn-success"> % </span>
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span
															class="help-button" data-rel="popover"
															data-trigger="hover" data-placement="bottom"
															data-content="<?php echo fcpspopvt; ?>"
															title="<?php echo popb; ?>">?</span>
													</div>
												</div>

												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsscg; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="service_charge"
																class="span12" type="text" id="form-field-mask-1"
																value="<?php echo fooder_service_charge; ?>"
																placeholder="00"> <span
																class="btn btn-small btn-success"> % </span>
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span
															class="help-button" data-rel="popover"
															data-trigger="hover" data-placement="bottom"
															data-content="<?php echo fcpspopst; ?>"
															title="<?php echo popb; ?>">?</span>
													</div>
												</div> -->

												<!-- <div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpstxn1; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="tax1_name" class="span12" type="text" id="form-field-mask-1" value="<?php echo fooder_tax1_name; ?>" placeholder="<?php echo fcpstxn1; ?>">
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpstxncontent; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div> -->


												<div class="control-group">
													<label class="control-label grey" for="form-field-1">CGST + SGST</label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="tax1_value" class="span12" type="text" id="form-field-mask-1" value="<?php echo fooder_tax1_value; ?>" placeholder="<?php echo fcpstxnval1; ?>"> <span class="btn btn-small btn-success"> % </span>
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpstxnvalcont; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>


												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpstxn2; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="tax2_name" class="span12" type="text" id="form-field-mask-1" value="<?php echo fooder_tax2_name; ?>" placeholder="<?php echo fcpstxn2; ?>">
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpstxncontent; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>


												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpstxnval2; ?></label>
													<div class="controls">
														<div class="input-append">
															<input autocomplete="off" name="tax2_value" class="span12" type="text" id="form-field-mask-1" value="<?php echo fooder_tax2_value; ?>" placeholder="<?php echo fcpstxnval2; ?>"> <span class="btn btn-small btn-success"> % </span>
														</div>
														&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpstxnvalcont; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>

												<div class="control-group">
													<label class="control-label grey" for="form-field-1"><?php echo fcpsau; ?> </label>
													<div class="controls">
														<textarea name="about_us" class="span6 limited" id="form-field-9" data-maxlength="1000" maxlength="1000"><?php echo fooder_about_us; ?></textarea>
														<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpspopaus; ?>" title="<?php echo popb; ?>">?</span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label grey"><?php echo fcpsffcts; ?></label>
													<?php
													if ($fooder_facilities == "N;" || $fooder_facilities == "") {
														$get_facility = array('empty' => 'empty');
													} else {
														$get_facility = unserialize($fooder_facilities);
													}
													?>
													<div class="controls">
														<div class="space-2"></div>
														<label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="0" <?php
																																											if (in_array('0', $get_facility))
																																												echo "checked";
																																											?>> <span class="lbl blue"> <?php echo fcpsfdy; ?></span>
														</label> &nbsp; &nbsp; &nbsp; <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="1" <?php if (in_array('1', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfto; ?></span>
														</label> &nbsp; &nbsp; &nbsp; <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="2" <?php if (in_array('2', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfsv; ?></span>
														</label> <br> <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="3" <?php if (in_array('3', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfdi; ?></span>
														</label> &nbsp; &nbsp; &nbsp; &nbsp; <label class="inline">
															<input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="4" <?php if (in_array('4', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfpg; ?></span>
														</label> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="5" <?php if (in_array('5', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfbr; ?></span>
														</label> <br> <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="6" <?php if (in_array('6', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfwf; ?></span>
														</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="7" <?php if (in_array('7', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsfacc; ?></span>
														</label> &nbsp; <label class="inline"> <input autocomplete="off" name="facility[]" class="ace-checkbox-2" type="checkbox" value="8" <?php if (in_array('8', $get_facility)) echo "checked"; ?>>
															<span class="lbl blue"> <?php echo fcpsftb; ?></span>
														</label>
													</div>
												</div>
												<div class="hr"></div>
												<div class="control-group">
													<label class="control-label grey" title="<?php echo fcpsdhrs; ?>"><?php echo fcpswrhs; ?></label>
												</div>
												<?php
												$timepicker = 0;
												foreach ($fooder_daily_hrs as $key => $val) {
												?>
													<div class="control-group">
														<div class="controls">
															<div class="span1">
																<b class="blue">
																	<?php
																	switch ($key) {
																		case 1:
																			echo fcpswm;
																			break;
																		case 2:
																			echo fcpswtu;
																			break;
																		case 3:
																			echo fcpswwd;
																			break;
																		case 4:
																			echo fcpswth;
																			break;
																		case 5:
																			echo fcpswfr;
																			break;
																		case 6:
																			echo fcpswsa;
																			break;
																		default:
																			echo fcpswsu;
																			break;
																	}
																	$timepicker = $timepicker + 1;
																	?></b>
															</div>
															<div class="span2">
																<div class="input-append bootstrap-timepicker">
																	<input autocomplete="off" id="timepicker<?php echo $timepicker; ?>" type="text" value="<?php if ($val['open'] != '') echo $val['open'];
																																							else echo "10:00"; ?>" class="span10" name="daily[<?php echo $key; ?>][open]" />
																	<span class="add-on"> <i class="icon-time"></i>
																	</span>
																</div>
															</div>
															<div class="span1"></div>
															<div class="span2">
																<div class="input-append bootstrap-timepicker">
																	<input autocomplete="off" id="timepicker<?php echo ++$timepicker; ?>" type="text" value="<?php if ($val['close']) echo $val['close'];
																																							else echo "23:00"; ?>" class="span10" name="daily[<?php echo $key; ?>][close]" />
																	<span class="add-on"> <i class="icon-time"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<button name="details2" class="btn btn-large btn-primary" type="submit" value="submit">
											<i class="icon-ok bigger-110"></i> <?php echo fcpbs; ?>
										</button>
									</div>
								</form>
							</div>
							<div id="delivery" class="tab-pane <?php if ($tab == 'tab-3') echo fcpact; ?>">
								<div class="space-10"></div>
								<h3 class="orange">
									<?php echo fcpdda; ?>
								</h3>
								<div class="hr"></div>
								<div class="row-fluid">
									<div class="span12">
										<div class="tabbable tabs-left">
											<ul class="nav nav-tabs" id="myTab3">
												<li class="active"><a data-toggle="tab" href="#home3">
														<?php echo fcpdkc; ?> </a></li>
												<li class=""><a data-toggle="tab" href="#profile3"> <?php echo fcpdda; ?> <br />
														<span class="badge badge-important"><?php echo fooder_selected_areas . " " . fcpdof . " " . khateraho_selected_areas; ?></span>
													</a></li>
											</ul>
											<div class="tab-content">
												<div id="home3" class="tab-pane active">


													<form class="form-horizontal" name="area_coverage_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
														<input autocomplete="off" type="hidden" name="area_coverage_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']); ?>" />
														<div class="control-group">
															<label class="control-label grey"><?php echo fcpdac; ?> </label>
															<div class="controls">
																<div class="input-append">
																	<input autocomplete="off" name="area_coverage" class="span10" type="text" placeholder="00.00" value="<?php echo fooder_area_coverage; ?>"> <span class="btn btn-small btn-success"> <?php echo fcpdkms; ?> </span>
																</div>
																&nbsp; &nbsp;&nbsp; &nbsp; <span class="help-button-required" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="<?php echo fcpdpopac; ?>" title="<?php echo popr; ?>">?</span>
															</div>
														</div>
														<div class="control-group">
															<div class="controls">
																<button class="btn  btn-info" type="submit" name="save_area_coverage" value="submit">
																	<i class="icon-ok bigger-110"></i> <?php echo fcpbs; ?>
																</button>
															</div>
														</div>
													</form>

												</div>
												<div id="profile3" class="tab-pane">



													<form class="form-horizontal" name="3" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
														<input autocomplete="off" type="hidden" name="fooders_delivery_area" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']); ?>" />
														<input autocomplete="off" type="hidden" value="tab-3" name="tab">
														<!--PAGE CONTENT BEGINS-->
														<?php
														$i = 0;
														$get_region = $db->get_all('delivery_areas');
														$j = count($get_region);
														foreach ($get_region as $regions) {

															if ($i % 4 == 0) {
																echo '<div class="row-fluid"><div class="span12">';
															}
														?>
															<div class="span3">

																<input autocomplete="off" name="regions[]" class="ace-checkbox-2" type="checkbox" value="<?php echo $regions['id']; ?>" <?php if (in_array($regions['id'], $fooder_delivery_areas_id))  echo "checked"; ?>>
																<span class="lbl blue"> <?php echo $regions['region']; ?></span>
															</div>
														<?php if ($i % 4 == 3 || $i == ($j - 1)) {
																echo '</div></div><br>';
															}
															$i++;
														} ?>
														<!--PAGE CONTENT ENDS-->
														<!--/.span-->
														<!--/.row-fluid-->
														<div class="well well-small center">
															<button class="btn btn-primary" type="submit" name="delivery_area" value="submit">
																<i class="icon-ok bigger-110"></i> <?php echo fcpbs; ?>
															</button>

														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div id="delivery_charges" class="tab-pane in <?php if ($tab == 'tab-4') echo fcpact; ?>"> 






								<h3 class="blue">
									Manage Delivery Charges <small class="red">(Max 5 Delivery Range Allowed!)</small>
								</h3>
								<div class="hr"></div>
								
									<div class="row-fluid">
									<?php if($dccount<5){?>
										<div class="span4">
										
										<form class="form-horizontal" name="details1" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
								
								<input autocomplete="off" type="hidden" value="tab-4" name="tab">
										<div class="control-group">
												<label class="control-label grey" for="form-field-6">Min Range </label>
												<div class="controls">
													<input autocomplete="off" name="min_range"  type="text"  value="<?php echo $min; ?>" > 
												</div>
											</div>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6">Max Range</label>
												<div class="controls">
													<!-- <input autocomplete="off" name="max_range"  type="text"  value="<?php echo fooder_area_coverage; ?>" >  -->
													<select name="max_range" >
														<?php
														$dmrange=range(1,fooder_area_coverage);
														foreach($dmrange as $dd)
														{?>
															
															<option <?php if($dd==fooder_area_coverage){echo "selected";} ?>><?php echo $dd; ?></option> 

														<?php }
														
														
														?>
														


													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6">Delivery charge</label>
												<div class="controls">
													<input autocomplete="off" name="delivery_charge"  type="text" value="0.00">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label grey" for="form-field-6">Order Amount(Min)</label>
												<div class="controls">
													<input autocomplete="off" class="" name="min_order_amount"  type="text" value="0.00" >
												</div>
											</div>
										
										<button class="btn btn-sm btn-primary btn-block" type="submit" name="submit_delivery_charges">
											<i class="icon-ok bigger-110"></i> <?php echo fcpbs; ?>
										</button>
								
								</form>
								
											</div>
											<?php }?>
								




										
										<div class="span8">
<?php

if(!empty($fooders_delivery_charges))
{


?>
<table class="table">
	<tr>
	     <th>S.No</th>
		<th>Min Range(KM)</th>
		<th>Max Range(KM)</th>
		<th>Delivery Charge</th>
		<th>Minimum Order Amount</th>
		<th></th>
	</tr>
<?php
$sn=1;
	foreach($fooders_delivery_charges as $fdcrow)
	{?><tr><td><?php echo $sn; ?></td>
			<td><?php echo $fdcrow['min_range'] ?></td>
			<td><?php echo $fdcrow['max_range'] ?></td>
			<td><?php echo $currency_symbol.$fdcrow['delivery_charge'] ?></td>
			<td><?php echo $currency_symbol.$fdcrow['min_order_amount'] ?></td>
			<td><form method="post" action="">
				<input type="hidden" name="delivery_charge_id" value="<?php echo $fdcrow['id'] ?>">
				<button class="btn btn-mini btn-danger" name="delete_delivery_charge_submit">Delete</button>
			</form></td>

			</tr>
	<?php
	$sn++;
	 }





?>


</table>

<?php }?>



										</div>
									
							</div>
						</div>
					
					</div>
				</div>
				<!--/span-->
			</div>
			<!--/user-profile-->
			<!--PAGE CONTENT ENDS-->
		</div>
		<!--/.span-->
	</div>
	<!--/.row-fluid-->
</div>
<!--/.page-content-->