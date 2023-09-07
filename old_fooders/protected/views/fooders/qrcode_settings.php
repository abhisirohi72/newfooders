<?php
if(isset($_POST['qrcode_settings']))
{
    $enable_qr=isset($_POST['enable_qr'])?$_POST['enable_qr']:0;
    $callwaiter = $_POST['callwaiter'];
    $callwaiter_waiting_time=isset($_POST['callwaiter_waiting_time'])?$_POST['callwaiter_waiting_time']:'0';
    $perimeter=$_POST['perimeter'];
    
    if ($callwaiter == "on") {
        $callwaiter = '1';
    } else {
        $callwaiter = '0';
    }


    if (! is_numeric ( $perimeter ))
    {
        $display_menu = $fv->form_error ( 'Oops Sorry', 'Perimeter should be numeric!' );
    }else{
    
          
    $update1=$db->update ('fooders_details', array('callwaiter'=>$callwaiter,'callwaiter_waiting_time'=>$callwaiter_waiting_time), array ('fooder_id' => $fooder_id ) );
    $update2=$db->update ('fooders', array ('perimeter' => $perimeter,'enable_qr'=>$enable_qr), array ('fooder_id' => $fooder_id ));
    
    if(isset($update1) || isset($update2))
    {
    
        $display_menu = $fv->form_success ('Congratulations!', 'QR Code Settings Update Successfully!');
        $l=$link->link('qrcode_settings',fooders);  
        echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";
        
    }
    }


  


}



?>
  <?php echo $display_menu;?>
<div class="page-content">
   <div class="page-header position-relative">
      <h1> QR Code Settings
      </h1>
   </div> 
   <!--/.page-header-->
   <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
      <div class="row-fluid">
   
            <!--PAGE CONTENT BEGINS-->
            <div class="span6">
          
               <div class="space-8"></div> 

               <div class="control-group">
										        <div class="controls">
												<div class="radio inline" style="padding-left:0px;">
													<label>
														<input name="enable_qr"  type="checkbox" value="1" <?php if(fooder_enable_qr=='1') echo "checked"; ?>>
														<span class="lbl"> QR Enable</span>
													</label>
												</div>
                                        
                                                </div>
											</div> 
                <div class="space-8"></div>
               <div class="control-group">
													<label class="control-label grey" for="form-field-1">Call Waiter</label>
													<div class="controls">
															<div class="space-4"></div>
															<label class="span2"> <input autocomplete="off" name="callwaiter" class="ace-switch" type="checkbox" <?php if (fooder_callwaiter == "1") echo "checked"; ?> /> <span class="lbl"></span>
															</label> &nbsp; &nbsp; &nbsp; &nbsp; <small class="green"><?php echo fcpscobcs; ?></small> <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="bottom" data-content="if call waiter is off then user not applicable for call waiter facility" title="<?php echo popb; ?>">?</span>
														
													</div>
												</div>
                                                <div class="space-8"></div>
                <div class="control-group">
                    <label class="control-label grey" for="form-field-1">Waiting Time</label>
                    <div class="controls">
                        <div class="input-append">
                            <input autocomplete="off" name="callwaiter_waiting_time" class="span12" type="text" id="form-field-mask-1" value="<?php echo fooder_callwaiter_waiting_time; ?>" >
                        </div>
                
                    </div>
                </div>
                <div class="space-8"></div>
                <div class="control-group">
												<label class="control-label grey" for="form-field-6">Perimeter(Meter)</label>
												<div class="controls">
														<input autocomplete="off" name="perimeter" type="number" value="<?php echo fooder_perimeter; ?>"> 
												</div>
											</div>

       

                <div class="control-group">
                <div class="form-actions">
                  <button class="btn btn-large btn-info" type="submit"
                     value="submit" name="qrcode_settings">
                  <i class="icon-ok bigger-110"></i> Submit
                  </button>
               </div>
                </div>

            
            </div>
            <div class="span6">

            <!-- <div id="show_let_long">
                <h3>Current Location</h3>
            
            <h4>

Latitude: <?php echo fooder_latitude; ?>, 
Longitude: <?php echo fooder_longitude; ?>
</h4>
</div> -->

<?php /*
<div class="control-group">
                <div class="form-actions">
            

                  <?php if(fooder_latitude!="" || fooder_longitude!="")
{

	echo '<button type="button" class="btn btn-large btn-info" onclick="getLocation()"><i class="icon-ok bigger-110"></i> Mark My Location Again</button>';
} else{
echo '<button type="button" class="btn btn-large btn-info" onclick="getLocation()"><i class="icon-ok bigger-110"></i> Mark My Location</button>';

}?>


               </div>
                </div>

*/?>

            </div>
   
         </div>
         <div class="hr"></div>
     

   </form>
</div>