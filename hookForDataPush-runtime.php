<?php
 
 
 function pushIntoLMS($data){
	// echo "<pre>";
    // print_r($data);
	// echo"<br>";
	$data_string = json_encode($data,JSON_UNESCAPED_SLASHES);
	// echo "<pre>";
    // print_r($data_string);
	$res_count = 0;	
	$ch = curl_init('http://lms.kent.co.in:5551/Kent_CustomWeb/Service.svc/CreatePhoneCall');     
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string))); 	
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$data_string");                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
	curl_setopt($ch, CURLOPT_TIMEOUT,30);
	$result = curl_exec($ch);	
	if(curl_errno($ch)){
		throw new Exception(curl_error($ch));
	}
	curl_close($ch);
	$json_a = json_decode($result,true);
	// echo "<pre>";
	// print_r($json_a);die('test');
	//print_r($json_a['CreatePhoneCallResult']);die('test');
	return $json_b = json_decode($json_a['CreatePhoneCallResult'], true);
	}



?>