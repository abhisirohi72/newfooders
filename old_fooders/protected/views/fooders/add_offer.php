<?php echo $displaydiscount;?>
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			Offers <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small>
		</h1>
	</div>
	<!--/.page-header-->
			<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>"
					name="account_management" method="post">
                    <div class="row-fluid">
					<input autocomplete="off" type="hidden" name="save_discount_ip"
						value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
					<div class="space-6"></div>
                    <div class="span12">
					<div class="span6">
					<div class="control-group">
						<label class="control-label grey" for="form-field-6">Promo Code <font class="red">*</font></label>
						<div class="controls">
							<input autocomplete="off" type="text" name="coupon_code" value="<?php echo $coupon_code; ?>" /> 
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label grey" for="form-field-6">Start Date <font class="red">*</font></label>
						<div class="controls">
													<div class="row-fluid input-append">
														<input autocomplete="off" name="start_date" class="date-picker" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $start_date; ?>"> <span class="add-on"> <i class="icon-calendar"></i>
														</span>
													</div>
												</div>
					</div>
                    <div class="control-group">
						<label class="control-label grey" for="form-field-6">Expiry Date <font class="red">*</font></label>
						<div class="controls">
													<div class="row-fluid input-append">
														<input autocomplete="off" name="expiry_date" class="date-picker" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $expiry_date; ?>"> <span class="add-on"> <i class="icon-calendar"></i>
														</span>
													</div>
												</div>
					</div>
                  </div>
                  <div class="span6">
                  <div class="control-group">
												<label class="control-label grey">Discount Type <font class="red">*</font></label>
                                                <div class="controls">
												<div class="radio">
													<label>
														<input name="discount_type" class="discountType" type="radio" value="0" <?php echo 'checked';  ?>>
														<span class="lbl"> Amount</span>
													</label>
												</div>
                                        	<div class="radio">
													<label>
														<input name="discount_type" class="discountType" type="radio" value="1" <?php if($discount_type=='1') echo 'checked';  ?>>
														<span class="lbl"> Percent</span>
													</label>
												</div>
                                                </div>
											</div>
                                            <div class="control-group">
						<label class="control-label grey" for="form-field-6">Amount/Percent <font class="red">*</font></label>
						<div class="controls">
							<input autocomplete="off" type="text" class="amountPercent" name="amount" value="<?php echo $amount; ?>" /> 
						</div>
					</div>
					<div class="control-group">
                                            <label class="control-label grey" for="form-field-6">Minimum order amount <font class="red">*</font></label>
                                            <div class="controls">
                                                <input autocomplete="off" type="text" name="minimum_order_amount" id="minOrderAmt" value="<?php echo $minimum_order_amount; ?>" /> 
                                            </div>
                                        </div>
                 </div>
                  </div>
                  </div>
					<div class="hr"></div>
                    <div class="row-fluid">
                        <div class="span12">
					<div class="form-actions">
						<button class="btn btn-large btn-info" type="submit"
							name="discount_submit">
							<i class="icon-ok bigger-110"></i> Save
						</button>
						&nbsp; &nbsp; &nbsp;
						<button class="btn btn-large" type="reset">
							<i class="icon-undo bigger-110"></i> Reset
						</button>
					</div>
                    </div>
</div> 
				</form>
		
	
</div>
