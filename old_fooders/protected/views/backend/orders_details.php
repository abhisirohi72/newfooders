<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="huge">Order Details</span>
                </div>
                
                <?php if(is_array($result)){
                foreach($result as $key=>$value){
                	$date_time = $value['0']['creation_date'];
                	$joining_date = date ( 'd M Y', $date_time );
                	$joining_time = date ( 'g:i a', $date_time );
                	?>
                
                <div class="row">
                <div class="col-lg-12">
                
                <div class="row">
                <div class="col-lg-12 tooltip-demo">
                <div class="col-lg-6">
                <h3><span class="label label-primary" data-toggle="tooltip" data-placement="top" data-original-title="Order Number"><i class="fa fa-coffee"></i> <?php echo $key;?></span></h3>
                </div>
                <div class="col-lg-6">
                <?php echo '<span class="text-success" data-toggle="tooltip" data-placement="top" data-original-title="Order Placed On">'.$joining_date.','.$joining_time.'</span> 
                	| <span class="text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Order Type">'.$feature->textstyler($value['0']['order_type'], 0).'</span>';?>
                </div>
                </div>
                </div>
               
                <?php if(is_array($value)){
               $total_amt=0;
         foreach($value as $orders){
         	$product_details = unserialize($orders['details']);
         	$total_amt=$total_amt+ceil($orders['total']);
                	?>
                <div class="row">
                <div class="col-lg-12 tooltip-demo">
                <div class="col-lg-6">
                <h4 data-toggle="tooltip" data-placement="top" data-original-title="Fooder Name"> <?php echo $orders['fooder_name'];?></h4>
                </div>
                <div class="col-lg-6">
                
                
               <span class="<?php if($orders['status']=="In Process") echo "label label-warning";
               elseif ($orders['status']=="Completed") echo "label label-success";
               else echo "label label-important";?>" data-toggle="tooltip" data-placement="top" data-original-title="Status"><?php echo $orders['status'];?></span>
			     </div>
	            </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                
                
                <?php foreach($product_details as $product){?>
                <div class="row">
                <div class="col-lg-12">
        	    <div class="col-lg-6 text-muted"><?php echo $product['quantity']." x ".$product['product_name'];?></div>
			    <div class="col-lg-6">
			    <span class="text-right" data-toggle="tooltip" data-placement="top" data-original-title="Price : <?php if($product['product_proprice']==='0'){ echo $product['quantity']." x ".$product['product_price'];} else{ echo $product['quantity']." x ".$product['product_proprice'];}?>">
			    <i class="fa fa-rupee"></i>
				<?php if($product['product_proprice']==='0'){ echo $product['product_price']*$product['quantity'];}else{ echo $product['product_proprice']*$product['quantity'];}?>&nbsp; &nbsp;</span>
			    </div>
			  
			    </div>
                </div>
                <?php }?>
                <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-5"></div>
                <div class="col-lg-7" style="padding-left:30px;">
                <b>Subtotal &nbsp; &nbsp;<i class="fa fa-rupee"></i>  <?php echo $orders['subtotal'];?></b>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-4"></div>
                <div class="col-lg-8" style="padding-left:50px;">
                <i class="fa fa-truck"></i> <span class="text-muted"> Delivery Charges  &nbsp; &nbsp;</span><?php if($orders['delivery_charge']!=='0'){ echo "<i class='fa fa-rupee'></i>".$orders['delivery_charge'];}else{ echo "<span class='label label-success'> FREE</span>";}?>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-4"></div>
                <div class="col-lg-8" style="padding-left:20px;">
                <i class="fa fa-plane"></i> <span class="text-muted"> Service Charge (<?php echo $orders['service_charge']." %";?>) &nbsp; &nbsp;</span> <i class="fa fa-rupee"></i> <?php echo ($orders['subtotal']*$orders['service_charge'])/100;?> 
                </div>
                </div>
                </div>
                 <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-4"></div>
                <div class="col-lg-8" style="padding-left:68px;">
               <i class="fa fa-legal"></i> <span class="text-muted"> VAT (<?php echo $orders['vat']." %";?>) &nbsp; &nbsp;</span> <i class="fa fa-rupee"></i> <?php echo ($orders['subtotal']*$orders['vat'])/100;?>
                </div>
                </div>
                </div>
                 <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-5"></div>
                <div class="col-lg-7" style="padding-left: 45px;">
                <b>Total &nbsp; &nbsp; &nbsp;<i class="fa fa-rupee"></i> <?php echo ceil($orders['total']);?></b>
                </div>
                </div>
                </div>
                
                
                
                </div>
                </div>
               
               <hr>
         <?php } }?>
                 
                </div>
                </div>
              
                <?php } }?>
            </div>
            
          </div>