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
   if ($result->num_rows > 0) {        
   	while ($roww = $resultt->fetch_assoc()) {
   		 $dname = $roww['department_name'];
        
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
         .dashboard .sidebar-wrapper ul li.dashboard a{color:#16c7ff!important;}
        
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
      <th scope="col" style="text-align:center" >Employee Name</th>
    <?php 
    }
      ?>
      <th scope="col" style="text-align:center" > KPI</th>
      <th scope="col" style="text-align:center" > Goal</th>
      <?php if( $dname=="CHANNEL SALES RO"){?>
      <th scope="col" style="text-align:center" >Achievement Till Today</th>
    <?php
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
   		// $password  = $row['password'];
                 // $email=$row['email'];
                 // $role=$row['role'];
   		// $id = $row['id'];
                // printf($username);
                
                 //printf($role);?>
    
    <tr>
      <?php if($username != "Employee"){
        ?>
      <td ><?php echo $name; ?> 
      
      (<?php echo $Id?>)</td>
      <?php 
    }
      ?>
        
      <td>
      <ol>
      
    

<?php 

$q="SELECT * FROM assign_kpi where role_id =$Id";
   $e=$mysqli->query($q);
    
   

                $total=0;
            if ($e->num_rows > 0) {
              while ($ro = $e->fetch_assoc()) {
                $total=$total+1;
                
                
               
                
                ?>
<li><a href="kpi.php?kpi_id=<?php echo $Id?> "> <?php echo $ro['assign_kpi']; ?></a></li>
 <!--- <div id="count">
  
  </div> --->

<?php


              }
      $qq="SELECT Hod_approval FROM assign_kpi where role_id =$Id";
   $ee=$mysqli->query($qq);
    
    
   

                
            if ($ee->num_rows > 0) {
              
              $complete=0;
              $pending=0;
              $reject=0;
              while ($roo = $ee->fetch_assoc()) {
                
                
                
                
                  $hod= $roo['Hod_approval'];
                 
                 
                
                
                  

                if($hod=="Approval"){
                  //echo $hod;
                  
                  $complete=$complete+1;
                }
                elseif($hod=="Reject")

                $reject=$reject+1;


                else{
                  
                  
                  $pending=$pending+1;
                }
               
                
                
 

                }
                             

$success=($complete/$total)*100;
$rejection=($reject/$total)*100;
$progress=100-$success;
                }  }
   
   ?>
</ol>
              </th>
              <th>

              <ol> 
              <?php 
              
$q="SELECT * FROM appraisal.set_goal where user_id =$Id";
   $e=$mysqli->query($q);
    
   

                
            if ($e->num_rows > 0) {
              while ($ro = $e->fetch_assoc()) {
              
                
                
               
                
                ?>
<li><a href="update_goal.php?id=<?php echo $Id?> "> <?php 
$q="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id where userId=$id ";

$run = mysqli_query($mysqli, $q);

     $row = mysqli_fetch_array($run);
   


    
      if($row['department_name']=="PRODUCTION")
 {
 

echo $ro['sub_objective']; 
 }else{
  echo $ro['target'];
 }

?></a></li>
<div id="count">
              </div>
<?php
} }?>

   
             

              </ol>
              </th>
              <?php if( $dname=="CHANNEL SALES RO"){
                ?>

                    
                

              <th scope="row" class="text-center">
                <ol>

                
                
              <?php
                $q="SELECT achievement_percent , achievement FROM appraisal.achievement_recods where userId =$Id";
              $e=$mysqli->query($q);
               
              
              
                           
                       if ($e->num_rows > 0) {
                        $count = 0;
                        $total=0;
                        $temp=0;
                         while ($ro = $e->fetch_assoc()) 
                         
                         {
                         $count =$count + $ro['achievement_percent'];
                        
                           $total =$total + $ro['achievement'];
                            $temp++;

                           ?>
                          
                          <li>      <a href="sales.php?kpi_id=<?php echo $Id?> "> <?php echo $ro['achievement'];  ?>  </a> </li>
 
                
              
               <?php
                         }
// echo "saurabh"; 
//    echo $count;
//    echo "saurabh ";
//   echo $total;
//   echo "saurabh ";
//   echo  $temp;
//   echo "hoii";
  $x= $total;
  $y= $temp;
  $avg = $total/$temp;
  //echo $avg ;

  


 ?>


 
 <?php
 }?>

</ol>              
</th>
              <?php
    }
    ?>
        <th scope="row" style="text-align:center" >
    
    <?php 
        
        if($avg >= 50){

    
      
       echo "ON TRACK";
       }
       else {

        
         echo "OFF TRACK";
      
       
        
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
                       <h3 id="self"class="pb-2"align="center">Self Performance</h3>

                       <div id="piechart"></div>

             <script type="text/javascript" src=https://www.gstatic.com/charts/loader.js></script>

                   <script type="text/javascript">
                   
                   

                   
//var totald=<?php // echo "$total"; ?>



// Load google chartsy
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {

  
 
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Success',  <?php echo $success;?>],
  ['offTrack',  <?php echo $rejection;?>],
  ['work in progress', <?php echo $progress;?>],
  ['remaining work',<?php echo $progress;?> ],
  ['completed worked', <?php echo $success;?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'', 'width':380, 'height':260};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

                       <?php
                    }
                    else{
                    ?>
                      <h3 id="self" class="pb-2"align="center">Team Performance</h3>
                      <canvas id="performance_chart" width="600" height="400"></canvas>

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
         crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
         crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
         
        var performance = document.getElementById("performance_chart");

        // Chart.defaults.global.defaultFontFamily = "Lato";
        // Chart.defaults.global.defaultFontSize = 18;
          var self= document.getElementById("self").innerHTML;
          console.log(self);
          if(self=="Self Performance"){
            var perfomanceData = {
             labels: [
              " Success ",
              " Remaining Work",
              "Compleated Work  ",
              "Work in Progress ",
              "Off Track  "
          ],
          datasets: [
            {
              data: [133.3, 86.2, 52.2, 51.2, 50.2],
              backgroundColor: [
                  "blue",
                  "#63FF84",
                  "green",
                  "#8463FF",
                  "red"
              ]
            }]
          };}
          else{
            var perfomanceData = {
             labels: [
              "Department Success",
              "Department  Remaining Work",
              "Compleated Work of Department ",
              "Work in Progress ",
              "Off Track of Department "
          ],
          datasets: [
            {
              data: [133.3, 86.2, 52.2, 51.2, 50.2],
              backgroundColor: [
                  "blue",
                  "#63FF84",
                  "green",
                  "#8463FF",
                  "red"
              ]
            }]
          };}


          var pieChart = new Chart(performance, {
            type: 'pie',
            data: perfomanceData
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