
     <?php if(isset($_POST['submit'])){ 
        $email_phone = trim($_POST['email_phone']);
        
        $insert = $db->insert('subscriber',array('email_phone'=>$email_phone,'created_date'=>time(),'ip'=>$_SERVER['REMOTE_ADDR']));
        if($insert){
           $display_msg = '<h3 class="text-success">We will get back to you soon. Thank you for subscribing.</h3>';
        }

       } ?>
     
     <div class="vh-100 osahan-coming-soon p-4 d-flex justify-content-center align-items-center">
         <div class="osahan-img text-center">
         <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/blogo.svg" alt="#" class="img-fluid coming-soon-img" width="200px;"><br>
         <img src="<?php echo SITE_URL.'/assets/mobile/';?>img/coming-soon.svg" alt="#" class="img-fluid coming-soon-img">
            <div class="osahan-text text-center mt-3">
             <h3 class="text-primary font-weight-bold">Directly from restaurant to you!</h3>
               
               <h5 class="mb-4">
Get ready for an unparalleled ordering experience 
               </h5>
                 <h6 class="mb-4">
Stand out of the Crowd ! Get notified as soon as we are live
               </h6>
               <?php if(isset($_POST['submit'])){ echo $display_msg; }else{ ?>
               <form method="post" action="">
               <div class="row">
                  <div class="col px-1 coming">
                       <input type="email" name="email_phone" required="required" id="emailSubscribe" class="form-control coming_input" placeholder="Enter Your Email Address/Phone Number">    
                  </div>
               </div>   
                <button id="submitSubscribe" name="submit" class="btn btn-lg comingbtn btn-primary btn-block my-4"> Subscribe</button>
                <!-- Facebook --><br>
<a class="btn" href="https://www.instagram.com/official_khateraho/" style="background-color: #ac2bac; color: white;" role="button"
  ><i class="feather-instagram"> Follow us on instagram</i
></a>


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
      