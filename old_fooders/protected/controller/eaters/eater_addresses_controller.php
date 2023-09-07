<?php
if(!$session->Check() && $_SESSION['type']!=='eater'){
	$session->redirect('home',eaters);
}
else{
	$get_all_delivery_areas = $db->get_all('delivery_areas',array(),array('id','region'));
	$get_addresses = $db->get_all('eater_addresses',array('eater_id'=>eater_id),array('id','address','region_name','city','state','zip','default'));
	
	if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['address_submit'] ) && $_POST ['address_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
	{
	  $address=$_POST['address'];
	  $address = htmlentities($address, ENT_QUOTES,"UTF-8");
	  $region= $_POST['regions'];
	  $region_exp = explode('___',$region);
	  $region_id= $region_exp['0'];
	  $region_name = $region_exp['1'];
	  $city = "Agra"; //$_POST['city'];
	  $state = "Uttar Pradesh";//$_POST['state'];
	  $zip = $_POST['zip'];
	  $ip = $_SERVER['REMOTE_ADDR'];
	 
	  if($fv->emptyfields(array('Address'=>$address)))
	  {
	  	$display_eater_address = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Address Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
	  	</div>';
	  }
	  elseif($region==='0')
	  {
	  	$display_eater_address = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Please Select Region ! <i class="icon-remove" data-dismiss="alert"></i>
	  	</div>';
	  }
	  elseif($fv->emptyfields(array('Zip'=>$zip)))
	  {
	  	$display_eater_address = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Zip Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
	  	</div>';
	  }else{
	  	$count=$db->get_count('eater_addresses',array('eater_id'=>eater_id));
	  	
	  	if($count==0)
	  	{
	  		$insert_address = $db->insert('eater_addresses',array(
	  				'eater_id'=>eater_id,
	  				'address'=>$address,
	  				'region_id'=>$region_id,
	  				'region_name'=>$region_name,
	  				'city'=>$city,
	  				'state'=>$state,
	  				'zip'=>$zip,
	  				'ip'=>$ip,
	  				'creation_date'=>time(),
	  				'default'=>1
	  		));
	  		
	  	$update_address =$db->update('eaters',array('address'=>$address,'region'=>$region,'city'=>$city,'state'=>$state,'zip'=>$zip),array('eater_id'=>eater_id));	
	  	if($update_address){
	  		$_SESSION ['eater_address']= $address;
	  		$_SESSION ['eater_city']= $city;
	  		$_SESSION ['eater_region_id']= $region_id;
	  		$_SESSION ['eater_region_name']= $region_name;
	  		$_SESSION ['eater_state']= $state;
	  	}
	  	
	  	}
	  	else
	  	{
	  	$insert_address = $db->insert('eater_addresses',array(
	  			'eater_id'=>eater_id,
	  			'address'=>$address,
	  			'region_id'=>$region_id,
	  			'region_name'=>$region_name,
	  			'city'=>$city,
	  			'state'=>$state,
	  			'zip'=>$zip,
	  			'ip'=>$ip,
	  			'creation_date'=>time(),
	  			'default'=>0
	  			));
	  	}
	  	if($insert_address){
	  		$session->redirect('eater_addresses');
	  	}
	  }
	  
	}
	elseif ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['default_submit'] ) && $_POST ['default_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
	{
		 $addressid = $_POST['addressid'];
	     $get_address = $db->get_row('eater_addresses',array('id'=>$addressid,'eater_id'=>eater_id));
	     $eater_id=eater_id;
		 $region_address = $get_address['region_id'].'___'.$get_address['region_name'];
		 if($db->exists('eater_addresses',array('id'=>$addressid))){
			$db->run("update `eater_addresses` set `default` = case when `id` != '$addressid' then '0' when `id` = '$addressid' then '1' end where `eater_id`='$eater_id'");
			
			$update_address = $db->update('eaters',array('address'=>$get_address['address'],'region'=>$region_address,'city'=>$get_address['city'],'state'=>$get_address['state'],'zip'=>$get_address['zip']),array('eater_id'=>eater_id));
			if($update_address){
				$_SESSION ['eater_address']= $get_address['address'];
				$_SESSION ['eater_city']= $get_address['city'];
				$_SESSION ['eater_region_id']= $get_address['region_id'];
				$_SESSION ['eater_region_name']= $get_address['region_name'];
				$_SESSION ['eater_state']= $get_address['state'];
			}
			$session->redirect('eater_addresses');
			
		}
	}
	elseif ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['delete_submit'] ) && $_POST ['delete_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
	{
		$addressid = $_POST['addressid'];
		
		if($db->exists('eater_addresses',array('id'=>$addressid))){
			$db->delete('eater_addresses',array('id'=>$addressid,'eater_id'=>eater_id));
			$session->redirect('eater_addresses');
		}
			
	}
}

?>