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
                 <h3 class="uk-text-left"><u>Account Information</u></h3>
                   <form method="post" class="uk-grid-small uk-form-stacked formcss" uk-grid action="" enctype="multipart/form-data">
                            <div class="uk-width-1-1">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Full Name <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="" value="" placeholder="Full Name" class="uk-input">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Email Address <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                        <input type="email" name="" value="" placeholder="Email Address" class="uk-input">
                                    </div>
                                </div>
                            </div>

                             <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Phone Number <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="" value="" placeholder="Phone Number" class="uk-input">
                                    </div>
                                </div>
                            </div>
                             <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Date of Birth <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                        <input type="date" name="" value="" placeholder="Date of Birth" class="uk-input">
                                    </div>
                                </div>
                            </div>

                             <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Gender <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Cuisines (From Kitchens Of Agra) <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                        <select multiple="" class="uk-select" name="cuisine[]" data-placeholder="MAX 5...">
			                                    <option value="A La Carte">A La Carte</option>
                                                <option value="Add One">Add One</option>
                                                <option value="Advance Order Specialities">Advance Order Specialities</option>
                                                <option value="AERATED DRINKS">AERATED DRINKS</option>
                                                <option value="Ala Carte">Ala Carte</option>
                                                <option value="Aloo">Aloo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                             <div class="uk-width-1-2">
                                <div class="uk-margin">
                                    <label class="uk-form-label">Dishes (From Kitchens Of Agra) <span class="required_color">*</span></label>
                                    <div class="uk-form-controls">
                                         <select multiple="" class="uk-select" name="cuisine[]" data-placeholder="MAX 5...">
			                                    <option value="A La Carte">A La Carte</option>
                                                <option value="Add One">Add One</option>
                                                <option value="Advance Order Specialities">Advance Order Specialities</option>
                                                <option value="AERATED DRINKS">AERATED DRINKS</option>
                                                <option value="Ala Carte">Ala Carte</option>
                                                <option value="Aloo">Aloo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                               <button class="uk-button btn" type="submit" name="">
                                <span uk-icon="icon:file-edit;ratio:0.8" class="uk-icon"></span> Update Information</button>
                            </div>
                        </form>
                  
            </div>
        </div>
    </div>
</div>
 