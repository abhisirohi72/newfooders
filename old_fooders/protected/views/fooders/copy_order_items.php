<?php

$fooder_id=123;
$orders=$db->get_all('orders',array('fooder_id'=>$fooder_id));

// echo "<pre>";
// print_r($orders);
// echo "</pre>";


foreach($orders as $order_details)
{ 

    //$order_details=$db->get_row('orders',array('id'=>'180'));





// echo "<pre>";
// print_r($order_details);
// echo "</pre>";

 $order_items=json_decode($order_details['details'],true);

// echo "<pre>";
// print_r($order_items);
// echo "</pre>";

$order_id=$order_details['id'];
$fooder_id=$order_details['fooder_id'];
$fooder_name=$order_details['fooder_name'];
$$phonenumber=$order_details['eater_phonenumber'];
$table_id=$order_details['table_id'];

$sub=0;
foreach($order_items as $row)
{ 

    if($row['product_proprice']!="")
    {
        $sub+=($row['product_proprice']*$row['quantity']);

    }else{
        $sub+=($row['product_price']*$row['quantity']);

    }

}


echo $sub;




if(is_array($order_items))
{
   foreach($order_items as $citrow)
    { 

if(!$db->exists('order_items',array('order_id'=>$order_id)))
{ 
    if($sub==$order_details['subtotal'])

      $product_type=$db->get_var('fooders_products',array('id'=>$citrow['product_id']),'product_type');
      $order_items_insert = $db->insert('order_items',array('order_id'=>$order_id, 
                                                            'fooder_id'=>$fooder_id,
                                                            'fooder_name'=>$fooder_name,
                                                            'phone'=>$phonenumber,
                                                            'table_id'=>$table_id,
                                                            'cookie_basket'=>$citrow['cookie_basket'],
                                                            'menu_id'=>$citrow['menu_id'],
                                                            'product_id'=>$citrow['product_id'],
                                                            'product_type'=>$product_type,
                                                            'product_name'=>$citrow['product_name'],
                                                            'quantity'=>$citrow['quantity'],
                                                            'product_price'=>$citrow['product_price'],
                                                            'product_proprice'=>$citrow['product_proprice'],
                                                            'ip'=>$_SERVER['REMOTE_ADDR']));
}
  
    } 

 
}
}
?>