<?php
// $delete_productid = $link->hrefquery ();
// $del_productid = $delete_productid ['1'];

$del_productid = $_REQUEST['delete_productid'];


if ($del_productid != '') {
	$db->delete ( 'fooders_products', array ('id' => $del_productid ) );
    $db->delete('food_basket',array('product_id'=>$del_productid));
	
	$l=$link->link('view_products',fooders);  
   // echo "<script>setTimeout(function() {window.location = '".$l."';}, 2000);</script>";
}
if (isset ( $_POST ['del_product'] )) {
	$del_id = $_POST ['del_id'];
	
	$fv->form_delete_popup ( 'Are You Sure !<br><i class="icon-hand-right"></i> You Want To Delete This Product', 'Yes I Am Sure', $query2ans, fooders, '?delete_productid=' . $del_id );
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
		<a href="<?php echo $link->link('products',fooders); ?>" class="btn btn-primary btn-small"> Add Dish/Product</a>
		</div></div>
		<div class="space-4"></div>
			<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<table id="sample-table-3"
					class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
						<th class="blue"><b class="blue">Image</b></th>
							<th><b class="blue"><?php echo fppro;?></b></th>
							<th><b class="blue"><?php echo fpprp;?></b></th>
							<th><b class="blue"><?php echo fppr;?></b></th>
							<th><b class="blue"><?php echo fpst;?></b></th>
							<th><b class="blue">Preparation Time</b></th>
							<th><b class="blue">Rank</b></th>
							<th class="hidden-phone"><b class="blue">Tags</b></th>
							<!-- <th class="hidden-phone"><b class="blue"><?php echo fpvco;?></b></th>
							<th class="hidden-phone"><b class="blue"><?php echo fpvlu;?></b></th> -->
							
							<th><b><?php echo fpva;?></b></th>
						</tr>
					</thead>
					<tbody>
                    <?php
																				$db->order_by = "`timestamp` DESC";
																				$get_product_detail = $db->get_all ( 'fooders_products', array ('fooder_id' => $fooder_id ) );
																				
																				foreach ( $get_product_detail as $product ) {
																					$get_menu_name = $db->get_all ( 'fooders_menus', array ('fooder_id' => $fooder_id, 'id' => $product ['menu_id'] ) );
																					
																					$entry_product_date = $product ['entry_date'];
																					$entry_date = date ( 'd M Y', $entry_product_date );
																					$entry_time = date ( 'H:i', $entry_product_date );
																					$last_updated = $product ['timestamp'];
																					$last_updated = explode ( " ", $last_updated );
																					$last_updated_date = date ( 'd M Y', strtotime ( $last_updated ['0'] ) );
																					$last_updated_time = date ( 'H:i', strtotime ( $last_updated ['1'] ) );
																					
																					?>
      					<tr>
						  <td style="width: 5%">
                            <?php if($product['picture']!=''){ ?>
								<img alt="Dish Image"
															src="<?php echo SITE_URL . "/uploads/fooders/" . $fooder_id . "/product/" . $product['picture'] .'?'.rand(1,10); ?>"
															style="width: 100%; height: auto;">
						   <?php }else{ ?>
							<img alt="Dish Image" src="<?php echo SITE_URL.'/assets/fooders/img/noimage.png'?>" style="width: 100%; height: auto;">
							<?php } ?>

							</td>
							<td style="width: 20%"><b><?php echo $product['name'];?></b><br>
								
								<?php echo $get_menu_name['0']['name'].', '; 
								if($product['product_type']=='1') echo 'Non-Veg'; else echo 'Veg'; ?>
							</td>
							<td style="width: 10%"><b class="orange">
							<?php  if($product['proprice']) echo "<i class='icon-inr'></i>"." ".$product['proprice']."<sup>*</sup>"; ?>
							</b></td>
							<td style="width: 10%"><b class="green">
							<?php if($product['proprice']) echo "<i class='icon-inr'></i> "."<strike>".$product['price']."</strike>"; else echo "<i class='icon-inr'></i>"." ".$product['price']; ?></b>
							</td>
							<td style="width: 10%">
							<input autocomplete="off" 
								class="ace-switch ace-switch-3 productStatus" id="<?php echo $feature->encrypt_decrypt('encrypt',$product['id']); ?>" type="checkbox"
								<?php if($product ['status'] == '1') echo "checked"; else echo "";?>>
							<span class="lbl"></span>


								<?php
								/*
																					if ($product ['status'] == '1') {
																						echo "<div class='progress progress-success progress-striped' data-percent=" . fpvact . ">
												<div class='bar' style='width: 100%;'></div>
											</div>";
																					} else {
																						echo "<div class='progress progress-danger progress-striped' data-percent=" . fpvinact . ">
												<div class='bar' style='width: 100%;'></div>
											</div>";
																					} */
																					?>
								</td>
								<td style="width:10%;"><?php echo $product['preparation_time']; ?></td>
								<td style="width:10%;"><?php 
								$rank ='';
								if($product['top_rated']=='1') $rank .= 'Top Rated, ';
								if($product['best_seller']=='1') $rank .= 'Best Seller, ';
								if($product['most_ordered']=='1') $rank .= 'Most Ordered, ';
								echo rtrim($rank,', ');
								?></td>
								<td class="hidden-phone" style="width:15%;"><?php echo $product['tags']; ?></td>
							<!-- <td class="hidden-phone" style="width: 20%"><b class="grey"><?php echo $entry_date;?></b>
								&nbsp;&nbsp; <span class="badge badge-warning"><i
									class="icon-time"></i>&nbsp;<?php echo $entry_time;?></span></td>
							<td class="hidden-phone" style="width: 20%"><b class="grey"><?php echo $last_updated_date;?></b>
								&nbsp; &nbsp; <span class="badge badge-yellow"><i
									class="icon-time"></i>&nbsp;<?php echo $last_updated_time;?></span>
							</td> -->
							
							<td style="width: 10%">
								<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">

									<a class="btn btn-info btn-minier"
										href="<?php  echo $link->link('products',fooders,'?edit='.$product['id']); ?>">
										<i class="icon-pencil icon-only" title="<?php echo fpvedit;?>"></i>
									</a> <input autocomplete="off" type="hidden" name="del_id"
										value="<?php echo $product['id'];?>">

									<button type="submit" name="del_product"
										class="btn btn-danger btn-minier">
										<i class="icon-trash bigger-130" title="<?php echo fpvdel;?>"></i>
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
						<i class="icon-remove"></i> <?php echo fpvcl;?>
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
