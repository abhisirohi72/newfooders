


<style type="text/css">

@media print {
    #print-link {
        display: none;
    }
 
}
    </style>
<script>

	function printDiv(divName) {
		  document.getElementById("print-link").style.display = 'none';
		  
		  document.getElementById("print").style.display = '';
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;
	   
	     document.body.innerHTML = printContents;

	     window.print();
	   

	     document.body.innerHTML = originalContents;

}
</script>

<div id="printableArea" class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="span10 offset1">
									<div class="widget-box transparent invoice-box">
										<div class="widget-header widget-header-large">
											<h5>
											<b class=" lighter pull-left position-relative">
												<i class="icon-leaf green"></i>

												<?php 
								if($order_details['order_mode']=='0')
								{
									echo '#'.$order_details['order_number_qrcode'];
								}else{
									echo '#'.$order_details['order_number'];
								}
								?>



											</b>
											</h5>
											<div class="widget-toolbar no-border invoice-info">
												<span class="invoice-info-label"><?php echo fodsts;?></span>
										
<?php echo $order_status_label_array[$order_details['status']] ;?>



													
													
												<br>
												<span class="invoice-info-label"><?php echo fodpo;?></span>
												<span class="blue"><?php 
												$creation_date_time = $order_details['creation_date'];
												$creation_date = date('d M Y',$creation_date_time);
												$creation_time = date('g:i a',$creation_date_time);
												
												echo $creation_date.' ,'.$creation_time;?></span>
											</div>

											<div class="widget-toolbar hidden-480">
												<a href="#" onclick="printDiv_order(<?php echo $order_details['id']; ?>)"
												return false;">
												<i class="icon-print" ></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-24">
												<div class="row-fluid">
													<div class="row-fluid">
														<div class="span6">
															<div class="row-fluid">
																<div id="print-link1" class="span12 label label-large label-info arrowed-in arrowed-right">
																	<b><?php echo fooder_name;?></b>
																</div>
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
																<li>
																		<i class="icon-caret-right blue"></i>
																		<?php echo fodph;?>
																		<b class="red"><?php echo fooder_landline;?></b>
																	</li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																	<?php echo fooder_address;?>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		<?php echo fooder_location_name;?>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		<?php echo fodaup;?>
																	</li>

																	

																	<li class="divider"></li>

																	
																</ul>
															</div>
														</div><!--/span-->

														<div class="span6">
															<div class="row-fluid">
																<div class="span12 label label-large label-success arrowed-in arrowed-right">
																	<b><?php if($order_details['eater_name']!=="")
																	{echo ucwords($order_details['eater_name']);}
																	else{echo 'Guest';};?></b>
																</div> 
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
<?php /* if(isset($eater_details['address']) && $eater_details['address']!=""){echo '<li><i class="icon-caret-right green"></i>'.$eater_details['address'].'</li>';} */?>
<?php if(isset($order_details['eater_phonenumber']) && $order_details['eater_phonenumber']!=""){echo '<li><i class="icon-caret-right green"></i>Phone: <b class="red">'.$order_details['eater_phonenumber'].'</b></li>';} ?>



																<!--	<li>
																		<i class="icon-caret-right green"></i>
																	<?php $region_name=explode('___',$eater_details['region']);
																	echo $region_name['1'];?>
																	
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		<?php echo fodaup;?>
																	</li>-->

																</ul>
															</div>
														</div><!--/span-->
													</div><!--row-->

													<div class="space"></div>

													<div class="row-fluid">
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center"><?php echo fodhash;?></th>
																	<th><?php echo fodprod?></th>
																	<th><?php echo fodqnty;?></th>
																	<th><?php echo fodpr;?></th>
																	<th><?php echo fodtotal;?></th>
																</tr>
															</thead>

															<tbody>
																<?php 
																
																$delivery_charge=isset($order_details['delivery_charge'])?$order_details['delivery_charge']:0.00;
																$service_charge_details=json_decode($order_details['service_charge_details'],true); 
																$tax_details=json_decode($order_details['tax_details'],true); 
																$orders=$db->get_all('order_items',array('order_id'=>$order_details['id']));

																$counter=1;
																$subtotal=0;
																$total=0;
																if(is_array($orders) && count($orders)!=0)
																foreach($orders as $order)
																{
																	if($order['product_proprice']=="")
																	{
																		$price=$order['product_price']; 
																	}else{
																		$price=$order['product_proprice'];
																	}
																	
																	
																	?>
																<tr>
																	<td class="center"><?php echo $counter;$counter++;?></td>

																	<td>
																		<a id="print-link" href="<?php echo $link->link('products',fooders,'?edit='.$order['product_id']);?>"><?php echo $order['product_name'];?></a>
																		
																	</td>
																	<td >
																		<?php echo $order['quantity'];?>
																	</td>
																	<td><?php 
																
																		echo $currency_symbol.''.$price;
																
																	?></td>
																	<td><?php
																	
																	echo $currency_symbol.''.$order['quantity']*$price;
																	?>
																</tr>
																<?php
															$subtotal+=$order['quantity']*$price;
															
															
															}	?>
																
															</tbody>
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row-fluid">
														<div class="span12 pull-right">
															<b class="pull-right">
																Subtotal
																<span class="red"><?php echo $currency_symbol.''.number_format($subtotal,2,'.','');?></span>
															</b> 
														</div>
													</div>

												


<?php

$discount=0.00;

$discount_rate=$order_details['discount_rate'];
$discount_type=$order_details['discount_type'];
$dt=$currency_symbol;
if($discount_rate>0)
{
if($discount_type==0)
{
$discount=($subtotal*$discount_rate)/100;
$dt=$discount_rate.'%';

}
else if($discount_type==1)
{
$discount=$discount_rate; 
$dt=$currency_symbol;
}


}
$after_discount_amount=$subtotal-$discount;													
$service_charge=0;	

if($discount>0){
?>													
													
													
													<div class="row-fluid">
														<div class="span12 pull-right">
															<b class="pull-right">
																Discount (<?php echo $dt; ?>)
																<span class="red"><?php  echo $currency_symbol.''.number_format($discount,2,'.','');?></span>
															</b>
														</div>
													</div>					
												<?php } ?>	
													
													
													
													<?php if($service_charge_details['name']!=""){ ?>
													<div class="row-fluid">
														<div class="span12 pull-right">
															<b class="pull-right">

																<?php 
															     $service_charge=($after_discount_amount*$service_charge_details['percentage'])/100;
                                                                echo $service_charge_details['name'].'('.$service_charge_details['percentage'].'%)';
                                                                
                                                                
                                                                ?>

																<span class="red">
                                                                <?php echo isset($service_charge)?$currency_symbol.''.number_format($service_charge,2,'.',''):'0.00'; ?></span>
															</b>
														</div>
													</div>
													<?php }?> 


<?php 

$taxable_amount=$after_discount_amount+$service_charge;

    if(is_array($tax_details))
    {
		$tax_amount=0;
     foreach($tax_details as $tr)
     {
		if($tr['percentage']>0){
		$tax=($taxable_amount*$tr['percentage'])/100;
		$tax_amount+=$tax;

		
		?>




<div class="row-fluid">
<div class="span12 pull-right">
    <b class="pull-right">
        <?php echo $tr['name'].'('.$tr['percentage'].'%)';?> : 
        <span class="red">
        <?php echo $currency_symbol.''.number_format($tax,2,'.','');  ?>
        
        </span>
    </b>
</div>
</div>
<?php }} }?>

<?php if($order_details['order_mode']==1){?>


													<div class="row-fluid">
														<div class="span12 pull-right">
															<b class="pull-right">
																<?php echo foddc;?> 
																<span class="red"><?php  echo $currency_symbol.''.number_format($delivery_charge,2,'.','');?></span>
															</b>
														</div>
													</div>
													<?php }?>

<?php 													


$total=$after_discount_amount+$tax_amount+$delivery_charge+$service_charge;
?>

													
													
													
													<div class="row-fluid">
														<div class="span5 pull-right">
														
															<h4 class="pull-right">
																<?php echo fodtap;?>
																<span class="red"><?php echo $currency_symbol.''.number_format($total,2,'.','');?></span>
															</h4>
														</div>
													<div class="span7 pull-left">
													<b class="pull-left">
													&nbsp;<?php 
													if($order_details['payment_type']!="")
													{
														echo '<i class="icon-credit-card"></i>'.$order_details['payment_type'];
													};?>
													</b>
													</div>
													</div>
													<div class="row-fluid">
														<div class="span12"> 
														
															<h5><strong>Eater Suggestions*</strong></h5>
																<p><?php echo isset($order_details['eater_suggestions'])?$order_details['eater_suggestions']:'';?></p>

														
														</div>
													</div>

													<div class="space-6"></div>

													<div class="row-fluid">
														<div class="span12 well center">
															 <?php echo fodtyfc." ".fooder_name.". ".fodwb."<br> &copy;".date('Y')." ".Appname;?>
						
																					</div>
													</div>

													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div>