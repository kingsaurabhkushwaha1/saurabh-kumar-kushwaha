<?php
session_start();
include("config/config.php");
if(isset($_SESSION['userId'])){
$id= $_SESSION['userId'];

$uid=$_GET['role_id'];






$s="DELETE FROM `assign_kpi` WHERE role_id = $uid ";
$ss="DELETE FROM `assign_kpi` WHERE role_id = $uid ";
$test=mysqli_query($mysqli,$s);
$testt=mysqli_query($mysqli,$ss);
if($test==true && $testt==true){
  $p="DELETE FROM `role` WHERE role_id = $uid ";
  $test=mysqli_query($mysqli,$p);

header("location:role.php?userId=$id");
}
}
else{
    header("location:index.php");
    
  }


?>