 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="huge">Upload Logo</span> <span class="text-muted">Admin , Fooder , Eater , Email</span>
                </div>
            </div>
            <?php echo $display_logo; ?>
            <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="adminlogo_secure" value="adminsecure">
            <input type="hidden" name="adminlogo_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" >
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2"><span class="lead">Admin Logo : </span></div>
            <div class="col-lg-3">
            <input type="file" name="file">
            </div>
            <div class="col-lg-7">
            <button class="btn btn-info" type="submit" name="admin_logo_save">Save Admin Logo</button>
            </div>
            </div>
            </div>
            </form>
            <br>
            <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="fooderlogo_secure" value="foodersecure">
            <input type="hidden" name="fooderlogo_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" >
            
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2"><span class="lead">Fooder Logo : </span></div>
            <div class="col-lg-3">
            <input type="file" name="file">
            </div>
            <div class="col-lg-7"><button class="btn btn-success" type="submit" name="fooder_logo_save">Save Fooder Logo</button></div>
            </div>
            </div>
            </form>
            <br>
            <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="eaterlogo_secure" value="eatersecure">
            <input type="hidden" name="eaterlogo_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" >
            
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2"><span class="lead">Eater Logo : </span></div>
            <div class="col-lg-3">
            <input type="file" name="file">
            </div>
            <div class="col-lg-7"><button class="btn btn-primary" type="submit" name="eater_logo_save">Save Eater Logo</button></div>
            </div>
            </div>
            </form>
            <br>
            <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="emaillogo_secure" value="emailsecure">
            <input type="hidden" name="emaillogo_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" >
            
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2"><span class="lead">Email Logo : </span></div>
            <div class="col-lg-3">
            <input type="file" name="file">
            </div>
            <div class="col-lg-7">
            <button class="btn btn-danger" type="submit" name="email_logo_save">Save Email Logo</button></div>
            </div>
            </div>
            </form>
            <br>
            <h3>Social Links</h3>
            <hr>
            <br>
            <form method="post" action="">
            <input type="hidden" name="social_links_secure" value="sociallinks">
            <input type="hidden" name="social_links_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>" >
            
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2">
            <label class="lead">Facebook : </label>
            </div>
            <div class="col-lg-5">
            <input type="text" name="facebook_link" class="form-control" placeholder="Enter Facebook Link">
            </div>
            <div class="col-lg-5"></div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2">
            <label class="lead">Twitter : </label>
            </div>
            <div class="col-lg-5">
            <input type="text" name="twitter_link" class="form-control" placeholder="Enter Twitter Link">
            </div>
            <div class="col-lg-5"></div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2">
            <label class="lead">Google + : </label>
            </div>
            <div class="col-lg-5">
            <input type="text" name="google_link" class="form-control" placeholder="Enter Google Link">
            </div>
            <div class="col-lg-5"></div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-5"></div>
            <div class="col-lg-3">
            <button class="btn btn-info" type="submit" name="social_links_save">Save Social Links</button>
            </div>
            <div class="col-lg-4"></div>
            </div>
            </div>
            </form>
           <br>
           <br>
            
          </div>
