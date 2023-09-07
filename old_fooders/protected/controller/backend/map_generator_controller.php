<?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['map_submit'] ) && $_POST ['add_map_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['admin_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$region = $_POST['region'];
    $city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	if($fv->check_specialcharacters($region)){
		$display_map = '<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		Oopes ! Special Characters Not Allowed .
		</div>';
	}
	elseif($fv->check_specialcharacters($city)){
		$display_map = '<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		Oopes ! Special Characters Not Allowed.
		</div>';
	}
	elseif($fv->check_specialcharacters($state)){
		$display_map = '<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		Oopes ! Special Characters Not Allowed.
		</div>';
	}
	elseif($fv->check_specialcharacters($country)){
		$display_map = '<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		Oopes ! Special Characters Not Allowed.
		</div>';
	}
	elseif($fv->check_alphabets($region)){
		$display_map = '<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		Oopes ! Only Numeric Value Allowed.
		</div>';
	}
	elseif($fv->check_specialcharacters($region)){
		$display_map = '<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		Oopes ! Only Numeric Value Allowed.
		</div>';
	}
	else{
		$insert_locations = $db->insert('delivery_areas',array(
				'country'=>$country,
				'state'=>$state,
				'city'=>$city,
				'region'=>$region,
				'lat'=>$latitude,
				'lng'=>$longitude
				));
		if($insert_locations){
			$display_map = '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			You Have Been Added Location Successfully.
			</div>';
		}
		
	}
	
}

?>