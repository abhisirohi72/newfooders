<?php 
$display_menu="";
// $edit_id = $link->hrefquery ();
// $edit_id = $edit_id ['1'];
$edit_id = $_REQUEST['edit'];
if(isset($edit_id)) 
{

$details=$db->get_row('delivery_guys',array('id'=>$edit_id,'fooder_id'=>$_SESSION['id']));

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

$count=0;
if($name!=""){

	$count=$db->run("SELECT COUNT(*) FROM `delivery_guys` WHERE `phone_number`='$phone_number' AND `id`!='$edit_id'")->fetchColumn(); 
} 

if($name=="")
{
    $display_menu = $fv->form_error('oops Sorry !' ,'Please enter delivery guy name!');
}elseif($phone_number=="")
{
    $display_menu = $fv->form_error('oops Sorry !' , 'Please enter delivery guy 10 digit phone number!');
}
elseif($db->run("SELECT COUNT(*) FROM `delivery_guys` WHERE `phone_number`='$phone_number' AND `id`!='$edit_id'")->fetchColumn()>0) 
{
    $display_menu = $fv->form_error('oops Sorry !' , 'Delivery guy phone number already exists!');
}
else{ 

            $insert=$db->update('delivery_guys', array('name'=>$name,
                                                'phone_number'=>$phone_number, 
                                                'description'=>$description,
                                                'status'=>$status,
                                                ),array('id'=>$edit_id));

            if(isset($insert))
            {
            // $display_menu='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
            //     <strong><i class="ace-icon fa fa-check"></i></strong>Delivery Guy updated Successfully!<br>
            // </div>'; 

            $display_menu = $fv->form_success ('Congratulations!', 'Delivery Guy updated Successfully!');

            $l=$link->link('delivery_guys',fooders);  
            echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";

            }
}


	 
					


}

}  




 ?>