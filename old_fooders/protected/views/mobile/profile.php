
      <div class="osahan-profile">
         <div class="p-3 osahan-inner-header bg-white shadow-sm">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-dark text-back text-decoration-none " href="home.html">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="back-page bi bi-chevron-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                  </svg>
               </a>
               <span class="ml-3 h6 mb-0">Profile</span>
               <div class="ml-auto d-flex align-items-center">
                  <a class="text-dark mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="checkout.html"><i class="feather-shopping-bag"></i> <span>3</span></a>
                  <a class="toggle ml-2 text-dark hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                     </svg>
                  </a>
               </div>
            </div>
         </div>
         <!-- profile -->
         <div class="py-3 osahan-profile">
            <div class="propic">
              <img src="<?php echo SITE_URL.'/uploads/avatar/';?>1.jpg" class="rounded-circle">
           </div>
            <div class="bg-white shadow">
               <div class="d-flex align-items-center border-bottom p-3">
                  <div class="right">
                     <h6 class="mb-1 font-weight-bold">Nellie H. Riggs <i class="feather-check-circle text-success"></i></h6>
                     <p class="text-muted m-0 small"> <i class="feather-phone"></i> 579759759</p>
                  </div>
               </div>
            </div>

            <div class="bg-white shadow mt-3">
               <div class="align-items-center border-bottom p-3">
                  <div class="avatar">
                    <img src="<?php echo SITE_URL.'/uploads/avatar/';?>1.jpg" class="rounded-circle">
                    <img src="<?php echo SITE_URL.'/uploads/avatar/';?>24.jpg" class="rounded-circle">
                    <img src="<?php echo SITE_URL.'/uploads/avatar/';?>2.jpg" class="rounded-circle">
                    <img src="<?php echo SITE_URL.'/uploads/avatar/';?>26.jpg" class="rounded-circle">
                  </div>
               </div>
            </div>
            <!-- profile-details -->
            <div class="bg-white shadow mt-3 profile-details">
               <a data-toggle="modal" data-target="#exampleModal" class="d-flex w-100 align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold mb-1 text-dark">Address</h6>
                     <p class="small text-muted m-0">Add or remove a delivery address</p>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               <a href="faq.html" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-message-circle bg-danger text-white p-2 rounded-circle mr-2"></i> FAQ</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               <a href="<?php echo $link->link('terms',mobile);?>" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-info bg-success text-white p-2 rounded-circle mr-2"></i> Term of use</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
               <a href="<?php echo $link->link('privacy',mobile);?>" class="d-flex w-100 align-items-center px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="feather-lock bg-warning text-white p-2 rounded-circle mr-2"></i> Privacy policy</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                  </div>
               </a>
            </div>
         </div>
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
<form class>
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