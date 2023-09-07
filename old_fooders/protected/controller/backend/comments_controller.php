<?php
$db->order_by="`timestamp` DESC";
$db->limit="100";
$get_comments = $db->get_all('eaters_comments');
?>