<?php
if($_REQUEST['basketdata'] || $_REQUEST['cookiedata'] && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
	$cookiedata= base64_decode($_REQUEST['cookiedata']);
	$basketdata= base64_decode($_REQUEST['basketdata']);
	$cookie=$_COOKIE['eater_basket'];
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	if ($return['error'] === false){
        //if clicked from header then cookiedata is not null or blank
		
		if(isset($basketdata) && $cookiedata==='')
		{
		$basket_data = explode('_',$basketdata);

		if(isset($_SESSION['type']) && $_SESSION['type']=='eater')
		{
			$check_exist = $db->get_col('food_basket',array('eater_id'=>eater_id,'fooder_id'=>$basket_data['2'],'product_id'=>$basket_data['0']),'quantity');
			
			if(count($check_exist)!=0)
			$db->update('food_basket',array('quantity'=>$check_exist['0']+1),array('eater_id'=>eater_id,'fooder_id'=>$basket_data['2'],'product_id'=>$basket_data['0']));
			else
			{
				$db->insert('food_basket',array('fooder_id'=>$basket_data['2'],'fooder_name'=>$basket_data['6'],'cookie_basket'=>$_COOKIE['eater_basket'],'eater_id'=>eater_id,'menu_id'=>$basket_data['1'],'product_id'=>$basket_data['0'],'product_name'=>$basket_data['3'],'quantity'=>'1','product_price'=>$basket_data['4'],'product_proprice'=>$basket_data['5'],'eater_ip'=>$_SERVER['REMOTE_ADDR']));
			}
		}	
		else
		{	
		$check_exist = $db->get_col('food_basket',array('cookie_basket'=>$_COOKIE['eater_basket'],'fooder_id'=>$basket_data['2'],'product_id'=>$basket_data['0']),'quantity');
	   if(count($check_exist)!=0)
	   $db->update('food_basket',array('quantity'=>$check_exist['0']+1),array('cookie_basket'=>$_COOKIE['eater_basket'],'fooder_id'=>$basket_data['2'],'product_id'=>$basket_data['0']));
	   else
	   {	$db->insert('food_basket',array('fooder_id'=>$basket_data['2'],'fooder_name'=>$basket_data['6'],'cookie_basket'=>$_COOKIE['eater_basket'],'eater_id'=>eater_id,'menu_id'=>$basket_data['1'],'product_id'=>$basket_data['0'],'product_name'=>$basket_data['3'],'quantity'=>'1','product_price'=>$basket_data['4'],'product_proprice'=>$basket_data['5'],'eater_ip'=>$_SERVER['REMOTE_ADDR']));
	   }
		
		}
	   }
		if(isset($_SESSION['type'])){
		$db->order_by="`last_updated` DESC";
			$get_all_basket = $db->run("select f.*, d.delivery_time,d.minimum_order, d.delivery_charges, d.vat , d.service_charge,d.tax1_name,d.tax2_name,d.tax1_value,d.tax2_value, d.delivery_areas, d.facilities, d.fooder_id from `food_basket` as f join `fooders_details` as d on f.fooder_id=d.fooder_id where f.eater_id='".eater_id."'")->fetchAll();
			$result = array();
			if(is_array($get_all_basket)){
			foreach ($get_all_basket as $data) {
				$id = $data['fooder_name'];
				if (isset($result[$id])) {
					$result[$id][] = $data;
				} else {
					$result[$id] = array($data);
				}
			}
			}
		}
		else{
			
			
			$db->order_by="`last_updated` DESC";
			$get_all_basket = $db->run("select f.*, d.delivery_time,d.minimum_order, d.delivery_charges, d.vat , d.tax1_name,d.tax2_name,d.tax1_value,d.tax2_value,d.service_charge, d.delivery_areas, d.facilities, d.fooder_id from `food_basket` as f join `fooders_details` as d on f.fooder_id=d.fooder_id where f.cookie_basket='$cookie'")->fetchAll();
			$result = array();
			if(is_array($get_all_basket)){
			foreach ($get_all_basket as $data) {
				$id = $data['fooder_name'];
				if (isset($result[$id])) {
					$result[$id][] = $data;
				} else {
					$result[$id] = array($data);
				}
			}
			}
			
		}
		if(count($result)!=0){
	$return['msg'] .= '
		<div class="md-modal md-effect-2 modal-width" id="modal-2" style="top:52%;">
	<div class="md-content">
		<h3 style="background:#000;">YOUR FOOD BASKET <i class="icon-remove right-float basket-remove-icon md-close"></i></h3>
		<div class="md-modal md-effect-5 modal-basket-loader" id="modal-5" style="padding:0px;">
	    <div class="md-content modal-basket-content">
		<div style="padding:0px;padding-left: 10px;">
		<div class="row-fluid">
		<div class="span12">
		<div class="span2"><img src="'.SITE_URL.'/assets/eaters/img/loader.gif"></div>
		<div class="span10 modal-basket-text">Processing...</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		<div class="md-overlay"></div>
		
		<div style="padding-left:0px;padding-right:0px;padding-bottom:0px;padding-top:0px;"><div class="basket-scrollbar">';
	    if(is_array($result)){
	    	$ftotal=0;
	    	$non_delivery_fooder=array();
	    	$post_fooder_id =array();
	    	$post_subtotal =array();
		foreach($result as $key=>$val){
		$getfooderid_once=1;
		
	     if(is_array($val)){
	     	
	     		//$val['0'] = $db->get_row('fooders_details',array('fooder_id'=>$basket['fooder_id']),array('delivery_time','minimum_order','delivery_charges','vat','service_charge','delivery_areas','facilities','fooder_id'));
	     		 
	     		 
	     		$post_fooder_id[] = $val['0']['fooder_id'];
	     		$return['msg'] .='
	     		<div class="fooder-id" id="'.$val['0']['fooder_id'].'">
	     		<div class="row-fluid"><div class="span12">';
	     		if($session->Check () && $_SESSION ['type'] === 'eater'){
	     		
	     				$return ['msg'] .= '<div class="row-fluid basket-fooder-name-modal">
	     				<div class="span12">
	     				<div class="span6" style="padding-left:10px;"><i class="icon-home basket-fooder-name"></i>
	     				<a class="basket-fooder-name"  href="'.$link->link('fooder&fooder_profile_token='.$val['0']['fooder_id']).'">'.$key.'</a>
	     				</div><div class="span3 basket-fooder-name">
	     				<i class="icon-shopping-cart"></i>  Minimum Order &nbsp;<span style="color:#009DFF;">'.currency.' '.$val['0']['minimum_order'].'</span></div>
	     				<div class="span3 basket-fooder-name"><i class="icon-time basket-time-icon" title="Delivery Time"></i>  Delivery Time';
	     				if($val['0']['delivery_time']==0){
	     					$return['msg'] .= '&nbsp; <span style="color:#009DFF;">Not Set</span>';
	     				}
	     				else{
	     					$return['msg'] .= '<span style="color:#009DFF;">  '.$val['0']['delivery_time'].' min.</span>';
	     				}
	     			
	     		}
	     		else{
	     			$return ['msg'] .= '<div class="row-fluid basket-fooder-name-modal">
	     			<div class="span12">
	     			<div class="span6" style="padding-left:10px;"><i class="icon-home basket-fooder-name"></i>
	     			<a class="basket-fooder-name"  href="'.$link->link('fooder&fooder_profile_token='.$val['0']['fooder_id']).'">'.$key.'</a>
	     			</div><div class="span3 basket-fooder-name">
	     			<i class="icon-shopping-cart"></i>  Minimum Order &nbsp;<span style="color:#009DFF;">'.currency.' '.$val['0']['minimum_order'].'</span></div>
	     			<div class="span3 basket-fooder-name"><i class="icon-time basket-time-icon" title="Delivery Time"></i>  Delivery Time';
	     			if($val['0']['delivery_time']==0){
	     				$return['msg'] .= '&nbsp; <span style="color:#009DFF;">Not Set</span>';
	     			}
	     			else{
	     				$return['msg'] .= '<span style="color:#009DFF;">  '.$val['0']['delivery_time'].' min.</span>';
	     			}
	     		}
	     		 
	     		 
	     	
	     		$return['msg'] .= '</div></div></div>
	     		<br>
	     		<div class="row-fluid basket-font-size" style="color:#959595;">
	     		<div class="span12">
	     		<div class="span3">
	     		Item
	     		</div>
	     		<div class="span2 center">
	     		Qty
	     		</div>
	     		<div class="span2 center">
	     		Price
	     		</div>
	     		<div class="span3 center">
	     		Sub total
	     		</div>
	     		<div class="span2"></div>
	     		</div>
	     		</div>
	     		<div class="basket-hr"></div><br><div class="count-basket-val_'.$val['0']['fooder_id'].'">
	     		';
	     	
	     	
	     	$subtotal=0;
	           foreach ($val as $basket) {
	 
	$return['msg'] .='
				<div class="main_'.$basket['product_id'].'">
				<div class="row-fluid modal-bg basket-font-size-pro">
				<div class="span12">
				<div class="span3">
				<h4>'.$basket['product_name'].'</h4>
				</div>
				<div class="span2 center">
				
				<input class="basket-qty" type="text" name="qty" id="qty_'.$basket['product_id'].'" value='.$basket['quantity'].' pid="'.$basket['product_id'].'">
				<i class="icon-ok basket-delivery-icon basket-ok_'.$basket['product_id'].'" id="'.$basket['product_id'].'" foodid="'.$basket['fooder_id'].'"></i>
				</div>
				<div class="span2 center">';
	
				if($basket['product_proprice']!="0"){
				$return['msg'] .= currency.' '.$basket['product_proprice'].'<sup>*</sup>&nbsp;&nbsp; '.currency.' <strike>'.$basket['product_price'].'</strike>';
				}
				else{
					$return['msg'] .= currency.' '.$basket['product_price'].'';
				}
				
			 $return['msg'] .=	'</div><div class="span3 center">';
				if($basket['product_proprice']!=0){
					$return['msg'] .= currency.' <i class="basket-price_'.$basket['product_id'].'" id="'.$basket['product_proprice'].'"></i><span class="pprice_'.$basket['product_id'].'">'.$basket['product_proprice']*$basket['quantity'].'</span>';
					$subtotal=$subtotal+$basket['product_proprice']*$basket['quantity'];
				}
				else{
					$return['msg'] .= currency.' <i class="basket-price_'.$basket['product_id'].'" id="'.$basket['product_price'].'"></i><span class="pprice_'.$basket['product_id'].'">'.$basket['product_price']*$basket['quantity'].'</span>';
					$subtotal= $subtotal+$basket['product_price']*$basket['quantity'];
					
				}  
	      
				
				$return['msg'] .='</div>
				<div class="span2"><i class="icon-remove delete-basket" id ='.$basket['product_id'].' rel='.$val['0']['fooder_id'].'></i></div>
				</div>
				</div>
				<br>
				<hr class="dotted"><br></div>';
				
	      }
	      }
	      $return['msg'] .= '</div><div class="row-fluid modal-bg basket-font-size-pro"><div class="span12">
	     <div class="span5"></div>
	      <div class="span7" style="padding-left:45px;">
	      <div class="row-fluid"><div class="span12">
	      <div class="span4 right"><h4>Subtotal</h4></div>
	      <div class="span3 basket-inr-right">'.currency.'
	      <span class="basket-subtotal_'.$basket['fooder_id'].'">'.$subtotal.'</span></div>
	      <div class="span5 basket-delivery-detail">';
	      $post_subtotal[] = $subtotal;
	      if($subtotal<$val['0']['minimum_order']){
	      $return['msg'] .= '<span class="basket-max-order mini-order_'.$basket['fooder_id'].'" id="'.$val['0']['minimum_order'].'">Add&nbsp;&nbsp;'.currency.' <span class="more_'.$basket['fooder_id'].'">'.($val['0']['minimum_order']-$subtotal).'</span> more</span>';
	      }
	      else{
	      	$return['msg'] .= '<span style="display:none;" class="basket-max-order mini-order_'.$basket['fooder_id'].'" id="'.$val['0']['minimum_order'].'">Add&nbsp;&nbsp;'.currency.' <span class="more_'.$basket['fooder_id'].'"></span> more</span>';
	      }
	      $return['msg'] .='</div></div></div>
	      <div class="row-fluid"><div class="span12"><div class="span4 basket-delivery-detail right"><i class="icon-truck  basket-delivery-icon" title="Delivery Charges"></i> Delivery Charges</div><div class="span4 basket-inr-right">';
	      
	      
	      if($val['0']['delivery_charges']==0){
	      	$return['msg'] .= '<span class="green"><b>FREE</b></span><span class="delivery-charge_'.$basket['fooder_id'].'" style="display:none;">0</span>';
	      }else{
	      	$return['msg'] .= currency.' <span class="delivery-charge_'.$basket['fooder_id'].'"> '.$val['0']['delivery_charges'].'</span>';
	      }
$ftotal=$ftotal+($subtotal+$val['0']['delivery_charges']+(($subtotal*$val['0']['service_charge'])/100)+(($subtotal*$val['0']['vat'])/100));
	      
	     $return['msg'] .= '</div><div class="span4"></div></div></div>
		  <div class="row-fluid"><div class="span12">
		  <div class="span4 basket-delivery-detail right service-charge_'.$basket['fooder_id'].'" id= "'.$val['0']['service_charge'].'"><i class="icon-plane  basket-delivery-icon" title="'.$val['0']['tax1_name'].'"></i> '.$val['0']['tax1_name'].' ('.$val['0']['tax1_value'].'%)
		  </div>
		  <div class="span4 basket-inr-right">'.currency.' <span class="scharge_'.$basket['fooder_id'].'">'.(($subtotal*$val['0']['service_charge'])/100).'</span></div>
		  <div class="span4"></div>
		  </div></div>
		  <div class="row-fluid"><div class="span12">
		  <div class="span4 basket-delivery-detail right vat-charge_'.$basket['fooder_id'].'" id="'.$val['0']['vat'].'"><i class="icon-legal  basket-delivery-icon" title="'.$val['0']['tax1_name'].'"></i> '.$val['0']['tax2_name'].' ('.$val['0']['tax2_value'].'%)</div>
		  <div class="span4 basket-inr-right">'.currency.' <span class="vat_'.$basket['fooder_id'].'">'.(($subtotal*$val['0']['vat'])/100).'</span></div>
		  <div class="span4"></div></div>
		  </div>		
          
<div class="row-fluid" style="background-color:#efeef4;padding-bottom:4px;padding-top:12px;">
<div class="span12">
<div class="span4 right"><h4>Total</h4></div>
		 
	     <div class="span3 basket-inr-right">'.currency.' 
	     <span class="total_'.$basket['fooder_id'].'">'.($subtotal+$val['0']['delivery_charges']+(($subtotal*$val['0']['service_charge'])/100)+(($subtotal*$val['0']['vat'])/100)).'</span></div>
	     <div class="span5"></div></div></div><br>';
	      $return['msg'] .= '</div>
	      
	      </div></div>
	      </div></div></div>';
	      
		}
		
	    }
	    $post_array=array_combine($post_fooder_id, $post_subtotal);
		$return['msg'] .='</div><div class="row-fluid basket-bottom-bg">
		<div class="span12"></div>
		<div class="row-fluid">
				<div class="span12">
				<div class="span5 basket-choose-option">Choose an option :</div>
		        <div class="span7 basket-estimate">Amount Payable : <span style="padding-left:55px;">'.currency.' <span class="fooder-total">'.ceil($ftotal).'</span></span></div>
				</div>
				</div>
				
				<div class="row-fluid">
				<div class="span12">
				<div class="span3 basket-choose-option">
				<label><input class="delivery_check" id='.serialize($post_array).' type="radio" name="delivery_takeout"> 
				<img  style="cursor:pointer;" class="delivery-empty" src='.SITE_URL."/assets/eaters/img/delivery-takeout/delivery-black.png".'>
				<img  class="delivery-selected" src='.SITE_URL."/assets/eaters/img/delivery-takeout/deliverykr.png".'>
				</label> 
				</div>
		        
		        <div class="span2">
		        <label>
		        <input type="radio" class="take_out_check" id='.serialize($post_array).' name="delivery_takeout"> 
		        <img  style="cursor:pointer;" class="takeout-empty" src='.SITE_URL."/assets/eaters/img/delivery-takeout/takeaway-black.png".' >
				<img   class="takeout-selected" src='.SITE_URL."/assets/eaters/img/delivery-takeout/takeaway.png".' style="display:none;">
			    </label>
			    </div>
				<div class="span6 green" style="margin-top:6px;font-size:1.3em;"><b>Need Help ? Call Us <i class="icon-phone" style="padding-top:5px;"></i> 0562-4055645 Or <a style="text-decoration:none;color:#fff;" href="'.$link->link('contact',eaters).'">Contact Us</a></b>
				</div>
				<div class="span1"></div>
				</div><div class="span12">
				</div></div></div>
				
				
				<div class="row-fluid" style="background:#efeef4">
				<div class="span12"></div>
				<div class="span12">
				<div class="span3">
				<button type="reset" name="order_cancel" id="cancel-order" style="font-size:1em;"><i class="icon-backward"></i> Continue add to cart</button>
				</div>
				
				<form method="post" id="form-place-order" action='.$link->link('basket_step2').'>
				<input type="hidden" name="place_order_ip" id="place_order_ip" value="'.$password->stringbreak($_SERVER['REMOTE_ADDR']).'">
				<input type="hidden" name="order_check" id="order_check" value="place_order_check">';
		 		if($_SESSION['type']=="eater"){
			$return['msg'] .= '<div class="span6 status"></div>
		        <div class="span3 place-order">
				<button type="submit" class="kr-button-warning btn-large" name="proceed" style="margin:0px;font-size:1.2em;"> Proceed  <i class="icon-forward" style="padding-top:3px;"></i></button>
				</div>';
				}
				else{
					$return['msg'] .= '<div class="span5"></div><div class="span4 status"></div>';
					
				}
			$return['msg']	.='<form>
				</div>
				</div>
				<div class="row-fluid" style="background:#efeef4"><div class="span12"></div></div>
				
	</div>
	
	</div></div>';
	}
$return['msg'] .='<div class="md-modal md-effect-6" id="modal-6">
	<div class="md-content">
		<h3>YOUR FOOD BASKET <i class="icon-remove md-pro md-close"></i></h3>
		<div>
		<div class="row-fluid blank-basket-msg"><div class="span12 center">There are no food items in this cart. </div></div> 
		<br>
		<div class="row-fluid blank-basket-msg"><div class="span12 center"><button type="reset" id="no-item">CONTINUE ADD TO CART</button> </div></div>
		
		</div></div></div>

		
 <div class="md-overlay"></div>
<script>

$(".place-order").hide();

$(".md-effect-2").addClass("md-show");
$(".md-overlay").click(function(){
		$(".md-effect-2").removeClass("md-show");
		$(".md-effect-6").removeClass("md-show");
		});
$(".md-close").click(function(){
		$(".md-effect-2").removeClass("md-show");
		$(".md-effect-6").removeClass("md-show");
	});
		
    $("#cancel-order").click(function(){
		$(".md-effect-2").removeClass("md-show");
		});
	$("#no-item").click(function(){
		$(".md-effect-6").removeClass("md-show");
		});
//  ====================================== Delete Food Basket Start ================================================ 			
$(".delete-basket").click(function(){
	$(".md-effect-5").addClass("md-show");
	$(".status").hide();
	$(".delivery_check").attr("checked", false);
	$(".delivery-empty").show();
	$(".delivery-selected").hide();
	$(".takeout-empty").show();
    $(".takeout-selected").hide();
	$(".take_out_check").attr("checked", false);
	$(".place-order").hide();
	var dbasket = $(this).attr("id");
	var fooderid = $(".fooder-id").attr("id"); 	
	var rel = $(this).attr("rel"); 
	var count_item = $(".count-basket-val_"+rel).children().length;
	
	  var qty_value = parseFloat($("#qty_"+dbasket).val());
      var qtydata = dbasket+"_"+rel+"_"+qty_value;
      var price = parseFloat($(".basket-price_"+dbasket).attr("id"));
      var subtotal = parseFloat($(".basket-subtotal_"+rel).text());
      var sub = parseFloat(price*qty_value);
      var subpre =  parseFloat($(".pprice_"+dbasket).text());
      var subtot=parseFloat(subtotal)-parseFloat(subpre);  
      var ser_charge = parseFloat($(".service-charge_"+rel).attr("id"));
      var service_charge = ((subtot*ser_charge)/100);
      var vat_charge = parseFloat($(".vat-charge_"+rel).attr("id"));
      var vat = ((subtot*vat_charge)/100);
      
      if(count_item==1){
       var delivery_charge = 0;
      }else{
      var delivery_charge = parseFloat($(".delivery-charge_"+rel).text());
     }
      var total_amount = subtot+delivery_charge+service_charge+vat;
      var ftotal = parseFloat($(".fooder-total").text()); 
      var sftotal =parseFloat($(".total_"+rel).text());
      var estimate_total_old = ftotal-sftotal+total_amount;
      var _round = Math.round;
      Math.round = function(number, decimals /* optional, default 0 */)
      {
      if (arguments.length == 1)
      return _round(number);
      multiplier = Math.pow(10, decimals);
      return _round(number * multiplier) / multiplier;
      }
    var estimate_total = Math.round(estimate_total_old, 0);  
      var mini_order = parseFloat($(".mini-order_"+rel).attr("id"));
      if(subtot<mini_order){
      var add_more =  mini_order-subtot;
      $(".mini-order_"+rel).show();
      }
      else{
	  $(".mini-order_"+rel).hide();
	  }
 	$.ajax({
	type: "POST",
	url: "'.$link->link("basket&delbasket=").'"+dbasket,
	cache:false,
	data: $(this).serialize(),
	dataType: "json",
	  success: function (data) {
	     
	    $(".pprice_"+dbasket).text(sub);
	    $(".basket-subtotal_"+rel).text(subtot);
		 $(".scharge_"+rel).text(service_charge);	   
		 $(".vat_"+rel).text(vat);
	     $(".total_"+rel).text(total_amount); 
	     $(".more_"+rel).text(add_more); 
	     $(".fooder-total").text(estimate_total); 
	
	    $(".md-effect-5").removeClass("md-show");
	    $(".main_"+dbasket).remove();
	     
	  	var basket_value = $("#basket-value").text();
	  	var basket_value = basket_value - 1;
	  	$("#basket-value").text(basket_value);
    if(basket_value==0){
	$(".md-effect-6").addClass("md-show");
	$(".md-effect-2").removeClass("md-show");
	}
    if(count_item==1){
	$("#"+rel).remove();
	}
	}
       });
	});
//============================================== Delete Food Basket End ===========================================	
var basket_value = $("#basket-value").text();
if(basket_value==0){
	$(".md-effect-6").addClass("md-show");
	$(".md-effect-2").removeClass("md-show");
	}
   
//============================================== Update Quantity Start ==================================================	 
	 $(".icon-ok").hide();
     $(".basket-qty").focus(function(){
	  var pid = $(this).attr("pid");
	  $(".basket-ok_"+pid).show();
	  $(".status").hide();
	  $(".delivery_check").attr("checked", false);
	  $(".delivery-empty").show();
	  $(".delivery-selected").hide();
	   $(".takeout-empty").show();
      $(".takeout-selected").hide();
	  $(".take_out_check").attr("checked", false);
	  $(".place-order").hide();
	});
$(".icon-ok").click(function(){
 
	  $(".status").hide();
	  $(".delivery_check").attr("checked", false);
	  $(".delivery-empty").show();
	  $(".delivery-selected").hide();
	  $(".takeout-empty").show();
      $(".takeout-selected").hide();
	  $(".take_out_check").attr("checked", false);
	  $(".place-order").hide();
      var product_id = parseFloat($(this).attr("id"));
      var foodid = parseFloat($(this).attr("foodid"));
      var qty_value = parseInt($("#qty_"+product_id).val());
      if(qty_value>=1 && qty_value%1==0){
           $(".md-effect-5").addClass("md-show");
           $(".icon-ok").hide();
           }
      var qtydata = product_id+"_"+foodid+"_"+qty_value;
      var price = parseInt($(".basket-price_"+product_id).attr("id"));
     
      var subtotal = parseFloat($(".basket-subtotal_"+foodid).text());
      var sub = parseFloat(price*qty_value);
      var subpre =  parseFloat($(".pprice_"+product_id).text());
      
      var subtot=parseFloat(subtotal)-parseFloat(subpre)+parseFloat(sub); 
      
      var ser_charge = parseFloat($(".service-charge_"+foodid).attr("id"));
      var service_charge = ((subtot*ser_charge)/100);
      var vat_charge = parseFloat($(".vat-charge_"+foodid).attr("id"));
      var vat = ((subtot*vat_charge)/100);
      var delivery_charge = parseFloat($(".delivery-charge_"+foodid).text());
      var total_amount = subtot+delivery_charge+service_charge+vat;
      
      var ftotal = parseFloat($(".fooder-total").text()); 
      var sftotal =parseFloat($(".total_"+foodid).text());
      var estimate_total_old = ftotal-sftotal+total_amount;
      var _round = Math.round;
      Math.round = function(number, decimals /* optional, default 0 */)
      {
      if (arguments.length == 1)
      return _round(number);
      multiplier = Math.pow(10, decimals);
      return _round(number * multiplier) / multiplier;
      }

      var estimate_total = Math.round(estimate_total_old, 0);
     
      var mini_order = parseFloat($(".mini-order_"+foodid).attr("id"));
      if(subtot<mini_order){
      var add_more =  mini_order-subtot;
      $(".mini-order_"+foodid).show();
      }
      else{
    var add_more = mini_order-subtot;
	$(".mini-order_"+foodid).hide();
	}
      $.ajax({
	  type: "POST",
	  url: "'.$link->link("basket&update-qty=").'"+qtydata,
	  async: true, /* If set to non-async, browser shows page as "Loading.."*/
      cache: false,	
	  data: $(this).serialize(),
	  dataType: "json",
	  beforeSend : function(xhr, opts){
        if(qty_value < 1 || qty_value%1!=0) //just an example
        {
            xhr.abort();
            $(".icon-ok").hide();
        }
    },
	  success: function (data) {
		$(".md-effect-5").removeClass("md-show");	
		   $(".pprice_"+product_id).text(sub);
	       $(".basket-subtotal_"+foodid).text(subtot);
		   $(".scharge_"+foodid).text(service_charge);	   
		   $(".vat_"+foodid).text(vat);
	       $(".total_"+foodid).text(total_amount); 
	       $(".more_"+foodid).text(add_more); 
	       
	       $(".fooder-total").text(estimate_total); 
	       $(".basket-ok_"+product_id).hide();
	    }
	});
	});
//============================================= Update Quantity End ===============================================	 
//============================================= Delivery Checked Start ================================================== 
$(".delivery_check").hide();

/*$(".deliver-hover").hover(
function(){ $(".delivery-selected").show();$(".delivery-empty").hide(); },
function(){ $(".delivery-selected").hide();$(".delivery-empty").show();}
	)
*/	
$(".delivery-selected").hide();

$(".delivery_check").click(function(){
	    
    $(".delivery-selected").show();
    $(".delivery-empty").hide();
    $(".takeout-empty").show();
    $(".takeout-selected").hide();
    $(".md-effect-5").addClass("md-show");
	$(".status").show();
	var delivery_fooder_ids = $(this).attr("id");
	
	 $.ajax({
	  type: "POST",
	  url: "'.$link->link("basket&delivery_fooderids=").'"+delivery_fooder_ids,
	  async: true, /* If set to non-async, browser shows page as "Loading.."*/
      cache: false,
	  data: $(this).serialize(),
	  dataType: "json",
	  success: function (data) {
	  $(".md-effect-5").removeClass("md-show");
		$(".status").html(data.msg);
		
	    }
	});

});	
	 
	
//============================================== Delivery Checked End =============================================
//============================================== Take Out Checked Start ===========================================
	$(".take_out_check").hide();
	$(".take_out_check").click(function(){
		    $(".delivery-empty").show();
		    $(".delivery-selected").hide();
		   	$(".takeout-empty").hide();
		    $(".takeout-selected").show();
			$(".md-effect-5").addClass("md-show");
			$(".status").show();
			var takeout_fooder_ids = $(this).attr("id");
			
			$.ajax({
			type: "POST",
			url: "'.$link->link("basket&takeout_fooderids=").'"+takeout_fooder_ids,
			async: true,
			cache:false,
			data: $(this).serialize(),
			dataType: "json",
			success: function (data) 
			{
			    $(".md-effect-5").removeClass("md-show");
				$(".status").html(data.msg);
			}
	    });
	});	
//=============================================== Take Out Checked End ============================================
		
</script>';
		}
	echo json_encode($return);
}


elseif($_REQUEST['delbasket'] && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
	
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	if ($return['error'] === false){
		if(isset($_SESSION['type']) && $_SESSION['type']=='eater')
		{
			$db->delete('food_basket',array('product_id'=>$_REQUEST['delbasket'],'eater_id'=>eater_id));
		}
		else
			$db->delete('food_basket',array('product_id'=>$_REQUEST['delbasket'],'cookie_basket'=>$_COOKIE['eater_basket']));
     
	}
	echo json_encode($return);
}

elseif($_REQUEST['update-qty'] && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
    $data = $_REQUEST['update-qty'];
    $data = explode('_',$data);
    
	//$data= $data['0'];
    $return = array();
	$return['msg'] = '';
	$return['error'] = false;
	if ($return['error'] === false){
		if(isset($_SESSION['type']) && $_SESSION['type']=='eater')
		{
	$db->update('food_basket',array('quantity'=>$data['2']),array('product_id'=>$data['0'],'eater_id'=>eater_id,'fooder_id'=>$data['1']));
		}
		else
		$db->update('food_basket',array('quantity'=>$data['2']),array('product_id'=>$data['0'],'cookie_basket'=>$_COOKIE['eater_basket'],'fooder_id'=>$data['1'])); 
	
	}
	echo json_encode($return);
}

elseif($_REQUEST['delivery_fooderids'] && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$cookie = $_COOKIE['eater_basket'];
	$fooders = $db->run("SELECT d.minimum_order, f.fooder_id , sum(case when (`product_proprice`=0) then (`quantity`*`product_price`) else (`quantity`*`product_proprice`)  end) as 'f.sum' FROM `food_basket` AS f join `fooders_details` AS d on d.fooder_id=f.fooder_id where f.cookie_basket='$cookie' group by f.fooder_id")->fetchAll();
	$valid_time = date('H:i:s',time());
	$mobile=eater_mobile;
	$address = eater_address;
	$ids=array();
	$min_order=array();
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	if ($return['error'] === false){
	 foreach($fooders as $fid){
	  if($fid['f.sum']<$fid['minimum_order'])
	  {
	  	$min_order[]=$fid['fooder_id'];
	  }
	 }
	 
	 if($session->Check () && $_SESSION ['type'] === 'eater'){
	 	if(empty($address)){
	 		$return['msg'] = '<span style="color:#C0392B;font-size:1.2em; font-weight:bold;">'.$_SESSION['eater_address'].' Please provide your address <a href="'.$link->link('eater_addresses',eaters).'">Click here</a></span>';
	 		$return['msg'] .= '<script>$(".place-order").hide();</script>';
	 	}
	 	
	 	
	 elseif(count($min_order)!=0)
	 {
	 	$return['msg'] = '<span style="color:#C0392B;font-size:1.2em; font-weight:bold;">'.count($min_order).' Fooder(s) have subtotal less than minimum order
	 	</span><br><span style="padding-left:5px;font-size:0.9em; color:grey;">(Note** : Minimum order marked in red color next to subtotal)</span>';
	 	$return['msg'] .= '<script>$(".place-order").hide();</script>';
	 }
	 elseif(in_array(date("N"),$vacations))
	 {
	 	$return['msg'] = '<p><span class="red" style="color:#fff;font-size:1.5em; "><i class="icon-hand-right" style="padding-top:5px;"></i>&nbsp; Sorry Guys Ordering Is Closed For The Day &nbsp;<i class="icon-hand-left" style="padding-top:5px;"></i>&nbsp;</span></p>';
	 	$return['msg'] .= '<script>$(".place-order").hide();</script>';
	 }
	 elseif($valid_time<start_time || $valid_time>end_time)
	 {
	  	$return['msg'] = '<p><span class="red" style="color:#fff;font-size:1.5em;"><i class="icon-hand-right" style="padding-top:5px;"></i>&nbsp; Ordering Allowed Between 11 AM To 6 PM &nbsp;<i class="icon-hand-left" style="padding-top:5px;"></i>&nbsp;</span></p>';
	 	$return['msg'] .= '<script>$(".place-order").hide();</script>';
	 }
	 else
	 {
	 	$return['msg'] = '<input type="hidden" name="order_type" id="order_type" value="delivery">';
	    $return['msg'] .= '<script>$(".place-order").show();</script>';
	 }
	}
	
	else{
	  $return['msg'] .= '<a class="basket-button-blue" style="font-size:1em;" href="'.$link->link('access',eaters).'"><i class="icon-unlock"></i> Please Login To Continue...</a>';
	}
	}
	echo json_encode($return);
}

elseif($_REQUEST['takeout_fooderids'] && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )){
	$valid_time = date('H:i:s',time());
	$cookie = $_COOKIE['eater_basket'];
	$fooders = $db->run("SELECT d.minimum_order, f.fooder_id , sum(case when (`product_proprice`=0) then (`quantity`*`product_price`) else (`quantity`*`product_proprice`)  end) as 'f.sum' FROM `food_basket` AS f join `fooders_details` AS d on d.fooder_id=f.fooder_id where f.cookie_basket='$cookie' group by f.fooder_id")->fetchAll();
	$ids=array();
	$min_order=array();
	$return = array();
	$return['msg'] = '';
	$return['error'] = false;
	if ($return['error'] === false){
	 foreach($fooders as $fid){
	 	if($fid['f.sum']<$fid['minimum_order'])
	 	{
	 		$min_order[]=$fid['fooder_id'];
	 	}
   }
   if($session->Check () && $_SESSION ['type'] === 'eater'){
   if(count($min_order)!=0)
   {
   	$return['msg'] = '<span style="color:#C0392B;font-size:1.2em; font-weight:bold;">'.count($min_order).' Fooder(s) have subtotal less than minimum order
   	</span><br><span style="font-size:0.9em; color:grey;">(Note** : Minimum order marked in red color next to subtotal)</span>';
   	$return['msg'] .= '<script>$(".place-order").hide();</script>';
   }
   elseif(in_array(date("N"),$vacations))
   {
   	$return['msg'] = '<p><span class="red" style="color:#fff;font-size:1.5em; "><i class="icon-hand-right" style="padding-top:5px;"></i>&nbsp; Sorry Guys Ordering Is Closed For The Day &nbsp;<i class="icon-hand-left" style="padding-top:5px;"></i>&nbsp;</span></p>';
   	$return['msg'] .= '<script>$(".place-order").hide();</script>';
   }
   elseif($valid_time<start_time || $valid_time>end_time){
   	$return['msg'] = '<p><span class="red" style="color:#fff;font-size:1.5em;"><i class="icon-hand-right" style="padding-top:5px;"></i>&nbsp; Ordering Allowed Between 11 AM To 6 PM &nbsp;<i class="icon-hand-left" style="padding-top:5px;"></i>&nbsp;</span></p>';
   	$return['msg'] .= '<script>$(".place-order").hide();</script>';
   }
   else
   {
   	$return['msg'] = '<input type="hidden" name="order_type" id="order_type" value="takeout">';
   	$return['msg'] .= '<script>$(".place-order").show();</script>';
   }
 
	}else{
	  $return['msg'] .= '<a class="basket-button-blue" style="font-size:1em;" href="'.$link->link('access',eaters).'"><i class="icon-unlock"></i> Please Login To Continue...</a>';
	}
	}
	echo json_encode($return);
}
?>
