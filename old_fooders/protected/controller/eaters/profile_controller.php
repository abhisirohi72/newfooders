<?php
if(!$session->Check() && $_SESSION['type']!=='eater'){
	$session->redirect('home',eaters);
}
else{
	$eater_id= eater_id;
	$db->group_by="`name`";
	$get_all_menus = $db->get_col('fooders_menus',array(),'name');
	$db->group_by="`name`";
	$get_all_products = $db->get_col('fooders_products',array(),'name');
	$get_reviews = $db->get_all('eaters_comments',array('eater_id'=>eater_id));
	$get_recipes = $db->get_all('recipes',array('eater_id'=>eater_id));
	$get_all_delivery_areas = $db->get_all('delivery_areas',array(),array('id','region'));
	$get_loyalty_points = $db->run("SELECT sum(`points_earn`) AS sum FROM `loyalty` WHERE `eater_id`=$eater_id")->fetchAll();
	
$gender_array = array('Female','Male','Transgender');	
/*$state_array = array('Andaman and Nicobar Islands','Andhra Pradesh','Arunachal Pradesh','Assam','Bihar','Chandigarh',
		'Chhattisgarh','Dadra and Nagar Haveli','Daman and Diu','Delhi','Goa','Gujarat','Haryana','Himachal Pradesh',
	    'Jammu and Kashmir','Jharkhand','Karnataka','Kerala','Lakshadweep','Madhya Pradesh','Maharashtra','Manipur',
		'Meghalaya','Mizoram','Nagaland','Odisha','Pondicherry','Punjab','Rajasthan','Sikkim','Tamil Nadu',
		'Tripura','Uttar Pradesh','Uttrakhand','West Bengal'
		);	*/
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['profile_submit'] ) && $_POST ['personal_details_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$name   = $fv->trim($_POST['name']);
	$mobile = $fv->removespace($_POST['mobile']);
	$dob    = $fv->trim($_POST['dob']);
	$gender = $fv->removespace($_POST['gender']);
	$cuisine = $_POST['cuisine'];
	$dish	 = $_POST['dish'];
    if($dob)
	list($dd,$mm,$yyyy) = explode('/',$dob);
	
	if($fv->emptyfields(array('Name'=>$name)))
	{
	    $display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Name Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif (!$fv->check_alphabets ( str_replace ( ' ', '', $name ) ))
	{
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Com&#146;on Yaar, Use Real Name <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif ($mobile!='' && !$fv->check_numeric($mobile))
	{
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid Mobile No. ! Please Enter Only Numeric Value <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif ($mobile!='' && (strlen($mobile)<10 || strlen($mobile)>10))
	{
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid Mobile No. ! Please Enter Only 10 Digit <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif ($dob!=='' && !checkdate($mm,$dd,$yyyy) || $yyyy>=(date('Y')-5))
	{
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid Date Of Birth !  <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	
	/*elseif ($zip!=='' && ! $fv->check_numeric($zip))
	{
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid Zip ! Please Enter Only Nnumeric Value <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif ($zip!=='' && strlen($zip)<4 || strlen($zip)>6)
	{
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid Zip ! Use Real Zip Code <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif ($state!=='' && ! in_array($state, $state_array)){
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid State ! Please Enter Valid State <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}*/
	elseif (!is_array($cuisine) && (count($cuisine)>5)){
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i>  You Can Select A  Maximum Of 5 Cuisines ! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	elseif (!is_array($dish) && (count($dish)>5)){
		$display_profile = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> You Can Select A  Maximum Of 5 Dishes ! <i class="icon-remove" data-dismiss="alert"></i>
		</div>';
	}
	else 
	{
		
		
		$eater_update_array = array(
				'name'=>$name,
				'mobile'=>$mobile,
				'dob'=>$dob,
				'gender'=>$gender,
				'favourite_cuisine'=>serialize($cuisine),
				'favourite_dish'=>serialize($dish)
				);
		
		$success_update=$db->update('eaters',$eater_update_array,array('eater_id'=>eater_id));
	    
		
		if($success_update){
			$_SESSION ['eater_name']=$name;
			$_SESSION ['eater_mobile']=$mobile;
			$_SESSION ['eater_dob']= $dob;
			$_SESSION ['eater_gender']= $gender;
			$_SESSION ['eater_favourite_cuisine']= serialize($cuisine);
			$_SESSION ['eater_favourite_dish']= serialize($dish);
		
			$display_profile = '<div class="access-success" style="text-align:right;"><i class="icon-ok"></i> Updated Successfully <i class="icon-remove" data-dismiss="alert"></i></div>';
			}
			
	}
	
}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['save_image'] ) && $_POST ['crop_pic']=='crop_pic_selfie' && $_POST ['pic_crop_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))  
{   
	$targ_w = $targ_h = 250;
	$jpeg_quality = 100;
	
	$path = 'uploads/eaters/'.md5(eater_id).'/temp/';
	$path_pic = 'uploads/eaters/'.md5(eater_id).'/pictures/';
	$src = $path.'profile-pic.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
	
	// create a new true color image
						$vDstImg = @imagecreatetruecolor( $targ_w, $targ_h );
						$backgroundColor = imagecolorallocate($vDstImg, 255, 255, 255);
						imagefill($vDstImg, 0, 0, $backgroundColor);
						// Make the background transparent
						 
						// copy and resize part of an image with resampling
						imagecopyresampled($vDstImg, $img_r, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $targ_w, $targ_h, (int)$_POST['w'], (int)$_POST['h']);
						imagejpeg($vDstImg, $path_pic.'selfie.jpg', $jpeg_quality);
						
					if(file_exists($src)){
						unlink($src);
					}
					$session->redirect('profile?'.time().rand(4,10));
}

} 
?>