         <!-- Footer -->
        
         <?php 
         if (($query1ans == "home" || $query1ans == "profile" || $query1ans == "address"  || $query1ans == "orders" || $query1ans == "order_detail") && page_type==0 ) { ?>  
         <div class="osahan-menu-fotter border rounded shadow fixed-bottom bg-white m-3 px-3 py-2 text-center">
            <div class="row">
               <?php 
            if(isset($_SESSION['type']) && $_SESSION['type']=='eater'){
               $orderlink = $link->link('orders',mobile);
               $addresslink = $link->link('address',mobile);
               $profilelink = $link->link('profile',mobile);
               if($db->exists('food_basket',array('eater_id'=>$_SESSION['eater_id']))){
                  $basketfid = $db->get_var('food_basket',array('eater_id'=>$_SESSION['eater_id']),'fooder_id');
                  $encbasketfid = $feature->encrypt_decrypt('encrypt',$basketfid); 
                  $checkoutlink = $link->link('checkout',mobile,'&fid='.$encbasketfid);
               }else{
                  $checkoutlink = '#';
               } 
            }else{
               $orderlink = $link->link('login',mobile);
               $addresslink = $link->link('login',mobile);
               $profilelink = $link->link('login',mobile);
               if($db->exists('food_basket',array('cookie_basket'=>$_COOKIE['mobile_basket']))){
                  $basketfid = $db->get_var('food_basket',array('cookie_basket'=>$_COOKIE['mobile_basket']),'fooder_id');
                  $encbasketfid = $feature->encrypt_decrypt('encrypt',$basketfid); 
                  $checkoutlink = $link->link('checkout',mobile,'&fid='.$encbasketfid);
               }else{
                  $checkoutlink = '#';
               }
               
            }
               ?>
               <div class="col selected">
                  <a href="<?php echo $link->link('home',mobile);?>" class="text-danger small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-home text-danger"></i></p>
                     Home
                  </a>
               </div>
               <div class="col">
                  <a href="<?php echo $checkoutlink;?>" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-layers"></i></p>
                     Cart
                  </a>
               </div>
               <div class="col osahan-menu-logo">
                  <a href="<?php echo $orderlink;?>" class="text-white small font-weight-bold text-decoration-none">
                     <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/nav-logo.png" class="img-fluid" />
                  </a>
               </div>
               <div class="col">
                  <a href="<?php echo $addresslink;?>" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                    Address
                  </a>
               </div>
               <div class="col">
                  <a href="<?php echo $profilelink;?>" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="feather-user"></i></p>
                     Profile
                  </a>
               </div>


            </div>
         </div>
         <?php }
         //echo "=========".$query1ans.'----'.$qty;
         if($query1ans == "restaurant"){
            ?>
             <div class="fixed-bottom p-3 cartItems">
            <?php
            if($qty>0){
            if(isset($_SESSION['tableno'])){
               ?>
               <a href="<?php echo $link->link('table_checkout',mobile,'&fid='.$_REQUEST['id']);?>" class="btn btn-success btn-block btn-lg text-white rounded shadow text-decoration-none d-flex align-items-center shadow">
               <div class="border-right pr-3">
                  <h4 class="m-0"><i class="feather-shopping-bag" aria-hidden="true"></i></h4>
               </div>
               <div class="ml-3 text-left">
                  <p class="mb-0 small text-white-50"><?php echo $qty; ?> item</p>
                  <p class="mb-0 font-weight-bold text-white"><?php echo $currency_symbol.number_format($pricep,2); ?></p>
               </div>
               <div class="ml-auto">
                  <p class="mb-0 text-white">Continue <i class="feather-chevron-right pl-2" aria-hidden="true"></i></p>
               </div>
            </a> 
           <?php }else{
            
            
            ?>
         <a href="<?php echo $link->link('checkout',mobile,'&fid='.$_REQUEST['id']);?>" class="btn btn-success btn-block btn-lg text-white rounded shadow text-decoration-none d-flex align-items-center shadow">
               <div class="border-right pr-3">
                  <h4 class="m-0"><i class="feather-shopping-bag" aria-hidden="true"></i></h4>
               </div>
               <div class="ml-3 text-left">
                  <p class="mb-0 small text-white-50"><?php echo $qty; ?> item</p>
                  <p class="mb-0 font-weight-bold text-white"><?php echo $currency_symbol.number_format($pricep,2); ?></p>
               </div>
               <div class="ml-auto">
                  <p class="mb-0 text-white">Proceed to cart <i class="feather-chevron-right pl-2" aria-hidden="true"></i></p>
               </div>
            </a> 
         <?php }} ?>
         </div>
     <?php } ?>


      </div>
      <nav id="main-nav">
         <ul class="second-nav">
            <!-- <li><a href=""><i class="feather-layers mr-2"></i> Carts</a></li>
            <li><a href=""><i class="feather-file-text mr-2"></i> Orders</a></li>
            <li><a href=""><i class="feather-map-pin mr-2"></i> Address</a></li> 
            <li><a href=""><i class="feather-user mr-2"></i> Profile</a></li>-->
            <li><a href="<?php echo $link->link('privacy',mobile); ?>"><i class="feather-award mr-2"></i> Privacy & Policy</a></li>
            <li><a href="<?php echo $link->link('terms',mobile); ?>"><i class="feather-edit-2 mr-2"></i> Terms & conditions</a></li>
            
               </ul>
            </li>
         </ul>
         <!-- <ul class="bottom-nav">
            <li class="email">
               <a class="text-danger" href="home.html">
                  <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                  Home
               </a>
            </li>
            <li class="github">
               <a href="faq.html">
                  <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                  FAQ
               </a>
            </li>
            <li class="ko-fi">
               <a href="contact-us.html">
                  <p class="h5 m-0"><i class="feather-phone"></i></p>
                  Help
               </a>
            </li>
         </ul> -->
      </nav>
      <div class="modal" id="cousineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">

      <div class="modal-content">
               <div class="modal-header align-items-center">
                  <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                  <button type="button" class="close" id="closeFilterModal" aria-label="Close">
                  <i class="feather-x float-right"></i>
                  </button>
               </div>
               <div class="modal-body p-0">
                  <div class="osahan-filter">
                     <div class="filter">
                        <div class="filters-body">
                           <div id="accordion">
                              <div class="filters-card border-bottom">
                                 <div class="filters-card-header" id="headingTwo">
                                    <h6 class="mb-0">
                                       <a href="#" class="btn-link p-3" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                                       All cuisines
                                       <i class="feather-chevron-down float-right"></i>
                                       </a>
                                    </h6>
                                 </div>
                                 <div id="collapsetwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="filters-card-body pb-3 card-shop-filters">
                                       <form class="filters-search px-3">
                                          <div class="form-group mb-2 position-relative">
                                             <i class="feather-search"></i>
                                             <input type="text" class="form-control" onkeyup="filterMenu(this,event);" placeholder="Start typing to search...">
                                          </div>
                                       </form>
                                       <div class="cousineModalData"></div>
                                       </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer p-0 border-0 p-3">
                  <div class="col-6 m-0 pl-0 pr-1">                 
                     <button type="button" class="btn border btn-lg btn-block" onclick="menuClear(this,event);">Clear</button>
                  </div>
                  <div class="col-6 m-0 pr-0 pl-1">     
                     <button type="button" class="btn btn-primary btn-lg btn-block" onclick="menuApply(this,event);">Apply</button>
                  </div>
               </div>
            </div>


      </div>  
      </div>
      <div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="d-flex align-items-center justify-content-center vh-100 index-page">
<div class="text-center">
<a href="javascript:void(0);"><img src="<?php echo SITE_URL.'/assets/mobile/img/logo.png'; ?>" alt=""></a><br>
<div class="spinner"></div>
</div>
</div>
      </div>
    </div>
  </div>
</div>


      <!-- Bootstrap core JavaScript -->
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>js/kr.js"></script> 
      
   
      <script>
          <?php if($query1ans=='home'){ ?>
     $("#filter-fooder").keyup(function(){
	    // Retrieve the input field text and reset the count to zero
	    var filter = $(this).val(), count = 0;
	    // Loop through the comment list
	    $(".list-fooder").each(function(){
        // If the list item does not contain the text phrase fade it out
	        if ($(this).text().search(new RegExp(filter, "i")) < 0 && !$(this).data('search').match(filter)) {
	            $(this).fadeOut();
	        // Show the list item if the phrase matches and increase the count by 1
	        } 
            else if($(this).data('search').match(filter)){
                $(this).show();
	            count++; 
            }
            else {
	            $(this).show();
	            count++;
	        }
	    });
	    // Update the count
	    var numberItems = count;
	    $("#filter-count").text("Number of Comments = "+count);
        if(count==0){
          $(".noFooder").show();  
        }else{
            $(".noFooder").hide();   
        }
	});
   <?php } 
if($query1ans=='restaurant' || $query1ans=='test'){?>
 function fooderDish(fid,posturl) {
   //$("#loadingModal").modal('show');           
   $.ajax({
	          type: 'POST',
	          url: posturl,
	          cache:false,
	          data: "fooderPage="+fid,
	          success: function (data) {
                //console.log(data);
             var dishcontent=""; 
             var obj = JSON.parse(data);
             if(obj!=undefined){
               $.each(obj, function(key, value) {
                  var menu = key.split('___');
                  var menuname = menu['0'];
                  var items = menu['1'];
                   dishcontent += `<div class="row">
               <h6 class="mb-3 mt-3 col-md-12">`+menuname+` <small class="text-black-50">`+items+` ITEMS</small></h6>
               <div class="col-md-12 px-0 border-top">
                  <div class="bg-white mb-4">`;
                  $.each(value, function(k, v) {
                     dishcontent +=`<div class="p-3 border-bottom menu-list d-flex">
                  <div class="media">`;
                  if(v.image!=''){
                     dishcontent +=`<img src="`+v.image+`" alt="" class="mr-3 rounded-pill">`; 
                  }
                  dishcontent +=`<div class="media-body">
                              <h6 class="mb-1">`+v.productname+` `+v.product_type+`</h6>`;
                         if(v.proprice!='&#8377; '){
                           dishcontent +=`<p class="text-muted mb-0"> `+v.proprice+` &nbsp;&nbsp;<strike> `+v.price+`</strike></p>`;
                         }else{
                           dishcontent +=`<p class="text-muted mb-0">`+v.price+`</p>`;
                         }
                         dishcontent +=`</div></div>`;
                        
                        if(v.cartQty!=null){
                        
                        dishcontent +=`<span style="display:none;" class="ml-auto addDish" id="Add_`+v.encpid+`"><a href="javascript:void(0)" onclick="addToCart(this,event,'`+v.encfid+`','`+v.encmid+`','`+v.encpid+`','`+v.encpname+`','`+v.encfname+`','`+v.encprice+`','`+v.encproprice+`')" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>
                        <div class="osahan-quantity ml-auto addQty" id="Qty_`+v.encpid+`">
                           <input type="button" value="-" class="minus" onclick="lessQty(this,event,'`+v.encfid+`','`+v.encmid+`','`+v.encpid+`','`+v.encpname+`','`+v.encfname+`','`+v.encprice+`','`+v.encproprice+`')">
                           <input type="text" name="quantity" id="quantity`+v.encpid+`" value="`+v.cartQty+`" title="Qty" class="qty" size="4">
                           <input type="button" value="+" class="plus" onclick="moreQty(this,event,'`+v.encfid+`','`+v.encmid+`','`+v.encpid+`','`+v.encpname+`','`+v.encfname+`','`+v.encprice+`','`+v.encproprice+`')">
                        </div>`;
                        }
                        else {
                        dishcontent +=`<span class="ml-auto addDish" id="Add_`+v.encpid+`"><a href="javascript:void(0)" onclick="addToCart(this,event,'`+v.encfid+`','`+v.encmid+`','`+v.encpid+`','`+v.encpname+`','`+v.encfname+`','`+v.encprice+`','`+v.encproprice+`')" class="btn btn-outline-secondary btn-sm add-sm-btn">ADD</a></span>

                        <div class="osahan-quantity ml-auto addQty" id="Qty_`+v.encpid+`" style="display:none">
                           <input type="button" value="-" class="minus" onclick="lessQty(this,event,'`+v.encfid+`','`+v.encmid+`','`+v.encpid+`','`+v.encpname+`','`+v.encfname+`','`+v.encprice+`','`+v.encproprice+`')">
                           <input type="text" name="quantity" id="quantity`+v.encpid+`" value="1" title="Qty" class="qty" size="4">
                           <input type="button" value="+" class="plus" onclick="moreQty(this,event,'`+v.encfid+`','`+v.encmid+`','`+v.encpid+`','`+v.encpname+`','`+v.encfname+`','`+v.encprice+`','`+v.encproprice+`')">
                        </div>`;

                        }
                       dishcontent +=`</div>`;
                  });
                  dishcontent += `</div>
               </div>
            </div>`;
                });
                $("#dishContent").html(dishcontent);
             }
            }
	       });
            }
            $( document ).ready(function() {
               var fid = '<?php echo $_REQUEST['id']; ?>';
               var posturl = '<?php echo $link->link("ajax",mobile);?>';
               fooderDish(fid,posturl);
            });
   var menuidarr = new Array();
   function menuApply(t,e){
                $('input[name="menu_check[]"]:checked').each(function(i) {
                     menuidarr[i] = $(this).val();
                });
               var fid = '<?php echo $_REQUEST['id']; ?>';
               var posturl = '<?php echo $link->link("ajax",mobile,'&menuids=');?>'+menuidarr;
               fooderDish(fid,posturl);
               $("#cousineModal").modal('hide');
   }
   function menuClear(t,e){
      menuidarr = new Array();
      var fid = '<?php echo $_REQUEST['id']; ?>';
      var posturl = '<?php echo $link->link("ajax",mobile);?>';
      fooderDish(fid,posturl);
      $("#cousineModal").modal('hide');
      
   }
   function cusineFilter(t,e,fid){
      $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "cousineFilter="+fid,
	          success: function (data) {
               var obj = JSON.parse(data);
             if(obj!=undefined){
                var cmodaldata = "";
               var c=1;
               $.each(obj, function(key, value) {
                  var checkid = "";
                  //console.log(menuidarr.indexOf(value.menuid)+"------"+value.menuid+"===="+menuidarr);
                   if(menuidarr.indexOf(value.menuid)!= -1){  
                     checkid = "checked";
                   }
                  cmodaldata += `<div class="custom-control custom-checkbox p-0 filterListCousine">
                                          <input type="checkbox" name="menu_check[]" class="custom-control-input" value=`+value.menuid+` id="cb`+c+`" `+checkid+`>
                                          <label class="custom-control-label py-1 w-100 px-3" for="cb`+c+`">`+value.menu_name+` <small class="text-black-50">`+value.pcount+`</small></label>
                                       </div>`;
                                       c++;
               });
               $("#cousineModal").modal('show');
             $(".cousineModalData").html(cmodaldata);
             }
           }
	       });
          //console.log(menuid);
   }
   function filterMenu(t,e){
	    // Retrieve the input field text and reset the count to zero
	    var filter = $(t).val(), count = 0;
       // Loop through the comment list
	    $(".filterListCousine").each(function(){
        // If the list item does not contain the text phrase fade it out
	        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
	            $(this).fadeOut();
	        // Show the list item if the phrase matches and increase the count by 1
	        } 
            else {
	            $(this).show();
	            count++;
	        }
	    });
	    // Update the count
	    var numberItems = count;
	    $("#filter-count").text("Number of Comments = "+count);
      //   if(count==0){
      //     $(".noFooder").show();  
      //   }else{
      //       $(".noFooder").hide();   
      //   }
	}
   var checkedveg = new Array();
   $( document ).ready(function() {
   $("#vegDish").click(function(){
      var vtype = $(this).val();
      var filter = $("#filter-dish").val();
      var fid = '<?php echo $_REQUEST['id']; ?>';
      if($(this).prop('checked')==true){
            checkedveg.push(vtype);  
          }else{
            //checkedveg.splice($.inArray($(this).val(), checkedveg), 1);
            checkedveg = jQuery.grep(checkedveg, function(value) {
            return value != vtype;
            });
          }
          if (checkedveg.length > 0) {
            var posturl = '<?php echo $link->link("ajax",mobile,'&search=');?>'+filter+'&dishtype='+checkedveg;  
            fooderDish(fid,posturl);
            }else{
            var posturl = '<?php echo $link->link("ajax",mobile,'&search=');?>'+filter; 
            fooderDish(fid,posturl); 
            }
   });
   });
   $( document ).ready(function() {
   $("#nonVegDish").click(function(){
      var vtype = $(this).val();
      var filter = $("#filter-dish").val();
      var fid = '<?php echo $_REQUEST['id']; ?>';
      if($(this).prop('checked')==true){
            checkedveg.push(vtype);  
          }else{
            //checkedveg.splice($.inArray($(this).val(), checkedveg), 1);
            checkedveg = jQuery.grep(checkedveg, function(value) {
            return value != vtype;
            });
          }
          if (checkedveg.length > 0) {
            var posturl = '<?php echo $link->link("ajax",mobile,'&search=');?>'+filter+'&dishtype='+checkedveg; 
            fooderDish(fid,posturl);   
            }else{
            var posturl = '<?php echo $link->link("ajax",mobile,'&search=');?>'+filter; 
            fooderDish(fid,posturl); 
            }
            
   });
   });
$( document ).ready(function() {
     $("#filter-dish").keyup(function(){
       // Retrieve the input field text and reset the count to zero
       $("#searchClose").show();
	    var filter = $(this).val();
       var fid = '<?php echo $_REQUEST['id']; ?>';
	    var posturl = '<?php echo $link->link("ajax",mobile,'&search=');?>'+filter;
       fooderDish(fid,posturl);
	});
     });
     $( document ).ready(function() {
         $("#closeFilterModal").click(function(){
            $("#cousineModal").modal('hide');
         });
         });
      $( document ).ready(function() {
         $("#searchClose").click(function(){
            var filter = $("#filter-dish").val('');
            var fid = '<?php echo $_REQUEST['id']; ?>';
            //console.log(checkedveg);
           var posturl = '<?php echo $link->link("ajax",mobile,'&dishtype=');?>'+checkedveg; 
           fooderDish(fid,posturl);  
           $("#searchClose").hide(); 
         });

      });
     function addToCart(t,e,fid,mid,pid,pname,fname,price,proprice){
        $("#loadingModal").modal('show');
      $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "basketdata="+fid+"&mid="+mid+"&pid="+pid+"&pname="+pname+"&fname="+fname+"&price="+price+"&proprice="+proprice,
	          success: function (data) {
             var obj = JSON.parse(data);
             if(obj!=undefined){
                  $(".cartItems").html(`<a href="`+obj.checkoutlink+`" class="btn btn-success btn-block btn-lg text-white rounded shadow text-decoration-none d-flex align-items-center shadow">
               <div class="border-right pr-3">
                  <h4 class="m-0"><i class="feather-shopping-bag" aria-hidden="true"></i></h4>
               </div>
               <div class="ml-3 text-left">
                  <p class="mb-0 small text-white-50">`+obj.totalqty+` item</p>
                  <p class="mb-0 font-weight-bold text-white">`+obj.totalprice+`</p>
               </div>
               <div class="ml-auto">
                  <p class="mb-0 text-white">Proceed to cart <i class="feather-chevron-right pl-2" aria-hidden="true"></i></p>
               </div>
            </a> `);
               $("#loadingModal").modal('hide');
               $("#quantity"+pid).val(obj.qty);
                $("#Add_"+pid).hide();
                $("#Qty_"+pid).show();
             }
             $(".cartItems").show();
	              }
	       });
     }
     function moreQty(t,e,fid,mid,pid,pname,fname,price,proprice){
        $("#loadingModal").modal('show');
        var qty = $("#quantity"+pid).val();
      $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "qtyPlus="+fid+"&mid="+mid+"&pid="+pid+"&pname="+pname+"&fname="+fname+"&price="+price+"&proprice="+proprice,
	          success: function (data) {
               var obj = JSON.parse(data);
             if(obj!=undefined){
                  $(".cartItems").html(`<a href="`+obj.checkoutlink+`" class="btn btn-success btn-block btn-lg text-white rounded shadow text-decoration-none d-flex align-items-center shadow">
               <div class="border-right pr-3">
                  <h4 class="m-0"><i class="feather-shopping-bag" aria-hidden="true"></i></h4>
               </div>
               <div class="ml-3 text-left">
                  <p class="mb-0 small text-white-50">`+obj.totalqty+` item</p>
                  <p class="mb-0 font-weight-bold text-white">`+obj.totalprice+`</p>
               </div>
               <div class="ml-auto">
                  <p class="mb-0 text-white">Proceed to cart <i class="feather-chevron-right pl-2" aria-hidden="true"></i></p>
               </div>
            </a> `);
               $("#loadingModal").modal('hide');
               $("#quantity"+pid).val(obj.qty);
                $("#Add_"+pid).hide();
                $("#Qty_"+pid).show();
             }

                $("#loadingModal").modal('hide');
                $(".cartItems").show();
	              }
	       });
     }
     function lessQty(t,e,fid,mid,pid,pname,fname,price,proprice,qty){
        $("#loadingModal").modal('show');
        var lqty = $("#quantity"+pid).val();
      $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "qtyMinus="+fid+"&mid="+mid+"&pid="+pid+"&pname="+pname+"&fname="+fname+"&price="+price+"&proprice="+proprice,
	          success: function (data) {
               var obj = JSON.parse(data);
               //console.log(obj.totalqty+"======"+obj.totalqty.length);

             if(obj!=undefined){
                  $(".cartItems").html(`<a href="`+obj.checkoutlink+`" class="btn btn-success btn-block btn-lg text-white rounded shadow text-decoration-none d-flex align-items-center shadow">
               <div class="border-right pr-3">
                  <h4 class="m-0"><i class="feather-shopping-bag" aria-hidden="true"></i></h4>
               </div>
               <div class="ml-3 text-left">
                  <p class="mb-0 small text-white-50">`+obj.totalqty+` item</p>
                  <p class="mb-0 font-weight-bold text-white">`+obj.totalprice+`</p>
               </div>
               <div class="ml-auto">
                  <p class="mb-0 text-white">Proceed to cart <i class="feather-chevron-right pl-2" aria-hidden="true"></i></p>
               </div>
            </a> `);
               $("#loadingModal").modal('hide');
               $("#quantity"+pid).val(obj.qty);
               if(obj.qty==0){
                  $("#Add_"+pid).show();
                $("#Qty_"+pid).hide();
               }
             }
             if(obj.totalqty=='0'){
               $("#Add_"+pid).show();
                $("#Qty_"+pid).hide();
                $(".cartItems").hide();
             }
                 }
	       });
     }
     <?php  if(isset($_REQUEST['tableno']) && $db->exists('fooders_tables',array('table_uniqueid'=>$_REQUEST['tableno'],'fooder_id'=>$fooderid)) ){ ?>

     function getLocation() {
         if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition,showError);
         } else { 
            //x.innerHTML = "Geolocation is not supported by this browser.";
         }
      }
      function showPosition(position) {
         // x.innerHTML="Latitude: " + position.coords.latitude + 
         // "<br>Longitude: " + position.coords.longitude;
        //console.log(position.coords.latitude+"===="+position.coords.longitude+"----"+position.timestamp);
        if(position.coords.latitude!=''){
           var tableno = '<?php echo $gettable; ?>';
           var tunique = '<?php echo $_REQUEST['tableno']; ?>';
           var fid = '<?php echo $fooderid; ?>';
           var lat = position.coords.latitude;
           var lng = position.coords.longitude;
           var geotime = position.timestamp; 
            $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
             data: "userLocation="+fid+"&tableno="+tableno+"&tunique="+tunique+"&lat="+lat+"&lng="+lng+"&time="+geotime,
	          success: function (data) {
              console.log(data);
              window.location = '<?php if($query1ans=='restaurant') echo $link->link('restaurant',mobile,'&id='.$_REQUEST['id']); else header('Location:'.SITE_URL.'/'.$searchterm);  ?>';
                 }
	       });
        }

      }
      function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      
      break;
    case error.POSITION_UNAVAILABLE:
     // x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      //x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
     // x.innerHTML = "An unknown error occurred."
      break;
  }
}
$( document ).ready(function() {
   getLocation();
   console.log("ghfghfg");
  });


     

<?php } 
if(isset($_SESSION['tableno'])){
   ?>
function callWaiter(e,t,table,fid){
        
    
      $.ajax({ 
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
             data: "callWaiter="+fid+"&table="+table,
	          success: function (data) {
              console.log(data);
                 }
	       });
     }
   <?php 
}
} ?>
<?php if($query1ans=='checkout'){ ?>
   function moreQty(t,e,fid,mid,pid,pname,fname,price,proprice){
        $("#loadingModal").modal('show');
        var qty = $("#quantity"+pid).val();
      $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "qtyPlus="+fid+"&mid="+mid+"&pid="+pid+"&pname="+pname+"&fname="+fname+"&price="+price+"&proprice="+proprice+"&page=checkout",
	          success: function (data) {
               var obj = JSON.parse(data);
             if(obj!=undefined){
               $(".checkPrice_"+pid).html(obj.qtyprice);
               $(".itemTotal").html(obj.totalprice);  
               $(".totalQty").html(obj.totalqty);
               $("#loadingModal").modal('hide');
               $("#quantity"+pid).val(obj.qty);
               $("#serviceCharge").html(obj.service_charge);
               $("#cgst").html(obj.cgst);
               $("#sgst").html(obj.sgst);
               $("#grandamt").val(obj.gtotal);
               $(".toPay").html(obj.topay);
               $(".promoCode").val('');
               $(".discount").html('');
               $(".promoErr").html('');  
               storecart();
             }
            $("#loadingModal").modal('hide');
                 }
	       });
     }
     function lessQty(t,e,fid,mid,pid,pname,fname,price,proprice,qty){
        $("#loadingModal").modal('show');
        var lqty = $("#quantity"+pid).val();
      $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "qtyMinus="+fid+"&mid="+mid+"&pid="+pid+"&pname="+pname+"&fname="+fname+"&price="+price+"&proprice="+proprice+"&page=checkout",
	          success: function (data) {
               var obj = JSON.parse(data);
             if(obj!=undefined){
               $(".checkPrice_"+pid).html(obj.qtyprice); 
               $(".itemTotal").html(obj.totalprice);  
               $(".totalQty").html(obj.totalqty);  
               $("#loadingModal").modal('hide');
               $("#quantity"+pid).val(obj.qty);
               $("#serviceCharge").html(obj.service_charge);
               $("#cgst").html(obj.cgst);
               $("#sgst").html(obj.sgst);
               $("#grandamt").val(obj.gtotal);
               $(".toPay").html(obj.topay);
               $(".promoCode").val('');
               $(".discount").html('');
               $(".promoErr").html('');  
               storecart();
               if(obj.qty==0){
                  $(".removeRow_"+pid).remove();
               }
             }
             if(obj.totalqty=='0'){
               
             }
                 }
	       });
     }
     function applyPromo(t,e,fid){
        var promocode = $(".promoCode").val();
        var subtot =  $("#grandamt").val();
        if($.trim(promocode)==''){
           $(".promoErr").text('Please enter promocode');
        }else{
         $(".promoErr").text('');
         $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "promoApply="+fid+"&promocode="+promocode+"&grandtotal="+subtot,
	          success: function (data) {
             //console.log(data);
            if(data!=''){
               var obj = JSON.parse(data);
              if(obj!=undefined){
                if(obj.error=='1'){
                  $(".promoErr").html(obj.message);  
                }else{
                   if(obj.discount_type=='1'){
                      var dis = obj.discount+'%';
                   }else{
                      var dis = '';
                   }
                   $(".discount").html('DISCOUNT <span id="disctype">'+dis+'</span> <span class="float-right text-dark" id="discountamt">'+obj.discount_amount+'</span>');
                     $("#serviceCharge").html(obj.service_charge);
                     $("#cgst").html(obj.cgst);
                     $("#sgst").html(obj.sgst);
                     $(".toPay").html(obj.topay);
                     $(".promoErr").html('');  
                     storecart();
                } 
              }
             }else{

             }
             
                 }
	       });
        }
        //console.log(couponcode);
     }
     function storecart(){ //stores items in the localStorage
    var suggestion = $("#suggestion").val();
    var sch = $("#serviceCharge").html();
    var cgst = $("#cgst").html();
    var sgst = $("#sgst").html();
    var promocode = $(".promoCode").html();
    var disamt = $("#discountamt").html();
    var distype = $("#disctype").html();
    var topay = $(".toPay").html();
    var subtot = $(".itemTotal").html();
    const cart = {
      suggestion: suggestion,
      sch: sch,
      cgst: cgst,
      sgst: sgst,
      disamt: disamt,
      distype: distype,
      subtot: subtot,
      topay: topay,
    }
    window.localStorage.setItem('CartData',JSON.stringify(cart));  
    //converting object to string
   }
  function proceedCheckout(){
   storecart(); 
  } 
  $( document ).ready(function() {
   storecart();
  });
  //localStorage.clear();
  
<?php }?>
console.log(localStorage.getItem('CartData'));

<?php if(isset($_SESSION['tableno']) && $_SESSION['tableno']!=''){ ?>



<?php } ?>

 </script>

   </body>
</html>