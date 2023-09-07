<?php
if ($session->Check () && $_SESSION['type']==='fooder') {
	$session->redirect ('live_orders', fooders );
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
	href="<?php echo SITE_URL.'/assets/fooders/css/jquery.gritter.css'?>" />

<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/font-awesome-ie7.min.css';?>" />


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
									<img alt="logo" width="200px;"
										src="<?php echo SITE_URL.'/assets/mobile/img/wlogo.svg';?>">
								</h1>
							</div>
						</div>
						<div class="space-8"></div>
						<div class="row-fluid">
							<div class="position-relative">
								<div id="login-box"
									class="login-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i> <?php echo flh;?>
											</h4>
											<div class="space-6"></div>
                                                 <?php echo $display_login; ?>
												<form name="login" action="<?php $_SERVER['PHP_SELF'];?>"
												method="post">
												<input autocomplete="off" type="hidden" name="fooders"
													value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
												<fieldset>
													<br> <label class="blue" for="form-field-6">Username</label>

													<label> <span class="block input-icon input-icon-right"> <input
															autocomplete="off" type="text" name="loginemail"
															class="span12" placeholder="Username" /> <i
															class="icon-user"></i>
													</span>
													</label> <label class="blue" for="form-field-6"><?php echo flp;?></label>

													<label> <span class="block input-icon input-icon-right"> <input
															autocomplete="off" type="password" name="loginpassword"
															class="span12" placeholder="Password" /> <i
															class="icon-lock"></i>
													</span>
													</label>
													<div class="space"></div>
													<div class="clearfix">
														<!-- 	<label class="inline"> <input autocomplete="off" type="checkbox" /> <span
															class="lbl"> Remember Me</span>
														</label> -->
														<button type="submit" name="login"
															class="width-35 pull-right btn btn-small btn-primary">
															<i class="icon-key"></i> <?php echo fllb;?>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											</form>
										</div>
										<!--/widget-main-->
										<div class="toolbar clearfix">
											<div>
												<a
													href="<?php echo $link->link('forgot_password',fooders);?>"
													class="forgot-password-link"> <i class="icon-arrow-left"></i>
													<?php echo flfp;?>
												</a>
											</div>
											<div>
												<a href="<?php echo $link->link('register',fooders);?>"
													class="user-signup-link"> <?php echo flr;?> <i
													class="icon-arrow-right"></i>
												</a>
											</div>
										</div>
									</div>
									<!--/widget-body-->
								</div>
								<!--/login-box-->
							</div>
							<!--/position-relative-->
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
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/jquery.min.js'; ?>"></script>
	<!--<![endif]-->

	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<!--[if !IE]>-->
	<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery-2.0.3.min.js';?>'>"+"<"+"/script>");
		</script>
	<!--<![endif]-->

	<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery-1.10.2.min.js'; ?>'>"+"<"+"/script>");
</script>

	<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery.mobile.custom.min.js'; ?>'>"+"<"+"/script>");
		</script>
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/bootstrap.min.js'; ?>"></script>

	<!--page specific plugin scripts-->
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/jquery.gritter.min.js'; ?>"></script>
	<script type="text/javascript">
			$(function() {
				$('.gritter-close').click(function(){
	                   
	                 $('#gritter-notice-wrapper').hide('slow');

					});
			});
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
