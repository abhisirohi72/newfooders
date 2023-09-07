 <div class="wrapper">
 <div class="row-fluid">
      <div class="span12">
      <div class="span6">
      <h3>Pay with cash on delivery</h3>
      </div>
      <div class="span6 right">
      <h3>Amount Payable : <?php echo currency.' '.$final_total_inpoints;?></h3>
      </div>
      </div>
      </div>
      <div class="kr-hr"></div>
      <br>
<?php if($_SESSION['order_type']=="takeout"){?>
<?php if($display_error){?>
<div class="row-fluid center">
<div class="span12"><?php echo $display_error;?></div>
</div>
<?php }?>      
<div class="row-fluid">
<div class="span12">
<div class="span3"></div>
<div class="span6 bg-light-blue padding-left-recipe text-white">

<br><div class="row-fluid">
<div class="span12"><h2>Your Details</h2></div>
</div>
<div class="pro-hr2"></div>
<div class="row-fluid">
<div class="span12">
<div class="span3"><h4>Name : </h4></div>
<div class="span9">
<h4><?php echo $eater_details['name'];?></h4>
</div>
</div>
</div>

<div class="row-fluid">
<div class="span12">
<div class="span3"><h4>Address : </h4></div>
<div class="span9">
<h4><?php echo $eater_details['address'].'<br>'.$region_name['1'].'<br>'.$eater_details['city'].'<br>'.$eater_details['state'];?></h4>
</div>
</div>
</div>
<br>
<div class="row-fluid">
<div class="span12">
<div class="span3"><h4>Contact No. : </h4></div>
<div class="span9">
<h4><?php echo $eater_details['mobile'];?></h4>
</div>
</div>
</div>
</div>
<div class="span3"></div>
</div>
</div>
<div class="pro-hr2"></div>
<?php }?>


<?php if($_SESSION['order_type']=="delivery"){?> 
 <div class="row-fluid">
      <div class="span12">
      <div class="span5"><h3>Your Saved Delivery Addresses</h3></div>
      <div class="span7">
       <?php echo $display_error;?>
      </div>
      </div>
      </div> 
      <div class="kr-hr"></div>
      <br><br>
     
             <?php 
       $counter = count($get_addresses);
       $i=0;
       if(is_array($get_addresses)){
       foreach($get_addresses as $address){
       	if ($i % 3 == 0) {
       		echo '<div class="row-fluid">';
       	}
       	if($address['default']==='1')
       	echo "<div class='span4 bg-green' style='padding-left:5px;color:#ffffff;'>";
       	else 
       		echo "<div class='span4 bg-red' style='padding-left:5px;color:#ffffff;'>";
       ?>
       <br><b class="left address-basket">Address <?php echo $i+1;?></b>
       <?php if($address['default']==='1') echo '<i class="icon-check fltrt address-basket-icon"></i>';
       else
       	echo '<i class="icon-check-empty fltrt address-basket-icon"></i>';
       ?>
       <div class="pro-hr2"></div>
       <b><?php echo $address['address'].'<br>'.$address['region_name'].'<br>'.$address['city'].'-'.$address['zip'].'<br>'.$address['state'];
       ?></b>
       <?php if($address['default']==='1'){?>
       <div class="pro-hr2"></div>
       <div class="span12 center padding-default"><h3 class="text-white">Your Current Address</h3></div>
       <?php }?>
     <br>
       <?php if($address['default']==='0'){?>
		<div class="pro-hr2"></div>      
       <div class="span12 center">
       <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
       
       <input type="hidden" name="addressid" value=<?php echo $address['id'];?>>
       <input type="hidden" name="default_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
       <button type="submit" name="default_submit" class="btn btn-warning">Set For Delivery Address</button>
       </form>
        <br>
       </div>
      
      <?php } echo "</div>";
                    if($i%3==2 || $i==($counter)){
                    	echo '</div><br>';
                    } $i++;
                    
} }?>
</div>

<div class="pro-hr2"></div>
<div class="row-fluid">
<div class="span12 center">
<a href="<?php echo $link->link('eater_addresses');?>" class="btn btn-info btn-large">Add New Address</a>
</div>
</div>
<div class="pro-hr2"></div>
<?php }?>


<div class="row-fluid">
<div class="span12 right">
<form method="post" action="">
<input type="hidden" name="place_order_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
<input type="hidden" name="order_type" value="<?php echo $_SESSION['order_type'];?>">
<input type="hidden" name="payment_type" value="Cash On Delivery">
<button type="submit" name="place_order" id="order-load" class="btn btn-success btn-large">Place Order</button>
</form>

</div>
</div>
<br><br>
 </div>
 
 
 
 