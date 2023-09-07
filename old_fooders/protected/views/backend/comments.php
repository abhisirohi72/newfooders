 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="huge">Comments</span> <span class="text-muted">Latest 100 Comments</span>
                </div>
            </div>
            <!-- /.row -->
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Comments
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:15%;">Time</th>
                                            <th style="width:32%;">Comment</th>
                                            <th style="width:8%;">Rating</th>
                                            <th style="width:25%;">Fooder Name</th>
                                            <th style="width:20%;">Eater Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($get_comments)){
                                        foreach ($get_comments as $comments){
                                        	$date_time = $comments['timestamp'];
                                        	$date = date ( 'd M Y', strtotime($date_time ));
                                        	$time = date ( 'g:i a', strtotime($date_time ));
                                        	?>
                                        <tr class="odd gradeX">
                                            <td class="tooltip-demo">
                                            <span class="label label-warning"><i class="fa fa-calendar"></i> &nbsp;<?php echo $date.' '.$time;?></span>
                                            <?php if($comments['admin_view']==0){?>
                                            <i class="fa fa-bell text-danger" data-toggle="tooltip" data-placement="top" data-original-title="New Comment"></i>
                                            <?php }?>
                                            <div class="divider"></div>
                                            <span class="label label-success"><i class="fa fa-signal"></i> &nbsp;<?php echo $comments['ip'];?></span>
                                            
                                            </td>
                                            <td>
                                            <span class="text-muted"><p><small><?php echo $comments['comment'];?></small></p></span>
                                            </td>
                                            <td class="tooltip-demo">
                                            <span class="label label-warning" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo 'Speed : '.$comments['speed'].' Taste : '.$comments['taste'].' Service : '.$comments['service'];?>"><b><i class="fa fa-star-o"></i> <?php echo round($comments['average'],2);?></b></span>
                                            </td>
                                            <td>
                                            <?php 
                                            $fooder_name = $db->get_col('fooders',array('fooder_id'=>$comments['fooder_id']),'name');
                                            echo "<a href='#'><b class='text-success'>".$fooder_name['0']."</b></a>";
                                            ?>
                                            </td>
                                            <td>
                                            <?php 
                                            $eater_name = $db->get_col('eaters',array('eater_id'=>$comments['eater_id']),'name');
                                            echo "<a href='#'><b class='text-danger'>".$eater_name['0']."</b></a>";
                                            ?>
                                            </td>
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