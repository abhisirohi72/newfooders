<!DOCTYPE HTML>
<html>

<head>
      <title>Online Food Destination - Top Rated Restaurants, Khana, Bakeries, Cakes, Petha, Sweets in Agra at Khateraho.com</title>
  <meta charset="utf-8">
    <link rel="dns-prefetch" href="http://www.khateraho.com/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="google-site-verification" content="nmt55-J6F_ICZTElJHpAAiTjsh526esjiT7zBJwHZBg" />
<meta name="msvalidate.01" content="C913036C69A5AFA9F15C9473BF8CE6A4" />
<meta name="norton-safeweb-site-verification" content="p8nor9tidcv-vqmuo6c845ezj0lhf9dlealrqgctcpwqm12ky-y7m8f0c0vqs49z1rfdbageusqk3ul3b35ddcfc0427xyoekv3twlplwefa409226g5s7gg7lyp2y50" />
<meta name="wot-verification" content="93482af546e4674208df"/>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  
     
    <meta name="description" content="Khate Raho Connecting Eaters With Fooders - Order Food Online From Top Rated Restaurants, Bakers &amp; Confectioners in Agra With Free Home Delivery or Take Away. Discover Food & Restaurants in Agra &amp; Rate Them">
    <meta name="keywords" content="dosa in agra, agra restaurants, petha in agra, online khana, food delivery agra, order food online agra, methai sweets in agra">
  

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="assets/eaters/home/css/bootstrap.css">
    <link rel="stylesheet" href="assets/eaters/home/css/font-awesome.css">
    <link rel="stylesheet" href="assets/eaters/home/css/icomoon.css">
    <link rel="stylesheet" href="assets/eaters/home/css/styles.css">
    <link rel="stylesheet" href="assets/eaters/home/css/mystyles.css">
    <script src="assets/eaters/home/js/modernizr.js"></script>

 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-49965090-1', 'khateraho.com');

  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script> 
</head>

<body>
 
    <div class="global-wrap">
        

        <div class="bg-holder">
            <div class="bg-mask-darken"></div>
            <div class="bg-parallax"></div>
            <!-- START GRIDROTATOR -->
            <div class="ri-grid" id="ri-grid">
                <ul>
                <?php $fooderids=$db->get_col('fooders','id');
                foreach($fooderids as $value)
                {
                ?>
<?php if(file_exists(SERVER_ROOT."/uploads/fooders/".$value."/logo/logo.jpg")){?>
                    <li>
                        <a href="#">
                            <img style="width:100%;height:auto;" src="<?php echo SITE_URL;?>/uploads/fooders/<?php echo $value;?>/logo/logo.jpg"  />
                        </a>
                    </li>
                    <?php }}?>
                </ul>
            </div>
            <!-- END GRIDROTATOR -->
            <div class="bg-front full-center">
                <div class="container">
                    <div class="search-tabs search-tabs-bg">
                        <h1 class="logo" >  <img src="http://khateraho.com/assets/eaters/img/krlogo.png" alt="Image Alternative text" title="Image Title" /> The Online Food Destination</h1>
                        <div class="tabbable">
                            
                            <div class="tab-content">
                               
                                
                                <div class="tab-pane active" id="tab-5">
                                    <h2>What Do You have The Taste For ?</h2>
                                    <form name="srch" method="post" action="<?php echo $link->link('fooders_search_results',eaters);?>">
                                     <input type="hidden" name="search_data" value="search_data_val" />
                    <input type="hidden" name="search_data_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" />
                
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-cutlery input-icon"></i>
                                                    <label>Search by cuisine, location or restaurant</label>
                                                    <input name="search" required="required"  pattern=".{3,}" required title="3 characters minimum" class="form-control"  type="text" />
                                                </div>
 <input class="btn btn-primary btn-lg" type="submit" name="killhunger" value="Kill My Hunger" >
                                            </div>
<div class="col-md-4">

<iframe width="560" height="315" src="//www.youtube.com/embed/hntIxFTmqkc" frameborder="0" allowfullscreen></iframe>
</div>
                                            
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
        </div>
        <div class="bg-color text-white">
            <div class="container">
                <div class="gap"></div>
                <div class="row row-wrap" data-gutter="120">
                    <div class="col-md-4">
                        <div class="thumb">
                            <header class="thumb-header"><i class="fa fa-thumbs-o-up box-icon-border round box-icon-white box-icon-big"></i>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Become An Eater</h4>
                                <p class="thumb-desc">Khateraho connects you to a number of Restaurants, Bakers, Petha Stores etc. in order to provide you the perfect food, you want.<br><a href="<?php echo $link->link('access',eaters);?>">Click here to join</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumb">
                            <header class="thumb-header"><i class="fa fa-cutlery box-icon-border round box-icon-white box-icon-big"></i>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Best Food & Recipes</h4>
                                <p class="thumb-desc">Learn delicious recipes on the go with khateraho mobile. Become a cook in less than a minute, post your recipes and much more... </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumb">
                            <header class="thumb-header"><i class="fa fa-inr box-icon-border round box-icon-white box-icon-big"></i>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Best Price Guarantee</h4>
                                <p class="thumb-desc">KR team always stays up to date with the fooders and make sure our eaters get the best food deals at appropriate prices. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gap gap-small"></div>
            </div>
        </div>
        
        <div class="container">
            <div class="gap"></div>
            <h2 class="text-center mb20">Top Fooders</h2>
            <div class="row row-wrap">
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header">
                            <a class="hover-img curved" href="http://khateraho.com/aahar">
                                <img style="height:200px;" src="http://khateraho.com/uploads/fooders/2/logo/logo.jpg"/>
                                <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                            </a>
                        </header>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">Aahar</h4>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header">
                            <a class="hover-img curved" href="http://khateraho.com/index.php?eaters=fooder&fooder_profile_token=59">
                                <img style="height:200px;" src="http://khateraho.com/uploads/fooders/59/logo/logo.jpg?638220874"/>
                                <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                            </a>
                        </header>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">Satkar Pastries</h4>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header">
                            <a class="hover-img curved" href="http://khateraho.com/harichatni">
                                <img style="height:200px;" src="http://khateraho.com/uploads/fooders/16/logo/logo.jpg?2096952497" />
                                <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                            </a>
                        </header>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">Hari Chatni</h4>
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header">
                            <a class="hover-img curved" href="http://khateraho.com/mamafrankyhouse">
                                <img style="height:200px;" src="http://khateraho.com/uploads/fooders/71/logo/logo.jpg?1423880802" />
                                <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                            </a>
                        </header>
                        <div class="thumb-caption">
                            <h4 class="thumb-title">Mama Franky House</h4>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>



        <footer id="main-footer">
            <div class="container">
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <a class="logo" href="index.html">
                            <img src="http://khateraho.com/assets/eaters/img/krlogo.png" alt="Image Alternative text" title="Image Title" />
                        </a>
                        <p class="mb20">Connecting Eaters With Fooders.
                        <br>Order Food Online From Top Rated Restaurants, Bakers &amp; Confectioners in Agra With Free Home Delivery or Take Away. Discover Food & Restaurants in Agra &amp; Rate Them</p>
                                  <?php 
         $get_social_links = $db->get_row('setting');
         ?>
                        <ul class="list list-horizontal list-space">
                            <li>
                                <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="<?php echo $get_social_links['facebook'];?>" target="_blank" ></a>
                            </li>
                            <li>
                                <a href="<?php echo $get_social_links['twitter'];?>"  target="_blank" class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" ></a>
                            </li>
                            <li>
                                <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="<?php echo $get_social_links['google_plus'];?>" target="_blank" ></a>
                            </li>
                           
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h4>Own A Restaurant, Bakery, Petha Store, Catering or any food business ?</h4>
                        
                       
                            </p>
                            <a href="<?php echo $link->link('register',fooders);?>"  class="btn btn-primary" >Click To Join</a>
                        
                    </div>
                    <div class="col-md-2">
                        <ul class="list list-footer">
                        <li><a href="<?php echo $link->link('fooders_business',eaters);?>">For Food Owners</a>
                            </li>
                            <li><a href="<?php echo $link->link('eaters_info',eaters);?>">For Food Lovers</a>
                            </li>
                            
                            
                            <li><a href="<?php echo $link->link('contact',eaters);?>">Customer Care</a>
                            </li>
                            <li><a href="<?php echo $link->link('privacy-policy',eaters);?>">Privacy Policy</a>
                            </li>
                            <li><a href="<?php echo $link->link('terms',eaters);?>">Terms of Use</a>
                            </li>
                            <li><a href="<?php echo $link->link('open_recipes',eaters);?>">Recipes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Have Questions?</h4>
                        <h4 class="text-color">+91-562-4055645</h4>
                        <h4><a href="#" class="text-color">info@khateraho.com</a></h4>
                        <p>Dedicated Customer Support</p>
                    </div>

                </div>
            </div>
        </footer>

        <script src="assets/eaters/home/js/jquery.js"></script>
        <script src="assets/eaters/home/js/bootstrap.js"></script>
        <script src="assets/eaters/home/js/slimmenu.js"></script>
        <script src="assets/eaters/home/js/bootstrap-datepicker.js"></script>
        <script src="assets/eaters/home/js/bootstrap-timepicker.js"></script>
        <script src="assets/eaters/home/js/nicescroll.js"></script>
        <script src="assets/eaters/home/js/dropit.js"></script>
        <script src="assets/eaters/home/js/ionrangeslider.js"></script>
        <script src="assets/eaters/home/js/icheck.js"></script>
        <script src="assets/eaters/home/js/fotorama.js"></script>
      
        <script src="assets/eaters/home/js/typeahead.js"></script>
        <script src="assets/eaters/home/js/card-payment.js"></script>
        <script src="assets/eaters/home/js/magnific.js"></script>
        <script src="assets/eaters/home/js/owl-carousel.js"></script>
        <script src="assets/eaters/home/js/fitvids.js"></script>
        <script src="assets/eaters/home/js/tweet.js"></script>
        <script src="assets/eaters/home/js/countdown.js"></script>
        <script src="assets/eaters/home/js/gridrotator.js"></script>
        <script src="assets/eaters/home/js/custom.js"></script>
    </div>
</body>

</html>

