 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Orders</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     <?php echo $display_order;?>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Orders
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:20%;">Order ID</th>
                                            <th style="width:25%;">Client Details</th>
                                            <th style="width:25%;">Order Details</th>
                                            <th style="width:20%;">Status</th>
                                            <th style="width:10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(is_array($result)){
										foreach($result as $key=>$value){
											$date_time = $value['0']['creation_date'];
											$joining_date = date ( 'd M Y', $date_time );
											$joining_time = date ( 'g:i a', $date_time );
											$get_eater_details = $db->get_all('eaters',array('eater_id'=>$value['0']['eater_id']),array('name','address','region','mobile','email'));
                                    	    $region = explode('___',$get_eater_details['0']['region']);
											?>
                                    
                                        <tr class="odd gradeX">
                                            <td class="tooltip-demo">
                                            <span class="label label-info"><?php echo $key;?></span><?php if($value['0']['fooder_view']==0){?>
                                            <i class="fa fa-bell text-danger" data-toggle="tooltip" data-placement="top" data-original-title="New Order"></i>
                                            <?php }?>
                                            <div class="divider"></div>
                                            <span class="label label-warning"><?php echo $joining_date.' '.$joining_time;?></span>
                                            <div class="divider"></div>
                                            <span class="label label-success">Order Type : <?php echo $feature->textstyler($value['0']['order_type'],0);?></span>
                                            <div class="divider"></div>
                                            <span class="label label-info">Payment Type : <?php echo $feature->textstyler($value['0']['payment_type'],0);?></span>
                                            </td>
                                            
                                            
                                            <td>
                                            <b><i class="fa fa-user"></i> <?php echo $get_eater_details['0']['name'];?></b> 
                                            <div class="divider"></div>
                                            <i class="fa fa-home"></i> <span class="text-muted"><?php echo $get_eater_details['0']['address'];?></span>
                                            <div class="divider"></div>
                                            <span class="text-muted"><?php echo $region['1'];?></span>
                                             <div class="divider"></div>
                                             <i class="fa fa-mobile"></i> <b><span class="text-success"><?php echo $get_eater_details['0']['mobile'];?></span></b>
                                             <div class="divider"></div>
                                             <i class="fa fa-envelope"></i> <span class="text-primary"><?php echo $get_eater_details['0']['email'];?></span>
                                            </td>
                                            
                                            <td>
                                            <?php foreach($value as $orders){?>
                                            <b class="text-primary"><?php echo $orders['fooder_name'].'</b>&nbsp; &nbsp;<b class="text-danger"><i class="fa fa-rupee"></i> '.ceil($orders['total']);?></b>
                                            <div class="divider"></div>
                                            <div class="row">
                                            <div class="col-lg-12">
                                            <?php $products = unserialize($orders['details']);
                                            foreach ($products as $product){?>
                                            <span class="text-success"><?php echo $product['product_name'].' x '.$product['quantity'];?></span>
                                            <div class="divider"></div>
                                            <?php }?>
                                            </div>
                                            </div>
                                            <?php }?>
                                            </td>
                                            <td class="tooltip-demo">
                                             <form method="post" action="">
                                            <input type="hidden" name="status_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
                                            <input type="hidden" name="status_order" value="orderstatus">
                                            <input type="hidden" name="order_id" value="<?php echo $key;?>">
                                            <select class="form-control" name="order_status">
                                            <option value="In Process" <?php if($value['0']['status']=='In Process') echo "selected"; ?>>In Process</option>
											<option value="Completed" <?php if($value['0']['status']=='Completed') echo "selected"; ?>>Completed</option>
											<option value="Cancelled" <?php if($value['0']['status']=='Cancelled') echo "selected"; ?>>Cancelled</option>
                                                
                                            </select>
                                            <button type="submit" class="btn btn-success btn-xs" name="status_submit" data-toggle="tooltip" data-placement="top" data-original-title="Save Status"><i class="fa fa-save"></i></button>
                                            </form>
                                            </td>
                                            <td class="tooltip-demo">
                                             <a href="<?php echo $link->link('orders_details',admin,'&order_id='.$key);?>" class="btn btn-warning btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                           
                                            </td>
                                        </tr>
                                    
                                    <?php  } }?>
                                    
                                       
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