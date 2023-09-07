<div class="osahan-checkout">
         <div class="p-3 osahan-inner-header bg-white shadow-sm">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-dark text-back text-decoration-none " href="<?php echo $link->link('restaurant',mobile,'&id='.$_REQUEST['fid']); ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="back-page bi bi-chevron-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                  </svg>
               </a>
               <span class="ml-3 h6 mb-0"><?php echo isset($_SESSSION['tableno'])?$_SESSSION['tableno']:'--'; ?></span>
               <div class="ml-auto d-flex align-items-center">
                  <!-- <a class="text-dark mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="checkout.html"><i class="feather-shopping-bag"></i> <span>3</span></a> -->
                  <a class="toggle ml-2 text-dark hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                     </svg>
                  </a>
               </div>
            </div>
         </div>
         <!-- checkout -->
         <div class="py-3 osahan-cart-item">
            <div class="d-flex align-items-center mb-3 osahan-cart-item-profile bg-white shadow p-3">
            <?php if($fooder_details['logo']!='' && file_exists(SERVER_ROOT.'/uploads/fooders/'.$fooderid.'/logo/'.$fooder_details['logo'])){ ?> 
                  <img alt="osahan" src="<?php echo SITE_URL.'/uploads/fooders/'.$fooderid.'/logo/'.$fooder_details['logo'];?>" class="mr-3 rounded-circle img-fluid" style="width:55px;height:auto;">        
                  <?php }else{ ?>
                     <img alt="osahan" src="<?php echo SITE_URL.'/assets/mobile/';?>img/starter1.jpg" class="mr-3 rounded-circle img-fluid">
                  <?php } ?> 
      <div class="osahan-cart-item-profile-body">
                  <h6 class="mb-1 font-weight-bold pt-1"><?php echo $feature->textstyler($fooder_details['foodername'],1); ?></h6>
                  <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> <?php echo $fooder_details['address'].'<br>'.$fooder_details['location_name'].', '.$fooder_details['city'].', '.$fooder_details['state']; ?></p>
               </div>
            </div>
            <div class="bg-white shadow mb-3">
            <?php 
            //echo "<pre>",print_r($all_cart),"</pre>";
            
            if(is_array($all_cart)){
               foreach($all_cart as $cart){
                  $encfid = $feature->encrypt_decrypt('encrypt',$cart['fooder_id']);
                  $encpid = $feature->encrypt_decrypt('encrypt',$cart['product_id']);
                  $encmid = $feature->encrypt_decrypt('encrypt',$cart['menu_id']);
                  $encpname = $feature->encrypt_decrypt('encrypt',$cart['product_name']);
                  $encfname = $feature->encrypt_decrypt('encrypt',$cart['fooder_name']);
                  $encprice = $feature->encrypt_decrypt('encrypt',$cart['product_price']);
                  $encproprice = $feature->encrypt_decrypt('encrypt',$cart['product_proprice']);
            ?>      
            <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom removeRow_<?php echo $encpid; ?>">
                  <div class="media align-items-center">
                     
                     <div class="mr-2 <?php if($product_type[$cart['product_id']]=='1') echo 'text-danger'; else echo 'text-success'; ?> ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0"><?php echo $feature->textstyler($cart['product_name'],1); ?></p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                  <div class="osahan-quantity ml-auto addQty" id="<?php echo 'Qty_'.$encpid; ?>">
                           <input type="button" value="-" class="minus" onclick="lessQty(this,event,'<?php echo $encfid; ?>','<?php echo $encmid; ?>','<?php echo $encpid; ?>','<?php echo $encpname; ?>','<?php echo $encfname; ?>','<?php echo $encprice; ?>','<?php echo $encproprice; ?>')">
                           <input type="text" name="quantity" id="<?php echo 'quantity'.$encpid; ?>" value="<?php echo $cart['quantity']; ?>" title="Qty" class="qty" size="4">
                           <input type="button" value="+" class="plus" onclick="moreQty(this,event,'<?php echo $encfid; ?>','<?php echo $encmid; ?>','<?php echo $encpid; ?>','<?php echo $encpname; ?>','<?php echo $encfname; ?>','<?php echo $encprice; ?>','<?php echo $encproprice; ?>')">
                        </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small checkPrice_<?php echo $encpid; ?>"><?php if($cart['product_proprice']>0) echo $currency_symbol.number_format($cart['product_proprice']*$cart['quantity'],2); else echo $currency_symbol.number_format($cart['product_price']*$cart['quantity'],2); ?></p>
                  </div>
               </div>
               <?php } } ?>
               <!-- <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                  <div class="media align-items-center">
                     <div class="mr-2 text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Methi Chicken Dry
                        </p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="osahan-quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                     </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                  </div>
               </div>
               <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                  <div class="media align-items-center">
                     <div class="mr-2 text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Reshmi Kebab
                        </p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="osahan-quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                     </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                  </div>
               </div>
               <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                  <div class="media align-items-center">
                     <div class="mr-2 text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Lemon Cheese Dry
                        </p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="osahan-quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                     </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                  </div>
               </div>
               <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                  <div class="media align-items-center">
                     <div class="mr-2 text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Rara Paneer</p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="osahan-quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                     </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                  </div>
               </div>
               <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                  <div class="media align-items-center">
                     <div class="mr-2 text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Special Lemon Cheese
                        </p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="osahan-quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                     </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                  </div>
               </div>
               <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2">
                  <div class="media align-items-center">
                     <div class="mr-2 text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Tandoori Chicken
                        </p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <div class="osahan-quantity">
                        <input type="button" value="-" class="minus">
                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                        <input type="button" value="+" class="plus">
                     </div>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                  </div>
               </div> -->
            </div>
            <div class="mb-3 shadow bg-white p-3 py-3 mt-3 clearfix">
               <div class="input-group-sm mb-2 input-group">
               <a class="btn btn-primary btn-block" href="<?php echo $link->link('restaurant',mobile,'&id='.$feature->encrypt_decrypt('encrypt',$fooderid)); ?>">Add More Items</a> 
             </div>
               <div class="mb-0">
               <span class="text-danger promoErr"></span>
               </div>
               <div class="mb-0 input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="feather-message-square"></i></span></div>
                  <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control" id="suggestion"></textarea>
               </div>
            </div>
            <div class="shadow bg-white p-3 mb-3 clearfix">
               <p class="mb-1 font-weight-bold">SUB TOTAL <span class="float-right text-dark itemTotal"><?php echo $currency_symbol.number_format($pricep,2); ?></span></p>
               <p class="mb-1 discount"></p>
               <?php if($service_charge>0){?>
                <p class="mb-1"><?php echo $feature->textstyler($fooder_details['tax2_name'],3).' '.number_format($fooder_details['tax2_value'],2).'%'; ?><span class="float-right text-dark" id="serviceCharge"><?php echo $currency_symbol.number_format($service_charge,2); ?></span></p>
               <?php } ?>
               <?php if($cgst_tax>0){?>
                <p class="mb-1">CGST <?php echo number_format($cgst,2).'%'; ?><span class="float-right text-dark" id="cgst"><?php echo $currency_symbol.number_format($cgst_tax,2); ?></span></p>
                <p class="mb-1">SGST <?php echo number_format($sgst,2).'%'; ?><span class="float-right text-dark" id="sgst"><?php echo $currency_symbol.number_format($sgst_tax,2); ?></span></p>
               <?php } ?>

               <!-- <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark"><?php if($fooder_details['delivery_charges']=='0') echo 'FREE'; else echo $currency_symbol.number_format($fooder_details['delivery_charges']); ?></span></p> -->
               <!-- <p class="mb-1 text-success">Total Discount<span class="float-right text-success">$1884</span></p> -->
               <hr>
               <h6 class="font-weight-bold mb-0">GRAND TOTAL  <span class="float-right toPay"><?php echo $currency_symbol.number_format(($pricep+$service_charge+$cgst_tax+$sgst_tax),2); ?></span></h6>
            </div>
            <div class="fixed-bottom p-3">
               
               <?php 
               if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
                $paylink = $link->link('payment',mobile,'&fid='.$_REQUEST['fid']);
                $paytext = "PROCEED";  
               }else{
                  $paylink = $link->link('login',mobile,'&fid='.$_REQUEST['fid'].'&page='.$feature->encrypt_decrypt('encrypt','checkout'));
                  $paytext = "LOGIN TO CONTINUE"; 
               }   
                  ?>
              
               <a href="<?php echo $paylink;?>" onclick="proceedCheckout();" class="btn btn-success btn-block btn-lg text-white rounded shadow text-decoration-none d-flex align-items-center shadow">
                  <div class="border-right pr-3">
                     <h4 class="m-0"><i class="feather-shopping-bag" aria-hidden="true"></i></h4>
                  </div>
                  <div class="ml-3 text-left">
                     <p class="mb-0 small text-white-50"><span class="totalQty"><?php echo $qty; ?></span> item</p>
                     <p class="mb-0 font-weight-bold text-white toPay"><?php echo $currency_symbol.number_format(($pricep+$service_charge+$cgst_tax+$sgst_tax),2); ?></p>
                  </div>
                  <div class="ml-auto">
                     <p class="mb-0 text-white"><?php echo $paytext; ?> <i class="feather-chevron-right pl-2" aria-hidden="true"></i></p>
                  </div>
               </a>
            </div>
         </div>
      </div>
    