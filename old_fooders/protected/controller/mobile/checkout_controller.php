<?php
//echo "<pre>",print_r($_SESSION),"</pre>";
    $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['fid']);
    if(!isset($_REQUEST['fid']) || $fooderid==''){
        $session->redirect('home',mobile);
    } 
    $cookie = $_COOKIE['mobile_basket'];
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $fooder_details = $all_dishes['0'];
    
    //$get_discount = $db->run("CALL getDiscount('$fooderid')")->fetchAll();
    //echo "<pre>",print_r($fooder_details),"</pre>";

    $daily_hrs = unserialize($fooder_details['daily_hrs']);
    if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
      $eaterid = $_SESSION['id'];
      $all_cart = $db->run("CALL foodBasketId('$eaterid','$fooderid')")->fetchAll();
    }else{
      $all_cart = $db->run("CALL foodBasketCookie('$cookie','$fooderid')")->fetchAll(); 
    }
    //echo "<pre>",print_r($all_cart),"</pre>";
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
    if(is_array($all_dishes)){
        foreach($all_dishes as $dis){
            $product_type[$dis['productid']] = $dis['product_type'];
        }
    }
    if($fooder_details['gstin']!=''){ 
      if($fooder_details['tax1_value']>0){
        $cgst = ($fooder_details['tax1_value']/2);
        $sgst = ($fooder_details['tax1_value']/2);
        $cgst_tax = ($pricep*$cgst/100);
        $sgst_tax = ($pricep*$sgst/100);
      }else{
        $cgst_tax = 0;
        $sgst_tax = 0;
      }
    } 
    else{
      $cgst_tax = 0;
      $sgst_tax = 0;
      }
      if(trim($fooder_details['tax2_name'])!=""){
        if($fooder_details['tax2_value']>0){
        $service_charge = ($pricep*$fooder_details['tax2_value']/100);
        }else{
          $service_charge = 0;
        }
      }else{
        $service_charge = 0;
      }
    //echo "<pre>",print_r($fooder_details),"</pre>";
    ?>