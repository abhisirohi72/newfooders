<?php
class feature {
	private $address = null;
	/**
	 *
	 * @param
	 *       	 type 0 return first character of string in capital letter.
	 *       	
	 * @param
	 *       	 type 1 return first character of all word in capital letter.
	 *       	
	 * @param
	 *       	 type 2 return all character of string in small letters.
	 *       	
	 * @param
	 *       	 type 3 return all character of string in capital letters.
	 *       	
	 * @param
	 *       	 type 4 return first character of string in small letter.
	 *       	
	 * @param
	 *       	 type 5 return first character of all word in capital letter
	 *       	 (also convert other characters in small).
	 *       	
	 */
	public function textstyler($string, $type) {
		
		$str = trim ( preg_replace ( '/[^A-Za-z0-9\-]/', ' ', $string ) ); // Removes
		                                                                   // special
		                                                                   // chars.
		
		if ($type == 0) {
			return ucfirst ( $str );
		} elseif ($type == 1) {
			return ucwords ( $str );
		} elseif ($type == 2) {
			return strtolower ( $str );
		} elseif ($type == 3) {
			return strtoupper ( $str );
		} elseif ($type == 4) {
			return lcfirst ( $str );
		} elseif ($type == 5) {
			return ucwords ( strtolower ( $str ) );
		}
	}
	/**
	 *
	 * @param $string is
	 *       	 string
	 * @param $replacer is
	 *       	 the replace character which replace space from string.
	 */
	public function space_replacer($string, $replacer) {
		return str_replace ( ' ', $replacer, $string );
	}
	/**
	 *
	 * @param $string is
	 *       	 the string
	 * @return where new line in your string it replace with spaces string
	 *         return
	 */
	public function remove_newline($string) {
		return trim ( preg_replace ( '/\s+/', ' ', $string ) );
	}
	// distance calculator
	function getDistanceFromLatLonInKm($lat1, $lon1, $lat2, $lon2) {
		$R = 6371; // Radius of the earth in km
		$dLat = deg2rad ( $lat2 - $lat1 ); // deg2rad below
		$dLon = deg2rad ( $lon2 - $lon1 );
		$a = sin ( $dLat / 2 ) * sin ( $dLat / 2 ) + cos ( deg2rad ( $lat1 ) ) * cos ( deg2rad ( $lat2 ) ) * sin ( $dLon / 2 ) * sin ( $dLon / 2 );
		$c = 2 * (atan2 ( sqrt ( $a ), sqrt ( 1 - $a ) ));
		$distance = $R * $c; // Distance in km
		return $distance;
	}
	// get areas less than given kilometers and returns array
	function getcoveredareas_array($lat1, $lon1, $deliveryareasarray = array(), $kms) {
		foreach ( $deliveryareasarray as $key => $val ) {
			$dis = $this->getDistanceFromLatLonInKm ( $lat1, $lon1, $val ['lat'], $val ['lng'] );
			if ((($dis * .17) + $dis) <= $kms) {
				$getselected [] = $val ['id'];
				$getregion [] = $val ['region'];
			}
		}
		return (array_combine ( $getselected, $getregion ));
	}
	
	function getOS() {
	
		$user_agent=$_SERVER['HTTP_USER_AGENT'];
	
		$os_platform    =   "Unknown OS Platform";
	
		$os_array       =   array(
				'/windows nt 6.2/i'     =>  'Windows 8',
				'/windows nt 6.1/i'     =>  'Windows 7',
				'/windows nt 6.0/i'     =>  'Windows Vista',
				'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
				'/windows nt 5.1/i'     =>  'Windows XP',
				'/windows xp/i'         =>  'Windows XP',
				'/windows nt 5.0/i'     =>  'Windows 2000',
				'/windows me/i'         =>  'Windows ME',
				'/win98/i'              =>  'Windows 98',
				'/win95/i'              =>  'Windows 95',
				'/win16/i'              =>  'Windows 3.11',
				'/macintosh|mac os x/i' =>  'Mac OS X',
				'/mac_powerpc/i'        =>  'Mac OS 9',
				'/linux/i'              =>  'Linux',
				'/ubuntu/i'             =>  'Ubuntu',
				'/iphone/i'             =>  'iPhone',
				'/ipod/i'               =>  'iPod',
				'/ipad/i'               =>  'iPad',
				'/android/i'            =>  'Android',
				'/blackberry/i'         =>  'BlackBerry',
				'/webos/i'              =>  'Mobile'
		);
	
		foreach ($os_array as $regex => $value) {
	
			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}
	
		}
	
		return $os_platform;
	
	}
	
	function getBrowser() {
	
		$user_agent=$_SERVER['HTTP_USER_AGENT'];
	
		$browser        =   "Unknown Browser";
	
		$browser_array  =   array(
				'/msie/i'       =>  'IE',
				'/firefox/i'    =>  'Firefox',
				'/safari/i'     =>  'Safari',
				'/chrome/i'     =>  'Chrome',
				'/opera/i'      =>  'Opera',
				'/netscape/i'   =>  'Netscape',
				'/maxthon/i'    =>  'Maxthon',
				'/konqueror/i'  =>  'Konqueror',
				'/mobile/i'     =>  'Handheld Browser'
		);
	
		foreach ($browser_array as $regex => $value) {
	
			if (preg_match($regex, $user_agent)) {
				$browser    =   $value;
			}
	
		}
	
		return $browser;
	
	}
	public function encrypt_decrypt($action, $string) {
		$output = false;
		$encrypt_method = cipher;
		$secret_key = encryption_key;
		$secret_iv = iv;
		// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
	
		return $output;
	}
	public function generateEncryptToken($length = 20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$encryptrandom = feature::encrypt_decrypt('encrypt',$randomString.time().$_SERVER['REMOTE_ADDR']);
		return $encryptrandom;
	}
	function generateOtp($n){
		$gen = "1357902468";
		$res = "";
		for ($i = 1; $i <= $n; $i++)
		{
		$res .= substr($gen, (rand()%(strlen($gen))), 1);
		}
		return $res;
	 }
	 function randomString($c) {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$str = array(); //remember to declare $str as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $c; $i++) {
			$n = rand(0, $alphaLength);
			$str[] = $alphabet[$n];
		}
		return implode($str); //turn the array into a string
	}
	
}
?>