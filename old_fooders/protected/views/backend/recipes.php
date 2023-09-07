 <div id="page-wrapper">
           <div class="row">
                <div class="col-lg-12 page-header">
                    <span class="huge">Recipes</span> <span class="text-muted">Latest 100 Recipes</span>
                </div>
            </div>
            <!-- /.row -->
 
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View All Recipes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Creation Date</th>
                                            <th>Recipe Name</th>
                                            <th>Ingredients</th>
                                            <th>Cooking</th>
                                            <th>Eater Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($get_recipe)){
                                    foreach($get_recipe as $recipe){
                                    	$date_time = $recipe['created_date'];
                                    	$date = date ( 'd M Y', $date_time );
                                    	$time = date ( 'g:i a', $date_time );
                                    ?>
                                        <tr>
                                            <td  style="width:10%;">
                                            <span class="label label-warning"><i class="fa fa-calendar"></i> &nbsp;<?php echo $date.' '.$time;?></span>
                                            <div class="divider"></div>
                                            <span class="label label-success"><i class="fa fa-signal"></i> &nbsp;<?php echo $recipe['recipe_ip'];?></span>
                                            </td>
                                            <td  style="width:25%;">
                                            <span class="text-success"><b><?php echo $recipe['recipe_name'];?></b></span>
                                            <div class="divider"></div>
                                            <span class="label label-info">Recipe Type : <?php echo $recipe['recipe_type'];?></span>
                                            <div class="divider"></div>
                                            <span class="label label-success">Like(s) : <?php echo $recipe['recipe_like'];?></span>
                                            <span class="label label-danger">Dislike(s) : <?php echo $recipe['recipe_dislike'];?></span>
                                            <span class="label label-warning">Views : <?php echo $recipe['views'];?></span>
                                            </td>
                                            <td  style="width:25%;"><p><small class="text-muted"><?php echo $recipe['ingredients'];?></small></p></td>
                                            <td  style="width:25%;"><p><small class="text-muted"><?php echo $recipe['cooking_instructions'];?></small></p></td>
                                            <td  style="width:15%;">
                                            <?php 
                                            $get_eater_name = $db->get_col('eaters',array('eater_id'=>$recipe['eater_id']),'name');
                                            echo '<a href="#"><span class="text-success"><b>'.$get_eater_name['0'].'</b></span></a>';
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