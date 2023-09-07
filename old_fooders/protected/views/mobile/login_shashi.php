
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <link rel="icon" type="image/png" href="img/logo.png">
      <title>Sakafo - Online Food Ordering & Restaurant Website Mobile Template</title>
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
      <div class="login-page vh-100">
         <video loop autoplay muted id="vid">
            <source src="<?php echo SITE_URL.'/assets/mobile/img/';?>bg.mp4" type="video/mp4">
            <source src="<?php echo SITE_URL.'/assets/mobile/img/';?>bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
         <div class="p-4 login-page-form">
            <h2 class="text-white my-0">Welcome Back</h2>
            <p class="text-white text-50">Sign in to continue</p>
            <form class="mt-5 mb-4" action="">
            <div class="form-group phone-z mb-3 position-relative">
                  <input  class="form-control controlcss" name="name" placeholder="Enter Name" type="text">
               </div>   
            <div class="form-group phone-z mb-3 position-relative">
                  <input id="phone12" class="form-control controlcss phoneLogin" name="phone" placeholder="Phone Number (only 10 digits)" type="tel">
               </div>
               <button class="btn btn-primary btn-lg btn-block"><a class="verification.html" class="font-decoration-none">Send OTP</a></button>
              <!-- <div class="or-osahan text-center my-4 border-bottom">
                  <span>OR</span> 
               </div>
               <div class="mb-3">
                  <button class="btn btn-lg btn-light btn-block">
                  <img src="img/envelope.svg" alt=""> Continue with Email
                  </button>
               </div>
               <div class="mb-3">
                  <button class="btn btn-lg btn-light btn-block">
                  <img src="img/apple-logo.svg" alt=""> Continue with Apple
                  </button>
               </div>
               <div class="mb-3">
                  <div class="row">
                     <div class="col-6 pr-1">
                        <button class="btn btn-lg btn-light btn-block">
                        <img src="img/facebook.svg" alt=""> Facebook
                        </button>
                     </div>
                     <div class="col-6 pl-1">
                        <button class="btn btn-lg btn-light btn-block">
                        <img src="img/search.svg" alt=""> Google
                        </button>
                     </div>
                  </div>
               </div>-->
            </form>
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
      </script>
   </body> 
</html>