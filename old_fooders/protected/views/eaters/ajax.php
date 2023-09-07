<?php 
if (isset($_REQUEST['locationfilter'])) {
    $location = $_REQUEST['locationfilter'];
   $all_location = $db->run("CALL searchLocation('$location')")->fetchAll();
    $item = array();
    if (is_array($all_location)) {
        foreach ($all_location as $loc) {
            $item[] = array('id' => $feature->encrypt_decrypt('encrypt',$loc['id']), 'country' => $loc['country'],'state'=>$loc['state'],'city'=>$loc['city'],'region'=>$loc['region']);
        }
    }
    echo json_encode($item);
}
// elseif (isset($_REQUEST['searchlocation'])) {
//     $location = $_REQUEST['searchlocation'];
//     $locid = $_REQUEST['locid'];
//     if($db->exists('search_word',array('cookie'=>$_COOKIE['eater_basket'],'location'=>$locid))){

//     }else{
//     if($_SESSION['type']=='eater')
// 		$db->insert('search_word',array('value'=>$location,'cookie'=>$_COOKIE['eater_basket'],'eater_id'=>eater_id,'created_on'=>time(),'search_ip'=>$_SERVER['REMOTE_ADDR'],'device_type'=>$query1,'location'=>$locid));
// 		else
// 			$db->insert('search_word',array('value'=>$location,'cookie'=>$_COOKIE['eater_basket'],'eater_id'=>0,'created_on'=>time(),'search_ip'=>$_SERVER['REMOTE_ADDR'],'device_type'=>$query1,'location'=>$locid));
//     }
//    echo trim('1234'); 
    
   
// }
elseif(isset($_REQUEST['pickupfilter'])){
    $location = $_REQUEST['pickupfilter'];
    $decloc = $feature->encrypt_decrypt('decrypt',$location);
    $all_restaurant = $db->run("CALL searchFooderLocation('$decloc')")->fetchAll();
    $item = array();
    if (is_array($all_restaurant)) {
        foreach ($all_restaurant as $rest) {
           
            $item[] = array('fooder_id' => $rest['fooder_id'], 'name' => $rest['name'],'logo'=>$rest['logo'],'delivery_time'=>$rest['delivery_time'],'average_reviews'=>$rest['average_reviews'],'number_of_reviews'=>$rest['number_of_reviews'],'region'=>$rest['region'],'city'=>$rest['city'],'state'=>$rest['state'],'country'=>$rest['country']);
        }
    }
}
?>