<?php
session_start();
include("config/config.php");

if(isset($_SESSION['userId'])){







$uid=$_SESSION['userId'];




if($_SERVER["REQUEST_METHOD"]=="POST"){

    $assign_kpi=$_POST['kpi'];

    $id=$_GET['id'];
    $approve_id=$_GET['idd'];
$Manager_rating=$_POST['manager_rating'];
$Manager_feedback=$_POST['manager_rating'];
$Hod_rating=$_POST['hod_rating'];
$Hod_approval=$_POST['hod_approval'];
    $q="UPDATE assign_kpi set Manager_rating='$Manager_rating',Manager_feedback='$Manager_feedback',Hod_rating='$Hod_rating',Hod_approval='$Hod_approval' where id=$id ";
    // UPDATE `department` SET `department_id` = '101' WHERE `department`.`id` = 1;
     $run=mysqli_query($mysqli,$q);
     if($run==TRUE){
        
         header("location:index.php?kpi_id=$approve_id");

     }
 
    
}

}


