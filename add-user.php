<?php
   session_start();
   include("config/config.php");
   
   if(isset($_SESSION['userId'])){
    echo $_SESSION['userId'];
   
   
   $id=$_SESSION['userId'];
   
   $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_type v on u.roleId=v.roleId WHERE userId=$id";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {  

   	while ($row = $result->fetch_assoc()){
      
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
      
      <div class="page-wrapper chiller-theme toggled">
      <?php include "includes/sidebar.php" ?>
         <!-- sidebar-wrapper  -->
         <main class="page-content">
            <div class="container-fluid tab-content">
            <div class="ople_prdct_dev tabcontent" id="empl">

                  <h2 class="pb-4">Add User</h2>
        
         <form action= "add_user.php" method= "POST">
         
          <div class="row">
                     <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">select user Type</label>
    <select type="option"  name ="user_type" class="form-control" id="exampleFormControlSelect1">
     
    <?php
                           $q="SELECT * FROM user_type WHERE roleId ";
                           
                           $run = mysqli_query($mysqli, $q);
                           
                           while($row = mysqli_fetch_array($run))
                           {
                           ?>
                           <option><?php 
                           if($role==2){
                           if($row['roleName']=='Admin' || $row['roleName']=='HOD' ){
                              continue;
                           }
                           else{
                                echo $row['roleName'];
                           }
                        }
                        elseif($role==1){
                           
                              if($row['roleName']=='Admin' ){
                                 continue;
                              }
                              else{
                                   echo $row['roleName'];
                              }
                           
                        }
                        elseif($role==3){
                           
                              if($row['roleName']=='Admin' || $row['roleName']=='HOD' || $row['roleName']=='Supervisor' ){
                                 continue;
                              }
                              else{
                                   echo $row['roleName'];
                              }
                           
                        }

                           
                           
                           ?>
                             </option>
                        
                        <?php                        }
                           ?>

    
    <!-- <option>HOD</option>
      <option>Manager</option>
      <option>Employee</option>
      -->
    </select>
  </div>

  <div class="form-group col-sm-6">
    <label for="exampleFormControlInput1">User ID</label>
    <input type="text" name="userID" class="form-control" id="exampleFormControlInput1" placeholder="user id">
  </div>
  

 
</div>

<div class="row">
   <div class="form-group col-sm-6">
    <label for="exampleFormControlInput1">User Name</label>
    <input type="text" name="userName" class="form-control" id="exampleFormControlInput1" placeholder="user Name">
  </div>
  

  <div class="form-group col-sm-6">
    <label for="exampleFormControlInput1">User email</label>
    <input type="text" name ="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
  </div>
</div>


<div class="row">
   <div class="form-group col-sm-6">
    <label for="exampleFormControlInput1">Phone Number</label>
    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
  </div>
  

  <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Departrment</label>
    <select class="form-control" name ="department_name" id="exampleFormControlSelect1">
    <?php
                           $q="SELECT * FROM department WHERE department_id";
                           
                           $run = mysqli_query($mysqli, $q);
                           
                           while($row = mysqli_fetch_array($run))
                           {
                           ?>
                           <option><?php  echo $row['department_name']?></option>
                        
                        <?php                        }
                           ?>
      <!-- <option>IT</option>
      <option>Sales</option>
      <option>Production</option> -->
    </select>
  </div>
</div>


<div class="row">
   <div class="form-group col-sm-6">
    <label for="exampleFormControlInput1">Designation</label>
    <input type="text" class="form-control" name="designation" id="exampleFormControlInput1" placeholder="designation">
  </div>
</div>

<div class="d-flex justify-content-center">
<button type="submit" class="btn btn-outline-secondary h-25 mt-2 mr-4 add_dept">Submit</button>
         
</div>
       </form>
      
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