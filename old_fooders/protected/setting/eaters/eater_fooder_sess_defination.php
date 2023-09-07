<?php
if($query3==='menu_name')
	$menu_name=$query3ans;
if($query2==='fooder_profile_token' && $query2ans!='')
{
	$get_all_explode['getval']=$query2ans;
if($get_all_explode['getval']!=""){
$fooders_complete_details =$db->run ( "SELECT f.name,f.started_on,f.landline,f.fax,f.address,f.location,f.joining_date,
		f.is_approved,f.contact_name,fd.logo,fd.average_reviews,fd.number_of_reviews,fd.status,fd.type,fd.delivery_time,fd.area_coverage,fd.minimum_order,
		fd.specialization,fd.delivery_charges,fd.vat,fd.service_charge,fd.about_us,fd.facilities,fd.daily_hrs,
		fd.delivery_areas,fd.average_reviews, fd.number_of_reviews FROM `fooders` AS f LEFT JOIN `fooders_details` As fd ON fd.fooder_id=f.fooder_id
   		WHERE f.fooder_id=$get_all_explode[getval]" )->fetchAll();
/**
 * 
 * name, about us, specializations, type
 * 
 */

if(is_array($fooders_complete_details) && count($fooders_complete_details)!==0)
{
define('fooder_status',$fooders_complete_details['0']['status']);

$fooder_delivery_areas =unserialize($fooders_complete_details['0']['delivery_areas']);
$fooder_delivery_areas_count =count($fooder_delivery_areas);
define('fooder_delivery_locations',$fooder_delivery_areas_count);
define('fooder_id',$get_all_explode['getval']);
define('fooder_title',$fooders_complete_details['0']['name']);
define('fooder_description',html_entity_decode($fooders_complete_details['0']['about_us'],ENT_QUOTES,"UTF-8"));
define('fooder_keyword',$fooders_complete_details['0']['specialization']);
define('fooder_type',$fooders_complete_details['0']['type']);

if(is_array($fooders_complete_details['0'])  && $fooders_complete_details['0']['is_approved']==2)
{
$get_full_address = $db->get_row('delivery_areas',array('id'=>$fooders_complete_details['0']['location']));
if($fooders_complete_details['0']['logo']!="" && $fooders_complete_details['0']['logo']!=NULL){
$get_logo = SITE_URL.'/uploads/fooders/'.$get_all_explode['getval'].'/logo/'.$fooders_complete_details['0']['logo'];
}else{
	$get_logo=SITE_URL.'/assets/eaters/img/noimage.png';
}
if ($fooders_complete_details['0']['facilities'] == "N;" || $fooders_complete_details['0']['facilities'] == "") {
	$get_facility=array();

} else {
	$get_facility = unserialize ( $fooders_complete_details['0']['facilities'] );
}

$daily_hrs = $fooders_complete_details['0']['daily_hrs'];
$daily_hrs = unserialize($daily_hrs);
$pathofimages = SERVER_ROOT . '/uploads/fooders/' . $get_all_explode['getval'] . '/gallery/';
$gallery_images_array = array_reverse(glob ( $pathofimages . '*' ));

}
else
{	$session->redirect('home',eaters);
}
if(is_array($gallery_images_array)){
foreach($gallery_images_array as $image){
	$imagename = basename($image);
	$explode = explode ( "___", $imagename );
	if($explode['1']==1){
$gallery_images[]=basename($image);
		
	}
}
}
$get_menus = $db->get_all('fooders_menus',array('fooder_id'=>$get_all_explode['getval'],'status'=>1)); 


$count_reviews = $fooders_complete_details['0']['number_of_reviews'];
$average_reviews_decimal = $fooders_complete_details['0']['average_reviews'];
$average_reviews_decimal = round($average_reviews_decimal,1);
}
else
{
	$session->redirect('home',eaters);
}
}
}
else
{
	$session->redirect('home',eaters);
}
?>
