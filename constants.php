<?php

	 $httpOrHttps = 'http';
    if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == "on") {
        $httpOrHttps = 'https';
    }
	
	$url_local = "{$httpOrHttps}://{$_SERVER['HTTP_HOST']}/";
    //echo "url_local ....".$url_local;
	if (strpos($_SERVER['HTTP_HOST'],'localhost')!== false) {
		   $url_local = $url_local."kuhl/";
		}
	// if(strpos($url_local,'uat.kuhl.in')!== false) {
	// 	  $url_local =  $url_local."//uat.kuhl.in//";
	// 	}	
//echo "url_local ....now".$url_local;die('test');

    define("APP_ROOT",$url_local);	
	
?>	
   	      
