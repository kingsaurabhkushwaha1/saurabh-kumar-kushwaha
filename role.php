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
             
           }}
   
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
   $sqll = "SELECT * FROM appraisal.user_master u inner join appraisal.department v on u.department_id=v.department_id WHERE userId=$id";
   $resultt = $mysqli->query($sqll);
   if ($result->num_rows > 0) {        
   	while ($roww = $resultt->fetch_assoc()) {
   		  $dname = $roww['department_name'];
        $depid=$roww['department_id'];
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
         .modal-dialog input{pointer-events:all!important;}
      </style>
   </head>
   <body class="role">
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


               <div class="people_prdct_dev tabcontent p-3 mt-3" id="tab6">
                  <div class="d-flex justify-content-between justify-content-center">
                     <h2 class="pb-4">Role List</h2>
                     <button type="button" class="btn btn-outline-secondary h-25 mt-2 mr-4 add_dept">Add Role</button>
                  </div>
                  <form action="add_role.php" method="POST"  class="dept_field bg-white p-3 border-radius mb-3" style="display:none">
                     <div class="row">
                        <div class="form-group col-sm-6">
                           <label for="department">Department</label>
                           <select type="option" name="department_id" class="d-flex" name="department_id">
                              <?php
                               $q="SELECT * FROM department WHERE department_id= $depid";
                                 
                                 $run = mysqli_query($mysqli, $q);
                                 
                                 while($row = mysqli_fetch_array($run))

                                 {
                                    
                                    
                                 ?>
                              <option><?php echo $row['department_name'];?></option>
                              <?php                        }
                                 ?>
                           </select>
                        </div>
                        <div class="form-group col-sm-6">
                           <label for="department name">Role ID</label>
                           <input type="text" name= "role_id" class="form-control" id="role" placeholder="Enter  role Id" name="role_id">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-sm-6">
                           <label for="department">Role Name</label>
                           <input type="text" name= "role_Name" class="form-control" id="name" placeholder=" Enter Role Name" name= "role_Name">
                        </div>
                        <div class="form-group col-sm-6 multi_select">
                           <label for="assign_kpi">Assign Kpi:</label>

                           <select type="checkbox" id="multi"  name="assign_kpi[]"  multiple>
                              <?php
                                 $q="SELECT * FROM appraisal.kpi where category='$dname' ";
                                 
                                 $run = mysqli_query($mysqli, $q);
                                 
                                 while($row = mysqli_fetch_array($run))
                                 {
                                 ?>
                              <option><?php  echo $row['name_of_kpi']?></option>
                              <?php                        }
                                 ?>
                           </select>
                        </div>

                        

                     </div>
                     <div class="row justify-content-center">
                        <button type="submit" class="btn btn-outline-secondary submit_btn mt-2 mb-2">Submit</button>
                     </div>
                  </form>
                  <table class="table bg-white pt-3">
                     <thead>
                        <tr>
                           <!-- <th scope="col">ID</th> -->
                           <!-- <th scope="col">Role ID</th>  -->
                           <th scope="col">Role Name</th>
                           <th scope="col">Department Name</th>
                           <th scope="col">Assign KPI</th>
                           <th scope="col">Manage Role</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                             $q="SELECT * FROM role where department_id= '$dname' ";
                           
                           $run = mysqli_query($mysqli, $q);
                           
                           // $row = mysqli_fetch_array($run);
                           if ($run->num_rows > 0) { 
                              $userId=array();
                             
                             

                              // $arrlength=count($userId);

                              // for($x=0;$x<$arrlength;$x++)
                              //  {
                              //  echo $userId[$x];
                              //  echo "<br>";
                              //  }
                              //  die;

                           
                              
                              while ($row = $run->fetch_assoc()) {
                           
                           ?>
                        <tr>
                            <!-- <td scope="col"><?php  echo $row['id']?></td> -->
                           
                           
                           <!-- <td scope="col">$<?php  echo $row['role_id']?></td>  -->
                           <?php   $search_id=$row['role_id'];
                             $arrlength=count($userId);
                             $flag=0;
                           for($x=0;$x<$arrlength;$x++)
                            {
                              if($search_id == $userId[$x]){
                                 $flag=1;
                               }
                           //     else{
                           //       echo "this is user different"
                           //  echo $userId[$x];
                           //     }
                           //  echo "<br>";
                            }
                            
                            $userId[]=$search_id;

                           if($flag==0){
                              ?>
                           <!-- <td><a href="drole.php"> <button class="btn btn-outline-secondary" scope="col"><?php  echo $row['role_Name']?></button></td> -->
                           <td scope="col"><?php  echo $row['role_Name']?></td>
                           <td scope="col"><?php  echo $row['department_id']?></td>

                           <td>
                           <ol>


                              <?php 
                              
                             
                               $q="SELECT assign_kpi FROM  assign_kpi  where role_id=$search_id";
                                 $e=$mysqli->query($q);
                                
                                      if ($e->num_rows > 0) { 
                                        while ($ro = $e->fetch_assoc()) {
                                          $k=$ro['assign_kpi'];
                                         
                                           ?>
                              <li> <?php    
                                            echo $k;
                                            
                                       
                                          ?></li>
                              <?php 
                                 }
                                 
                                 ?>
                           </ol>
                        </td>
                           
                           <td scope="col">
                              <button type="button" data-toggle="modal" data-target="#updaterole<?php  echo $row['id']?>" class="btn btn-outline-secondary">update</button>
                              <a href="role_delete.php?role_id=<?php  echo $row['role_id']?>">  
                              <button type="button" data-toggle="modal" data-target="#deleterole" class="btn btn-outline-secondary">Delete</button> </a>
                           </td>
                           </td> 

               </div>
               <!-- Modal update-->
               <div class="modal fade" id="updaterole<?php  echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
               <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               <form action="update_role.php" method="POST">
               <div class="row">  
               <div class="form-group col-sm-6">
               <label for="exampleFormControlInput1"> ID</label>
               <input type="text" name="id1" class="form-control" id="id1" value="<?php  echo $row['id'];?>">
               </div> 
               <div class="form-group col-sm-6">
               <label for="exampleFormControlInput1">Role ID</label>
               <input type="text" name="role_id" class="form-control" id="id2" value="<?php  echo $row['role_id'];?>">
               </div>
               <div class="form-group col-sm-6">
               <label for="exampleFormControlInput1">Role Name</label>
               <input type="text" name="role_Name" class="form-control" id="rolename" value="<?php  echo $row['role_Name'];?>">
               </div>
               <div class="form-group col-sm-6">
               <label for="exampleFormControlInput1"> Department ID</label>
               <input type="select" name="department_id"  class="form-control" id="id" value="<?php  echo $depid;?>">
               </div>
               </div>
               <div class="row">   
               
               <div class="form-group col-sm-6">
               <label for="exampleFormControlInput1">Department Name </label>
               <input type="text" name="department_name" class="form-control" id="exampleFormControlInput1" value="<?php  echo $dname;?>">
               </div>
               </div>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
               <button type="submit" name="update" class="btn btn-outline-secondary">Save changes</button>
               </form>
               </div>
               </div>
               </div>
               </div>
               <?php  }
                           }}                      }
                  ?>
               </tbody>
               </table>
               <!-- Modal delete-->
               <div class="modal fade" id="deleterole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <!-- <div class="modal-body">
                           Do You want to Delete?  
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-outline-secondary">Yes</button>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </main>
         <!-- page-content" -->
      </div>
      <!-- page-wrapper -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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
      <script type="text/javascript">
         $(document).ready(function() {
           $('#multi').multiselect();
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
       <script>
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