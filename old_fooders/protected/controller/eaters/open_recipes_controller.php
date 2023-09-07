<?php
if($_REQUEST['page_no']=='' || $_REQUEST['page_no']=='0')
{
$_REQUEST['page_no']=1;
}
if($query2=='category_type')
{
$_REQUEST['category_type'] = str_replace('+','',urldecode($_REQUEST['category_type']));	
$category = "recp.recipe_type='".$_REQUEST['category_type']."'";
}else{
	$category ="1";
}
if($query2=='page_no' || $query2=='' || $query2== 'category_type' || $query3== 'page_no' || $query3== '')
{	
if(!isset($_REQUEST['page_no']) || $_REQUEST['page_no']==1 )
{
	$page_no=0;
	$page_no1=0;
	
}
else
{
	$page_no=(abs($_REQUEST['page_no'])-1)*show_results_per_page+1;
	$page_no1=(abs($_REQUEST['page_no']-1)*show_results_per_page);
}
$get_recipe_type = $db->run("SELECT `recipe_type`,id, count(recipe_type) as count FROM `recipes` group by `recipe_type`")->fetchAll();

$get_all_recipes = $db->run( "SELECT recp.*, eat.name FROM `recipes` AS recp LEFT JOIN `eaters` As eat ON eat.eater_id=recp.eater_id where ".$category." order by recp.id DESC LIMIT ".$page_no1.",".show_results_per_page)->fetchAll();
if(count($get_all_recipes)==0)
	$session->redirect('open_recipes&page_no=1');
}

else
{
	$session->redirect('open_recipes&page_no=1');
}

?>