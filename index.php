<?php
   session_start();
   include("config/config.php");
   
   
   if(isset($_SESSION['userId'])){
   
   $idd=$_SESSION['userId'];
 $q="SELECT * FROM appraisal.user_master where email='$idd' or userId='$idd'";
$result = $mysqli->query($q);
   if ($result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

   
$id=$row['userId'];


   
      
   
}
   }
   
   
   $find= $id;
   
   
   
   
   
   
   
   
   $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_type v on u.roleId=v.roleId WHERE userId=$id";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {        
   	while ($row = $result->fetch_assoc()) {
   		 $username = $row['roleName'];
      
     
      
   		// $password  = $row['password'];
                 // $email=$row['email'];
                 // $role=$row['role'];
   		// $id = $row['id'];
                
                
                 $role = $row['roleId'];
                 
   
                 //printf($role);
             }
         
   }
   
   
   $sqll = "SELECT * FROM appraisal.user_master u inner join appraisal.department v on u.department_id=v.department_id WHERE userId=$id";
   $resultt = $mysqli->query($sqll);
   if ($resultt->num_rows > 0) {        
   	while ($roww = $resultt->fetch_assoc()) {
   		 $dname = $roww['department_name'];
        $did = $roww['department_id'];
      
        
   		// $password  = $row['password'];
                 // $email=$row['email'];
                 // $role=$row['role'];
   		// $id = $row['id'];
                // printf($username);
                 
                 //printf($role);
             }
   
         
   }
    
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>PMS Dashboard</title>
      <meta charset="UTF-8">
      <?php include "includes/library.php" ?>
      <style>
         .dashboard .sidebar-wrapper ul li.dashboard a {
         color: #16c7ff !important;
         }
         .page-content .table tr td {
         vertical-align: top !important;
         }
      </style>
   </head>
   <body class="dashboard">
      <div class="page-wrapper chiller-theme toggled">
         <?php include "includes/sidebar.php" ?>
         <!-- sidebar-wrapper  -->
         <main class="page-content">
            <div class="container-fluid tab-content">
               <div class="row top_bar">
                  <div class="sidebar-search col-sm-6">
                     <div>
                        <div class="input-group">
                           <input type="text" class="form-control search-menu" placeholder="Search...">
                           <div class="input-group-append">
                              <span class="input-group-text">
                              <i class="fa fa-search" aria-hidden="true"></i>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="logout" href="logout.php">
                  Logout
                  <i class="fa fa-power-off"></i>
                  </a>
               </div>
               <div class="ople_prdct_dev tabcontent p-3 mt-3" id="empl">
                  <div class="d-flex justify-content-between justify-content-center">
                     <h2> Dashboard </h2>
                  </div>
                  <div class="row p-3">
                     <div class="col-sm-7 bg-white p-3 border-radius">
                        <!-- <body>
                           <p class="text-center">  <body onload=display_ct();>
                           <span id='ct' ></span>.</p>
                           </body>
                           <script type="text/javascript"> 
                           function display_c(){
                           var refresh=1000; // Refresh rate in milli seconds
                           mytime=setTimeout('display_ct()',refresh)
                           }
                           
                           function display_ct() {
                           var x = new Date()
                           document.getElementById('ct').innerHTML = x;
                           display_c();
                            }
                           </script> -->
                        <h3 class="pb-2" align="center">Work Status</h3>
                        <table class="table">
                           <thead>
                              <tr>
                                 <?php if($username != "Employee"){
                                    ?>
                                 <th scope="col" style="text-align:center">Employee Name</th>
                                 <?php 
                                    }
                                      ?>
                                 <th scope="col" style="text-align:center"> KPI</th>
                                 <th scope="col" style="text-align:center"> Goal</th>
                                 <!-- hide for production -->
                                 <?php
                                    //     $sqll1 = "SELECT * FROM appraisal.user_master u inner join appraisal.department v on u.department_id=v.department_id WHERE userId=$id";
                                    //  $resultt = $mysqli->query($sqll1);
                                    //  if ($resultt->num_rows > 0) {        
                                    //  	while ($roww1 = $resultt->fetch_assoc()) {
                                    //  		 $dname = $roww1['department_name'];
                                    //       $d_id = $roww1['department_id'];
                                          
                                     		// $password  = $row['password'];
                                                   // $email=$row['email'];
                                                   // $role=$row['role'];
                                     		// $id = $row['id'];
                                                  // printf($username);
                                                   
                                    //                //printf($role);
                                    //            }
                                    
                                           
                                    //  }
                                    //  if()
                                    if($did!=101 && $did!==105){
                                        ?>
                                 <?php if( $dname=="CHANNEL SALES RO"){?>
                                 <th scope="col" style="text-align:center">Actual Achievement </th>
                                 <th scope="col" style="text-align:center">Expected Achievement </th>
                                 <?php
                                    }
                                    }
                                    ?>
                                 <th scope="col" style="text-align:center">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 if($username=="Admin"){
                                     $s = "Select * from appraisal.user_master u inner join appraisal.user_role_mapping m on u.userId=m.userId   where roleId=2    ";
                                 }
                                 elseif($username=="HOD"){
                                   $s = "Select * from appraisal.user_master u inner join appraisal.user_role_mapping m on u.userId=m.userId inner join appraisal.department j on u.department_id=j.department_id  where roleId=3 and HOD='$id'    ";
                                 }
                                 elseif($username=="Manager"){
                                   $s = "Select * from appraisal.user_master u inner join appraisal.user_role_mapping m on u.userId=m.userId inner join appraisal.department j on u.department_id=j.department_id  where u.Supervisor='$id';  ";
                                 }
                                 else{
                                   
                                   
                                   $s = "Select * from appraisal.user_master u inner join appraisal.user_role_mapping m on u.userId=m.userId inner join appraisal.department j on u.department_id=j.department_id  where u.userId= $find";
                                 }
                                 
                                     $result = $mysqli->query($s);
                                  if ($result->num_rows > 0) { 
                                        
                                 while ($row = $result->fetch_assoc()) {
                                 
                                     
                                     $Id = $row['userId'];
                                    
                                     $name=$row['userName'];
                                 ?>
                              <tr>
                                 <?php if($username != "Employee"){
                                    ?>
                                 <td><?php echo $name; ?>
                                    (<?php echo $Id?>)
                                 </td>
                                 <?php 
                                    }
                                      ?>
                                 <td>
                                    <?php 
                                       $q="SELECT * FROM assign_kpi where role_id =$Id";
                                          $e=$mysqli->query($q);
                                           
                                          
                                                   $assign_kpi=0;
                                                       $total=0;
                                                   if ($e->num_rows > 0) {
                                                     while ($ro = $e->fetch_assoc()) {
                                                       $total=$total+1;
                                                       $assign_kpi=$ro['assign_kpi'];
                                                       
                                                       
                                                      
                                                       
                                                       ?>
                                    <p><a href="kpi.php?kpi_id=<?php echo $Id?> ">
                                       <?php echo $ro['assign_kpi']; ?></a>
                                    </p>
                                    <?php            
                                       }
                                       
                                       ?>
                                    <!-- <h> goal</h> -->
                                 <th>
                                    <?php
                                       if($role==3 || $role==4){
                                       
                                         $goal="SELECT * from set_goal where user_id=$Id and objective='$assign_kpi' ";
                                         
                                       }
                                       
                                       $q="SELECT * FROM assign_kpi where role_id =$Id";
                                       $e=$mysqli->query($q);
                                       
                                       
                                       $assign_kpi=0;
                                           $total=0;
                                       if ($e->num_rows > 0) {
                                         while ($ro = $e->fetch_assoc()) {
                                           $total=$total+1;
                                           $assign_kpi=$ro['assign_kpi'];
                                           // this is form employee and manager
                                           if($role==3 ||$role==4){
                                       
                                       
                                             if( $did!=105 &&  $did!=101){
                                               //echo strlen($dname); 
                                              // echo "hii";
                                              
                                       
                                           $goal="SELECT * from set_goal where user_id=$Id and objective='$assign_kpi' ";
                                           $gol=$mysqli->query($goal);
                                           $i=0;
                                           if($gol->num_rows > 0){
                                             while($go=$gol->fetch_assoc()){
                                               $i=$i+$go['target'];
                                               
                                             }
                                             ?>
                                    <p><a href="update_goal.php?id=<?php echo $Id?> "> <?php echo $i; ?></a>
                                    </p>
                                    <?php
                                       }
                                       }
                                       else{
                                       
                                       
                                       $goal="SELECT * from set_goal where user_id=$Id and objective='$assign_kpi' ";
                                       $gol=$mysqli->query($goal);
                                       $i=0;
                                         if($gol->num_rows > 0){
                                       while($go=$gol->fetch_assoc()){
                                        
                                        ?>
                                    <!-- THIS CODE FOR PRODUCTION we will write the code later -->
                                    <p><a href="update_goal.php?id=<?php echo $Id?> "> <?php echo $go['sub_objective'];?></a>
                                    </p>
                                    <?php
                                       }
                                       }
                                       
                                       }
                                       
                                       
                                       
                                       }
                                       
                                       //hod for sales we will write the code later at Hod level
                                       elseif($role==2){
                                       $goal="SELECT * FROM set_goal s inner join user_master u on s.user_id=u.userId where u.Supervisor=$Id and objective='$assign_kpi'";
                                       $gol=$mysqli->query($goal);
                                       
                                       if($did != 105 && $did != 101){
                                       
                                       
                                       
                                       if($gol->num_rows > 0){
                                       $tar=0;
                                       while($go=$gol->fetch_assoc()){
                                          $tar=$tar+$go['target'];
                                         
                                       }
                                       ?>
                                    <p><a href="update_goal.php?id=<?php echo $Id?> "> <?php echo $tar; ?></a>
                                    </p>
                                    <?php
                                       }
                                       
                                       
                                       }
                                       else{
                                       
                                       if($gol->num_rows > 0){
                                       
                                         while($gow=$gol->fetch_assoc()){
                                            $tar=$gow['sub_objective'];
                                           
                                         
                                       
                                       ?>
                                    <p><a href="update_goal.php?id=<?php echo $Id?> "> <?php echo$gow['sub_objective'];  ?></a>
                                    </p>
                                    <?php
                                       }
                                       
                                       }
                                       }
                                       }
                                       
                                       
                                       
                                       
                                              
                                       
                                       
                                       }
                                       }
                                       
                                       ?>
                                 </th>
                                 <?php 
                                    $q="SELECT * FROM appraisal.set_goal where user_id =$Id";
                                       $e=$mysqli->query($q);
                                        
                                       
                                    
                                                    
                                     
                                     ?>
                                 </th>
                                 <!-- <h>Achievement This is only for sales </h> -->
                                 <?php 
                                    if( $did!=105 &&  $did!=101){
                                    //echo strlen($dname); 
                                    //echo "hii";
                                    ?>
                                 <th scope="row" class="text-center">
                                    <?php
                                       $q="SELECT * FROM assign_kpi where role_id =$Id";
                                       $e=$mysqli->query($q);
                                       
                                       
                                        $assign_kpi=0;
                                            $total=0;
                                        if ($e->num_rows > 0) {
                                          while ($ro = $e->fetch_assoc()) {
                                            $total=$total+1;
                                            $assign_kpi=$ro['assign_kpi'];
                                       
                                            
                                            if($role==3 ||$role==4){
                                             $goal="SELECT * from set_goal where user_id=$Id and objective='$assign_kpi' ";
                                             $gol=$mysqli->query($goal);
                                             
                                             if($gol->num_rows > 0){
                                               while($go=$gol->fetch_assoc()){
                                                 $ii=$go['target'];
                                                 $srote =0;
                                                 
                                                  $achievement="SELECT * FROM achievement_recods where target=$ii and assign_kpi='$assign_kpi' and userId=$Id";
                                                 $ach=$mysqli->query($achievement);
                                                 $total_ach=0;
                                                 if($ach->num_rows > 0){
                                                  
                                                   while($acher=$ach->fetch_assoc()){
                                                   
                                                     $total_ach=$total_ach+$acher['achievement'];
                                                   // echo $srote = $srote +$total_ach;
                                                   
                                                   
                                                   }
                                                 
                                                   
                                                 }
                                               
                                       
                                       
                                               
                                             }
                                 
                                            
                                           
                                            
                                            ?>
                                    <p> <a href="sales.php?kpi_id=<?php echo $Id?> "> <?php 
                                       echo $total_ach;  ?> </a> </p>
                                    <?php            
                                       }
                                       }
                                       elseif($role==2){
                                         $goal="SELECT * FROM set_goal s inner join user_master u on s.user_id=u.userId where u.Supervisor=$Id and objective='$assign_kpi'";
                                         $gol=$mysqli->query($goal);
                                         
                                       if($gol->num_rows > 0){
                                         $tar1=0;
                                         while($go=$gol->fetch_assoc()){
                                            $tar1=$tar1+$go['target'];
                                             $achievement="SELECT * FROM appraisal.achievement_recods d inner join appraisal.user_master u on d.userId=u.userId where assign_kpi='$assign_kpi' and u.Supervisor=$Id;";
                                           $ach=$mysqli->query($achievement);
                                           $total_ach1=0;
                                           if($ach->num_rows > 0){
                                            
                                             while($acher=$ach->fetch_assoc()){
                                             
                                              $total_ach1=$total_ach1+$acher['achievement'];
                                       
                                       
                                            
                                          }
                                             
                                           }
                                       
                                           
                                         }
                                         ?>
                                    <p> <a href="sales.php?kpi_id=<?php echo $Id?> "> <?php 
                                       echo $total_ach1;  ?> </a> </p>
                                    <?php
                                       }
                                       
                                       }
                                          
                                                
                                   }
                                     }
                                    ?>
                                 </th>
                                 <?php
                                    }
                                    ?>
                                 <!-- <h>expected</h> -->
                                 <?php
                                    if($did != 105 && $did!= 101){
                                    
                                    ?>
                                 <th>
                                    <?php
                                       $q="SELECT * FROM assign_kpi where role_id =$Id";
                                       $e=$mysqli->query($q);
                                       
                                       
                                        $assign_kpi=0;
                                            $total=0;
                                        if ($e->num_rows > 0) {
                                          while ($ro = $e->fetch_assoc()) {
                                            $total=$total+1;
                                            $assign_kpi=$ro['assign_kpi'];
                                           
                                               if($role==3 ||$role==4){
                                                $goal="SELECT * from set_goal where user_id=$Id and objective='$assign_kpi' ";
                                                $gol=$mysqli->query($goal);
                                                
                                                if($gol->num_rows > 0){
                                                 
                                                  while($go=$gol->fetch_assoc()){
                                                     $ii=$go['target'];
                                                    $start_date=$go['begin_date'];
                                                    $period=$go['period'];
                                                   
                                                     $achievement="SELECT * FROM achievement_recods where target=$ii and assign_kpi='$assign_kpi' and userId=$Id";
                                                    $ach=$mysqli->query($achievement);
                                                    $total_ach=0;
                                                    if($ach->num_rows > 0){
                                                     
                                                      while($acher=$ach->fetch_assoc()){
                                                      
                                                     $total_ach=$total_ach+$acher['achievement'];
                                                     $submit_date=$acher['date'];
                                                      
                                                      
                                                      
                                                      }
                                                     //  echo "period=".$period;
                                                     // //  echo "start_date=".$start_date;
                                                     // //  echo "end_date=".$submit_date;
                                                     //  echo "target=".$ii;
                                                     //  echo "achievement=".$total_ach;
                                                      $earlier = new DateTime("$start_date");
                                                      $later = new DateTime("$submit_date");
                                                      // echo "date-diff";
                                                    
                                                        $date_diff = $later->diff($earlier)->format("%a");
                                                       
                                       
                                       
                                                         if( $role!=2){
                                                                              
                                                           if($period=="yearly"){
                                                            $days=366;
                                                            $must_achievement=$ii/$days;
                                                           // ECHO "MUST_ACH=".$must_achievement;
                                                            
                                                           
                                                         
                                                           }
                                                           elseif($period=="quarterly"){
                                                            $days=90;
                                                             $must_achievement=$ii/$days;
                                                             //ECHO "MUST_ACH=".$must_achievement;
                                                           
                                                           }
                                                           else{
                                                            $days=30;
                                                            $must_achievement=$ii/$days;
                                                           // ECHO "MUST_ACH=".$must_achievement;
                                                            
                                                           }
                                                          }
                                                         
                                                          else{
                                                           // it shoul be check for manager lavel
                                                            if($period=="yearly" ){
                                                              $days=366;
                                                              $must_achievement=$ii/$days;
                                                             
                                                         
                                                             }
                                                             elseif($period=="quarterly"){
                                                              $days=90;
                                                              $must_achievement=$days/$ii;
                                                             
                                                             }
                                                             else{
                                                              $days=30;
                                                              $must_achievement=floor($days/$ii);
                                                         
                                                             }
                                                         
                                                          }
                                                         
                                       
                                                         
                                       
                                                       
                                       
                                                       
                                                      
                                                    }
                                       
                                                   
                                          
                                          
                                                  
                                                }
                                       
                                       
                                            
                                            
                                           
                                            
                                            ?>
                                    <p> <?php
                                       if(isset($submit_date)){
                                          echo ceil($date_diff*$must_achievement);
                                       }
                                       //echo "\u{1F600}"
                                       ?>
                                    </p>
                                    <?php            
                                       }
                                       }
                                       elseif($role==2){
                                       
                                        $goal="SELECT * FROM set_goal s inner join user_master u on s.user_id=u.userId where u.Supervisor=$Id and objective='$assign_kpi'";
                                        $gol=$mysqli->query($goal);
                                        //echo"kk";
                                       
                                        
                                       if($gol->num_rows > 0){
                                        $tar1=0;
                                        $ontrack=0;
                                        $offtrack=0;
                                        while($go=$gol->fetch_assoc()){
                                          $status=$go['track'];
                                          if( $status=="OffTrack"){
                                            $offtrack= $offtrack+1;
                                          }
                                          elseif($status=="OnTrack"){
                                            $ontrack= $ontrack+1;
                                          }
                                       
                                       
                                          
                                           $tar1=$tar1+$go['target'];
                                           $achievement="SELECT * FROM appraisal.achievement_recods d inner join appraisal.user_master u on d.userId=u.userId where assign_kpi='$assign_kpi' and u.Supervisor=$Id;";
                                          $ach=$mysqli->query($achievement);
                                          $total_ach1=0;
                                          if($ach->num_rows > 0){
                                           
                                            while($acher=$ach->fetch_assoc()){
                                            
                                             $total_ach1=$total_ach1+$acher['achievement'];
                                       
                                              
                                       
                                           
                                            }
                                            
                                          }
                                       
                                          
                                        }
                                       //   echo "offtrack=".$ontrack;
                                       // echo "ontrack=".$ontrack;
                                       
                                        ?>
                                    <p> <?php 
                                       if($ontrack>$offtrack)
                                       
                                       {
                                         
                                         //ECHO "TILL NOW MUST=".$date_diff*$must_achievement;
                                       
                                       
                                         echo '<span style="color : green; text-align : center ;">OnTrack </span>';
                                        }
                                        else{
                                         //ECHO "TILL NOW MUST=".$date_diff*$must_achievement;
                                          echo '<span style="color : red; text-align : center ;">OffTrack </span>'; ;
                                        }  ?> </p>
                                    <?php
                                       }
                                       
                                       }
                                       }
                                       }
                                       ?>
                                 </th>
                                 <?php 
                                    }
                                    ?>
                                 <!-- <h>Status </h> -->
                                 <th scope="row" style="text-align:center;">
                                    <?php
                                       $q="SELECT * FROM assign_kpi where role_id =$Id";
                                       $e=$mysqli->query($q);
                                       
                                       
                                        $assign_kpi=0;
                                            $total=0;
                                        if ($e->num_rows > 0) {
                                          while ($ro = $e->fetch_assoc()) {
                                            $total=$total+1;
                                            $assign_kpi=$ro['assign_kpi'];
                                           
                                               if($role==3 ||$role==4){
                                                 if($did !=105 && $did !=101){
                                       
                                                 
                                       
                                                 
                                                $goal="SELECT * from set_goal where user_id=$Id and objective='$assign_kpi' ";
                                                $gol=$mysqli->query($goal);
                                                
                                                if($gol->num_rows > 0){
                                                 
                                                  while($go=$gol->fetch_assoc()){
                                                     $ii=$go['target'];
                                                    $start_date=$go['begin_date'];
                                                    $period=$go['period'];
                                                   
                                                     $achievement="SELECT * FROM achievement_recods where target=$ii and assign_kpi='$assign_kpi' and userId=$Id";
                                                    $ach=$mysqli->query($achievement);
                                                    $total_ach=0;
                                                    if($ach->num_rows > 0){
                                                     
                                                      while($acher=$ach->fetch_assoc()){
                                                      
                                                     $total_ach=$total_ach+$acher['achievement'];
                                                     $submit_date=$acher['date'];
                                                      
                                                      
                                                      
                                                      }
                                                     //  echo "period=".$period;
                                                     // //  echo "start_date=".$start_date;
                                                     // //  echo "end_date=".$submit_date;
                                                     //  echo "target=".$ii;
                                                     //  echo "achievement=".$total_ach;
                                                      $earlier = new DateTime("$start_date");
                                                      $later = new DateTime("$submit_date");
                                                      // echo "date-diff";
                                                    
                                                        $date_diff = $later->diff($earlier)->format("%a");
                                                       
                                       
                                       
                                                         if( $role!=2){
                                                                              
                                                           if($period=="yearly"){
                                                            $days=366;
                                                            $must_achievement=$ii/$days;
                                                           // ECHO "MUST_ACH=".$must_achievement;
                                                            
                                                           
                                                         
                                                           }
                                                           elseif($period=="quarterly"){
                                                            $days=90;
                                                             $must_achievement=$ii/$days;
                                                             //ECHO "MUST_ACH=".$must_achievement;
                                                           
                                                           }
                                                           else{
                                                            $days=30;
                                                            $must_achievement=$ii/$days;
                                                           // ECHO "MUST_ACH=".$must_achievement;
                                                            
                                                           }
                                                          }
                                                         
                                                          else{
                                                           // it shoul be check for manager lavel
                                                            if($period=="yearly" ){
                                                              $days=366;
                                                              $must_achievement=$ii/$days;
                                                             
                                                         
                                                             }
                                                             elseif($period=="quarterly"){
                                                              $days=90;
                                                              $must_achievement=$days/$ii;
                                                             
                                                             }
                                                             else{
                                                              $days=30;
                                                              $must_achievement=floor($days/$ii);
                                                         
                                                             }
                                                         
                                                          }
                                                         
                                       
                                                         
                                       
                                                       
                                       
                                                       
                                                      
                                                    }
                                       
                                                   
                                          
                                          
                                                  
                                                }
                                       
                                       
                                            
                                            
                                           
                                            
                                            ?>
                                    <p> <?php 
                                       if(isset($submit_date)){
                                       if($date_diff*$must_achievement<=$total_ach)
                                       
                                       
                                       {
                                       
                                         //ECHO "TILL NOW MUST=".$date_diff*$must_achievement;
                                       
                                          $q="UPDATE appraisal.set_goal set track='OnTrack' where user_id=$Id ";
                                         $run=mysqli_query($mysqli,$q);
                                         echo '<span style="color : green; text-align : center ;">OnTrack </span>';
                                       
                                         
                                        }else{
                                         $q="UPDATE appraisal.set_goal set track='OffTrack' where user_id=$Id ";
                                         $run=mysqli_query($mysqli,$q);
                                         //ECHO "TILL NOW MUST=".$date_diff*$must_achievement;
                                          echo '<span style="color : red; text-align : center ;">OffTrack </span>'; ;
                                        }
                                         }
                                         ?> </p>
                                    <?php            
                                       }
                                       }else{
                                        //this is for IT department
                                        
                                        ?>
                                    <p>
                                       <?php 
                                          echo '<span style="color : green; text-align : center ;">OnTrack </span>';
                                          
                                          
                                          
                                          }
                                          ?>
                                    </p>
                                    <?php
                                       }
                                       
                                       elseif($role==2){
                                       
                                         $goal="SELECT * FROM set_goal s inner join user_master u on s.user_id=u.userId where u.Supervisor=$Id and objective='$assign_kpi'";
                                         $gol=$mysqli->query($goal);
                                         //echo"kk";
                                       
                                         
                                       if($gol->num_rows > 0){
                                         if($did !=105 && $did != 101){
                                       
                                         
                                         $tar1=0;
                                         $ontrack=0;
                                         $offtrack=0;
                                         
                                         while($go=$gol->fetch_assoc()){
                                           $status=$go['track'];
                                           if( $status=="OffTrack"){
                                             $offtrack= $offtrack+1;
                                           }
                                           elseif($status=="OnTrack"){
                                             $ontrack= $ontrack+1;
                                           }
                                       
                                       
                                           
                                            $tar1=$tar1+$go['target'];
                                            $achievement="SELECT * FROM appraisal.achievement_recods d inner join appraisal.user_master u on d.userId=u.userId where assign_kpi='$assign_kpi' and u.Supervisor=$Id;";
                                           $ach=$mysqli->query($achievement);
                                           $total_ach1=0;
                                           if($ach->num_rows > 0){
                                            
                                             while($acher=$ach->fetch_assoc()){
                                             
                                              $total_ach1=$total_ach1+$acher['achievement'];
                                       
                                               
                                       
                                            
                                             }
                                             
                                           }
                                       
                                           
                                         }
                                       //   echo "offtrack=".$ontrack;
                                       // echo "ontrack=".$ontrack;
                                       
                                         ?>
                                    <p> <?php 
                                       if($ontrack>$offtrack)
                                       
                                       {
                                         
                                         //ECHO "TILL NOW MUST=".$date_diff*$must_achievement;
                                       
                                       
                                         echo '<span style="color : green; text-align : center ;">OnTrack </span>';
                                        }
                                        else{
                                         //ECHO "TILL NOW MUST=".$date_diff*$must_achievement;
                                          echo '<span style="color : red; text-align : center ;">OffTrack </span>'; ;
                                        }  ?> </p>
                                    <?php
                                       }
                                       else{
                                         //Here we will write code for Hod(IT); 
                                       
                                         ?>
                                    <P>
                                       <?php
                                          echo '<span style="color : green; text-align : center ;">OnTrack </span>';
                                          
                                                    ?>
                                    </P>
                                    <?php
                                       }
                                       }
                                       
                                       }
                                       
                                       
                                       
                                         
                                              
                                             }
                                            }
                                       ?>
                                    <?php 
                                       }
                                         ?>
                                 </th>
                              </tr>
                              <?php
                                 }
                                        
                                 }
                                 
                                  ?>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-sm-5 bg-white p-3 border-radius border-5">
                        <?php
                           if($username=="Employee"){
                           
                             ?>
                        <h3 id="self" class="pb-2" align="center">Self Performance</h3>
                        <div id="piechart"></div>
                        <script type="text/javascript" src=https://www.gstatic.com/charts/loader.js></script>
                        <script type="text/javascript">
                           //var totald=<?php // echo "$total"; ?>
                           
                           
                           
                           // Load google chartsy
                           google.charts.load('current', {
                               'packages': ['corechart']
                           });
                           google.charts.setOnLoadCallback(drawChart);
                           
                           // Draw the chart and set the chart values
                           function drawChart() {
                           
                           
                           
                               var data = google.visualization.arrayToDataTable([
                                   ['Task', 'Hours per Day'],
                                   ['Success', 100 <?php //echo $success;?>],
                                   ['offTrack', 40 <?php //echo $rejection;?>],
                                   ['work in progress', 34 <?php //echo $progress;?>],
                                   ['remaining work', 89 <?php //echo $progress;?>],
                                   ['completed worked', 80 <?php //echo $success;?>]
                               ]);
                           
                               // Optional; add a title and set the width and height of the chart
                               var options = {
                                   'title': '',
                                   'width': 380,
                                   'height': 260
                               };
                           
                               // Display the chart inside the <div> element with id="piechart"
                               var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                               chart.draw(data, options);
                           }
                        </script>
                        <?php
                           }
                           else{
                           ?>
                        <h3 id="self" class="pb-2" align="center">Team Performance</h3>
                       
                       
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Success',       11],
          ['offTrack',      2],
          ['work in progress',  2],
          ['remaining work', 2],
          ['completed worked',7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart" style="width: 550px; height: 500px;"></div> <!-- <canvas id="performance_chart" width="600" height="400"></canvas> -->
                        <?php
                           }
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </main>
         <!-- page-content" -->
      </div>
      <!-- page-wrapper -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
      <script>
         jQuery(function($) {
         
             $(".sidebar-dropdown > a").click(function() {
                 $(".sidebar-submenu").slideUp(200);
                 if (
                     $(this)
                     .parent()
                     .hasClass("active")
                 ) {
                     $(".sidebar-dropdown").removeClass("active");
                     $(this)
                         .parent()
                         .removeClass("active");
                 } else {
                     $(".sidebar-dropdown").removeClass("active");
                     $(this)
                         .next(".sidebar-submenu")
                         .slideDown(200);
                     $(this)
                         .parent()
                         .addClass("active");
                 }
             });
         
             $("#close-sidebar").click(function() {
                 $(".page-wrapper").removeClass("toggled");
             });
             $("#show-sidebar").click(function() {
                 $(".page-wrapper").addClass("toggled");
             });
             $('select').selectpicker();
         
             $('.add_dept').click(function() {
                 $('.dept_field').show();
                 $('.dept_table').hide();
             })
         
         
         
         
         
         });
         
         var performance = document.getElementById("performance_chart");
         
         // Chart.defaults.global.defaultFontFamily = "Lato";
         // Chart.defaults.global.defaultFontSize = 18;
         var self = document.getElementById("self").innerHTML;
         console.log(self);
         if (self == "Self Performance") {
             var perfomanceData = {
                 labels: [
                     " Success ",
                     " Remaining Work",
                     "Compleated Work  ",
                     "Work in Progress ",
                     "Off Track  "
                 ],
                 datasets: [{
                     data: [133.3, 86.2, 52.2, 51.2, 50.2],
                     backgroundColor: [
                         "blue",
                         "#63FF84",
                         "green",
                         "#8463FF",
                         "red"
                     ]
                 }]
             };
         } else {
             var perfomanceData = {
                 labels: [
                     "Department Success",
                     "Department  Remaining Work",
                     "Compleated Work of Department ",
                     "Work in Progress ",
                     "Off Track of Department "
                 ],
                 datasets: [{
                     data: [133.3, 86.2, 52.2, 51.2, 50.2],
                     backgroundColor: [
                         "blue",
                         "#63FF84",
                         "green",
                         "#8463FF",
                         "red"
                     ]
                 }]
             };
         }
         
         
         var pieChart = new Chart(performance, {
             type: 'pie',
             data: perfomanceData
         });
      </script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Success',     11],
          ['Remaining Work',      2],
          ['Compleated Work ',  2],
          ['Work in Progress', 2],
          ['Off Track',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
      <!--    <script>
         function openCity(evt, cityName) {
           var i, tabcontent, tablinks;
           tabcontent = document.getElementsByClassName("tabcontent");
           for (i = 0; i < tabcontent.length; i++) {
             tabcontent[i].style.display = "none";
           }
           tablinks = document.getElementsByClassName("tablinks");
           for (i = 0; i < tablinks.length; i++) {
             tablinks[i].className = tablinks[i].className.replace(" active", "");
           }
           document.getElementById(cityName).style.display = "block";
           evt.currentTarget.className += " active";
         }
         
         document.getElementById("defaultOpen").click();
         </script> --->
   </body>
</html>
<?php
   }
   else{
   
     header("location:login.php");
     echo "login first";
   }
   ?>