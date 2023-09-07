<?php
$db->order_by="`created_date` DESC";
$db->limit="100";
$get_recipe = $db->get_all('recipes');
?>