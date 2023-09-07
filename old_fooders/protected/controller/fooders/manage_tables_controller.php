<?php
   $fooders_tables=$db->get_all('fooders_tables',array('fooder_id'=>$fooder_id));



if(isset($_POST['submit_save_table']))
{
//print_r($_POST); 
 
$table_no=trim($_POST['table_no']);
$table_id=trim($_POST['table_id']);



if($table_no=="")
{
    $display_menu = $fv->form_error('Oops Sorry !' ,'Please enter table number!');

}
else{


$check_number=$db->run("SELECT* FROM `fooders_tables` WHERE `table_no`='$table_no' AND `id`!='$table_id' AND `fooder_id`= '$fooder_id'")->fetchAll();



if(count($check_number)>0) 
{
    $display_menu = $fv->form_error('Oops Sorry !' ,'Table number already exists!');
}else{

    $insert=$db->update('fooders_tables',array('table_no'=>$table_no),array('fooder_id'=>$fooder_id,'id'=>$table_id));
   // $db->debug();
if(isset($insert)) 
            { 
          
            $display_menu = $fv->form_success ('Congratulations!', 'Table Update Successfully!');
            $l=$link->link('manage_tables',fooders);  
            echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";

            }

}








}



}



?>