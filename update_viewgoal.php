<?php
session_start();
include("config/config.php");


 $id=$_SESSION['userId'];
 $eid=$_GET['id']; 
 
 $update_id = $_GET['kpi_id'];

 


 

$q="SELECT roleId  from appraisal.user_master u inner join appraisal.user_role_mapping k on u.userId=k.userId where u.userId=$id";
$res=mysqli_query($mysqli,$q);
if(mysqli_num_rows($res)==1){
    $row=mysqli_fetch_array($res);
    $role=$row['roleId'];
   

}



// if(isset($_POST['achievement'])){
//     $achivement=$_POST['achievement'];
//     echo $achivement;
//     die();
// }





        

// print_r($_POST);

// die();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($role == 3) {
        

        // print_r($_POST);
        // die();
        // $name_of_kpi=$_POST['name_of_kpi'];
        // echo $name_of_kpi;

        $Status = $_POST['status'];
        $managerapp = $_POST['approval'];






        $q = "UPDATE appraisal.set_goal set  Manager_Approval=' $managerapp',Status='$Status' where id=$eid";
        
        $run = mysqli_query($mysqli, $q);
        if ($run == TRUE) {

            header("location:update_goal.php?id=$update_id");
            

        }
    } elseif ($role == 2) {

        $Status = $_POST['status'];
        $hoddapp = $_POST['approval'];







        $q = "UPDATE appraisal.set_goal set Status='$Status', Hod_Approval=' $hoddapp' where id=$eid";

        $run = mysqli_query($mysqli, $q);
        if ($run == TRUE) {

            header("location:update_goal.php?id=$update_id");

        }
    }
}
?>