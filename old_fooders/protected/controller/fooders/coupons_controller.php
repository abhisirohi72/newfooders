<?php 
$db->order_by = "`id` DESC";
$get_coupons = $db->get_all('coupons',array('fooder_id'=>$fooder_id));
$delete_coupid = $link->hrefquery ();
$del_coupid = $delete_coupid ['1'];

if ($del_coupid != '') {
	$delete = $db->delete ( 'coupons', array ('id' => $del_coupid ) );
    if($delete){
        $session->redirect('coupons',fooders);
    }
}
if (isset ( $_POST ['del_coupon'] )) {
	$del_id = $_POST ['del_id'];
	$fv->form_delete_popup ( '<i class="icon-hand-right"></i>' . fmvays, fmvys, $query2ans, fooders, '?delete_coupid=' . $del_id );
}
?>