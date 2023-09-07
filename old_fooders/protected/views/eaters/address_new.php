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
                 <h3 class="uk-text-left"><u>My addresses</u></h3>

                    <div class="uk-child-width-expand@s uk-grid-small uk-grid-match" uk-grid>
                        <div>
                            <div class="uk-card uk-card-body add_address">
                                 <i class="fa fa-plus-circle"></i>
                                 <p>Add Address</p>
                            </div>
                        </div>
                        <div>
                           <div class="uk-card uk-card-body view_address">
                                <h4 class="uk-margin-small-bottom">Home</h4>
                               <span>Agra-282001<br>Uttar Pradesh</span>
                               <br><a href="#" class="uk-text-success"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</a>&nbsp;|&nbsp;<a href="#" class="uk-text-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                           </div>
                        </div>
                        <div>
                           <div class="uk-card uk-card-body view_address">
                                <h4 class="uk-margin-small-bottom">Home</h4>
                               <span>Agra-282001<br>Uttar Pradesh</span>
                               <br><a href="#" class="uk-text-success"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</a>&nbsp;|&nbsp;<a href="#" class="uk-text-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                           </div>
                        </div>
                    </div>



                   <form method="post" class="uk-grid-small uk-form-stacked formcss" uk-grid action="" enctype="multipart/form-data">
                            <div class="uk-width-1-1">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Address</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea" rows="3" placeholder="Textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Regions</label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="" value="" placeholder="Regions" class="uk-input">
                                    </div>
                                </div>
                            </div>
                              <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">City  </label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="" value="" placeholder="City" class="uk-input">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">State/Province</label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="" value="" placeholder="State/Province" class="uk-input">
                                    </div>
                                </div>
                            </div>

                             <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Zip/Postal Code </label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="" value="" placeholder="Zip/Postal Code" class="uk-input">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-1-1">
                               <button class="uk-button btn" type="submit" name="">
                                <span uk-icon="icon:plus-circle;ratio:0.8" class="uk-icon"></span> Add Address</button>
                            </div>
                        </form>
                  
            </div>
        </div>
    </div>
</div>
 