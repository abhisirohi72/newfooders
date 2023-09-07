<?php
$page = explode('&',$query3ans);

if($_REQUEST['page_no']=='' || $_REQUEST['page_no']=='0')
{
	$_REQUEST['page_no']=1;
}
if($page['1']=="page_no" || $page['1']=='')
{   
	
	if(!isset($_REQUEST['page_no']) || $_REQUEST['page_no']==1)
	{
		$page_no=0;
		$page_no1=0;
		
		}
		else
		{
			$page_no=(abs($_REQUEST['page_no'])-1)*show_results_per_page+1;
			$page_no1=(abs($_REQUEST['page_no']-1)*show_results_per_page);
	}
$get_all_comments = $db->run( "SELECT com.*, eat.name FROM `eaters_comments` AS com LEFT JOIN `eaters` As eat ON eat.eater_id=com.eater_id where com.fooder_id=".fooder_id." order by com.id DESC LIMIT ".$page_no1.",".show_results_per_page)->fetchAll();

if(count($get_all_comments)==0)
	$session->redirect('fooder&fooder_profile_token='.fooder_id);
}

else
{
	$session->redirect('fooder&fooder_profile_token='.fooder_id);
}
?>