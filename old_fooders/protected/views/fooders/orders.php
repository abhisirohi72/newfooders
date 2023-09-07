	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo fot;?> <small> <i class="icon-double-angle-right"></i>
					<?php echo fotl;?>
				</small>
			</h1>
		</div>
		<!--/.page-header-->

		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<div class="row-fluid" >
					<table id="sample-table-5"
						class="table table-striped table-bordered table-hover">
						<thead>
							<tr><th  width="10%" class="hidden"><b>id</b></th>
                                <th  width="10%"><b>Order#</b></th>
								<th class="hidden-phone" width="10%"><b class="blue">Client Details</b></th>
								
								<th  width="10%"><b class="blue">Amount</b></th>
								<th  width="35%"><b class="blue">Suggestions</b></th>
								<th  width="5%"><b class="blue">Order Status</b></th>
								<th  width="10%"><b class="blue">Payment Status</b></th>
								<th width="20%" ><b class="blue">Action</b></th>
								

							</tr> 
						</thead>

						<tbody>
                         
							<?php
							// echo "<pre>";
							// print_r($get_order_eater_details);
							// echo "<pre>";
							
							if(is_array($get_order_eater_details)){
							foreach($get_order_eater_details as $orders){
							$creation_date_time = $orders['creation_date'];
         	                $creation_date = date('d M Y',$creation_date_time);
         	                $creation_time = date('g:i a',$creation_date_time);
         	                $region = explode('___',$orders['region']);
         	                //$product_details = unserialize($orders['details']);
                              $product_details = json_decode($orders['details'],true);
							  $eater_suggestions=isset($orders['eater_suggestions'])?$orders['eater_suggestions']:'';

							  $table_number="";
if($orders['table_id']>0 && $orders['order_mode']==0)
{
	$table_number=$db->get_var('fooders_tables',array('fooder_id'=>$orders['fooder_id'],'id'=>$orders['table_id']),'table_no');
	$table_number='<b>Table No-'.$table_number.'</b>';
}
elseif($orders['table_id']==0 && $orders['order_mode']==0)
{
	$table_number='<b>Counter</b>';

}else{
	$table_number=''; 
}


$subtotal = isset($new_array[$orders['id']])?array_sum($new_array[$orders['id']]):0;

$discount=0.00;

$discount_rate=$orders['discount_rate'];
$discount_type=$orders['discount_type'];

if($discount_rate>0)
{
	if($discount_type==0)
	{
		$discount=($subtotal*$discount_rate)/100;
	
	}
	else if($discount_type==1)
	{
		$discount=$discount_rate; 
	
	}


}
$after_discount_amount=$subtotal-$discount;
$service_charge_details=json_decode($orders['service_charge_details'],true); 

$service_charge=($after_discount_amount*$service_charge_details['percentage'])/100;

$taxable_amount=$after_discount_amount+$service_charge;

$tax_details=json_decode($orders['tax_details'],true);
$tax_amount=0;
if(is_array($tax_details))
{
foreach($tax_details as $trow)
{
$tax_amount+=($taxable_amount*$trow['percentage'])/100;
}

}
$delivery_charge=$orders['delivery_charge'];
$amount=0;
$amount=$after_discount_amount+$tax_amount+$delivery_charge+$service_charge;






							?>
							<tr>
							<td class="hidden"><?php echo $orders['id']; ?></td>



							    <td>
							    <b>
									
								<?php 
								if($orders['order_mode']=='0')
								{
									echo '#'.$orders['order_number_qrcode'];
								}else{
									echo '#'.$orders['order_number'];
								}
								?></b>
								
								
								
								<div class="divider grey"><?php echo $table_number?></div>
							    <div class="divider grey"><?php echo $creation_date.' , '.$creation_time;?></div>
							    </td>
								
								<td class="hidden-phone">
									<address class="info">
													<?php if($orders['name']!='') echo isset($orders['name'])?"<strong><i class='icon-user'></i>&nbsp;".$orders['name']."</strong>":'';?>
                                                    <?php // if($orders['address']!='') echo isset($orders['address'])?"<br><i class='icon-home'></i>&nbsp;".$orders['address']:'';?>
													<?php // if($region['1']!='') echo isset($region['1'])?"<br>".$region['1']:'';?>
													<?php if(isset($orders['mobile']) && $orders['mobile']!=""){ echo "<br><i class='icon-mobile-phone'></i>&nbsp;(91)" .$orders['mobile']; }?>
												</address> </td>
								
								<td><b class="red"> <i class="icon-inr"></i> <?php echo number_format($amount,2,'.','');?></b></td>

								<td><?php echo $eater_suggestions;?></td>
								<td><?php echo $order_status_label_array[$orders['status']]; ?></td>
									<td>   <?php 
									 if($orders['payment_status']=='1')
									 {
									 echo '<span class="label label-success middle">Paid</span>';
									 }elseif($orders['payment_status']=='0')
									 {
									 echo '<span class="label label-warning middle">Unpaid</span>';
									 }  
									   ?></td>
<td>
								<a href="<?php echo $link->link('orders_details',fooders,'&order_id='.$orders['id']);?>" class="btn btn-mini btn-primary"><i class=" icon-external-link"></i> <?php echo fodl;?></a>	
								<button type="button" class="btn btn-mini btn-warning" onclick="printDiv_order(<?php echo $orders['id']; ?>)"><i class=" icon-print"></i> Print Bill</button>
								<button type="button" class="btn btn-mini btn-danger" onclick="printDiv_kot(<?php echo $orders['id']; ?>)"><i class=" icon-print"></i> Print KOT</button>  
								</td>
							</tr> 
						<?php }}?>
						</tbody>
					</table>
				</div>

				
				<!--PAGE CONTENT ENDS-->
			</div>
			<!--/.span-->
		</div>
		<!--/.row-fluid-->
	</div>
	<!--/.page-content-->

	