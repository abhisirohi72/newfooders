<?php
$orderid = $_REQUEST['order_id'];
$db->order_by="`creation_date` DESC";
$get_orders_all = $db->get_all('orders',array('order_id'=>$orderid));
if(is_array($get_orders_all)){
	foreach ($get_orders_all as $data) {
		$id = $data['order_id'];
		if (isset($result[$id])) {
			$result[$id][] = $data;
		} else {
			$result[$id] = array($data);
		}
	}
}

?>