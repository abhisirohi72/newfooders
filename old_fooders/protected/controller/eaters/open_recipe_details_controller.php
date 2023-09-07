<?php 
if(count($get_recipe['0'])==0)
	$session->redirect('open_recipes');


$db->limit="0,15";
$get_recipe_type = $db->get_all('recipes',array('recipe_type'=>$get_recipe['0']['recipe_type']),array('recipe_name','id'));



if(isset($_POST['recipe_like']) && $_POST['recp_like']==="recp_like_val" && $_POST['likes_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{		
	
	
	if(!$db->exists('eater_page_stats',array('page_name'=>$query1ans,'eater_id'=>eater_id,'attribute'=>'recipe_'.$recipe_id)))
	{
	$db->insert('eater_page_stats',array('page_name'=>$query1ans,'attribute'=>'recipe_'.$recipe_id,'value'=>'like','eater_id'=>eater_id,'eater_ip'=>$_SERVER['REMOTE_ADDR']));
	$db->run("UPDATE `recipes` SET `recipe_like`=recipe_like+1 where `id`='$recipe_id'");
	$display_msg = '<span class="green  bolder"> You liked this recipe <i class="icon-remove" data-dismiss="alert"></i>
	</span>';
	}
	else 
	{
		
		$page_stats=$db->get_row('eater_page_stats',array('page_name'=>$query1ans,'eater_id'=>eater_id,'attribute'=>'recipe_'.$recipe_id));
		
		if(is_array($page_stats) && $page_stats['value']=='dislike')
		{
			
		$db->update('eater_page_stats',array('value'=>'like'),array('id'=>$page_stats['id']));
        $db->run("UPDATE `recipes` SET  `recipe_like`=recipe_like+1,`recipe_dislike`=recipe_dislike-1 where `id`='$recipe_id'");
	    $display_msg = '<span class="green  bolder"> You liked this recipe <i class="icon-remove" data-dismiss="alert"></i>
		 </span>';
		}
		else
		{
			if($page_stats['eater_id']!=eater_id)
			{
			$db->update('eater_page_stats',array('value'=>'like'),array('id'=>$page_stats['id']));
			$db->run("UPDATE `recipes` SET `recipe_like`=recipe_like+1 where `id`='$recipe_id'");}
		}
	} 
	
}
elseif(isset($_POST['recipe_dislike']) && $_POST['recp_dislike']==="recp_dislike_val" && $_POST['dislikes_ip']===$password->stringbreak($_SERVER['REMOTE_ADDR']) && $_SERVER ['REQUEST_METHOD'] == 'POST'  && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	    

	if(!$db->exists('eater_page_stats',array('page_name'=>$query1ans,'eater_id'=>eater_id,'attribute'=>'recipe_'.$recipe_id)))
	{
	$db->insert('eater_page_stats',array('page_name'=>$query1ans,'attribute'=>'recipe_'.$recipe_id,'value'=>'dislike','eater_id'=>eater_id,'eater_ip'=>$_SERVER['REMOTE_ADDR']));
	$db->run("UPDATE `recipes` SET `recipe_dislike`=recipe_dislike+1 where `id`='$recipe_id'");
	$display_msg = '<span class="red  bolder"> You disliked this recipe <i class="icon-remove" data-dismiss="alert"></i>
	</span>';
	}
	else 
	{
		$page_stats=$db->get_row('eater_page_stats',array('page_name'=>$query1ans,'eater_id'=>eater_id,'attribute'=>'recipe_'.$recipe_id));
		
		if(is_array($page_stats) && $page_stats['value']=='like')
		{
		$db->update('eater_page_stats',array('value'=>'dislike'),array('id'=>$page_stats['id']));
        $db->run("UPDATE `recipes` SET  `recipe_dislike`=recipe_dislike+1,`recipe_like`=recipe_like-1 where `id`='$recipe_id'");
	    $display_msg = '<span class="red  bolder"> You disliked this recipe <i class="icon-remove" data-dismiss="alert"></i>
		 </span>';
		}
		else
		{
			if($page_stats['eater_id']!=eater_id)
			{
			$db->update('eater_page_stats',array('value'=>'dislike'),array('id'=>$page_stats['id']));
			$db->run("UPDATE `recipes` SET `recipe_dislike`=recipe_dislike+1 where `id`='$recipe_id'");
			}
		}
	} 
			
}
else
{
	
		$db->run("UPDATE `recipes` SET `views`=views+1 where `id`=".$recipe_id);
}
?>