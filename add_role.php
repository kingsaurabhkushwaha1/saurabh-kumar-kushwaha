<?php
session_start();
include("config/config.php");

if(isset($_SESSION['userId'])){

   


$uid=$_SESSION['userId'] ;




if($_SERVER["REQUEST_METHOD"]=="POST"){
   

    
 $department_id=$_POST['department_id'];
 $role_id=$_POST['role_id'];
 $role_Name=$_POST['role_Name'];




$q="INSERT INTO role (department_id,role_id,role_Name ) values(?,?,?)";
$stmt=mysqli_prepare($mysqli,$q);
if($stmt){
    mysqli_stmt_bind_param($stmt,"sss",$department_id,$role_id,$role_Name );
    if(mysqli_stmt_execute($stmt)==true){
    
         foreach($_POST['assign_kpi'] as $assign_kpi  ){


         
         

        
           $qq="INSERT INTO appraisal.assign_kpi (role_id,assign_kpi) values(?,?)";
           $stmtt=mysqli_prepare($mysqli,$qq);
           if($stmtt){
              mysqli_stmt_bind_param($stmtt,"ss",$role_id,$assign_kpi );
             if( mysqli_stmt_execute($stmtt)){
                header("location:role.php?userId=$uid"); 
             }
               
              }
            
      }
    }
   
       
        //header("Location: ". $_SESSION['add_department.php?']);
die;
    }else{
        echo "something wrong";
    }
}

}




?>
