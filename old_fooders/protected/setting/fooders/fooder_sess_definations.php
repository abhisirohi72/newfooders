<?php
/**
 * Session start before header
 */
if ($session->Check () && $_SESSION['type']==='fooder') {
	$fooder_email = $_SESSION ['email'];
	$fooder_id = $_SESSION ['id'];
} else {
	$session->destroy ( 'login', fooders );
}
/**
 * Fooder's Complete Details Containing
 * Business Profile
 * Services and Settings
 * get_area == brings delivery regions for this fooder
 */
$khaterahoareas = $db->get_count ( 'delivery_areas' );
define ( 'khateraho_selected_areas', $khaterahoareas );

$fooder_complete_details = $db->run ( "SELECT *
   		FROM `fooders` LEFT JOIN `fooders_details` ON fooders_details.fooder_id=fooders.fooder_id
   		LEFT JOIN `fooders_plans` ON fooders_plans.plan_id=fooders.plan_id
   		WHERE fooders.fooder_id='$fooder_id'" )->fetchAll ();

// echo "<pre>";
// print_r($fooder_complete_details);
// echo "</pre>";	

$number_of_products = $db->get_count ( 'fooders_products', array ('fooder_id' => $fooder_id ) );
$number_of_menus = $db->get_count ( 'fooders_menus', array ('fooder_id' => $fooder_id ) );
$fooder_complete_details = $fooder_complete_details ['0'];



$fooder_daily_hrs = unserialize ( $fooder_complete_details ['daily_hrs'] );
define ( 'daynow', date('N'));
define ( 'timenow', date ( 'H:i' ) );
$fooder_delivery_areas_id = unserialize ( $fooder_complete_details ['delivery_areas'] );
define ( 'fooder_selected_areas', count((array)$fooder_delivery_areas_id) );
define ( 'fooder_name', $fooder_complete_details ['name'] );
define ( 'fooder_started_on', $fooder_complete_details ['started_on'] );
define ( 'fooder_login_email', $fooder_complete_details ['login_email'] );
define ( 'fooder_business_email', $fooder_complete_details ['business_email'] );
define ( 'fooder_tin_number', $fooder_complete_details ['tin_number'] );
define ( 'fooder_pan_number', $fooder_complete_details ['pan_number'] );
define ( 'fooder_vat_number', $fooder_complete_details ['vat_number'] );
define ( 'fooder_mobile', $fooder_complete_details ['mobile'] );
define ( 'fooder_landline', $fooder_complete_details ['landline'] );
define ( 'fooder_fax', $fooder_complete_details ['fax'] );
define ( 'fooder_address', $fooder_complete_details ['address'] );
define ( 'fooder_location', $fooder_complete_details ['location'] );
define ( 'fooder_location_name', $fooder_complete_details ['location_name'] );
define ( 'fooder_logo_exist', $fooder_complete_details ['logo'] );
define ( 'fooder_logo', SITE_URL . "/uploads/fooders/" . $fooder_id . "/logo/" . $fooder_complete_details ['logo'] . '?' . rand ( 1, 10 ) );
define ( 'fooder_status', $fooder_complete_details ['status'] );
define ( 'fooder_type', $fooder_complete_details ['type'] );
define ( 'fooder_delivery_time', $fooder_complete_details ['delivery_time'] );
define ( 'fooder_area_coverage', $fooder_complete_details ['area_coverage'] );
define ( 'fooder_minimum_order', $fooder_complete_details ['minimum_order'] );
define ( 'fooder_specialization', $fooder_complete_details ['specialization'] );
define ( 'fooder_delivery_charges', $fooder_complete_details ['delivery_charges'] );
define ( 'fooder_vat', $fooder_complete_details ['vat'] );
define ( 'fooder_service_charge', $fooder_complete_details ['service_charge'] );
define ( 'fooder_about_us', $fooder_complete_details ['about_us'] );
//define ( 'fooder_plan_id', $fooder_complete_details ['plan_id'] );
define ( 'fooder_joining_date', $fooder_complete_details ['joining_date'] );
define ( 'fooder_images_allowed', $fooder_complete_details ['number_of_images'] );
define ( 'fooder_is_approved', $fooder_complete_details ['is_approved'] );
define ( 'fooder_contact_name', $fooder_complete_details ['contact_name'] );
define ( 'fooder_current_products', $number_of_products );
define ( 'fooder_current_menus', $number_of_menus );
define ( 'fooder_allowed_products', $fooder_complete_details ['number_of_products'] );
define ( 'fooder_allowed_menus', $fooder_complete_details ['number_of_menus'] );
define ( 'fooder_total_comments', $fooder_complete_details ['number_of_reviews'] );
define ( 'fooder_average_rating', $fooder_complete_details ['average_reviews'] );
define ( 'fooder_tax1_name', $fooder_complete_details ['tax1_name'] );
define ( 'fooder_tax1_value', $fooder_complete_details ['tax1_value'] );
define ( 'fooder_tax2_name', $fooder_complete_details ['tax2_name'] );
define ( 'fooder_tax2_value', $fooder_complete_details ['tax2_value'] );
define ( 'fooder_notification_email', $fooder_complete_details ['notification_email'] );
define ( 'fooder_notification_mobile', $fooder_complete_details ['notification_mobile'] );
define ( 'fooder_gstin', $fooder_complete_details ['gstin'] );
define ( 'fooder_gst_type', $fooder_complete_details ['gst_type'] );
define ( 'fooder_enable_qr', $fooder_complete_details ['enable_qr'] ); 
define ( 'fooder_enable_online_ordering', $fooder_complete_details ['enable_online_ordering'] );
define ( 'fooder_url', $fooder_complete_details ['url'] );
define ( 'fooder_perimeter', $fooder_complete_details ['perimeter'] );
define ( 'fooder_latitude', $fooder_complete_details ['latitude'] );
define ( 'fooder_longitude', $fooder_complete_details ['longitude'] );
define ( 'fooder_callwaiter', $fooder_complete_details ['callwaiter'] );
define ( 'fooder_bill_paper_size', $fooder_complete_details ['bill_paper_size'] );
define ( 'fooder_callwaiter_waiting_time', $fooder_complete_details ['callwaiter_waiting_time'] );

define ( 'fooder_merchant_id', $fooder_complete_details ['merchant_id'] );
define ( 'fooder_merchant_key', $fooder_complete_details ['merchant_key'] );
define('fooder_order_sms_notification_enable',$fooder_complete_details ['order_sms_notification_enable']);
define('fooder_fssai_number',$fooder_complete_details ['fssai_number']);
define('fooder_upi_address',$fooder_complete_details ['upi_address']);  
define('fooder_status_order_ready_enable',$fooder_complete_details ['status_order_ready_enable']);  
define('fooder_status_order_ready_sms_enable',$fooder_complete_details ['status_order_ready_sms_enable']);  
define('fooder_username',$fooder_complete_details ['username']); 



 




$get_location = $db->get_row ( 'delivery_areas', array ('id' => fooder_location ) );
/**
 *
 * @var fooder plan details
 *      1 for 90 days trial plan
 *      2 for free plan
 *      3 for silver plan
 *      4 for gold plan
 *      5 for platinum plan
 *      6 for king plan
 */
define ( 'fooder_plan_id', $fooder_complete_details ['plan_id'] );
define ( 'fooder_plan_name', $fooder_complete_details ['plan_name'] );
define ( 'fooder_uniqueid', $fooder_complete_details ['fooder_uniqueid'] );
// panel setting
$fooder_panel = unserialize ( $fooder_complete_details ['panel'] );
// define ( 'fooder_panel_color', $fooder_panel ['color'] );
define ( 'fooder_panel_color', '#438EB9' );
define ( 'fooder_panel_header', $fooder_panel ['header'] );
define ( 'fooder_panel_sidebar', $fooder_panel ['sidebar'] );
define ( 'fooder_panel_breadcrumb', $fooder_panel ['breadcrumb'] );
define ( 'fooder_panel_rtl', $fooder_panel ['rtl'] );
// end panel
if ($fooder_complete_details ['facilities'] == "N;")
	$fooder_complete_details ['facilities'] = "";
$fooder_facilities = $fooder_complete_details ['facilities'];
if ($fv->emptyfields ( $fooder_complete_details )) {
	$tab1_tab2 = count ( $fv->emptyfields ( $fooder_complete_details ) );
	// if($fv->emptyfields($fooder_delivery_areas_id,'yes') bhrmastra
} else
	$tab1_tab2 = 0;
if (count((array)$fooder_delivery_areas_id) > 0)
	$tab3 = 0;
else
	$tab3 = 1;
$fooder_bar = 100 - (($tab1_tab2 + $tab3) * 5);
/**
 * images (check)
 */
$pathofimages = SERVER_ROOT . '/uploads/fooders/' . $fooder_id . '/gallery/';
$gallery_images = glob ( $pathofimages . '*' );
$cimages = count ( $gallery_images ); // current number of images
define ( 'fooder_current_images', $cimages );
/**
 *
 * @var plan check only converts trial to free
 */
$days_passed = date ( 'd', (time () - fooder_joining_date) ) - 1;
// trial to free
$days_remaining = 90 - $days_passed;
if (($days_passed >= 90 && fooder_plan_id == 1)) {
	foreach ( $gallery_images as $image ) {
		$imagename = basename ( $image );
		$explode = explode ( "___", $imagename );
		if ($explode ['1'] == 1) {
			$newimg = str_replace ( '___1___', '___0___', $imagename );
			rename ( $pathofimages . $imagename, $pathofimages . $newimg );
		}
	}
	$db->update ( 'fooders_menus', array ('status' => '0' ), array ('fooder_id' => $fooder_id ) );
	$db->update ( 'fooders_products', array ('status' => '0' ), array ('fooder_id' => $fooder_id ) );
	$db->update ( 'fooders', array ('plan_id' => 2 ), array ('fooder_id' => $fooder_id ) );
} // for all other higher plans to lower plans jump
elseif ($cimages > fooder_images_allowed) {
	foreach ( $gallery_images as $image ) {
		$imagename = basename ( $image );
		$explode = explode ( "___", $imagename );
		if ($explode ['1'] == 1) {
			$newimg = str_replace ( '___1___', '___0___', $imagename );
			rename ( $pathofimages . $imagename, $pathofimages . $newimg );
		}
	}
} elseif (fooder_current_products > fooder_allowed_products) {
	$db->update ( 'fooders_products', array ('status' => '0' ), array ('fooder_id' => $fooder_id ) );
} elseif (fooder_current_menus > fooder_allowed_menus) {
	$db->update ( 'fooders_menus', array ('status' => '0' ), array ('fooder_id' => $fooder_id ) );
}
/**
 * End Of Fooders Complete Details. 
 */

 $fooders_tables=$db->get_all('fooders_tables',array('fooder_id'=>$fooder_id));
//  echo "<pre>";
//  print_r($fooders_tables);
//  echo "</pre>";

?>