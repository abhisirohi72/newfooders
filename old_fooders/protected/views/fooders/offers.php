
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo fmvf;?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small>
		</h1>
	</div>
	<!--/.page-header-->
	<div class="row-fluid">
		<div class="span12">
		<div class="row-fluid">
		<div class="span12 text-right">
		<a href="<?php echo $link->link('add_offer',fooders); ?>" class="btn btn-primary btn-small"> Add Offer</a>
		</div></div>
		<div class="space-4"></div>
			<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<table id="sample-table-4"
					class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><b class="blue">Promo Code</b></th>
							<th><b class="blue">Start Date</b></th>
							<th><b class="blue">Expiry Date</b></th>
						    <th><b class="blue">Discount Type</b></th>
							<th><b class="blue">Amount</b></th>
							<th><b class="blue">Minimum Order Amount</b></th>
							<th><b class="blue">Action</b></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(is_array($get_coupons)){
						foreach ( $get_coupons as $coup ) {
                            $coupid = $feature->encrypt_decrypt('encrypt',$coup['id']);
							?>
							<tr>
							<td style="width: 20%"><b><?php echo $coup['coupon_code'];?></b></td>
							<td style="width: 10%"><?php echo date('d M Y',strtotime($coup['start_date']));?></td>
							<td style="width: 10%"><?php echo date('d M Y',strtotime($coup['expiry_date']));?></td>
							<td style="width: 10%"><?php if($coup['discount_type']=='1') echo 'Percent';else echo 'Amount'; ?></td>
                            <td style="width: 10%"><?php echo $currency_symbol.' '.$coup['amount'];?></td>
							<td style="width: 10%"><?php echo $currency_symbol.' '.$coup['minimum_order_amount'];?></td>
							<td style="width: 15%">
								<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
									<a class="btn btn-info btn-minier"
										href="<?php  echo $link->link('edit_offer',fooders,'?id='.$coupid); ?>">
										<i class="icon-pencil icon-only" title="edit"></i>
									</a> 
                                    <input autocomplete="off" type="hidden" name="del_id"
										value="<?php echo $coup['id'];?>">

									<button type="submit" name="del_coupon"
										class="btn btn-danger btn-minier">
										<i class="icon-trash bigger-130" title="delete"></i>
									</button>
								</form>
							</td>
						</tr>
							<?php } }?>
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

