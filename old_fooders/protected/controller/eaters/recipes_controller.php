<?php
if(!$session->Check() && $_SESSION['type']!=='eater'){
	$session->redirect('home',eaters);
}
else{
	$recipe_edit_id = $_REQUEST['recipe_edit_id'];
	$recipe_delete_id = $_REQUEST['recipe_delete_id'];
	
	if($recipe_edit_id!='')
	$get_recipe = $db->get_row('recipes',array('eater_id'=>eater_id,'id'=>$recipe_edit_id));
	
	elseif($recipe_delete_id!='')
	$get_recipe = $db->get_col('recipes',array('eater_id'=>eater_id,'id'=>$recipe_delete_id),'recipe_image');
	
	$path = SERVER_ROOT.'/uploads/eaters/'.md5(eater_id).'/recipes/';
	
	$db->group_by="`name`";
	$get_all_cuisines = $db->get_col('fooders_menus',array(),'name');
	if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['recipe_submit'] ) && $_POST ['recipe_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
	{
		
     $recipe_name = $fv->trim($_POST['recipe_name']);
     htmlentities($comment, ENT_QUOTES, "UTF-8");
     $ingredients = $fv->trim(htmlentities($_POST['ingredients'],ENT_QUOTES,"UTF-8"));
     $cooking =  $fv->trim(htmlentities($_POST['cooking'],ENT_QUOTES,"UTF-8"));
     $recipe_type = $_POST['recipe_type'];
     $recipe_ip = $_SERVER['REMOTE_ADDR'];
     $recipe_created_date = time();

     $image_name = $_FILES['file']['name'];
    
     if($fv->emptyfields(array('Recipes Name'=>$recipe_name)))
     {
     	$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Recipe Name Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
     	</div>';
     }
     elseif($fv->emptyfields(array('Recipe Image'=>$image_name)) && $recipe_edit_id=='')
     {
     	$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Please Choose Image ! <i class="icon-remove" data-dismiss="alert"></i>
     	</div>';
     }
     elseif($fv->emptyfields(array('Ingredients'=>$ingredients)))
     {
     	$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Ingredients Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
     	</div>';
     }
     elseif($fv->emptyfields(array('Cooking Instructions'=>$cooking)))
     {
     	$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Cooking Is Empty ! <i class="icon-remove" data-dismiss="alert"></i>
     	</div>';
     }
     elseif($recipe_type==='0')
     {
     	$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Please Select Recipe Type ! <i class="icon-remove" data-dismiss="alert"></i>
     	</div>';
     }
     else{
     	if($image_name!=''){
     	$handle = new upload ( $_FILES['file'] );
       
     	//$ext = $handle->file_src_name_ext;
     	$imagename = $handle->file_src_name_body;
     	$imagename = $feature->space_replacer($imagename,'_').'.jpg';
     	$image_size = $_FILES ['file'] ['size'] / 1024;
     	
     	if ($handle->image_src_type == 'jpg' || $handle->image_src_type == 'jpeg' || $handle->image_src_type == 'png' || $handle->image_src_type == 'JPG') 
     	{
     		if($image_size<=1024)
     		{	
     		if ($handle->uploaded) {
     			 			
     			$handle->image_convert = 'jpg';
     			$handle->image_watermark = SERVER_ROOT . '/assets/eaters/img/watermark.png';
     			$handle->image_watermark_x = - 20;
     			$handle->image_watermark_y = - 20;
     
     			if (! file_exists ( $path )) {
     				mkdir ( $path, 0777, true );
     			}
     			
     			$handle->Process ( $path );
     			if ($handle->processed) {
				?>
     			<script>$( document ).ready(function() { $("#loader").hide(); });</script>
     				
     			<?php 	
     			if(count($get_recipe)!='0'){
     				unlink($path.$get_recipe['recipe_image']);
     					$update =$db->update('recipes',array('recipe_name'=>$recipe_name,'ingredients'=>$ingredients,'cooking_instructions'=>$cooking,'recipe_image'=>$imagename,'recipe_type'=>$recipe_type,'recipe_ip'=>$recipe_ip),array('eater_id'=>eater_id,'id'=>$recipe_edit_id));
     					 
     				if($update) $session->redirect('recipes&recipe_edit_id='.$recipe_edit_id);
       		         }
     			else{
     				$insert =$db->insert('recipes',array('eater_id'=>eater_id, 'recipe_name'=>$recipe_name,'ingredients'=>$ingredients,'cooking_instructions'=>$cooking,'recipe_image'=>$imagename,'recipe_type'=>$recipe_type,'recipe_ip'=>$recipe_ip,'created_date'=>$recipe_created_date));
     				if($insert) $session->redirect('recipes_view');
     				
     			}
     			}
     			else{
     				$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Problem In Processing ! <i class="icon-remove" data-dismiss="alert"></i>
     				</div>';
     			}
     		}
     	}
     	else{
     		$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> File size must be less than 1 MB ! <i class="icon-remove" data-dismiss="alert"></i>
     		</div>';
     		
     	}
     	}
     	else
     	{
     		$display_recipes = '<div class="access-error" style="text-align:right;"><i class="icon-warning-sign"></i> Invalid File Only jpg, jpeg and png allowed ! <i class="icon-remove" data-dismiss="alert"></i>
     		</div>';
     	}
     }
     else{
     
     		$update =$db->update('recipes',array('recipe_name'=>$recipe_name,'ingredients'=>$ingredients,'cooking_instructions'=>$cooking,'recipe_type'=>$recipe_type,'recipe_ip'=>$recipe_ip),array('eater_id'=>eater_id,'id'=>$recipe_edit_id));
     		if($update) $session->redirect('recipes&recipe_edit_id='.$recipe_edit_id.'?'.time().rand(4,10));
     		 
     }
     }
     
	}
	elseif ($recipe_delete_id!=''){
		unlink($path.$get_recipe['0']);
		$delete = $db->delete('recipes',array('eater_id'=>eater_id,'id'=>$recipe_delete_id));
		if($delete) $session->redirect('recipes_view');
	}
}
?>
