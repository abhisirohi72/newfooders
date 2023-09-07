<?php 
$get_social_links = $db->get_row('setting');
?>
<!-- Sidebars -->
    <div class="sidebar sidebar-left" toggleable parent-active-class="sidebar-left-in" id="mainSidebar">
    <h1 class="app-name">Main Menu</h1> 

<div class="scrollable sidebar-scrollable">
  <div class="scrollable-content">
    <div class="list-group" toggle="on" bubble target="mainSidebar">
      <a class="list-group-item" href="<?php echo $link->link('home',mobile);?>">Home <i class="fa fa-chevron-right pull-right"></i></a>
      <a class="list-group-item" href="<?php echo $link->link('open_recipes',mobile);?>">Recipes <i class="fa fa-chevron-right pull-right"></i></a>
      <a class="list-group-item" href="<?php echo $link->link('eaters_info',mobile);?>">Eaters/Users <i class="fa fa-chevron-right pull-right"></i></a> 
      <a class="list-group-item" href="<?php echo $link->link('fooders_business',mobile);?>">Fooders/Restaurants <i class="fa fa-chevron-right pull-right"></i></a>
      
      <a class="list-group-item" href="<?php echo $link->link('privacy-policy',mobile);?>">Privacy <i class="fa fa-chevron-right pull-right"></i></a>
      <a class="list-group-item" href="<?php echo $link->link('terms',mobile);?>">T & C <i class="fa fa-chevron-right pull-right"></i></a>
      <a class="list-group-item" href="<?php echo $link->link('contact',mobile);?>">Support <i class="fa fa-chevron-right pull-right"></i></a>
      <div class="row">
      <div class="col-xs-12 col-sm-12 col-lg-12">
      <div class="col-xs-4 col-sm-4 col-lg-4">
      <a class="list-group-item" href="<?php echo $get_social_links['facebook'];?>" target="_blank"><i class="fa fa-facebook-square fa-2x text-primary"></i></a>
      </div>
      <div class="col-xs-4 col-sm-4 col-lg-4 text-center">
      <a class="list-group-item" href="<?php echo $get_social_links['twitter'];?>" target="_blank"><i class="fa fa-twitter-square fa-2x text-info"></i></a>
      </div>
      <div class="col-xs-4 col-sm-4 col-lg-4 text-right">
      <a class="list-group-item" href="<?php echo $get_social_links['google_plus'];?>" target="_blank"><i class="fa fa-google-plus-square fa-2x text-red"></i></a>
      </div>
      </div>
      </div>
    
       </div>

  </div>
</div>
    
    </div>

<div  class="sidebar sidebar-right" toggleable parent-active-class="sidebar-right-in" id="rightSidebar">
<h1 class="app-name">Account</h1>
<div class="scrollable">
  <div class="scrollable-content">
    <div class="list-group" toggle="off" bubble target="rightSidebar">
      <?php 
      if(!$session->Check() && $_SESSION['type']!=='eater'){
      	?>
      <a class="list-group-item" href="<?php echo $link->link('register',mobile);?>"><i class="fa fa-edit"></i> Sign Up Here</a>
      <a class="list-group-item" href="<?php echo $link->link('access',mobile);?>"><i class="fa fa-key"></i> Sign In</a>
      <?php }else{?>
      <a class="list-group-item" href="<?php echo $link->link('profile',mobile);?>"><i class="fa fa-info-circle"></i> My Stash</a>
      <a class="list-group-item" href="<?php echo $link->link('eater_addresses',mobile);?>"><i class="fa fa-home"></i> Addresses</a>
      <a class="list-group-item" href="<?php echo $link->link('reviews',mobile);?>"><i class="fa fa-comments"></i> Reviews</a>
      <a class="list-group-item" href="<?php echo $link->link('recipes',mobile);?>"><i class="fa fa-cutlery"></i> Write Your Recipe</a>
      <a class="list-group-item" href="<?php echo $link->link('recipes_view',mobile);?>"><i class="fa fa-eye"></i> View Your Recipe</a>
      <a class="list-group-item" href="<?php echo $link->link('change_password',mobile);?>"><i class="fa fa-unlock"></i> Change Password</a>
      <a class="list-group-item" href="<?php echo $link->link('eater_orders',mobile);?>"><i class="fa fa-automobile"></i> Orders</a>
      <a class="list-group-item" href="<?php echo $link->link('logout',mobile);?>"><i class="fa fa-power-off"></i> Logout</a>
      <?php }?>
      </div>
  </div>
</div>
</div>

    <div class="app">
 
      <!-- Navbars -->
     
     <div class="navbar navbar-app navbar-absolute-top">
       
        <div class="navbar-brand navbar-brand-center">
         <a href="<?php echo $link->link('home',mobile);?>"><img src="<?php echo SITE_URL.'/assets/mobile/img/krblogo.png';?>" style="height:33px;"></a>
        </div>
        
        <div class="btn-group pull-left">
          <div ng-click="toggle('mainSidebar')"  class="btn btn-navbar sidebar-toggle">
            <i class="fa fa-bars"></i> 
          </div>
        </div>
        <div class="btn-group pull-right">
          <div ng-click="toggle('rightSidebar')" class="btn btn-navbar">
            <?php 
      if(!$session->Check() && $_SESSION['type']!=='eater'){
      	?>
            <i class="fa fa-sign-in fa-lg"></i> 
          <?php }else{?>
          <i class="fa fa-user fa-lg"></i>
          <?php }?>
          </div>
        </div>
      </div>
   
      <!-- App Body -->
      <div class="app-body" ng-class="{loading: loading}" ng-swipe-left="toggle('mainSidebar', 'off')"
        ng-swipe-right="toggle('rightSidebar', 'off')"> 
     
      <div ng-show="loading" class="app-content-loading">
          <i class="fa fa-spinner fa-spin loading-spinner"></i>
        </div>
        <ng-view class="app-content" ng-hide="loading"></ng-view>
      <div class="app-content ng-scope">  
      
      <div class="scrollable">
<div class="scrollable-content bg-white"> 


  
    
       