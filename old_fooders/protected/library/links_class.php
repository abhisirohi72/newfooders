<?php
class links{
	
	public function link($pagename,$panel=NULL,$query=NULL)
	{

		if(SEO==1)
{
    if($panel==admin)
    {
        $query=preg_replace('/&/', '?', $query, 1);
        
        //$query=str_replace('&', '?', $query);
        return SITE_URL."/".admin."/".$pagename."/".$query;
    }
	elseif($panel==fooders)
    { 
        $query=preg_replace('/&/', '?', $query, 1);
        
        //$query=str_replace('&', '?', $query);
        return SITE_URL."/".fooders."/".$pagename."/".$query;
    }
    else {
    $query=preg_replace('/&/', '?', $query, 1);
    
    //$query=str_replace('&', '?', $query);
    return SITE_URL."/".$pagename."/".$query;
    }
}
    else
    {
		
if($panel==fooders)
	return SITE_URL."/index.php?".eaters."=redirect&".fooders."=".$pagename.$query;
elseif($panel==admin)
	return SITE_URL."/index.php?".eaters."=redirecttoadmin&".admin."=".$pagename.$query;
elseif($panel==mobile)
return SITE_URL.'/index.php?'.mobile.'='.$pagename.$query;

else 
	return SITE_URL.'/index.php?'.eaters.'='.$pagename.$query;
		
	}	
		
	}
	public function hrefquery()
	{
		$request=$_SERVER['REQUEST_URI'];

		$parsed= explode('?', $request);
		
		
       $parsed=explode('=',$parsed['2']);
      
	return $parsed;
	
		
		
	}
	
}
?>