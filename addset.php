<?php
session_start();
include("config/config.php");

if(isset($_SESSION['userId'])){
    
    
 

$uid=$_SESSION['userId'];


if($_SERVER["REQUEST_METHOD"]=="POST"){
    
$goal=$_POST['objective'];
 
    
  $target=$_POST['target'];
  $target_quantity=$_POST['target_quantity'];
  $target_type=$_POST['target_type'];
  $period=$_POST['period'];
  $project_depedency=$_POST['project_depedency'];
  $begin_date=$_POST['begin_date'];
  $due_date=$_POST['due_date'];
  $required=$_POST['required'];
  $definition=$_POST['definition'];
  $notes=$_POST['notes'];
 
  $k="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id where r.userId=$uid ";
  $run = mysqli_query($mysqli, $k);
  
        $row = mysqli_fetch_array($run);
        
        if ( $row['department_id'] != 105 ) {
            if ($row['department_id'] != 101) {

                $q = "INSERT INTO approve_view_goal (objective,target,target_quantity,target_type,period,project_depedency,begin_date,due_date,required,definition,notes,user_id ) values(?,?,?,?,?,?,?,?,?,?,?,?)";
                $p = "INSERT INTO set_goal (objective,target,target_quantity,target_type,period,project_depedency,begin_date,due_date,required,definition,notes,user_id ) values(?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_prepare($mysqli, $q);
                $stmtt = mysqli_prepare($mysqli, $p);

                if ($stmt) {



                    mysqli_stmt_bind_param($stmt, "ssssssssssss", $goal, $target, $target_quantity, $target_type, $period, $project_depedency, $begin_date, $due_date, $required, $definition, $notes, $uid);
                    mysqli_stmt_bind_param($stmtt, "ssssssssssss", $goal, $target, $target_quantity, $target_type, $period, $project_depedency, $begin_date, $due_date, $required, $definition, $notes, $uid);
                    if (mysqli_stmt_execute($stmt) == true && mysqli_stmt_execute($stmtt) == true) {







                        header("location:set_goal.php?userId=$uid");
                    }


                }
            }
        }else{
              $sub_objective=$_POST['sub_objective'];
            
            
            
            $q = "INSERT INTO approve_view_goal (objective,sub_objective,target,target_quantity,target_type,period,project_depedency,begin_date,due_date,required,definition,notes,user_id ) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $p = "INSERT INTO set_goal (objective,sub_objective,target,target_quantity,target_type,period,project_depedency,begin_date,due_date,required,definition,notes,user_id ) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_prepare($mysqli, $q);
            $stmtt = mysqli_prepare($mysqli, $p);
            
            if ($stmt) {
                
                

                mysqli_stmt_bind_param($stmt, "sssssssssssss", $goal, $sub_objective, $target, $target_quantity, $target_type, $period, $project_depedency, $begin_date, $due_date, $required, $definition, $notes, $uid);
                mysqli_stmt_bind_param($stmtt, "sssssssssssss", $goal, $sub_objective, $target, $target_quantity, $target_type, $period, $project_depedency, $begin_date, $due_date, $required, $definition, $notes, $uid);
                if(mysqli_stmt_execute($stmt)==true && mysqli_stmt_execute($stmtt)==true ){
        
            
               
              
            
       
    
                    header("location:set_goal.php?userId=$uid");}
            
                
            }
        }
        

        


}

}


?>


