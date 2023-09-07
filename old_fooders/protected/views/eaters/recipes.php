
   <div class="wrapper" >
      <div class="row-fluid kr-row-fluid">
         <div class="span12">
          <?php require SERVER_ROOT.'/protected/setting/eaters/eater_sidebar.php';?>
           
        <div class="span8 kr-span">
          <div class="row-fluid">
            <div class="span12">
            <div class="span4"><h3>Write Your Recipe</h3></div>
            <div class="span8"><?php echo $display_recipes;?></div>
            </div>
         </div> 
         <div class="kr-hr"></div>
         <br>   
        <div class="row-fluid">
        <div class="span12">
         <form method="post" action="" enctype="multipart/form-data">
	     <input type="hidden" name="recipe_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
		
        <div class="row-fluid">
        <div class="span12">
        <input autofocus="autofocus" type="text"  class="krinputboxes" name="recipe_name" value="<?php if($recipe_edit_id) echo $get_recipe['recipe_name']; else echo $recipe_name;?>" >
        <label class="krlabel"> RECIPE NAME</label> </div>
        </div>
        <br>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <div class="row-fluid">
        <div class="span12">
        <div class="span10">
         <input type="file" name="file" id="id-input-file-3" />
        </div>
        <?php if($recipe_edit_id==''){?>
        <div class="span2 recipe-required-color">(Required)</div>
        <?php }?>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12 recipe-image-color">
        Best fit 600 (w) * 300 (h) . Must be less than 1 MB.
        </div>
        </div>
        
       </div>
       <div class="span6">
       <?php if($get_recipe['recipe_image']){?>
       <img src="<?php echo SITE_URL.'/uploads/eaters/'.md5(eater_id).'/recipes/'.$get_recipe['recipe_image'];?>" style="width:100px; height:auto; ">
       <?php }?>
        
       </div>
        </div>
       </div>
       <br>
       <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <textarea name="ingredients" class="rc-textarea" rows="5" placeholder="Ingredients"><?php if($recipe_edit_id) echo $get_recipe['ingredients']; else echo $ingredients;?></textarea>
       </div>
       <div class="span6">
        <textarea name="cooking" class="rc-textarea" rows="5" placeholder="Cooking Instructions"><?php if($recipe_edit_id) echo $get_recipe['cooking_instructions']; else echo $cooking;?></textarea>
        </div>
       </div>
        </div>
        <br>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <div class="row-fluid">
        <div class="span12">
        <div class="span10">
         <select name="recipe_type">
		<?php 
		if(is_array($get_all_cuisines)){
			echo '<option  value="0">Choose Recipe Type...</option>';
		foreach ($get_all_cuisines as $key){
			if($get_recipe['recipe_type']===$key){
				echo '<option selected="selected" value="'.$key.'">'.$key.'</option>';
			}
			else{
	   		echo '<option value="'.$key.'">'.$key.'</option>';
			}
      }}?>								
		</select>
		</div>
		<div class="span2 recipe-required-color">(Required)</div>
        </div>
        </div>
        <br>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <button type="submit" autocomplete="off" name="recipe_submit" id="rimage"><i class="icon-food"></i> Save Recipes</button>
        </div>
        <div class="span6">
        <img id="loader" src="<?php echo SITE_URL.'/assets/eaters/img/loader.gif';?>" style="display:none;">
        </div>
        </div>
        </div>
        </div>
        <div class="span6"></div>
		</div>
        </div>
      <br>
        
        </form>
      
        </div>
            </div>
            </div>
        </div>
        </div>   
        </div><!-- /wrapper -->
   

