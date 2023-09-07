<?php
// ************************ business email part
// ***********************************
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['change_bemail'] ) && $_POST ['save_bemail_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$contact_name = $fv->trim ( $_POST ['contact_name'] );
	$business_email = $fv->removespace ( $_POST ['business_email'] );
	$notification_email = $fv->removespace($_POST['notification_email']);
	$notification_mobile = $fv->removespace($_POST['notification_mobile']);
	$username = $fv->removespace($_POST['username']);


	if ($fv->emptyfields ( array ('Contact Name' => $contact_name ) ))
	{
		$displayaccount = $fv->form_error ( famvcne, famvecn );
	} elseif (! $fv->check_alphabets ( str_replace ( ' ', '', $contact_name ) )) 
	{
		$displayaccount = $fv->form_error ( famvicn, famvpeoa );
	} elseif (! $fv->check_email ( $business_email ) && ! empty ( $business_email )) 
	{
		$displayaccount = $fv->form_error ( famvie, famvpeve );
	} 
	elseif($db->run("SELECT COUNT(*) FROM `fooders` WHERE `username`='$username' AND `fooder_id`!='$fooder_id'")->fetchColumn()>0) 
	{
		$displayaccount = $fv->form_error('oops Sorry !' , 'Username already exists!');
	} 
	else {
		$db->update ( 'fooders', array ('contact_name' => $contact_name,
		 'business_email' => $business_email,
		 'notification_email'=>$notification_email,
		 'username'=>$username,
		 'notification_mobile'=>$notification_mobile ), array ('fooder_id' => $fooder_id ) );
		$displayaccount = $fv->form_success ('Congratulations!','Profile updated successfully!');
		echo "<script>setTimeout(function() {window.location = '';}, 2000);</script>";
	
	}
}
// *********************************** Change Password
// *****************************************
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['change_password'] ) && $_POST ['save_password_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$new_password = $fv->removespace ( $_POST ['new_password'] );
	$retype_new_password = $fv->removespace ( $_POST ['retype_new_password'] );
	// if (! $fv->check_length ( $new_password )) {
	// 	$displayaccount = $fv->form_error ( famipass, fampassc );
	// }
	//  else
	 if ($new_password != $retype_new_password) {
		$displayaccount = $fv->form_error ( fampassm, fampta );
	} else {
		//$encrypt_password = $password->hashBcrypt($new_password,'10',PASSWORD_DEFAULT);
		$encrypt_password=password_hash($new_password, PASSWORD_DEFAULT);
		$db->update ( 'fooders', array ('password' => $encrypt_password ), array ('fooder_id' => $fooder_id ) );
		$displayaccount = $fv->form_success ( famvcong, famsup );
	}
}
?>