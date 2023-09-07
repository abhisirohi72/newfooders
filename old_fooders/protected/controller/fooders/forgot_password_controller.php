<?php

if ($_SERVER['REQUEST_METHOD']== 'POST' && isset ( $_POST ['save_forggot_pass'] ) && $_POST ['save_forgot_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] )&& $_SESSION['fooder_token'] === $password->stringbreak(SITE_URL.strtotime(date('Y-m-d')))) 
{
$forgot_username = $fv->removespace($_POST['forgot_pass']);




if($fv->emptyfields(array('username'=>$forgot_username)))
{
	$display_forgot_pass = "<span class='red middle bolder'>".ffpcefcb."</span>";
}
// elseif (!$fv->check_email($forgot_email))
// {
// 	$display_forgot_pass = "<span class='red middle bolder'>".ffpcie."</span>";
// }
elseif(!$db->exists('fooders', array ('username' => $forgot_username)))
{
	$display_forgot_pass = "<span class='red middle bolder'>Username Not Exists!</span>";
}
else{

    //$query_forgot = $db->get_row( 'fooders', array ('login_email' => $forgot_email));
	
	$query_forgot = $db->get_row( 'fooders', array ('username' => $forgot_username));
	$forgot_email=$query_forgot['login_email'];
	//$email_exist = $query_forgot['login_email'];

	// if(!$email_exist){
	// 	$display_forgot_pass = "<span class='red middle bolder'>".ffpcedne."</span>";
	// }	

	 //$password->generateNewToken($tokenForLink, $hashedTokenForDatabase);
	 
	 $enctokenvalue = $feature->generateEncryptToken();
	 $db->insert('fooders_reset_password',array('fooder_id'=>$query_forgot['fooder_id'],'reset_token'=>$enctokenvalue,'date_created'=>time(),'used'=>'1'));
	$insert_id =$db->insert_id;
	//$linkCode = $password->buildLinkCode($insert_id, $tokenForLink);
     $passwordResetUrl = sprintf($link->link('reset_password',fooders,'&code=%s'), $enctokenvalue);
     $display_forgot_pass = "<span class='green middle bolder'>".ffpcrp."</span>"; 
     
     /*  Email Code Here*/
     $html='<table align="center" style="background-color:#2d2d2a;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
				<tbody><tr>
					<td>
						<table border="0" width="100%" style="margin-top:20px;margin-bottom:20px;border-collapse:collapse">
							<tbody><tr>
								<td align="center">
 <a href="http://www.khateraho.com/" style="text-decoration:none;color:#cb202d" target="_blank"><img src="'.SITE_URL.'/assets/eaters/img/email_logo.png" alt="Khate Raho Logo" style="border:0;min-height:auto;line-height:100%;outline:none;text-decoration:none"></a>
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
								<td colspan="2" align="center" style="padding-top:22px;padding-left:22px;padding-right:22px"><h1 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:18px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:20px;border-bottom:solid 1px #c8c8c8;padding-bottom:22px">Looks Like You Forgot Your Password ! </h1>
 <p style="text-align:center;font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
 <a href="'.$passwordResetUrl.'" style="background:#cb202d;font-family:Helvetica Neue,Arial,sans-serif;color:#fff;font-size:16px;padding:5px 15px;text-decoration:none;font-weight:normal" target="_blank">Click Here To Reset Your Password</a></p>
							  <p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because  somebody tried to change this email&#146;s password on khateraho.com. If you didn&#146;t do this, you can safely ignore this email and we will not email you again. In case you want to report this issue, email us at <a href="mail:fooders@khateraho.com">fooders@khateraho.com</a> or call us at 0562-4055645, 4052090</span></p></td>
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
     
     $mail->mandrill($forgot_email, $query_forgot['contact_name'], 'Fooders Reset Password', $html, kr_noreply_email);
}
}
?>