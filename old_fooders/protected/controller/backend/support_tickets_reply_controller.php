<?php
$get_eater_email= $db->get_row('contact_feedback',array('id'=>$query3ans),'email');
if(isset($_POST['send_mail']) && $_POST['reply_care']=="carereply" && $_POST['reply_care_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
$to = $fv->removespace($_POST['reply_to']);
$subject = $_POST['reply_subject'];
$message= $_POST['message'];
	
}


?>