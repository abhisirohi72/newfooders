<?php
$get_order_eater_details = $db->run("select o.*,e.name,e.address,e.mobile,e.region from `orders` as o join `eaters` as e on e.eater_id=o.eater_id  
where o.fooder_id='$fooder_id' order by o.creation_date DESC")->fetchAll();


$sql1="SELECT orders.id,order_items.product_price,order_items.product_proprice,order_items.quantity
FROM `order_items` LEFT JOIN `orders` ON  order_items.order_id=orders.id
WHERE orders.fooder_id='$fooder_id'"; 

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
//$get_order_eater_details = $db->run("select o.*,e.name,e.address,e.mobile,e.region from `orders` as o join `eaters_old` as e on e.eater_id=o.eater_id  where o.fooder_id='$fooder_id' order by o.creation_date DESC")->fetchAll();
?> 