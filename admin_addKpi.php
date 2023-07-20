<?php
session_start();
include("config/config.php");

if(isset($_SESSION['userId'])){
echo $_SESSION['userId'];






$uid=$_SESSION['userId'];




if($_SERVER["REQUEST_METHOD"]=="POST"){
$quantity=$_POST['quantity'];


$kpi_id=$_POST['kpi_id'];

$name_of_kpi=$_POST['name_Of_kpi'];
$description=$_POST['description_of_kpi'];
$target=$_POST['target'];

$category=$_POST['catagory'];


// $created_by=$_POST['created_by'];
// $created_on=$_POST['created_on'];
// $modified_by=$_POST['modified_by'];
// $modified_on=$_POST['modified_on'];
// $modified_id=$_POST['modified_id'];
// $role=$_POST['kpi_role'];

$q="INSERT INTO kpi(kpi_id,name_of_kpi,description_of_kpi,target,Quantity,category) values(?,?,?,?,?,?)";
$stmt=mysqli_prepare($mysqli,$q);
if($stmt){
mysqli_stmt_bind_param($stmt,"ssssss",$kpi_id,$name_of_kpi,$description,$target,$quantity,$category);
if(mysqli_stmt_execute($stmt)){
header("location:kpi.php?userId=$uid");
}else{
echo "something wrong";
}
}

}

}
else{
header("location:login.php");
echo "login first";
}

?>
