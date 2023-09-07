<?php
/*
$edit_id = $link->hrefquery ();
$edit_id = $edit_id ['1'];*/
$edit_id = $_REQUEST['edit']; 

$get_menu = $db->get_all ( 'fooders_menus', array ('fooder_id' => $fooder_id ) );
if($edit_id)
$get_product = $db->get_all ( 'fooders_products', array ('fooder_id' => $fooder_id, 'id' => $edit_id ) );



//echo "<pre>",print_r($get_product),"</pre>";

if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['save_products'] ) && $_POST ['save_product_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	if ((fooder_current_products + 1) <= fooder_allowed_products || isset ( $edit_id ) || $edit_id != '') {
	    $menu_id = $fv->trim($_POST ['menus']);
		$product_name = $feature->remove_newline( $_POST ['product_name'] );
		$product_tags = $_POST ['product_tags'];
		$price = $_POST ['price'];
		$proprice = $_POST ['proprice'];
		$status = $_POST ['status'];
		$product_type = $_POST['product_type'];
		$description = trim($_POST['description']);
		if ($status == "on") {
			$status = 1;
		} else {
			$status = 0;
		}
        $preparation_time = $_POST['preparation_time'];
		if(isset($_POST['top_rated'])){
			$top_rated = 1;
		}else{
			$top_rated = 0;
		}
		if(isset($_POST['most_ordered'])){
			$most_ordered = 1;
		}else{
			$most_ordered = 0;
		}
		if(isset($_POST['best_seller'])){
			$best_seller = 1;
		}else{
			$best_seller = 0;
		}
        
		$handle = new upload ( $_FILES ['file'] );

       

		if($edit_id)
		$exist_check = $_POST['product_id'];

		if(isset($edit_id)){
			if($get_product['0']['picture']==""){  
				//$parr = array ('Menu' => $menu_id, 'Name' => $product_name,'Dish Type'=>$product_type, 'Price' => $price,'Dish Image'=>$_FILES ['file'] ['name'] );
				$parr = array ('Menu' => $menu_id, 'Name' => $product_name,'Dish Type'=>$product_type, 'Price' => $price);
			}else{
				$parr = array ('Menu' => $menu_id, 'Name' => $product_name,'Dish Type'=>$product_type, 'Price' => $price);
			}
		}else{
			//$parr = array ('Menu' => $menu_id, 'Name' => $product_name,'Dish Type'=>$product_type, 'Price' => $price,'Dish Image'=>$_FILES ['file'] ['name'] );
			$parr = array ('Menu' => $menu_id, 'Name' => $product_name,'Dish Type'=>$product_type, 'Price' => $price); 
		}


		$empty = $fv->emptyfields ( $parr, 'display' );
		
		$exist_product_menu_name = $db->exists('fooders_products',array('menu_id'=>$menu_id,'name'=>$product_name));
		
		if (! $empty) {
			$image_size = $_FILES ['file'] ['size'] / 1024;
		
		if(!is_numeric($price)){
					$display_product = $fv->form_error('Oops Sorry !' ,'Price should be numeric!'); 

          }
		 elseif(!is_numeric($proprice) &&  $proprice!="")
		 {
			$display_product = $fv->form_error('Oops Sorry !' ,'Promo Price should be numeric!'); 

         } 
		  else{ 
			if(!$exist_product_menu_name || $menu_id== $get_product['0']['menu_id']){
				if ($_FILES ['file'] ['name']!='') {
					$handle = new upload ( $_FILES ['file'] );
					$ext = $handle->file_src_name_ext;
					if ($image_size <= 500) {
						if ($handle->image_src_type == 'png' || $handle->image_src_type == 'jpeg' || $handle->image_src_type == 'jpg') {
							if ($handle->image_src_y > $handle->image_src_x && $handle->image_src_y > '500')
								$display_product = $fv->form_error ( fcpsidi, fcpshigw );
							else {
								if ($handle->uploaded) {
									$save_dish = $handle->file_new_name_body = time();
									//$handle->image_resize = true;
									// $newimagewidth = '200';
									// $handle->image_x = $newimagewidth;
									//$newimagewidth = $handle->image_src_x;
									//$handle->image_ratio_y = true;
									$handle->file_overwrite = true;
									$handle->Process ( SERVER_ROOT . '/uploads/fooders/' . $fooder_id . '/product/' );
									// we check if everything went OK
									if ($handle->processed) {
										
										$product_update_array = array ('fooder_id' => $fooder_id, 'menu_id' => $menu_id, 'name' => $product_name, 'tags' => $product_tags, 'price' => $price, 'proprice' => $proprice, 'status' => $status,'picture'=> $save_dish . '.' . $ext,'product_type'=>$product_type,'top_rated'=>$top_rated,'best_seller'=>$best_seller,'most_ordered'=>$most_ordered,'preparation_time'=>$preparation_time,'description'=>$description);

										$product_insert_array = array ('fooder_id' => $fooder_id, 'menu_id' => $menu_id, 'name' => $product_name, 'tags' => $product_tags, 'price' => $price, 'proprice' => $proprice, 'status' => $status, 'entry_date' => time (),'picture'=> $save_dish . '.' . $ext,'product_type'=>$product_type,'top_rated'=>$top_rated,'best_seller'=>$best_seller,'most_ordered'=>$most_ordered,'preparation_time'=>$preparation_time,'description'=>$description );

										if ($exist_check) {
											$update_product = $db->update ( 'fooders_products', $product_update_array, array ('fooder_id' => $fooder_id, 'id' => $edit_id) );
											$display_product = $fv->form_success ( fpcong, fpsup );
										} else {
											$db->insert ( 'fooders_products', $product_insert_array );
											$display_product = $fv->form_success ( fpcong, fpsip );
										}
									}
								}
							}
						} else { 
							$display_product = $fv->form_error ( fcpses, fcpstiunvit );
						}
					} else {
						$display_product = $fv->form_error ( fcpses, fpstiyu );
					}
				}else{
					$product_update_array = array ('fooder_id' => $fooder_id, 'menu_id' => $menu_id, 'name' => $product_name, 'tags' => $product_tags, 'price' => $price, 'proprice' => $proprice, 'status' => $status,'product_type'=>$product_type,'top_rated'=>$top_rated,'best_seller'=>$best_seller,'most_ordered'=>$most_ordered,'preparation_time'=>$preparation_time,'description'=>$description);

										$product_insert_array = array ('fooder_id' => $fooder_id, 'menu_id' => $menu_id, 'name' => $product_name, 'tags' => $product_tags, 'price' => $price, 'proprice' => $proprice, 'status' => $status, 'entry_date' => time (),'product_type'=>$product_type,'top_rated'=>$top_rated,'best_seller'=>$best_seller,'most_ordered'=>$most_ordered,'preparation_time'=>$preparation_time ,'description'=>$description);

										if ($exist_check) {
											$update_product = $db->update ( 'fooders_products', $product_update_array, array ('fooder_id' => $fooder_id, 'id' => $edit_id) );
											$display_product = $fv->form_success ( fpcong, fpsup );
										} else {
											$db->insert ( 'fooders_products', $product_insert_array );
											$display_product = $fv->form_success ( fpcong, fpsip );
										}
				}
			 }
			 else{
					 $display_product = $fv->form_error(fpsname , fponame);
			 }
				
			  }
		}
	} else {
		$display_product = $fv->form_error ( fmos, fmypn . " " . fooder_plan_name . " " . fmdnamt . " " . fooder_allowed_products . " " . fpps . '<a class="badge badge-warning" href="' . $link->link ( 'plans', fooders ) . '">'.fpchtu.'</a>' );
	}
}
?>