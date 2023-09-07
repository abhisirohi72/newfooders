<?php

echo $fooder_id;
       function unique_account_id($number)
       {  
           global $db;
           if ($db->exists('fooders_tables', array('table_uniqueid' => $number))) {
               $number=$feature->randomString(12);
               unique_account_id($number);
           } else {
               return $number;
           }
       } 

if(isset($_POST['submit_add_table']))
{
//print_r($_POST);
$number_of_table=trim($_POST['number_of_table']);



if($number_of_table<1) 
{
    $display_menu = $fv->form_error('Oopes Sorry !' ,'Please enter number of tables');
}
else{

if($number_of_table>0)
{ 
for($i=1; $i<=$number_of_table;$i++)
{
    $table_name='T'.$i;
    $table_no=$i;
    $number=$feature->randomString(12);

    $table_uniqueid=unique_account_id($number);
    $insert=$db->insert('fooders_tables',array('table_uniqueid'=>$table_uniqueid,
        'table_name'=>$table_name,
                                               'table_no'=>$table_no,
                                               'fooder_id'=>$fooder_id,
                                               'created_date'=>time(),
                                               'status'=>'0',
                                               'ip'=>$_SERVER['REMOTE_ADDR'])); 
}


}

    
   // $db->debug();
if(isset($insert))
            { 
          
            $display_menu = $fv->form_success ('Congratulations!', 'Table Add Successfully!');
            $l=$link->link('manage_tables',fooders);  
            //echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";

            }

}



}



?>

<?php echo $display_menu;?> 
<div class="page-content">
		<div class="page-header position-relative">
			<h1>Create Tables<small> <i class="icon-double-angle-right"></i>List</small>
			</h1>
		</div>
		<!--/.page-header-->

		<div class="row-fluid">
			<div class="span12">
            <div class="row-fluid">
		<div class="span12 text-right"> 
		<!-- <a href="#" class="btn btn-primary btn-small"> Add</a> -->
      
		</div></div><br>
				<div class="row-fluid" >
<div class="span12">
<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

<select name="number_of_table">

<?php
foreach(range(1,15) as $rr)
{?>
 <option><?php echo $rr; ?></option>

<?php }

?>

   


</select>

    
    <button type="submit" name="submit_add_table"class="btn btn-primary btn-small"><i class="icon-save bigger-130" title="save"></i> Save</button>

    </form>

</div>





				</div>

				
				<!--PAGE CONTENT ENDS-->
			</div>
			<!--/.span-->
		</div>
		<!--/.row-fluid-->
	</div>
	<!--/.page-content-->

	