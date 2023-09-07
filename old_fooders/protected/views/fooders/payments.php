

<?php
if(isset($_POST['merchant_key']))
{
   $merchant_id=isset($_POST['merchant_id'])?$_POST['merchant_id']:'';
   $merchant_key=isset($_POST['merchant_key'])?$_POST['merchant_key']:'';


   if($merchant_id=="") 
   {
   $display_menu = $fv->form_error('Oops Sorry !' ,'Please enter merchant id!');

   }
   elseif($merchant_key=="")
   {
    $display_menu = $fv->form_error('Oops Sorry !' ,'Please enter merchant key!');
   }
   
   else{
    $update=$db->update ( 'fooders_details', array ('merchant_id' =>$merchant_id,'merchant_key'=>$merchant_key), array ('fooder_id' => $fooder_id ) );
    if($update)
    {

       $display_menu = $fv->form_success ('Congratulations!', 'Payment Details Update Successfully!');
        $l=$link->link('payments',fooders);  
        echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";
        
    }
   }



}


?>
<?php echo $display_menu;?>
<div class="page-content">
   <div class="page-header position-relative">
      <h1> Payment Settings
      </h1>
   </div> 
   <!--/.page-header-->
   <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="row-fluid">
   
            <!--PAGE CONTENT BEGINS-->
            <div class="span12">
            
               <div class="space-16"></div>
               <div class="control-group">
                  <label class="control-label grey" ><b>Merchant Id</b><font class="red">*</font> </label>
                  <div class="controls">
                     <input class="span6" autocomplete="off" name="merchant_id" type="text" placeholder="Merchant id" value="<?php echo fooder_merchant_id; ?>" />
               </div>
               <div class="space-16"></div> 
               <div class="control-group">
                  <label class="control-label grey" ><b>Merchant Key</b><font class="red">*</font></label>
                  <div class="controls">
                     <input id="fooderMobile" class="span6" autocomplete="off" type="text"  name="merchant_key" placeholder="Merchant key" value="<?php echo fooder_merchant_key; ?>"/> 
                  </div>
               </div> 
            
             
            </div>
   
         </div>
         <div class="hr"></div>
         <div class="row-fluid">
            <div class="span12">
               <div class="form-actions">
                  <button class="btn btn-large btn-info" type="submit"
                     value="submit" name="payment_submit">
                  <i class="icon-ok bigger-110"></i> Submit
                  </button>
               </div>
            </div>
         </div>

   </form>
</div>