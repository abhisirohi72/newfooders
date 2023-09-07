<?php
if ($session->Check () && $_SESSION['type']==='fooder') {
	$session->redirect ( 'live_orders', fooders );
} else { 
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo Appname; ?></title>

<meta name="description" content="User login page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--basic styles-->
<link
	href="<?php echo SITE_URL.'/assets/fooders/css/bootstrap.min.css';?>"
	rel="stylesheet" />
<link
	href="<?php echo SITE_URL.'/assets/fooders/css/bootstrap-responsive.min.css';?>"
	rel="stylesheet" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/font-awesome.min.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/jquery-ui-1.10.3.custom.min.css';?>" />

<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/jquery.gritter.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/chosen.css';?>" />
<!--   <link rel="stylesheet" href="<?php // echo SITE_URL.'/assets/fooders/css/font-awesome-ie7.min.css';?>" /> -->
<!--page specific plugin styles-->
<!--fonts-->
<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<!--ace styles-->
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace.min.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace-responsive.min.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace-skins.min.css';?>" />
<!--  <link rel="stylesheet" href="<?php // echo SITE_URL.'/assets/fooders/css/ace-ie.min.css';?>" /> -->
<!--inline styles related to this page-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body class="login-layout">
	<div class="main-container container-fluid">
		<div class="main-content">
			<div class="row-fluid">
				<div class="span12">
					<div class="login-container">
						<div class="space-2"></div>
						<div class="row-fluid">
							<div class="center">
								<h1>
									<img alt="logo"
										src="<?php echo SITE_URL.'/assets/fooders/img/fooder_dash.png';?>">
								</h1>
							</div>
						</div>
						<div class="space-2aa"></div>
						<div class="row-fluid">
							<div class="position-relative">
								<div id="signup-box"
									class="signup-box widget-box no-border visible"
									style="position: relative;">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header purple lighter bigger">
												<i class="icon-group blue"></i> <?php echo frnfr;?>
											</h4>
											<div class="space-6"></div>
											<h4 class="grey"><?php echo frpd;?></h4>
											<div class="hr"></div>
                                             <?php
	echo $display_register;
	?>
											<form name="register" action="<?php $_SERVER['PHP_SELF'];?>"
												method="post">
												<input autocomplete="off" type="hidden" name="fooders"
													value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />


												<fieldset>

													<label class="blue" for="form-field-6"><?php echo frcn;?> <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frcnpop;?>"
														title="<?php echo popr;?>">?</span> </label> <label><span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="contact_name"
															class="span12" placeholder="Contact Name"
															value="<?php echo $contact_name;?>" autofocus /> <i
															class="icon-user"></i>
													</span> </label> 
													
													<label class="blue" for="form-field-6">Contact Email <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frepop;?>"
														title="<?php echo popr;?>">?</span> </label> <label><span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="email"
															class="span12" placeholder="Email"
															value="<?php echo $email;?>" /> <i class="icon-envelope"></i>
													</span> </label> 
													

													<label class="blue" for="form-field-6">Username <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo freusername;?>"
														title="<?php echo popr;?>">?</span> </label> <label><span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="username"
															class="span12" placeholder="Username"
															value="<?php echo $username;?>" /> <i class="icon-envelope"></i>
													</span> </label> 


													
													<label class="blue" for="form-field-6"><?php echo frpass;?> <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frpasspop;?>"
														title="<?php echo popr;?>">?</span> </label> <label> <span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="password" name="password"
															class="span12" placeholder="Password"
															value="<?php echo $pswd; ?>" /> <i class="icon-lock"></i>
													</span>
													</label> <label class="blue" for="form-field-6"><?php echo frrpass;?> </label>
													<label> <span class="block input-icon input-icon-right"> <input
															autocomplete="off" type="password" name="repassword"
															class="span12" placeholder="Repeat password"
															value="<?php echo $repassword; ?>" /> <i
															class="icon-retweet"></i>
													</span>
													</label>

													<h4 class="grey"><?php echo frbd;?></h4>
													<div class="hr"></div>
													<label class="blue" for="form-field-6"><?php echo frname;?> <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frfnpop;?>"
														title="<?php echo popr;?>">?</span> </label> <label><span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="fooders_name"
															class="span12" placeholder="Fooder's Name"
															value="<?php echo $fooder_name;?>" /> <i
															class="icon-user"></i>
													</span> </label> <label class="blue" for="form-field-6"><?php echo frmobile;?> <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frmpop;?>"
														title="<?php echo popr;?>">?</span> </label> <label> <span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="mobile"
															class="span12" placeholder="Mobile"
															value="<?php echo $mobile;?>" /> <i
															class="icon-mobile-phone"></i>
													</span>
													</label> <label class="blue" for="form-field-6"><?php echo frlandline;?> <span
														class="help-button pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frlapop;?>"
														title="<?php echo popb;?>">?</span> </label> <label> <span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="landline"
															class="span12" placeholder="Landline"
															value="<?php echo $landline;?>" /> <i class="icon-phone"></i>
													</span>
													</label> <label class="blue" for="form-field-6"><?php echo fraddress;?><span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frapop;?>"
														title="<?php echo popr;?>">?</span> </label> <label> <span
														class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="address"
															class="span12" placeholder="Address"
															value="<?php echo $address;?>" /> <i class="icon-home"></i>
													</span>
													</label>



													<div class="control-group">
														<label class="control-label blue" for="form-field-1"><?php echo frlocation;?> <span
															class="help-button-required pull-right"
															data-rel="popover" data-trigger="hover"
															data-placement="bottom"
															data-content="<?php echo frlopop;?>"
															title="<?php echo popr;?>">?</span></label>
														<div class="controls">
												<?php
	$get_all_data = $db->get_all ( 'delivery_areas' );
	
	?>
													<select name="region" class="chzn-select"
																id="form-field-select-3"
																data-placeholder="<?php echo frchl;?>">
																<option value="0" />
															<?php
	
foreach ( $get_all_data as $region ) {
		echo "<option value=" . $region ['id'] . ">" . $region ['region'] . "</option>";
	}
	?>
															</select>
														</div>
													</div>


													<h4 class="grey"><?php echo frservice;?></h4>
													<div class="hr"></div>


													<div class="control-group">
														<label class="control-label blue" for="form-field-1"><?php echo frtype;?><span
															class="help-button-required pull-right"
															data-rel="popover" data-trigger="hover"
															data-placement="bottom"
															data-content="<?php echo frtypepop;?>"
															title="<?php echo popr;?>">?</span></label>
														<div class="controls">
															<select class="span12" name="type"
																id="form-field-select-1">
																<option value="-1"><?php echo frst;?></option>
																<option value="1"
																	<?php if($type=='1') echo "selected"; ?>><?php echo frtres;?></option>
																<option value="2"
																	<?php if($type=='2') echo "selected"; ?>><?php echo frtcon;?></option>
																<option value="3"
																	<?php if($type=='3') echo "selected"; ?>><?php echo frtbak;?></option>
																	<option value="4"
																	<?php if($type=='4') echo "selected"; ?>>Multiplex</option>
															</select>
														</div>
													</div>

													<label class="control-label blue" for="form-field-6"><?php echo frmo;?> <span
														class="help-button pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="<?php echo frmopop;?>"
														title="<?php echo popb;?>">?</span> </label> <label> <span
														class="block input-icon input-icon-right"> 
														<input
															autocomplete="off" type="text" name="minimum_order"
															class="span12" placeholder="Minimum Order"
															value="<?php echo $minimum_order;?>" /> <i
															class=" icon-inr"></i>
													</span>
													</label>

													<div class="control-group">
														<label class="control-label blue"><?php echo frfaci;?> <span
															class="help-button pull-right" data-rel="popover"
															data-trigger="hover" data-placement="bottom"
															data-content="<?php echo frfacipop;?>"
															title="<?php echo popb;?>">?</span></label>

														<div class="controls">
			                                              <?php
	if ($facilities == "N;" || $facilities == "") {
		$facility = array ('empty' => 'empty' );
	
	} else {
		$facility = unserialize ( $facilities );
	}
	?>
														<div class="space-2"></div>
															<label class="inline"> <input autocomplete="off"
																name="facility[]" class="ace-checkbox-2" type="checkbox"
																value="0"
																<?php if (in_array('0', $facility))echo "checked"; else?>>
																<span class="lbl blue"> <?php echo frd;?></span>
															</label> &nbsp; &nbsp; &nbsp; <label class="inline"> <input
																autocomplete="off" name="facility[]"
																class="ace-checkbox-2" type="checkbox" value="1"
																<?php if (in_array('1', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frto;?></span>
															</label> &nbsp; &nbsp; &nbsp; <label class="inline"> <input
																autocomplete="off" name="facility[]"
																class="ace-checkbox-2" type="checkbox" value="2"
																<?php if (in_array('2', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frsvo;?></span>
															</label> <br> <label class="inline"> <input
																autocomplete="off" name="facility[]"
																class="ace-checkbox-2" type="checkbox" value="3"
																<?php if (in_array('3', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frdinein;?></span>
															</label> &nbsp; &nbsp; &nbsp; &nbsp; <label
																class="inline"> <input autocomplete="off"
																name="facility[]" class="ace-checkbox-2" type="checkbox"
																value="4"
																<?php if (in_array('4', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frpark;?></span>
															</label> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <label
																class="inline"> <input autocomplete="off"
																name="facility[]" class="ace-checkbox-2" type="checkbox"
																value="5"
																<?php if (in_array('5', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frbar;?></span>
															</label> <br> <label class="inline"> <input
																autocomplete="off" name="facility[]"
																class="ace-checkbox-2" type="checkbox" value="6"
																<?php if (in_array('6', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frwifi;?></span>
															</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
															<label class="inline"> <input autocomplete="off"
																name="facility[]" class="ace-checkbox-2" type="checkbox"
																value="7"
																<?php if (in_array('7', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo fracc;?></span>
															</label> &nbsp; <label class="inline"> <input
																autocomplete="off" name="facility[]"
																class="ace-checkbox-2" type="checkbox" value="8"
																<?php if (in_array('8', $facility))echo "checked";?>> <span
																class="lbl blue"> <?php echo frtb;?></span>
															</label>
														</div>
													</div>


													<label> <input autocomplete="off" name="agreement"
														type="checkbox" /> <span class="lbl muted"> <?php echo friat;?> 
														
														 <a href="<?php echo $link->link('privacy-policy',eaters);?>" target="_blank"><?php echo frpp;?></a>
														 <?php echo frand;?> 
														 <a href="<?php echo $link->link('terms',eaters);?>" target="_blank"><?php echo frtc;?></a>
													</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset"
															class="width-30 pull-left btn btn-small">
															<i class="icon-refresh"></i> <?php echo frreset;?>
														</button>

														<button type="submit" name="register"
															class="width-65 pull-right btn btn-small btn-success">
															<?php echo frjk;?> <i
																class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="toolbar center">
											<a href="<?php echo $link->link('login',fooders);?>"
												class="back-to-login-link"> <i class="icon-arrow-left"></i>
												<?php echo frbtl;?>
											</a>



										</div>

									</div>


									<!--/widget-body-->
								</div>

								<!--/signup-box-->
							</div>
							<!--/position-relative-->
						</div>

						
						<div class="row-fluid">
							<div class="right">
								<a href="#" id="btn-scroll-up"
									class="btn-scroll-up btn btn-small btn-inverse"> <i
									class="icon-double-angle-up icon-only bigger-110"></i>

								</a>
							</div>
						</div>

					</div>
				</div>
				<!--/.span-->
			</div>
			<!--/.row-fluid-->
		</div>

	</div>

	<!--/.main-container-->
	<!--basic scripts-->
	<!--[if !IE]>-->
	<script src="<?php echo SITE_URL.'/assets/fooders/js/jquery.min.js';?>"></script>
	<!--<![endif]-->

	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<!--[if !IE]>-->
	<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery-2.0.3.min.js'; ?>'>"+"<"+"/script>");
		</script>
	<!--<![endif]-->

	<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery-1.10.2.min.js';?>'>"+"<"+"/script>");
</script>

	<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery.mobile.custom.min.js';?>'>"+"<"+"/script>");
		</script>
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/bootstrap.min.js';?>"></script>
	<!--page specific plugin scripts-->
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/jquery-ui-1.10.3.custom.min.js';?>"></script>

	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/chosen.jquery.min.js';?>"></script>

	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/jquery.gritter.min.js';?>"></script>
	<script type="text/javascript">
	$(".chzn-select").chosen(); 


	$("#change").click(function(){
					$(".hidedropdown").show(500);
				});
		</script>

	<script type="text/javascript">


	$(function() {
				$('.gritter-close').click(function(){
	                   
	                 $('#gritter-notice-wrapper').hide('slow');

					});
			});

	$('[data-rel=popover]').popover({container:'body'});

	
			</script>
	<!--ace scripts-->
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/ace-elements.min.js'?>"></script>
	<script src="<?php echo SITE_URL.'/assets/fooders/js/ace.min.js'?>"></script>
	<!--inline scripts related to this page-->
	<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>

</body>
</html>
<?php }?>

