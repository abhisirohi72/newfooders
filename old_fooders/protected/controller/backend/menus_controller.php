<?php
$db->order_by="`entry_date` DESC";
$db->limit="100";
$get_menus = $db->get_all('fooders_menus');
?>