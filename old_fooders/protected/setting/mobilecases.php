<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];

$query1ans='comingsoon';

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)) || $_SERVER['HTTP_COOKIE']=='G_ENABLED_IDPS=google; _ga=GA1.2.1011351223.1653633826; mobile_basket=2168mobile___browser%3AChromeos%3AMac%20OS%20Xip%3A223.233.77.117time%3A1687154921; __gads=ID=6cb765e3d98ffe45-2291303bc4e1001c:T=1687433476:RT=1687870721:S=ALNI_MYZFQ1VDqBfAnQhKtF591f4bE0F-w; __gpi=UID=00000c5f07fdce90:T=1687433476:RT=1687870721:S=ALNI_MYL9_SPJ3QPP7_bCOegS8o3LCszaw; PHPSESSID=dktia786si48bt22mgkmf7fj00; _gid=GA1.2.2102439745.1689588723; _ga_N7QL4Y6W5X=GS1.2.1689588723.27.1.1689589102.0.0.0' || $_SERVER['REMOTE_ADDR']=='49.36.217.79'){

if ($query1ans == '' ||  strstr($query1ans,'fbclid'))
	$query1ans = 'comingsoon';
    elseif ($_REQUEST['id'] == 'V2VJNy9uTjA4MzhhelMvZ2k0MUdWQT09')
	header("Location: https://qrcode.khateraho.com/the-mud-cafe/?tableno=CKZNF45t2rM1"); 
elseif ($query1ans == 'fooder_products' || $query1ans == 'overview')
$query1ans = '404';

$mcontroller = SERVER_ROOT . '/protected/controller/mobile/' . $query1ans . '_controller.php';
$mobile = SERVER_ROOT . '/protected/views/mobile/' . $query1ans . ".php";
if ($query1ans == "ionicrecipe"  || $query1ans=='login'  || $query1ans=='ajax'  || $query1ans=='verification') {
	if (file_exists ( $mobile )) {
		if (file_exists ( $mcontroller ))
			require $mcontroller;
		require $mobile;
	}
}
elseif ($query1ans=="logout"){
	$expire=time()-60*60*24*30;
	setcookie('mobile_basket','',$expire);
	$session->destroy('access',mobile);
    
}
else {
	require SERVER_ROOT . '/protected/setting/mobile/mobile_sessions.php';
	if ($query1ans == 'fooder') {

		require SERVER_ROOT . '/protected/setting/mobile/mobile_fooder_sess_defination.php';
	}
	if ($query1ans != 'post'){
	require SERVER_ROOT . '/protected/setting/mobile/header.php';
	if ($query1ans != 'home'){
	//require SERVER_ROOT . '/protected/setting/mobile/sidebar.php';
	}
	}
	if (file_exists ( $mobile )) {
		if (file_exists ( $mcontroller ))
			require $mcontroller;
		require $mobile;
	} else {
	if (file_exists(SERVER_ROOT . '/protected/views/mobile/404.php')) {
		require SERVER_ROOT . '/protected/views/mobile/404.php';
		}
	}
	if ($query1ans != 'post'){
		require SERVER_ROOT . '/protected/setting/mobile/footer.php';
	}
}
}
else{
	require SERVER_ROOT . '/protected/setting/mobile/header.php';
    require SERVER_ROOT . '/protected/views/mobile/comingsoon.php';
}


?>