<?php
$expire=time()+60*60*24*30;
if(!isset($_COOKIE['eater_basket']))
setcookie('eater_basket',rand(1, 9999)."desktop___".("browser:".$feature->getBrowser()."os:".$feature->getOS()."ip:".$_SERVER['REMOTE_ADDR']."time:".time()),$expire);
$_SESSION['eater_token']=$password->stringbreak(SITE_URL.strtotime(date('Y-m-d')));

if($session->Check() && $_SESSION['type']==='eater'){
	
	$eater_name = $feature->textstyler($_SESSION['eater_name'], '5');
	define('eater_name_styler',$eater_name);
	define('eater_name',$_SESSION['eater_name']);
	define('eater_email',$_SESSION['eater_email']);
	define('eater_exist','5');
	define('eater_id', $_SESSION['id']);
	define('eater_address', $_SESSION['eater_address']);
	define('eater_mobile', $_SESSION['eater_mobile']);
	define('eater_dob', $_SESSION['eater_dob']);
	define('eater_gender', $_SESSION['eater_gender']);
	define('eater_city', $_SESSION['eater_city']);
	define('eater_region_id', $_SESSION['eater_region_id']);
	define('eater_region_name', $_SESSION['eater_region_name']);
	define('eater_state', $_SESSION['eater_state']);
	define('eater_joining_date', $_SESSION['eater_joining_date']);
	define('eater_joining_ip', $_SESSION['eater_joining_ip']);
	define('eater_favourite_cuisine', $_SESSION['eater_favourite_cuisine']);
	define('eater_favourite_dish', $_SESSION['eater_favourite_dish']);
	define('type',$_SESSION['type']);
$db->update('search_word',array('eater_id'=>eater_id),array('cookie'=>$_COOKIE['eater_basket']));
	
}




?>