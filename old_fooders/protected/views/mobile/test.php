
   <?php
   echo "<pre>",print_r($_SERVER),"</pre>";
   exit;
   $fooderid = $feature->encrypt_decrypt('decrypt',$_REQUEST['id']);
    if(!isset($_REQUEST['id']) || $fooderid==''){
        $session->redirect('home',mobile);
    } 
    $all_dishes = $db->run("CALL fooderPageMobile('$fooderid')")->fetchAll();
    $all_menus = $db->run("CALL getMenus('$fooderid')")->fetchAll(); 
    $fooder_details = $all_dishes['0'];
    $daily_hrs = unserialize($fooder_details['daily_hrs']);
    //echo "<pre>",print_r($daily_hrs),"</pre>";
    ?>
      <div class="osahan-restaurant">
         <div class="osahan-restaurant-detail">
            <div class="p-3 osahan-inner-header bg-primary">
               <div class="d-flex align-items-center">
                  <a class="font-weight-bold text-white text-back text-decoration-none d-flex" href="<?php echo $link->link('home',mobile); ?>">
                     <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="back-page bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                     </svg>
                     <span class="pl-2">Back</span>
                  </a>
                  <div class="ml-auto d-flex align-items-center">
                     <!--<a class="text-white mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="#ratings-and-reviews"><i class="feather-message-square"></i> <span class="border">3</span></a>
                     <a class="text-white mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="#ratings-and-reviews"><i class="feather-star"></i></a>
                     <a class="text-white mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="#ratings-and-reviews"><i class="feather-map-pin"></i></a>-->
                     <a class="text-white mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="tel:<?php echo $fooder_details['mobile']; ?>"><i class="feather-phone"></i></a>
                     <a class="toggle ml-2 text-white hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                           <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                        </svg>
                     </a>
                  </div>
               </div>
            </div>
            <div class="px-3 pt-4 pb-3 bg-primary">
               <div>
                  <h2 class="font-weight-bold text-white restrauhd"><?php echo $feature->textstyler($fooder_details['foodername'],1); ?></h2>
                  <p class="font-weight-light text-white-50 m-0"><i class="feather-map-pin"></i> <?php echo $fooder_details['address'].'<br>'.$fooder_details['location_name'].', '.$fooder_details['city'].', '.$fooder_details['state']; ?></p>
                  <p ><a class="font-weight-light text-white-50 m-0" href="tel:<?php echo $fooder_details['mobile']; ?>" style="text-decoration:none;"><i class="feather-phone"></i> <?php echo $fooder_details['mobile']; ?></a></p>
                  <!--<div class="rating-wrap d-flex align-items-center mt-2">
                     <ul class="rating-stars list-unstyled m-0">
                        <li>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star"></i>
                        </li>
                     </ul>
                     <p class="label-rating text-white-50 ml-2 small m-0"> (245 Reviews)</p>
                  </div>-->
               </div>
               <div class="pt-4">
                  <div class="row">
                     <div class="col-6">
                        <p class="m-0 small text-white">Delivery <span class="badge badge-osahan badge-warning small">Free</span></p>
                     </div>
                     <div class="col-6">
                        <p class="m-0 small text-white">Open time <span class="badge badge-osahan badge-dark small"><?php echo date("g:i a", strtotime($daily_hrs[date('N')]['open']))." to ".date("g:i a", strtotime($daily_hrs[date('N')]['close'])); ?></span></p>
                     </div>
                  </div>
               </div>
            </div>
           
            <div class="px-3 pt-3">
                      <div class="input-group border osahan-search mt-3 rounded-lg shadow-sm overflow-hidden">
               <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-primary bg-white btn-block"><i class="feather-search"></i></button>
               </div>
               <input type="text" id="filter-dish" class="shadow-none border-0 form-control pl-0" placeholder="Search for menu or dish" aria-label="" aria-describedby="basic-addon1">
            </div></div>
            <div class="px-3 pt-3">
            <a class="btn btn-sm btn-outline-primary" href="#"><img src="<?php echo SITE_URL.'/assets/mobile/';?>img/veg.png" alt="#" class=""> Veg</a> 
            <a class="btn btn-sm btn-outline-primary" href="#"><img src="<?php echo SITE_URL.'/assets/mobile/';?>img/nonveg.png" alt="#" class=""> Non Veg</a>
            </div>
               <!-- slider -->
               <!--<div class="trending-slider rounded overflow-hidden">
                  <div class="osahan-slider-item px-1 py-3">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="#">
                           <img src="img/trending1.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="#" class="text-black">Famous Dave's Bar-B-Que</a>
                              </h6>
                              <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>
                              <p class="text-gray m-0"> <span class="text-black-50"> $350 FOR TWO</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="osahan-slider-item px-1 py-3">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="#">
                           <img src="img/trending2.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="#" class="text-black">Thai Famous Cuisine</a></h6>
                              <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                              <p class="text-gray m-0"> <span class="text-black-50"> $250 FOR TWO</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="osahan-slider-item px-1 py-3">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <a href="#">
                           <img src="img/trending3.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="#" class="text-black">The Sakafo Restaurant</a></h6>
                              <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                              <p class="text-gray m-0"> <span class="text-black-50"> $500 FOR TWO</span></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>-->
         <!-- Menu -->
         <div class="px-3 pt-3">
            <div class="d-flex item-aligns-center">
               <p class="font-weight-bold">Menu</p>
               <a class="small text-primary font-weight-bold ml-auto" href="#">View all <i class="feather-chevrons-right"></i></a>
            </div>
            <?php 
            if(is_array($all_dishes)){
               foreach($all_dishes as $dishes){
                        $item_count[$dishes['menu_id']][] = $dishes; 
               }
            } 
            if(is_array($all_menus)){
               foreach($all_menus as $menu){
                  if(count((array)$item_count[$menu['id']])>0){
              ?>    
             
            <div class="row list-dishes" data-search="<?php echo $dish['tags']; ?>"   data-producttype="<?php echo $dish['product_type']; ?>">
               <h6 class="mb-3 mt-3 col-md-12"><?php echo $feature->textstyler($menu['name'],1); ?> <small class="text-black-50"><?php echo count((array)$item_count[$menu['id']]); ?> ITEMS</small></h6>
               <div class="col-md-12 px-0 border-top">
                  <div class="bg-white mb-4">
<?php if(is_array($all_dishes)){
   foreach($all_dishes as $dish){
      if($menu['id']==$dish['menu_id']){
        $encfid = $feature->encrypt_decrypt('encrypt',$dish['fooder_id']);
        $encpid = $feature->encrypt_decrypt('encrypt',$dish['productid']);
        $encmid = $feature->encrypt_decrypt('encrypt',$dish['menuid']);
         ?>
     <div class="p-3 border-bottom menu-list d-flex">
                  <div class="media">
                  <?php 
                        if(file_exists(SERVER_ROOT . '/uploads/fooders/' . $fooderid . '/product/'.$dish['picture']) && $dish['picture']!=''){
                        ?>  
                         <img src="<?php echo SITE_URL.'/uploads/fooders/' . $fooderid . '/product/'.$dish['picture'];?>" alt="" class="mr-3 rounded-pill"> 
                       <?php }else{ ?>
                        <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/starter1.jpg" alt="" class="mr-3 rounded-pill ">
                        <?php } ?>
                           <div class="media-body">
                              <h6 class="mb-1"><?php echo $feature->textstyler($dish['productname'],1); if($dish['product_type']=='1') echo ' <span class="badge badge-danger">Non Veg</span>'; else echo ' <span class="badge badge-success">Veg</span>'; ?></h6>

                              <?php if($dish['proprice']!=''){ ?>
                         <p class="text-muted mb-0"> <?php echo $currency_symbol.' '.$dish['proprice']; ?>  &nbsp;&nbsp;<strike> <?php echo $currency_symbol.' '.$dish['price']; ?></strike></p>
                        <?php }else{ ?>
                           <p class="text-muted mb-0"><?php echo $currency_symbol.' '.$dish['price']; ?></p>
                         <?php } ?>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="javascript:void(0)" onclick="addToCart(this,event,'<?php echo $encfid; ?>','<?php echo $encmid; ?>','<?php echo $encpid; ?>')" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                       
                     </div>
                     <?php } } } ?>
                    
                  </div>
               </div>
            </div>
            <?php } } } ?>



            <!-- <div class="row">
               <h6 class="mb-3 mt-3 col-md-12">Starters <small class="text-black-50">3 ITEMS</small></h6>
               <div class="col-md-12 px-0 border-top">
                  <div class="bg-white mb-4">
                     <div class="p-3 border-bottom menu-list d-flex">
                        <div class="media">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/starter1.jpg" alt="" class="mr-3 rounded-pill ">
                           <div class="media-body">
                              <h6 class="mb-1">Chicken Tikka Sub </h6>
                              <p class="text-muted mb-0">$250</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                     <div class="p-3 border-bottom menu-list d-flex">
                        <div class="media">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/starter2.jpg" alt="" class="mr-3 rounded-pill ">
                           <div class="media-body">
                              <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BEST SELLER</span></h6>
                              <p class="text-muted mb-0">$600</p>
                           </div>
                        </div>
                        <div class="osahan-quantity ml-auto">
                           <input type="button" value="-" class="minus">
                           <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                           <input type="button" value="+" class="plus">
                        </div>
                     </div>
                     <div class="p-3 border-bottom menu-list d-flex">
                        <div class="media">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/starter3.jpg" alt="" class="mr-3 rounded-pill ">
                           <div class="media-body">
                              <h6 class="mb-1">Chicken Tikka Sub <span class="badge badge-success">Pure Veg</span></h6>
                              <p class="text-muted mb-0">$250</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <h6 class="mb-3 mt-3 col-md-12">Soups <small class="text-black-50">8 ITEMS</small></h6>
               <div class="col-md-12 px-0 border-top">
                  <div class="bg-white">
                     <div class="p-3 border-bottom gold-members d-flex">
                        <div class="media">
                           <div class="mr-3 font-weight-bold text-danger non_veg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                 <circle cx="8" cy="8" r="8"></circle>
                              </svg>
                           </div>
                           <div class="media-body">
                              <h6 class="mb-1">Chicken Tikka Sub </h6>
                              <p class="text-muted mb-0">$250</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                     <div class="p-3 border-bottom gold-members d-flex">
                        <div class="media">
                           <div class="mr-3 font-weight-bold text-danger non_veg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                 <circle cx="8" cy="8" r="8"></circle>
                              </svg>
                           </div>
                           <div class="media-body">
                              <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BEST SELLER</span></h6>
                              <p class="text-muted mb-0">$600</p>
                           </div>
                        </div>
                        <div class="osahan-quantity ml-auto">
                           <input type="button" value="-" class="minus">
                           <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                           <input type="button" value="+" class="plus">
                        </div>
                     </div>
                     <div class="p-3 border-bottom gold-members d-flex">
                        <div class="media">
                           <div class="mr-3 font-weight-bold text-success veg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                 <circle cx="8" cy="8" r="8"></circle>
                              </svg>
                           </div>
                           <div class="media-body">
                              <h6 class="mb-1">Chicken Tikka Sub <span class="badge badge-success">Pure Veg</span></h6>
                              <p class="text-muted mb-0">$250</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                     <div class="p-3 border-bottom gold-members d-flex">
                        <div class="media">
                           <div class="mr-3 font-weight-bold text-success veg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                 <circle cx="8" cy="8" r="8"></circle>
                              </svg>
                           </div>
                           <div class="media-body">
                              <h6 class="mb-1">Chicken Tikka Sub </h6>
                              <p class="text-muted mb-0">$250</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                     <div class="p-3 border-bottom gold-members d-flex">
                        <div class="media">
                           <div class="mr-3 font-weight-bold text-danger non_veg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                 <circle cx="8" cy="8" r="8"></circle>
                              </svg>
                           </div>
                           <div class="media-body">
                              <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BEST SELLER</span></h6>
                              <p class="text-muted mb-0">$600</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                     <div class="p-3 border-bottom gold-members d-flex">
                        <div class="media">
                           <div class="mr-3 font-weight-bold text-success veg">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                 <circle cx="8" cy="8" r="8"></circle>
                              </svg>
                           </div>
                           <div class="media-body">
                              <h6 class="mb-1">Chicken Tikka Sub <span class="badge badge-success">Pure Veg</span></h6>
                              <p class="text-muted mb-0">$250</p>
                           </div>
                        </div>
                        <span class="ml-auto"><a href="<?php echo $link->link('checkout',mobile);?>" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                     </div>
                  </div>
               </div>
            </div> -->
           <!-- <div class="row">
               <div class="bg-light py-3">
                  <div id="ratings-and-reviews" class="bg-white d-flex align-items-center shadow-sm p-3 mb-3 clearfix restaurant-detailed-star-rating">
                     <h6 class="mb-0">Rate this Place</h6>
                     <div class="star-rating ml-auto">
                        <div class="d-inline-block h6 m-0"><i class="feather-star text-warning"></i>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star text-warning"></i>
                           <i class="feather-star"></i>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow-sm p-3 mb-3 clearfix graph-star-rating">
                     <h6 class="mb-0 mb-3">Ratings and Reviews</h6>
                     <div class="graph-star-rating-header">
                        <div class="star-rating">
                           <div class="d-inline-block"><i class="feather-star text-warning"></i>
                              <i class="feather-star text-warning"></i>
                              <i class="feather-star text-warning"></i>
                              <i class="feather-star text-warning"></i>
                              <i class="feather-star"></i>
                           </div>
                           <b class="text-black ml-2">334</b>
                        </div>
                        <p class="text-muted mb-4 mt-2 small">Rated 3.5 out of 5</p>
                     </div>
                     <div class="graph-star-rating-body">
                        <div class="rating-list">
                           <div class="rating-list-left font-weight-bold small">5 Star</div>
                           <div class="rating-list-center">
                              <div class="progress">
                                 <div role="progressbar" class="progress-bar bg-info" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
                              </div>
                           </div>
                           <div class="rating-list-right font-weight-bold small">56 %</div>
                        </div>
                        <div class="rating-list">
                           <div class="rating-list-left font-weight-bold small">4 Star</div>
                           <div class="rating-list-center">
                              <div class="progress">
                                 <div role="progressbar" class="progress-bar bg-info" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                              </div>
                           </div>
                           <div class="rating-list-right font-weight-bold small">23 %</div>
                        </div>
                        <div class="rating-list">
                           <div class="rating-list-left font-weight-bold small">3 Star</div>
                           <div class="rating-list-center">
                              <div class="progress">
                                 <div role="progressbar" class="progress-bar bg-info" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100" style="width: 11%;"></div>
                              </div>
                           </div>
                           <div class="rating-list-right font-weight-bold small">11 %</div>
                        </div>
                        <div class="rating-list">
                           <div class="rating-list-left font-weight-bold small">2 Star</div>
                           <div class="rating-list-center">
                              <div class="progress">
                                 <div role="progressbar" class="progress-bar bg-info" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                              </div>
                           </div>
                           <div class="rating-list-right font-weight-bold small">6 %</div>
                        </div>
                        <div class="rating-list">
                           <div class="rating-list-left font-weight-bold small">1 Star</div>
                           <div class="rating-list-center">
                              <div class="progress">
                                 <div role="progressbar" class="progress-bar bg-info" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width: 4%;"></div>
                              </div>
                           </div>
                           <div class="rating-list-right font-weight-bold small">4 %</div>
                        </div>
                     </div>
                     <div class="graph-star-rating-footer text-center mt-3"><button type="button" class="btn btn-primary btn-block btn-sm">Rate and Review</button></div>
                  </div>
                  <div class="bg-white shadow-sm p-3 mb-3 restaurant-detailed-ratings-and-reviews">
                     <a class="text-primary float-right" href="#">Top Rated</a>
                     <h6 class="mb-1">All Ratings and Reviews</h6>
                     <div class="reviews-members py-3">
                        <div class="media">
                           <a href="#"><img src="<?php echo SITE_URL.'/assets/mobile/';?>img/reviewer1.png" class="mr-3 rounded-pill"></a>
                           <div class="media-body">
                              <div class="reviews-members-header">
                                 <div class="star-rating float-right">
                                    <div class="d-inline-block" style="font-size: 14px;"><i class="feather-star text-warning"></i>
                                       <i class="feather-star text-warning"></i>
                                       <i class="feather-star text-warning"></i>
                                       <i class="feather-star text-warning"></i>
                                       <i class="feather-star"></i>
                                    </div>
                                 </div>
                                 <h6 class="mb-0"><a class="text-dark" href="#">Trump</a></h6>
                                 <p class="text-muted small">Tue, 20 Mar 2020</p>
                              </div>
                              <div class="reviews-members-body">
                                 <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classNameical Latin literature from 45 BC, making it over 2000 years old.</p>
                              </div>
                              <div class="reviews-members-footer"><a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-up"></i> 856M</a> <a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-down"></i> 158K</a><span class="total-like-user-main ml-2" dir="rtl"><a href="#" aria-describedby="tooltip-top0"><img src="img/reviewer3.png" class="total-like-user rounded-pill"></a><a href="#" aria-describedby="tooltip-top1"><img src="img/reviewer4.png" class="total-like-user rounded-pill"></a><a href="#"><img src="img/reviewer5.png" class="total-like-user rounded-pill"></a><a href="#" aria-describedby="tooltip-top3"><img src="img/reviewer6.png" class="total-like-user rounded-pill"></a></span></div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="reviews-members py-3">
                        <div class="media">
                           <a href="#"><img src="img/reviewer2.png" class="mr-3 rounded-pill"></a>
                           <div class="media-body">
                              <div class="reviews-members-header">
                                 <div class="star-rating float-right">
                                    <div class="d-inline-block" style="font-size: 14px;"><i class="feather-star text-warning"></i>
                                       <i class="feather-star text-warning"></i>
                                       <i class="feather-star text-warning"></i>
                                       <i class="feather-star text-warning"></i>
                                       <i class="feather-star"></i>
                                    </div>
                                 </div>
                                 <h6 class="mb-0"><a class="text-dark" href="#">Jhon Smith</a></h6>
                                 <p class="text-muted small">Tue, 20 Mar 2020</p>
                              </div>
                              <div class="reviews-members-body">
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                              </div>
                              <div class="reviews-members-footer"><a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-up"></i> 88K</a> <a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-down"></i> 1K</a><span class="total-like-user-main ml-2" dir="rtl"><a href="#"><img src="img/reviewer3.png" class="total-like-user rounded-pill"></a><a href="#"><img src="img/reviewer4.png" class="total-like-user rounded-pill"></a><a href="#"><img src="img/reviewer5.png" class="total-like-user rounded-pill"></a><a href="#"><img src="img/reviewer6.png" class="total-like-user rounded-pill"></a></span></div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <a class="text-center w-100 d-block mt-3 font-weight-bold" href="#">See All Reviews</a>
                  </div>
                  <div class="bg-white shadow-sm p-3 rating-review-select-page">
                     <h6 class="mb-3">Leave Comment</h6>
                     <div class="d-flex align-items-center mb-3">
                        <p class="m-0 small">Rate the Place</p>
                        <div class="star-rating ml-auto">
                           <div class="d-inline-block"><i class="feather-star text-warning"></i>
                              <i class="feather-star text-warning"></i>
                              <i class="feather-star text-warning"></i>
                              <i class="feather-star text-warning"></i>
                              <i class="feather-star"></i>
                           </div>
                        </div>
                     </div>
                     <form>
                        <div class="form-group"><label class="form-label small">Your Comment</label><textarea class="form-control"></textarea></div>
                        <div class="form-group mb-0"><button type="button" class="btn btn-primary btn-block"> Submit Comment </button></div>
                     </form>
                  </div>
               </div>
            </div>-->
         </div>

      
  