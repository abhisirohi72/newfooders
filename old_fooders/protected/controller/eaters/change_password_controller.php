<?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['change_pass_submit'] ) && $_POST ['change_pass_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
$oldpass = $fv->removespace($_POST['oldpass']);
$newpass = $fv->removespace($_POST ['newpass']);
$renewpass=$fv->removespace($_POST['renewpass']);

$get_pass =$db->get_col('eaters',array('eater_id'=>eater_id,'email'=>eater_email),'password');
//$verifypass =$password->verify($oldpass, $get_pass['0'],PASSWORD_DEFAULT);
$verifypass=password_verify($oldpass,$get_pass['0']);
if(is_array($get_pass)){
if ($fv->emptyfields(array('Old Password'=>$oldpass))){

	$display_eater_changepass =	'<div class="access-error" style="text-align:right;" ><i class="icon-warning-sign"></i> Oopes, No Old Password ! <i class="icon-remove" data-dismiss="alert"></i></div>';
}
elseif(!$verifypass){
	
	$display_eater_changepass = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i>  Old Password Is Wrong !<i class="icon-remove" data-dismiss="alert"></i>
	</div>';
}
elseif ($fv->emptyfields(array('New Password'=>$newpass))){
	$display_eater_changepass =	'<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Oopes, No New Password ! <i class="icon-remove" data-dismiss="alert"></i></div>';
}
/*
elseif ($newpass!=='' && !$fv->check_length($newpass)){
	$display_eater_changepass =	'<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Use (3 char & 2 num) At Least ! <i class="icon-remove" data-dismiss="alert"></i></div>';
}
*/
elseif ( strlen($newpass)<4 ) {

	$display_eater_changepass = '<div class="access-error"><i class="icon-warning-sign"></i> Use (4 Characters) At Least <i class="icon-remove" data-dismiss="alert"></i>
	</div>';
}
elseif ($fv->emptyfields(array('Retype New Password'=>$renewpass))){
	$display_eater_changepass =	'<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> No Retype New Password ! <i class="icon-remove" data-dismiss="alert"></i></div>';	
}
elseif ($newpass!==$renewpass){
	$display_eater_changepass =	'<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> New Passwords Do Not Match ! <i class="icon-remove" data-dismiss="alert"></i></div>';
}
else{
	//$encrypt_change_pass = $password->hashBcrypt($newpass,'10',PASSWORD_DEFAULT);
	$encrypt_change_pass=password_hash($newpass, PASSWORD_DEFAULT);
	$db->update('eaters',array('password'=>$encrypt_change_pass),array('eater_id'=>eater_id,'email'=>eater_email));
	$display_eater_changepass='<div class="access-success" style="text-align:right;"><i class="icon-ok"></i> Password Changed <i class="icon-remove" data-dismiss="alert"></i>
	</div>';
}
}
}
?>