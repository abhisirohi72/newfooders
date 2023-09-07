<?php 
if(isset($_REQUEST['productDesc'])){
   $dishid = $feature->encrypt_decrypt('decrypt',$_REQUEST['productDesc']);
   $dishdetails = $db->run("CALL dishDetails('$dishid')")->fetch();
   
   if(file_exists(SERVER_ROOT . '/uploads/fooders/' . $dishdetails['fooder_id'] . '/product/'.$dishdetails['picture']) && $dishdetails['picture']!=''){
        $imageurl = SITE_URL.'/uploads/fooders/' . $dishdetails['fooder_id'] . '/product/'.$dishdetails['picture'];
   }else{
      $imageurl = SITE_URL.'/assets/mobile/img/img1.png';
   }
   $disharr = array('image'=>$imageurl,'name'=>$dishdetails['name'],'description'=>$dishdetails['description'],'price'=>$dishdetails['price'],'proprice'=>$dishdetails['proprice']);
   echo json_encode($disharr);
}
?>