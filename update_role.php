<?php
session_start();
include("config/config.php");


$id=$_SESSION['userId'];

$update_id=$_POST['id1'];

$q="SELECT roleId  from appraisal.user_master u inner join appraisal.user_role_mapping k on u.userId=k.userId where u.userId=$id";
$res=mysqli_query($mysqli,$q);
if(mysqli_num_rows($res)==1){
    
    $row=mysqli_fetch_array($res);
    $role=$row['roleId'];
   

}




if($_SERVER["REQUEST_METHOD"]=="POST"){

    
    if($role==3){
       
        $department_id=$_POST['department_id'];
        $role_id=$_POST['role_id'];
        $role_Name=$_POST['role_Name'];

        $q="UPDATE role set department_id='$department_id',role_id='$role_id',role_Name='$role_Name' where id='$update_id'";
       // UPDATE `department` SET `department_id` = '101' WHERE `department`.`id` = 1;
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            header("location:role.php");

        }
    }
    elseif($role==2)
    {
        $department_id=$_POST['department_id'];
        $role_id=$_POST['role_id'];
        $role_Name=$_POST['role_Name'];

        $q="UPDATE role set department_id='$department_id',role_id='$role_id',role_Name='$role_Name' where id='$update_id'";
       // UPDATE `department` SET `department_id` = '101' WHERE `department`.`id` = 1;
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            header("location:role.php");
            

        }
    }
    elseif($role=1){
        $department_id=$_POST['department_id'];
        $role_id=$_POST['role_id'];
        $role_Name=$_POST['role_Name'];

        $q="UPDATE role set department_id='$department_id',role_id='$role_id',role_Name='$role_Name' where id='$update_id'";
       // UPDATE `department` SET `department_id` = '101' WHERE `department`.`id` = 1;
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            header("location:role.php");
            
        }


    }
    
    

   
}


?>