<?php
if ($session->Check () && $_SESSION ['type'] === 'admin') {
	$session->redirect ( 'dashboard', admin );
} else {
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['kr_login'] ) && $_POST ['kr_login_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$emaillogin = $fv->removespace ( filter_var ( $_POST ['kr_email'] ), FILTER_SANITIZE_STRING );
	$passlogin = $fv->removespace ( filter_var ( $_POST ['kr_password'], FILTER_SANITIZE_STRING ) );
	if ($fv->emptyfields ( array ('Email' => $emaillogin ) )) {
		$display_kr = '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                Email Is Empty. 
                            </div>';
	}  elseif ($fv->emptyfields ( array ('Password' => $passlogin ) )) {
		$display_kr = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                Password Is Empty 
                            </div>';
	} else {
		
		
		if('iwcn'==$emaillogin){
		// 	$kr_pass=$password->hashBcrypt ( 'Skyfall&*^', '10', PASSWORD_DEFAULT );
		// $verify=$password->verify($passlogin, $kr_pass,PASSWORD_DEFAULT);
		
		$kr_pass=password_hash( 'Skyfall&*^', PASSWORD_DEFAULT) ;
		$verify=password_verify($passlogin,$kr_pass);

		if (! $verify) {
			$display_kr = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                Password Is Wrong 
                            </div>';
		} else {
			$session->Open ();
			if ($session->Check ()) {
				$_SESSION ['kr_email'] = 'manojparmar@iwcnetwork.com'; 
				$_SESSION ['type']='admin';
				
				$session->redirect ( 'dashboard', admin );
			}
		}
	}
	else{
		$display_kr = '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                The email or password you entered is incorrect. Please try again.
                            </div>';
	}
	}
}
}
?>
