<?php if(page_type=='1'){ 
    if(isset($_POST['submit'])){ 
        $email_phone = trim($_POST['email_phone']);
        
        $insert = $db->insert('subscriber',array('email_phone'=>$email_phone,'created_date'=>time(),'ip'=>$_SERVER['REMOTE_ADDR']));
        if($insert){
           $display_msg = '<h3 class="text-success">We will get back to you soon. Thank you for subscribing.</h3>';
        }

       } ?>
     
     <div class="vh-100 osahan-coming-soon p-4 d-flex justify-content-center align-items-center">
         <div class="osahan-img text-center">
         <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/coming-soon.svg" alt="#" class="img-fluid coming-soon-img">
            <div class="osahan-text text-center mt-3">
               <h4 class="text-primary font-weight-bold">We're coming soon.</h4>
               <p class="mb-4">
Get ready for an unparalleled ordering experience with our upcoming food ordering app!
               </p>
               <?php if(isset($_POST['submit'])){ echo $display_msg; }else{ ?>
               <form method="post" action="">
               <div class="row">
                  <div class="col px-1 coming">
                       <input type="text" name="email_phone" required="required" id="emailSubscribe" class="form-control coming_input" placeholder="Enter Your Email/Phone">    
                  </div>
               </div>   
                <button id="submitSubscribe" name="submit" class="btn btn-lg comingbtn btn-primary btn-block my-4"> Subscribe</button>
</form>
<?php } ?>
            </div> 
         </div>
      </div>
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/jquery/jquery.min.js"></script>
      <script>
      // $( document ).ready(function() {
      //   $("#submitSubscribe").click(function(){
      //     var email = $("#emailSubscribe").val();
      //     $.ajax({
	   //        type: 'POST',
	   //        url: '<?php echo $link->link("ajax",mobile);?>',
	   //        cache:false,
      //        data: "callWaiter="+fid+"&table="+table,
	   //        success: function (data) {
      //         console.log(data);
      //            }
	   //     });
      //   });
      // });

      </script>
      
  <?php } else{ ?> 
<div class="osahan-home-page">
      <?php 
    $all_fooders = $db->run("CALL searchHome()")->fetchAll();
    //echo "<pre>",print_r($all_fooders),"</pre>";
    ?>
         <div class="shadow p-3 homepage-osahan-header bg-white">
            <div class="title d-flex align-items-center">
               <div class="mr-auto">
                  <a class="text-dark d-flex align-items-center" href="">
                        <img src="<?php echo SITE_URL.'/assets/mobile/img/';?>blogo.png" class="blogo">
                  </a>
               </div>
               <div class="ml-auto d-flex align-items-center">
                <!--  <a class="text-dark mx-2 fs-18 top-nav-btn-cart position-relative" data-toggle="modal" data-target="#exampleModal" href="#"><i class="feather-filter"></i></a>-->
                 
                  <a class="toggle ml-2 text-dark hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                     </svg>
                  </a>
               </div>
            </div>
            <div class="input-group border osahan-search mt-3 rounded-lg shadow-sm overflow-hidden">
               <div class="input-group-prepend">
                  <button class="border-0 btn btn-outline-secondary text-primary bg-white btn-block"><i class="feather-search"></i></button>
               </div>
               <input type="text" id="filter-fooder" class="shadow-none border-0 form-control pl-0" placeholder="Search for restaurants or location" aria-label="" aria-describedby="basic-addon1">
            </div>
         </div>
         <!-- Filters -->
         <!-- <div class="osahan-main">
            <div class="cat-slider border-bottom">
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/1.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Healthy</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/2.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Pizza</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/3.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Burger</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/4.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Rolls</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/5.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Chaat</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/6.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Shawarma</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/7.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Fries</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/8.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Pasta</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/9.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Chaap</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/10.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Chicken</p>
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/icons/11.png" class="img-fluid mb-2 shadow">
                     <p class="m-0 small">Manchurian</p>
                  </a>
               </div>
            </div>-->
            <!-- Trending this week -->
           <!-- <div class="px-3 pt-3 title d-flex align-items-center">
               <h6 class="m-0 font-weight-bold">Trending this week</h6>
               <a class="font-weight-bold ml-auto" href="trending.html">View all <i class="feather-chevrons-right"></i></a>
            </div>-->
            <!-- slider -->
           <!-- <div class="trending-slider">
               <div class="osahan-slider-item py-3 px-1">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image">
                        <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.4</span></div>
                        <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-danger">HOT</span></div>
                        <a href="<?php echo $link->link('restaurant',mobile);?>">
                        <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/trending5.png" class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative">
                        <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">Famous Dave's Bar-B-Que
                              </a>
                           </h6>
                           <p class="text-gray mb-3">Vegetarian, Indian, Pure veg</p>
                           <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–30 min</span> <span class="float-right text-black-50"> $350 FOR TWO</span></p>
                        </div>
                        <div class="list-card-badge d-flex align-items-center">
                           <span class="badge badge-danger mr-2">OFFER</span> <small> Use Coupon NEW50</small>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="osahan-slider-item py-3 px-1">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image">
                        <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 4.1</span></div>
                        <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-warning">Promoted</span></div>
                        <a href="<?php echo $link->link('restaurant',mobile);?>">
                        <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/trending6.png" class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative">
                        <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">Thai Famous Cuisine</a></h6>
                           <p class="text-gray mb-3">North Indian, Indian, Pure veg</p>
                           <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>
                        </div>
                        <div class="list-card-badge d-flex align-items-center">
                           <span class="badge badge-success mr-2">OFFER</span> <small>65% off</small>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="osahan-slider-item py-3 px-1">
                  <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                     <div class="list-card-image">
                        <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1</span></div>
                        <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                        <div class="member-plan position-absolute"><span class="badge badge-info">Ads</span></div>
                        <a href="<?php echo $link->link('restaurant',mobile);?>">
                        <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/trending1.png" class="img-fluid item-img w-100">
                        </a>
                     </div>
                     <div class="p-3 position-relative">
                        <div class="list-card-body">
                           <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">The Sakafo Restaurant
                              </a>
                           </h6>
                           <p class="text-gray mb-3">North, Hamburgers, Pure veg</p>
                           <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>
                        </div>
                        <div class="list-card-badge d-flex align-items-center">
                           <span class="badge badge-danger mr-2">OFFER</span> <small>65% NEW50</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="offer-slider bg-white border-top border-bottom">
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                  <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/pro1.jpg" class="img-fluid rounded rounded-lg shadow-sm">
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                  <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/pro2.jpg" class="img-fluid rounded rounded-lg shadow-sm">
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                  <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/pro3.jpg" class="img-fluid rounded rounded-lg shadow-sm">
                  </a>
               </div>
               <div class="cat-item px-1 py-3">
                  <a class="d-block text-center" href="trending.html">
                  <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/pro4.jpg" class="img-fluid rounded rounded-lg shadow-sm">
                  </a>
               </div>
            </div>-->
            <!-- Most popular -->
            <!--<div class="px-3 pt-4 pb-3 title d-flex align-items-center">
               <h6 class="m-0 font-weight-bold">Most popular</h6>
               <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a>
            </div>-->
            <!-- Most popular -->
            <!--<div class="most_popular px-3">
               <div class="row">
                  <div class="col-6 pr-1">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 4.4</span></div>
                           <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                           <div class="member-plan position-absolute"><span class="badge badge-danger">HOT</span></div>
                           <a href="<?php echo $link->link('restaurant',mobile);?>">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/popular1.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">The Sakafo Restaurant
                                 </a>
                              </h6>
                              <p class="text-gray mb-1 small">North, Hamburgers</p>
                              <p class="text-gray mb-1 rating">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star"></i>
                                 </li>
                              </ul>
                              </p>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                              <span class="badge badge-danger mr-2">OFFER</span> <small>60% NEW50</small>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 pl-1">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 2.4</span></div>
                           <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                           <div class="member-plan position-absolute"><span class="badge badge-warning">Buy 1 Get 1 free</span></div>
                           <a href="<?php echo $link->link('restaurant',mobile);?>">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/popular2.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">Thai Famous Indian Cuisine</a></h6>
                              <p class="text-gray mb-1 small">Indian, Pure veg</p>
                              <p class="text-gray mb-1 rating">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star"></i>
                                 </li>
                              </ul>
                              </p>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                              <span class="badge badge-danger mr-2">OFFER</span> <small>50% off</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row pt-2">
                  <div class="col-6 pr-1">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 4.3</span></div>
                           <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                           <a href="<?php echo $link->link('restaurant',mobile);?>">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/popular3.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">The Sakafo Restaurant
                                 </a>
                              </h6>
                              <p class="text-gray mb-1 small">Hamburgers, Pure veg</p>
                              <p class="text-gray mb-1 rating">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star"></i>
                                 </li>
                              </ul>
                              </p>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                              <span class="badge badge-danger mr-2">OFFER</span> <small>30% NEW50</small>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-6 pl-1">
                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                           <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.3</span></div>
                           <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                           <div class="member-plan position-absolute"><span class="badge badge-dark">Ads</span></div>
                           <a href="<?php echo $link->link('restaurant',mobile);?>">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/popular4.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">Bite Me Now Sandwiches</a></h6>
                              <p class="text-gray mb-1 small">American, Pure veg</p>
                              <p class="text-gray mb-1 rating">
                              <ul class="rating-stars list-unstyled">
                                 <li>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star star_active"></i>
                                    <i class="feather-star"></i>
                                 </li>
                              </ul>
                              </p>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                              <span class="badge badge-success mr-2">OFFER</span> <small>40% off</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="p-3">
               <a href="trending.html">
               <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/banner.png" class="img-fluid rounded-lg">
               </a>
            </div>-->
            <!-- Most sales -->
            <!-- <div class="px-3 pt-4 pb-3 title d-flex align-items-center">
               <h6 class="m-0 font-weight-bold">Most sales</h6>
               <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a>
            </div> -->
            <!-- Most sales -->
            <div class="most_sale px-3 pb-5">

            <?php 
     if(is_array($all_fooders)){
         foreach($all_fooders as $fooder){
             $fid = $feature->encrypt_decrypt('encrypt',$fooder['fooder_id']);
             ?>
               <div class="row list-fooder" data-search="<?php echo $fooder['specialization']; ?>">
                  <div class="col-12 pt-2">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm homepage-osahan-list-items">
                        <div class="list-card-image">
                           <!-- <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1</span></div> -->
                           <!-- <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div> -->
                           <!-- <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div> -->
                           <?php if($fooder['logo']!='' && file_exists(SERVER_ROOT.'/uploads/fooders/'.$fooder['fooder_id'].'/logo/'.$fooder['logo'])){ ?> 
                              <a href="<?php echo $link->link('restaurant',mobile,'&id='.$fid);?>">
                  <img src="<?php echo SITE_URL.'/uploads/fooders/'.$fooder['fooder_id'].'/logo/'.$fooder['logo'];?>" class="img-fluid item-img w-100">
                           </a>
                  <?php }else{ ?>
                     <a href="<?php echo $link->link('restaurant',mobile,'&id='.$fid);?>">
                    <img src="<?php echo SITE_URL.'/assets/eaters/img/noimg.png';?>" class="img-fluid item-img w-100">
                  </a>
                  <?php } ?> 
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile,'&id='.$fid);?>" class="text-black"><?php  
                        if (strlen($fooder['name']) > 20) echo substr($feature->textstyler($fooder['name'],1), 0, 20) . '...';
                        else echo $feature->textstyler($fooder['name'],1); ?>
                                 </a>
                              </h6>
                              <p class="text-gray mb-3"><i class="feather-map-pin"></i> <?php echo $fooder['location_name']; ?></p>
                              <?php if($fooder['mobile']!='') {?>
                              <p class="text-gray mb-3 time"><a href="tel:<?php echo $fooder['mobile']; ?>"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-phone"></i> <?php echo $fooder['mobile']; ?></span> <!--<span class="float-right text-black-50"> $500 FOR TWO</span>-->
                              </a></p>
                           <?php } ?>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                           <?php if($fooder['status']=='1'){?>
                              <span class="badge badge-success mr-2">OPEN</span>  
                    <?php }else{ ?>
                     <span class="badge badge-danger mr-2">Close</span>   
                    <?php } ?> 
      <!-- <small>65% NEW50</small> -->
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- <div class="col-12 pt-2">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm homepage-osahan-list-items">
                        <div class="list-card-image">
                           <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1</span></div>
                           <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                           <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                           <a href="<?php echo $link->link('restaurant',mobile);?>">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/sales2.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">Thai Famous Cuisine</a></h6>
                              <p class="text-gray mb-3">North Indian, Indian, Pure veg</p>
                              <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                              <span class="badge badge-success mr-2">OFFER</span> <small>65% off</small>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <!-- <div class="col-12 pt-2">
                     <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm homepage-osahan-list-items">
                        <div class="list-card-image">
                           <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1</span></div>
                           <div class="favourite-heart position-absolute"><a href="#"><i class="feather-bookmark"></i></a></div>
                           <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                           <a href="<?php echo $link->link('restaurant',mobile);?>">
                           <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/sales3.png" class="img-fluid item-img w-100">
                           </a>
                        </div>
                        <div class="p-3 position-relative">
                           <div class="list-card-body">
                              <h6 class="mb-1"><a href="<?php echo $link->link('restaurant',mobile);?>" class="text-black">Bite Me Now Sandwiches
                                 </a>
                              </h6>
                              <p class="text-gray mb-3">North, Hamburgers, Pure veg</p>
                              <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>
                           </div>
                           <div class="list-card-badge d-flex align-items-center">
                              <span class="badge badge-danger mr-2">OFFER</span> <small>65% NEW50</small>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
               <?php }} ?>
 
               <div class="px-3 pt-4 title noFooder" style="display:none;">
                       <h6 class="m-0 font-weight-bold">No items found that match your search/filter.</h6>
              </div>
            </div>
         </div>
         <?php } ?>
