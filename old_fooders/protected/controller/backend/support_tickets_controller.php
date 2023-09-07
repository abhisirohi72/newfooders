<?php

$db->order_by="`id` DESC";
$get_care =$db->get_all('contact_feedback');
if(isset($_POST['delete_submit']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$care_id = $_POST['delete_care_id'];
	$care_name = $_POST['delete_care_name'];
	$display_care = '<form method="post" action=""><div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">Cancel</button>
	Are You Sure ! You Want To Delete <span class="text-primary"><strong>'.$feature->textstyler($care_name, 0).' </strong></span>
	<input type="hidden" name="ok_care_id" value="'.$care_id.'">
	<input type="hidden" name="ok_care_name" value="'.$care_name.'">
	<input type="hidden" name="delete_confirm_ip" value="'.$password->stringbreak($_SERVER['REMOTE_ADDR']).'">
	<input type="hidden" name="delete_care" value="deletecare">
	 
	<button type="submit" class="btn btn-danger btn-xs lead pull-right" name="delete_ok">OK</button>
	</div></form>';
}
elseif(isset($_POST['delete_ok']) && $_POST['delete_care']=="deletecare" && $_POST['delete_confirm_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$ok_care_id = $_POST['ok_care_id'];
	$ok_care_name = $_POST['ok_care_name'];
	$delete_status =$db->delete('contact_feedback',array('id'=>$ok_care_id));
	if($delete_status){
	 $display_care ='<div class="alert alert-success alert-dismissable">
	 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
	 You Have Been <span class="text-primary"><strong>'.$feature->textstyler($ok_care_name, 0).' </strong></span> Deleted Successfully.
	 </div>';
	  
	}
}

?>