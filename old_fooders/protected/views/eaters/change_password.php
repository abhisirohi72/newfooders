       <div>
    <img src="<?php echo SITE_URL.'/assets/eaters/img/uikit_img/';?>banner5.jpg" class="accountbn">
 </div>
 
 <div class="section2 profile">
    <div class="container">
           <div class="uk-grid-small uk-grid" uk-grid="">
             <div class="uk-width-auto@m valign">
                <div class="accountdiv">
                    S
                </div>
            </div>
            <div class="uk-width-expand@m profile_detail">
             <h3 class="hd">Shashi Bala</h3>
             <div class="subhd"><i class="fa fa-map-marker"></i> Sydney, Australia</div>
            </div>
             <div class="uk-width-medium@m profile_rate">
                    <div class="uk-child-width-expand@s uk-text-center uk-grid-divider" uk-grid>
                            <div>
                               <span class="number">0</span><br>
                               <span  class="review">Reviews</span>
                            </div>
                           <div>
                               <span class="number">10</span><br>
                               <span  class="review">Reward Points</span>
                            </div>
                        </div>
            </div>
          </div> 
            <div class="uk-grid-large uk-grid" uk-grid="">
                <div class="uk-width-auto@m">
                <?php require SERVER_ROOT.'/protected/setting/eaters/eater_sidebar.php';?>
                </div>
            <div class="uk-width-expand@m">
                 <h3 class="uk-text-left"><u>Change Password</u></h3>
                 <?php echo $display_eater_changepass;?>
                   <form method="post" class="uk-grid-small uk-form-stacked formcss" uk-grid action="" enctype="multipart/form-data">
                    <input type="hidden" name="change_pass_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
                            <div class="uk-width-1-1">
                                <div class="uk-margin">
                                    <label class="uk-form-label"> Old Password </label>
                                    <div class="uk-form-controls">
                                        <input type="text"  placeholder=" Old Password" class="uk-input" autocomplete="off" type="password" name="oldpass">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <div class="uk-margin">
                                    <label class="uk-form-label"> New Password (4 Characters At Least) </label>
                                    <div class="uk-form-controls">
                                        <input type="text"  placeholder="New Password" class="uk-input" autocomplete="off" type="password" name="newpass">
                                    </div>
                                </div>
                            </div>
                             <div class="uk-width-1-1">
                                <div class="uk-margin">
                                    <label class="uk-form-label"> Retype New Password </label>
                                    <div class="uk-form-controls">
                                        <input type="text"  placeholder="Retype New Password" class="uk-input" autocomplete="off" type="password" name="renewpass">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                               <button class="uk-button btn" type="submit" name="">
                                <span uk-icon="icon:unlock;ratio:0.8" class="uk-icon"></span> Change Password</button>
                            </div>
                        </form>
                  
            </div>
        </div>
    </div>
</div>

