<?php

$_SESSION ['admin_token'] = $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) );
$acontroller = SERVER_ROOT . '/protected/controller/backend/' . $query2ans . '_controller.php';
$admin = SERVER_ROOT . '/protected/views/backend/' . $query2ans . ".php";
if ($query2ans == "login" || $query2ans == 'register' || $query2ans == 'forgot_password' || $query2ans=='reset_password') {
	if (file_exists ( $admin )) {
		if (file_exists ( $acontroller ))
			require $acontroller;
		require $admin;
	}
} 
elseif ($query2ans=="logout"){
	$session->destroy('login',admin);
}

else {
	//require SERVER_ROOT . '/protected/setting/backend/backend_sess_definations.php';
	if($query2ans!="post")
	require SERVER_ROOT . '/protected/setting/backend/admin_header.php';
	
	if($query2ans!="post")
	require SERVER_ROOT . '/protected/setting/backend/admin_sidebar.php';
	if (file_exists ( $admin )) {
		if (file_exists ( $acontroller ))
			require $acontroller;
		require $admin;
	} else {
		if (file_exists(SERVER_ROOT . '/protected/views/backend/404.php')) { 
		require SERVER_ROOT . '/protected/views/backend/404.php';
		}
	}
	if($query2ans!="post")
	require SERVER_ROOT . '/protected/setting/backend/admin_footer.php';
}
?>
