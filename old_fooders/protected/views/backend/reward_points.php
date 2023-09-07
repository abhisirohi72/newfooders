<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <div class="col-lg-2"><span class="huge">Points</span></div> 
                    <div class="col-lg-6"><?php echo $display_loyalty;?></div>
                    <div class="col-lg-4"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Reward Points
                        </div>
                        <!-- /.panel-heading -->
                                              <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          
                                            <th>Order Id</th>
                                            <th>Eater Name</th>
                                            <th>Order Value</th>
                                            <th>Points Earn</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
								
                                     
                                     if(is_array($get_loyalty)){
                                    foreach($get_loyalty as $loyalty){
                                    	$get_eater_name = $db->get_row('eaters',array('eater_id'=>$loyalty['eater_id']),'name');
                                    	$date = $loyalty['created_date'];
                                    	$joining_date = date ( 'd M Y', $date);
                                    	?>
                                  <tr>
                                  <td><span class="label label-info"><?php echo "#".$loyalty['order_id'];?></span></td>
                                  <td><?php echo $get_eater_name['name'];?></td>
                                  <td><?php echo $loyalty['order_value'];?></td>
                                  <td><?php echo $loyalty['points_earn'];?></td>
                                  <td><b><?php echo $joining_date;?></b></td>
                                  <td>
                                  <a class="btn btn-danger btn-xs" href="<?php echo $link->link('reward_points',admin,'&delete_id='.$loyalty['id']);?>"><i class="fa fa-trash-o"></i></a>
                                  </td>
                                  
                                  
                                  </tr>  
                                    
                                    
                                    
                                    
                                    <?php } }?>
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    
            
            
</div>
            

