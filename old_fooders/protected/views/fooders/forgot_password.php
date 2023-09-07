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
	href="<?php echo SITE_URL.'/assets/fooders/css/bootstrap.min.css'?>"
	rel="stylesheet" />
<link
	href="<?php echo SITE_URL.'/assets/fooders/css/bootstrap-responsive.min.css'?>"
	rel="stylesheet" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/font-awesome.min.css'?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/jquery.gritter.css'?>" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

<!--page specific plugin styles-->

<!--fonts-->

<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

<!--ace styles-->

<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace.min.css'?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace-responsive.min.css'?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace-skins.min.css'?>" />

<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

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
										src="<?php echo SITE_URL.'/assets/fooders/img/fooder_dash.png';?>">

								</h1>

							</div> 
						</div>

						<div class="space-32"></div>

						<div class="row-fluid">
							<div class="position-relative">

								<div id="forgot-box"
									class="forgot-box  visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="icon-key"></i> <?php echo ffprtp;?>
											</h4>

											<div class="space-6"></div>
											<?php echo $display_forgot_pass;?>
											<p><?php echo ffpeyeri;?></p>

											<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
												<input autocomplete="off" type="hidden"
													name="save_forgot_ip"
													value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
												<fieldset>
													<!-- <label> <span class="block input-icon input-icon-right"> <input
															autocomplete="off" name="forgot_pass" type="email"
															required="required" autofocus class="span12"
															placeholder="<?php echo ffpem;?>" /> <i class="icon-envelope"></i>
													</span>
													</label> -->


													<label> <span class="block input-icon input-icon-right"> <input
															autocomplete="off" name="forgot_pass" type="text"
															required="required" autofocus class="span12"
															placeholder="Enter Username" /> <i class="icon-envelope"></i>
													</span>
													</label>

													<div class="clearfix">
														<button
															class="width-35 pull-right btn btn-small btn-danger"
															name="save_forggot_pass" type="submit">
															<i class="icon-lightbulb"></i> <?php echo ffpsm;?>
														</button>
													</div>
												</fieldset>
											</form>
										</div>
										<!--/widget-main-->

										<div class="toolbar center">
											<a href="<?php echo $link->link('login',fooders);?>"
												class="back-to-login-link"><i
												class="icon-arrow-left"></i> <?php echo ffpbtl;?> 
											</a>
										</div>
									</div>
									<!--/widget-body-->
								</div>
								<!--/forgot-box-->
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
	<script src="<?php echo SITE_URL.'/assets/fooders/js/jquery.min.js'?>"></script>

	<!--<![endif]-->

	<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

	<!--[if !IE]>-->

	<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery-2.0.3.min.js'?>'>"+"<"+"/script>");
		</script>

	<!--<![endif]-->

	<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

	<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo SITE_URL.'/assets/fooders/js/jquery.mobile.custom.min.js'?>'>"+"<"+"/script>");
		</script>
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/bootstrap.min.js'?>"></script>

	<!--page specific plugin scripts-->
	<script
		src="<?php echo SITE_URL.'/assets/fooders/js/jquery.gritter.min.js'?>"></script>
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
