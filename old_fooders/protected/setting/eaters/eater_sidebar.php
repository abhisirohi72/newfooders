<ul class="uk-list color uk-nav profile-menu">
    <li class="<?php if($query1ans=="profile") echo "active";?>"><a href="<?php echo $link->link('profile',eaters);?>"><i class="fa fa-user"></i> My Stash</a></li>
    <li class="<?php if($query1ans=="eater_addresses") echo "active";?>"><a href="<?php echo $link->link('eater_addresses',eaters);?>"><i class="fa fa-address-book"></i> Addresses</a></li>
    <li class="<?php if($query1ans=="reviews" || $query1ans=="reviews_edit") echo "active";?>"><a href="<?php echo $link->link('reviews',eaters);?>"><i class="fa fa-star"></i> Reviews</a></li>
    <li class="<?php if($query1ans=="eater_orders") echo "active";?>"><a href="<?php echo $link->link('eater_orders',eaters);?>"><i class="fa fa-address-book"></i> Order History</a></li>
    <li class="<?php if($query1ans=="change_password") echo "active";?>"><a href="<?php echo $link->link('change_password',eaters);?>"><i class="fa fa-unlock"></i> Change Password</a></li>
    <li class="<?php if($query1ans=="logout") echo "active";?>"><a href="<?php echo $link->link('logout',eaters);?>"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>