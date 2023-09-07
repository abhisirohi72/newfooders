
 <?php echo $display_menu;?> 
<div class="page-content">
		<div class="page-header position-relative">
			<h1>Manage Tables<small> <i class="icon-double-angle-right"></i>List</small>
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

<?php if(!empty($fooders_tables)){ ?>



<table style="width:100%" class="table table-striped table-bordered table-hover">
<tr>
   
    <td class="blue" style="width:25%">Table Number</td>
	<td class="blue" style="width:30%">Table Share link</td>
    <td class="blue" style="width:20%">Action</td>
</tr>



<?php 
// echo fooder_url."<pre>"; 
// print_r($fooders_tables);
// echo "</pre>";
if(is_array($fooders_tables)){ 
                                $sn=1;
							foreach($fooders_tables as $row)
                            { 

         	                ?>
 



<tr>
<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
   
    <td style="width:25% padding:1px;"><input style="margin-bottom: 1px;" autocomplete="off" type="text" name="table_no" value="<?php echo isset($row['table_no'])?$row['table_no']:''; ?>"></td>
    <td style="width:30% padding:1px;">
	https://dev.khateraho.com/<?php echo fooder_url; ?>/?tableno=<?php echo $row['table_uniqueid']; ?>
	
							</td>
	
	<td style="width:20% padding:1px;">
    <input autocomplete="off" type="hidden" name="table_id" value="<?php echo $row['id'];?>">
    <button style="margin-bottom: 1px;" type="submit" name="submit_save_table" class="btn btn-primary btn-minier"><i class="icon-save bigger-130" title="save"></i> Save</button>
</td>
    </form>
</tr>















						<?php 
                    $sn++;
                    
               }}?>
</table>








                    <?php }else{?>

<div class="alert alert-block alert-info">


   <strong class="blue"><h3>
   Kindly reach us over <?php echo kr_support_email; ?>. mentioning your fooder ID.</h3></strong>

</div>

                    <?php }?>

				</div>

				
				<!--PAGE CONTENT ENDS-->
			</div>
			<!--/.span-->
		</div>
		<!--/.row-fluid-->
	</div>
	<!--/.page-content-->

	