<?php


if($_REQUEST['userdata'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
	
	$get_new_discrepancy = $db->get_count('error',array('admin_view'=>'0'));
	
	
		echo ' <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i> <span class="label label-danger">'.$get_new_discrepancy.'</span>	
                    </a>
                   <ul class="dropdown-menu dropdown-alerts">
               <li><a href="#">
		<div>
		<i class="fa fa-warning"></i> New Discrepancy
		<span class="pull-right text-muted small label label-primary">'.$get_new_discrepancy.'</span>
		</div>
		</a></li></ul>';
               
        /*       <li><a href="#">
             <div>
             <i class="fa fa-shopping-cart"></i> New Order (s)
             <span class="pull-right text-muted small label label-info">'.$get_new_orders.'</span>
              </div>
              </a></li>
              <li class="divider"></li>
              <li><a href="#">
		<div>
		<i class="fa fa-user fa-fw"></i> New User (s)
		<span class="pull-right text-muted small label label-danger">'.$get_new_users.'</span>
		</div>
		</a></li>
		<li class="divider"></li>
              <li><a href="#">
                                <div>
                                    <i class="fa fa-comments fa-fw"></i> New Comment (s)
                                    <span class="pull-right text-muted small label label-success">'.$get_new_comments.'</span>
                                </div>
                            </a></li>
                            <li class="divider"></li>
		<li><a href="#">
		<div>
		<i class="fa fa-phone"></i> New Contact (s)
		<span class="pull-right text-muted small label label-warning">'.$get_new_contacts.'</span>
		</div>
		</a></li>
		<li class="divider"></li>
		';
	 */   

}
if($_REQUEST['orderstatus'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$total = $db->get_count('orders');
	$inprocess = $db->get_count('orders',array('status'=>'In Process'));
	$completed = $db->get_count('orders',array('status'=>'Completed'));
	$cancelled = $db->get_count('orders',array('status'=>'Cancelled'));
	
	
	
	echo ' <li> <a href="#">
                                <div>
                                    <p>
                                        <strong>In Process</strong>
                                        <span class="pull-right text-muted">'.round((($inprocess*100)/$total),0).'% In Process</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: '.round((($inprocess*100)/$total),0).'%">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Completed</strong>
                                        <span class="pull-right text-muted">'.round((($completed*100)/$total),0).'% Completed</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.round((($completed*100)/$total),0).'%">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Cancelled</strong>
                                        <span class="pull-right text-muted">'.round((($cancelled*100)/$total),0).'% Cancelled</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: '.round((($cancelled*100)/$total),0).'%">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>';
	
	
}
if($_REQUEST['dashstats'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$get_new_users = $db->get_count('eaters',array('admin_view'=>'0'));
	$db->group_by="`order_id`";
	$get_new_orders = $db->get_count('orders',array('fooder_view'=>'0'));
	
	$get_new_comments = $db->get_count('eaters_comments',array('admin_view'=>'0'));
	$get_new_contacts = $db->get_count('contact_feedback',array('admin_view'=>'0'));
	$basket = $db->get_count('food_basket');
	
	$fooders = $db->run("select `name` from `fooders` where `joining_date`> UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY))")->fetchAll();
	$recipes = $db->run("select `recipe_name` from `recipes` where `created_date`> UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY))")->fetchAll();
	$menus = $db->run("select `name` from `fooders_menus` where `entry_date`> UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY))")->fetchAll();
	$products = $db->run("select `name` from `fooders_products` where `entry_date`> UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 DAY))")->fetchAll();  
	$all_fooders = $db->get_count('fooders');
	$all_recipes = $db->get_count('recipes');
	$all_menus = $db->get_count('fooders_menus');
	$all_products=$db->get_count('fooders_products');
	$all_users = $db->get_count('eaters');
	$all_orders = $db->get_count('orders');
	$all_comments = $db->get_count('eaters_comments');
	$all_contacts = $db->get_count('contact_feedback');
	
	echo '<div class="row"><div class="col-lg-3 col-md-6">';
	if($get_new_comments>0){
			$myAudioFile = SITE_URL."/assets/fooders/sounds/Notify.mp3";
			echo '<EMBED SRC="'.$myAudioFile.'" HIDDEN="TRUE" AUTOSTART="TRUE" style="width:50px;"></EMBED>';
	echo '<span class="label label-danger pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.$get_new_comments.'</span>';
	}
                    echo '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                   
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_comments.'</div>
                                    <div>Total Comment(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('comments',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">';
	  			if($get_new_users>0){
	  				$myAudioFile = SITE_URL."/assets/fooders/sounds/Notify.mp3";
	  				echo '<EMBED SRC="'.$myAudioFile.'" HIDDEN="TRUE" AUTOSTART="TRUE" style="width:50px;"></EMBED>';
               echo '<span class="label label-danger pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.$get_new_users.'</span>';
	  			}
                 echo  '<div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_users.'</div>
                                    <div>Total User(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('users',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">';
				if($get_new_orders>0){
					$myAudioFile = SITE_URL."/assets/fooders/sounds/Notify.mp3";
					echo '<EMBED SRC="'.$myAudioFile.'" HIDDEN="TRUE" AUTOSTART="TRUE" style="width:50px;"></EMBED>';
                echo '<span class="label label-danger pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.$get_new_orders.'</span>';
				}
                 echo '<div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_orders.'</div>
                                    <div>Total Order(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('orders',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">';
	if($get_new_contacts>0){
		      echo '<span class="label label-default pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.$get_new_contacts.'</span>';
	}
                    echo '<div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_contacts.'</div>
                                    <div>Total Support Ticket(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('support_tickets',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></div>
	<div class="row"><div class="col-lg-3 col-md-6">';
	if(count($fooders)>0){
		// $myAudioFile = SITE_URL."/assets/fooders/sounds/Notify.mp3";
		//echo '<EMBED SRC="'.$myAudioFile.'" HIDDEN="TRUE" AUTOSTART="TRUE" style="width:50px;"></EMBED>';
     echo '<span class="label label-danger pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.count($fooders).'</span>';

	}
                echo    '<div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                   
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_fooders.'</div>
                                    <div>Total Fooder(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('fooders',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">';
	if(count($recipes)>0){
			   echo '<span class="label label-default pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.count($recipes).'</span>';
	}
                 echo  '<div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cutlery fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_recipes.'</div>
                                    <div>Total Recipe(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('recipes',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">';
	           if(count($menus)>0){
	             echo '<span class="label label-danger pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.count($menus).'</span>';
	           }    
                    echo '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_menus.'</div>
                                    <div>Total Menu(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('menus',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">';
                if(count($products)>0){
                  echo   '<span class="label label-danger pull-right"style="font-size:14px;"><i class="fa fa-bell fa-fw"></i>'.count($products).'</span>';
                }  
                  echo  '<div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-coffee fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$all_products.'</div>
                                    <div>Total Product(s)</div>
                                </div>
                            </div>
                        </div>
                        <a href="'.$link->link('products',admin).'">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></div>
                
                <div class="row"><div class="col-lg-3 col-md-6">
                  <div class="panel panel-green">
                  <div class="panel-heading">
                  <div class="row">
                  <div class="col-xs-3">
                  <i class="fa fa-gift fa-5x"></i>
                   
                  </div>
                  <div class="col-xs-9 text-right">
                  <div class="huge">'.$basket.'</div>
                  <div>Total Basket(s)</div>
                  </div>
                  </div>
                  </div>
                  <a href="#">
                  <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                  </div>
                  </a>
                  </div>
                  </div>
                  </div></div>';
                  
                  
                  
                  
                  
                  
                  
                  
}
?>