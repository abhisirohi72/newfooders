<!DOCTYPE html>
<html lang="en">
   <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php if(is_array($fooders_complete_details) && count($fooders_complete_details)!==0){
    	echo " <title>";
    	if($menu_name!='')
    	{echo $menu_name." at ";}
    	echo fooder_title.", ".$get_full_address['region'].', '.$get_full_address['city']." Khate Raho";
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="<?php if($menu_name!=''){ echo "Enjoy Your Favourite ".$menu_name." at ".fooder_title." | ".fooder_keyword;} else {echo fooder_description;}?>">
    <meta name="keywords" content="<?php echo fooder_keyword;?>">
    <?php }
    else{?>
    	<title>Online Food Destination - Top Rated Restaurants, Khana, Bakeries, Cakes, Petha, Sweets in Agra at <?php echo Appname;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Khate Raho Connecting Eaters With Fooders - Order Food Online From Top Rated Restaurants, Bakers &amp; Confectioners in Agra With Free Home Delivery or Take Away. Discover Food & Restaurants in Agra &amp; Rate Them">
    <meta name="keywords" content="dosa in agra, agra restaurants, petha in agra, online khana, food delivery agra, order food online agra, methai sweets in agra">
    <?php }?>
   <meta name="author" content="<?php echo SITENAME;?>">
    <meta name="generator" content="<?php echo Appname;?>">
     <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/slick/slick-theme.min.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
      <!-- Feather Icon-->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/icons/feather.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/sidebar/demo.css" rel="stylesheet">
      <!-- Flag Mobile Number -->
      <link rel="stylesheet" href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/build/css/intlTelInput.css">
      <link rel="stylesheet" href="<?php echo SITE_URL.'/assets/mobile/';?>vendor/build/css/demo.css">
   </head>
   <body>
      <div class="osahan-verification">
         <div class="p-3 osahan-inner-header bg-white shadow-sm">
            <div class="d-flex align-items-center">
               <a class="font-weight-bold text-dark text-back text-decoration-none d-flex" href="<?php echo $link->link('login',mobile);?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="back-page bi bi-chevron-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                  </svg>
                  <span class="pl-2">Back to login</span>
               </a>
               <div class="ml-auto d-flex align-items-center">
                  <!--<a class="text-dark mx-2 top-nav-btn top-nav-btn-cart fs-18 position-relative" href="contact-us.html"><i class="feather-help-circle"></i></a>
                  <a class="toggle ml-2 text-dark hc-nav-trigger hc-nav-1" href="#" role="button" aria-controls="hc-nav-1">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                     </svg>
                  </a>-->  
               </div>
            </div>
         </div>
         <!-- <div class="verify_number p-4">
            <h2 class="mb-3">Verify your<br>phone number</h2>
            <h6 class="text-black-50">Enter your OTP code here</h6>
            <form action="landing.html">
               <div class="row my-5 mx-0">
                  <div class="col pr-1 pl-0">
                     <input type="number" value="4" class="form-control form-control-lg">
                  </div>
                  <div class="col px-2">
                     <input type="number" value="0" class="form-control form-control-lg">
                  </div>
                  <div class="col px-2">
                     <input type="number" value="8" class="form-control form-control-lg">
                  </div>
                  <div class="col pl-1 pr-0">
                     <input type="number" value="0" class="form-control form-control-lg">
                  </div>
               </div>
               <button class="btn btn-lg btn-primary btn-block">Verify Now</button>
            </form>
         </div> -->
         <div class="verify_number p-4">
            <?php //echo "=====".$feature->encrypt_decrypt('decrypt',$_REQUEST['eaterid']); ?>
             <h2 class="mb-3">Verify your<br>phone number</h2>
             <h6>Enter your OTP code here</h6>
             <input type="hidden" class="verifyEaterId" value="`+data+`">
                <div class="row my-5 mx-0">
                   <div class="col pr-1 pl-0">
                      <input type="number" class="form-control digit otp1 form-control-lg"  maxLength="1">
                   </div>
                   <div class="col px-2">
                      <input type="number"  class="form-control digit otp2 form-control-lg" maxLength="1">
                   </div>
                  <div class="col px-2">
                     <input type="number"  class="form-control digit otp3 form-control-lg" maxLength="1">
                   </div>
                  <div class="col pl-1 pr-0">
                      <input type="number" class="form-control digit otp4 form-control-lg" maxLength="1">
                   </div>
                   <span class="loginErr" style="color:#fff;"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" onclick="verifyOtp()">Verify Now</button>
            </div>
         <div class="fixed-bottom text-center p-3">
            <p class="text-black mb-1">By continuing, you agree to our</p>
            <p class="small">
               <a class="text-black-50 border-bottom" href="<?php echo $link->link('terms',mobile);?>">Terms of Service</a>
               <a class="text-black-50 border-bottom mx-3" href="<?php echo $link->link('privacy',mobile);?>">Privacy Policy</a>
               <!--<a class="text-white-50 border-bottom" href="terms.html">Content Policies</a>-->
            </p>
         </div>
      </div>
       <!-- Bootstrap core JavaScript -->
     <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/sidebar/hc-offcanvas-nav.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
      <!-- Flag Number-->
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/build/js/intlTelInput.js"></script> 
      <!-- Custom scripts for all pages-->
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>js/osahan.js"></script> 
<script>
$(".digit").each(function(){
$(this).keypress(function (e) {
	var valueLength = this.value.length;
	if (valueLength == 1) {
		return false;
//$(this).next('input').focus();
	}
	var kk = e.which;
	if (kk < 48 || kk > 57)
		e.preventDefault();
});
});
   function verifyOtp(){
      var otp1 = $(".otp1").val();
      var otp2 = $(".otp2").val();
      var otp3 = $(".otp3").val();
      var otp4 = $(".otp4").val();
      var eaterid = '<?php echo $_REQUEST['eaterid']; ?>';
      if(otp1.length=='0' || otp2.length=='0' || otp3.length=='0' || otp4.length=='0'){
        $(".loginErr").text('Please enter otp');
      }else{
         $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "verifyOtp="+eaterid+"&otp1="+otp1+"&otp2="+otp2+"&otp3="+otp3+"&otp4="+otp4,
	          success: function (data) {
                console.log(data);
              if($.trim(data)=='error'){
               $(".loginErr").text('Otp is wrong');
              }else{
                window.location = '<?php echo $link->link('checkout',mobile,'&fid='.$_REQUEST['fid']); ?>';
              }
                 }
	       }); 
      }
   }
</script>
</body>
</html>
      