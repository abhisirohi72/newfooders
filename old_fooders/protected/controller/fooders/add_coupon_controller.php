<?php
// $edit_id = $link->hrefquery ();
// $edit_id = $edit_id ['1']; 
$edit_id = $_REQUEST['edit'];
if(isset($edit_id)){
    $couponid = $feature->encrypt_decrypt('decrypt',$edit_id);    
$get_coupon = $db->get_row('coupons',array('id'=>$couponid));
//print_r($get_coupon);
}
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['discount_submit'] ) && $_POST ['save_discount_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	$coupon_code = $fv->trim ( $_POST ['coupon_code'] );
	$start_date = $fv->trim ( $_POST ['start_date'] );
	$expiry_date = $fv->trim($_POST['expiry_date']);
	$discount_type = $fv->trim($_POST['discount_type']);
    $amount = $fv->trim($_POST['amount']);
	if ($fv->emptyfields ( array ('Coupon Code' => $coupon_code ) )) {
		$displaydiscount = $fv->form_error ( 'Coupon Code field can not empty', 'Please enter coupon code' );
	} 
    elseif ($fv->emptyfields ( array ('Start Date' => $start_date ) )) {
		$displaydiscount = $fv->form_error ( 'Start Date field can not empty', 'Please enter start date' );
	} 
    elseif ($fv->emptyfields ( array ('Expiry Date' => $expiry_date ) )) {
		$displaydiscount = $fv->form_error ( 'Expiry Date field can not empty', 'Please enter expiry date' );
	}
    elseif ($fv->emptyfields ( array ('Amount/Percent' => $amount ) )) {
		$displaydiscount = $fv->form_error ( 'Amount/Percent field can not empty', 'Please enter amount/percent' );
	}
     else {
         if(isset($edit_id)){
             
          $update = $db->update('coupons',array('fooder_id'=>$fooder_id,'coupon_code'=>$coupon_code,'start_date'=>$start_date,'expiry_date'=>$expiry_date,'discount_type'=>$discount_type,'amount'=>$amount),array('id'=>$couponid)); 
          if($update){
           $displaydiscount = $fv->form_success ( famvcong, 'You have successfully updated coupon' ); 
           ?>
          <script> 
           setTimeout(function () {
            window.location = '<?php echo $link->link('coupons',fooders); ?>';
        }, 2500);</script>
        <?php 
          }
         }else{
           $insert =  $db->insert('coupons',array('fooder_id'=>$fooder_id,'coupon_code'=>$coupon_code,'start_date'=>$start_date,'expiry_date'=>$expiry_date,'discount_type'=>$discount_type,'amount'=>$amount,'ip'=>$_SERVER['REMOTE_ADDR'],'created_date'=>time())); 
           if($insert){
            $displaydiscount = $fv->form_success ( famvcong, 'You have successfully created coupon' ); 
            ?>
            <script> 
           setTimeout(function () {
            window.location = '<?php echo $link->link('coupons',fooders); ?>';
        }, 2500);</script>
        <?php }
         }
		
	}
}
?>