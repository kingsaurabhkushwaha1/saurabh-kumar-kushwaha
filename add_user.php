<?php
session_start();
include("config/config.php");

if(isset($_SESSION['userId'])){
    
    
$uid=$_SESSION['userId'];
$id=$_SESSION['userId'];
   
   $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_type v on u.roleId=v.roleId WHERE userId=$id";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {        
   	while ($row = $result->fetch_assoc()) {
   		$username = $row['roleName'];
                 $role = $row['roleId'];
                
             }
         
   }
if($_SERVER["REQUEST_METHOD"]=="POST"){

$userId= $_POST['userId']; 
$userName=$_POST['userName'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$phone=$_POST['phone'];
$department_name= $_POST['department_name'];


$q="INSERT INTO user_master(userId,userName,email,phone) values(?,?,?,?)";
$stmt=mysqli_prepare($mysqli,$q);
if($stmt){
    mysqli_stmt_bind_param($stmt,"ssss",$userId,$userName,$email,$phone);
    if(mysqli_stmt_execute($stmt)){
        header("location:user-php.php?userId=$uid");
        //if($role==1){
            //header("location:hod.php?userId=$uid");}
            //elseif($role==2){
                //header("location:hod.php?userId=$uid");

          //////  }
            //elseif($role==3){
               // header("location:manager.php?userId=$uid");
            }

        
      // header("location:hod.php?userId=$uid");
       // header("Location: ". $_SESSION['add_department.php?']);

       
die;
    }else{
        echo "something wrong";
    }
}

}




?>