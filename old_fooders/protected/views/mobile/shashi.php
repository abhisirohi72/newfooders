
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
    <style>
        body
        {
         overflow:hidden;
        }
        .homebg 
        {
                background-image: url(../assets/mobile/img/loginbg.jpg); 
                background-size: cover;
                background-repeat: no-repeat;
                background-position: top;
         }
    </style>

      <div class="login-page vh-100">
       <div class="homebg">
         <div class="p-4 login-page-form">
            <h2 class="text-white my-0">Welcome Back</h2>
            <p class="text-white text-50">Sign in to continue</p>
            <?php //echo "<pre>",print_r($_SESSION),"</pre>"; ?>
            <div id="loginMobile">
            <div class="form-group phone-z mb-3 position-relative">
                  <input class="form-control controlcss nameLogin" name="name" placeholder="Enter Name" type="text">
               </div>   
            <div class="form-group phone-z mb-3 position-relative">
                  <input id="phone12" class="form-control controlcss phoneLogin" name="phone" placeholder="Phone Number (only 10 digits)" type="tel">
               </div>
               <span class="loginErr" style="color:#fff;"></span>
               <button type="submit" class="btn btn-primary btn-lg btn-block sendOtp">Send OTP</button>
               
               </div>
               <!-- <a class="verification.html" class="font-decoration-none">Send OTP</a> -->
         </div>
         
         <div class="fixed-bottom text-center p-3">
            <p class="text-white mb-1">By continuing, you agree to our</p>
            <p class="small">
               <a class="text-white-50 border-bottom" href="<?php echo $link->link('terms',mobile);?>">Terms of Service</a>
               <a class="text-white-50 border-bottom mx-3" href="<?php echo $link->link('privacy',mobile);?>">Privacy Policy</a>
               <!--<a class="text-white-50 border-bottom" href="terms.html">Content Policies</a>-->
            </p>
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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
      <!-- Flag Number-->
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>vendor/build/js/intlTelInput.js"></script> 
      <!-- Custom scripts for all pages-->
      <script src="<?php echo SITE_URL.'/assets/mobile/';?>js/osahan.js"></script> 
      <script>
         $(".phoneLogin").keypress(function (e) {
	var valueLength = this.value.length;
	if (valueLength == 10) {
		return false;
	}
	var kk = e.which;
	if (kk < 48 || kk > 57)
		e.preventDefault();
});

   $(".sendOtp").click(function(){
      var name = $(".nameLogin").val();
      var phone = $(".phoneLogin").val();
      if($.trim(name).length=='0'){
         $(".loginErr").text("Please enter name.");
      }
      else if($.trim(phone).length=='0'){
         $(".loginErr").text("Please enter phone number.");
      }else{
         $(".loginErr").text("");
         $.ajax({
	          type: 'POST',
	          url: '<?php echo $link->link("ajax",mobile);?>',
	          cache:false,
	          data: "sendOtp="+name+"&phone="+phone,
	          success: function (data) {
              if($.trim(data)=='error'){
               
              }else{
                 window.location = '<?php echo $link->link('verification',mobile,'&fid='.$_REQUEST['fid'].'&page='.$_REQUEST['page'].'&eaterid='); ?>'+data;
            //      $("#loginMobile").html(`<div class="osahan-verification"><div class="verify_number p-4">
            // <h2 class="mb-3" style="color:#fff;">Verify your<br>phone number</h2>
            // <h6 style="color:#fff;">Enter your OTP code here</h6>
            // <input type="hidden" class="verifyEaterId" value="`+data+`">
            //    <div class="row my-5 mx-0">
            //       <div class="col pr-1 pl-0">
            //          <input type="number" value="" class="form-control otp1 form-control-lg" max="1">
            //       </div>
            //       <div class="col px-2">
            //          <input type="number" value="" class="form-control otp2 form-control-lg"  max="1">
            //       </div>
            //       <div class="col px-2">
            //          <input type="number" value="" class="form-control otp3 form-control-lg"  max="1">
            //       </div>
            //       <div class="col pl-1 pr-0">
            //          <input type="number" value="" class="form-control otp4 form-control-lg"  max="1">
            //       </div>
            //       <span class="loginErr" style="color:#fff;"></span>
            //    </div>
            //    <button class="btn btn-lg btn-primary btn-block" onclick="verifyOtp()">Verify Now</button></div></div>`);
              }
                 }
	       });
      }
   });
   function verifyOtp(){
      var otp1 = $(".otp1").val();
      var otp2 = $(".otp2").val();
      var otp3 = $(".otp3").val();
      var otp4 = $(".otp4").val();
      var eaterid = $(".verifyEaterId").val();
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
                //window.location = '<?php echo $link->link('checkout',mobile,'&fid='.$_REQUEST['fid']); ?>';
              }
                 }
	       }); 
      }
   }
      </script>
   </body> 
</html>