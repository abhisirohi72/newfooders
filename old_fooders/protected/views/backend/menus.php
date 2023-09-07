 <div id="page-wrapper">
           <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="huge">Menus</span> <span class="text-muted">Latest 100 Menus</span>
                </div>
            </div>
            <!-- /.row -->
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Menus
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Creation Date</th>
                                            <th>Name</th>
                                            <th>Fooder Name</th>
                                            <th>Description</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($get_menus)){
                                    foreach($get_menus as $menus){
                                    	$date_time = $menus['entry_date'];
                                    	$date = date ( 'd M Y', $date_time );
                                    	$time = date ( 'g:i a', $date_time );
                                    	?>
                                        <tr class="odd gradeX">
                                            <td style="width:7%;"><span class="text-success"><b><?php echo $menus['id'];?></b></span></td>
                                            <td style="width:15%;">
                                            <span class="label label-warning"><?php echo $date.' '.$time;?></span>
                                            </td>
                                            <td  style="width:20%;" class="tooltip-demo">
                                            <b><?php echo $menus['name'];?></b>
                                            <div class="divider"></div>
                                            <?php if($menus['status']==0){?>
                                            <span class="label label-danger" data-toggle="tooltip" data-placement="top" data-original-title="Menu Status">Not Available</span>
                                            <?php }else{?>
                                            <span class="label label-success" data-toggle="tooltip" data-placement="top" data-original-title="Menu Status">Available</span>
                                            <?php }?>
                                            <div class="divider"></div>
                                            <span class="label label-info" data-toggle="tooltip" data-placement="top" data-original-title="Menu Tags"><?php echo $menus['tags'];?></span>
                                            </td>
                                            <td  style="width:28%;">
                                            <?php 
                                            $getfooder = $db->get_col('fooders',array('fooder_id'=>$menus['fooder_id']),'name');
                                            echo '<a href="#"><span class="text-success"><b>'.$getfooder['0'].'</b></span></a>';
                                            ?>
                                            </td>
                                            <td  style="width:30%;"><p><small class="text-muted"><?php echo $menus['description'];?></small></p></td>
                                            
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