<?php
session_start();
include("config/config.php");
if(isset($_SESSION['userId'] ,$_GET['id'])){
$id= $_SESSION['userId'];

$uid=$_GET['id'];
printf($id);
printf($uid);



//$s="DELETE FROM designation WHERE id= $uid";
$s="DELETE FROM department WHERE `department`.`id` = $uid";

mysqli_query($mysqli,$s);

header("location:department.php?userId=$id");
}
else{
    header("location:department.php");
    
  }
?>