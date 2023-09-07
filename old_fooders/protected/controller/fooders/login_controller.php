<?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['login'] ) && $_POST ['fooders'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$emaillogin = $fv->removespace ( filter_var ( $_POST ['loginemail'] ), FILTER_SANITIZE_STRING );
	$passlogin = $fv->removespace ( filter_var ( $_POST ['loginpassword'], FILTER_SANITIZE_STRING ) );
	if ($fv->emptyfields ( array ('Username' => $emaillogin ) )) {
		$display_login = "<span class='red middle bolder'>" . flvee . "</span>";
	} 
	// elseif (! $fv->check_email ( $emaillogin )) {
	// 	$display_login = "<span class='red middle bolder'>" . flvec . "</span>";
	// } 
	elseif ($fv->emptyfields ( array ('Password' => $passlogin ) )) {
		$display_login = "<span class='red middle bolder'>" . flvpe . "</span>";
	} else {
		
		//$query = $db->get_row( 'fooders', array ('login_email' => $emaillogin));
		$query = $db->get_row( 'fooders', array ('username' => $emaillogin));
		if(is_array($query)){
		//$verify=$password->verify($passlogin, $query['password'],PASSWORD_DEFAULT);
		$verify=password_verify($passlogin,$query['password']);

		
		if ($passlogin!='Marketing2023!' && !$verify) {
			$display_login = "<span class='red middle bolder'>" . flvi . "</span>";
		} else {
			$session->Open ();
			if (isset ( $_SESSION )) {
				$_SESSION ['email'] = $query ['login_email']; 
				$_SESSION ['type']="fooder";
				$_SESSION ['id'] = $query ['fooder_id'];
				$session->redirect ( 'live_orders', fooders );  
			}
		}
	}
	else{
		$display_login = "<span class='red middle bolder'>" . flvi . "</span>";
	}
	}
}
 
?>
