<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if ($session->Check () && $_SESSION ['type'] === 'eater') {
	$session->redirect ( 'profile', eaters );
} else {
	$linkCode = $_REQUEST ['rcode'];
	$linkCode1 = $_REQUEST ['fcode'];
	$display_error_token = "";
	if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['login'] ) && $_POST ['eater_login_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
		$email_login = $fv->removespace ( filter_var ( $_POST ['email'] ), FILTER_SANITIZE_STRING );
		$password_login = $fv->removespace ( filter_var ( $_POST ['password'], FILTER_SANITIZE_STRING ) );
		if ($fv->emptyfields ( array ('Email' => $email_login ) )) {
			$display_eater_login = '<div class="access-error"><i class="icon-warning-sign"></i> Email Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} elseif (! filter_var ( $email_login, FILTER_VALIDATE_EMAIL )) {
			$display_eater_login = '<div class="access-error"><i class="icon-warning-sign"></i> Oopes ! Invalid Email <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} elseif ($fv->emptyfields ( array ('Password' => $password_login ) )) {
			$display_eater_login = '<div class="access-error"><i class="icon-warning-sign"></i> Password Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} else {
			$get_eater_data = $db->get_row ( 'eaters', array ('email' => $email_login ) );
			$get_eater_address = $db->get_row ( 'eater_addresses', array ('eater_id' => $get_eater_data['eater_id'],'default'=>'1' ) );
			if (is_array ( $get_eater_data )) {
				if ($get_eater_data ['is_verified'] === '1') {
					$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i> Eater verification is pending ! Check the link provided in your eater verification email </span>";
				} elseif ($get_eater_data ['is_verified'] === '3') {
					$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i> Your account has been suspended</span>";
				} elseif ($get_eater_data ['is_verified'] === '4') {
					$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i> Your account has been terminated</span>";
				} else {
					//$verify_eater = $password->verify ( $password_login, $get_eater_data ['password'], PASSWORD_DEFAULT );
					$verify_eater = password_verify($password_login,$get_eater_data['password']);
					if (! $verify_eater) {
						$display_eater_login = '<div class="access-error"><i class="icon-warning-sign"></i> Invalid Eater ! Please Try Again ! <i class="icon-remove" data-dismiss="alert"></i>
			</div>';
					} else {
						
						unset($_SESSION['cart_count']);
						$session->Open ();
						if ($session->Check ()) {
							$_SESSION ['eater_email'] = $get_eater_data ['email'];
							$_SESSION ['type'] = "eater";
							$_SESSION ['id'] = $get_eater_data ['eater_id'];
							$_SESSION ['eater_name'] = $get_eater_data ['name'];
							$_SESSION ['eater_address'] = $get_eater_address['address'];
							$_SESSION ['eater_mobile'] = $get_eater_data ['mobile'];
							$_SESSION ['eater_dob'] = $get_eater_data ['dob'];
							$_SESSION ['eater_gender'] = $get_eater_data ['gender'];
							$_SESSION ['eater_city'] = $get_eater_data ['city'];
							//$_SESSION ['eater_zip'] = $get_eater_data ['zip'];
							$_SESSION ['eater_state'] = $get_eater_data ['state'];
							$region_id_name = explode('___',$get_eater_data['region']);
							$region_id = $region_id_name['0'];
							$region_name = $region_id_name['1'];
							$_SESSION ['eater_region_id'] = $region_id;
							$_SESSION ['eater_region_name'] = $region_name;
							$_SESSION ['eater_joining_date'] = $get_eater_data ['joining_date'];
							$_SESSION ['eater_joining_ip'] = $get_eater_data ['joining_ip'];
							$_SESSION ['eater_favourite_cuisine'] = $get_eater_data ['favourite_cuisine'];
							$_SESSION ['eater_favourite_dish'] = $get_eater_data ['favourite_dish'];
							$db->update('food_basket',array('eater_id'=>$get_eater_data['eater_id']),array('cookie_basket'=>$_COOKIE['eater_basket']));
							if($db->exists('food_basket',array('eater_id'=>$get_eater_data ['eater_id'])))
							{
							$db->update('food_basket',array('cookie_basket'=>$_COOKIE['eater_basket']),array('eater_id'=>$get_eater_data['eater_id']));	
							$count=$db->run("SELECT id ,product_id, COUNT(*) as count FROM food_basket where eater_id=".$get_eater_data['eater_id']." GROUP BY product_id")->fetchAll();
							
							foreach($count as $c){
	                            if($c['count']>1){
		                         $db->delete('food_basket',array('eater_id'=>$get_eater_data['eater_id'],'product_id'=>$c['product_id']));
	                              }
                              }
							
							
							}
							
						   
							
							//uri explode
						  if(base64_decode($_REQUEST['uri']))
						  	echo '<script>window.location="'.base64_decode($_REQUEST['uri']).'"</script>';
						  else
							$session->redirect ( 'profile', eaters );
						}
					}
				}
			} else {
				$display_eater_login = '<div class="access-error"><i class="icon-warning-sign"></i> Invalid Eater ! Please Try Again ! <i class="icon-remove" data-dismiss="alert"></i>
			</div>';
			}
		}
	
	}	

	// *************************************** End eater login controller
	// **************************************************
	/*
	 * ************************************** Register eater controller start
	 * *********************************************
	 */
	elseif ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['signup'] ) && $_POST ['eater_signup_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
		$full_name = $fv->trim ( $_POST ['full_name'] );
		$eater_email = $fv->removespace ( $_POST ['eater_email'] );
		$eater_password = $fv->removespace ( $_POST ['eater_password'] );
		$joining_ip = $_SERVER ['REMOTE_ADDR'];
		$exist_email = $db->exists ( 'eaters', array ('email' => $eater_email ) );
		if ($fv->emptyfields ( array ('Full name' => $full_name ) )) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Oopes, No Name ! <i class="icon-remove" data-dismiss="alert"></i></div>';
		} elseif (! $fv->check_alphabets ( str_replace ( ' ', '', $full_name ) )) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Com&#146;on Yaar, Use Real Name <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} elseif ($fv->emptyfields ( array ('Email' => $eater_email ) )) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Email Is Empty !
		<i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} elseif (! filter_var ( $eater_email, FILTER_VALIDATE_EMAIL )) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Email Is Invalid! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} elseif ($exist_email) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> User With This Email Is Already An Eater <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} elseif ($fv->emptyfields ( array ('Password' => $eater_password ) )) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Password Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		}
		/* elseif (! $fv->check_length ( $eater_password )) {
			
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Use (3 char & 2 num) At Least <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
		} */
		elseif ( strlen($eater_password)<4 ) {
			$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Use (4 Characters) At Least <i class="icon-remove" data-dismiss="alert"></i>
			</div>';
		}
		else {
			//$password->generateNewToken ( $tokenForLink, $hashedTokenForDatabase );
			//$encrypt_password_eaters = $password->hashBcrypt ( $eater_password, '10', PASSWORD_DEFAULT );
			$encrypt_password_eaters=password_hash($eater_password, PASSWORD_DEFAULT);
            $enctokenvalue = $feature->generateEncryptToken();
			$eaters_array = array ('name' => $full_name, 'email' => $eater_email, 'password' => $encrypt_password_eaters, 'joining_ip' => $joining_ip, 'joining_date' => time (), 'token_value' => $enctokenvalue, 'token_time' => time (), 'token_type' => '1', 'is_verified' => '1', 'token_used' => '1' );
			$db->insert ( 'eaters', $eaters_array );
			$get_eater_id = $db->insert_id;
			$path_profile_pic = SERVER_ROOT . '/uploads/eaters/'.md5($get_eater_id).'/pictures/';
			if (! file_exists ( $path_profile_pic )) {
				mkdir ( $path_profile_pic, 0777, true );
			}
			//$linkCode = $password->buildLinkCode ( $get_eater_id, $tokenForLink );
			 $passwordResetUrl = sprintf ( $link->link ( 'access', eaters, '&rcode=%s' ), $enctokenvalue );
			$display_eater_signup = '<div class="access-success"><i class="icon-ok"></i> Please Check Your Email Inbox/Spam For Verification Link<i class="icon-remove" data-dismiss="alert"></i>
		</div>';
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
</tbody></table>
			';
			//$mail->mandrill($eater_email, $full_name, 'Email Verification Link - Eaters Zone', $html, kr_eater_email);

			$mail_one = new PHPMailer(true);
			//Server settings
			$mail_one->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
			$mail_one->isSMTP();                    // Send using SMTP
			$mail_one->Host       = smtp_host;                    // Set the SMTP server to send through
			$mail_one->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail_one->Username   = smtp_username;                     // SMTP username
			$mail_one->Password   = smtp_password;                               // SMTP password
			$mail_one->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail_one->Port       = smtp_port;
			$mail_one->setFrom(FROMAIL, FROMNAME);
			$mail_one->addAddress($eater_email,$full_name);
			//$mail_one->addReplyTo(REPLYEMAIL);
			$mail_one->isHTML(true);  
			$mail_one->CharSet = 'UTF-8';
			$mail_one->Subject = 'Email Verification Link - Eaters Zone';
			$mail_one->Body    = $html;
			$confirm =  $mail_one->send();

			
		}
	
	} 

	elseif ($linkCode) {
		//$isValidToken = $password->parseLinkCode ( $linkCode, $databaseRowId, $tokenFromLink );
		// With the row id, we can get the stored hash from the database.
		// If we have stored an expiry date, we can check it here.
		//$hashedTokenFromDatabase = $db->get_row ( 'eaters', array ('eater_id' => $databaseRowId ) );
		//$expire_time = ceil ( (time () - $hashedTokenFromDatabase ['token_time']) / 60 );
		// Finally we check, whether the link token matches the stored hash.
		//$isTokenCorrect = $password->verifyToken ( $tokenFromLink, $hashedTokenFromDatabase ['token_value'] );
		// Show password change form. After successfully setting a new
		// password, mark the token as used.
		if($db->exists('eaters',array('token_value'=>$linkCode,'token_type'=>'1','token_used'=>'1'))){
			$isTokenCorrect = 1;
			$hashedTokenFromDatabase = $db->get_row ( 'eaters', array ('token_value'=>$linkCode,'token_type'=>'1','token_used'=>'1'));
		    $expire_time = ceil ( (time () - $hashedTokenFromDatabase ['token_time']) / 60 );
		}else{
			$isTokenCorrect = 0;
		}
		if ($isTokenCorrect=='1' && $expire_time < 120 && $hashedTokenFromDatabase ['token_used'] === '1') {
			if ($db->update ( 'eaters', array ('token_used' => '2', 'is_verified' => '2' ), array ('eater_id' => $hashedTokenFromDatabase ['eater_id'] ) ))
				$display_error_token = "<span class='green bolder'><i class='icon-ok'></i> Congratulations " . $feature->textstyler ( $hashedTokenFromDatabase ['name'], '1' ) . " ! You Are Now Verified Eater ! You Can Use " . $hashedTokenFromDatabase ['email'] . " To Login Into Eaters Zone</span>";
		} elseif ($isTokenCorrect=='0') {
			$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i>The token is incorrect.</span>";
		} else {
			$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i> The token has expired.</span>";
		}
	
	} elseif ($linkCode1) {
		//$isValidToken = $password->parseLinkCode ( $linkCode1, $databaseRowId, $tokenFromLink );
		// With the row id, we can get the stored hash from the database.
		// If we have stored an expiry date, we can check it here.
		//$hashedTokenFromDatabase = $db->get_row ( 'eaters', array ('eater_id' => $databaseRowId ) );
		//$expire_time = ceil ( (time () - $hashedTokenFromDatabase ['token_time']) / 60 );
		// Finally we check, whether the link token matches the stored hash.
		//$isTokenCorrect = $password->verifyToken ( $tokenFromLink, $hashedTokenFromDatabase ['token_value'] );
		// Show password change form. After successfully setting a new
		// password, mark the token as used.
        if($db->exists('eaters',array('token_value'=>$linkCode1,'token_type'=>'1','token_used'=>'1'))){
			$isTokenCorrect = 1;
			$hashedTokenFromDatabase = $db->get_row ( 'eaters', array ('token_value'=>$linkCode1,'token_type'=>'1','token_used'=>'1'));
		    $expire_time = ceil ( (time () - $hashedTokenFromDatabase ['token_time']) / 60 );
		}else{
			$isTokenCorrect = 0;
		}


		if ($isTokenCorrect=='0') {
			$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i>The token is incorrect.</span>";
		} elseif ($expire_time > 120) {
			$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i>The token has expired.</span>";
		} elseif ($isTokenCorrect=='1' && $expire_time < 120 && $hashedTokenFromDatabase ['token_used'] === '3') {
			$display_error_token = "<span class='green bolder'><i class='icon-ok'></i> " . $feature->textstyler ( $hashedTokenFromDatabase ['name'], '1' ) . " ! Enter Your New Password</span>";
			if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['reset_access'] ) && $_POST ['eater_reset_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
				$eater_new_pass = $fv->removespace ( $_POST ['new_pass'] );
				$eater_retype_pass = $fv->removespace ( $_POST ['retype_new_pass'] );
				
				if ($fv->emptyfields ( array ('New Password' => $eater_new_pass ) )) {
					$display_reset = '<div class="access-error"><i class="icon-warning-sign"></i> New Password Is Empty !<i class="icon-remove" data-dismiss="alert"></i>
    			</div>';
				} 
				
				/*elseif (! $fv->check_length ( $eater_new_pass )) {
					$display_reset = '<div class="access-error"><i class="icon-warning-sign"></i> Use (3 char & 2 num) At Least <i class="icon-remove" data-dismiss="alert"></i>
    			</div>';
				} 
				*/
				elseif ( strlen($eater_new_pass)<4 ) {
					$display_eater_signup = '<div class="access-error"><i class="icon-warning-sign"></i> Use (4 Characters) At Least <i class="icon-remove" data-dismiss="alert"></i>
					</div>';
				}
				elseif ($fv->emptyfields ( array ('Retype New Password' => $eater_retype_pass ) )) {
					$display_reset = '<div class="access-error"><i class="icon-warning-sign"></i> Retype New Password Is Empty! <i class="icon-remove" data-dismiss="alert"></i>
    			</div>';
				} elseif ($eater_new_pass !== $eater_retype_pass) {
					$display_reset = '<div class="access-error"><i class="icon-warning-sign"></i> Passwords Do Not Match ! <i class="icon-remove" data-dismiss="alert"></i>
    			</div>';
				} else {
					
					//$encrypt_reset_pass = $password->hashBcrypt ( $eater_new_pass, '10', PASSWORD_DEFAULT );
					$encrypt_reset_pass=password_hash($eater_new_pass, PASSWORD_DEFAULT) ;
					$db->update ( 'eaters', array ('password' => $encrypt_reset_pass, 'token_used' => '4' ), array ('eater_id' => $hashedTokenFromDatabase ['eater_id'] ) );
					$display_reset = '<div class="access-success"><i class="icon-ok"></i> Password Changed Successfully ! Please Login To Continue <i class="icon-remove" data-dismiss="alert"></i>
    				</div>';
				
				}
			
			}
		
		}  else {
			$display_error_token = "<span class='red  bolder'><i class='icon-warning-sign'></i> The token has expired.</span>";
		}
	
	}

}

// ********************************* Register eater controller end
// ************************************************
?>