<?php
if (isset($_POST['contact_submit']) && $_POST['contactus_check']==="contactus"  && $_POST['contactus_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $password->stringbreak(SITE_URL.strtotime(date('Y-m-d')))===$_SESSION['eater_token'])
{
	$name = $fv->trim($_POST['contact_name']);
	$email =$fv->trim($_POST['contact_email']);
	$phone_number = $fv->trim($_POST['contact_phone']);
	$message =$fv->trim($_POST['contact_message']);
	$message = htmlentities($message, ENT_QUOTES,"UTF-8");

	
	if (!isset($name) || empty($name)){
		
		$display_contact= "<span class='red  bolder'><i class='icon-warning-sign'></i> Name Field Empty </span>";
	}
	elseif (! $fv->check_alphabets ( str_replace ( ' ', '', $name ) )){
		
		$display_contact= "<span class='red  bolder'><i class='icon-warning-sign'></i> Name Must Be Only Alphabets</span>";
	}
	elseif (!isset($email) || empty($email)){
		
		$display_contact= "<span class='red  bolder'><i class='icon-warning-sign'></i> Email Field Empty</span>";
	}
	elseif(!filter_var ( $email, FILTER_VALIDATE_EMAIL )){
		
		$display_contact= "<span class='red  bolder'><i class='icon-warning-sign'></i> Invalid Email</span>";
	}
	elseif (!$fv->check_numeric($phone_number)){
		
		$display_contact= "<span class='red  bolder'><i class='icon-warning-sign'></i> Phone Must Be Only Numeric</span>";
	}
	elseif (!isset($message) || empty($message)){
		
		$display_contact= "<span class='red  bolder'><i class='icon-warning-sign'></i>Message Field Empty</span>";
	}
    else{
		$insert= $db->insert('contact_feedback',array(
				'eater_id'=>eater_id,
				'name'=>$name,
				'email'=>$email,
				'phone_number'=>$phone_number,
				'message'=>$message,
				'ip'=>$_SERVER['REMOTE_ADDR']
		));
		if($insert)
			$display_contact ="<span class='green  bolder'><i class='icon-warning-sign'></i> Submitted Successfully ! Khateraho Team Will Contact You In 24 Hrs</span>";
	}
	
}


?>