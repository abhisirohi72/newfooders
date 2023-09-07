<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && $_POST ['selfie']=='selfie_upload' && $_POST ['upload_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$path = SERVER_ROOT.'/uploads/eaters/'.md5(eater_id).'/temp/';
	$getpath = SITE_URL.'/uploads/eaters/'.md5(eater_id).'/temp/';
	
	if($_FILES['image_file']['name']){
	$handle = new upload ( $_FILES['image_file'] );
	
	$imagename = $handle->file_new_name_body = 'profile-pic';
	$image_size = $_FILES ['image_file'] ['size'] / 1024;
	if(file_exists($path.'profile-pic.jpg')){
		unlink($path.'profile-pic.jpg');
	}
		if ($handle->image_src_type == 'jpg' || $handle->image_src_type == 'jpeg' || $handle->image_src_type == 'png')
		{
		  	 if($handle->image_src_pixels >='400' && $handle->image_src_x >='250'  && $handle->image_src_y >='250' ){
			if ($handle->uploaded) {
	
				$handle->image_convert = 'jpg';
				
				 
				if (! file_exists ( $path )) {
					mkdir ( $path, 0777, true );
				}
	
				$handle->Process ( $path );
				if ($handle->processed) {
					 
					$strOutput='<img class="crop-image" id="preview" src="'.$getpath.$imagename.'.jpg">';
					
				$strOutput .=	'<form action="'.$link->link('profile').'" method="post" onsubmit="return checkForm()">
			        <input type="hidden" name="pic_crop_ip" id="pic_crop_ip" value="'.$password->stringbreak($_SERVER["REMOTE_ADDR"]).'">
			         <input type="hidden" name="crop_pic" value="crop_pic_selfie" />
			        <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
			        <br>
			        <button type="submit" name="save_image">Save The Cropped Image</button>
		</form>';
					 
				}
				else{
					$strOutput = '<div class="crop-image-error"><i class="icon-warning-sign"></i> Problem In Processing ! <i class="icon-remove crop-image-icon" data-dismiss="alert"></i>
					</div><script>
					$("#hide-progress").show();
					</script>';
					 
				}
			}
		}
		else{
			$strOutput = '<div class="crop-image-error"><i class="icon-warning-sign"></i> Invalid Image Dimentions ! Must be 400px . <i class="icon-remove crop-image-icon" data-dismiss="alert"></i>
			</div><script>
					$("#hide-progress").show();
					</script>';
		}
		}
		else{
			$strOutput = '<div class="crop-image-error"><i class="icon-warning-sign"></i> Invalid File ! Only jpg, jpeg and png allowed. Please try again  <i class="icon-remove crop-image-icon" data-dismiss="alert"></i>
			</div><script>
					$("#hide-progress").show();
					</script>';
		}
	}
	echo $strOutput;
}
elseif ($_POST['discrepancy_check']==="discrepancy" && $_POST['discrepancy_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $password->stringbreak(SITE_URL.strtotime(date('Y-m-d')))===$_SESSION['eater_token'])
{
	$name = $fv->trim($_POST['name']);
	$email =$fv->trim($_POST['email']);
	$page_link = $_POST['page_link'];
	$description =htmlentities($_POST['description'],ENT_QUOTES,"UTF-8");
	
	         
				$return = array();
                $return['msg'] = '';
                $return['error'] = false;
                //Begin form validation functionality
                
                
                if (!isset($name) || empty($name)){
                        $return['error'] = true;
                        $return['msg'] .= '<div class="error-message">Name field is empty <i class="icon-remove" data-dismiss="alert" ></i></div>';
                }
                elseif (! $fv->check_alphabets ( str_replace ( ' ', '', $name ) )){
                	$return['error'] = true;
                	$return['msg'] .= '<div class="error-message">Name must be only alphabets <i class="icon-remove" data-dismiss="alert" ></i></div>';
                }
                elseif (!isset($email) || empty($email)){
                	$return['error'] = true;
                	$return['msg'] .= '<div class="error-message">Email field is empty <i class="icon-remove" data-dismiss="alert" ></i></div>';
                }
                elseif(!filter_var ( $email, FILTER_VALIDATE_EMAIL )){
                	$return['error'] = true;
                	$return['msg'] .= '<div class="error-message">Invalid Email ! Please try again <i class="icon-remove" data-dismiss="alert" ></i></div>';
                }
                
                elseif (!isset($description) || empty($description)){
                	$return['error'] = true;
                	$return['msg'] .= '<div class="error-message">Description field is empty <i class="icon-remove" data-dismiss="alert" ></i></div>';
                }
                      //Begin form success functionality
              if ($return['error'] === false){
				
              	$insert_array = array('eater_name'=>$name,
               		'eater_email'=>$email,
               		'page_link'=>$page_link,
               		'description'=>$description,
               		'eater_id'=>eater_id,
              		'ip'=>$_SERVER['REMOTE_ADDR']);
				
              	$insert= $db->insert('error',$insert_array);
                if($insert){	
                		$return['msg'] ='<div class="error-success">Discrepancy submitted successfully <i class="icon-remove" data-dismiss="alert" ></i></div>';
                }
                }
                //Return json encoded results
                    echo json_encode($return);
}
else if(isset($_POST['comment']) && $_POST['comment_check']==="comment" && $_POST['comment_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $password->stringbreak(SITE_URL.strtotime(date('Y-m-d')))===$_SESSION['eater_token'])
{
  $comment = $fv->trim($_POST['comment']);
  $comment= htmlentities($comment, ENT_QUOTES, "UTF-8");
  
  $speed = $_POST['speed'];
  $taste = $_POST['taste'];
  $service = $_POST['service'];
  $average = ($speed+$taste+$service)/3;
  $ip=$_SERVER['REMOTE_ADDR'];
  $fooder_id = $_POST['fooderid'];

              $return = array();
			  $return['msg'] = '';
			  $return['error'] = false;
			  if($db->exists('eaters_comments',array('fooder_id'=>$fooder_id,'comment'=>$comment,'eater_id'=>eater_id))){
			  	$return['error'] = true;
			  	$return['msg'] .= '<div class="alert-review-error">
			  	<strong>Review already submitted.</strong>
			  	<i class="icon-remove" data-dismiss="alert"></i>
			  	</div>';
			  }
			  else{
			  	
			  	if(!$session->Check() || $_SESSION['type']!=='eater'){
			  		$return['error'] = true;
			  		$return['msg'] .= '<div class="alert-review-error"><strong> You need to login to continue ! <a href="'.$link->link('access',eaters).'">Click here to login</a>  <i class="icon-remove" data-dismiss="alert"></i>
			  		</div>';
			  			
			  	}	
			  elseif (strlen($comment)>0 && strlen($comment)<5){
			  	$return['error'] = true;
			  	$return['msg'] .= '<div class="alert-review-error">
								  	<strong> Comment must be at least 5 characters long</strong>
								  	<i class="icon-remove" data-dismiss="alert"></i>
								  	</div>';
			  }
			  
			  
			  elseif (!isset($speed) || empty($speed)){
			  	$return['error'] = true;
			  	$return['msg'] .= '<div class="alert-review-error">
								   <strong> Rate speed of this fooder</strong> 
					               <i class="icon-remove" data-dismiss="alert"></i> 
					               </div>';
			  }
			  elseif (!isset($taste) || empty($taste)){
			  	$return['error'] = true;
			  	$return['msg'] .= '<div class="alert-review-error">
								   <strong> rate tastiness of this fooder</strong>
					                <i class="icon-remove" data-dismiss="alert"></i>  
					               </div>';
			  }
			  elseif (!isset($service) || empty($service)){
			  	$return['error'] = true;
			  	$return['msg'] .= '<div class="alert-review-error">
								   <strong> rate service of this fooder</strong>
					                <i class="icon-remove" data-dismiss="alert"></i>   
					               </div>';
			  
			  }
			
			  if ($return['error'] === false){
			  	
			  	$db->insert('eaters_comments',array(
			  			'fooder_id'=>$fooder_id,
			  			'comment'=>$comment,
			  			'speed'=>$speed,
			  			'taste'=>$taste,
			  			'service'=>$service,
			  			'average'=>$average,
			  			'eater_id'=>eater_id,
			  			'ip'=>$ip));
			  	
			  	
$get_average_count = $db->run ("SELECT sum(`average`) as sum, count(`average`)  as count from `eaters_comments` where `fooder_id`= $fooder_id")->fetchAll();
$average_sum_reviews = $get_average_count['0']['sum'];
// Reviews and comments
$count_reviews = $get_average_count['0']['count'];
if($count_reviews!=='0'){
$total_average_reviews = ($average_sum_reviews/$count_reviews);
}
else{
$total_average_reviews=0;
}

$average_reviews_decimal = round($total_average_reviews,'1');
$db->update('fooders_details',array('average_reviews'=>$average_reviews_decimal,'number_of_reviews'=>$count_reviews),array('fooder_id'=>$fooder_id));
			  	 
			 $return['msg'] ='<div class="alert-review-success">
								   <strong>Your review was submitted successfully!</strong> 
					               <i class="icon-remove" data-dismiss="alert"></i>   
					               </div>';
			  }
			  }
			  //Return json encoded results
			  echo json_encode($return);

}
/*
elseif ($_POST['contactus_check']==="contactus"  && $_POST['contactus_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $password->stringbreak(SITE_URL.strtotime(date('Y-m-d')))===$_SESSION['eater_token'])
{
	$name = $fv->trim($_POST['contact_name']);
	$email =$fv->trim($_POST['contact_email']);
	$phone_number = $fv->trim($_POST['contact_phone']);
	$message =$fv->trim($_POST['contact_message']);
	$message = htmlentities($message, ENT_QUOTES,"UTF-8");

	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	//Begin form validation functionality
	if (!isset($name) || empty($name)){
		$return['error'] = true;
		$return['msg'] .= '<div class="error-message">Name field is empty <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	elseif (! $fv->check_alphabets ( str_replace ( ' ', '', $name ) )){
		$return['error'] = true;
		$return['msg'] .= '<div class="error-message">Name must be only alphabets <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	elseif (!isset($email) || empty($email)){
		$return['error'] = true;
		$return['msg'] .= '<div class="error-message">Email field is empty <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	elseif(!filter_var ( $email, FILTER_VALIDATE_EMAIL )){
		$return['error'] = true;
		$return['msg'] .= '<div class="error-message">Invalid Email ! Please try again <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	elseif (!$fv->check_numeric($phone_number)){
		$return['error'] = true;
		$return['msg'] .= '<div class="error-message">Phone no. must be numeric <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	elseif (!isset($message) || empty($message)){
		$return['error'] = true;
		$return['msg'] .= '<div class="error-message">Message field is empty <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}


	//Begin form success functionality
	if ($return['error'] === false){
		$insert= $db->insert('contact_feedback',array(
				'name'=>$name,
				'email'=>$email,
				'phone_number'=>$phone_number,
				'message'=>$message,
				'ip'=>$_SERVER['REMOTE_ADDR']
				));
		if($insert)
			$return['msg'] ='<div class="error-success">Submitted successfully ! khateraho team will contact you in 24 hrs   <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	//Return json encoded results
	echo json_encode($return);
}
*/
elseif ($_POST['forgotpass_check']==="forgotpass" && $_POST['forgot_pass_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $password->stringbreak(SITE_URL.strtotime(date('Y-m-d')))===$_SESSION['eater_token'])
{
	$email_forgot =$fv->removespace($_POST['forgot_email']);
	

	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	//Begin form validation functionality
	
	if (!isset($email_forgot) || empty($email_forgot)){
		$return['error'] = true;
		$return['msg'] .= '<div class="access-error">Email Is Empty ! <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	elseif(!filter_var ( $email_forgot, FILTER_VALIDATE_EMAIL )){
		$return['error'] = true;
		$return['msg'] .= '<div class="access-error">Invalid Email !  <i class="icon-remove" data-dismiss="alert" ></i></div>';
	}
	
		//Begin form success functionality
	if ($return['error'] === false){
		
		
		$query_email_forgot = $db->get_row('eaters',array('email'=>$email_forgot));
		
		if(!$query_email_forgot)
		{
			$return['msg'] ='<div class="access-error">Eater With This Email Do Not Exists <i class="icon-remove" data-dismiss="alert" ></i></div>';
			
		}
		elseif ($query_email_forgot['is_verified']=='1'){
			$return['msg'] ='<div class="access-error">Eater verification is pending ! Check the link provided in your eater verification email <i class="icon-remove" data-dismiss="alert" ></i></div>';
		}
		else{
			$password->generateNewToken($tokenForLink, $hashedTokenForDatabase);
			$db->update('eaters',array('token_value'=>$hashedTokenForDatabase,'token_time'=>time(),'token_type'=>'2','token_used'=>'3'),array('eater_id'=>$query_email_forgot['eater_id']));
			$linkCode = $password->buildLinkCode($query_email_forgot['eater_id'], $tokenForLink);
			$passwordResetUrl = sprintf($link->link('access',eaters,'&fcode=%s'), $linkCode);
			$return['msg'] ='<div class="access-success">Password Reset Instructions Sent To Your Email <i class="icon-remove" data-dismiss="alert" ></i></div>';
		    
			$html ='<table align="center" style="background-color:#2d2d2a;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
				<tbody><tr>
					<td>
						<table border="0" width="100%" style="margin-top:20px;margin-bottom:20px;border-collapse:collapse">
							<tbody><tr>
								<td align="center">
 <a href="http://www.khateraho.com/" style="text-decoration:none;color:#cb202d" target="_blank"><img src="'.SITE_URL.'/assets/eaters/img/email_logo.png" alt="Khate Raho Logo" style="border:0;min-height:auto;line-height:100%;outline:none;text-decoration:none"></a>
								</td>
							</tr>
						</tbody></table></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>
<table align="center" style="background-color:#f4f4f2;width:100%;border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse">
				<tbody><tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;border-radius:0 0 5px 5px;margin-bottom:15px;border:solid 1px #c8c8c8;border-top:none;border-collapse:collapse">
							<tbody><tr>
								<td colspan="2" align="center" style="padding-top:22px;padding-left:22px;padding-right:22px"><h1 style="font-family:Helvetica Neue,Arial,sans-serif;font-size:18px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:20px;border-bottom:solid 1px #c8c8c8;padding-bottom:22px">Looks Like You Forgot Your Password ! </h1>
 <p style="text-align:center;font-family:Helvetica Neue,Arial,sans-serif;font-weight:bold;padding-bottom:20px">
 <a href="'.$passwordResetUrl.'" style="background:#cb202d;font-family:Helvetica Neue,Arial,sans-serif;color:#fff;font-size:16px;padding:5px 15px;text-decoration:none;font-weight:normal" target="_blank">Click Here To Reset Your Password</a></p>
							  <p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:18px;color:#6d6d6d;margin-top:20px;margin-bottom:20px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;padding-bottom:8px">You received this email because  somebody tried to change this email&#146;s password on khateraho.com. If you didn&#146;t do this, you can safely ignore this email and we will not email you again. In case you want to report this issue, email us at <a href="mail:eaters@khateraho.com">eaters@khateraho.com</a></span></p></td>
							</tr>
							</tbody></table>
								</td>
							</tr>
						</tbody></table>
						<table width="100%" style="border-collapse:collapse">
							<tbody><tr>
								<td colspan="2" align="center">
								<p style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px;border-bottom:solid 1px #c8c8c8;padding-bottom:8px"><span style="font-family:Helvetica Neue,Arial,sans-serif;font-size:11px;line-height:18px;color:#2d2d2a;margin-top:0;margin-bottom:8px">&copy; Khateraho.com. All rights reserved. </span></p></td>
							</tr>
						</tbody></table>
				</td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>';
			$mail->mandrill($email_forgot, $query_email_forgot['name'], 'Password Reset Link - Eaters Zone', $html, kr_noreply_email);
// 			$mail_one = new PHPMailer(true);
// //Server settings
// $mail_one->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
// $mail_one->isSMTP();                    // Send using SMTP
// $mail_one->Host       = smtp_host;                    // Set the SMTP server to send through
// $mail_one->SMTPAuth   = true;                                   // Enable SMTP authentication
// $mail_one->Username   = smtp_username;                     // SMTP username
// $mail_one->Password   = smtp_password;                               // SMTP password
// $mail_one->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
// $mail_one->Port       = smtp_port;

// $from_name = 'KhateRaho';
// $from_mail = 'support@cobbleai.com';	

// $mail_one->setFrom($from_mail, $from_name);
// $mail_one->addAddress($email_forgot);
// //$mail_one->addReplyTo(REPLYEMAIL);
// $mail_one->isHTML(true);  
// $mail_one->CharSet = 'UTF-8';
// $mail_one->Subject = 'Password Reset Link - Eaters Zone';
// $mail_one->Body    = $email_body;
// //$mail[$key]->AltBody = 'This is the body in plain text for non-HTML mail clients';

// $confirm =  $mail_one->send();


		}
			
	}
	//Return json encoded results
	echo json_encode($return);
}
elseif($_REQUEST['fooderid_del']  && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
$fooderid = base64_decode($_REQUEST['fooderid_del']);

$return = array();
$return['msg'] = '';
$return['error'] = false;

if ($return['error'] === false){
	  
        $delivery_areas = $db->get_col('fooders_details',array('fooder_id'=>$fooderid),'delivery_areas');       
	    $areas = unserialize($delivery_areas['0']);
	    $return['msg'] .= '<div class="md-modal md-effect-10" id="modal-10">
	    <div class="md-content">
		<h3>'.count($areas).' Delivery Areas Covered<i class="icon-remove md-pro md-close"></i></h3>
		<div style="padding-right:0px;">
	    
	    <div class="row-fluid modal-bg">
	    <div class="span12">
        <div class="row-fluid">
        <div class="span12 center area-input">
        <form id="live-search" action="" method="post">
        <input type="text" name="area_search" id="filter-delivery" style="width:103%;" value="" placeholder="Search your delivery area"> 
        </form>
        </div>
        </div>
        <div class="delivery-areas-hr"></div><br>
       <div class="basket-scrollbar">';
        
       foreach($areas as $key=>$ids){
      $get_areas = $db->get_col('delivery_areas',array('id'=>$ids),'region');	
        
        if($key%2==0)
        {
        	$return['msg'] .= '<div class="row-fluid commentlist"><div class="span12">';
        }
     $return['msg'] .=   '<div class="span6 delivery-area">'.$get_areas['0'].'</div>';

     if(($key+1)%2==0)
     {
     	$return['msg'] .= '</div></div>';
     }
       } 
      $return['msg'] .=  '</div>
   
        </div>
        </div>
		
		</div>
	</div>
</div>
</div>
</div>
<div class="md-overlay"></div>
<script>
$(".md-effect-10").addClass("md-show");
$(".md-overlay").click(function(){
$(".md-effect-10").removeClass("md-show");

});
$(".md-close").click(function(){
$(".md-effect-10").removeClass("md-show");

});

    $("#filter-delivery").keyup(function(){
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 
        // Loop through the comment list
        $(".commentlist").each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });
 
        // Update the count
        var numberItems = count;
        $("#filter-count").text("Number of Comments = "+count);
    });


</script>';

}
echo json_encode($return);
}
elseif($_REQUEST['flocation']  && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	$locations=array();
	if ($return['error'] === false){
		$db->order_by="location_name ASC";
		$db->group_by="`location_name`";
		$locations = $db->get_all('fooders',array(),array('location_name'));
		
		
		foreach($locations as $loc){
			
			$return['msg'] .= '<li class="list-loc"><a href="'.$link->link('fooders_search_results',eaters,'&location='.urlencode($loc['location_name'])).'">'.$loc['location_name'].'</a></li>';
			
		}
	}
	echo json_encode($return);
}
elseif($_REQUEST['fcuisine']  && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	$cuisines=array();
	if ($return['error'] === false){
		$db->order_by="name ASC";
		$db->group_by="`name`";
		$cuisines = $db->get_all('fooders_menus',array(),array('name','id'));
		foreach($cuisines as $cos){
			$return['msg'] .= '<li class="list"><a href="'.$link->link('fooders_search_results',eaters,'&cuisine='.urlencode($cos['name'])).'">'.$cos['name'].'</a></li>';
				
		}
	}
	echo json_encode($return);
}
elseif($_REQUEST['cartcount'] && $_SERVER ['REQUEST_METHOD'] == 'POST' && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	if(isset($_SESSION['type']) && $_SESSION['type']=="eater")
	{
		$basket_count = $db->get_count('food_basket',array('eater_id'=>$_SESSION['id']));
	}
	else
	{
		$basket_count= $db->get_count('food_basket',array('cookie_basket'=>$_COOKIE['eater_basket']));
	}
	echo '<img src="'.SITE_URL.'/assets/eaters/img/cart.png"> Food Basket <sup class="basket-count basket-count-box" id="basket-value">'.$basket_count.'
	</sup>';
}
else
{
	$session->redirect('home',eaters);
}

?>
