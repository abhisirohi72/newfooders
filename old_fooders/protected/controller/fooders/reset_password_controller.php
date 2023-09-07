<?php
$linkCode=$_REQUEST['code'];

//$isValidToken = $password->parseLinkCode($linkCode, $databaseRowId, $tokenFromLink);
// With the row id, we can get the stored hash from the database.
// If we have stored an expiry date, we can check it here.
//$hashedTokenFromDatabase = $db->get_row('fooders_reset_password',array('id'=>$databaseRowId));
//$expire_time = ceil((time()-$hashedTokenFromDatabase['date_created'])/60);
// Finally we check, whether the link token matches the stored hash.
//$isTokenCorrect = $password->verifyToken($tokenFromLink, $hashedTokenFromDatabase['reset_token']);

if($db->exists('fooders_reset_password',array('reset_token'=>$linkCode,'used'=>'1'))){
	$isTokenCorrect = 1;
	$hashedTokenFromDatabase = $db->get_row ( 'fooders_reset_password', array ('reset_token'=>$linkCode,'used'=>'1'));
	$expire_time = ceil ( (time () - $hashedTokenFromDatabase ['token_time']) / 60 );
}else{
	$isTokenCorrect = 0;
}

// Show password change form. After successfully setting a new
// password, mark the token as used.
if (empty($hashedTokenFromDatabase))
{
	$display_reset="<span class='red middle bolder'>".frptdne."</span>";
}
elseif($hashedTokenFromDatabase['used']==='2')
{
	$display_reset="<span class='red middle bolder'>".frpthe."</span>";
}
else if (!$isTokenCorrect)
{
	$display_reset="<span class='red middle bolder center'>".frptin."</span>";
}
else{
if ($_SERVER['REQUEST_METHOD']== 'POST' && isset ( $_POST ['save_reset_pass'] ) && $_POST ['save_reset_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] )&& $_SESSION['fooder_token'] === $password->stringbreak(SITE_URL.strtotime(date('Y-m-d'))))
{
	$reset_new_pass = $fv->removespace($_POST['new_pass']);
	$reset_retype_pass = $fv->removespace($_POST['retype_pass']);
	if($fv->emptyfields(array('New Password'=>$reset_new_pass)))
	{
		$display_reset_form = "<span class='red middle bolder'>".frpnpfe."</span>";
	}
	elseif (!$fv->check_length($reset_new_pass))
	{
		$display_reset_form = "<span class='red middle bolder'>".frpipcl."</span>";
	}
	elseif ($fv->emptyfields(array('Retype New Password'=>$reset_retype_pass)))
	{
	    $display_reset_form = "<span class='red middle bolder'>".frprnpfe."</span>";	
	}
	elseif ($reset_new_pass!==$reset_retype_pass)
	{
		$display_reset_form = "<span class='red middle bolder'>".frppdnm."</span>";	
	}
	else{
	
		//$encrypt_reset_pass = $password->hashBcrypt($reset_new_pass,'10',PASSWORD_DEFAULT);
		$encrypt_reset_pass=password_hash($reset_new_pass, PASSWORD_DEFAULT);
		$db->update('fooders',array('password'=>$encrypt_reset_pass),array('fooder_id'=>$hashedTokenFromDatabase['fooder_id']));
		$db->update('fooders_reset_password',array('used'=>'2'),array('fooder_id'=>$hashedTokenFromDatabase['fooder_id']));
		$display_reset_form = "<span class='green middle bolder'>".frpryps."</span>";
	}
	
}
}
?>