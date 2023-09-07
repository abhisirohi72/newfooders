  <?php
if(!$session->Check() && $_SESSION['type']!=='eater'){
	$session->redirect('home',eaters);
}
else{
  ?>
 
   <div class="wrapper" >
      <div class="row-fluid kr-row-fluid">
         <div class="span12">
          <?php require SERVER_ROOT.'/protected/setting/eaters/eater_sidebar.php';?>
           
        <div class="span8 kr-span">
          <?php if($thankyou){?>
          <div class="row-fluid">
            <div class="span12">
           <?php echo $thankyou;?>
            </div>
         </div><br> 
         <?php }?>
         <div class="row-fluid">
         <div class="span12">
         <div class="span6">
         <h3>Orders Placed</h3>
         </div>
         <div class="span6 right">
        <input type="text" id="filter" placeholder="Search orders" value="">
         </div>
         </div>
         </div>
         <div class="kr-hr"></div>
         <br>
   
         <?php 
     
         if(count($get_orders_all)!=0){
         	foreach($result as $key=>$get_orders)
         {
         if(count($get_orders)!='0'){
         	
         	$creation_date_time = $result[$key]['0']['creation_date'];
         	$creation_date = date('d M Y',$creation_date_time);
         	$creation_time = date('g:i a',$creation_date_time);
         	?>
         <div class="row-fluid list">
         <div class="span12">	
         <div class="row-fluid"><div class="span12">
         <div class="span3">
         <span class="label" rel="tooltip" data-placement="top" data-original-title="Order Number" style="font-size: 18px;background-color: #00aeec;" ><i class="icon-coffee" style="padding-top:5px;"></i>&nbsp;&nbsp;<?php echo $get_orders['0']['order_id'];?>
		 </span>
		</div>
		<div class="span3"></div>
		<div class="span6 right">
		<span rel="tooltip" data-placement="top" data-original-title="Order Placed On" style="font-weight: bold;color:gray;"><?php echo $creation_date.' , '.$creation_time; ?></span>
		|
		<span rel="tooltip" data-placement="top" data-original-title="Order Type" style="font-weight: bold;color:gray;"><?php echo $feature->textstyler($get_orders['0']['order_type'], '0');?></span>
		</div>
			
		 </div></div>
		 
         <?php if(is_array($get_orders)){
         	$total_amt=0;
         foreach($get_orders as $orders){
         	$product_details = unserialize($orders['details']);
         	$total_amt=$total_amt+ceil($orders['total']);
         	$order_address = $orders['address'];
         	$order_address = explode(',',$order_address);
         	
         	?>   
			<div class="row-fluid">
			<div class="span12">
			<div class="span7">
			
			<span style="font-size: 16px;font-weight: bold" rel="tooltip" data-placement="top" data-original-title="Fooder Name">
			<?php echo $orders['fooder_name'];?>
			</span>
			<br>
			<?php foreach($product_details as $product){?>
			<div style="font-size:14px;color:#ADADAD;"><?php echo $product['quantity']." x ".$product['product_name'];?>
			<span style="float:right;" rel="tooltip" data-placement="top" data-original-title="Price : <?php if($product['product_proprice']==='0'){ echo $product['quantity']." x ".$product['product_price'];} else{ echo $product['quantity']." x ".$product['product_proprice'];}?>">
			<i class="icon-inr" style="padding-top: 2px;"></i><?php if($product['product_proprice']==='0'){ echo $product['product_price']*$product['quantity'];}else{ echo $product['product_proprice']*$product['quantity'];}?>&nbsp; &nbsp;</span></div>
			<?php }?>
			<?php if($orders['order_type']=="delivery"){?>
			<br><div class="row-fluid bg-gray">
			<div class="span12 padding-left-recipe">
			<b>Address : <?php echo $orders['address'];?></b>
			</div>
			</div>
			<?php }?>
			</div>
			<div class="span5" style="text-align: right;">
			
			<span class="<?php if($orders['status']=="In Process") echo "label label-warning";elseif ($orders['status']=="Completed") echo "label label-success";else echo "label label-important";?>" rel="tooltip" data-placement="top" data-original-title="Status"><?php echo $orders['status'];?></span>
			<i class="icon-book" style="color: green;" rel="tooltip" data-placement="top" data-original-title="Subtotal : <?php echo "<i class='icon-inr' style='padding-top:2px;'></i>".$orders['subtotal'];?>"></i>
			&nbsp;
			<i class="icon-truck" style="color: orange;" rel="tooltip" data-placement="top" data-original-title="Delivery Charge : <?php if($orders['delivery_charge']!=='0'){ echo "<i class='icon-inr' style='padding-top:2px;'></i>".$orders['delivery_charge'];}else{ echo "FREE";}?>"></i>
			&nbsp;
			<i class="icon-plane" style="color: purple;" rel="tooltip" data-placement="top" data-original-title="Service Charge : <?php echo $orders['service_charge']." %";?>"></i>
			&nbsp;
			<i class="icon-legal" style="color: gray;" rel="tooltip" data-placement="top" data-original-title="VAT : <?php echo $orders['vat']." %";?>"></i>
			&nbsp;<span rel="tooltip" data-placement="top" data-original-title="Total amount including VAT, service charge and delivery charges" style="font-weight: bold;"><i class="icon-inr"></i>&nbsp;<?php echo ceil($orders['total']);?></span>
			
			</div>
			</div>
			</div>
			
			<?php 
         }
         }?>
        
			<div class="row-fluid">
			<div class="span12"  style="font-size:1.5em;font-weight:bold;text-align:right">
			<span class="badge badge-success"><?php echo $get_orders['0']['payment_type'];?></span><span rel="tooltip" data-placement="top" data-original-title="Total Amount Paid" ><i class="icon-inr" style="padding-top:4px;"></i>
			<?php echo $total_amt;?>
			</span>
			</div>
			</div>
			
			 <?php }?>
          <div class="kr-hr"></div><br></div></div>
         <?php }}else{?>
			 <div class="row-fluid">
			 <div class="span12 center">
			 <h2>You Have Not Placed Any Order Yet</h2>
			 </div>
			 </div>
			 <?php }?>
			
			           
			 
			 
          </div>
        </div>
        </div>   
        </div><!-- /wrapper -->	
        <?php }?>						