<?php

if(isset($_POST['admin_logo_save']) && $_POST['adminlogo_secure']=="adminsecure" && $_POST['adminlogo_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$path = SERVER_ROOT.'/assets/backend/img/';
	$handle = new upload ( $_FILES['file'] );
	if ($handle->uploaded) {
		$handle->file_new_name_body = 'admin_logo';
		$handle->file_new_name_ext = 'png';
		if($path.'admin_logo.png'){
			unlink($path.'admin_logo.png');
		}
		$handle->Process ( $path );
		if($handle->processed){
			$display_logo = '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			Admin Logo Updated Successfully.
			</div>';
		}
	}
   
}
elseif(isset($_POST['fooder_logo_save']) && $_POST['fooderlogo_secure']=="foodersecure" && $_POST['fooderlogo_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$path = SERVER_ROOT.'/assets/fooders/img/';
	$handle = new upload ( $_FILES['file'] );
	if ($handle->uploaded) {
		$handle->file_new_name_body = 'fooder_dash';
		$handle->file_new_name_ext = 'png';
		if($path.'fooder_dash.png'){
			unlink($path.'fooder_dash.png');
		}
		$handle->Process ( $path );
	if($handle->processed){
			$display_logo = '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			Fooder Logo Updated Successfully.
			</div>';
		}
	}
	 
}
elseif(isset($_POST['eater_logo_save']) && $_POST['eaterlogo_secure']=="eatersecure" && $_POST['eaterlogo_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$path = SERVER_ROOT.'/assets/eaters/img/';
	$handle = new upload ( $_FILES['file'] );
	if ($handle->uploaded) {
		$handle->file_new_name_body = 'krlogo';
		$handle->file_new_name_ext = 'png';
		if($path.'krlogo.png'){
			unlink($path.'krlogo.png');
		}
		$handle->Process ( $path );
	if($handle->processed){
			$display_logo = '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			Eater Logo Updated Successfully.
			</div>';
		}
	}

}
elseif(isset($_POST['email_logo_save']) && $_POST['emaillogo_secure']=="emailsecure" && $_POST['emaillogo_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$path = SERVER_ROOT.'/assets/eaters/img/';
	$handle = new upload ( $_FILES['file'] );
	if ($handle->uploaded) {
		$handle->file_new_name_body = 'email_logo';
		$handle->file_new_name_ext = 'png';
		if($path.'email_logo.png'){
			unlink($path.'email_logo.png');
		}
		$handle->Process ( $path );
		
	if($handle->processed){
			$display_logo = '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			Email Logo Updated Successfully.
			</div>';
		}
	}

}
elseif(isset($_POST['social_links_save']) && $_POST['social_links_secure']=="sociallinks" && $_POST['social_links_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$facebook_link = $_POST['facebook_link'];
	$twitter_link = $_POST['twitter_link'];
	$google_link = $_POST['google_link'];
	$get_links= $db->get_all('setting');
	if(count($get_links)==0){
	    $db->insert('setting',array('facebook'=>$facebook_link,'twitter'=>$twitter_link,'google_plus'=>$google_link));
	}else{
		$db->update('setting',array('facebook'=>$facebook_link,'twitter'=>$twitter_link,'google_plus'=>$google_link),array('id'=>'1'));
	}
	
	
	
	}




?>