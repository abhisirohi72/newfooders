<?php
if($_SESSION['order_placed']===true){
	$thankyou = '<h3 class="green bolder"><i class="icon-ok"></i> Thank You ! Your Order Has Been Placed Successfully <i class="icon-remove" data-dismiss="alert"></i>
    				</h3>';
	$_SESSION['order_placed']=false;
}
$db->order_by="`creation_date` DESC";
$get_orders_all = $db->get_all('orders',array('eater_id'=>eater_id));
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