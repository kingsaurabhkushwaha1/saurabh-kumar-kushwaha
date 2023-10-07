<?php 
session_start();
include("config/config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	 $userId=$_POST["userId"];
	
	printf($userId);

	$password=$_POST["password"];
	echo $password;
	
	$sql="SELECT * FROM user_master u INNER JOIN user_role_mapping ur ON u.userId=ur.userId WHERE u.userId=$userId";

	$result=mysqli_query($mysqli,$sql);
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_array($result);
  
	
	$userId=$row['userId'];
    $db_pass=$row['password'];
	$role=$row['roleId'];
   $_SESSION['userId']=$userId;
   $_SESSION['start'] = time();
	
	
	if($password==$db_pass){
		
			header("location:index.php?userId=$userId");
		
		

	}
	else{
		echo "username and password incorrect..";
	}
}
else{
		echo "something went wrong";
	}
	
	
	
	
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <title>PMS</title>
    <meta charset="UTF-8">


    <?php include "includes/library.php" ?>

</head>

<body  class="login" style="height:100vh;">
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex">
					<div class="brand_logo_container">
					<img src="assets/images/" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex form_container">
					<h1 class="pb-4 pt-4">Welcome To PMS</h1>
					<form action="#" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="login_icon"><img src="assets/images/user.svg"></span>
							</div>
							<input type="text" name="userId" class="form-control input_user" value="" placeholder="Employee ID">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="login_icon"><img src="assets/images/password.svg"></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox pt-3 pb-1">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex mt-3 login_container">
					<button type="submit" name="button" onclick="location.href='index.php'" class="btn login_btn">Login</button>
				<!---<input type="submit" value="Login">-->
				   </div>
					</form>
				</div>
		
		<!--		<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
                    </div>
				</div>   --->


			</div>
		</div>
	</div>
    




</body>

</html>
