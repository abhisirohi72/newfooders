  <?php
if(!$session->Check() && $_SESSION['type']!=='eater'){
	$session->redirect('home',eaters);
}
else{
$get_all_recipes = $db->get_all('recipes',array('eater_id'=>eater_id));

  ?>
  
   <div class="wrapper" >
      <div class="row-fluid kr-row-fluid">
         <div class="span12">
          <?php require SERVER_ROOT.'/protected/setting/eaters/eater_sidebar.php';?>
           
        <div class="span8 kr-span">
          <div class="row-fluid">
            <div class="span12">
            <div class="span4"><h3>View Your Recipe</h3></div>
            <div class="span8"></div>
            </div>
         </div> 
         <div class="kr-hr"></div>
         <br>   
<div class="row-fluid">
<div class="span12">
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
										<tr>
											<th>Recipe Name</th>
											<th>Recipe Type</th>
											<th>Recipe Like</th>
											<th>Recipe Dislike</th>
											<th>Created Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									if(is_array($get_all_recipes)){
									foreach($get_all_recipes as $recipe){
										$created_date = $recipe['created_date'];
										$created_date = date ( 'd M Y', $created_date );
									?>
									<tr>
											<td><?php echo $recipe['recipe_name'];?></td>
											<td><?php echo $recipe['recipe_type']?></td>
											<td><?php echo $recipe['recipe_like'];?></td>
											<td><?php echo $recipe['recipe_dislike'];?></td>
											<td class="center"><span class="label label-warning"><?php echo $created_date;?></span></td>
											<td class="td-actions">
												<div class="hidden-phone visible-desktop action-buttons">
													<a href="<?php echo $link->link('recipes','','&recipe_edit_id='.$recipe['id']);?>"><i class="icon-pencil bigger-130"></i></a>
													&nbsp;&nbsp;<a href="<?php echo $link->link('recipes','','&recipe_delete_id='.$recipe['id']);?>"><i  class="icon-trash bigger-130"></i></a>
												</div>
											</td>
										</tr>
										<?php }}?>
									</tbody>
								</table>
							</div>
							</div>
            </div>
        </div>
        </div>   
        </div><!-- /wrapper -->	
        <?php }?>						