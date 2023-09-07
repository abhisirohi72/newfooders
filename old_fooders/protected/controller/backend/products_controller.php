<?php
$db->order_by="`entry_date` DESC";
$db->limit="100";
$getproducts = $db->get_all('fooders_products');
?>