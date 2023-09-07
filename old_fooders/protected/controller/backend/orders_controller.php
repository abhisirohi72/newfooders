<?php
$db->order_by="`order_id` DESC";
$get_orders = $db->get_all('orders');
if(is_array($get_orders)){
	foreach ($get_orders as $data) {
		$id = $data['order_id'];
		if (isset($result[$id])) {
			$result[$id][] = $data;
		} else {
			$result[$id] = array($data);
		}
	}
}

if(isset($_POST['status_submit']) && $_POST['status_order']=="orderstatus" && $_POST['status_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$order_id = $_POST['order_id'];
	$status = $_POST['order_status'];
	$order_update = $db->update('orders',array('status'=>$status),array('order_id'=>$order_id));
	if($order_update){
		$display_order = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		You Have Changed Status Successfully.
		</div>';
	}
}

?>