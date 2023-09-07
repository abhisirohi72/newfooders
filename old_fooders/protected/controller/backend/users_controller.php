<?php
$eaterid = $_REQUEST['ceid'];
$linkCode = $_REQUEST ['rcode'];
$db->order_by="`eater_id` DESC";
$get_users = $db->get_all('eaters',array(),array('eater_id','name','email','mobile','address','region','joining_date','is_verified','last_modified','admin_view'));

if(isset($_POST['verify_submit']) && $_POST['verify_user']=="verified" && $_POST['verify_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$verify_status = $_POST['verify_status'];
	$verify_eater_id = $_POST['verify_eater_id'];
	$verify_update = $db->update('eaters',array('is_verified'=>$verify_status),array('eater_id'=>$verify_eater_id));
	if($verify_update){
		$display_verify = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                You Have Status Changed Successfully. 
                            </div>';
	}
}
elseif(isset($_POST['delete_submit']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$eater_id = $_POST['delete_eater_id'];
	$eater_name = $_POST['delete_eater_name'];
$display_verify = '<form method="post" action=""><div class="alert alert-success">
							   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">Cancel</button>
                               Are You Sure ! You Want To Delete <span class="text-primary"><strong>'.$feature->textstyler($eater_name, 0).' </strong></span>
                               <input type="hidden" name="ok_eater_id" value="'.$eater_id.'">
                               <input type="hidden" name="ok_eater_name" value="'.$eater_name.'">
							   <input type="hidden" name="delete_confirm_ip" value="'.$password->stringbreak($_SERVER['REMOTE_ADDR']).'">
                               <input type="hidden" name="delete_user" value="deleteuser">
                                           
                               <button type="submit" class="btn btn-danger btn-xs lead pull-right" name="delete_ok">OK</button>
                            </div></form>'; 
}
elseif(isset($_POST['delete_ok']) && $_POST['delete_user']=="deleteuser" && $_POST['delete_confirm_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$ok_eater_id = $_POST['ok_eater_id'];
	$ok_eater_name = $_POST['ok_eater_name'];
	$delete_status =$db->delete('eaters',array('eater_id'=>$ok_eater_id));
	if($delete_status){
	 $display_verify ='<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                You Have Been <span class="text-primary"><strong>'.$feature->textstyler($ok_eater_name, 0).' </strong></span> Deleted Successfully. 
                            </div>';
	 	
	}
}

elseif($query3==="ceid" && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	
	//$password->generateNewToken ( $tokenForLink, $hashedTokenForDatabase );
	$linkCode = $password->buildLinkCode ( $query3ans, $tokenForLink );
	$passwordResetUrl = sprintf ( $link->link ( 'access', eaters, '&rcode=%s' ), $linkCode );
	$db->update('eaters',array('token_value'=>$hashedTokenForDatabase,'token_time'=>time(),'token_used'=>'1'),array('eater_id'=>$query3ans));
	$get_eater = $db->get_row('eaters',array('eater_id'=>$query3ans),array('name','email'));
	$html='
	<table align="center" style="background-color:#2d2d2a;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
	<td>
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
	<tbody><tr>
	<td>
	<table border="0" width="100%" style="margin-top:20px;margin-bottom:20px;border-collapse:collapse">
	<tbody><tr>
	<td align="center">
	<a href="'.SITE_URL.'" style="text-decoration:none;color:#cb202d" target="_blank"><img src="'.SITE_URL.'/assets/eaters/img/email_logo.png" alt="Khate Raho Logo" style="border:0;min-height:auto;line-height:100%;outline:none;text-decoration:none"></a>
	</td>
	</tr>
	</tbody></table></td>
	</tr>
	</tbody></table>
	</td>
	</tr>
	</tbody></table>
	<table align="center" style="background-color:#f4f4f2;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
	<td>
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
	<tbody><tr>
	<td>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border:solid 1px #c8c8c8;border-top:none;border-collapse:collapse">
	<tbody><tr>
	<td colspan="2" align="center" style="padding-top:22px;padding-left:22px;padding-right:22px"><h3 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:12px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:20px;border-bottom:solid 1px #c8c8c8;padding-bottom:22px">Congratulations ! You are just one step behind getting access to Eater`s Zone</h3>
	<p style="text-align:center;font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
	<a href="'.$passwordResetUrl.'" style="background:#cb202d;font-family:Helvetica Neue,Arial,sans-serif;color:#fff;font-size:16px;padding:5px 15px;text-decoration:none;font-weight:normal" target="_blank">Click Here To Verify Your Email</a></p>
	<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because you registered as an eater on  khateraho.com. If you </span><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">didn`t do this, you can safely ignore this email and we will not email you again. </span></p></td>
	</tr>
	</tbody></table>
    </td>
	</tr>
	</tbody></table>
	<table width="100%" style="border-collapse:collapse">
	<tbody><tr>
	<td colspan="2" align="center">
	<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;border-bottom:solid 1px #c8c8c8;padding-bottom:8px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px">&copy; Khateraho.com. All rights reserved. </span></p></td>
	</tr>
	</tbody></table>
	</td>
	</tr>
	</tbody></table>
	</td>
	</tr>
	</tbody></table>';
	//$mail->mandrill($get_eater['email'], $get_eater['name'], 'Email Verification Link - Eaters Zone', $html, kr_eater_email);
	
	
	$mail_one->setFrom(FROMAIL, FROMNAME);
	$mail_one->addAddress($get_eater['email'],$get_eater['name']);
	//$mail_one->addReplyTo(REPLYEMAIL);
	$mail_one->isHTML(true);  
	$mail_one->CharSet = 'UTF-8';
	$mail_one->Subject = 'Email Verification Link - Eaters Zone';
	$mail_one->Body    = $html;
	$confirm =  $mail_one->send();

	$display_verify = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                You Have Send Mail Successfully. 
                            </div>';
}
elseif($query3==="cemail" && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
 $db->update('eaters',array('admin_view'=>'1'),array('eater_id'=>$query3ans));
 $session->redirect('users',admin);
}


?>