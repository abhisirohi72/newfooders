
<?php 
$display_menu="";
if(isset($_POST['save']))
{


$name=trim($_POST['name']);
$phone_number=trim($_POST['phone_number']);
$description=trim($_POST['description']);
$status=isset($_POST['status'])?$_POST['status']:'off';
if ($status == "on") {
    $status = '1';
} else {
    $status = '0';
} 
if($name=="") 
{
   
    $display_menu = $fv->form_error('Oops Sorry !' ,'Please enter delivery person name!');
}elseif($phone_number=="")
{
  
    $display_menu = $fv->form_error('Oops Sorry !' ,'Please enter delivery person 10 digit phone number!');
}
elseif($db->exists('delivery_guys',array('fooder_id'=>$fooder_id,'phone_number'=>$phone_number))) 
{
   $display_menu = $fv->form_error('Oops Sorry !' ,'Delivery person phone number already exists!'); 
}
else{

            $insert=$db->insert ('delivery_guys', array('name'=>$name,
            'phone_number'=>$phone_number,
            'description'=>$description,
            'status'=>$status,
            'fooder_id'=>$_SESSION['id'],
            'created_date'=>time()
            ));

            if(isset($insert))
            { 
          
            $display_menu = $fv->form_success ('Congratulations!', 'Delivery person Add Successfully!');
            $l=$link->link('delivery_guys',fooders);  
            echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";

            }
}


	
					


} ?> 


