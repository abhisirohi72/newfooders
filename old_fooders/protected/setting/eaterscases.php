<?php
if ($query1ans == '')
	$query1ans = 'home';
elseif ($query1ans == 'fooder_products' || $query1ans == 'overview')
	$query1ans = '404';
$econtroller = SERVER_ROOT . '/protected/controller/eaters/' . $query1ans . '_controller.php';
$eaters = SERVER_ROOT . '/protected/views/eaters/' . $query1ans . ".php";
if ($query1ans == "login" || $query1ans == 'register' || $query1ans == 'forgot_password' || $query1ans == 'ionicrecipe' || $query1ans == 'ajax' || $query1ans == 'tets') {
	if (file_exists ( $eaters )) {
		if (file_exists ( $econtroller ))
			require $econtroller;
		require $eaters;
	}
} 
elseif ($query1ans=="logout"){
	$expire=time()-60*60*24*30;
	setcookie('eater_basket','',$expire);
	$session->destroy('home',eaters);
	
}
else {
	require SERVER_ROOT . '/protected/setting/eaters/eater_sessions.php';
	if ($query1ans == 'fooder') {
		
		require SERVER_ROOT . '/protected/setting/eaters/eater_fooder_sess_defination.php';
	}
	if ($query1ans != 'post' && $query1ans != 'basket' && $query1ans != 'orders' && $query1ans!="promo")
		require SERVER_ROOT . '/protected/setting/eaters/eater_header.php';
	if (file_exists ( $eaters )) {
		if (file_exists ( $econtroller ))
			require $econtroller;
		require $eaters;
	} else {
		require SERVER_ROOT . '/protected/views/eaters/404.php';
	}
	if ($query1ans != 'post' && $query1ans != 'basket' && $query1ans != 'orders' && $query1ans!="promo")
		require SERVER_ROOT . '/protected/setting/eaters/eater_footer.php';
}
?>