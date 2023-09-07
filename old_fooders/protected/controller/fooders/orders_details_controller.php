<?php
if(isset($_REQUEST['order_id']))
{
	$order_id=$_REQUEST['order_id'];
$order_details =$db->get_row('orders',array('fooder_id'=>$fooder_id,'id'=>$order_id));
$eater_details=$db->get_row('eaters',array('eater_id'=>$order_details['id']));


// echo "<pre>";
// print_r($order_details);
// echo "</pre>";


// echo "<pre>";
// print_r($eater_details);
// echo "</pre>";

}else {
	$session->redirect('orders',fooders);
} 

?>