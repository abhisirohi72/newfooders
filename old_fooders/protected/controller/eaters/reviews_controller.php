<?php
if (! $session->Check () && $_SESSION ['type'] !== 'eater') {
	$session->redirect ( 'home', eaters );
}
else{
	if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['review_delete'] ) && $_POST ['review_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) 
	{
         $average_reviews=$fv->removespace($_POST['average_reviews']);
         $number_of_reviews=$fv->removespace($_POST['number_of_reviews']);
         $f_id=$fv->removespace($_POST['fooder_id']);
         $average=$fv->removespace($_POST['average']);
         $comment_id = $fv->removespace($_POST['comment_id']); 
         if($fv->check_numeric($comment_id) && $fv->check_numeric($number_of_reviews) && $fv->check_numeric($f_id) && is_numeric(abs($average)) &&  is_numeric(abs($average_reviews)) )
         {
         	$new_average_reviews=(($average_reviews*$number_of_reviews)-$average)/($number_of_reviews-1);
         	$new_number_of_reviews=$number_of_reviews-1;
         	$update_fooder_details=$db->update('fooders_details',array('average_reviews'=>$new_average_reviews,'number_of_reviews'=>$new_number_of_reviews),array('fooder_id'=>$f_id));
         	if($update_fooder_details)
         		if($db->delete('eaters_comments',array('fooder_id'=>$f_id,'eater_id'=>eater_id,'id'=>$comment_id)))
         	{
         		$session->redirect('reviews',eaters);
         	}
         	
         }
	}
	$db->order_by = "`timestamp` desc";
	$get_all_reviews = $db->get_all ( 'eaters_comments', array ('eater_id'=>eater_id ));
	
	}


?>