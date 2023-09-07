
     <!-- ************************************** Start forgot password madal *********************************** -->		
		<div class="md-modal md-effect-7" id="modal-7">
			<div class="md-content">
			       
					<h3>Forgot Password ? <i class="icon-remove md-pro md-close"></i></h3>
				<div>
				<form method="post" id="form-eater-forgot">
				<input type="hidden" name="forgot_pass_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
				<input type="hidden" name="forgotpass_check" value="forgotpass">
					<div class="row-fluid">
					<div class="span12">
					<br>
					<input class="krinputboxes" style="width:422px;" type="text"  name="forgot_email" id="forgot_email" placeholder="Enter your email..." value="">
					<label class="krlabel-eater">Reset link will be sent to your email </label>
					</div>
					</div>
					<br>
					<div class="row-fluid">
					<div class="span12">
					<div class="span4"><button class="button-submit fltlft" type="submit" name="contact_us"> <i class="icon-check"></i> Submit</button></div>
					<div class="span2"><img id="loading3" style="display:none;" src="<?php echo SITE_URL.'/assets/eaters/img/loader.gif';?>" ></div>
					<div class="span6"></div>
					
					</div>
					</div>
					<div class="row-fluid">
					<div class="span12" id="info-eater-forgot"></div>
					</div>
					
					</form>
					
				</div>
			</div>
		</div>
		<div class="md-overlay"></div><!-- the overlay element -->
<!-- ********************************************** End Forgot Password Modal ************************************** -->		
       
       
		
       
       <div class="wrapper" >
            <?php if($display_error_token!=""){?>
            <div class="row-fluid kr-row-fluid">
            <br>
            <div class="span12">
            <h4 ><?php echo $display_error_token;?></h4>
            
            </div>
            </div>
           
           <?php }?> 
        
        	<div class="row-fluid kr-row-fluid">
            <div class="span12">
            <div class="span4 kr-span">
            <div class="row-fluid">
            <div class="span12">
            <div class="span4"><h3>Login</h3></div>
            <div class="span8"><label class="kr-short-desc">Kill Your Apetite</label></div>
            </div>
            </div>   	
        <div class="kr-hr"></div> 
        <br>
        
        <form name="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <input autocomplete="off"  type="hidden" name="eater_login_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
                	
        <div class="row-fluid">
        <div class="span12"><input autocomplete="off"  type="text" name="email" class="krinputboxes" autofocus="autofocus">
        <label class="krlabel">EMAIL</label></div>
        </div>
        <br>
        <div class="row-fluid">
        <div class="span12"><input autocomplete="off"  type="password" name="password" class="krinputboxes">
        <label class="krlabel">PASSWORD</label></div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <?php echo $display_eater_login; ?>
        </div>
        </div> 
        <div class="row-fluid kr-button">
        <div class="span12" >
        <button type="submit" name="login" class="kr-button-warning"><i class="icon-shield"></i> Login</button>
        <br>
        <br>
        <a href="#" class="md-trigger" id="modal" data-modal="modal-7"><i class="icon-reply"></i> Forgot password ?</a>
        </div>
        </div>
        </form>
            </div>
         <?php 
         if($linkCode1!==NULL && $hashedTokenFromDatabase['token_used']==='3'){?>
         <form name="eater_reset" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
          <input autocomplete="off" type="hidden" name="eater_reset_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>"> 
            <div class="span4 kr-span"> 
            <div class="row-fluid">
            <div class="span12">
           <h3>Reset Your Password</h3>
            </div>
            </div>   	
       <div class="kr-hr"></div>        	
       <br>
        <div class="row-fluid">
        <div class="span12">
        <input autocomplete="off"  type="password" class="krinputboxes" name="new_pass" autofocus="autofocus">
        <label class="krlabel"> NEW PASSWORD (4 characters at least)</label> </div>
        </div>
        <br>
        <div class="row-fluid">
        <div class="span12"><input autocomplete="off"  type="password" name="retype_new_pass" class="krinputboxes">
        <label class="krlabel"> RETYPE NEW PASSWORD</label></div>
        </div>
       <br>
        <div class="row-fluid">
        <div class="span12">
        <?php echo $display_reset; ?>
        </div>
        </div>  
         <div class="row-fluid kr-button">
        <div class="span5"><button type="submit" name="reset_access"><i class="icon-reply"></i> Reset</button></div>
        <div class="span7">
        </div>
        </div>
        </div>
         </form>  
         <?php }else{?>
           <!-- ***************************************** Form start registration ******************************************* -->
           <form name="eater_signup" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
          <input autocomplete="off" type="hidden" name="eater_signup_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>"> 
            <div class="span4 kr-span"> 
            <div class="row-fluid">
            <div class="span12">
            <div class="span4"><h3>Register</h3></div>
            <div class="span8"><label class="kr-short-desc">Eaters Zone</label></div>
            </div>
            </div>   	
       <div class="kr-hr"></div>        	
       <br>
        <div class="row-fluid">
        <div class="span12">
        <input autocomplete="off" type="text" class="krinputboxes" name="full_name" value="<?php echo $full_name;?>">
        <label class="krlabel"> FULL NAME</label> </div>
        </div>
        <br>
        <div class="row-fluid">
        <div class="span12"><input autocomplete="off"  type="text" name="eater_email" class="krinputboxes" value="<?php echo $eater_email;?>">
        <label class="krlabel"> EMAIL</label></div>
        </div>
      
       <br>
      
        <div class="row-fluid">
        <div class="span12"><input autocomplete="off"  type="password" name="eater_password" class="krinputboxes">
        <label class="krlabel">PASSWORD (4 characters at least)</label></div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <?php echo $display_eater_signup; ?>
        </div>
        </div>  
         <div class="row-fluid kr-button">
        <div class="span12">
        <button type="submit" name="signup"><i class="icon-check"></i> Register</button>
        </div>
        </div>
       	
        </div>
         </form>
        <?php }?>
            <div class="span4">
            <br>
            <img src="<?php echo SITE_URL.'/assets/eaters/img/reg/search-interactive.jpg';?>" height="132px" width="300px" title="KhateRaho Interatvie Search" alt="KhateRaho Interatvie Search">
            <br>
            <br>
            <img src="<?php echo SITE_URL.'/assets/eaters/img/reg/recipes.jpg';?>" height="132px" width="300px" title="KhateRaho Latest Recipes" alt="KhateRaho Latest Recipes">
            <br>
            <br>
            <img src="<?php echo SITE_URL.'/assets/eaters/img/reg/foodometer-eater.jpg';?>" height="132px" width="300px" title="KhateRaho FoodOMeter" alt="KhateRaho FoodOMeter">   
            <br>
            <br>
            </div>
           
            </div>
            </div>
        </div><!-- /wrapper -->
   

