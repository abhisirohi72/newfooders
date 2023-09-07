

<?php echo $display_menu;?>
<div class="page-content">
   <div class="page-header position-relative">
      <h1> Edit Delivery Person
      </h1>
   </div>
   <!--/.page-header-->
   <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="row-fluid">
   
            <!--PAGE CONTENT BEGINS-->
            <div class="span12">
            
               <div class="space-16"></div>
               <div class="control-group">
                  <label class="control-label grey" for="form-field-6"><b>Name</b><font class="red">*</font>  </label> 
                  <div class="controls">
                     <input class="span6" autocomplete="off" name="name" type="text" placeholder="Name" value="<?php echo isset($details['name'])?$details['name']:'';?>" />
               </div>
               <div class="space-16"></div>
               <div class="control-group">
                  <label class="control-label grey" for="form-field-tags"><b>Phone Number </b><font class="red">*</font> </label>
                  <div class="controls">
                     <input id="fooderMobile" class="span6" autocomplete="off" type="text"  name="phone_number" placeholder="Phone Number" value="<?php echo isset($details['phone_number'])?$details['phone_number']:'';?>"/> 
                  </div>
               </div>
               <div class="space-16"></div> 
               <div class="control-group">
                  <label class="control-label grey" for="form-field-1"><b>Description</b></label>
                  <div class="controls">
                     <textarea class="span6 limited"  data-maxlength="250" rows="3" name="description"><?php echo isset($details['description'])?$details['description']:'';?></textarea>
                   
                  </div>
               </div>
               <div class="space-16"></div>
               <div class="control-group">
                  <label class="control-label grey"><b>Status</b> </label> 
                  <div class="controls">
                     <label class="span2"> <input autocomplete="off" name="status" class="ace-switch" type="checkbox" <?php if($details['status']=='1'){echo 'checked';} ?> /> <span class="lbl"></span></label>
                     <label class="blue mini"> Click on button to change status</label>
                  </div>
               </div>
            </div>
   
         </div>
         <div class="hr"></div>
         <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <button class="btn btn-large btn-info" type="submit"
                     value="submit" name="save">
                  <i class="icon-ok bigger-110"></i> Submit
                  </button>
               </div>
            </div>
         </div>

   </form>
</div>