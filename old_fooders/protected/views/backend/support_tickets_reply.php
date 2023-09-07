 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <h2>Support Ticket Reply</h2> 
                </div>
            </div>
            <form method="post" action="">
           <input type="hidden" name="reply_care" value="carereply">
           <input type="hidden" name="reply_care_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
           <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-9"><input class="form-control" placeholder="To" name="reply_to" value="<?php echo $get_eater_email['email'];?>"></div>
           <div class="col-lg-3"></div>
           </div>
           </div>
            <br>
             <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-9"><input class="form-control" placeholder="Subject" name="reply_subject"></div>
           <div class="col-lg-3"></div>
           </div>
           </div>
         <br>
             <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-9"> <textarea id="home1" name="message" placeholder="Enter message ..." style="width: 750px; height: 200px"></textarea></div>
           <div class="col-lg-3"></div>
           </div>
           </div>
          <br>
            <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-8"> <button type="submit" class="btn btn-success" name="send_mail">Send</button></div>
           <div class="col-lg-4"></div>
           </div>
           </div>
            </form>
              
          </div>