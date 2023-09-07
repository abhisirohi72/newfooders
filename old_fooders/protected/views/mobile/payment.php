
      <div class="osahan-payment">
         <div class="p-3 osahan-inner-header bg-white shadow-sm">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-dark text-back text-decoration-none " href="javascript:void(0);" onclick="history.back()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="back-page bi bi-chevron-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                  </svg>
               </a>
               <span class="ml-3 h6 mb-0">Checkout</span>
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
         <?php 
         //echo "<pre>",print_r($_SESSION),"</pre>";
         ?>
         <div class="py-3 osahan-cart-item">
            <div class="osahan-cart-item-profile bg-white shadow p-3">
               <div class="d-flex flex-column">
                  <h6 class="mb-2 font-weight-bold">DELIVERY ADDRESS</h6>
                  <div class="custom-control custom-radio mb-2 px-0">
                     <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                     <label class="custom-control-label border osahan-check p-3 w-100 rounded border-primary" for="customRadio1">
                        <b><i class="feather-home mr-2"></i> Home</b> <br>
                        <p class="small mb-0 pl-4">Kalyani Nagar, Pune, Maharashtra</p>
                     </label>
                  </div>
                  <div class="custom-control custom-radio mb-2 px-0">
                     <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                     <label class="custom-control-label border osahan-check p-3 w-100 rounded bg-light" for="customRadio2">
                        <b><i class="feather-briefcase mr-2"></i> Work</b> <br>
                        <p class="small mb-0 pl-4">Pune, Maharashtra 411014</p>
                     </label>
                  </div>
                  <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal"> ADD NEW ADDRESS </a>
               </div>
            </div>
         </div>

         <!-- checkout -->
         <div class="py-3 osahan-cart-item">
            <div class="d-flex align-items-center mb-3 osahan-cart-item-profile bg-white shadow p-3">
               <img alt="osahan" src="<?php echo SITE_URL.'/assets/mobile/';?>img/starter1.jpg" class="mr-3 rounded-circle img-fluid">
               <div class="osahan-cart-item-profile-body">
                  <h6 class="mb-1 font-weight-bold pt-1">The Chatori Street</h6>
                  <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> Ramdaspeth, Nagpur, Maharashtra</p>
               </div>
            </div>
            <div class="bg-white shadow mb-3">
               <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                  <div class="media align-items-center">
                     <div class="mr-2 text-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                           <circle cx="8" cy="8" r="8"/>
                        </svg>
                     </div>
                     <div class="media-body">
                        <p class="m-0">Chicken Tikka Sub</p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                  <p class="text-gray mb-0 float-right mr-5">6</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
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
                        <p class="m-0">Methi Chicken Dry
                        </p>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                  <p class="text-gray mb-0 float-right mr-5">3</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
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
                  <p class="text-gray mb-0 float-right mr-5">1</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
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
                  <p class="text-gray mb-0 float-right mr-5">5</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
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
                  <p class="text-gray mb-0 float-right mr-5">9</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
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
                  <p class="text-gray mb-0 float-right mr-5">3</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
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
                       <p class="text-gray mb-0 float-right mr-5">1</p>
                     <p class="text-gray mb-0 float-right ml-2 text-muted small">&#x20B9;628</p>
                  </div>
               </div>
            </div>
            
            <div class="shadow bg-white p-3 mb-3 clearfix">
               <p class="mb-1">Item Total <span class="float-right text-dark">&#x20B9;3140</span></p>
               <p class="mb-1">Restaurant Charges <span class="float-right text-dark">&#x20B9;62.8</span></p>
               <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="icofont-info-circle"></i></span><span class="float-right text-dark">$10</span></p>
               <p class="mb-1 text-success">Total Discount<span class="float-right text-success">&#x20B9;1884</span></p>
               <hr>
               <h6 class="font-weight-bold mb-0">TO PAY  <span class="float-right">&#x20B9;1329</span></h6>
            </div>
         </div>
         
         <div class="fixed-bottom p-3">
            <a class="btn btn-success btn-lg btn-block" href="<?php echo $link->link('thankyou',mobile);?>">Confirm Order &#x20B9;1329
            <i class="feather-arrow-right"></i></a>
       </div>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header align-items-center">
                     <h5 class="modal-title" id="exampleModalLabel">Add Delivery Address</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <i class="feather-x float-right"></i>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form class="">
                        <div class="form-row">
                           <div class="col-md-12 form-group">
                              <label class="form-label">Delivery Area</label>
                              <div class="input-group">
                                 <input placeholder="Delivery Area" type="text" class="form-control">
                                 <div class="input-group-append"><button id="button-addon2" type="button" class="btn btn-outline-secondary"><i class="feather-map-pin"></i></button></div>
                              </div>
                           </div>
                           <div class="col-md-12 form-group"><label class="form-label">Complete Address</label><input placeholder="Complete Address e.g. house number, street name, landmark" type="text" class="form-control"></div>
                           <div class="col-md-12 form-group"><label class="form-label">Delivery Instructions</label><input placeholder="Delivery Instructions e.g. Opposite Gold Souk Mall" type="text" class="form-control"></div>
                           <div class="mb-0 col-md-12 form-group">
                              <label class="form-label">Nickname</label>
                              <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                 <label class="btn btn-outline-secondary active">
                                 <input type="radio" name="options" id="option1" checked> Home
                                 </label>
                                 <label class="btn btn-outline-secondary">
                                 <input type="radio" name="options" id="option2"> Work
                                 </label>
                                 <label class="btn btn-outline-secondary">
                                 <input type="radio" name="options" id="option3"> Other
                                 </label>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="modal-footer p-0 border-0 p-3">
                     <div class="col-6 m-0 pl-0 pr-1">                 
                        <button type="button" class="btn border btn-lg btn-block" data-dismiss="modal">Close</button>
                     </div>
                     <div class="col-6 m-0 pr-0 pl-1">     
                        <button type="button" class="btn btn-primary btn-lg btn-block">Save changes</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
