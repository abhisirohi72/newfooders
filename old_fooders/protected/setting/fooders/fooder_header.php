<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php echo fooder_name." ".fht." ".Appname; ?></title>
<meta name="description" content="<?php echo fooder_about_us;?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
<meta name="author" content="<?php echo SITENAME;?>">
<meta name="generator" content="<?php echo Appname;?>">
<!--basic styles-->
<link rel="shortcut icon"
	href="<?php echo SITE_URL.'/assets/fooders/img/favicon.ico';?>"
	type="image/x-icon">
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
<!--page specific plugin styles-->
<!-- ********************************** Form Elements CSS *********************************** -->	
	<?php
	
	if ($query2ans == "products" || $query2ans == "image_gallery" || $query2ans == "menu" || $query2ans == "view_menus" 
	|| $query2ans == "view_products" || $query2ans == "fooders_cp" || $query2ans == "account_management" || $query2ans == "delivery_guys" || $query2ans == "edit_delivery_guy" 
	|| $query2ans == "add_delivery_guy" || $query2ans == "live_orders" || $query2ans == "verification" 
	|| $query2ans == "manage_tables" || $query2ans == "offers" || $query2ans == "add_offer" || $query2ans == "edit_offer"  
	|| $query2ans=="orders" || $query2ans == "orders_details" || $query2ans == "payments"  
	|| $query2ans == "qrcode_settings" || $query2ans == "online_ordering") {    
		?>	
	<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/chosen.css';?>" /> 
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/datepicker.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/bootstrap-timepicker.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/daterangepicker.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/colorpicker.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/jquery.gritter.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/bootstrap-editable.css';?>" />
	<?php } ?>
	<?php
	if ($query2ans == "image_gallery") {?>	
    <link rel="stylesheet"href="<?php echo SITE_URL.'/assets/fooders/css/colorbox.css';?>" />
   <?php } ?>
	 <!--ace styles-->
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace.min.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace-responsive.min.css';?>" />
<link rel="stylesheet"
	href="<?php echo SITE_URL.'/assets/fooders/css/ace-skins.min.css';?>" />
<!--fonts-->
<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

<!--inline styles related to this page-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49965090-1', 'khateraho.com');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
 <script type="text/javascript">
if (top.location != self.location)
top.location = self.location;
</script>
<style>
	.label-danger{
		background-color: #e20334 !important;
	}
    @media only screen and (max-width: 422px)
    {
        .ace-nav>.mbltgl {
            display: none;
        }
        .navbar .togglenav {
                margin-left: 240px;
            }
           .navbar .togglenav input[type=checkbox].ace-switch+.lbl {
    margin-top: -7px;
}
   }



   
</style>


</head>
<body
	class="
<?php
echo fooder_panel_rtl . " ";
if (fooder_panel_color == '#222A2D')
	echo 'skin-1';
elseif (fooder_panel_color == '#C6487E')
	echo 'skin-2';
elseif (fooder_panel_color == '#D0D0D0')
	echo 'skin-3';
?>">
	<div
		class="navbar <?php if(fooder_panel_header!='') echo fooder_panel_header.'-top';?>">
		<div class="navbar-inner">
			<div class="container-fluid"
				style="padding-right: 0px; height: 20px;">
				<a href="<?php echo $link->link('dashboard',fooders);?>"> <small> <img
						alt="logo" width="150px;" 
						src="<?php echo SITE_URL.'/assets/mobile/img/wlogo.svg';?>"></small></a>
		
				<ul class="nav ace-nav pull-right togglenav">

				<li class="" title="click on button to change status">&nbsp;&nbsp;
	<span style="color:#fff;"> Are you open ?</span>				
 <input autocomplete="off" onchange="fooderHeaderStatus(this,'<?php echo $feature->encrypt_decrypt('encrypt',$_SESSION ['id']); ?>')" name="status" class="ace-switch" type="checkbox" <?php if (fooder_status == "1") echo "checked"; ?> /> 
<span class="lbl"></span>&nbsp;&nbsp;</li>


					 <!-- <li class=""> <span class="badge badge-primary" title="Your Operating System">  <?php  echo $feature->getOS();?></span></li>  -->
					<li class="mbltgl"><?php
					if (fooder_is_approved == '2') {
						echo "<span class='label label-info arrowed arrowed-right'>" . fhsa . "</span>";
					} elseif (fooder_is_approved == '1') {
						echo "<span class='label label-warning arrowed arrowed-right'>" . fhsap . "</span>";
					} elseif (fooder_is_approved == '3') {
						echo "<span class='label label-inverse arrowed arrowed-right'>" . fhsti . "</span>";
					} else {
						echo "<span class='label label-important arrowed arrowed-right'>" . fhss . "</span>";
					}
					?></li>
				
				

				<li class="purple mbltgl"></li>

				




					<li class="light-blue mbltgl"><a data-toggle="dropdown" href="#"
						class="dropdown-toggle"> <!-- <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" /> -->
							<span class="user-info"> <small><?php echo fhw;?></small>
									<?php
									
									$firstname = explode ( ' ', fooder_contact_name );
									echo $firstname = $feature->textstyler ( $firstname ['0'], 1 );
									?>
								</span> <i class="icon-caret-down"></i>
					</a>

						<ul
							class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">


							<li><a
								href="<?php echo $link->link('account_management',fooders); ?>">
									<i class="icon-user"></i> <?php echo fhpf;?>
							</a></li>

							<li class="divider"></li>

							<li><a href="<?php echo $link->link('logout', fooders, ''); ?>">
									<i class="icon-off"></i> <?php echo fhlog;?>
							</a></li>


					
						</ul></li>


						
				</ul>
				<!--/.ace-nav-->
			</div>
			<!--/.container-fluid-->
		</div>
		<!--/.navbar-inner-->
	</div>

	<div class="main-container container-fluid">
		<a class="menu-toggler" id="menu-toggler" href="#"> <span
			class="menu-text"></span>
		</a>
		<div id="gritter-notice-wrapper" style="overflow-y:scroll; max-height:500px;"></div>  
	