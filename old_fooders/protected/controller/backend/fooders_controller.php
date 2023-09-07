<?php
$db->order_by="`fooder_id` DESC";
$get_fooders = $db->get_all('fooders',array(),array('fooder_id','name','login_email','mobile','address','location_name','joining_date','is_approved'));

if(isset($_POST['approved_submit']) && $_POST['approved_fooder']=="approved" && $_POST['approved_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$approved_status = $_POST['approved_status'];
	$approved_fooder_id = $_POST['approved_fooder_id'];
	$approved_update = $db->update('fooders',array('is_approved'=>$approved_status),array('fooder_id'=>$approved_fooder_id));
	if($approved_update){
		$display_approved = '<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		You Have Status Changed Successfully.
		</div>';
	}
}

?>