<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a class="<?php if($query2ans=="dashboard") echo "active";?>" href="<?php echo $link->link('dashboard',admin);?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                     
                        <li>
                            <a class="<?php if($query2ans=="users") echo "active";?>" href="<?php echo $link->link('users',admin);?>"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
                        <li>
                            <a class="<?php if($query2ans=="fooders") echo "active";?>" href="<?php echo $link->link('fooders',admin);?>"><i class="fa fa-user fa-fw"></i> Fooders</a>
                        </li>
                         <li>
                            <a class="<?php if($query2ans=="reward_points") echo "active";?>" href="<?php echo $link->link('reward_points',admin);?>"><i class="fa fa-trophy fa-fw"></i> Reward Points</a>
                        </li>
                         <li>
                            <a class="<?php if($query2ans=="map_generator") echo "active";?>" href="<?php echo $link->link('map_generator',admin);?>"><i class="fa fa-map-marker fa-fw"></i> Location Generator</a>
                        </li>
                        <li>
                            <a class="<?php if($query2ans=="orders" || $query2ans=="orders_details") echo "active";?>" href="<?php echo $link->link('orders',admin);?>"><i class="fa fa-shopping-cart fa-fw"></i> Orders</a>
                        </li>
                        <li>
                            <a class="<?php if($query2ans=="comments") echo "active";?>" href="<?php echo $link->link('comments',admin);?>"><i class="fa fa-comments fa-fw"></i> Comments</a>
                        </li>
                        
                         <li>
                            <a class="<?php if($query2ans=="support_tickets") echo "active";?>" href="<?php echo $link->link('support_tickets',admin);?>"><i class="fa fa-support fa-fw"></i> Support Tickets</a>
                        </li>
                        <li>
                            <a class="<?php if($query2ans=="recipes") echo "active";?>" href="<?php echo $link->link('recipes',admin);?>"><i class="fa fa-cutlery fa-fw"></i> Recipes</a>
                        </li>
                        
                         <li>
                            <a class="<?php if($query2ans=="menus") echo "active";?>" href="<?php echo $link->link('menus',admin);?>"><i class="fa fa-tasks fa-fw"></i> Menus</a>
                        </li>
                        <li>
                            <a class="<?php if($query2ans=="products") echo "active";?>" href="<?php echo $link->link('products',admin);?>"><i class="fa fa-coffee fa-fw"></i> Products</a>
                        </li>
                         <li>
                            <a class="<?php if($query2ans=="send_email_all") echo "active";?>" href="<?php echo $link->link('send_email_all',admin);?>"><i class="fa fa-envelope fa-fw"></i> Send Email All</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        