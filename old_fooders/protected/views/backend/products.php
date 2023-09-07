 <div id="page-wrapper">
           <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="huge">Products</span> <span class="text-muted">Latest 100 Products</span>
                </div>
            </div>
            <!-- /.row -->
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Creation Date</th>
                                            <th>Product Name</th>
                                            <th>Menu Name</th>
                                            <th>Fooder Name</th>
                                            <th>Price</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($getproducts)){
                                    foreach($getproducts as $products){
                                    	$date_time = $products['entry_date'];
                                    	$date = date ( 'd M Y', $date_time );
                                    	$time = date ( 'g:i a', $date_time );
                                    ?>
                                        <tr class="odd gradeX">
                                            <td style="width:7%;"><span class="text-success"><b><?php echo $products['id'];?></b></span></td>
                                            <td style="width:10%;">
                                            <span class="label label-warning"><?php echo $date.' '.$time;?></span>
                                            </td>
                                            <td style="width:15%;" class="tooltip-demo">
                                            <span class="text-success"><b><?php echo $products['name'];?></b></span>
                                            <div class="divider"></div>
                                             <?php if($products['status']==0){?>
                                            <span class="label label-danger" data-toggle="tooltip" data-placement="top" data-original-title="Product Status">Not Available</span>
                                            <?php }else{?>
                                            <span class="label label-success" data-toggle="tooltip" data-placement="top" data-original-title="Product Status">Available</span>
                                            <?php }?>
                                            <div class="divider"></div>
                                            <span class="label label-info" data-toggle="tooltip" data-placement="top" data-original-title="Product Tags"><?php echo $products['tags'];?></span>
                                            </td>
                                            
                                            <td style="width:18%;">
                                            <?php 
                                            $getmenus = $db->get_col('fooders_menus',array('id'=>$products['menu_id']),'name');
                                            echo '<span class="text-warning"><b>'.$getmenus['0'].'</b></span>';
                                            ?>
                                            </td>
                                            <td style="width:20%;">
                                             <?php 
                                            $getfooder = $db->get_col('fooders',array('fooder_id'=>$products['fooder_id']),'name');
                                            echo '<a href="#"><span class="text-warning"><b>'.$getfooder['0'].'</b></span></a>';
                                            ?>
                                            </td>
                                            <td style="width:10%;">
                                            <?php 
                                            if($products['proprice']==""){
                                            	echo '<i class="fa fa-rupee"></i> '.$products['price'];
                                            }else{
                                            	echo '<strike><i class="fa fa-rupee"></i> '.$products['price'].'</strike>'.' <i class="fa fa-rupee"></i> '.$products['proprice'];
                                            }
                                            ?>
                                            </td>
                                            <td style="width:20%;"><p><small class="text-muted"><?php echo $products['details'];?></small></p></td>
                                        </tr>
                                        <?php } }?>
                                     </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          </div>