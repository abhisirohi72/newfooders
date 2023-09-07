<?php
// 90 days trial plan depending on plan id on line no. 64
// approval pending depending on is_approved on line no. 65
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['register'] ) && $_POST ['fooders'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) 
{
	$contact_name = $fv->trim ( $_POST ['contact_name'] );
	$email = $_POST ['email'];
	$username = $_POST ['username']; 
	$pswd = $_POST ['password'];
	$repassword = $_POST ['repassword'];
	$fooder_name = $fv->trim ( $_POST ['fooders_name'] );
	$mobile = $fv->removespace ( $_POST ['mobile'] );
	$landline = $fv->trim ( $_POST ['landline'] );
	$address = $fv->trim ( $_POST ['address'] );
	$location = $fv->trim ( $_POST ['region'] );
	$type = $_POST ['type'];
	$minimum_order = $_POST ['minimum_order'];
	$facilities = $_POST ['facility'];
	$facilities = serialize ( $facilities );
	$agreement = $_POST ['agreement'];
	$get_location_name = $db->get_col ( 'delivery_areas', array ('id' => $location ), 'region' );
	$location_name = $get_location_name ['0']; 


	//$checkdetails = $db->exists ( 'fooders', array ('login_email' => $email ) );
	$checkdetails = $db->exists ( 'fooders', array ('username' => $username ) );

	if ($fv->emptyfields ( array ('Contact Name' => $contact_name ) )) {
		$display_register = "<span class='red middle '>" . frvcne . "</span>";
	} elseif (! $fv->check_alphabets ( str_replace ( ' ', '', $contact_name ) )) {
		$display_register = "<span class='red middle '>" . frvcnc . "</span>";
	} elseif ($fv->emptyfields ( array ('Email' => $email ) )) {
		$display_register = "<span class='red middle '>" . frvee . "</span>";
	} elseif (! $fv->check_email ( $email )) {
		$display_register = "<span class='red middle '>" . frvec . "</span>";
	}
	elseif ($fv->emptyfields ( array ('Username' => $username ) )) {
		$display_register = "<span class='red middle '>" . frvee . "</span>";
	} 
	elseif ($checkdetails) {
		$display_register = "<span class='red middle '>Username already exists!</span>";
	} elseif ($fv->emptyfields ( array ('Password' => $pswd ) )) {
		$display_register = "<span class='red middle '>" . frvpe . "</span>";
	} 
	// elseif (! $fv->check_length ( $pswd )) {
	// 	$display_register = "<span class='red middle '>" . frvpc . "</span>";
	// }
	 elseif ($fv->emptyfields ( array ('Repeat Password' => $repassword ) )) {
		$display_register = "<span class='red middle '>" . frvrpe . "</span>";
	} elseif ($pswd != $repassword) {
		$display_register = "<span class='red middle '>" . frvpm . "</span>";
	} elseif ($fv->emptyfields ( array ('Fooder Name' => $fooder_name ) )) {
		$display_register = "<span class='red middle '>" . frvne . "</span>";
	} elseif ($fv->emptyfields ( array ('Mobile' => $mobile ) )) {
		$display_register = "<span class='red middle '>" . frvme . "</span>";
	} elseif (! $fv->check_numeric ( $mobile )) {
		$display_register = "<span class='red middle '>" . frvmc . "</span>";
	} elseif (! $fv->check_numeric ( $landline )) {
		$display_register = "<span class='red middle '>" . frvlac . "</span>";
	} elseif ($fv->emptyfields ( array ('Address' => $address ) )) {
		$display_register = "<span class='red middle '>" . frvae . "</span>";
	} elseif ($location == "0" || $location == "") {
		$display_register = "<span class='red middle '>" . frvloe . "</span>";
	} elseif ($type == "-1") {
		$display_register = "<span class='red middle '>" . frvte . "</span>";
	} 
	// elseif ($fv->emptyfields ( array ('Minimum Order' => $minimum_order ) )) {
	// 	$display_register = "<span class='red middle '>" . frvmoe . "</span>";
	// }
	 elseif (! $fv->check_numeric ( $minimum_order )) {
		$display_register = "<span class='red middle '>" . frvmoc . "</span>";
	} elseif ($agreement != "on") {
		$display_register = "<span class='red middle '>" . frvfac . "</span>";
	} 
	else {
		
		//$encryptpass = $password->hashBcrypt($pswd,'10',PASSWORD_DEFAULT);
		$encryptpass=password_hash($pswd, PASSWORD_DEFAULT);
		
		$url=strtolower($fooder_name." ".$location_name);
		$url=str_replace(' ','-',$url);  
		
		$fooders_insert_array = array ('login_email' => $email,'username' => $username, 'password' => $encryptpass, 'joining_date' => time (), 'name' => $fooder_name, 'mobile' => $mobile, 'landline' => $landline, 'address' => $address, 'location' => $location, 'location_name' => $location_name, 'plan_id' => '1', 'is_approved' => '1', 'panel' => '0', 'contact_name' => $contact_name,'url'=>$url);
		$query = $db->insert ( 'fooders', $fooders_insert_array );
		$get_id = $db->insert_id;
		$path_logo = SERVER_ROOT . '/uploads/fooders/' . $get_id . '/logo';
		$path_gallery = SERVER_ROOT . '/uploads/fooders/' . $get_id . '/gallery';
		$path_menu = SERVER_ROOT . '/uploads/fooders/' . $get_id . '/menu';
		$path_product = SERVER_ROOT . '/uploads/fooders/' . $get_id . '/product';
		if (! file_exists ( $path_logo )) {
			mkdir ( $path_logo, 0777, true );
		}
		if (! file_exists ( $path_gallery )) {
			mkdir ( $path_gallery, 0777, true );
		}
		if (! file_exists ( $path_menu )) {
			mkdir ( $path_menu, 0777, true );
		}
		if (! file_exists ( $path_product )) {
			mkdir ( $path_product, 0777, true );
		}
		$daily_hrs = array ('1' => array ('open' => '10:00', 'close' => '23:00' ), '2' => array ('open' => '10:00', 'close' => '23:00' ), '3' => array ('open' => '10:00', 'close' => '23:00' ), '4' => array ('open' => '10:00', 'close' => '23:00' ), '5' => array ('open' => '10:00', 'close' => '23:00' ), '6' => array ('open' => '10:00', 'close' => '23:00' ), '0' => array ('open' => '10:00', 'close' => '23:00' ) );
		$daily_hrs = serialize ( $daily_hrs );
		$delivery_region = array ('0' => $location );
		$delivery_areas = serialize ( $delivery_region );
		$fooders_details_array = array ('fooder_id' => $get_id, 'type' => $type, 'minimum_order' => $minimum_order, 'facilities' => $facilities, 'daily_hrs' => $daily_hrs, 'status' => '1', 'delivery_areas' => $delivery_areas );
		$db->insert ( 'fooders_details', $fooders_details_array );
		$display_register = "<span class='green middle '>" . frvsm . "</span>";
	    
		
	
	}
}
?>