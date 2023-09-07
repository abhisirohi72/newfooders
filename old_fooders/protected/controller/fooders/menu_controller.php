<?php
/*
$edit_id = $link->hrefquery ();
$edit_id = $edit_id ['1']; 
*/
$edit_id = $_REQUEST['edit']; 
if($edit_id)
$get_menus = $db->get_all ( 'fooders_menus', array ('fooder_id' => $fooder_id, 'id' => $edit_id ) );

if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['save_menu'] ) && $_POST ['save_menu_ip'] === $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] ) && $_SESSION ['fooder_token'] === $password->stringbreak ( SITE_URL . strtotime ( date ( 'Y-m-d' ) ) )) {
	if ((fooder_current_menus + 1) <= fooder_allowed_menus || isset ( $edit_id ) && $edit_id != '') {
		$menu_name = $feature->remove_newline( $_POST ['menu_name'] );
		$status = $_POST ['status'];
		$tags = $_POST ['menu_tags'];
		$description = $_POST ['description'];
		if ($status == "on") {
			$status = '1';
		} else {
			$status = '0';
		}
		if($edit_id)
		$exist_check = $_POST['menu_id'];
		else 
			$exist_check="-1";

		$empty = $fv->emptyfields ( array ('Name' => $menu_name ), 'display' );
	

		if ($fv->check_alphanumeric ( $menu_name, fmnin, fmoac )) {
			
			if (! $empty) { 
				
				if($edit_id>0)
				{
					$sql="SELECT COUNT(*) FROM `fooders_menus` WHERE `name`='$menu_name' AND `fooder_id`='$fooder_id' AND `id`!='$edit_id'";
					$count=$db->run($sql)->fetchColumn();
					if($count>0)
					{
						$display_menu = $fv->form_error(fmsname , fmoname);
					}else{
						$menu_update_array = array ('fooder_id' => $fooder_id,'name'=>$menu_name, 'status' => $status, 'tags' => $tags, 'description' => $description );
						$db->update ( 'fooders_menus', $menu_update_array, array ('fooder_id' => $fooder_id, 'id' => $edit_id ) );
						$display_menu = $fv->form_success ( fmcong, fmsum ); 

						
						echo "<script>setTimeout(function() {window.location = '';}, 2000);</script>";
					}
		           
					

				}else{

					if(!$db->exists('fooders_menus',array('fooder_id'=>$fooder_id,'name'=>$menu_name))) {
					$menu_insert_array = array ('fooder_id' => $fooder_id, 'name' => $menu_name, 'status' => $status, 'tags' => $tags, 'description' => $description, 'entry_date' => time () );
					$db->insert ( 'fooders_menus', $menu_insert_array );
					$display_menu = $fv->form_success ( fmcong, fmsim );
					}else{
						$display_menu = $fv->form_error(fmsname , fmoname);
					}
				}
					
			// 		if ($exist_check == $edit_id && $db->exists('fooders_menus',array('fooder_id'=>$fooder_id,'id'=>$edit_id,'name'=>$menu_name))){
						
			// 		$menu_update_array = array ('fooder_id' => $fooder_id, 'name' => $menu_name, 'status' => $status, 'tags' => $tags, 'description' => $description );
			
			// 		$db->update ( 'fooders_menus', $menu_update_array, array ('fooder_id' => $fooder_id, 'id' => $edit_id ) );
			// 		$display_menu = $fv->form_success ( fmcong, fmsum );
			// 	} elseif(! $db->exists('fooders_menus',array('fooder_id'=>$fooder_id,'name'=>$menu_name)) && $exist_check=="-1" ) {
			// 		$menu_insert_array = array ('fooder_id' => $fooder_id, 'name' => $menu_name, 'status' => $status, 'tags' => $tags, 'description' => $description, 'entry_date' => time () );
					
			// 		$db->insert ( 'fooders_menus', $menu_insert_array );
			// 		$display_menu = $fv->form_success ( fmcong, fmsim );
					
			// 	}
			// else{
			// 	$display_menu = $fv->form_error(fmsname , fmoname);
			// }
			}
		}
	} else {
		$display_menu = $fv->form_error ( fmos, fmypn . fooder_plan_name . ' ' . fmdnamt . ' ' . fooder_allowed_menus . fmmens . '<a class="badge badge-warning" href="' . $link->link ( 'plans', fooders ) . '">' . fmchtu . '</a>' );
	}
}
?>