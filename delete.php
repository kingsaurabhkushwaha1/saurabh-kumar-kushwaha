<?php
session_start();
include("config/config.php");
if(isset($_SESSION['userId'] ,$_GET['id'])){
$id= $_SESSION['userId'];

$uid=$_GET['id'];
printf($id);
printf($uid);



$s="DELETE FROM `kpi` WHERE kpi_id = $uid ";
mysqli_query($mysqli,$s);

header("location:kpi.php?userId=$id");
}
else{
    header("location:kpi.php");
    
  }


?>