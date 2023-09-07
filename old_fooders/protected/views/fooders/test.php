<?php 
$numbers = array('9758177461');
// phpinfo();
// exit();
$order_number_qrcode = '100';
$smstable = 'Table-5';
$topay = '240.90';
echo $fooder_name = trim('Lava Pub & Restaurant');
$var = '<a href="https://khateraho.com">khateraho.com</a>';
/*$message = rawurlencode('Thank you for placing your order #'.$order_number_qrcode.' (INR '.$topay.') with '.$fooder_name.' on khateraho.com
Team IWCN');*/

$message = rawurlencode('Your order #'.$order_number_qrcode.' with '.$fooder_name.' is ready. Please collect your order.
Khateraho.com
Team IWCN');

// echo $message = nl2br("New order #".$order_number_qrcode." (INR ".$topay.") received from khateraho.com \n".$smstable."\nTeam IWCN");
// $message = rawurlencode($message);
//echo nl2br("your first line\n your second line");

 //exit;
// $message = rawurlencode('New order #'.$order_number_qrcode.' (INR '.$topay.') received from khateraho.com 
//  "\n'.$smstable.'"
//  \nTeam IWCN');

// echo "======".$sms_message_order_placed;
// exit;
//  $message = str_replace('{order}','#200',$sms_message_order_placed);
//  $message = str_replace('{price}','(INR 5000)',$message);
//  $message = str_replace('{table}','Table-15',$message);  
//  //echo $message;
//  $message = rawurlencode($message);


$numbers = implode(',', $numbers);

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo $smsres = curl_exec($ch);

curl_close($ch);

?>