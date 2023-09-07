<?php
$img = $link->hrefquery ();
$imgname = $img ['0'];



if (isset($_REQUEST['delete_imagename'])) {
	//$del_imagename = $img ['1'];
	$del_imagename =$_REQUEST['delete_imagename'];
	$imgstatus = '';
	unlink ( $del_imagename );
	$session->redirect ( 'image_gallery', fooders );
} 
elseif ($img ['1'] == '1' || $img ['1'] == '0') // active and inactive
{
	$imgstatus = $img ['1'];
	if ($imgstatus == '1') {
		$newimg = str_replace ( '___' . $imgstatus . '___', '___0___', $imgname );
		rename ( $pathofimages . $imgname, $pathofimages . $newimg );
	} else {
		$newimg = str_replace ( '___' . $imgstatus . '___', '___1___', $imgname );
		rename ( $pathofimages . $imgname, $pathofimages . $newimg );
	}
	$session->redirect ( 'image_gallery', fooders );
}
if ($_SERVER ['REQUEST_METHOD'] == 'POST' && isset ( $_POST ['save_image'] ) && $_POST ['save_gallery'] == $password->stringbreak ( $_SERVER ['REMOTE_ADDR'] )) {
	if (fooder_current_images + count ( $_FILES ['file'] ['name'] ) <= fooder_images_allowed) {
		$imgname = '';
		$imgstatus = 'na';
		if ((fooder_current_images + 1) <= fooder_images_allowed) {
			?>
<script type="text/javascript">
					$(document).ready(function(){
						$(".loader").show();
					});
					</script>
<?php
			$files = array ();
			foreach ( $_FILES ['file'] as $k => $l ) {
				foreach ( $l as $i => $v ) {
					if (! array_key_exists ( $i, $files ))
						$files [$i] = array ();
					$files [$i] [$k] = $v;
				}
			}
			// now we can loop through $files, and feed each element to the
			// class
			foreach ( $files as $file ) {
				$handle = new upload ( $file );
				if ($handle->image_src_type == 'jpg' || $handle->image_src_type == 'jpeg' || $handle->image_src_type == 'png') {
					if ($handle->uploaded) {
						$handle->file_new_name_body = (rand ( 1, 5 ) + time ()) . "___1___";
						if ($handle->image_src_y > '768') {
							if ($handle->file_src_size <= '1024000') {
								$handle->image_resize = true;
								$newimageheight = ($handle->image_src_y / 2.66);
								$handle->image_y = $newimageheight;
								$handle->image_ratio_x = true;
							} elseif ($handle->file_src_size > '1024000') {
								$handle->image_resize = true;
								$newimageheight = ($handle->image_src_y / 5.32);
								$handle->image_y = $newimageheight;
								$handle->image_ratio_x = true;
							}
						} elseif ($handle->image_src_x > '1024' && $handle->image_src_y < '768') {
							if ($handle->file_src_size <= '1024000') {
								$handle->image_resize = true;
								$newimagewidth = ($handle->image_src_x / 2.66);
								$handle->image_x = $newimagewidth;
								$handle->image_ratio_y = true;
							} elseif ($handle->file_src_size > '1024000') {
								$handle->image_resize = true;
								$newimagewidth = ($handle->image_src_x / 5.32);
								$handle->image_x = $newimagewidth;
								$handle->image_ratio_y = true;
							}
						}
						$handle->image_convert = 'jpg';
						$handle->image_watermark = SERVER_ROOT . '/assets/fooders/img/watermark.png';
						$handle->image_watermark_x = - 20;
						$handle->image_watermark_y = - 20;
						
						$handle->Process ( SERVER_ROOT . '/uploads/fooders/' . $fooder_id . '/gallery/' );
						// we check if everything went OK
						if ($handle->processed) {
							?>
<script type="text/javascript">
					$(document).ready(function(){
						$(".loader").hide();
					});
					</script>
<?php
							
							$session->redirect ( 'image_gallery', fooders );
						} else {
							$displayimage = $fv->form_error ( fimgcpip, fimgcpciq );
						}
					} else {
						$displayimage = $fv->form_error ( fimgcpiu, fimgcptast );
					}
				} else {
					$displayimage = $fv->form_error ( fimgcimf, fimgcoext );
				}
			}
		} else {
			$displayimage = $fv->form_error ( fimgcsh, fimgcyi . " " . $_SERVER ['REMOTE_ADDR'] . " " . fimgcirsa );
		}
	} else {
		$displayimage = $fv->form_error ( fimgcos, fimgcypn . " " . fooder_plan_name . " " . fimgcdnam . " " . fooder_images_allowed . " " . fimgcisb . '<a class="badge badge-warning" href="' . $link->link ( 'plans', fooders ) . '">' . fimgcchu . '</a>' );
	}
} elseif (isset ( $_POST ['del_image'] )) {
	$del_imagename = $_POST ['del_imagename'];
	$fv->form_delete_popup ( fimgcays . '<i class="icon-hand-right"></i>' . fimgcywtd, fimgcyias, $query2ans, fooders, '?delete_imagename=' . $del_imagename );
}
?>
<script type="text/javascript">
$( document ).ready(function() {
    $( "#logo_sub" ).click(function(){ 
    	$( "#loader" ).show();
    });
    });
    </script>
