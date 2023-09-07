 <div id="page-wrapper">
            <div class="row">
               <div class="col-lg-12 page-header">
                    <div class="col-lg-2"><span class="huge">Users</span></div> 
                    <div class="col-lg-6"><?php echo $display_verify;?></div>
                    <div class="col-lg-4"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th class="hidden-xs hidden-sm">Address</th>
                                            <th class="hidden-xs hidden-sm">Region</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
								
                                     
                                     if(is_array($get_users)){
                                    foreach($get_users as $users){
                                    	$region = explode('___',$users['region']);
                                    	$date_time = $users['joining_date'];
                                    	$joining_date = date ( 'd M Y', $date_time );
                                    	$joining_time = date ( 'g:i a', $date_time );
                                    	
                                    	?>
                                        <tr class="odd gradeX">
                                            <td style="width:10%;">
                                            <span class="text-success"><b><?php echo $users['eater_id'];?></b></span>
                                            </td>
                                            <td style="width:15%;" class="tooltip-demo"><b><?php echo $users['name']; 
                                            if($users['admin_view']==0){?>
                                            <a href="<?php echo $link->link('users',admin,'&cemail='.$users['eater_id']);?>"><i class="fa fa-bell text-danger" data-toggle="tooltip" data-placement="top" data-original-title="New User"></i></a>
                                            <?php }?></b>
                                            <div class="divider"></div>
                                            <span class="label label-info"><?php echo $users['email'];?></span>
                                            <div class="divider"></div>
                                            <span class="label label-warning"><?php echo $joining_date.' '.$joining_time;?></span>
                                            </td>
                                            <td style="width:11%;">
                                            <?php if($users['mobile']!=''){?>
                                            <span class="text-success"><b><i class="fa fa-mobile"></i>  <?php echo $users['mobile'];?></b></span>
                                            <?php }?>
                                            </td>
                                            <td style="width:18%;" class="hidden-xs hidden-sm"><span class="text-muted"><?php echo $users['address'];?></span></td>
                                            <td style="width:18%;" class="hidden-xs hidden-sm"><span class="text-muted"><small><?php echo $region['1'];?></small></span></td>
                                            <td style="width:18%;" class="tooltip-demo">
                                            <form method="post" action="">
                                            <input type="hidden" name="verify_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
                                            <input type="hidden" name="verify_user" value="verified">
                                            <input type="hidden" name="verify_eater_id" value="<?php echo $users['eater_id'];?>">
                                            <select class="form-control" name="verify_status">
                                            <option value="1" <?php if($users['is_verified']=='1') echo "selected"; ?>>Unverified</option>
											<option value="2" <?php if($users['is_verified']=='2') echo "selected"; ?>>Verified</option>
											<option value="3" <?php if($users['is_verified']=='3') echo "selected"; ?>>Suspended</option>
                                            <option value="4" <?php if($users['is_verified']=='4') echo "selected"; ?>>Terminated</option>    
                                            </select>
                                        
                                            <button type="submit" class="btn btn-success btn-xs" name="verify_submit" data-toggle="tooltip" data-placement="top" data-original-title="Save Status"><i class="fa fa-save"></i></button>
                                            </form>
                                            </td>
                                            <td style="width:10%;" class="tooltip-demo">
                                            <form method="post" action="">
                                            <input type="hidden" name="delete_eater_id" value="<?php echo $users['eater_id'];?>">
                                            <input type="hidden" name="delete_eater_name" value="<?php echo $users['name'];?>">
                                            <button type="submit" class="btn btn-danger btn-xs lead" name="delete_submit" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                            <i class="fa fa-trash-o"></i></button>
                                            
                                            <a href="#" class="btn btn-warning btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php if($users['is_verified']!=='2'){?>
                                            <a href="<?php echo $link->link('users',admin,'&ceid='.$users['eater_id']);?>" class="btn btn-primary btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="Confirmation Email"><i class="fa fa-envelope"></i></a>
                                            <?php }?>
                                            </form>
                                            </td>
                                        </tr>
                                        <?php }}?>
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