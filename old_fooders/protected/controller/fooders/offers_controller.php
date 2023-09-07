<?php 


//echo randomString();

$db->order_by = "`id` DESC";
$get_coupons = $db->get_all('offers',array('fooder_id'=>$fooder_id));
// $delete_coupid = $link->hrefquery ();
// $del_coupid = $delete_coupid ['1'];

$del_coupid = $_REQUEST['delete_coupid'];

if ($del_coupid != '') {
	$delete = $db->delete ( 'offers', array ('id' => $del_coupid ) );
    if($delete){
        $session->redirect('offers',fooders);
    }
}
if (isset ( $_POST ['del_coupon'] )) {
	$del_id = $_POST ['del_id'];
	$fv->form_delete_popup ( '<i class="icon-hand-right"></i>' . fmvays, fmvys, $query2ans, fooders, '?delete_coupid=' . $del_id );
}

//Hi Josiah,<br><br>I hope this email finds you well. I am writing to provide you with an update on the progress of the GBP biz page that you requested.<br><br>As you requested, here is the link to the GBP biz page: <br>https://cusimano-plastic-reconstructive-surgery-baton-rouge.business.site/. Please note that the page is still in progress and has not been completed yet.<br><br>The reason for the delay in its completion is that we are currently awaiting content approval. Alvin, our content specialist, has already sent the necessary content today. We are now eagerly anticipating the finalization of the approval process to proceed with GBP site optimization.<br><br>Once the content is approved, we will swiftly move forward with completing the GBP site optimization. We understand the importance of having a fully functional and optimized page, and we are committed to delivering the best possible outcome.<br><br>Thank you for your patience and understanding. We appreciate your support and look forward to presenting you with the completed GBP biz page soon.<br><br>Best regards,<br>Pallavi<br>Web 20 Ranker GBP Team
?>