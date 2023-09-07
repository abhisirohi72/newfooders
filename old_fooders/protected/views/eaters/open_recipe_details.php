      
      
      <div class="wrapper kr-row-fluid">
      <br>
       <div class="row-fluid">
            <div class="span12 center">
            <h1 style="border-bottom: #C76C25 solid 2px;"><?php echo $get_recipe['0']['recipe_name'];?></h1>
            </div>
            </div>
           	<div class="row-fluid kr-row-fluid">
            <div class="span12">
           
            <div class="span7 padding-left-recipe"> 
            <br>
 			<div class="row-fluid"><div class="span12"><?php echo $display_msg;?></div></div>
 			<br>
 			<div class="row-fluid">
 			<div class="span12">
 			<div class="row-fluid">
 			<div class="span12">
 			<a href="<?php echo $link->link('open_recipe_details','','&recipe_id='.$get_recipe['0']['id']);?>"><img src="<?php echo SITE_URL.'/uploads/eaters/'.md5($get_recipe['0']['eater_id']).'/recipes/'.$get_recipe['0']['recipe_image'];?>" width="590px" height="300px"></a>
 			</div>
 			</div>
 			<br>
 			<div class="row-fluid">
 			<div class="span12">
 			<div class="tab-tr" id="t1">
 		    
 		    <?php if ($session->Check () && $_SESSION ['type'] === 'eater') {?>
 		    
 		    <div class="span1 ">
 		    <form method="post" action="">
 		    <input type="hidden" name="recp_like" value="recp_like_val">
 		    <input type="hidden" name="likes_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
 		    <button class="btn btn-success btn-small" name="recipe_like" style="padding:5px;margin-top:10px;" type="submit" ><i class="icon-thumbs-up  recipe-like" id="<?php echo $get_recipe['0']['id'];?>" rel="tooltip" data-placement="top" data-original-title="Like"></i></button>
 		    </form>
 		    </div>
 		     <div class="span1 ">
 		   <form method="post" action="">
 		    <input type="hidden" name="recp_dislike" value="recp_dislike_val">
 		    <input type="hidden" name="dislikes_ip" value="<?php echo $password->stringbreak($_SERVER['REMOTE_ADDR']);?>">
 		    <button class="btn btn-danger btn-small" name="recipe_dislike" style="padding:5px;margin-top:10px;" type="submit"><i class="icon-thumbs-down  recipe-dislike" id="<?php echo $get_recipe['0']['id'];?>" rel="tooltip" data-placement="top" data-original-title="Dislike"></i></button>
 		   </form>
 		    </div>
 		    <?php }else{?>
 		    <div class="span2" style="margin-top:15px;">
 		    <a href="<?php echo $link->link('access',eaters,'&uri='.base64_encode($_SERVER['REQUEST_URI']));?>" class="label label-mini label-info">Sign In to <i class="icon-thumbs-down"></i>&nbsp;<i class="icon-thumbs-up"></i>&nbsp;</a>
 		    </div>
 		    <?php }?>
 		    <div class="span2 recipe-open-like">
 		    <a href="https://twitter.com/share"
				class="twitter-share-button" data-via="<?php Appname;?>"
				data-url="<?php echo $link->link('open_recipe_details',eaters,'&recipe_id='.$recipe_id);?>"
				data-lang="en">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		
 		    </div>
 		    <div class="span2 recipe-open-like">
 		    <script type="text/javascript"
					src="https://apis.google.com/js/platform.js">
		  {parsetags: 'explicit'}
		</script>
			<!-- Place this tag where you want the share button to render. -->
			<div class="g-plus" data-action="share"
				data-annotation="bubble"
				data-href="<?php echo $link->link('open_recipe_details',eaters,'&recipe_id='.$recipe_id);?>"></div>
			<!-- Place this render call where appropriate. -->
			<script type="text/javascript">gapi.plus.go();</script>
 		    
 		    </div>
 		    <div class="span2 recipe-open-like">
 		  <div class="fb-share-button"
		   data-href="<?php echo $link->link('open_recipe_details&recipe_id='.$_REQUEST['recipe_id']);?>"
		   data-type="button_count" data-via="<?php echo Appname;?>"></div>
		    </div>
 		    
 		    <div class="span4">
 		    
 		    <div class="stat-cnt">
                <div class="rate-count"><?php echo $get_recipe['0']['views'];?> <span style="font-size:14px;">Views</span></div>
                <div class="stat-bar">
              <?php if(($get_recipe['0']['recipe_like']+$get_recipe['0']['recipe_dislike'])>0) {?>
                    <div class="bg-green" style="width:<?php  echo($get_recipe['0']['recipe_like']/($get_recipe['0']['recipe_like']+$get_recipe['0']['recipe_dislike']))*100; ?>%"></div>
                    <div class="bg-red" style="width:<?php echo ($get_recipe['0']['recipe_dislike']/($get_recipe['0']['recipe_like']+$get_recipe['0']['recipe_dislike']))*100; ?>%"></div>
              <?php }else{?>
              <div class="bg-gray" style="width:100%"></div>
              <?php }?>
                </div>
             <div class="dislike-count"><i class="icon-thumbs-down"></i> <?php echo $get_recipe['0']['recipe_dislike'];?></div>
                <div class="like-count"><i class="icon-thumbs-up"></i> <?php echo $get_recipe['0']['recipe_like'];?></div>
            </div>
 		    </div>
 	   
 			</div>
 			<br>
 			<div class="row-fluid">
 			<div class="span12">
 			<div class="span6">
 			<span rel="tooltip" data-placement="top" data-original-title="Recipe Creation Date"><i class="icon-calendar"></i> <?php echo date ( 'd M Y', $get_recipe['0']['created_date']);?></span>
 			</div>
 			<div class="span6 right">
 			<span style="color:#ADADAD;">Posted By</span>&nbsp;&nbsp; <img src="<?php echo SITE_URL.'/uploads/eaters/'.md5($get_recipe['0']['eater_id']).'/pictures/selfie.jpg';?>" width="20px" height="20px"> <?php echo $get_recipe['0']['name'];?>
 			</div>
 			</div>
 			</div>
 			
 			
 			
 			</div>
 			
 			</div>
 			<br>
 	<div class="row-fluid">
 	<div class="span12">
 	<span class="ingredient">Ingredients</span>
 	<br>
 	
 	<span class="desc-open-recipe"><?php echo html_entity_decode($get_recipe['0']['ingredients'],ENT_QUOTES,"UTF-8");?></span>
 	<br>
 	<br>
 	<span class="ingredient">Cooking Instructions</span><br>
 	<span class="desc-open-recipe"><?php echo html_entity_decode($get_recipe['0']['cooking_instructions'],ENT_QUOTES,"UTF-8");?></span>
 	</div>
 	</div>
 	
 	
 	</div>
 	</div>
 			</div>
 			<div class="span1"></div>
 			<div class="span4">
 			<div class="row-fluid"><div class="span12"></div></div>
 			<div class="row-fluid"><div class="span12 recipe_categ" style="width:50%;">Related Recipes</div></div>
 			<br>
 		
 			<?php 
 		
 			if(is_array($get_recipe_type)){
 			foreach($get_recipe_type as $type){?>
 			<div class="row-fluid list">
 			<div class="span12" style="font-size:14px;color:#E18768;">
 			<?php echo '<a style="color:#E18768;text-decoration:none;" href="'.$link->link('open_recipe_details',eaters,'&recipe_id='.$type['id']).'">'.$type['recipe_name'].'</a>'; ?>
 			</div>
 			</div>
 			<?php }}?>
 			
 			</div> 
            </div>
            </div>
           <br>
        </div><!-- /wrapper -->

 

