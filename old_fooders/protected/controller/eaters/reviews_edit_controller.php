<?php
$edit_id = $link->hrefquery();

if(is_array($edit_id) && $edit_id['0']==="edit_id" && $fv->check_numeric($edit_id['1']) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
{
	$get_reviews = $db->get_row('eaters_comments',array('id'=>$edit_id['1']),array('fooder_id','comment','speed','taste','service','average'));
	$fooder_id = $get_reviews['fooder_id'];
	$get_fooder_name = $db->get_col('fooders',array('fooder_id'=>$fooder_id),'name');
	if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['review_save'] ) && $_POST ['review_edit_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['eater_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) ))
	{
	    $speed = $fv->removespace($_POST['speed']);
	    $taste = $fv->removespace($_POST['taste']);
	    $service=$fv->removespace($_POST['service']);
	    $comment = $fv->trim($_POST['comment']);
	    $comment= htmlentities($comment, ENT_QUOTES, "UTF-8");
        $average = ($speed+$taste+$service)/3;
	    if($fv->check_numeric($speed) || $fv->check_numeric($taste) || $fv->check_numeric($service) || is_numeric(abs($average)))
	    {
	    	$review_update = $db->update('eaters_comments',array('speed'=>$speed,'taste'=>$taste,'service'=>$service,
	    			'average'=>$average,'comment'=>$comment),array('id'=>$edit_id['1']));
	    	if($review_update){
	    		$display_review = '<div class="review-alert"><i class="icon-ok"></i>  Your Review Has Been Updated <i class="icon-remove" data-dismiss="alert"></i></div>';
	    	}
	    	$get_average_count = $db->run ("SELECT sum(`average`) as sum, count(`average`)  as count from `eaters_comments` where `fooder_id`=$fooder_id")->fetchAll();
	    	$average_sum_reviews = $get_average_count['0']['sum'];
	    	// Reviews and comments
	    	$count_reviews = $get_average_count['0']['count'];
	    	if($count_reviews!=='0'){
	    		$total_average_reviews = ($average_sum_reviews/$count_reviews);
	    	}
	    	else{
	    		$total_average_reviews=0;
	    	}
	    	$average_reviews_decimal = round($total_average_reviews,'1');
	    	$db->update('fooders_details',array('average_reviews'=>$average_reviews_decimal,'number_of_reviews'=>$count_reviews),array('fooder_id'=>$fooder_id));
    }
	    
	}
   	
}
else{
	$session->redirect('reviews',eaters);
}



?>