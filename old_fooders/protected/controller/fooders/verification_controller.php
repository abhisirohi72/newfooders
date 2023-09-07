
<?php
if ($session->check($_SESSION) === FALSE) {
    $session->redirect('login', fooders);
}

$document_array = array('1' => 'FSSAI License', '2' => 'PAN Card', '3' => 'GST', '4' => 'MENU');

if (isset($_POST['document_submit'])) {
    $file = $_FILES['file'];
    $type = $_POST['document_type'];

    if ($type == "") {
        $display_fooders_cp = $fv->form_error('Error', 'Select document Type');
    } elseif ($file['name'] == '') {
        $display_fooders_cp = $fv->form_error('Error', 'Select document file');
    } else {
        $filename1 = $file['name'];
        $tempname1 = $file['tmp_name'];
        $path1 = SERVER_ROOT . '/uploads/fooder_documents/' . $fooder_id . '/';
        if (!is_dir($path1)) {
            if (!file_exists($path1)) {
                mkdir($path1);
            }
        }
        $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
        $targetFile1 = time() . '.' . $ext1;
        $newFilename1 = $targetFile1; 

if($ext1=='png' || $ext1=='jpg'|| $ext1=='jpeg' || $ext1=='pdf')
{
    move_uploaded_file($tempname1, $path1 . $newFilename1);
    $savedata = $db->insert('fooders_documents', array(
        'fooder_id' => $fooder_id,
        'document_name' => $newFilename1,
        'document_type' => $type, 'created_date' => time(), 'ip' => $_SERVER['REMOTE_ADDR']
    ));
    if (isset($savedata)) {
        $fv->form_success_popup('Document upload successfully!', fcpbclt, $query2ans, fooders, '');
    }
}else{
    $display_fooders_cp = $fv->form_error('Error', 'Upload only pdf,jpeg,jpg and png files');
}
 }
}

if(isset($_POST['delete_submit']))
{
    print_r($_POST);
$delete_id=$_POST['delete_id'];
$file_name=$_POST['file_name'];
$delete=$db->delete('fooders_documents',array('id'=>$delete_id));

$path = SERVER_ROOT . '/uploads/fooder_documents/' . $fooder_id . '/' . $file_name;
if(file_exists($path))
{
    unlink($path); 
}


if(isset($delete))
{
	$fv->form_success_popup ('Delete successfully!',fcpbclt, $query2ans, fooders, '' );

}
}



echo $display_fooders_cp;
?> 