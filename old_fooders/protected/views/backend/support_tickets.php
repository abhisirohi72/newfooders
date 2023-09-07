 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Support Tickets</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
 <?php echo $display_care;?>
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Support Tickets
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width:7%;">S.No.</th>
                                            <th style="width:30%;">Name</th>
                                            <th style="width:15%;">Mobile</th>
                                            <th style="width:38%;">Message</th>
                                            <th style="width:10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($get_care)){
                                    foreach($get_care as $care){
                                    	$date_time = $care['timestamp'];
                                        $date = date ( 'd M Y', strtotime($date_time ));
                                    	$time = date ( 'H:i', strtotime($date_time ));
                                    	?>
                                    
                                        <tr class="odd gradeX">
                                            <td><?php echo $care['id'];?></td>
                                            <td class="tooltip-demo">
                                            <b><i class="fa fa-user"></i> <?php echo $care['name'];?></b><?php if($care['admin_view']==0){?>
                                            <i class="fa fa-bell text-danger" data-toggle="tooltip" data-placement="top" data-original-title="New Support Ticket"></i>
                                            <?php }?>
                                            <div class="divider"></div>
                                            <span class="label label-info"><i class="fa fa-envelope"></i> <?php echo $care['email'];?></span>
                                            <div class="divider"></div>
                                            <span class="label label-warning"><i class="fa fa-calendar"></i> &nbsp;<?php echo $date.' '.$time;?></span>
                                            <div class="divider"></div>
                                            <span class="label label-success"><i class="fa fa-signal"></i> &nbsp;<?php echo $care['ip'];?></span>
                                           
                                            </td>
                                            <td><span class="text-success"><b><i class="fa fa-mobile"></i>  <?php echo $care['phone_number'];?></b></span></td>
                                            <td><span class="text-muted"><small><?php echo $care['message'];?></small></span></td>
                                            <td class="tooltip-demo">
                                            <form method="post" action="">
                                            <input type="hidden" name="delete_care_id" value="<?php echo $care['id'];?>">
                                            <input type="hidden" name="delete_care_name" value="<?php echo $care['name'];?>">
                                            <button type="submit" class="btn btn-danger btn-xs lead" name="delete_submit" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                            <i class="fa fa-trash-o"></i></button>
                                            
                                            <a href="<?php echo $link->link('support_tickets_reply',admin,'&careid='.$care['id']);?>" class="btn btn-warning btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="Email Reply"><i class="fa fa-mail-reply"></i></a>
                                            <?php if($care['eater_id']!=='0'){?>
                                            <a href="<?php echo $link->link('support_tickets',admin,'&stid='.$care['id']);?>" class="btn btn-primary btn-xs lead" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                            <?php }?>
                                            </form>
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