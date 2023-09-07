<div
	class="sidebar <?php if(fooder_panel_sidebar!='') echo fooder_panel_sidebar;?>"
	id="sidebar">
	<?php
	
if (fooder_panel_sidebar != '' && fooder_panel_header == '')
		echo '<img src="' . SITE_URL . '/assets/fooders/img/logo.png">';
	?>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<!-- <a
				href="<?php echo $link->link('fooders_cp',fooders,'?tab=tab-1'); ?>"
				class="btn btn-small btn-success tooltip-warning" data-rel="tooltip"
				data-placement="bottom" title=""
				data-original-title="<?php echo fsfbf;?>"> <i class="icon-bullseye"></i>
			</a> <a
				href="<?php echo $link->link('fooders_cp',fooders,'?tab=tab-2'); ?>"
				class="btn btn-small btn-info" data-rel="tooltip"
				data-placement="bottom" data-original-title="<?php echo fsfss;?>"> <i
				class="icon-gears"></i>
			</a> <a
				href="<?php  echo $link->link('fooders_cp',fooders,'?tab=tab-3'); ?>"
				class="btn btn-small btn-danger" data-rel="tooltip"
				data-placement="bottom" data-original-title="<?php echo fsfdr;?>"> <i
				class=" icon-truck"></i>
			</a> <a
				href="<?php echo $link->link('fooder','','&fooder_profile_token='.$fooder_id);?>"
				class="btn btn-small btn-warning" target="_blank" data-rel="tooltip"
				data-placement="bottom"
				data-original-title="<?php echo fsvl." ".fooder_name." ".fsw;?>"> <i
				class="icon-rocket"></i>
			</a> -->
			<h3><?php echo fooder_uniqueid; ?></h3>
		</div>
		<!-- <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span> <span class="btn btn-info"></span>
			<span class="btn btn-warning"></span> <span class="btn btn-danger"></span>
		</div> -->
	</div>
	<!--#sidebar-shortcuts-->
	<a
		href="<?php  echo $link->link('fooders_cp',fooders,'?tab=tab-2'); ?>">
	<?php if(fooder_logo_exist!=''){?>
	<img alt="logo" src="<?php echo fooder_logo.'?'.rand(1,10); ?>">
	<?php }else{?>
	<img alt="logo" style="width: 200px; height: auto;"
		src="<?php echo SITE_URL.'/assets/fooders/img/noimage.png'?>">
	<?php }?>
	</a>

	<ul class="nav nav-list">
		<!--   <li></li>
	    <li>&nbsp; &nbsp;&nbsp; <i class="icon-star bigger-150 orange"></i>&nbsp;<i class="icon-star bigger-150 orange"></i>&nbsp;<i class="icon-star-half-empty bigger-150 orange"></i>
	   &nbsp;<i class="icon-star-empty bigger-150 orange"></i>&nbsp;<i class="icon-star-empty bigger-150 orange"></i>
	    </li> -->
		<!-- <li class="<?php if($query2ans=="dashboard") echo "active"; ?>"><a
			href="<?php echo $link->link('dashboard',fooders); ?>"> <i
				class=" icon-dashboard"></i> <span class="menu-text"> <?php echo fsd;?> </span>
		</a></li> -->

		<li class="<?php if($query2ans=="live_orders") echo "active"; ?>"><a
			href="<?php echo $link->link('live_orders',fooders); ?>"> <i
				class=" icon-dashboard"></i> <span class="menu-text"> Live Orders </span>
		</a></li>
		<li class="<?php if($query2ans=="menu" || $query2ans=="view_menus" ) echo "active"; ?>"><a
			href="<?php echo $link->link('view_menus',fooders); ?>"> <i
				class="icon-list-alt"></i> <span class="menu-text"> <?php echo fscm;?> </span>
		</a></li>
		<!-- <li
			class="<?php if($query2ans=="menu" || $query2ans=="view_menus" ) echo "active"; ?>">
			<a href="#" class="dropdown-toggle"> <i class="icon-list-alt"></i> <span
				class="menu-text"> <?php echo fscm;?> </span> <b
				class="arrow icon-angle-down"></b>
		</a>
			<ul class="submenu">
				<li><a href="<?php echo $link->link('menu',fooders); ?>"><i
						class="icon-double-angle-right"></i> <?php echo fsam;?>
				</a></li>
				<li><a href="<?php echo $link->link('view_menus',fooders); ?>"> <i
						class="icon-double-angle-right"></i> <?php echo fsvm;?>
				</a></li>
			</ul>
		</li> -->
		<li class="<?php if($query2ans=="view_products" || $query2ans=="products" || $query2ans=="products_optional" ) echo "active"; ?>"><a
			href="<?php echo $link->link('view_products',fooders); ?>"> <i
				class="icon-food"></i> <span class="menu-text"> <?php echo fsdp;?> </span>
		</a></li>

		<!-- <li
			class="<?php if($query2ans=="view_products" || $query2ans=="products" || $query2ans=="products_optional" ) echo "active"; ?>">
			<a href="#" class="dropdown-toggle"> <i class="icon-food"></i> <span
				class="menu-text"> <?php echo fsdp;?> </span> <b
				class="arrow icon-angle-down"></b>
		</a>
			<ul class="submenu">
				<li><a href="<?php echo $link->link('products',fooders); ?>"> <i
						class="icon-double-angle-right"></i> <?php echo fsap;?>
				</a></li>
				<li><a href="<?php echo $link->link('view_products',fooders); ?>"> <i
						class="icon-double-angle-right"></i> <?php echo fsvp;?>
				</a></li>


				
			</ul>
		</li> -->
			<li class="<?php  if($query2ans=="orders" || $query2ans=="orders_details" ) echo "active"; ?>">
			<a href="<?php  echo $link->link('orders',fooders); ?>"> <i class="icon-shopping-cart"></i> <span class="menu-text"> <?php echo fot;?> </span>
		</a></li> 
		<!-- 	<li class="<?php // if($query2ans=="promotionals" ) echo "active"; ?>"><a
			href="<?php // echo $link->link('promotionals',fooders); ?>"> <i
				class=" icon-asterisk"></i> <span class="menu-text"> Promotionals(to
					be made) </span>
		</a></li> -->

	
		<li class="<?php if($query2ans=="fooders_cp" ) echo "active"; ?>"><a
			href="<?php echo $link->link('fooders_cp',fooders); ?>"
			class="dropdown-toggle"><i class="icon-renren"></i><span
				class="menu-text"> <?php echo fsfcp;?> </span> </a></li>
		<!-- <li class="<?php if($query2ans=="fooders_staff" ) echo "active"; ?>"><a
			href="<?php echo $link->link('fooders_staff',fooders); ?>"
			class="dropdown-toggle"><i class="icon-user"></i><span
				class="menu-text"> <?php echo fsfstaff;?> </span> </a></li>		 -->
		<!-- <li class="<?php if($query2ans=="delivery_guys" || $query2ans=="add_delivery_guy" || $query2ans=="edit_delivery_guy" ) echo "active"; ?>"><a
			href="<?php echo $link->link('delivery_guys',fooders); ?>"> <i
				class="icon-user"></i> <span class="menu-text"> Delivery Persons</span>
		</a></li> -->
 
		<li class="<?php if($query2ans=="verification") echo "active"; ?>"><a
			href="<?php echo $link->link('verification',fooders); ?>"> <i
				class=" icon-file"></i> <span class="menu-text"> Verification </span>
		</a></li>
<?php /*
		<li class="<?php if($query2ans=="offers" || $query2ans=="add_offer" || $query2ans=="edit_offer") echo "active"; ?>"><a
			href="<?php echo $link->link('offers',fooders); ?>"> <i
				class=" icon-ticket"></i> <span class="menu-text"> Offers </span>
		</a></li>
		*/?>

		<li class="<?php if($query2ans=="manage_tables") echo "active"; ?>"><a
			href="<?php echo $link->link('manage_tables',fooders); ?>"> <i
				class="icon-list-alt"></i> <span class="menu-text"> Manage Tables </span>
		</a></li> 
		<li class="<?php if($query2ans=="qrcode_settings") echo "active"; ?>"><a 
			href="<?php echo $link->link('qrcode_settings',fooders); ?>"> <i
				class="icon-list-alt"></i> <span class="menu-text"> QR Code Settings </span>
		</a></li> 
		<li class="<?php if($query2ans=="online_ordering") echo "active"; ?>"><a
			href="<?php echo $link->link('online_ordering',fooders); ?>"> <i
				class="icon-list-alt"></i> <span class="menu-text"> Online Ordering</span>
		</a></li> 
		<!-- <li class="<?php if($query2ans=="payments") echo "active"; ?>"><a
			href="<?php echo $link->link('payments',fooders); ?>"> <i
				class="icon-list-alt"></i> <span class="menu-text"> Payments </span> 
		</a></li>  -->


		<!-- <li class="<?php if($query2ans=="image_gallery") echo "active"; ?>"><a
			href="<?php echo $link->link('image_gallery',fooders); ?>"> <i
				class="icon-picture"></i> <span class="menu-text"> <?php echo fsig;?> </span>
		</a></li> -->
		<li class="<?php if($query2ans=="account_management") echo "active"; ?>"><a
			href="<?php echo $link->link('account_management',fooders); ?>"> <i
				class="icon-user"></i> <span class="menu-text"> <?php echo fhpf;?> </span>
		</a></li>
		<li><a href="<?php echo $link->link('logout',fooders); ?>"> <i
				class="icon-off"></i> <span class="menu-text"> <?php echo fhlog;?> </span>
		</a></li>

		
		
		<?php 
/*<li class="<?php if($query2ans=="plans") echo "active"; ?>"><a
			href="<?php/*
				       * <li class="<?php if($query2ans=="plans") echo "active";
				       * ?>"><a href="<?php echo $link->link('plans',fooders); ?>">
				       * <i class="icon-trophy"></i> <span class="menu-text">
				       * Upgrades/Plans </span> </a></li>
				       */


		?>
	</ul>
	<!--/.nav-list-->
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>
<div class="main-content">
	<div
		class="breadcrumbs <?php if(fooder_panel_breadcrumb!='') echo 'fixed';?>"
		id="breadcrumbs">
		<ul class="breadcrumb">
			<li><i class="icon-home home-icon"></i> <a
				href="<?php echo $link->link('dashboard',fooders);?>"><?php echo fsh;?></a> 
				<span class="divider"> <i class="icon-angle-right arrow-icon"></i>
			</span></li>
			<li class="active"><?php echo $feature->textstyler($query2ans, 1);?></li>
		</ul>
		<!--.breadcrumb-->

		<!-- <div class="nav-search" id="nav-search">
			<form class="form-search" />
			<span class="input-icon"> <input type="text" placeholder="Search ..."
				class="input-small nav-search-input" id="nav-search-input"
				autocomplete="off" /> <i class="icon-search nav-search-icon"></i>
			</span>
			</form>
		</div> -->
		<!--#nav-search-->
	</div>