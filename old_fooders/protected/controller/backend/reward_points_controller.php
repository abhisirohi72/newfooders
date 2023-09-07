<?php
$get_loyalty = $db->get_all('loyalty');
if(isset($_REQUEST['delete_id']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$db->delete('loyalty',array('id'=>$_REQUEST['delete_id']));
	$session->redirect('reward_points',admin);
}
?>
