<?php
/* directory that contain classes */
$classesDir= array( SERVER_ROOT.'/protected/library/' );
/*  loading all library components in everywhere  */
spl_autoload_register(function ($class)
{
	global $classesDir;
	foreach($classesDir as $directory)
	{
		if(file_exists($directory. $class. '_class.php'))
		{
			require($directory. $class. '_class.php');

			return;
		}
	}
}
);
/*loading all library end*/
/* Connect to an ODBC database using driver invocation */
//$db = new db("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$db = new search("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

$fv = new form_validations();
$feature = new feature();
$password= new password();
$link=new links();
$session= new session();
$mail=new mandrill_mail();

require SERVER_ROOT.'/protected/library/phpmailer/src/Exception.php';
require SERVER_ROOT.'/protected/library/phpmailer/src/PHPMailer.php';
require SERVER_ROOT.'/protected/library/phpmailer/src/SMTP.php'; 

/**
 * This controller routes all incoming requests to the appropriate controller and page
 */
if (strstr($_SERVER['REQUEST_URI'], '?') && strstr($_SERVER['REQUEST_URI'], 'user') && SEO == 0) {
$request= explode('?', $_SERVER['REQUEST_URI']);
$parsed= explode('=', $request['1']);
$query3ans=$parsed['3'];

 $query1= $parsed['0'];
$getParsed=explode('&',$parsed['1']);

$query1ans= $getParsed['0'];
$query2=$getParsed['1'];
$query2ans=$parsed['2'];
$query2ans_extended=explode('&',$query2ans);
 $query2ans=$query2ans_extended['0'];
 $query3=$query2ans_extended['1'];


/* cases */
 $useragent=$_SERVER['HTTP_USER_AGENT'];
 if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
 {
 	$query1=mobile;
 }
else{
$query1=mobile;
}
if ($query1==eaters && $query2==fooders){
	require SERVER_ROOT . '/protected/setting/fooderscases.php';
}
// elseif ($query1==eaters && $query2==admin){
// 	require SERVER_ROOT . '/protected/setting/backendcases.php';
// }
elseif ($query1==mobile && $query2==admin){
	require SERVER_ROOT . '/protected/setting/backendcases.php';
}
elseif ($query1==mobile && $query2==fooders){
	require SERVER_ROOT . '/protected/setting/fooderscases.php';
}
elseif ($query1==mobile){
	require SERVER_ROOT . '/protected/setting/mobilecases.php';
}
else{
		require SERVER_ROOT . '/protected/setting/eaterscases.php';
}

}else{



  #remove the directory path we don't want
  $request  = str_replace(SCRIPT_DIR_PATH . "/", "", $_SERVER['REQUEST_URI']);

  #split the path by '/'
  $params     = explode("/", $request);

 //$query1 = frontend; 
  if (isset($params[0])) {
	  $query1ans = $params[1];
  }
  //$query2 = admin;
  if (isset($params[1])) {
	  $query2ans = $params[2];
  }
  if (isset($params[2])) {
	  $query3ans = $params[3];
  }
$searchterm=$query1ans;
if($db->exists('fooders',array('url'=>$searchterm))){
$fooderid=$db->get_var('fooders',array('url'=>$searchterm),'fooder_id');
$fooderid=$feature->encrypt_decrypt('encrypt',$fooderid);
$query1ans='restaurant';
$query2ans='?id='.$fooderid;
}
//echo $query2ans."---";

//echo $query2;
  if (isset($query1ans) && $query1ans == admin)
  {

	  require SERVER_ROOT . '/protected/setting/backendcases.php';
  }
elseif(isset($query1ans) && $query1ans == fooders)
{
	  require SERVER_ROOT . '/protected/setting/fooderscases.php';
}
else{

	  require SERVER_ROOT . '/protected/setting/mobilecases.php';
  }

}
?>