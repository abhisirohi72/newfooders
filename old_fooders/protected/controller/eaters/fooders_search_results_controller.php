<?php
if($query2=='option')
$option = urldecode($_REQUEST['option']);
elseif($query2=='location')
$location = urldecode($_REQUEST['location']);
elseif($query2=='cuisine')
$cuisine = urldecode($_REQUEST['cuisine']);
//=============================== Search for fooders menus and products =================================
if(isset($_POST['killhunger']) && $_POST['search_data']=="search_data_val" && $_POST['search_data_ip']==$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ))) )
{

	$search = strtolower(htmlspecialchars($fv->trim($_POST['search'])));
if(!$db->exists('search_word',array('value'=>$search,'cookie'=>$_COOKIE['eater_basket'])))
	{
		if($_SESSION['type']=='eater')
		$db->insert('search_word',array('value'=>$search,'cookie'=>$_COOKIE['eater_basket'],'eater_id'=>eater_id,'created_on'=>time(),'search_ip'=>$_SERVER['REMOTE_ADDR'],'device_type'=>'desktop'));
		else
			$db->insert('search_word',array('value'=>$search,'cookie'=>$_COOKIE['eater_basket'],'eater_id'=>0,'created_on'=>time(),'search_ip'=>$_SERVER['REMOTE_ADDR'],'device_type'=>'desktop'));
	}
if(!$fv->check_specialcharacters($search))
{
	if(strlen($search)<3){
	echo $session->redirect('home',eaters);
	}
	else{
	if(is_array($db->fooders_search($search)) && count($db->fooders_search($search))!==0)
	{
		$get_all_fooders=explode("___",$db->fooders_search($search));

		$time=$get_all_fooders['1'];
		  $related_search=json_decode(($get_all_fooders['2']),true);
		 $related_search=substr($related_search, 0, strpos($related_search, ", ---"));
         $arr_search=array_unique(explode(', ',$related_search));
         $related_search=implode(' , ', $arr_search);

		 if(is_string($get_all_fooders['0']))
		$get_all_fooders=json_decode(($get_all_fooders['0']),true);
$all_fooders_count = count($get_all_fooders);
	}
}
}
}
//==================================== SEARCH FOR LOCATION OF SIDEBAR ====================================
elseif (isset($location) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND f.location_name='$location'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR FREE DELIVERY OF SIDEBAR ====================================
elseif ($option=='show only free delivery' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.delivery_charges='0'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}
//==================================== SEARCH FOR HOME DELIVERY OF SIDEBAR ====================================
elseif ($option=='home delivery' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$home_delivery = '%s:1:"0";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$home_delivery'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR TAKE OUT OF SIDEBAR ====================================
elseif ($option=='take out' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$take_out = '%s:1:"1";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$take_out'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR PURE VEG OF SIDEBAR ====================================
elseif ($option=='pure veg' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$fac = '%s:1:"2";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$fac'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR DINE IN OF SIDEBAR ====================================
elseif ($option=='dine in' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$dine_in = '%s:1:"3";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$dine_in'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR PARKING OF SIDEBAR ====================================
elseif ($option=='parking' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$parking = '%s:1:"4";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$parking'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR BAR OF SIDEBAR ====================================
elseif ($option=='bar' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$bar = '%s:1:"5";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$bar'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR WI FI OF SIDEBAR ====================================
elseif ($option=='wi fi' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$wi_fi = '%s:1:"6";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$wi_fi'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR ACCEPT CREDIT CARD OF SIDEBAR ====================================
elseif ($option=='credit cards acceptability' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$accepts_cc = '%s:1:"7";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$accepts_cc'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR TABLE BOOKING OF SIDEBAR ====================================
elseif ($option=='table booking' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ))){
	$table_booking = '%s:1:"8";%';
	$get_all_fooders =$db->run("SELECT f.fooder_id,f.name,f.location_name, fd.status, fd.logo, fd.about_us,fd.average_reviews, fd.number_of_reviews, fd.specialization, fd.daily_hrs, fd.facilities, fd.delivery_areas, fd.delivery_charges, fd.type, fd.minimum_order, fd.delivery_time FROM `fooders` AS f
			JOIN `fooders_details` AS fd ON fd.fooder_id = f.fooder_id where f.is_approved='2' AND fd.facilities like '$table_booking'")->fetchAll();
	$all_fooders_count = count($get_all_fooders);
}

//==================================== SEARCH FOR CUISINE OF SIDEBAR ====================================
elseif(isset($cuisine) && $cuisine!=''){

	$search = strtolower(htmlspecialchars($fv->trim($cuisine)));

if(!$fv->check_specialcharacters($search))
{
	if(strlen($search)<3){
	echo $session->redirect('home',eaters);
	}
	else{
	if(is_array($db->fooders_search($search)) && count($db->fooders_search($search))!==0)
	{
		$get_all_fooders=explode("___",$db->fooders_search($search));

		$time=$get_all_fooders['1'];
		  $related_search=json_decode(($get_all_fooders['2']),true);
		 $related_search=substr($related_search, 0, strpos($related_search, ", ---"));
         $arr_search=array_unique(explode(', ',$related_search));
         $related_search=implode(' , ', $arr_search);

		 if(is_string($get_all_fooders['0']))
		$get_all_fooders=json_decode(($get_all_fooders['0']),true);
$all_fooders_count = count($get_all_fooders);
	}
}
}
}
//===================================== SEARCH ENDED ==========================================


else{
	$session->redirect('home',eaters);
}
	


?>