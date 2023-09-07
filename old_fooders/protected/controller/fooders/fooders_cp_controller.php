<?php
// $tab = $link->hrefquery ();
// $tab ['0'] = 'tab';
// if ($tab ['1'] == "") {
// 	$tab ['1'] = 'tab-1';
// }
$tab=$_REQUEST['tab'];
if ($tab== "") {
	$tab='tab-1'; 
}

/*
 * *************************************** Tab1 Form Start
 * **************************************
 */
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['details1'] ) && $_POST ['fooders_details1'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$tab = $_POST ['tab'];
	$fooders_name = $fv->trim ( $_POST ['fooders_name'] );
	$started_on = $_POST ['started_on'];
	$mobile = $fv->removespace ( $_POST ['mobile'] );
	$landline = $fv->trim ( $_POST ['landline'] );
	$address = $fv->trim ( $_POST ['address'] );
	$old_location_id = $fv->trim ( $_POST ['old_location_id'] );
	$region = $fv->trim ( $_POST ['region'] );
	$gstin = $fv->trim($_POST['gstin']);
	$fssai_number = $fv->trim($_POST['fssai_number']);
	$upi_address = $fv->trim($_POST['upi_address']);

	
 

$enable_online_ordering=isset($_POST['enable_online_ordering'])?$_POST['enable_online_ordering']:0;
$order_sms_notification_enable=isset($_POST['order_sms_notification_enable'])?$_POST['order_sms_notification_enable']:0;

$status_order_ready_enable=isset($_POST['status_order_ready_enable'])?$_POST['status_order_ready_enable']:0;
$status_order_ready_sms_enable=isset($_POST['status_order_ready_sms_enable'])?$_POST['status_order_ready_sms_enable']:0;


$bill_paper_size = $fv->trim($_POST['bill_paper_size']);

//$url=isset($_POST['url'])?$_POST['url']:"";

// print_r($_POST);	

// exit();

	if(isset($_POST['gst_type'])){
		$gst_type = $_POST['gst_type'];
	}else{
		$gst_type = 0;
	}
	if ($region !== '') {
		$get_location_name = $db->get_col ( 'delivery_areas', array ('id' => $region ), 'region' );
	} else {
		$get_location_name = $db->get_col ( 'delivery_areas', array ('id' => $old_location_id ), 'region' );
	}
	$location_name = $get_location_name ['0'];
	/*
	 * for checking emptiness in life
	 */
	$check_empty = array ('FOODERS NAME' => $fooders_name, 'MOBILE' => $mobile, 'ADDRESS' => $address );
	$empty = $fv->emptyfields ( $check_empty, 'display' );
	if (! $empty) {

	    // $url=strtolower($url);
		// $url=str_replace(' ','-',$url);
		if ($region == 0 && fooder_location == 0) 
		{
			$display_fooders_cp = $fv->form_error ( fcpberr, fcpbpsril );
		} 
		// elseif($db->run("SELECT COUNT(*) FROM `fooders` WHERE `url`='$url' AND `fooder_id`!='$fooder_id'")->fetchColumn()>0) 
		// {
		// $display_fooders_cp = $fv->form_error('Oops Sorry !' , 'url already exists!');
		// }
else {
			if (fooder_location != 0 && $region == 0) {
				$region = fooder_location;
			}
			if ($fv->check_numeric ( $mobile, fcpbmniv, fcpbonva ) && $fv->check_numeric ( $landline, fcpblanniv, fcpbonva )) { 
				
				$db->update ( 'fooders', array ('name' => $fooders_name, 
												'started_on' => $started_on,
												'mobile' => $mobile,
												'landline' => $landline,
												'address' => $address,
												'location' => $region,
												'location_name' => $location_name,
												'gstin'=>$gstin, 
												'fssai_number'=>$fssai_number, 
										        'bill_paper_size'=>$bill_paper_size,
												'gst_type'=>$gst_type,
												'enable_online_ordering'=>$enable_online_ordering,
												'order_sms_notification_enable'=>$order_sms_notification_enable,
												'status_order_ready_enable'=>$status_order_ready_enable,
												'status_order_ready_sms_enable'=>$status_order_ready_sms_enable 
											), array ('fooder_id' => $fooder_id ) );
				$fv->form_success_popup ( fcpbybpus, fcpbclt, $query2ans, fooders, '?tab=tab-1' );
			}
		}
	}
}
// ====================================== End Tab1 Form
// =======================================
/*
 * *************************************** Tab2 Form Start
 * **********************************
 */
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['details2'] ) && $_POST ['fooders_details2'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$tab = $_POST ['tab'];
	$status = $_POST ['status'];
	$type = $_POST ['type']; 
	$delivery_time = $fv->removespace ( $_POST ['delivery_time'] );
	//$minimum_order = $fv->removespace ( $_POST ['minimum_order'] );
	$minimum_order = 0;
	$specialization = $_POST ['specialization'];
	//$delivery_charges = $fv->removespace ( $_POST ['delivery_charges'] );
	$delivery_charges = 0;   
	//$vat = $fv->removespace ( $_POST ['vat'] );
	//$service_charge = $fv->removespace ( $_POST ['service_charge'] );
	$tax1name = $_POST ['tax1_name'];
	$tax1value = $fv->removespace ( $_POST ['tax1_value'] );
	$tax2name = $_POST ['tax2_name'];
	$tax2value = $fv->removespace ( $_POST ['tax2_value'] );
	$about_us = htmlentities($_POST ['about_us'], ENT_QUOTES, "UTF-8");
	
	$facilities = $_POST ['facility'];
	$facilities = serialize ( $facilities );
	$daily = $_POST ['daily'];

	if ($status == "on") {
		$status = '1';
	} else {
		$status = '0';
	}

	$image_size = $_FILES ['file'] ['size'] / 1024;
	$check_exists = $db->exists ( 'fooders_details', array ('fooder_id' => $fooder_id ) );
	 
		if ($type == '-1') {
			$display_fooders_cp = $fv->form_error ( fcpberr, fcpstfcnb );
		} else {
			if ($fv->check_numeric ( $delivery_time, fcpsdtiv, fcpbonva )) { 
				$check1 = 0;
				// if (! is_numeric ( $vat ))
				// 	$display_fooders_cp = $fv->form_error ( fcpsvatx, fcpsondva );
				// elseif (! is_numeric ( $service_charge ) || $service_charge > 5) {
				// 	$display_fooders_cp = $fv->form_error ( fcpssce, fcpsonadle );
				// } 
				if (! is_numeric ( $tax1value ))
					$display_fooders_cp = $fv->form_error ( fcpstxnval1, fcpsondva );
				elseif (! is_numeric ( $tax2value ) || $service_charge > 5) {
					$display_fooders_cp = $fv->form_error ( fcpstxnval2, fcpsondva );
				} 
				else {
					foreach ( $daily as $key => $val ) {
						$close = $val ['close'];
						$open = $val ['open'];
						if (strtotime ( $close ) <= strtotime ( $open )) {
							$check1 = 1;
						} else {
							$db->update ( 'fooders_details', array ('daily_hrs' => serialize ( $daily ) ), array ('fooder_id' => $fooder_id ) );
						}
					}
					if ($check1 == 1) {
						$display_fooders_cp = $fv->form_error ( fcpspcwh, fcpsctmgtot );
					} else {
						if ($_FILES ['file'] ['name']) {
							$handle = new upload ( $_FILES ['file'] );

							
							$ext = $handle->file_src_name_ext;
							if ($image_size <= 500) {
								if ($handle->image_src_type == 'png' || $handle->image_src_type == 'jpeg' || $handle->image_src_type == 'jpg') {
									if (($handle->image_src_y != $handle->image_src_x) || $handle->image_src_y > '500')
										$display_fooders_cp = $fv->form_error ( fcpsidi, fcpshigw );
									else {
										if ($handle->uploaded) {
											$save_logo = $handle->file_new_name_body = 'logo';
											//$handle->image_resize = true;
											//$newimagewidth = '200';
											//$handle->image_x = $newimagewidth;
											//$newimagewidth = $handle->image_src_x;
											//$handle->image_ratio_y = true;
											$handle->file_overwrite = true;
											$handle->Process ( SERVER_ROOT . '/uploads/fooders/' . $fooder_id . '/logo/' );
											// we check if everything went OK
											if ($handle->processed) {
												//$details2_file_data = array ('fooder_id' => $fooder_id, 'status' => $status, 'type' => $type, 'delivery_time' => $delivery_time, 'minimum_order' => $minimum_order, 'specialization' => $specialization, 'delivery_charges' => $delivery_charges, 'vat' => $vat, 'service_charge' => $service_charge, 'about_us' => $about_us, 'facilities' => $facilities, 'logo' => $save_logo . '.' . $ext );
												$details2_file_data = array ('fooder_id' => $fooder_id, 'status' => $status,'type' => $type, 'delivery_time' => $delivery_time, 'minimum_order' => $minimum_order, 'specialization' => $specialization, 'delivery_charges' => $delivery_charges, 'tax1_name' => $tax1name, 'tax1_value' => $tax1value,'tax2_name' => $tax2name, 'tax2_value' => $tax2value, 'about_us' => $about_us, 'facilities' => $facilities, 'logo' => $save_logo . '.' . $ext );

												if ($check_exists) {
													$db->update ( 'fooders_details', $details2_file_data, array ('fooder_id' => $fooder_id ) );
													$fv->form_success_popup ( fcpsysashus, fcpbclt, $query2ans, fooders, '?tab=tab-2' );
												} else {
													$db->insert ( 'fooders_details', $details2_file_data );
													$fv->form_success_popup ( fcpsysasis, fcpbclt, $query2ans, fooders, '?tab=tab-2' );
												}
											}
										}
									}
								} else {
									$display_fooders_cp = $fv->form_error ( fcpses, fcpstiunvit );
								}
							} else {
								$display_fooders_cp = $fv->form_error ( fcpses, fcpstiyu );
							}
						} else {

							
							//$details2_data = array ('fooder_id' => $fooder_id, 'status' => $status, 'type' => $type, 'delivery_time' => $delivery_time, 'minimum_order' => $minimum_order, 'specialization' => $specialization, 'delivery_charges' => $delivery_charges, 'vat' => $vat, 'service_charge' => $service_charge, 'about_us' => $about_us, 'facilities' => $facilities );

							$details2_data = array ('fooder_id' => $fooder_id, 'status' => $status, 'type' => $type, 'delivery_time' => $delivery_time, 'minimum_order' => $minimum_order, 'specialization' => $specialization, 'delivery_charges' => $delivery_charges, 'tax1_name' => $tax1name, 'tax1_value' => $tax1value,'tax2_name' => $tax2name, 'tax2_value' => $tax2value,
							'about_us' => $about_us, 'facilities' => $facilities );

							if ($check_exists) {
								$db->update ( 'fooders_details', $details2_data, array ('fooder_id' => $fooder_id ) );
								$fv->form_success_popup ( fcpsysashus, fcpbclt, $query2ans, fooders, '?tab=tab-2' );
							} else {
								$db->insert ( 'fooders_details', $details2_data );
								$fv->form_success_popup ( fcpsysasis, fcpbclt, $query2ans, fooders, '?tab=tab-2' );
							}
							//$db->debug();
						} 
					}
				}
			}
		}
	
}
// =========================================== End Tab2 Form
// =======================================
/*
 * ****************************************** Tab3 Form Start
 * *************************************
 */
// ========================================== Area Coverage
// =======================================

if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['save_area_coverage'] ) && $_POST ['area_coverage_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$area_coverage = abs($_POST ['area_coverage']);
	if (is_numeric ( $area_coverage )) {
		$lat = $get_location ['lat'];
		$lng = $get_location ['lng'];
		$allregions = $db->get_all ( "delivery_areas" );
		$covered_regions = $feature->getcoveredareas_array ( $lat, $lng, $allregions, $area_coverage );
		$db->update ( 'fooders_details', array ('area_coverage' => $area_coverage, 'delivery_areas' => serialize ( array_keys ( $covered_regions ) ) ), array ('fooder_id' => $fooder_id ) );
		//$session->redirect ( 'fooders_cp?tab=tab-3', fooders );
		$fv->form_success_popup ('Update successfully!', fcpbclt, $query2ans, fooders, '?tab=tab-3' );
	} else {
		$display_fooders_cp = $fv->form_error ( fcpdiv, fcpdodva );
	}
}
// =============================================End Area Coverage
// ===================================
// =========================================== Delivery Region Form Start
// ==========================
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['delivery_area'] ) && $_POST ['fooders_delivery_area'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$tab = $_POST ['tab'];
	if ($_POST ['regions'] == NULL || $_POST ['regions'] == '')
		$regions_id_name = array (); 
	else
		$regions_id_name = $_POST ['regions'];
	$success = $db->update ( 'fooders_details', array ('delivery_areas' => serialize ( $regions_id_name ) ), array ('fooder_id' => $fooder_id ) );
	if ($success)
		//$session->redirect ( $query2ans . "?tab=tab-3", fooders );
		$fv->form_success_popup ('Update successfully!', fcpbclt, $query2ans, fooders, '?tab=tab-3' );
}

// ============================================ End Delivery Region Form
// ============================= 
?>

<?php

if(isset($_POST['delete_delivery_charge_submit']))
{
$delivery_charge_id=$_POST['delivery_charge_id'];
$delete=$db->delete('fooders_delivery_charges',array('id'=>$delivery_charge_id));

if(isset($delete))
{
	$fv->form_success_popup ('Delete successfully!',fcpbclt, $query2ans, fooders, '?tab=tab-4' );

}
}






$fooders_delivery_charges=$db->get_all('fooders_delivery_charges',array('fooder_id'=>$_SESSION['id']));

$max_range=$db->run("SELECT MAX(max_range) FROM fooders_delivery_charges WHERE fooder_id='$fooder_id'")->fetchColumn();
$min=0;
if($max_range>0 && $max_range<fooder_area_coverage) 
{
	$min=$max_range;
}elseif($max_range>fooder_area_coverage)
{
	$min=fooder_area_coverage;
}
$dccount=$db->get_count('fooders_delivery_charges',array('fooder_id'=>$_SESSION['id']));
if($_SERVER ['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_delivery_charges'])) 
{
// print_r($_POST);
$min_range=$_POST['min_range'];
$max_range=$_POST['max_range'];
$delivery_charge=$_POST['delivery_charge'];
$min_order_amount=$_POST['min_order_amount'];
$tab = $_POST ['tab'];



if (! is_numeric ( $min_range ))
{
	$display_fooders_cp = $fv->form_error ( 'Error', 'Min range should be numeric' );
}
elseif (! is_numeric ( $max_range )) {
	$display_fooders_cp = $fv->form_error ( 'Error', 'Max range should be numeric' );
} 
elseif ($min_range>fooder_area_coverage) {
	$display_fooders_cp = $fv->form_error ( 'Error', 'Min range should be less or equal to'.fooder_area_coverage );
} 
elseif ($max_range>fooder_area_coverage) {
	$display_fooders_cp = $fv->form_error ( 'Error', 'Max range should be less or equal to'.fooder_area_coverage );
} 
elseif ($min_range>=$max_range) {
	$display_fooders_cp = $fv->form_error ( 'Error', 'Min range should be less than max range!' );
} 
elseif(! is_numeric ($delivery_charge))
{
	$display_fooders_cp = $fv->form_error ( 'Error', 'Delivery charge should be numeric!' );
}
elseif(! is_numeric ($min_order_amount))
{
	$display_fooders_cp = $fv->form_error ( 'Error', 'Minimum order amount should be numeric!' );
}
elseif ($db->exists('fooders_delivery_charges',array('fooder_id'=>$_SESSION['id'],'min_range'=>$min_range,'max_range'=>$max_range))) {
	$display_fooders_cp = $fv->form_error ( 'Error', 'Range already exists!' );
} 
elseif ($dccount>=5) {
	$display_fooders_cp = $fv->form_error ( 'Error', 'You can add maximum 5 delivery ranges!' ); 
} 
else{

					$insert=$db->insert('fooders_delivery_charges',array('fooder_id'=>$_SESSION['id'],
					'min_range'=>$min_range,
					'max_range'=>$max_range,
					'delivery_charge'=>$delivery_charge,
					'min_order_amount'=>$min_order_amount,
					'status'=>'1',
					'created_date'=>time()
					));
					if(isset($insert))
					{
					
						 $fv->form_success_popup ('Delivery range add successfully!',fcpbclt, $query2ans, fooders, '?tab=tab-4' );
						
					
						//$display_fooders_cp = $fv->form_success ( 'Success', 'Delivery range add successfully!' );
						//$session->redirect ( $query2ans . "?tab=tab-4", fooders );
					
					}

				}




}
// if(isset($_POST['submit_perimeter']))
// {
// $perimeter=$_POST['perimeter'];
// if (! is_numeric ( $perimeter ))
// {
// 	$display_fooders_cp = $fv->form_error ( 'Error', 'Perimeter should be numeric!' );
// }else{
// 	$success = $db->update ( 'fooders', array ('perimeter' => $perimeter ), array ('fooder_id' => $fooder_id ) );
// 	$fv->form_success_popup ('Update successfully!', fcpbclt, $query2ans, fooders, '?tab=tab-5' );
// }



// }

?>