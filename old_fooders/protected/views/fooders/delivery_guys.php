<?php
// $delete_menuid = $link->hrefquery ();
// $del_menuid = $delete_menuid ['1'];
$del_menuid = $_REQUEST['deleteid'];

if ($del_menuid != '') {
	$db->delete ( 'delivery_guys', array ('id' => $del_menuid ) );
    $l=$link->link('delivery_guys',fooders);  
    echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";

}
if (isset ( $_POST ['del_delivery_guy'] )) {
	$del_id = $_POST ['del_id'];
	
	$fv->form_delete_popup ( 'Are You Sure !<br><i class="icon-hand-right"></i> You Want To Delete This Delivery Guy', 'Yes I Am Sure', $query2ans, fooders, '?deleteid=' . $del_id );
} 


?>
<div class="page-content">
		<div class="page-header position-relative">
			<h1>Delivery Persons<small> <i class="icon-double-angle-right"></i>List</small>
			</h1>
		</div>
		<!--/.page-header-->

		<div class="row-fluid">
			<div class="span12">
            <div class="row-fluid">
		<div class="span12 text-right">
		<a href="<?php echo $link->link('add_delivery_guy',fooders); ?>" class="btn btn-primary btn-small"> Add Delivery Person</a>
		</div></div><br>
				<div class="row-fluid" >
					<table id="sample-table-5"
						class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
                                <th  width="15%"><b>S.No</b></th>
								<th class="hidden-phone" width="25%"><b class="blue">Name</b></th>
								<th class="hidden-phone" width="25%"><b class="blue">Phone Number</b></th>
                                <th class="hidden-phone" width="25%"><b class="blue">Status</b></th>
								<th width="10%" ><b class="blue">Action</b></th>

							</tr>
						</thead>

						<tbody>
                         
							<?php
                            
                            $delivery_guys=$db->get_all('delivery_guys',array('fooder_id'=>$fooder_id));
                            
                            if(is_array($delivery_guys)){ 
                                $sn=1;
							foreach($delivery_guys as $row)
                            { 

							$creation_date_time = $row['created_date'];
         	                $creation_date = date('d M Y',$creation_date_time);
         	                $creation_time = date('g:i a',$creation_date_time);
         	                ?>
							<tr>
							    <td><?php echo $sn; ?> </td>
                                <td><?php echo isset($row['name'])?ucwords($row['name']):''; ?> </td>
                                <td><?php echo isset($row['phone_number'])?ucwords($row['phone_number']):''; ?> </td>
                                <td><?php if($row['status']=='1')
                                {
echo '<span class="label label-success label-white middle">Active</span>';
                                }else{
echo '<span class="label label-warning label-white middle">
<i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
Inactive
</span>';
                                }  ?> </td>
					
								<td>
								<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
									<a class="btn btn-info btn-minier" href="<?php  echo $link->link('edit_delivery_guy',fooders,'?edit='.$row['id']); ?>"><i class="icon-pencil icon-only" title="edit"></i></a> 
                                    <input autocomplete="off" type="hidden" name="del_id" value="<?php echo $row['id'];?>">
 
									<button type="submit" name="del_delivery_guy"class="btn btn-danger btn-minier"><i class="icon-trash bigger-130" title="delete"></i></button>
								</form>
								</td>
							</tr>
						<?php 
                    $sn++;
                    
                    }}?>
						</tbody>
					</table>
				</div>

				
				<!--PAGE CONTENT ENDS-->
			</div>
			<!--/.span-->
		</div>
		<!--/.row-fluid-->
	</div>
	<!--/.page-content-->

	