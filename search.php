<?php 
session_start();
include("config/config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	$userId=$_POST["userId"];

	printf($userId);


	
	$sql="SELECT * FROM user_master u INNER JOIN user_role_mapping ur ON u.userId=ur.userId WHERE u.userId=$userId";


	$result=mysqli_query($mysqli,$sql);
	if(mysqli_num_rows($result)==1){

		$row=mysqli_fetch_array($result);
  
    if($userId==$row['userId'])
   
    {
       
       
    }
}
    else

        echo  "Not found";
    

  
	
	

	

	
}



?>





