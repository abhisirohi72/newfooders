<?php
    if(isset($_REQUEST['id'])){
      $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['id']); 
    }elseif(isset($fooderid)){
      $_REQUEST['id'] = $fooderid;
      $fooderid = $feature->encrypt_decrypt('decrypt',$fooderid);
    }else{
      $session->redirect('home',mobile);
      exit;
    }
    // if(!isset($_REQUEST['id']) || $fooderid==''){
    //     $session->redirect('home',mobile);
    // } 

    if(isset($_REQUEST['tableno']) && $db->exists('fooders_tables',array('table_uniqueid'=>$_REQUEST['tableno'],'fooder_id'=>$fooderid)) ){
      // unset($_SESSION['tableno']);
      // unset($_SESSION['tableuniqueid']);
      // unset($_SESSION['phone']);
       $gettable = $db->get_var('fooders_tables',array('table_uniqueid'=>$_REQUEST['tableno'],'fooder_id'=>$fooderid),'table_no'); 
      // $_SESSION['tableno'] = $gettable;
      // $_SESSION['tableuniqueid'] = $_REQUEST['tableno'];
      // header('Location:'.SITE_URL.'/'.$searchterm);
      //$session->redirect('login',mobile);
    }
     
    //echo "--------------".$cookie = $_COOKIE['mobile_basket'];
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $fooder_details = $all_dishes['0'];
    $daily_hrs = unserialize($fooder_details['daily_hrs']);
    if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
      $eaterid = $_SESSION['id'];
      $all_cart = $db->run("CALL foodBasketId('$eaterid','$fooderid')")->fetchAll();
    }else{
      $all_cart = $db->run("CALL foodBasketCookie('$cookie','$fooderid','')")->fetchAll(); 
    }
    // echo "<pre>";
    // print_r($all_cart);
    // echo "</pre>";
    $newarr = array();
    if(is_array($all_cart)){
      $qty = 0;
      $pricep = 0;
       foreach($all_cart as $cart){
         $newarr[$cart['product_id']]['qty']=$cart['quantity']; 
         if($cart['product_proprice']>0){
            $price = $cart['product_proprice']*$cart['quantity'];
        }else{
            $price = $cart['product_price']*$cart['quantity'];
        } 
        $pricep += $price;
        $qty +=  $cart['quantity']; 
       }
    }
    $checkveg = 0;
    $checknonveg = 0;
     if(is_array($all_dishes)){
       foreach($all_dishes as $cdis){
         if($cdis['product_type']=='0'){
           $checkveg=1;
         }
         if($cdis['product_type']=='1'){
          $checknonveg=1;
        }
       }
     }
//echo $checkveg.'-------'.$checknonveg;
    //echo "======".$newarr[$dish['productid']]['qty'];
    //echo "<pre>",print_r($all_dishes),"</pre>";
    ?>