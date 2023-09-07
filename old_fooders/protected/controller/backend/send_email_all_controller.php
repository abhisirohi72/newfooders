<?php
$db->order_by="`eater_id` DESC";
$eaters = $db->get_all('eaters',array(),array('eater_id','name','email','is_verified'));
$db->order_by="`fooder_id` DESC";
$fooders = $db->get_all('fooders',array(),array('name','login_email','is_approved'));


if(isset($_POST['ef_send']) && $_POST['ef_email']=="efemail" && $_POST['ef_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
    $one_by_one = $fv->removespace($_POST['ef_to']);
	
    $email = $_POST['send_email'];   
    $subject = $_POST['ef_subject'];
	$message= $_POST['ef_message'];
	
	$html = '<table align="center" style="background-color:#CB202D;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
	<td>
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
	<tbody><tr>
	<td>
	<table border="0" width="100%" style="margin-top:20px;margin-bottom:20px;border-collapse:collapse">
	<tbody><tr>
	<td align="center">
	<a href="http://'.SITENAME.'/" style="text-decoration:none;color:#cb202d" target="_blank">
	<img src="'.SITE_URL.'/assets/eaters/img/email_logo.png" alt="'.Appname.' Logo" style="border:0;min-height:auto;line-height:100%;outline:none;text-decoration:none"></a>
	</td>
	</tr>
	</tbody></table></td>
	</tr>
	</tbody></table>
	</td>
	</tr>
	</tbody></table>
	<table align="center" style="background-color:#ffffff;width:100%;border-collapse:collapse;" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
	<td>
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%;">
	<tbody><tr>
	<td>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border-top:none;border-collapse:collapse;">
	<tbody>
	<tr>
	<td colspan="2" style="padding-top:22px;">
	<h3 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:12px;line-height:18px;color:#2d2d2a;margin-top:0;">'.$message.'</h3>
	</td>
	</tr>
	</tbody></table>
    </td>
	</tr>
	</tbody></table>
	
	</td>
	</tr>
	</tbody></table>
	';
	
	if($email=='1'){
	if(is_array($eaters)){
		foreach ($eaters as $eat){
			$mail->mandrill($eat['email'], $eat['name'], $subject, $html, kr_eater_email);
		}
	}
	if(is_array($fooders)){
		foreach ($fooders as $food){
			$mail->mandrill($food['login_email'], $food['name'], $subject, $html, kr_fooder_email);
		}
	}	
	}
	elseif ($email=='2'){
		if(is_array($fooders)){
			foreach ($fooders as $food){
				$mail->mandrill($food['login_email'], $food['name'], $subject, $html, kr_fooder_email);
			}
		}
	}
	elseif($email=='3'){
	if(is_array($eaters)){
		foreach ($eaters as $eat){
			$mail->mandrill($eat['email'], $eat['name'], $subject, $html, kr_eater_email);
		}
	}
	}
	elseif ($email=='4'){
		if(is_array($one_by_one)){
			foreach($one_by_one as $fe){
			$email_one = explode('___', $fe);
			$mail->mandrill($email_one['0'], $email_one['1'], $subject, $html, kr_eater_email);
			
			}
			}
	}

}

?>