<?php
require SERVER_ROOT . '/protected/setting/fooders/fooder_lang.php';
$_SESSION ['fooder_token'] = $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) );
$fcontroller = SERVER_ROOT . '/protected/controller/fooders/' . $query2ans . '_controller.php';
$fooders = SERVER_ROOT . '/protected/views/fooders/' . $query2ans . ".php";
if ($query2ans == "login" || $query2ans == 'register' || $query2ans == 'forgot_password' || $query2ans=='reset_password' || $query2ans=='test' || $query2ans=='print_bill' || $query2ans=='durgesh_test') {
	if (file_exists ( $fooders )) {
		if (file_exists ( $fcontroller ))
			require $fcontroller;
		require $fooders;
	}
} elseif ($query2ans == "dropdown_selector"  ) {
	require SERVER_ROOT . '/protected/setting/fooders/fooder_sess_definations.php'; 
	if (file_exists ( $fooders )) {
		if (file_exists ( $fcontroller ))
			require $fcontroller;
		require $fooders;
	}
} 
elseif ($query2ans=="logout"){
	$session->destroy('login',fooders);
}

else {
	require SERVER_ROOT . '/protected/setting/fooders/fooder_sess_definations.php';
	if($query2ans!="post")
	require SERVER_ROOT . '/protected/setting/fooders/fooder_header.php';
	
	if($query2ans!="post")
	require SERVER_ROOT . '/protected/setting/fooders/fooder_sidebar.php';
	if (file_exists ( $fooders )) {
		if (file_exists ( $fcontroller ))
			require $fcontroller;
		require $fooders;
	} else {
		if (file_exists(SERVER_ROOT . '/protected/views/fooders/404.php')) { 
		require SERVER_ROOT . '/protected/views/fooders/404.php';
		}
	}
	if($query2ans!="post")
	require SERVER_ROOT . '/protected/setting/fooders/fooder_footer.php';
}
?>