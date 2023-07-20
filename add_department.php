<?php
session_start();
include("config/config.php");

if(isset($_SESSION['userId'])){
    echo $_SESSION['userId'];
    
 


$uid=$_SESSION['userId'];




if($_SERVER["REQUEST_METHOD"]=="POST"){
    
$department_id=$_POST['department_id'];

$department_name=$_POST['department_name'];


$q="INSERT INTO department(department_id,department_name) values(?,?)";
$stmt=mysqli_prepare($mysqli,$q);
if($stmt){
    mysqli_stmt_bind_param($stmt,"ss",$department_id,$department_name);
    if(mysqli_stmt_execute($stmt)){
        header("location:department.php?userId=$uid");
        //header("Location: ". $_SESSION['add_department.php?']);
die;
    }else{
        echo "something wrong";
    }
}

}

}


?>
