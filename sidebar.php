<?php
 // session_start();
   include("config/config.php");
   
   if(isset($_SESSION['userId'])){
    $_SESSION['userId'];
    if(isset($_POST['userId'])){
      $idd=$_POST['userId'];
    }else{
      $idd=$_SESSION['userId'];
    }
     
    $q="SELECT * FROM appraisal.user_master where email='$idd' or userId='$idd'";
        $result = $mysqli->query($q);
       if ($result->num_rows > 0) {        
          while ($row = $result->fetch_assoc()) {
            $id=$row['userId'];
            
           
    
          
    
        }
      }
      
   
   
   
   $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_type v on u.roleId=v.roleId WHERE userId=$id";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {        
   	while ($row = $result->fetch_assoc()) {
   		$username = $row['roleName'];
   		// $password  = $row['password'];
                 // $email=$row['email'];
                 // $role=$row['role'];
   		// $id = $row['id'];
                // printf($username);
                 $role = $row['roleId'];
                 //printf($role);
             }
            
   }
   $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_master v on u.userId=v.userId WHERE u.userId=$id";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {        
   	while ($row = $result->fetch_assoc()) {
   		$usernamee = $row['userName'];
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
         .bootstrap-select > .dropdown-toggle{
            height:30px;
         }
      </style>
   </head>
   <body>

   <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
      </a>
      <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
               <div class="sidebar-brand">
                  <a href="#">Welcome to PMS</a>
                  <div id="close-sidebar">
                     <i class="fas fa-times"></i>
                  </div>
               </div>
               <div class="sidebar-header">
                  <div class="user-pic">
                     <img class="img-responsive img-rounded" src="assets/images/profile_pic.jpg"
                        alt="User picture">
                  </div>
                  <div class="user-info d-flex pt-2" style="flex-flow:row wrap; padding:0 60px">
                     <span class="user-name w-100 d-flex"> 
                     <strong style="position:relative"> <span style="color:green; font-size:52px; position:absolute; left:-26px; line-height:21px">&#183;</span>  
                     </strong> <?php echo $usernamee;?>
                     </span>

                 <span class="w-100 d-flex">     <?php echo $username;?> </span>

                     <span class="w-100 d-flex">
                     <?php
                             $q="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id where userId=$id ";
                     
                                 $run = mysqli_query($mysqli, $q);

                                      $row = mysqli_fetch_array($run);
                                    
                     echo $row['department_name'];
                     $depart=$row['department_name'];
                                    
                                 { 
                                 ?>
                                 <?php
                                 }
                                
                                 ?>
                      </span>
                     <!-- <span class="user-role">
                     <?php echo $usernamee;?> <br>
                       ( <?php echo $username;?>)</span>
                     <span class="user-status"> -->
                     <!-- <i class="fa fa-circle"></i> -->
                     
                  </div>
               </div>
               <!-- sidebar-header  -->
             <!--  <div class="sidebar-search">
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
               </div> --->

               <!-- sidebar-search  -->
               <div class="sidebar-menu nav-sidebar">
                  <ul class="" role="tablist">
                   <!--  <li class="header-menu">
                        <span>General</span>
                     </li> --->

               <li class="dashboard">
                  <a href="index.php">  <i class="fa fa-home" aria-hidden="true"></i>
                  Dashboard</a> 
               </li>      

               <li class="set_goal">
                  <a href="set_goal.php">  <i class="fa fa-eject" aria-hidden="true"></i>
                  Set Goal</a> 
               </li>
               <?php
               if($role!=4){
                  ?>
                    
                     <li class="kpi">
                     <a href="kpi.php">  <i class="fa fa-key" aria-hidden="true"></i>
              
                   KPI </a> 
                     </li>
                 <?php
                  }
                  ?>
                     
                    <li>
                   

                     </li> 

                     <li class="department">
                        <?php
                        if($role!=4 && $role!=3){
                            ?>
                            
                 <a href="department.php">  <i class="fa fa-cube" aria-hidden="true"></i>
                  Department</a> 
                  <?php
                        }
                        ?>
                 </li>
                     <li class="role">
                     <?php
                        if($role!=4 ){
                            ?>
                     <a href="role.php">  <i class="fa fa-cog" aria-hidden="true"></i>
                  Role </a>
                  <?php
                        }
                        ?>
                 
               </li>
               
               
               <li class="common"> 
                  
                  <a href=<?php 
                     if($role==1){
                     echo "hod.php";}
                     elseif($role==2){
                        echo "manager.php?id=$id";

                     }
                     elseif($role==3){
                        echo "employee.php?id=$id";
                     }elseif($role==4){
                        echo "employee.php";
                     }

                   
                   ?>>  <i class="fa fa-users" aria-hidden="true"></i>
                  <?php 
                   if($role==1){
                     echo "Teams";}
                     elseif($role==2){
                        echo "Team";

                     }
                     elseif($role==3){
                        echo "Team";
                     }
                     elseif($role==4){
                        echo "My Performance";
                     }

                   
                  
                  ?></a> 
               </li>
               <?php
               if($role==4){ ?>
               <li class="goal">
                  <?php if($depart=="PRODUCTION"){
                     ?>
                  <a href="achievment.php">  <i class="far fa-gem"></i>
                  Achievment</a> <?php
                  }
                  else{
                     ?>
         <a href="employee_achieve.php?kpi_id=<?php echo $id?>&& kpii=<?php echo $id?> && kpi=<?php echo $id ?>">  <i class="far fa-gem"></i>
                     Achievment</a>
                 <?php
                } ?>

               </li>
               <?php
               }
               ?>

               <?php 
               if($role!=4){
                  ?>
               <li class="period">
                  <a href="period.php">  <i class="fa fa-lock" aria-hidden="true"></i>
                  Period</a> 
               </li>
               <?php
               }
               ?>
               <!-- <li class="">
                  <a href="performance.php">  <i class="fa fa-check" aria-hidden="true"></i>
                  My performance</a> 
               </li>  -->
              


             <!---<li>
                  <a href="hod.php">  <i class="far fa-gem"></i>
                  HOD</a> 
               </li> -->

                <!---     <li>
                        <button id="defaultOpen" class="tablinks" onclick="openCity(event, 'setting')">  <i class="far fa-gem"></i>
                        Setting</button>
                     </li> ---->
                     
                  </ul>
               </div>
               <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer" style="display:none">
               <a href="#">
               <i class="fa fa-bell"></i>
               <span class="badge badge-pill badge-warning notification">3</span>
               </a>
               <a href="#">
               <i class="fa fa-envelope"></i>
               <span class="badge badge-pill badge-success notification">7</span>
               </a>
               <a href="#">
               <i class="fa fa-cog"></i>
               <span class="badge-sonar"></span>
               </a>
               <a href="logout.php">
               <i class="fa fa-power-off"></i>
               </a>
            </div>
         </nav>
      <!-- sidebar-wrapper  -->


      <!-- page-wrapper -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
         crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
         crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script>
         jQuery(function ($) {
         
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
         
         $('.add_dept').click(function(){
            $('.dept_field').show();
            $('.dept_table').hide();
         })
         
         
         
         
          
         });
         
         
      </script>  
      <script>
         const ctx = document.getElementById('myChart');
         
         new Chart(ctx, {
           type: 'bar',
           data: {
             labels: ['rating one', 'rating two', 'rating three', 'rating four', 'rating five', 'rating six'],
             datasets: [{
               label: 'number of Employees on basis of rating',
               data: [12, 19, 3, 5, 2, 3],
               borderWidth: 1
             }]
           },
           options: {
             scales: {
               y: {
                 beginAtZero: true
               }
             }
           }
         });
      </script>
   </body>
</html>
<?php
   }
   else{
     header("location:login.php");
     echo "login first";
   }
   ?>