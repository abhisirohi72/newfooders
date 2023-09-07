<?php


if ($session->Check ()) {
	$session->redirect ( 'dashboard', fooders );
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
						<div class="space-32"></div>
						<div class="row-fluid">
							<div class="center">
								<h1>
									<img alt="logo"
										src="<?php echo SITE_URL.'/assets/fooders/img/khaterahologo.png';?>">
								</h1>
							</div>
						</div>
						<div class="space-32"></div>
						<div class="row-fluid">
							<div class="position-relative">
								<div id="signup-box" class="signup-box widget-box no-border visible" style="position: relative;">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header purple lighter bigger">
												<i class="icon-group blue"></i> New Fooder Registration
											</h4>
											<div class="space-6"></div>
											<h4 class="grey">Login Details</h4>
											<div class="hr"></div>
                                             <?php
												echo $display_register;
												?>
											<form name="register" action="<?php $_SERVER['PHP_SELF'];?>"
												method="post">
												<input autocomplete="off" type="hidden" name="fooders"
													value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />

												
												<fieldset>
													
													<label class="blue" for="form-field-6">Contact Name <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label><span class="block input-icon input-icon-right"> 
													<input autocomplete="off" type="text" name="contact_name" class="span12"
															placeholder="Contact Name" value="<?php echo $contact_name;?>" /> <i class="icon-user"></i>
													</span>
													</label> 
													<label class="blue" for="form-field-6">Email <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label><span class="block input-icon input-icon-right"> 
													<input autocomplete="off" type="text" name="email" class="span12"
															placeholder="Email" /> <i class="icon-envelope"></i>
													</span>
													</label> 
													<label class="blue" for="form-field-6">Password <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label> <span
														class="block input-icon input-icon-right"> <input autocomplete="off"
															type="password" name="password" class="span12"
															placeholder="Password" /> <i class="icon-lock"></i>
													</span>
													</label> 
													<label class="blue" for="form-field-6">Repeat Password <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label> <span
														class="block input-icon input-icon-right"> <input autocomplete="off"
															type="password" name="repassword" class="span12"
															placeholder="Repeat password" /> <i class="icon-retweet"></i>
													</span>
													</label> 
													
													<h4 class="grey">Business Details</h4>
											        <div class="hr"></div>
													<label class="blue" for="form-field-6">Fooder's Name <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label><span class="block input-icon input-icon-right"> 
													<input autocomplete="off" type="text" name="fooders_name" class="span12"
															placeholder="Fooder's Name" /> <i class="icon-user"></i>
													</span>
													</label> 
													<label class="blue" for="form-field-6">Mobile <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label> <span
														class="block input-icon input-icon-right"> <input autocomplete="off"
															type="text" name="mobile" class="span12"
															placeholder="Mobile" /> <i class="icon-mobile-phone"></i>
													</span>
													</label> 
													<label class="blue" for="form-field-6">Landline <span
														class="help-button pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label> <span
														class="block input-icon input-icon-right"> <input autocomplete="off"
															type="text" name="landline" class="span12"
															placeholder="Landline" /> <i class="icon-phone"></i>
													</span>
													</label> 
													
													<label class="blue" for="form-field-6">Address <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label> 
													<label> <span
														class="block input-icon input-icon-right"> <input autocomplete="off"
															type="text" name="address" class="span12"
															placeholder="Address" /> <i class="icon-home"></i>
													</span>
													</label> 
													
													
													<script>
													function show(s)
													{
													if (window.XMLHttpRequest)
													  {
													  xmlhttp=new XMLHttpRequest();							
													  }
													else
													  {// code for IE6, IE5
													  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
													  }
													xmlhttp.onreadystatechange=function()
													  {
													  if (xmlhttp.readyState==4 && xmlhttp.status==200)
													    {
														  document.getElementById("val").innerHTML=xmlhttp.responseText;
													    }
													  }
													xmlhttp.open("GET","<?php echo $link->link('dropdown_selector', fooders,'?value=');?>"+s,true); 
													xmlhttp.send();
													}
													function cities(s)
													{
													if (window.XMLHttpRequest)
													  {
													  xmlhttp=new XMLHttpRequest();							
													  }
													else
													  {// code for IE6, IE5
													  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
													  }
													xmlhttp.onreadystatechange=function()
													  {
													  if (xmlhttp.readyState==4 && xmlhttp.status==200)
													    {
														  document.getElementById("val1").innerHTML=xmlhttp.responseText;
													    }
													  }
													xmlhttp.open("GET","<?php echo $link->link('dropdown_selector', fooders,'?city=');?>"+s,true); 
													xmlhttp.send();
													}
												</script>
											<div class="control-group">
												<label class="control-label blue" for="form-field-1">Location <span class="label label-warning arrowed arrowed-left"
														id="change" style="cursor: pointer">Select Location</span> <span class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More details." title="Popover on hover">?</span></label>
												<div class="controls">
													<div class="space-8"></div>
													<div class="hidedropdown" style="display: none;">
														<select  name="state" onchange="show(this.value);">
															<option value="" selected="selected">--------- Select
																State ---------</option>
																<?php
																$db->group_by = '`state`';
																$state = $db->get_all ( "delivery_areas" );
																foreach ( $state as $rowstate ) {
																	?>
																	<option value="<?php echo $rowstate['id']; ?>"><?php echo $rowstate['state'];?></option>
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
													
													<h4 class="grey">Fooder's Services</h4>
											        <div class="hr"></div>
													
													
													<div class="control-group">
													<label class="control-label blue" for="form-field-1">Type <span class="help-button-required pull-right"
															data-rel="popover" data-trigger="hover"
															data-placement="bottom" data-content="More details."
															title="Popover on hover">?</span></label>
													<div class="controls">
														<select class="span12" name="type"
															id="form-field-select-1">
															<option value="-1">------------------------- Select Type ------------------------</option>
															<option value="1"
																<?php if(fooder_type=='1') echo "selected"; ?>>Restaurant</option>
															<option value="2"
																<?php if(fooder_type=='2') echo "selected"; ?>>Confectioners</option>
															<option value="3"
																<?php if(fooder_type=='3') echo "selected"; ?>>Sweets</option>
														</select> 
													</div>
												</div>
													
													<label class="blue" for="form-field-6">Minimum Order <span
														class="help-button-required pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span> </label>                                     
													<label> <span
														class="block input-icon input-icon-right"> <input autocomplete="off"
															type="text" name="minimum_order" class="span12"
															placeholder="Minimum Order" /> <i class=" icon-fire"></i>
													</span>
													</label> 
													
												<div class="control-group">
													<label class="control-label blue">Facilities  <span
														class="help-button pull-right" data-rel="popover"
														data-trigger="hover" data-placement="bottom"
														data-content="More Details" title="Popover on hover">?</span></label>
														
			                                              <div class="controls">
														<div class="space-2"></div>
														<label class="inline"> <input autocomplete="off" name="facility[]"
															class="ace-checkbox-2" type="checkbox" value="0"
															> <span class="lbl blue"> Delivery</span>
														</label> &nbsp; &nbsp; &nbsp; <label class="inline"> <input autocomplete="off"
															name="facility[]" class="ace-checkbox-2" type="checkbox"
															value="1"
															>
															<span class="lbl blue"> Take Out</span>
														</label> &nbsp; &nbsp; &nbsp; <label class="inline"> <input autocomplete="off"
															name="facility[]" class="ace-checkbox-2" type="checkbox"
															value="2"
															>
															<span class="lbl blue"> Serves Veg</span>
														</label> <br> <label class="inline"> <input autocomplete="off"
															name="facility[]" class="ace-checkbox-2" type="checkbox"
															value="3"
															>
															<span class="lbl blue"> Dine In</span>
														</label> &nbsp; &nbsp; &nbsp; &nbsp; <label class="inline">
															<input autocomplete="off" name="facility[]" class="ace-checkbox-2"
															type="checkbox" value="4"
															>
															<span class="lbl blue"> Parking</span>
														</label> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <label
															class="inline"> <input autocomplete="off" name="facility[]"
															class="ace-checkbox-2" type="checkbox" value="5"
															>
															<span class="lbl blue"> Bar</span>
														</label> <br> <label class="inline"> <input autocomplete="off"
															name="facility[]" class="ace-checkbox-2" type="checkbox"
															value="6"
															>
															<span class="lbl blue"> Wi Fi</span>
														</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <label
															class="inline"> <input autocomplete="off" name="facility[]"
															class="ace-checkbox-2" type="checkbox" value="7"
															>
															<span class="lbl blue"> Accepts CC</span>
														</label> &nbsp; <label class="inline"> <input autocomplete="off"
															name="facility[]" class="ace-checkbox-2" type="checkbox"
															value="8">
															
															<span class="lbl blue"> Table Booking</span>
														</label>
													</div>
												</div>
													
													
													<label> <input autocomplete="off" type="checkbox"/> <span
														class="lbl muted"> I accept the <a href="<?php echo $link->link('fooder_agreement',fooders);?>" target="_blank">Fooder's Agreement</a>  !
														
														Click here to read <a href="<?php echo $link->link('privacy_policy',fooders);?>" target="_blank">Privacy Policy</a> &amp; <a href="<?php echo $link->link('terms_conditions',fooders);?>" target="_blank">Terms &amp; Conditions</a>
													</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset"
															class="width-30 pull-left btn btn-small">
															<i class="icon-refresh"></i> Reset
														</button>

														<button type="submit" name="register"
															class="width-65 pull-right btn btn-small btn-success">
															Join Khateraho <i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="toolbar center">
											<a href="<?php echo $link->link('login',fooders);?>"
												class="back-to-login-link"> <i class="icon-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div>
									<!--/widget-body-->
								</div>
								<!--/signup-box-->
							</div>
							<!--/position-relative-->
						</div>
					
					<div class="space-32"></div>
						<div class="row-fluid">
							<div class="center red">
							
									&copy; <?php echo date('Y');?> khateraho.com
							
							</div>
							<a href="#" id="btn-scroll-up"
	class="btn-scroll-up btn btn-small btn-inverse"> <i
	class="icon-double-angle-up icon-only bigger-110"></i>

</a>
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
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
		src="<?php echo SITE_URL.'/assets/fooders/js/jquery.gritter.min.js';?>"></script>
	<script type="text/javascript">
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
