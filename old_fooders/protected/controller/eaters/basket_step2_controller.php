<?php
if(!$session->Check() && $_SESSION['type']!=='eater'){
	$session->redirect('home');
}else{
$get_addresses = $db->get_all('eater_addresses',array('eater_id'=>eater_id),array('id','address','region_name','city','state','zip','default'));
$get_all_basket = 	$db->get_all('food_basket',array('eater_id'=>eater_id));
$result = array();
if(is_array($get_all_basket)){
	foreach ($get_all_basket as $data) {
		$id = $data['fooder_id'];
		if (isset($result[$id])) {
			$result[$id][] = $data;
		} else {
			$result[$id] = array($data);
		}
	}
}

foreach($result as $key=>$value)
{
	$eater_details = $db->get_row('eaters',array('eater_id'=>eater_id),array('name','email','mobile','address','region','city','state'));
	$region_name = explode('___',$eater_details['region']);
	$get_fooder = $db->get_row('fooders',array('fooder_id'=>$key),array('login_email','contact_name'));
		
	$f_details=$db->get_row('fooders_details',array('fooder_id'=>$key),array('delivery_charges','service_charge','vat'));
	$subtotal=0;
	$all_products='';
	foreach($value as $products)
	{
		$all_products = $all_products.($products['quantity']).'&nbsp;X&nbsp;'.$products['product_name'].'<br>';
		if($products['product_proprice']==='0')
			$subtotal= $subtotal+($products['quantity']*$products['product_price']);
		else
			$subtotal= $subtotal+($products['quantity']*$products['product_proprice']);

	}

	$final_total_inpoints=$subtotal+(($f_details['service_charge']*$subtotal)/100)+(($f_details['vat']*$subtotal)/100)+$f_details['delivery_charges'];
}
if (isset($_POST['proceed']) && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_POST ['order_check']=='place_order_check' && $_POST ['place_order_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$_SESSION['order_type']=$_REQUEST['order_type'];
	
}
elseif ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['default_submit'] ) && $_POST ['default_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$addressid = $_POST['addressid'];
	$get_address = $db->get_row('eater_addresses',array('id'=>$addressid,'eater_id'=>eater_id));
	$eater_id=eater_id;
	$region_address = $get_address['region_id'].'___'.$get_address['region_name'];
	if($db->exists('eater_addresses',array('id'=>$addressid))){
		$db->run("update `eater_addresses` set `default` = case when `id` != '$addressid' then '0' when `id` = '$addressid' then '1' end where `eater_id`='$eater_id'");
			
		$update_address = $db->update('eaters',array('address'=>$get_address['address'],'region'=>$region_address,'city'=>$get_address['city'],'state'=>$get_address['state'],'zip'=>$get_address['zip']),array('eater_id'=>eater_id));
		if($update_address){
			$_SESSION ['eater_address']= $get_address['address'];
			$_SESSION ['eater_city']= $get_address['city'];
			$_SESSION ['eater_region_id']= $get_address['region_id'];
			$_SESSION ['eater_region_name']= $get_address['region_name'];
			$_SESSION ['eater_state']= $get_address['state'];
		}
		$session->redirect('basket_step2');
	}
}
elseif ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['place_order'] ) && $_POST ['place_order_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
  $order_type = $_POST['order_type'];
  $order_id = 'OD'.time();
  $mobile=eater_mobile;
  $payment_type=$_POST['payment_type'];
  $address = eater_address;
  $cookie = $_COOKIE['eater_basket'];
  $eater_id = eater_id;
  $fooders = $db->run("SELECT d.delivery_areas, f.fooder_id FROM `food_basket` AS f join `fooders_details` AS d on d.fooder_id=f.fooder_id where f.eater_id='$eater_id' AND f.cookie_basket='$cookie' group by f.fooder_id")->fetchAll();
  $takeout_fooders = $db->run("SELECT d.facilities, f.fooder_id FROM `food_basket` AS f join `fooders_details` AS d on d.fooder_id=f.fooder_id where f.eater_id='$eater_id' AND f.cookie_basket='$cookie' group by f.fooder_id")->fetchAll();
  foreach($fooders as $fid){
  	if(!in_array(eater_region_id,unserialize($fid['delivery_areas'])))
  	{
  		$ids[]=$fid['fooder_id'];
  	}
  }
  foreach ($takeout_fooders as $takeout){
  	if(!in_array('1',unserialize($takeout['facilities'])))
  	{
  		$takeout_ids[]=$takeout['fooder_id'];
  	}
  }
  if(empty($address)){
  	$display_error= '<span class="text-red"> Please provide your address <a href="'.$link->link('eater_addresses',eaters).'">Click here</a></span>';
  }
  elseif(empty($mobile)){
  	$display_error= '<span class="text-red"> Please provide your mobile no. <a href="'.$link->link('profile',eaters).'">Click here</a></span>';
  }
  elseif(count($ids)!=0 && $order_type=="delivery"){
  	$delivery_count=0;
  	foreach ($ids as $fid){
  		$get_name = $db->get_col('fooders',array('fooder_id'=>$fid),'name');
  		$display_error= '<b class="text-red"><i class="icon-warning-sign" style="padding-top:3px;"></i>&nbsp;&nbsp;'.$get_name['0'].'</b> , ';
  		$delivery_count++;
  	}
  
  	if($delivery_count!=0)
  		$display_error .= '<b>does not deliver in your region</b>';
    }
    elseif (count($takeout_ids)!=0 && $order_type=="takeout"){
    	$takeout_count=0;
    	foreach ($takeout_ids as $fid){
    		$get_name = $db->get_col('fooders',array('fooder_id'=>$fid),'name');
    		$display_error= '<b class="text-red"><i class="icon-warning-sign" style="padding-top:3px;"></i>&nbsp;&nbsp;'.$get_name['0'].'</b> , ';
    		$takeout_count++;
    	}
    	if($takeout_count!=0)
    		$display_error .= '<b>does not takeout allowed</b>';
    	}	
    
    else{
    	 echo '<div class="md-modal md-effect-11 modal-basket2-loader md-show" id="modal-11" style="padding:0px;">
	    <div class="md-content modal-basket-content">
		<div style="padding:0px;padding-left: 10px;">
		<div class="row-fluid">
		<div class="span12">
		<div class="span2"><img src="'.SITE_URL.'/assets/eaters/img/loader.gif"></div>
		<div class="span10 modal-basket-text">Please wait while we process your order</div>
		</div>
		</div>
		</div>
		</div>
 		</div>
<div class="md-overlay"></div>';
    	 foreach($result as $key=>$value)
    	{
    		$eater_details = $db->get_row('eaters',array('eater_id'=>eater_id),array('name','email','mobile','address','region','city','state'));
    		$region_name = explode('___',$eater_details['region']);
    		$get_fooder = $db->get_row('fooders',array('fooder_id'=>$key),array('login_email','contact_name'));
    			
    		$f_details=$db->get_row('fooders_details',array('fooder_id'=>$key),array('delivery_charges','service_charge','vat'));
    		$subtotal=0;
    		$all_products='';
    		foreach($value as $products)
    		{
    			$all_products = $all_products.($products['quantity']).'x'.$products['product_name'].'<br>';
    			if($products['product_proprice']==='0')
    				$subtotal= $subtotal+($products['quantity']*$products['product_price']);
    			else
    				$subtotal= $subtotal+($products['quantity']*$products['product_proprice']);
    	
    		}
    	
    		$final_total_inpoints=$subtotal+(($f_details['service_charge']*$subtotal)/100)+(($f_details['vat']*$subtotal)/100)+$f_details['delivery_charges'];
    		$insert_array=array('order_id'=>$order_id,
    				'fooder_id'=>$key,
    				'eater_id'=>eater_id,
    				'cookie'=>$_COOKIE['eater_basket'],
    				'details'=>serialize($value),
    				'fooder_name'=>$value['0']['fooder_name'],
    				'address'=>$eater_details['address'].', '.$region_name['1'].', '.$eater_details['city'].', '.$eater_details['state'],
    				'order_type'=>$order_type,
    				'subtotal'=>$subtotal,
    				'delivery_charge'=>$f_details['delivery_charges'],
    				'service_charge'=>$f_details['service_charge'],
    				'vat'=>$f_details['vat'],
    				'total'=>$final_total_inpoints,
    				'payment_type'=>$payment_type,
    				'status'=>'In Process',
    				'ip'=>$_SERVER['REMOTE_ADDR'],
    				'creation_date'=>time()
    		);
    		$insert_order = $db->insert('orders',$insert_array);
    		if($insert_order){
    			$delete_basket = $db->delete('food_basket',array('eater_id'=>eater_id));
    			if($final_total_inpoints>=1000)
    			{
    				$v=substr($final_total_inpoints, 0, 1);
    				$loyalty = $v*10;
    				$db->insert('loyalty',array(
    						'eater_id'=>eater_id,
    						'order_id'=>$order_id,
    						'order_value'=>$final_total_inpoints,
    						'points_earn'=>$loyalty,
    						'created_date'=>time()
    				));
    			}
    				
    			$date = time();
    			$order_date = date ( 'd M Y', $date );
    			$order_time = date ( 'H:i', $date );
    				$html_eater = '<table align="center" style="background-color:#C0392B;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
    			<tbody><tr>
    			<td>
    			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
    			<tbody><tr>
    			<td>
    			<table border="0" width="100%" style="margin-top:20px;margin-bottom:20px;border-collapse:collapse">
    			<tbody><tr>
    			<td align="center">
    			<a href="'.SITENAME.'/" style="text-decoration:none;color:#cb202d" target="_blank"><img src="'.SITE_URL.'/assets/eaters/img/email_logo.png" alt="'.Appname.' Logo" style="border:0;min-height:auto;line-height:100%;outline:none;text-decoration:none"></a>
    			</td>
    			</tr>
    			</tbody></table></td>
    			</tr>
    			</tbody></table>
    			</td>
    			</tr>
    			</tbody></table>
    			<table align="center" style="background-color:#f4f4f2;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
    			<tbody><tr>
    			<td>
    			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
    			<tbody>
    			<tr>
    			<td>
    			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border:solid 1px #c8c8c8;border-top:none;border-collapse:collapse">
    			<tbody>
    		    <tr> 
    			<td align="center" colspan="4" style="padding-top:22px;padding-left:22px;padding-right:22px">
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;color:#797978;">Hello '.$eater_details['name'].'</p>
    			<p>Thank you for your order!
You will get a confirmation call from '.SITENAME.'<br>
Please find below, the summary of your order '.$order_id.'
    			</p><br>
    			</td>
    			</tr>
    			<tr><td colspan="2"><h4 style="font-family:Helvetica Neue,Arial,sans-serif;margin-top:0;margin-bottom:10px;padding-left:22px;background-color:#C0392B;color:#ffffff;padding-top:10px;padding-bottom:10px;">Order Details</h4></td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Order Id : </b></td>
    			<td colspan="3">'.$order_id.'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Payment Type : </b></td>
    			<td colspan="3">'.$payment_type.'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Order Type : </b></td>
    			<td colspan="3">'.$order_type.'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Dish(es) Ordered : </b><br></td>
    			<td colspan="3">'.$all_products.'<br></td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Total Amount : </b><br></td>
    			<td colspan="3">'.currency.' '.ceil($final_total_inpoints).'<br></td>
    			</tr>
    			<tr><td align="center" colspan="4">
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
    			</p>
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because you registered as an eater on  '.SITENAME.'. If you </span><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">didn&#146;t do this, you can safely ignore this email and we will not email you again. </span></p>
    			</td></tr>
    			
    			</tbody></table>
    			</td>
    			</tr>
    			</tbody></table>
    			<table width="100%" style="border-collapse:collapse">
    			<tbody><tr>
    			<td colspan="2" align="center">
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;border-bottom:solid 1px #c8c8c8;padding-bottom:8px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px">&copy; '.SITENAME.'. All rights reserved. </span></p></td>
    			</tr>
    			</tbody></table>
    			</td>
    			</tr>
    			</tbody></table>';
    			$html_fooder = '<table align="center" style="background-color:#C0392B;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
    			<tbody><tr>
    			<td>
    			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
    			<tbody><tr>
    			<td>
    			<table border="0" width="100%" style="margin-top:20px;margin-bottom:20px;border-collapse:collapse">
    			<tbody><tr>
    			<td align="center">
    			<a href="'.SITENAME.'/" style="text-decoration:none;color:#cb202d" target="_blank"><img src="'.SITE_URL.'/assets/eaters/img/email_logo.png" alt="'.Appname.' Logo" style="border:0;min-height:auto;line-height:100%;outline:none;text-decoration:none"></a>
    			</td>
    			</tr>
    			</tbody></table></td>
    			</tr>
    			</tbody></table>
    			</td>
    			</tr>
    			</tbody></table>
    			<table align="center" style="background-color:#f4f4f2;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
    			<tbody><tr>
    			<td>
    			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
    			<tbody>
    			<tr>
    			<td>
    			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border:solid 1px #c8c8c8;border-top:none;border-collapse:collapse">
    			<tbody>
    		    <tr> 
    			<td align="center" colspan="4" style="padding-top:22px;padding-left:22px;padding-right:22px">
    			<h4 style="font-family:Helvetica Neue,Arial,sans-serif;color:#797978;">Hello, '.$value['0']['fooder_name'].'</h4>
    			</td>
    			</tr>
    			<tr><td colspan="2"><h4 style="font-family:Helvetica Neue,Arial,sans-serif;margin-top:0;margin-bottom:10px;padding-left:22px;background-color:#C0392B;color:#ffffff;padding-top:10px;padding-bottom:10px;">Order Details</h4></td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Order Id : </b></td>
    			<td colspan="3">'.$order_id.'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Payment Type : </b></td>
    			<td colspan="3">'.$payment_type.'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Order Type : </b></td>
    			<td colspan="3">'.$order_type.'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Dish(es) Ordered : </b><br></td>
    			<td colspan="3">'.$all_products.'<br></td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Total Amount : </b><br></td>
    			<td colspan="3">'.currency.' '.ceil($final_total_inpoints).'<br></td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr><td colspan="2"><h4 style="font-family:Helvetica Neue,Arial,sans-serif;margin-top:0;margin-bottom:10px;padding-left:22px;background-color:#C0392B;color:#ffffff;padding-top:10px;padding-bottom:10px;">Customer Details</h4></td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Full Name : </b></td>
    			<td colspan="3">'.$eater_details['name'].'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Address : </b></td>
    			<td colspan="3">'.$eater_details['address'].'<br>'.$region_name['1'].'<br>'.$eater_details['city'].'<br>'.$eater_details['state'].'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Email : </b></td>
    			<td colspan="3">'.$eater_details['email'].'</td>
    			</tr>
    			<tr><td>&nbsp;</td></tr>
    			<tr>
    			<td colspan="1" style="padding-left:22px;"><b>Phone : </b><br></td>
    			<td colspan="3">'.$eater_details['mobile'].'<br></td>
    			</tr>
    			<tr><td align="center" colspan="4">
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
    			</p>
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because you registered as an eater on  '.SITENAME.'. If you </span><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">didn&#146;t do this, you can safely ignore this email and we will not email you again. </span></p>
    			</td></tr>
    			
    			</tbody></table>
    			</td>
    			</tr>
    			</tbody></table>
    			<table width="100%" style="border-collapse:collapse">
    			<tbody><tr>
    			<td colspan="2" align="center">
    			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;border-bottom:solid 1px #c8c8c8;padding-bottom:8px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px">&copy; '.SITENAME.'. All rights reserved. </span></p></td>
    			</tr>
    			</tbody></table>
    			</td>
    			</tr>
    			</tbody></table>';
    	
    			$mail->mandrill($eater_details['email'], $eater_details['name'], 'Order Confirmation - Your Order with '.SITENAME.' ['.$order_id.'] has been successfully placed!', $html_eater, kr_eater_email);
    			$mail->mandrill($get_fooder['login_email'], $get_fooder['contact_name'],  'New Order Notification - An Order with '.SITENAME.' ['.$order_id.'] ['.$order_type.'] has been successfully placed!', $html_fooder, kr_fooder_email);
    			
    			$_SESSION['cart_count']=0;
    			$_SESSION['order_placed']=true;
    			?>
    			
    			
    			<script type="text/javascript">
					  setTimeout(function() {
						  $(".md-effect-11").removeClass("md-show"),
				       window.location.href = "<?php echo $link->link('eater_orders');?>"
      			      }, 5000);
    			
                </script>
    			
    		<?php }
    	}
    
    }
}
}
?>