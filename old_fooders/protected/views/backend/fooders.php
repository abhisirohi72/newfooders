 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <div class="col-lg-2"><span class="huge">Fooders</span></div> 
                    <div class="col-lg-6"><?php echo $display_approved;?></div>
                    <div class="col-lg-4"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Fooders
                        </div>
                        <!-- /.panel-heading -->
                                              <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:11%;">Fooder Id</th>
                                            <th style="width:15%;">Name</th>
                                            <th style="width:11%;">Mobile</th>
                                            <th style="width:15%;" class="hidden-xs hidden-sm">Address</th>
                                            <th style="width:20%;" class="hidden-xs hidden-sm">Region</th>
                                            <th style="width:19%;">Status</th>
                                            <th style="width:11%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
								
                                     
                                     if(is_array($get_fooders)){
                                    foreach($get_fooders as $fooders){
                                    	
                                    	$date_time = $fooders['joining_date'];
                                    	$joining_date = date ( 'd M Y', $date_time );
                                    	$joining_time = date ( 'H:i', $date_time );
                                    	
                                    	?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $fooders['fooder_id'];?></td>
                                            <td><b><?php echo $fooders['name'];?></b>
                                            <div class="divider"></div>
                                            <span class="label label-info"><?php echo $fooders['login_email'];?></span>
                                            <div class="divider"></div>
                                            <span class="label label-warning"><?php echo $joining_date.' '.$joining_time;?></span>
                                            
                                            </td>
                                            <td><?php if($fooders['mobile']!=''){?>
                                            <span class="text-success"><b><i class="fa fa-mobile"></i>  <?php echo $fooders['mobile'];?></b></span>
                                            <?php }?>
                                            </td>
                                            <td class="hidden-xs hidden-sm"><span class="text-muted"><small><?php echo $fooders['address'];?></small></span></td>
                                            <td class="hidden-xs hidden-sm"><span class="text-muted"><small><?php echo $fooders['location_name'];?></small></span></td>
                                            <td class="tooltip-demo">
                                            <form method="post" action="">
                                            <input type="hidden" name="approved_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
                                            <input type="hidden" name="approved_fooder" value="approved">
                                            <input type="hidden" name="approved_fooder_id" value="<?php echo $fooders['fooder_id'];?>">
                                            <select class="form-control" name="approved_status">
                                            <option value="1" <?php if($fooders['is_approved']=='1') echo "selected"; ?>>Unapproved</option>
											<option value="2" <?php if($fooders['is_approved']=='2') echo "selected"; ?>>Approved</option>
											<option value="3" <?php if($fooders['is_approved']=='3') echo "selected"; ?>>Suspended</option>
                                            <option value="4" <?php if($fooders['is_approved']=='4') echo "selected"; ?>>Terminated</option>    
                                            </select>
                                            <button type="submit" class="btn btn-success btn-xs" name="approved_submit" data-toggle="tooltip" data-placement="top" data-original-title="Save Status"><i class="fa fa-save"></i></button>
                                            </form>
                                            </td>
                                            <td  class="tooltip-demo">
                                            <a href="<?php echo $link->link('fooders_view',admin,'&fid='.$fooders['fooder_id']);?>" class="btn btn-success btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                            <?php if($fooders['is_approved']!=='2'){?>
                                            <a href="<?php echo $link->link('fooders',admin,'&ceid='.$fooders['fooder_id']);?>" class="btn btn-primary btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="Confirmation Email"><i class="fa fa-envelope"></i></a>
                                            <?php }?>
                                          
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