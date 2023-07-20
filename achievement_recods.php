<?php
   session_start();
   include("config/config.php");
   if(isset($_SESSION['userId'])){
    
 


   
    $idd=$_SESSION['userId'];
  
   $q="SELECT * FROM appraisal.user_master where email='$idd' or userId='$idd'";
   $result = $mysqli->query($q);
  if ($result->num_rows > 0) {        
    while ($row = $result->fetch_assoc()) {
      echo $id=$row['userId'];
       
      

     

   }
 }



    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        

       
      echo  $kpi = $_POST['kpi'];
      echo $sub_objective=$_POST['sub_objective'];
      echo  $achievement=$_POST['achievement'];
      echo  $date=$_POST['date'];
      echo  $achievement_percent=$_POST['Achievement%'];
      
      echo $q="INSERT INTO achievement_recods (target,achievement,achievement_percent,date,userId,assign_kpi ) values(?,?,?,?,?,?)";
$stmt=mysqli_prepare($mysqli,$q);
if($stmt){
    mysqli_stmt_bind_param($stmt,"ssssss",$sub_objective,$achievement,$achievement_percent, $date,$idd,$kpi);
    if(mysqli_stmt_execute($stmt)==true){
        echo "hii";
        
        header("location:sales.php?kpi_id=$id&& kpi=$id");

    
    }
}








}
else{
    echo "data did not post";
}
   }
?>