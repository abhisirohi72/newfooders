 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="lead">Send Email All </span><span class="text-muted">Eater And Fooder</span> 
                </div>
            </div>
           <form method="post" action="">
           <input type="hidden" name="ef_email" value="efemail">
           <input type="hidden" name="ef_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
           <div class="row">
           <div class="col-lg-12">
          
           <div class="col-lg-2">
           <input type="radio" id="hide_select_box_all" name="send_email" value="1">
           <label>Select All</label>
           </div>
          
           
           <div class="col-lg-2">
           <input type="radio" id="hide_select_box_food" name="send_email" value="2">
           <label>Select All Fooders</label>
           </div>
           
           
           <div class="col-lg-3">
           <input type="radio" id="hide_select_box_eat" name="send_email" value="3">
           <label>Select All Eaters</label>
           </div>
           
           
           <div class="col-lg-3">
           <input type="radio" id="show_select_box" name="send_email" value="4">
           <label>Select One By One</label>
           </div>
           <div class="col-lg-2"></div>
           </div>
           </div>
            <br>
            <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-9"  id="one-by-one">
       <select name="ef_to[]" data-placeholder="Select Email..."  class="chosen-select" id="select-all-list" multiple tabindex="6">
            <optgroup label="EATER DETAILS">
              <?php if(is_array($eaters)){ foreach($eaters as $eat){
              if($eat['is_verified']=='1'){
              	$estatus = "Unverified"; 
              }
              elseif ($eat['is_verified']=='2'){
              	$estatus = "Verified";
              }
              elseif ($eat['is_verified']=='3'){
              	$estatus = "Suspended";
              }
              elseif ($eat['is_verified']=='4'){
              	$estatus = "Terminated";
              }
              	?>
              <option class="text-primary" value="<?php echo $eat['email'].'___'.$eat['name'];?>"><?php echo $eat['name'].' , '.$eat['email'].' , '.$estatus;?></option>
              <?php } }?>
            </optgroup>
            <optgroup label="FOODER DETAILS">
            <?php if(is_array($fooders)){ foreach($fooders as $food){
              if($food['is_approved']=='1'){
              	$fstatus = "Unapproved"; 
              }
              elseif ($food['is_approved']=='2'){
              	$fstatus = "Approved";
              }
              elseif ($food['is_approved']=='3'){
              	$fstatus = "Suspended";
              }
              elseif ($food['is_approved']=='4'){
              	$fstatus = "Terminated";
              }
              	?>
              <option class="text-danger" value="<?php echo $food['login_email'].'___'.$food['name'];?>"><?php echo $food['name'].' , '.$food['login_email'].' , '.$fstatus;?></option>
              <?php } }?>
            </optgroup>
            </select>
        
            </div>
            <div class="col-lg-3"></div>
            </div>
            </div>
            
            <br>
             <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-9"><input class="form-control" placeholder="Subject" name="ef_subject"></div>
           <div class="col-lg-3"></div>
           </div>
           </div>
         <br>
         
             <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-9"> 
  <textarea id="home1" name="ef_message" placeholder="Enter message ..." style="width: 100%; height: 200px"></textarea>
	</div>
           <div class="col-lg-3"></div>
           </div>
           </div>
          <br>
            <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-8"> <button type="submit" class="btn btn-success" name="ef_send">Send</button></div>
           <div class="col-lg-4"></div>
           </div>
           </div>
            </form>
              
          </div>
