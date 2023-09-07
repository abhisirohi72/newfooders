 <?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && $_POST ['order_check']=='place_order_check' && $_POST ['place_order_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$order_type = $_REQUEST['order_type'];
	$payment_type= $_REQUEST['payment_type']; 
	$order_id = 'OD'.time();
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	
	if ($return['error'] === false){
		
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
					'order_type'=>$order_type,
					'subtotal'=>$subtotal,
					'delivery_charge'=>$f_details['delivery_charges'],
					'service_charge'=>$f_details['service_charge'],
					'vat'=>$f_details['vat'],
					'total'=>$final_total_inpoints,
					'payment_type'=>'cash on delivery',
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
			$html_eater = '<table align="center" style="background-color:#CB202D;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
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
			<tbody><tr>
			<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border:solid 1px #c8c8c8;border-top:none;border-collapse:collapse">
			<tbody><tr>
			<td colspan="2" align="center" style="padding-top:22px;padding-left:22px;padding-right:22px">
			<h3 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:18px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:20px;border-bottom:solid 1px #c8c8c8;padding-bottom:22px">Hello '.$eater_details['name'].'</h3>
			<h4 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:12px;line-height:18px;color:#2d2d2a;margin-top:0;">Your Order With Order Number <b>#'.$order_id.'</b> On '.$order_date.'( '.$order_time.' ) Has Been Placed
				
			</h4>
			<p style="text-align:center;font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
			</p>
			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because you registered as an eater on  '.SITENAME.'. If you </span><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">didn&#146;t do this, you can safely ignore this email and we will not email you again. </span></p></td>
			</tr>
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
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			';
			$html_fooder = '<table align="center" style="background-color:#CB202D;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
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
			<tbody><tr>
			<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border:solid 1px #c8c8c8;border-top:none;border-collapse:collapse">
			<tbody><tr>
			<td colspan="2" align="center" style="padding-top:22px;padding-left:22px;padding-right:22px">
			<h3 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:18px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:20px;border-bottom:solid 1px #c8c8c8;padding-bottom:22px">Hello '.$value['0']['fooder_name'].'</h3>
			<h4 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:12px;line-height:18px;color:#2d2d2a;margin-top:0;">New Order Details
			<br>
			Order Id : '.$order_id.'<br>
			Payment Type : '.$payment_type.'<br>
			Order Type : '.$order_type.'<br>
			Dishe(s) Ordered : '.$all_products.'
			</h4>
				
			<h4 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:12px;line-height:18px;color:#2d2d2a;margin-top:0;">Customer Details
			<br>
			Full Name : '.$eater_details['name'].'<br>
			Address : '.$eater_details['address'].', '.$region_name['1'].', '.$eater_details['city'].', '.$eater_details['state'].'
			<br>Email : '.$eater_details['email'].'<br>
			Phone : '.$eater_details['mobile'].'<br>
			</h4>
			<p style="text-align:center;font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
			</p>
			<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because you registered as an eater on  '.SITENAME.'. If you </span><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">didn&#146;t do this, you can safely ignore this email and we will not email you again. </span></p></td>
			</tr>
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
			</tbody></table>
			</td>
			</tr>
			</tbody></table>';
				
			$mail->mandrill($eater_details['email'], $eater_details['name'], 'Order Placed #'.$order_id, $html_eater, kr_eater_email);
			$mail->mandrill($get_fooder['login_email'], $get_fooder['contact_name'], 'New Order #'.$order_id.' - '.$order_type, $html_fooder, kr_fooder_email);
			
			$_SESSION['cart_count']=0;
			$_SESSION['order_placed']=true;
			$return['msg']='<script>window.location="'.$link->link('eater_orders',eaters,'&order_placed=successfull').'"</script>';
			}
		}
		
	}
	echo json_encode($return);
}

?>