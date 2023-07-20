<?php
session_start();
include("config/config.php");


$id=$_SESSION['userId'];
$update_id=$_GET['id'];
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
// die;


        

 


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($role==4){
        
        // print_r($_POST);
        // die();
        // $name_of_kpi=$_POST['name_of_kpi'];
        // echo $name_of_kpi;

        $quantity=$_POST['quantity'];
        $quantity_meet=$_POST['quantity_meet'];
        $target=$_POST['target'];
       
        

        

        $q="UPDATE appraisal.kpi set Quantity='$quantity',Quantity_meet='$quantity_meet',target='$target' where kpi_id='$update_id'";
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            header("location:kpi.php");

        }
    }
    elseif($role==3){
       
         $feedback=$_POST['feedback'];
         $rating=$_POST['rating'];
        $q="UPDATE appraisal.kpi set Manager_rating='$rating',Manager_feedback='$feedback' where kpi_id=$update_id";
        
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            header("location:kpi.php");

        }
    }
    elseif($role==2)
    {
        $rating=$_POST['rating'];
        $approval=$_POST['approval'];

        $q="UPDATE appraisal.kpi set Hod_rating='$rating',Hod_Approval='$approval' where kpi_id='$update_id'";
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            
            header("location:kpi.php");
            

        }
     }
    elseif($role=1){
       
       
        $review_frequency=$_POST['review_frequency'];
        // $catagory=$_POST['department'];
        
        $capture_frequency=$_POST['capture_frequency'];
        
        
        $name_of_kpi=$_POST['name_of_kpi'];
        $description_of_kpi=$_POST['description_of_kpi'];
       
        $target=$_POST['tarapproval'];
        $manager_rating=$_POST['manager_rating'];
        $manager_feedback=$_POST['manager_feedback'];
        
        $hod_rating=$_POST['hod_rating'];
        $hod_approval=$_POST['hod_approval'];
        if($_POST['tarapproval']=='No'){
            // print_r($_POST);
            // die;
           
            $achivement=$_POST['achievement'];


      $q="UPDATE appraisal.kpi set name_of_kpi='$name_of_kpi', description_of_kpi=' 
        $description_of_kpi',achievement='$achivement',review_frequency=$review_frequency,capture_frequency=  $capture_frequency ,target='$target', Manager_rating='$manager_rating',Manager_feedback='$manager_feedback'
        ,Hod_rating='$hod_rating',Hod_Approval=' $hod_approval' where kpi_id='$update_id'";
            
        }
        else{
      

        $quantity=$_POST['quantity'];
        $quantity_meet=$_POST['quantity_meet'];
        
        
        $q="UPDATE appraisal.kpi set name_of_kpi='$name_of_kpi', description_of_kpi=' 
        $description_of_kpi',review_frequency='$review_frequency',capture_frequency=  '$capture_frequency' ,Quantity='$quantity',Quantity_meet='$quantity_meet'
        ,target='$target', Manager_rating='$manager_rating',Manager_feedback='$manager_feedback'
        ,Hod_rating='$hod_rating',Hod_Approval=' $hod_approval' where kpi_id='$update_id'";
        }
        $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            
        header("location:kpi.php");
            

        }


    }
    
    

   
}


?>