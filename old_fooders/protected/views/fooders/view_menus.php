<?php
// $delete_menuid = $link->hrefquery ();
// $del_menuid = $delete_menuid ['1'];
$del_menuid =$_REQUEST['delete_menuid'];

if ($del_menuid != '') {
	$db->delete ( 'fooders_menus', array ('id' => $del_menuid ) );
	$db->delete ( 'fooders_products', array ('menu_id' => $del_menuid ) );
	$db->delete('food_basket',array('menu_id'=>$del_menuid));
    $l=$link->link('view_menus',fooders);  
    echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";
}
if (isset ( $_POST ['del_menu'] )) {
	$del_id = $_POST ['del_id'];
	
	$fv->form_delete_popup ( fmvaprd . '<i class="icon-hand-right"></i>' . fmvays, fmvys, $query2ans, fooders, '?delete_menuid=' . $del_id );
}
?>
 
<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			<?php echo fmvf;?> <small> <i class="icon-double-angle-right"></i> <?php echo $feature->textstyler($query2ans, 1);?>
			</small>
		</h1>
	</div>
	<!--/.page-header-->
	<div class="row-fluid">
		<div class="span12">
		<div class="row-fluid">
		<div class="span12 text-right">
		<a href="<?php echo $link->link('menu',fooders); ?>" class="btn btn-primary btn-small"> Add Category/Menu</a>
		</div></div>
		<div class="space-4"></div>
			<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<table id="sample-table-4"
					class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><b class="blue"><?php echo fmmen;?></b></th>
							<th class="hidden-phone"><b class="blue"><?php echo fmdes;?></b></th>
							<th><b class="blue"><?php echo fmst;?></b></th>
							<!-- <th class="hidden-phone"><b class="blue"><?php echo fmvcon;?></b></th>
							<th class="hidden-phone"><b class="blue"><?php echo fmvlu;?></b></th> -->
							<th><b class="blue"><?php echo fmvact;?></b></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$db->order_by = "`timestamp` DESC";
						$get_menu_details = $db->get_all ( 'fooders_menus', array ('fooder_id' => $fooder_id ) );
						foreach ( $get_menu_details as $key ) {
							$productscount = $db->get_count ( 'fooders_products', array ('menu_id' => $key ['id'] ) );
							$entry_menu_date = $key ['entry_date'];
							$entry_date = date ( 'd M Y', $entry_menu_date );
							$entry_time = date ( 'H:i', $entry_menu_date );
							$last_updated = $key ['timestamp'];
							$last_updated = explode ( " ", $last_updated );
							$last_updated_date = date ( 'd M Y', strtotime ( $last_updated ['0'] ) );
							$last_updated_time = date ( 'H:i', strtotime ( $last_updated ['1'] ) );
							?>
							<tr>
							<td style="width: 20%"><b><?php echo $key['name'];?></b>
								<div class="divider"></div> <span
								class="label label-minier label-pink arrowed-right">
							 <?php echo fmvps." ".$productscount;?>
							</span></td>
							<td class="hidden-phone" style="width: 28%"><p class="grey"><?php echo $key['description'];?></p></td>

							<td style="width: 10%">
								<?php
							if ($key ['status'] == '1') {
								echo "<div class='progress progress-success progress-striped' data-percent=" . fmvactive . ">
												<div class='bar' style='width: 100%;'></div>
											</div>";
							} else {
								echo "<div class='progress progress-danger progress-striped' data-percent=" . fmvinact . ">
												<div class='bar' style='width: 100%;'></div>
											</div>";
							}
							
							?>
								</td>
							<!-- <td class="hidden-phone" style="width: 16%"><b class="grey"><?php echo $entry_date;?></b>
								&nbsp;&nbsp; <span class="badge badge-warning"><i
									class="icon-time"></i>&nbsp;<?php echo $entry_time;?></span></td>

							<td class="hidden-phone" style="width: 16%"><b class="grey"><?php echo $last_updated_date;?></b>
								&nbsp;&nbsp; <span class="badge badge-yellow"><i
									class="icon-time"></i>&nbsp;<?php echo $last_updated_time;?></span>
							</td> -->
							<td style="width: 15%">
								<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
									<a class="btn btn-info btn-minier"
										href="<?php  echo $link->link('menu',fooders,'?edit='.$key['id']); ?>">
										<i class="icon-pencil icon-only" title="edit"></i>
									</a> <input autocomplete="off" type="hidden" name="del_id"
										value="<?php echo $key['id'];?>">

									<button type="submit" name="del_menu"
										class="btn btn-danger btn-minier">
										<i class="icon-trash bigger-130" title="delete"></i>
									</button>
								</form>
							</td>
						</tr>
							<?php }?>
						</tbody>
				</table>
			</div>
			<div id="modal-table" class="modal hide fade" tabindex="-1">
				<div class="modal-footer">
					<button class="btn btn-small btn-danger pull-left"
						data-dismiss="modal">
						<i class="icon-remove"></i> <?php echo fmvc;?>
					</button>
					<div class="pagination pull-right no-margin">
						<ul>
							<li class="prev disabled"><a href="#"> <i
									class="icon-double-angle-left"></i>
							</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li class="next"><a href="#"> <i class="icon-double-angle-right"></i>
							</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--PAGE CONTENT ENDS-->
		</div>
		<!--/.span-->
	</div>
	<!--/.row-fluid-->
</div>
<!--/.page-content-->

