<?php
$data = json_decode(file_get_contents("php://input"), true); 
if($_REQUEST['fooderid'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
	$get_all_orders = $db->get_all('orders',array('fooder_id'=>$fooder_id,'fooder_view'=>'0'),array('order_id','total'));
     $count = count($get_all_orders);


	echo '<a data-toggle="dropdown" class="dropdown-toggle" href="#"> 
						<i class="icon-bell-alt icon-animated-bell"></i>
							<span id="order_count" class="badge badge-important">'.$count.'</span>
					</a>

						<ul
							class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
							<li class="nav-header"><i class="icon-warning-sign"></i> '.$count.'
								'.fopop.'</li>';
if($count>0){
						foreach($get_all_orders as $orders){	
					echo '<li><a href="'.$link->link('orders_details',fooders,'&order_id='.$orders['order_id']).'"><div class="clearfix">
			<span class="pull-left order_id_amount"><i class="btn btn-mini no-hover btn-pink icon-shopping-cart"></i>
			'.$orders['order_id'].' For <i class="icon-inr"></i> '.ceil($orders['total']).'
			</span></div></a></li>';
						}

						echo '<li></li>
						</ul>';	
}
						if($count>0){
							$myAudioFile = SITE_URL."/assets/fooders/sounds/Notify.mp3";
							echo '<EMBED SRC="'.$myAudioFile.'" HIDDEN="TRUE" AUTOSTART="TRUE" style="width:50px;"></EMBED>';
							
						}		
		
		
}
elseif ($_REQUEST['completed'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
	
	$status_orderid = explode('___',$_REQUEST['completed']);
	$orderid = $status_orderid['1'];
	$status = $status_orderid['0'];
	$return['msg']='';
	$return['msg']=array();
	$return['msg']=false;
	if($return['msg']==false){
		$db->update('orders',array('status'=>$status),array('order_id'=>$orderid,'fooder_id'=>$fooder_id));
	    
	    
	}
	echo json_encode($return);
}
elseif ($_REQUEST['cancelled'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){

	$status_orderid = explode('___',$_REQUEST['cancelled']);
	$orderid = $status_orderid['1'];
	$status = $status_orderid['0'];
	$return['msg']='';
	$return['msg']=array();
	$return['msg']=false;
	if($return['msg']==false){
		$db->update('orders',array('status'=>$status),array('order_id'=>$orderid,'fooder_id'=>$fooder_id));
	}
	echo json_encode($return);
}
elseif ($_REQUEST['inprocess'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){

	$status_orderid = explode('___',$_REQUEST['inprocess']);
	$orderid = $status_orderid['1'];
	$status = $status_orderid['0'];
	$return['msg']='';
	$return['msg']=array();
	$return['msg']=false;
	if($return['msg']==false){
		$db->update('orders',array('status'=>$status),array('order_id'=>$orderid,'fooder_id'=>$fooder_id));
	}
	echo json_encode($return);
}



elseif ($_REQUEST['st_completed'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){

	$status_orderid = explode('___',$_REQUEST['st_completed']);
	$orderid = $status_orderid['1'];
	$status = $status_orderid['0'];
	$return['msg']='';
	$return['msg']=array();
	$return['msg']=false;
	if($return['msg']==false){
		$db->update('orders',array('status'=>$status),array('order_id'=>$orderid,'fooder_id'=>$fooder_id));
	  
	  
	}
	echo json_encode($return);
}
elseif ($_REQUEST['st_cancelled'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){

	$status_orderid = explode('___',$_REQUEST['st_cancelled']);
	$orderid = $status_orderid['1'];
	$status = $status_orderid['0'];
	$return['msg']='';
	$return['msg']=array();
	$return['msg']=false;
	if($return['msg']==false){
		$db->update('orders',array('status'=>$status),array('order_id'=>$orderid,'fooder_id'=>$fooder_id));
	}
	echo json_encode($return);
}
elseif ($_REQUEST['st_inprocess'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){

	$status_orderid = explode('___',$_REQUEST['st_inprocess']);
	$orderid = $status_orderid['1'];
	$status = $status_orderid['0'];
	$return['msg']='';
	$return['msg']=array();
	$return['msg']=false;
	if($return['msg']==false){
		$db->update('orders',array('status'=>$status),array('order_id'=>$orderid,'fooder_id'=>$fooder_id));
	}
	echo json_encode($return);
}
elseif(isset($_REQUEST['changeProductStatus'])){
	$status = $feature->encrypt_decrypt('decrypt',$_REQUEST['changeProductStatus']);
	$productid = $feature->encrypt_decrypt('decrypt',$_REQUEST['pid']);
    $update_status = $db->update('fooders_products',array('status'=>$status),array('id'=>$productid));
	if($update_status){
		echo trim('1234');
	} 
}
if(isset($data['load_live_orders']))
{

    $todaydate=date('Y-m-d');
   $fooder_id=$data['fooder_id'];
	/*$sql="SELECT *
	FROM `orders` 
    WHERE orders.fooder_id='$fooder_id' AND orders.order_date='$todaydate' AND (orders.status='0' OR orders.status='1' OR orders.status='2') 
	ORDER BY orders.creation_date DESC";*/

$sql="SELECT *
FROM `orders` 
WHERE orders.fooder_id='$fooder_id' AND orders.payment_status='0' AND (orders.status='0' OR orders.status='1' OR orders.status='2') 
ORDER BY orders.creation_date DESC"; 
$detail = $db->run($sql)->fetchAll();

$sql1="SELECT orders.id,order_items.product_price,order_items.product_proprice,order_items.quantity
FROM `order_items` LEFT JOIN `orders` ON  order_items.order_id=orders.id
WHERE orders.fooder_id='$fooder_id' AND orders.payment_status='0' AND (orders.status='0' OR orders.status='1' OR orders.status='2') 
ORDER BY orders.creation_date DESC"; 

$detail1 = $db->run($sql1)->fetchAll();
$new_array=array();

	if(is_array($detail1))
	{
	foreach($detail1 as $row)
	{


if($row['product_proprice']!="")
{
	$new_array[$row['id']][]=$row['product_proprice']*$row['quantity'];

}else{
	$new_array[$row['id']][]=$row['product_price']*$row['quantity'];
}


	} 
	}
// echo "<pre>",print_r($new_array[66]),"</pre>";
	
// 	exit();


$lorders=array();
if(is_array($detail))
{
foreach($detail as $row)
{
	$creation_date_time = $row['creation_date'];
	$creation_date = date('d M Y',$creation_date_time).' '.date('g:i a',$creation_date_time); 


	//$amount=$row['total'];








$status=$order_status_label_array[$row['status']]; 
$order_number='';
if($row['order_mode']==0)
{
	$order_number='#'.$row['order_number_qrcode'];
}else{
	$order_number='#'.$row['order_number'];
}

$payment_type=isset($row['payment_type'])?$row['payment_type']:'';

$payment_status_label="";
if($row['payment_status']=='1')
{
	$payment_status_label='<span class="label label-success  middle">Paid</span>';
}else{
	$payment_status_label='<span class="label label-warning  middle">Unpaid</span>';
}

$table_number="";
if($row['table_id']>0 && $row['order_mode']==0)
{
	$table_number=$db->get_var('fooders_tables',array('fooder_id'=>$row['fooder_id'],'id'=>$row['table_id']),'table_no');
	$table_number='<b>Table No-'.$table_number.'</b>';
}
elseif($row['table_id']==0 && $row['order_mode']==0)
{
	$table_number='<b>Counter</b>';

}else{
	$table_number=''; 
}


//$subtotal = array_sum($new_array[$row['id']]);
$subtotal = isset($new_array[$row['id']])?array_sum($new_array[$row['id']]):0;
$discount=0.00;

$discount_rate=$row['discount_rate'];
$discount_type=$row['discount_type'];

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
$service_charge_details=json_decode($row['service_charge_details'],true); 

$service_charge=($after_discount_amount*$service_charge_details['percentage'])/100;

$taxable_amount=$after_discount_amount+$service_charge;

$tax_details=json_decode($row['tax_details'],true);
$tax_amount=0;
if(is_array($tax_details))
{
foreach($tax_details as $trow)
{
$tax_amount+=($taxable_amount*$trow['percentage'])/100;
}

}
$delivery_charge=$row['delivery_charge'];
$amount=$after_discount_amount+$tax_amount+$delivery_charge+$service_charge;

	$lorders[]=array('id'=>$row['id'],
		'order_id'=>$order_number,
		'order_mode'=>$row['order_mode'],
		'created_date'=>$creation_date,
		'client_name'=>ucwords($row['eater_name']),
		'client_phone'=>$row['eater_phonenumber'],
		'order_amount'=>round($amount,2),
		'status_label'=>$status, 
		'status'=>$row['status'],
		'payment_type'=>$payment_type,
		'payment_status'=>$row['payment_status'],
	    'payment_status_label'=>$payment_status_label,
		'table_number'=>$table_number);



}

} 

 


//print_r($lorders);
    echo json_encode($lorders);
exit();
}


if(isset($data['load_order_details']))
{

    
   $fooder_id=$data['fooder_id'];
   $order_id=$data['order_id'];
   $odetails=$db->get_row('orders',array('fooder_id'=>$fooder_id,'id'=>$order_id));

   $client_details=$db->get_row('eaters',array('eater_id'=>$odetails['eater_id']));

   $fooders_details=$db->get_row('fooders_details',array('fooder_id'=>$odetails['fooder_id']));
   $fooders_products=$db->get_all('fooders_products',array('fooder_id'=>$odetails['fooder_id'],'status'=>'1'));


   $creation_date_time = $odetails['creation_date'];
   $creation_date = date('d M Y',$creation_date_time).' '.date('g:i a',$creation_date_time);
 

   $amount=$odetails['total'];
   $status=$order_status_label_array[$odetails['status']]; 

   $region_name=explode('___',$client_details['region']);

   $details=json_decode($odetails['details'],true);
   $details=$db->get_all('order_items',array('order_id'=>$order_id));
  
   if($odetails['delivery_charge']=='0'){
	$delivery_charge='FREE';
   }else{
	$delivery_charge=$odetails['delivery_charge'];
   }
   $delivery_charge=$odetails['delivery_charge'];
   $delivery_guy=array();
if($odetails['delivery_guy_id']>0)
{
	$delivery_guy=$db->get_row('delivery_guys',array('id'=>$odetails['delivery_guy_id']),array('id','name','phone_number'));
}
  

   //$tax[]=array('name'=>$fooders_details['tax1_name'],'percentage'=>$fooders_details['tax1_value'],'amount'=>'0');
   //$tax[]=array('name'=>$fooders_details['tax2_name'],'percentage'=>$fooders_details['tax2_value'],'amount'=>'0');
   if($odetails['tax_details']!="")
   {
	$tax_details=$odetails['tax_details'];
   }else{
	$tax_details=json_encode(array(),true);
   }
   
   if($row['order_mode']==0)
{
	$order_number='#'.$odetails['order_number_qrcode'];
}else{
	$order_number='#'.$odetails['order_number'];
}
$service_charge=$odetails['service_charge']; 
$service_charge_details=$odetails['service_charge_details'];  
$subtotal=$odetails['subtotal']; 




$payment_status_label="";
if($odetails['payment_status']=='1')
{ 
	$payment_status_label='<span class="label label-success  middle">Paid</span>';
}else{
	$payment_status_label='<span class="label label-warning  middle">Unpaid</span>';
}
$table_number="";
if($odetails['table_id']>0 && $odetails['order_mode']==0)
{
	$table_number=$db->get_var('fooders_tables',array('fooder_id'=>$odetails['fooder_id'],'id'=>$odetails['table_id']),'table_no');
	$table_number='Table No-'.$table_number;
}
elseif($odetails['table_id']==0 && $odetails['order_mode']==0)
{
	$table_number='Table No-Counter';

}else{
	$table_number=''; 
}
if($odetails['payment_type']!="")
{
	$payment_type='<i class="icon-ticket"></i> Paid by '.$odetails['payment_type'];
}else{
	$payment_type=""; 
}
$status_order_ready_enable=$db->get_var('fooders',array('fooder_id'=>$odetails['fooder_id']),'status_order_ready_enable');
$eater_suggestions=isset($odetails['eater_suggestions'])?$odetails['eater_suggestions']:'';

     $lorders=array('id'=>$odetails['id'],
					'order_id'=>$order_number,
					'order_mode'=>$odetails['order_mode'],
					'created_date'=>$creation_date,
					'client_name'=>ucwords($odetails['eater_name']),
					'client_address'=>$odetails['address'],
					'client_region'=>$region_name,
					'client_mobile'=>$odetails['eater_phonenumber'],
					'subtotal'=>$subtotal,
					'order_amount'=>$amount,
					'service_charge'=>$service_charge,
					'service_charge_details'=>$service_charge_details,
					'tax_details'=>$tax_details,   
					'items'=>$details,
					'delivery_guy'=>$delivery_guy,
					
					'delivery_charge'=>$delivery_charge,
					'status_label'=>$status,
					'status'=>$odetails['status'],
					'payment_type'=>$payment_type,
					'payment_status'=>$odetails['payment_status'],
					'payment_status_label'=>$payment_status_label,
				    'table_number'=>$table_number,
					'table_id'=>$odetails['table_id'],
					'fooder_products'=>$fooders_products,
					'discount_type'=>$odetails['discount_type'],
					'discount_rate'=>$odetails['discount_rate'],
					'status_order_ready_enable'=>$status_order_ready_enable,
					'eater_suggestions'=>$eater_suggestions
				);

//print_r($lorders);
    echo json_encode($lorders);
exit();
}
elseif(isset($data['change_status']))
{ 
	$response=array();
	$order_id=$data['order_id'];
	$status=$data['status'];
	$update_status=$db->update('orders',array('status'=>$status),array('id'=>$order_id));
	if(isset($update_status))
	{

/********************************* */
if($status=='1' || $status=='4')
{
$order_details=$db->get_row('orders',array('id'=>$order_id));

$order_number='#'.$order_details['order_number_qrcode'];
		if($order_details['order_mode']==0 && $order_details['table']>0)
		{
			$table=$order_details['table'];


		}else{
			$table=0;
		}

$eater_id='eater_'.$order_details['eater_id'];

$eater_id = $feature->encrypt_decrypt('encrypt',$eater_id);
$text=="";
if($status=='1')
{
	$text="Order is getting ready!";
}elseif($status=='4')
{
	$text="Order Rejected!";
}
$msg = '<a href="" class="btn btn-warning btn-block rounded text-decoration-none align-items-center"> 
<b><i class="feather-alert-triangle"></i>  '.$text.'('.$order_number.') </b></a>';

$data=array('fooderid'=>$eater_id,'table'=>$table,'msg'=>base64_encode($msg),'notification_div'=>'pushNotify');
 $curl = curl_init();

 curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://alertify.live/send_data', 
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_POSTFIELDS =>json_encode($data),
   CURLOPT_HTTPHEADER => array(
	 'Content-Type: application/json'
   ),
 ));
 
$res = curl_exec($curl); 
 
 curl_close($curl);
}
elseif($status=='2')
{
	$order_details=$db->get_row('orders',array('id'=>$order_id));
	$fooder_details=$db->get_row('fooders',array('fooder_id'=>$order_details['fooder_id'])); 
    $eater_phonenumber=isset($order_details['eater_phonenumber'])?$order_details['eater_phonenumber']:'';
    $fooder_name=isset($order_details['fooder_name'])?trim($order_details['fooder_name']):'';





/********************** order Ready sms notification to eater **************/
if($fooder_details['status_order_ready_sms_enable']=='1' && $eater_phonenumber!=""){

	$order_number_qrcode=$order_details['order_number_qrcode'];
    $numbers = array($eater_phonenumber);

	//  $message = rawurlencode('New order #'.$order_number_qrcode.' (INR '.$topay.') received from khateraho.com 
	// '.$smstable.'
	// Team IWCN');

	$message = rawurlencode('Your order #'.$order_number_qrcode.' with '.$fooder_name.' is ready. Please collect your order.
Khateraho.com
Team IWCN');



	//$message = rawurlencode($sms_message_order_placed);
	  $numbers = implode(',', $numbers); 
	  
	 // Prepare data for POST request
	 $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
	 // Send the POST request with cURL
	 $ch = curl_init('https://api.textlocal.in/send/');
	 curl_setopt($ch, CURLOPT_POST, true);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 $smsres = curl_exec($ch);
	
	 curl_close($ch); 
	}
	
	/********************** order sms notification to eater **************/




} 
/****************************** */




		$response['error']=false;
		$response['msg']='<font class="green"><i class="icon-check" ></i> Update successfully!</font>'; 
		$response['status_label']=$order_status_label_array[$status]; 

	}else{

		$response['error']=true;
		$response['msg']='<font class="red">Some thing went wrong!</font>';
	}
	echo json_encode($response); 
	exit();
} 
elseif(isset($data['mark_as_paid']))
{ 
	$response=array();
	$order_id=$data['order_id'];
	$payment_type=$data['payment_type'];
	$update_status=$db->update('orders',array('payment_status'=>'1','payment_type'=>$payment_type),array('id'=>$order_id));
	if(isset($update_status))
	{ 

		
        $response['error']=false;
		$response['msg']='<font class="green"><i class="icon-check" ></i> Update successfully!</font>';
		$response['payment_type']=$payment_type;
		$response['payment_status_label']=$payment_status_label='<span class="label label-success  middle">Paid</span>';;
		
	

	}else{

		$response['error']=true;
		$response['msg']='<font class="red">Some thing went wrong!</font>';
	}
	echo json_encode($response); 
	exit();
} 
elseif(isset($data['change_table']))
{ 
	$response=array();
	$order_id=$data['order_id'];
	$table_id=$data['table_id'];
	$fooder_id=$data['fooder_id'];
	$update_status=$db->update('orders',array('table_id'=>$table_id),array('id'=>$order_id));
	$update_status=$db->update('order_items',array('table_id'=>$table_id),array('order_id'=>$order_id));
	if(isset($update_status))
	{ 
		$table_number="";
if($table_id>0)
{
	$table_number=$db->get_var('fooders_tables',array('fooder_id'=>$fooder_id,'id'=>$table_id),'table_no');
	$table_number='Table No-'.$table_number;
}
else{
	$table_number=''; 
}
		
        $response['error']=false;
		$response['msg']='<font class="green"><i class="icon-check" ></i> Update successfully!</font>';
		$response['table_number']=$table_number;
	
		
	

	}else{

		$response['error']=true;
		$response['msg']='<font class="red">Some thing went wrong!</font>';
	}
	echo json_encode($response); 
	exit();
} 
elseif(isset($data['change_delivery_guy']))
{ 
	$response=array();
	$order_id=$data['order_id'];
	$delivery_guy_id=$data['delivery_guy_id'];
	if($delivery_guy_id>0){
		$update_status=$db->update('orders',array('delivery_guy_id'=>$delivery_guy_id),array('id'=>$order_id));

		$delivery_guy_name=ucwords($db->get_var('delivery_guys',array('id'=>$delivery_guy_id),'name'));
		$delivery_guy_phone_number=$db->get_var('delivery_guys',array('id'=>$delivery_guy_id),'phone_number');
		$delivery_guy_name=isset($delivery_guy_name)?$delivery_guy_name:'';
		$delivery_guy_phone_number=isset($delivery_guy_phone_number)?$delivery_guy_phone_number:'';
		if(isset($update_status))
		{
			$response['error']=false;
			$response['msg']='<font class="green"><i class="icon-check" ></i> Update successfully!</font>';
			$response['delivery_guy_name']=$delivery_guy_name;
			$response['delivery_guy_phone_number']=$delivery_guy_phone_number;
	
		}else{
	
			$response['error']=true;
			$response['msg']='<font class="red">Some thing went wrong!</font>';
		}


	}else{
		$update_status=$db->update('orders',array('delivery_guy_id'=>$delivery_guy_id),array('id'=>$order_id));
		    $response['error']=true;
			$response['msg']='<font class="red">Some thing went wrong!</font>';
	}

	echo json_encode($response); 
	exit();
}


elseif(isset($data['callWater']))
{ 
	$response=array();
	$fooder_id=$data['fooder_id'];

    $file_path='uploads/callwaiter.json';
	$re=file_get_contents($file_path);
    $get_data = json_decode($re,true); 


$lorders=array(); 
if(is_array($get_data))
{
foreach($get_data as $row)
{
	   $lorders[]=array('fooder_id'=>$row['fooder_id'],
						'table'=>$row['table']);

	
}

}



	echo json_encode($lorders); 
	exit();
}
elseif(isset($data['save_lat_long']))
{ 
	$response=array();
	$fooder_id=$data['fooder_id'];
	$latitude=$data['latitude'];
	$longitude=$data['longitude'];

	$update=$db->update ( 'fooders', array ('latitude' => $latitude,'longitude' => $longitude), array ('fooder_id' => $fooder_id ) );
if(isset($update))
{
	$response['error']=false;
	$response['msg']='Update Successfully!';
}else{
	$response['error']=true;
	$response['msg']='Some thing went wrong!';
}


	echo json_encode($lorders); 
	exit();
}
elseif(isset($_REQUEST['changeFooderStatus'])){
	$response=array();
	$status = $feature->encrypt_decrypt('decrypt',$_REQUEST['changeFooderStatus']);
	$fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['fid']);
	$update = $db->update('fooders_details',array('status'=>$status),array('fooder_id'=>$fooderid));
	if($update){
		echo trim('success');
	}
}



elseif(isset($data['add_item_to_order']))
{ 
	$response=array();
	$order_id=$data['add_item_to_order'];
	$quantity_id=$data['quantity_id']?$data['quantity_id']:'';
	$product_id=isset($data['product_id'])?$data['product_id']:'';

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$fooderid=isset($_SESSION['id'])?$_SESSION['id']:'';

$fname=$db->get_var('fooders',array('fooder_id'=>$fooderid),'name');
$pdetails=$db->get_row('fooders_products',array('id'=>$product_id,'fooder_id'=>$fooderid),array('menu_id','name','price','proprice'));
$odetails=$db->get_row('orders',array('id'=>$order_id,'fooder_id'=>$fooderid),array('table_id','cookie','payment_status'));

// echo "<pre>";
// print_r($pdetails);
// echo "</pre>";


// exit();



if($order_id=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Order id missing!</font>';
}
elseif($odetails['payment_status']=='1')
{
	$response['error']=true; 
	$response['msg']='<font class="red">Order already paid!</font>';
}
elseif($fooderid=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Fooder id missing!</font>';
}
elseif($product_id=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Select Product!</font>';
}
elseif($quantity_id=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Enter Quantity!</font>';
}
elseif($quantity_id<=0)
{
	$response['error']=true;
	$response['msg']='<font class="red">Enter Quantity!</font>';
}
else{

	if($db->exists('order_items',array('order_id'=>$order_id,'fooder_id'=>$fooderid,'menu_id'=>$pdetails['menu_id'],'product_id'=>$product_id,'addon_item'=>1)))
	{
		$old_qty=$db->get_var('order_items',array('order_id'=>$order_id,'fooder_id'=>$fooderid,'menu_id'=>$pdetails['menu_id'],'product_id'=>$product_id,'addon_item'=>1),'quantity');
$new_qty=$old_qty+$quantity_id;
		$insert = $db->update('order_items',array('quantity'=>$new_qty,'ip'=>$_SERVER['REMOTE_ADDR']),array('order_id'=>$order_id,
																												'fooder_id'=>$fooderid,
																												'menu_id'=>$pdetails['menu_id'],
																												'product_id'=>$product_id,
																												'addon_item'=>1));



	}else{
		  $insert = $db->insert('order_items',array('order_id'=>$order_id,
													'fooder_id'=>$fooderid,
													'fooder_name'=>$fname,
													'cookie_basket'=>$odetails['cookie'],
													'menu_id'=>$pdetails['menu_id'],
													'product_id'=>$product_id,
													'product_name'=>$pdetails['name'],
													'quantity'=>$quantity_id,
													'product_price'=>$pdetails['price'],
													'product_proprice'=>$pdetails['proprice'],
													'table_id'=>$odetails['table_id'],
													'addon_item'=>1,
													'ip'=>$_SERVER['REMOTE_ADDR']));
	}



		
if(isset($insert))
{

$response['error']=false;
$response['msg']='<font class="green"><i class="icon-check" ></i> Add successfully!</font>';




}else{

$response['error']=true;
$response['msg']='<font class="red">Some thing went wrong!</font>';
}

}




	echo json_encode($response); 
	exit();
} 
elseif(isset($data['remove_order_item']))
{
	$response=array();
	$id=$data['remove_order_item'];
	$order_id=$data['order_id'];
	$fooder_id=$data['fooder_id']?$data['fooder_id']:'';


if($order_id=="")
{
	$response['error']=true;
	$response['msg']='Order id missing!';
}else{

	$count=$db->get_count('order_items',array('order_id'=>$order_id));
	if($count>1)
	{
		$order_item_detials=$db->get_row('order_items',array('order_id'=>$order_id,'fooder_id'=>$fooder_id,'id'=>$id));
		$odetails=$db->get_row('orders',array('id'=>$order_id,'fooder_id'=>$fooder_id),array('payment_status'));
		if($odetails['payment_status']=='0')
		{
					$delete=$db->delete('order_items',array('id'=>$id,'order_id'=>$order_id,'fooder_id'=>$fooder_id));
	
					if(isset($delete))
					{
	
					$response['error']=false;
					$response['msg']='<font class="green"><i class="icon-check" ></i> Remove successfully!</font>';
	
			   }else{
	
					$response['error']=true;
					$response['msg']='<font class="red">Some thing went wrong!</font>';
					}
	
		}else{
			$response['error']=true;
			$response['msg']='<font class="red">Order already paid!</font>';
		}


	}else{
		$response['error']=true;
		$response['msg']='<font class="red">Please add more items to delete this item!</font>'; 
	} 

	



}

echo json_encode($response); 
exit();

}

elseif($data['add_item_quantity_to_order'])
{
	$response=array();
	$id=$data['add_item_quantity_to_order'];
	$order_id=$data['order_id'];
	$fooder_id=$data['fooder_id']?$data['fooder_id']:'';


if($order_id=="")
{
	$response['error']=true;
	$response['msg']='Order id missing!';
}else{

	$order_item_detials=$db->get_row('order_items',array('order_id'=>$order_id,'fooder_id'=>$fooder_id,'id'=>$id));
	
	$odetails=$db->get_row('orders',array('id'=>$order_id,'fooder_id'=>$fooder_id),array('payment_status'));

	if($odetails['payment_status']=='0')
	{
				if(isset($order_item_detials['quantity']))
				{
				$old_qty=$order_item_detials['quantity'];
				}
				$new_qty=$old_qty+1; 

				$insert = $db->update('order_items',array('quantity'=>$new_qty,
				                                            'ip'=>$_SERVER['REMOTE_ADDR']),array('order_id'=>$order_id,
															'fooder_id'=>$fooder_id,
															'id'=>$id));

				if(isset($insert))
				{

				$response['error']=false;
				$response['msg']='<font class="green"><i class="icon-check" ></i> Save successfully!</font>';




				}else{

				$response['error']=true;
				$response['msg']='<font class="red">Some thing went wrong!</font>';
				}

	}else{
		$response['error']=true;
		$response['msg']='<font class="red">Order already paid!</font>';
	}





}

echo json_encode($response); 
exit();



}elseif($data['minus_item_quantity_to_order'])
{
	$response=array();
	$id=$data['minus_item_quantity_to_order'];
	$order_id=$data['order_id'];
	$fooder_id=$data['fooder_id']?$data['fooder_id']:'';


if($order_id=="")
{
	$response['error']=true;
	$response['msg']='Order id missing!';
}else{

	$order_item_detials=$db->get_row('order_items',array('order_id'=>$order_id,'fooder_id'=>$fooder_id,'id'=>$id));
	$odetails=$db->get_row('orders',array('id'=>$order_id,'fooder_id'=>$fooder_id),array('payment_status'));
if($odetails['payment_status']=='0')
{
	if(isset($order_item_detials['quantity']))
	{
	$old_qty=$order_item_detials['quantity'];
	}
	if($old_qty>1){
	$new_qty=$old_qty-1; 
	}else{
		$new_qty=$old_qty; 
	}

	$insert = $db->update('order_items',array('quantity'=>$new_qty,'ip'=>$_SERVER['REMOTE_ADDR']),array('order_id'=>$order_id,
												'fooder_id'=>$fooder_id,
												'id'=>$id));

	if(isset($insert))
	{

	$response['error']=false; 
	$response['msg']='<font class="green"><i class="icon-check" ></i> Save successfully!</font>';

	}else{

	$response['error']=true;
	$response['msg']='<font class="red">Some thing went wrong!</font>';
	}

}else{
	$response['error']=true;
	$response['msg']='<font class="red">Order already paid!</font>';
}

		

}

echo json_encode($response); 
exit();



}
if($data['send_notification_add_order_item'])
{
	$response=array();
	$id=$data['send_notification_add_order_item'];
	$order_id=$data['order_id'];
	$fooder_id=$data['fooder_id']?$data['fooder_id']:'';


if($order_id=="")
{
	$response['error']=true;
	$response['msg']='Order id missing!';
}
elseif($fooder_id=="")
{
	$response['error']=true;
	$response['msg']='Fooder id missing!';
}else{

$order_details=$db->get_row('orders',array('id'=>$order_id,'fooder_id'=>$fooder_id));
$order_number='#'.$order_details['order_number_qrcode'];
		if($order_details['order_mode']==0 && $order_details['table']>0)
		{
			$table=$order_details['table'];


		}else{
			$table=0;
		}

if($order_details['payment_status']=='0'){
	$eater_id='eater_'.$order_details['eater_id'];

    $eater_id = $feature->encrypt_decrypt('encrypt',$eater_id);
	$msg = '<a href="" class="btn btn-warning btn-block rounded text-decoration-none align-items-center"> 
 <b><i class="feather-alert-triangle"></i>  View updated order('.$order_number.') </b></a>';
  $data=array('fooderid'=>$eater_id,'table'=>$table,'msg'=>base64_encode($msg),'notification_div'=>'pushNotify');
	 $curl = curl_init();
  
	 curl_setopt_array($curl, array(
	   CURLOPT_URL => 'https://alertify.live/send_data', 
	   CURLOPT_RETURNTRANSFER => true,
	   CURLOPT_ENCODING => '',
	   CURLOPT_MAXREDIRS => 10,
	   CURLOPT_TIMEOUT => 0,
	   CURLOPT_FOLLOWLOCATION => true,
	   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	   CURLOPT_CUSTOMREQUEST => 'POST',
	   CURLOPT_POSTFIELDS =>json_encode($data),
	   CURLOPT_HTTPHEADER => array(
		 'Content-Type: application/json'
	   ),
	 ));
	 
	$res = curl_exec($curl); 
	 
	 curl_close($curl);
	 
	 $response['error']=false;
	 $response['msg']=$res;

}else{
	$response['error']=true;
	$response['msg']='Order already paid!'; 
}



}

echo json_encode($response); 
exit();



}



elseif($data['print_order'])
{

	$response=array();
	$order_id=$data['print_order'];
	$fooder_id=$data['fooder_id']?$data['fooder_id']:'';


if($order_id=="")
{
	$response['error']=true;
	$response['msg']='Order id missing!';
}
elseif($fooder_id=="")
{
	$response['error']=true;
	$response['msg']='Fooder id missing!';
}else{


	$odetails=$db->get_row('orders',array('fooder_id'=>$fooder_id,'id'=>$order_id));

	$client_details=$db->get_row('eaters',array('eater_id'=>$odetails['eater_id']));
 
	$fooders_details=$db->get_row('fooders_details',array('fooder_id'=>$odetails['fooder_id']));
	$fooders_products=$db->get_all('fooders_products',array('fooder_id'=>$odetails['fooder_id'],'status'=>'1'));
	$fooders=$db->get_row('fooders',array('fooder_id'=>$odetails['fooder_id']));

// echo "<pre>";
// 	print_r($odetails);
// echo "</pre>";

// echo "<pre>";
// 	print_r($fooders);
// echo "</pre>"; 

// echo "<pre>";
// 	print_r($fooders_details);
// echo "</pre>";
$setting_details=$db->get_row('setting',array('id'=>'1'));

if($odetails['order_mode']==0 && $odetails['table_id']>0)
{
	$table_no=$db->get_var('fooders_tables',array('id'=>$odetails['table_id']),'table_no');


}else{
	$table_no='';
}



$fooder_name=isset($odetails['fooder_name'])?$odetails['fooder_name']:'';
$gstin=isset($fooders['gstin'])?$fooders['gstin']:'';
$fssai_number=isset($fooders['fssai_number'])?$fooders['fssai_number']:'';
$bill_paper_size=isset($fooders['bill_paper_size'])?$fooders['bill_paper_size']:'80';
$date=isset($odetails['creation_date'])?date($setting_details['date_format'],$odetails['creation_date']):'';
$time=isset($odetails['creation_date'])?date('h:i a',$odetails['creation_date']):'';

$order_number=isset($odetails['order_number_qrcode'])?$odetails['order_number_qrcode']:'';



/*
if($bill_paper_size=='80')
{
	$item_th_fontsize='18px';
	$item_row_fontsize='17px';
	$total_row_fontsize='18px';
}
elseif($bill_paper_size=='76')
{
	$item_th_fontsize='16px';
	$item_row_fontsize='15px';
	$total_row_fontsize='13px';
}
elseif($bill_paper_size=='57')
{
	$item_th_fontsize='14px';
	$item_row_fontsize='13px';
	$total_row_fontsize='13px';
	
}else{
	$item_th_fontsize='11px';
	$item_row_fontsize='10px';
	$total_row_fontsize='13px';
}*/ 

   $item_th_fontsize='14px';
	$item_row_fontsize='13px';
	$total_row_fontsize='13px'; 


// echo "<pre>";
// 	print_r($order_items); 
// echo "</pre>";

	
$html=' 
<table style="font-family: PT Sans, sans-serif; 
  background: #FFF; font-size: 12px; table-layout:fixed;">  
        <tbody>
            <tr> 
                <td>
    <table style="width: 100%;font-size: 13px;"> 
        <tbody>
            <tr>
                
				<th colspan="2"><p  style="text-align:center;padding: 5px 2px;margin: 0; font-size: medium;">'.$fooder_name.'</p></th>
            </tr>';

			if($gstin!=""){
            $html.='<tr>
                <td><p style="font-size: 13px;padding: 5px 0px;margin: 0;">GST Number : '.$gstin.'</p></td>
            </tr>';
			}
			
			$html.='<tr>
			<td><p style="font-size: 13px;padding: 5px 0px;margin: 0;">FSSAI Number : '.$fssai_number.'</p></td> 
		</tr>
        </tbody>
    </table> 
    
    <table style="width: 100%;font-size: 13px;">
        <tbody>
            <tr>
                <td>Date : <span>'.$date.'</span></td>
                <td style="text-align:right;">Time : <span>'.$time.'</span></td>
            </tr>
            <tr>
                <td>Table #: <span>'.$table_no.'</span></td>
                <td style="text-align:right;">Order # : <span>'.$order_number.'</span></td>
            </tr>
            <tr>
                <th colspan="2"><p  style="text-align:center;padding: 5px 2px;margin: 0; font-size: medium;">Original Receipt</p></th>
            </tr>
        </tbody>
    </table>
    
    <table style="width: 100%;font-size: 12px;">
        <thead>
            <tr>
                <th  style="width: 50%;text-align: left;font-size: '.$item_th_fontsize.';text-transform: uppercase;border-top:1px solid black;border-bottom: 1px solid black;vertical-align: middle;">Item</th>
                <th style=" width: 5%;text-align: center;font-size: '.$item_th_fontsize.';text-transform: uppercase;border-top:1px solid black;border-bottom: 1px solid black;vertical-align: middle;">Qty</th>
                <th style="width: 20%;text-align: center;font-size: '.$item_th_fontsize.';text-transform: uppercase;border-top:1px solid black;border-bottom: 1px solid black;vertical-align: middle;">Rate</th>
                <th style="width: 25%;text-align: right;font-size: '.$item_th_fontsize.';text-transform: uppercase;border-top:1px solid black;border-bottom: 1px solid black;vertical-align: middle;">Amount</th>
            </tr> 
        </thead>
       
        <tbody>';

		$order_items=$db->get_all('order_items',array('order_id'=>$odetails['id']));
		$delivery_charge=isset($odetails['delivery_charge'])?$odetails['delivery_charge']:'0.00';
		$service_charge_details=json_decode($odetails['service_charge_details'],true); 
		$tax_details=json_decode($odetails['tax_details'],true); 

		if(!empty($order_items))
		{
$subtotal=0;
$total=0;
foreach($order_items as $ori)
{
	$product_name=isset($ori['product_name'])?$ori['product_name']:'';
	$quantity=isset($ori['quantity'])?$ori['quantity']:'';

	$price=$ori['product_price'];
	if($ori['product_proprice']!='')
	{
		$price=$ori['product_proprice'];
	}
$row_amount=$price*$quantity;
$subtotal=$subtotal+$row_amount;

	$html.='<tr>
	<td style="font-size: '.$item_row_fontsize.';text-align: left;vertical-align: bottom;padding: 3px 0px;width: 60%;min-width: 60%;max-width: 60%;word-break: break-all;">'.$product_name.'</td>
	<td style="font-size: '.$item_row_fontsize.';text-align: center;vertical-align: bottom;padding: 3px 0px;">'.$quantity.'</td>
	<td style="font-size: '.$item_row_fontsize.';text-align: center;vertical-align: bottom;padding: 3px 0px;">&#8377;'.$price.'</td>
	<td style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;">&#8377;'.$row_amount.'</td> 
</tr>'; 
	
}


$discount=0.00;

$discount_rate=$odetails['discount_rate'];
$discount_type=$odetails['discount_type'];
$dt='&#8377;';
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
$dt='&#8377;';
}


}
$after_discount_amount=$subtotal-$discount;													
$service_charge=0;	

$service_charge=($after_discount_amount*$service_charge_details['percentage'])/100;
$taxable_amount=$after_discount_amount+$service_charge;



		}


          
            $html.='<tr> 
                <td colspan="3" style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;border-top:1px solid black !important;    padding-right: 12px;">Subtotal</td>
                <td style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;border-top:1px solid black !important;">&#8377;'.number_format($subtotal,2,'.','').'</td>
            </tr>
			<tr>
			<td colspan="3" style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;    padding-right: 12px;">Discount('.$dt.')'.'</td>
			<td style="text-align: right;font-size: '.$item_row_fontsize.';vertical-align: bottom;padding: 3px 0px;">&#8377;'.number_format($discount,2,'.','').'</td>
		</tr>';
		if($service_charge>0){
		$html.='<tr>
			<td colspan="3" style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;    padding-right: 12px;">'.$service_charge_details['name'].'('.$service_charge_details['percentage'].'%)'.'</td>
			<td style="text-align: right;font-size: '.$item_row_fontsize.';vertical-align: bottom;padding: 3px 0px;">&#8377;'.number_format($service_charge,2,'.','').'</td>
		</tr>';
		}
		if(is_array($tax_details))
		{
			$tax_amount=0;
		 foreach($tax_details as $tr)
		 {
			$tax=($taxable_amount*$tr['percentage'])/100;
			$tax_amount+=$tax;


		$html.='<tr>
                <td colspan="3" style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;    padding-right: 12px;">'.$tr['name'].'('.$tr['percentage'].'%)</td>
                <td style="text-align: right;font-size: '.$item_row_fontsize.';vertical-align: bottom;padding: 3px 0px;">&#8377;'.number_format($tax,2,'.','').'</td>
            </tr>
           ';
		 }}


if($odetails['order_mode']==1){


	$html.='<tr>
	<td colspan="3" style="font-size: '.$item_row_fontsize.';text-align: right;vertical-align: bottom;padding: 3px 0px;    padding-right: 12px;">delivery_charge</td>
	<td style="text-align: right;font-size: '.$item_row_fontsize.';vertical-align: bottom;padding: 3px 0px;">&#8377;'.number_format($delivery_charge,2,'.','').'</td>
</tr>';

		
}


	

		 $total=$after_discount_amount+$tax_amount+$delivery_charge+$service_charge;

			$html.='<tr>
                <th colspan="3" style="text-align: right;font-size: '.$total_row_fontsize.';    border-top: 1px dashed black !important;
    border-bottom: 1px dashed black !important;    padding-right: 12px;">Total</th>
                <th  style="text-align: right;font-size: '.$total_row_fontsize.';vertical-align: bottom;padding: 3px 0px;border-top: 1px dashed black !important;
    border-bottom: 1px dashed black !important;">&#8377;'.number_format($total,2,'.','').'</th>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%;font-size: 12px;">
        <tbody>';
if($odetails['payment_status']=='1'){ 

	$payment_type=isset($odetails['payment_status'])?$odetails['payment_status']:'';
		$html.='<tr>
                <td> Paid by : <span>'.$payment_type.'</span> 
                </td>
            </tr>';
}
            $html.='<tr> 
                <td>
                <p style="text-align:center;padding: 5px 2px;margin: 0;">
            Thank you for your visit!
        </p>
                </td>
            </tr>
        </tbody>
    </table> 

    </td>
            </tr>
        </tbody> 
    </table>
';

file_put_contents('print.txt',$html);
	$response['error']=false;
	$response['msg']='';
	$response['html_print']=$html;

}

echo json_encode($response); 
exit();

}



elseif($data['print_kot'])
{

	$response=array();
	$order_id=$data['print_kot'];
	$fooder_id=$data['fooder_id']?$data['fooder_id']:'';


if($order_id=="")
{
	$response['error']=true;
	$response['msg']='Order id missing!';
}
elseif($fooder_id=="")
{
	$response['error']=true;
	$response['msg']='Fooder id missing!';
}else{


	$odetails=$db->get_row('orders',array('fooder_id'=>$fooder_id,'id'=>$order_id));

	$client_details=$db->get_row('eaters',array('eater_id'=>$odetails['eater_id']));
 
	$fooders_details=$db->get_row('fooders_details',array('fooder_id'=>$odetails['fooder_id']));
	$fooders_products=$db->get_all('fooders_products',array('fooder_id'=>$odetails['fooder_id'],'status'=>'1'));
	$fooders=$db->get_row('fooders',array('fooder_id'=>$odetails['fooder_id']));

// echo "<pre>";
// 	print_r($odetails);
// echo "</pre>";

// echo "<pre>";
// 	print_r($fooders);
// echo "</pre>"; 

// echo "<pre>";
// 	print_r($fooders_details);
// echo "</pre>";
$setting_details=$db->get_row('setting',array('id'=>'1'));

if($odetails['order_mode']==0 && $odetails['table_id']>0)
{
	$table_no=$db->get_var('fooders_tables',array('id'=>$odetails['table_id']),'table_no');


}else{
	$table_no='';
}



$fooder_name=isset($odetails['fooder_name'])?$odetails['fooder_name']:'';
$gstin=isset($fooders['gstin'])?$fooders['gstin']:'';
$fssai_number=isset($fooders['fssai_number'])?$fooders['fssai_number']:'';
$bill_paper_size=isset($fooders['bill_paper_size'])?$fooders['bill_paper_size']:'80';
$date=isset($odetails['creation_date'])?date($setting_details['date_format'],$odetails['creation_date']):'';
$time=isset($odetails['creation_date'])?date('h:i a',$odetails['creation_date']):'';

$order_number=isset($odetails['order_number_qrcode'])?$odetails['order_number_qrcode']:'';
$eater_phonenumber=isset($odetails['eater_phonenumber'])?$odetails['eater_phonenumber']:'';



$bill_paper_size=isset($fooders['bill_paper_size'])?$fooders['bill_paper_size']:'57';
$eater_suggestions=isset($odetails['eater_suggestions'])?$odetails['eater_suggestions']:'';

// echo "<pre>";
// 	print_r($order_items);
// echo "</pre>";

	
$html='

<table style=" padding: 10px;
  margin-top: 10px!important;
  margin: 0 auto;
  width: '.$bill_paper_size.'mm;
  background: #FFF;
  border:1px solid #eee; table-layout:fixed;"> 
        <tbody>
            <tr>
                <td>
    <table style="width: 100%;font-size: 12px;">
        <tbody>
            <tr>
                
				<th colspan="2"><p  style="text-align:center;padding: 5px 2px;margin: 0; font-size: medium;">Table #'.$table_no.'</p></th>
            </tr>
            <tr>
                <td><p style="padding: 5px 0px;margin: 0;">Order # : '.$order_number.'</p></td>
            </tr>
			<tr>
			<td><p style="padding: 5px 0px;margin: 0;">Phone Number : '.$eater_phonenumber.'</p></td>
		</tr>
        </tbody>
    </table> 
    
 
    
    <table style="width: 100%;font-size: 12px;">
        <thead>
            <tr>
                <th  style="text-align: left;font-size: 11px;text-transform: uppercase;border-bottom: 1px solid black;vertical-align: middle;">Item</th>
                <th style=" width: 5%;text-align: center;font-size: 11px;text-transform: uppercase;border-bottom: 1px solid black;vertical-align: middle;">Qty</th>

            </tr>
        </thead>
       
        <tbody>';

		$order_items=$db->get_all('order_items',array('order_id'=>$odetails['id']));
	

		if(!empty($order_items))
		{

foreach($order_items as $ori)
{
	$product_name=isset($ori['product_name'])?$ori['product_name']:'';
	$quantity=isset($ori['quantity'])?$ori['quantity']:'';


	$html.='<tr>
	<td style="font-size: 10px;text-align: left;vertical-align: bottom;padding: 3px 0px;width: 60%;min-width: 60%;max-width: 60%;word-break: break-all;">'.$product_name.'</td>
	<td style="font-size: 10px;text-align: center;vertical-align: bottom;padding: 3px 0px;">'.$quantity.'</td>

</tr>'; 
	
}



		}


          
         

$html.='</tbody>
    </table>'; 
	if($eater_suggestions!="")
	{

    $html.='<table style="width: 100%;font-size: 12px;">
        <tbody>
		<tr><th  style="text-align: left;font-size: 11px;text-transform: uppercase;border-bottom: 1px solid black;vertical-align: middle;">Instructions:</th></tr>
		<tr>
                <td>
                <p style="text-align:left;padding: 5px 2px;margin: 0;">
            '.$eater_suggestions.'
        </p>
                </td>
            </tr>
        </tbody>
    </table>'; 
	}


    $html.='</td>
            </tr> 
        </tbody> 
    </table>';


	$response['error']=false;
	$response['msg']='';
	$response['html_print']=$html;

}

echo json_encode($response); 
exit();

}
elseif(isset($data['apply_discount_to_order']))
{ 
	$response=array();
	$order_id=$data['apply_discount_to_order'];
	$discount_rate=$data['discount_id']?$data['discount_id']:'';
	$discount_type=isset($data['discount_type'])?$data['discount_type']:'';


$fooderid=isset($_SESSION['id'])?$_SESSION['id']:'';
$odetails=$db->get_row('orders',array('fooder_id'=>$fooder_id,'id'=>$order_id));




if($order_id=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Order id missing!</font>';
}
elseif($odetails['payment_status']=='1')
{
	$response['error']=true; 
	$response['msg']='<font class="red">Order already paid!</font>';
}
elseif($fooderid=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Fooder id missing!</font>';
}
elseif($discount_type=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Discount Type!</font>';
}
elseif($discount_rate=="")
{
	$response['error']=true;
	$response['msg']='<font class="red">Enter Discount value!</font>';
}
elseif(!is_numeric($discount_rate))
{
	$response['error']=true;
	$response['msg']='<font class="red">Enter correct Discount value!</font>';
}
elseif($discount_type=='percent' && $discount_rate>100)
{
	$response['error']=true;
	$response['msg']='<font class="red">Discount Percent should be less than 100!</font>';
}




else{

	if($db->exists('orders',array('id'=>$order_id,'fooder_id'=>$fooderid)))
	{
		

		$order_items=$db->get_all('order_items',array('order_id'=>$order_id));

		$delivery_charge=isset($odetails['delivery_charge'])?$odetails['delivery_charge']:'Free';
		$service_charge_details=json_decode($odetails['service_charge_details'],true); 
		$tax_details=json_decode($odetails['tax_details'],true); 

		$subtotal=0;
		$discount=0;
		$dtype="";
		if(!empty($order_items))
		{

foreach($order_items as $ori)
{

	$quantity=isset($ori['quantity'])?$ori['quantity']:'';

	$price=$ori['product_price'];
	if($ori['product_proprice']!='')
	{
		$price=$ori['product_proprice'];
	}
$row_amount=$price*$quantity;
$subtotal=$subtotal+$row_amount;


	
}

if($discount_type=='percent')
{
$discount=($subtotal*$discount_rate)%100;
   $dtype='0';
}
elseif($discount_type=='amount')
{
	if($subtotal>=$discount_rate)
	{
	$discount=$discount_rate;
	$dtype='1';
	}else{
	$response['error']=true;
	$response['msg']='<font class="red">Discount amount should be less than '.$subtotal.'!</font>';
	echo json_encode($response); 
	exit();
	}
}
$insert=$db->update('orders',array('discount_type'=>$dtype,'discount_rate'=>$discount_rate),array('id'=>$order_id));


		}








	}else{
		$response['error']=true;
		$response['msg']='<font class="red">Order not exists!</font>';
	}



		
if(isset($insert))
{


/*************************** */

$order_number='#'.$odetails['order_number_qrcode'];
		if($odetails['order_mode']==0 && $odetails['table']>0)
		{
			$table=$odetails['table'];


		}else{
			$table=0;
		}


	$eater_id='eater_'.$odetails['eater_id'];

    $eater_id = $feature->encrypt_decrypt('encrypt',$eater_id);
	$msg = '<a href="" class="btn btn-warning btn-block rounded text-decoration-none align-items-center"> 
 <b><i class="feather-alert-triangle"></i>  Discount Applied!. View updated order('.$order_number.') </b></a>';
  $data=array('fooderid'=>$eater_id,'table'=>$table,'msg'=>base64_encode($msg),'notification_div'=>'pushNotify');
	 $curl = curl_init();
  
	 curl_setopt_array($curl, array(
	   CURLOPT_URL => 'https://alertify.live/send_data', 
	   CURLOPT_RETURNTRANSFER => true,
	   CURLOPT_ENCODING => '',
	   CURLOPT_MAXREDIRS => 10,
	   CURLOPT_TIMEOUT => 0,
	   CURLOPT_FOLLOWLOCATION => true,
	   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	   CURLOPT_CUSTOMREQUEST => 'POST',
	   CURLOPT_POSTFIELDS =>json_encode($data),
	   CURLOPT_HTTPHEADER => array(
		 'Content-Type: application/json'
	   ),
	 ));
	 
	$res = curl_exec($curl); 
	 
	 curl_close($curl);




/*************************** */

	$response['error']=false;
	$response['msg']='<font class="green"><i class="icon-check" ></i> Discount apply successfully!</font>';
}else{

	$response['error']=true;
	$response['msg']='<font class="red">Some thing went wrong!</font>';
}

}
	echo json_encode($response); 
	exit();
} 
?>