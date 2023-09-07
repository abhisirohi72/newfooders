<?php 
if(isset($_REQUEST['basketdata'])){
   $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['basketdata']);
   $menuid = $feature->encrypt_decrypt('decrypt',$_REQUEST['mid']);
   $dishid = $feature->encrypt_decrypt('decrypt',$_REQUEST['pid']); 
   $pname = $feature->encrypt_decrypt('decrypt',$_REQUEST['pname']); 
   $fname = $feature->encrypt_decrypt('decrypt',$_REQUEST['fname']); 
   $price = $feature->encrypt_decrypt('decrypt',$_REQUEST['price']); 
   $proprice = $feature->encrypt_decrypt('decrypt',$_REQUEST['proprice']); 
   $cookie = $_COOKIE['mobile_basket'];
   $newqtyarr = array();
   if(isset($_SESSION['type']) && $_SESSION['type']=='eater')
		{
            $eaterid = $_SESSION['id'];
				$insert = $db->insert('food_basket',array('fooder_id'=>$fooderid,'fooder_name'=>$fname,'cookie_basket'=>$_COOKIE['mobile_basket'],'eater_id'=>$_SESSION['id'],'menu_id'=>$menuid,'product_id'=>$dishid,'product_name'=>$pname,'quantity'=>'1','product_price'=>$price,'product_proprice'=>$proprice,'eater_ip'=>$_SERVER['REMOTE_ADDR']));
            $lastid = $db->insert_id;
            $getqty = $db->get_var('food_basket',array('id'=>$lastid),'quantity');
                $all_cart = $db->run("CALL foodBasketId('$eaterid','$fooderid')")->fetchAll();
        }	
		else
		{	 
          $insert = $db->insert('food_basket',array('fooder_id'=>$fooderid,'fooder_name'=>$fname,'cookie_basket'=>$_COOKIE['mobile_basket'],'menu_id'=>$menuid,'product_id'=>$dishid,'product_name'=>$pname,'quantity'=>'1','product_price'=>$price,'product_proprice'=>$proprice,'eater_ip'=>$_SERVER['REMOTE_ADDR']));
         $lastid = $db->insert_id;
          $getqty = $db->get_var('food_basket',array('id'=>$lastid),'quantity');
           $all_cart = $db->run("CALL foodBasketCookie('$cookie','$fooderid','')")->fetchAll();
           if(is_array($all_cart)){
            $qty = 0;
            $pricep = 0;
          foreach($all_cart as $cart){
             if($cart['product_proprice']>0){
                 $price = $cart['product_proprice']*$cart['quantity'];
             }else{
                 $price = $cart['product_price']*$cart['quantity'];
             } 
             $pricep += $price;
             $qty +=  $cart['quantity']; 
          }
          $newqtyarr = array('totalqty'=>$qty,'totalprice'=>($currency_symbol.number_format($pricep,2)),'qty'=>($getqty),'checkoutlink'=>($link->link('checkout',mobile,'&fid='.$_REQUEST['basketdata'])));  
           } 
         }
         echo json_encode($newqtyarr);
        }
elseif(isset($_REQUEST['qtyPlus'])){
    $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['qtyPlus']);
    $menuid = $feature->encrypt_decrypt('decrypt',$_REQUEST['mid']);
    $dishid = $feature->encrypt_decrypt('decrypt',$_REQUEST['pid']); 
    $pname = $feature->encrypt_decrypt('decrypt',$_REQUEST['pname']); 
    $fname = $feature->encrypt_decrypt('decrypt',$_REQUEST['fname']); 
    $price = $feature->encrypt_decrypt('decrypt',$_REQUEST['price']); 
    $proprice = $feature->encrypt_decrypt('decrypt',$_REQUEST['proprice']); 
    $cookie = $_COOKIE['mobile_basket'];
    $page = $_REQUEST['page'];
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $fooder_details = $all_dishes['0'];
    $newqtyarr = array();
    if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
             $eaterid = $_SESSION['id'];
             $check_exist = $db->get_row('food_basket',array('eater_id'=>$_SESSION['id'],'fooder_id'=>$fooderid,'product_id'=>$dishid),array('quantity','product_price','product_proprice'));
          	if($check_exist['quantity']>0){
     		     $update = $db->update('food_basket',array('quantity'=>$check_exist['quantity']+1),array('eater_id'=>$_SESSION['id'],'fooder_id'=>$fooderid,'product_id'=>$dishid));
             }
             $all_cart = $db->run("CALL foodBasketId('$eaterid','$fooderid')")->fetchAll();  
        }	
         else
         {	
     	$check_exist = $db->get_row('food_basket',array('cookie_basket'=>$_COOKIE['mobile_basket'],'fooder_id'=>$fooderid,'product_id'=>$dishid),array('quantity','product_price','product_proprice'));
        if($check_exist['quantity']>0){
       $update = $db->update('food_basket',array('quantity'=>$check_exist['quantity']+1),array('cookie_basket'=>$_COOKIE['mobile_basket'],'fooder_id'=>$fooderid,'product_id'=>$dishid));
        }
        $all_cart = $db->run("CALL foodBasketCookie('$cookie','$fooderid','')")->fetchAll();
         }
         if(is_array($all_cart)){
            $qty = 0;
            $pricep = 0;
          foreach($all_cart as $cart){
             if($cart['product_proprice']>0){
                 $price = $cart['product_proprice']*$cart['quantity'];
             }else{
                 $price = $cart['product_price']*$cart['quantity'];
             } 
             $pricep += $price;
             $qty +=  $cart['quantity']; 
          }
         if(isset($page) && $page=='checkout'){
            if($check_exist['product_proprice']>0){
               $pricecheck = $check_exist['product_proprice']*($check_exist['quantity']+1);
           }else{
               $pricecheck = $check_exist['product_price']*($check_exist['quantity']+1);
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
       
         $topay = $currency_symbol.number_format(($pricep+$service_charge+$cgst_tax+$sgst_tax),2);
         $newqtyarr = array('totalqty'=>$qty,'totalprice'=>($currency_symbol.number_format($pricep,2)),'qty'=>($check_exist['quantity']+1),'qtyprice'=>($currency_symbol.number_format($pricecheck,2)),'gtotal'=>$feature->encrypt_decrypt('encrypt',$pricep),'service_charge'=>$currency_symbol.number_format($service_charge,2),'cgst'=>$currency_symbol.number_format($cgst_tax,2),'sgst'=>$currency_symbol.number_format($sgst_tax,2),'topay'=>$topay,'checkoutlink'=>($link->link('checkout',mobile,'&fid='.$_REQUEST['qtyPlus'])));
         }else{ 
         $newqtyarr = array('totalqty'=>$qty,'totalprice'=>($currency_symbol.number_format($pricep,2)),'qty'=>($check_exist['quantity']+1),'checkoutlink'=>($link->link('checkout',mobile,'&fid='.$_REQUEST['qtyPlus'])));
         }        
           }
           echo json_encode($newqtyarr);
 }
 elseif(isset($_REQUEST['qtyMinus'])){
    $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['qtyMinus']);
    $menuid = $feature->encrypt_decrypt('decrypt',$_REQUEST['mid']);
    $dishid = $feature->encrypt_decrypt('decrypt',$_REQUEST['pid']); 
    $pname = $feature->encrypt_decrypt('decrypt',$_REQUEST['pname']); 
    $fname = $feature->encrypt_decrypt('decrypt',$_REQUEST['fname']); 
    $price = $feature->encrypt_decrypt('decrypt',$_REQUEST['price']); 
    $proprice = $feature->encrypt_decrypt('decrypt',$_REQUEST['proprice']); 
    $cookie = $_COOKIE['mobile_basket'];
    $page = $_REQUEST['page'];
    $newqtyarr = array();
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $fooder_details = $all_dishes['0'];
    //$fooder_details = $db->run("CALL fooderDetails('$fooderid')")->fetch();
    if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
             $eaterid = $_SESSION['id'];
             $check_exist = $db->get_row('food_basket',array('eater_id'=>$_SESSION['id'],'fooder_id'=>$fooderid,'product_id'=>$dishid),array('quantity','product_price','product_proprice'));
             if($check_exist['quantity']=='1'){
                $db->delete('food_basket',array('cookie_basket'=>$_COOKIE['mobile_basket'],'fooder_id'=>$fooderid,'product_id'=>$dishid));
             }
             if($check_exist['quantity']>1){
     		       $update = $db->update('food_basket',array('quantity'=>$check_exist['quantity']-1),array('eater_id'=>$_SESSION['id'],'fooder_id'=>$fooderid,'product_id'=>$dishid));
             }
                $all_cart = $db->run("CALL foodBasketId('$eaterid','$fooderid')")->fetchAll();  
            }	
         else
         {	
            $check_exist = $db->get_row('food_basket',array('cookie_basket'=>$_COOKIE['mobile_basket'],'fooder_id'=>$fooderid,'product_id'=>$dishid),array('quantity','product_price','product_proprice'));
            if($check_exist['quantity']=='1'){
            $db->delete('food_basket',array('cookie_basket'=>$_COOKIE['mobile_basket'],'fooder_id'=>$fooderid,'product_id'=>$dishid));
        }
        if($check_exist['quantity']>1){
          $update = $db->update('food_basket',array('quantity'=>$check_exist['quantity']-1),array('cookie_basket'=>$_COOKIE['mobile_basket'],'fooder_id'=>$fooderid,'product_id'=>$dishid));
        }
            $all_cart = $db->run("CALL foodBasketCookie('$cookie','$fooderid','')")->fetchAll();
         }
         if(is_array($all_cart)){
            $qty = 0;
            $pricep = 0;
          foreach($all_cart as $cart){
             if($cart['product_proprice']>0){
                 $price = $cart['product_proprice']*$cart['quantity'];
             }else{
                 $price = $cart['product_price']*$cart['quantity'];
             } 
             $pricep += $price;
             $qty +=  $cart['quantity']; 
          }
          if(isset($page) && $page=='checkout'){
            if($check_exist['product_proprice']>0){
               $pricecheck = $check_exist['product_proprice']*($check_exist['quantity']-1);
           }else{
               $pricecheck = $check_exist['product_price']*($check_exist['quantity']-1);
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
       
         $topay = $currency_symbol.number_format(($pricep+$service_charge+$cgst_tax+$sgst_tax),2);
         $newqtyarr = array('totalqty'=>$qty,'totalprice'=>($currency_symbol.number_format($pricep,2)),'qty'=>($check_exist['quantity']-1),'qtyprice'=>($currency_symbol.number_format($pricecheck,2)),'gtotal'=>$feature->encrypt_decrypt('encrypt',$pricep),'service_charge'=>$currency_symbol.number_format($service_charge,2),'cgst'=>$currency_symbol.number_format($cgst_tax,2),'sgst'=>$currency_symbol.number_format($sgst_tax,2),'topay'=>$topay,'checkoutlink'=>($link->link('checkout',mobile,'&fid='.$_REQUEST['qtyMinus'])));
         }else{ 
         $newqtyarr = array('totalqty'=>$qty,'totalprice'=>($currency_symbol.number_format($pricep,2)),'qty'=>($check_exist['quantity']-1),'checkoutlink'=>($link->link('checkout',mobile,'&fid='.$_REQUEST['qtyMinus'])));
         } 
        }
          echo json_encode($newqtyarr);
 }
 elseif(isset($_REQUEST['fooderPage'])){
     $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['fooderPage']);
     $search = $_REQUEST['search'];
     $dishType = $_REQUEST['dishtype'];
     $menuids = $_REQUEST['menuids'];
     $query = "select f.fooder_id,f.name as foodername,f.mobile,f.address,f.location,f.location_name,fd.status,fd.type,fd.daily_hrs,fd.logo,fp.id as productid,fp.name as productname,fp.picture,fp.price,fp.proprice,fp.product_type,fp.tags,fp.description,fda.city,fda.state,fp.status as productstatus,fp.menu_id,fm.name as menuname from `fooders` as f, `fooders_details` as fd, `fooders_products` as fp,`delivery_areas` as fda,`fooders_menus` as fm where f.fooder_id=fd.fooder_id and f.fooder_id=fp.fooder_id and f.location=fda.id and f.fooder_id='$fooderid' and fm.fooder_id=fp.fooder_id and fm.id=fp.menu_id and fm.status='1' and fp.status='1' and f.is_approved='2' "; 
     if(isset($_REQUEST['search']) && trim($_REQUEST['search'])!=''){
        $query .= " AND fp.name like '%$search%' ";
     }
     if(isset($dishType) && $dishType!=''){
      $expdt = explode(',',$dishType);
      if(is_array($expdt)){
         $qd='';
         $query .= "AND ( ";
         foreach($expdt as $dt){
           $qd .= " fp.product_type= '$dt' OR ";  
         }
         $query .= rtrim($qd, " OR ");
         $query .= ") "; 
      }
    }
     if(isset($menuids) && $menuids!=''){
       $expmenu = explode(',',$menuids);
       $expfilter = array_filter($expmenu);
       if(is_array($expfilter)){
          $q='';
          $query .= "AND ( ";
          foreach($expfilter as $m){
            $q .= " fm.id= '$m' OR ";  
          }
          $query .= rtrim($q, " OR ");
          $query .= ") "; 
       }

     }
     $filterdish = $db->run($query)->fetchAll();
     $cookie = $_COOKIE['mobile_basket'];
     if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
      $eaterid = $_SESSION['id'];
      $all_cart = $db->run("CALL foodBasketId('$eaterid','$fooderid')")->fetchAll();
    }else{
      $all_cart = $db->run("CALL foodBasketCookie('$cookie','$fooderid','')")->fetchAll(); 
    }
    $newarrcart = array();
    if(is_array($all_cart)){
      $qty = 0;
      $pricep = 0;
       foreach($all_cart as $cart){
         $newarrcart[$cart['product_id']]['qty']=$cart['quantity']; 
         if($cart['product_proprice']>0){
            $price = $cart['product_proprice']*$cart['quantity'];
        }else{
            $price = $cart['product_price']*$cart['quantity'];
        } 
        $pricep += $price;
        $qty +=  $cart['quantity']; 
       }
    }

     $item = array();
     if(is_array($filterdish)){
      foreach($filterdish as $dish){
         $item[$dish['menu_id']][]=$dish['productid'];
      }}
     $newarr = array();
     if(is_array($filterdish)){
        foreach($filterdish as $dish){
         $encfid = $feature->encrypt_decrypt('encrypt',$dish['fooder_id']);
         $encpid = $feature->encrypt_decrypt('encrypt',$dish['productid']);
         $encmid = $feature->encrypt_decrypt('encrypt',$dish['menu_id']);
         $encpname = $feature->encrypt_decrypt('encrypt',$dish['productname']);
         $encfname = $feature->encrypt_decrypt('encrypt',$dish['foodername']);
         $encprice = $feature->encrypt_decrypt('encrypt',$dish['price']);
         $encproprice = $feature->encrypt_decrypt('encrypt',$dish['proprice']);

         if($dish['product_type']=='1'){
            $ptype = '<span class="badge badge-danger">Non Veg</span>';
         }else{
            $ptype = '<span class="badge badge-success">Veg</span>';
         }
         if(file_exists(SERVER_ROOT . '/uploads/fooders/' . $fooderid . '/product/'.$dish['picture']) && $dish['picture']!=''){
            $dishimage = SITE_URL.'/uploads/fooders/' . $fooderid . '/product/'.$dish['picture'];
         }else{ 
            $dishimage = '';  
         } 
         $menuname = $feature->textstyler($dish['menuname'],1);
         $productname = $feature->textstyler($dish['productname'],1);
          $newarr[$menuname.'___'.count((array)$item[$dish['menu_id']])][] = array('fooderid'=>$dish['fooder_id'],'productid'=>$dish['productid'],'productname'=>$productname,'product_type'=>$ptype,'price'=>($currency_symbol.' '.$dish['price']),'proprice'=>($currency_symbol.' '.$dish['proprice']),'image'=>$dishimage,'encfid'=>$encfid,'encpid'=>$encpid,'encmid'=>$encmid,'encpname'=>$encpname,'encfname'=>$encfname,'encprice'=>$encprice,'encproprice'=>$encproprice,'cartQty'=>$newarrcart[$dish['productid']]['qty']);
        }
     }  
     echo json_encode($newarr);
 }
 elseif(isset($_REQUEST['cousineFilter'])){
    $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['cousineFilter']);
    $allcat = $db->run("CALL searchDishes('$fooderid')")->fetchAll(); 
    $newcatarr = array();
    $catarr = array();
    if(is_array($allcat)){
       foreach($allcat as $cat){
         $catarr[$cat['menu_id']][] = $cat['menuname'];  
       }
    }
    
    if(is_array($catarr)){
       foreach($catarr as $key=>$val){
          $newcatarr[] = array('menuid'=>$key,'menu_name'=>$val['0'],'pcount'=>count((array)$catarr[$key])); 
       }
    }
echo json_encode($newcatarr);
 }
 elseif(isset($_REQUEST['promoApply'])){
    $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['promoApply']);
    $promocode = $_REQUEST['promocode'];
    $grandtotal = $feature->encrypt_decrypt('decrypt',$_REQUEST['grandtotal']);
    $today = date('d-m-Y',time());
    $getpromo = $db->run("CALL getDiscount('$fooderid','$promocode')")->fetch(); 
    //echo "<pre>",print_r($getpromo),"</pre>";
    //exit;
    $newdicountarr = array();
    $today = strtotime(date('d-m-Y'));
    if($getpromo==''){
      $newdicountarr = array('error'=>'1','message'=>'Promocode is invalid'); 
    }elseif($today<strtotime($getpromo['start_date']) || strtotime($today>$getpromo['expiry_date'])){
      $newdicountarr = array('error'=>'1','message'=>'Promocode is invalid'); 
    }else{
    //$getpromo = $getpromo['0'];
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $fooder_details = $all_dishes['0'];
   
    if(is_array($getpromo)){
       $discount_type = $getpromo['discount_type'];
       $amount = $getpromo['amount'];
       $minimum_order = $getpromo['minimum_order_amount'];
       //echo $minimum_order.'------'.$grandtotal;
       if($minimum_order>$grandtotal){
         $newdicountarr = array('error'=>'1','message'=>'This promocode is valid for minimum order of '.$currency_symbol.' '.number_format($minimum_order,2).'. So please add more items of amount '.$currency_symbol.' '.number_format(($minimum_order-$grandtotal),2)); 
       }else{

          if($discount_type=='1'){
             $discount = ($grandtotal*$getpromo['amount']/100);
          }else{
             $discount = $getpromo['amount'];
          }
         $after_discount = $grandtotal-$discount;

         if($fooder_details['gstin']!=''){ 
            if($fooder_details['tax1_value']>0){
              $cgst = ($fooder_details['tax1_value']/2);
              $sgst = ($fooder_details['tax1_value']/2);
              $cgst_tax = ($after_discount*$cgst/100);
              $sgst_tax = ($after_discount*$sgst/100);
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
              $service_charge = ($after_discount*$fooder_details['tax2_value']/100);
              }else{
                $service_charge = 0;
              }
            }else{
              $service_charge = 0;
            }
            $topay = $currency_symbol.number_format(($after_discount+$service_charge+$cgst_tax+$sgst_tax),2); 
            $newdicountarr = array('error'=>'0','service_charge'=>$currency_symbol.number_format($service_charge,2),'cgst'=>$currency_symbol.number_format($cgst_tax,2),'sgst'=>$currency_symbol.number_format($sgst_tax,2),'topay'=>$topay,'discount_amount'=>$currency_symbol.$discount,'discount_type'=>$discount_type,'discount'=>$getpromo['amount']);
       }
    }
  }
  echo json_encode($newdicountarr);
 }
 elseif(isset($_REQUEST['sendOtp'])){
   $name = $_REQUEST['sendOtp'];
   $mobile = $_REQUEST['phone'];
   $otp = $feature->generateOtp(4);
   if($db->exists('eaters',array('mobile'=>$mobile))){
    $insert = $db->update('eaters',array('name'=>$name,'otp'=>$otp,'status'=>'0'),array('mobile'=>$mobile));
    $lastinsertid = $db->get_var('eaters',array('mobile'=>$mobile),'eater_id');
   }else{
   $insert = $db->insert('eaters',array('name'=>$name,'mobile'=>$mobile,'otp'=>$otp,'joining_date'=>time(),'joining_ip'=>$_SERVER['REMOTE_ADDR']));
   $lastinsertid = $db->insert_id;
   }
   if($insert){
     echo $feature->encrypt_decrypt('encrypt',$lastinsertid);
   }else{
     echo trim('error');
   }

 }
 elseif(isset($_REQUEST['verifyOtp'])){
   $eaterid = $feature->encrypt_decrypt('decrypt',$_REQUEST['verifyOtp']);
   $otp = $_REQUEST['otp1'].$_REQUEST['otp2'].$_REQUEST['otp3'].$_REQUEST['otp4'];
   
   if($db->exists('eaters',array('eater_id'=>$eaterid,'otp'=>$otp))){
   $update = $db->update('eaters',array('status'=>'1'),array('eater_id'=>$eaterid,'otp'=>$otp));    
   $get_eater_data = $db->get_row('eaters',array('eater_id'=>$eaterid,'otp'=>$otp));
   if($update){
    $session->Open ();
    if ($session->Check ()) {
      $_SESSION ['type'] = "eater";
      $_SESSION ['id'] = $eaterid;
      $_SESSION ['eater_name'] = $get_eater_data ['name'];
      $_SESSION ['eater_mobile'] = $get_eater_data ['mobile'];
      $_SESSION ['eater_joining_date'] = $get_eater_data ['joining_date'];
      $_SESSION ['eater_joining_ip'] = $get_eater_data ['joining_ip'];
      $update_eater = $db->update('food_basket',array('eater_id'=>$get_eater_data['eater_id']),array('cookie_basket'=>$_COOKIE['mobile_basket']));
      echo trim('success');
      if($update_eater){
       
     }else{
       
     }
      // if($db->exists('food_basket',array('eater_id'=>$get_eater_data ['eater_id'])))
      // {
      // $db->update('food_basket',array('cookie_basket'=>$_COOKIE['eater_basket']),array('eater_id'=>$get_eater_data['eater_id']));	
      // $count=$db->run("SELECT id ,product_id, COUNT(*) as count FROM food_basket where eater_id=".$get_eater_data['eater_id']." GROUP BY product_id")->fetchAll();
      
      // foreach($count as $c){
      //                 if($c['count']>1){
      //                $db->delete('food_basket',array('eater_id'=>$get_eater_data['eater_id'],'product_id'=>$c['product_id']));
      //                   }
      //                 }
      
      
      // }
      
    }
   }

   }else{
     echo trim('error');
   }
 }
 elseif(isset($_REQUEST['callWaiter'])){
   $fooderid = $_REQUEST['callWaiter'];
   $table = $_REQUEST['table'];
   //$path = 'uploads/callwaiter.json';
  //  $decdata = array();
  //  if(file_exists($path)){
  //    $getdata = file_get_contents($path);
  //    $decdata = json_decode($getdata,true);
  //  } 
   //$arr = array('fooder_id'=>$fooderid,'table'=>$table);
   //array_push($decdata,$arr);
   //file_put_contents('uploads/callwaiter.json',json_encode($arr).PHP_EOL,FILE_APPEND);

   //echo "fdgdfgdf";
   //echo "<pre>",print_r($decdata),"</pre>";

$data=array('fooderid'=>$fooderid,'table'=>$table,'msg'=>'data avaiable');

   $curl = curl_init();

   curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://alertify.live/send_data',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS =>json_encode($data),
     CURLOPT_HTTPHEADER => array(
       'Content-Type: application/json'
     ),
   ));
   
   $response = curl_exec($curl);
   
   curl_close($curl);
   echo $response;



 }
 elseif(isset($_REQUEST['userLocation'])){
   $fid = $_REQUEST['userLocation'];
   $fooderlat = $db->get_row('fooders',array('fooder_id'=>$fid),array('latitude','longitude','perimeter'));
   $tableno = $_REQUEST['tableno'];
   $tunique = $_REQUEST['tunique'];
   $lat = $_REQUEST['lat'];
   $lng = $_REQUEST['lng'];
   $geotime = $_REQUEST['time'];
   
   function haversineGreatCircleDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
  {
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);
  
    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;
  
    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
      cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
  }
   
   $distance = haversineGreatCircleDistance($fooderlat['latitude'],$fooderlat['longitude'],$lat,$lng);
   $distance = round($distance,0);
//    echo "<pre>";
//    print_r($fooderlat);
//    echo "</pre>";
    //echo "---".$distance."=============".$fooderlat['perimeter']."----lat:".$lat."---lng:".$lng;
 //exit;
   if($distance<=$fooderlat['perimeter']){
     $insert = $db->insert('fooders_user_location',array('fooder_id'=>$fid,'table_uniqueid'=>$tunique,'table_no'=>$tableno,'lat'=>$lat,'lng'=>$lng,'geotime'=>$geotime,'created_date'=>time(),'ip'=>$_SERVER['REMOTE_ADDR']));
     if($insert){
       $_SESSION['tableno'] = $tableno;
       $_SESSION['tableuniqueid'] = $tunique;
       echo 1;
     }
   }else{
    echo 0;
   }
 }
?>