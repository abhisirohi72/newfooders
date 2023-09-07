<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1434534196794147";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>     
      
      <div class="wrapper kr-row-fluid" >
     <br>
       <div class="row-fluid">
            <div class="span12 center">
            <h1>Recipes <?php if($_REQUEST['category_type']!='') echo "For ".$_REQUEST['category_type'];?></h1>
            </div>
            </div>
           	<div class="row-fluid kr-row-fluid">
            <div class="span12">
           
            <div class="span7 padding-left-recipe"> 
 			<div class="row-fluid"><div class="span12"></div></div>
 			<?php if(is_array($get_all_recipes)){
 			foreach ($get_all_recipes as $recipes){
 			?>
 			
 			<div class="row-fluid"><div class="span12 open-recipe-hr">
 			<div class="span8 open-recipe-font">
 			<span rel="tooltip" data-placement="top" data-original-title="Recipe Name"><?php echo '<a class="recipe-open-link" href="'.$link->link('open_recipe_details','','&recipe_id='.$recipes['id']).'">'.$recipes['recipe_name'].'</a>';?></span>
 			</div>
 			<div class="span4 open-recipe-date">
 			
 			</div>
 			
 			</div></div>
 			<br>
 			
 			<div class="row-fluid">
 			<div class="span12">
 			<div class="row-fluid">
 			<div class="span12">
 			<a href="<?php echo $link->link('open_recipe_details','','&recipe_id='.$recipes['id']);?>"><img src="<?php echo SITE_URL.'/uploads/eaters/'.md5($recipes['eater_id']).'/recipes/'.$recipes['recipe_image'];?>" width="590px" height="300px"></a>
 			</div>
 			</div>
 			<br>
 			<div class="row-fluid">
 			<div class="span12">
 			<div class="tab-tr" id="t1">
 		    <div class="span3 recipe-open-like">
 		    <span rel="tooltip" data-placement="top" data-original-title="Recipe Creation Date"><i class="icon-calendar"></i> <?php echo date ( 'd M Y', $recipes['created_date']);?></span>    </div>
 		   
 		    <div class="span5 recipe-open-like">
 		   	<span style="color:#ADADAD;">Posted By</span>&nbsp;&nbsp; <img src="<?php echo SITE_URL.'/uploads/eaters/'.md5($recipes['eater_id']).'/pictures/selfie.jpg';?>" width="20px" height="20px"> <?php echo $recipes['name'];?>
		    </div>
 		    <div class="span1"></div>
 		    <div class="span3">
 		    
 		    <div class="stat-cnt">
                <div class="rate-count"><?php echo $recipes['views'];?> <span style="font-size:14px;">Views</span></div>
                <div class="stat-bar">
                  
                    <?php if(($recipes['recipe_like']+$recipes['recipe_dislike'])>0) {?>
                    <div class="bg-green" style="width:<?php  echo($recipes['recipe_like']/($recipes['recipe_like']+$recipes['recipe_dislike']))*100; ?>%"></div>
                    <div class="bg-red" style="width:<?php echo ($recipes['recipe_dislike']/($recipes['recipe_like']+$recipes['recipe_dislike']))*100; ?>%"></div>
              <?php }else{?>
              <div class="bg-gray" style="width:100%"></div>
              <?php }?>
                
                </div>
             <div class="dislike-count"><i class="icon-thumbs-down"></i> <?php echo $recipes['recipe_dislike'];?></div>
                <div class="like-count"><i class="icon-thumbs-up"></i> <?php echo $recipes['recipe_like'];?></div>
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
 	<span class="desc-open-recipe"><?php echo substr(html_entity_decode($recipes['ingredients'],ENT_QUOTES,"UTF-8"),0,125).'...';?></span>
 	<br>
 	<span class="ingredient">Cooking Instructions</span><br>
 	<span class="desc-open-recipe"><?php echo substr(html_entity_decode($recipes['cooking_instructions'],ENT_QUOTES,"UTF-8"),0,125).'... <br><a style="text-decoration:none;" href="'.$link->link('open_recipe_details','','&recipe_id='.$recipes['id']).'"><span class="label label-warning right-float">Read more...</span></a>';?></span>
 	</div>
 	</div>
 	<br>
 	<div class="grey-hr"></div>
 	<br>
 	</div>
 	</div>
 	
 	<?php }}?>		
 		<div class="srch-paging">
 		<?php 
 		if($query2=='category_type')
 		$tot_recipes=$db->get_count('recipes',array('recipe_type'=>$_REQUEST['category_type']));
 		else 
 			$tot_recipes=$db->get_count('recipes');
 		if($page_no==0) 
 			$page_no=1; 
 		$upto_results=$page_no+show_results_per_page-1;
 		if($upto_results>$tot_recipes) 
 			$upto_results=$tot_recipes;
 		if($_REQUEST['category_type']!='')
 			$cat="&category_type=".$_REQUEST['category_type'];
 		else
 			$cat='';
 		?>
                                	<div class="row">
                                        	<p class="dis-pag">Displaying results <?php echo $page_no." - ".$upto_results;?> of <?php echo $tot_recipes;?></p>
                                            <p class="page-no">
                                            <?php if(($_REQUEST['page_no']-1)>0)
                                               		echo '<a href="'.$link->link('open_recipes'.$cat,eaters,'&page_no='.($_REQUEST['page_no']-1)).'">Previous</a>';
                                               		?>
                                                
                                               <?php if($_REQUEST['page_no']-2>0) 
                                                echo '<a href="'.$link->link("open_recipes".$cat,eaters,"&page_no=".($_REQUEST['page_no']-2)).'">'.($_REQUEST['page_no']-2).'</a>';
                                                ?>
                                                <?php if($_REQUEST['page_no']-1>0) 
                                                echo '<a href="'.$link->link("open_recipes".$cat,eaters,"&page_no=".($_REQUEST['page_no']-1)).'">'.($_REQUEST['page_no']-1).'</a>';
                                                ?>
                                                <a href="#" class="active_page"><?php if($_REQUEST['page_no']>0) echo $_REQUEST['page_no']; else echo "1" ;?></a>
                                                 <?php if(isset($_REQUEST['page_no']) && $_REQUEST['page_no']+1<=ceil($tot_recipes/show_results_per_page)) 
                                                echo '<a href="'.$link->link("open_recipes".$cat,eaters,"&page_no=".($_REQUEST['page_no']+1)).'">'.($_REQUEST['page_no']+1).'</a>';
                                                ?>
                                                <?php if($_REQUEST['page_no']+2<ceil($tot_recipes/show_results_per_page)) 
                                                echo '<a href="'.$link->link("open_recipes".$cat,eaters,"&page_no=".($_REQUEST['page_no']+2)).'">'.($_REQUEST['page_no']+2).'</a>';
                                                ?>
                                                <?php if($_REQUEST['page_no']+3<ceil($tot_recipes/show_results_per_page)) 
                                                echo '...';
                                                ?>
                                                
                                               	<?php if(($_REQUEST['page_no']+1)<=ceil($tot_recipes/show_results_per_page)) 
                                               		echo '<a href="'.$link->link('open_recipes'.$cat,eaters,'&page_no='.($_REQUEST['page_no']+1)).'">Next</a>';
                                               		?>
                                              
                                            </p>
                                        </div>
                                    </div>
 			
 			</div>
 			<div class="span1"></div>
 			<div class="span4">
 			<div class="row-fluid"><div class="span12"></div></div>
 			<div class="row-fluid">
 			<div class="span12">
 			<div class="span4 recipe_categ" style="width:31%;">Categories</div>
 			<div class="span8">
 		    <input type="text" name="categ_search" id="filter" value="" placeholder="Search Categories" style="width:85%;"> 
        	</div>
 			
 			</div>
 			</div>
 			<br>
 			
 			<?php
 			
 			if(is_array($get_recipe_type)){
 			foreach($get_recipe_type as $type){
 			
 				?>
 			<div class="row-fluid list">
 			<div class="span12" style="font-size:14px;color:#E18768;">
 			<?php echo '<a style="color:#E18768;text-decoration:none;" href="'.$link->link('open_recipes',eaters,'&category_type='.urlencode($type['recipe_type'])).'">'.$type['recipe_type'].' ('.$type['count'].')</a>'; ?>
 			</div>
 			</div>
 			<?php } }?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- KRAHO -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:650px"
     data-ad-client="ca-pub-8605102717299212"
     data-ad-slot="7582327314"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> 			</div> 
            </div>
            </div>
           
        </div><!-- /wrapper -->

 
