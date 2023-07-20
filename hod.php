<?php
   session_start();
   include("config/config.php");
   
   if(isset($_SESSION['userId'])){
    echo $_SESSION['userId'];
   
   
   $id=$_SESSION['userId'];
   
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
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>PMS Dashboard</title>
      <meta charset="UTF-8">
      <?php include "includes/library.php" ?>
   </head>
   <body class="common">
      <div class="page-wrapper chiller-theme toggled">
      <?php include "includes/sidebar.php" ?>
         <!-- sidebar-wrapper  -->
         <main class="page-content">
            <div class="container-fluid tab-content">
            <div class="ople_prdct_dev tabcontent" id="empl">

               <div class="d-flex justify-content-between justify-content-center">
                  <h2 class="pb-4">Department View</h2>
                  <button type="button" onclick="window.location.href='add-user.php'" class="btn btn-outline-secondary h-25 mt-2 mr-4 add_dept">Add user</button>
               </div> 


                  <table class="table pt-3">
                     <thead>
                        <tr>
                           <!-- <th scope="col">HOD ID</th> -->
                           <th scope="col" style="text-align:center">Department Name</th>
                           <th scope="col" style="text-align:center">HOD Name</th>
                           <th scope="col" style="text-align:center">Performance </th>
                           <!-- <th scope="col">HOD Email</th> -->
                           
                           <th scope="col" style="text-align:center">For Details </th>
                     </thead>
                     <?php
                        if($role==1){
                           $q=" SELECT * FROM appraisal.user_master u inner join appraisal.department d on u.department_id=d.department_id inner join
                           appraisal.user_role_mapping k on u.userId= k.userId where roleId=2 ";
                        }elseif($role==3){
                           $q="SELECT * FROM appraisal.user_master u WHERE u.Supervisor=$id";
                        
                        }
                        elseif($role==2){
                           $q= "SELECT * FROM appraisal.user_master u inner join appraisal.department k on u.department_id=k.department_id  WHERE u.HOD=$id";
                        
                        }
                        else{
                           $q="SELECT * FROM appraisal.user_master where userId=$id";
                        }
                        
                        
                        $run = mysqli_query($mysqli, $q);
                        
                        while($row = mysqli_fetch_array($run))
                        {
                        
                        
                        
                        
                        
                        ?>
                     <tbody>
                        <tr>
                           <!-- <td scope="col"><?php  echo $row['userId']?></td> -->
                           <td scope="col" align="center"><?php  echo $row['department_name']?></td>
                           <td scope="col" align="center"><?php  echo $row['userName']?><br>
                        (<?php  echo $row['userId']?>)</td>
                        <td scope="col" align="center"><?php  echo $row['performance']?></td>

                           <!-- <td scope="col"><?php  echo $row['email']?></td> -->
                           
                           <td scope="col"  align="center">
                             <a href="manager.php?id='<?php  echo $row['userId']?>'"> <button type="button" class="btn btn-outline-secondary"> show manager list </button> </a> </td>
                           <!-- <td scope="col"><?php  echo $row['description_of_kpi']?></td>
                              <td scope="col"><?php  echo $row['target']?></td>
                              
                              <td scope="col"><?php  echo $row['category']?></td>
                              <td scope="col"><?php  echo $row['created_by']?></td>
                              <td scope="col">
                                 <div class="date"><?php  echo $row['created_on']?></div>
                              </td>
                              <td scope="col"><?php  echo $row['modified_on']?></td>
                              <td scope="col">
                                 <div class="date"><?php  echo $row['modified_on']?></div>
                              </td>
                              <td scope="col">
                                 <div class="date"><?php  echo $row['modified_id']?></div>
                              </td>
                              <td scope="col">
                                 <div class="date"></div>
                              </td>
                              <td scope="col">
                                 <div class="date"></div>
                              </td> -->
                           <!-- <td scope="col">  
                              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#Modalupdate">Update</button> 
                              
                              </td> -->
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                  </table>
                  <div class="modal fade" id="Modalupdatedepthemp" tabindex="-1" role="dialog" aria-labelledby="Modalupdatedepthemp" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Employee Detail</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">KPI ID</label>
                                       <input type="id" class="form-control" id="examplekpiid" aria-describedby="kpiid" placeholder="KPI ID">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="name">Name of KPI</label>
                                       <input type="name" class="form-control" id="name" aria-describedby="kpiname" placeholder="Name of KPI">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">Name of Employee</label>
                                       <input type="desc" class="form-control" id="examplekpidesc" aria-describedby="kpidesc" placeholder="name of employee">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="name">Designation</label>
                                       <input type="desc" class="form-control" id="examplekpidesc" aria-describedby="kpidesc" placeholder="designation">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">Description of KPI</label>
                                       <input type="desc" class="form-control" id="examplekpidesc" aria-describedby="kpidesc" placeholder="description of KPI">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="name">Target</label>
                                       <select class="form-control" id="exampleFormControlSelect1">
                                          <option>Yes</option>
                                          <option>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="name">Applicable For Category</label>
                                       <select class="selectpicker" multiple data-live-search="true">
                                          <option>Sales</option>
                                          <option>Service</option>
                                          <option>Support</option>
                                          <option>Tech</option>
                                          <option>Production</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">Created By</label>
                                       <input type="created by" class="form-control" id="createdby" aria-describedby="createdby" placeholder="Created By">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">Created On</label>
                                       <div class="date">12-2-2022</div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="name">Modified By</label>
                                       <input type="name" class="form-control" id="name" aria-describedby="modifiedby" placeholder="Modified By">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">Modified On</label>
                                       <div class="date">12-2-2022</div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="name">Modified ID</label>
                                       <input type="name" class="form-control" id="name" aria-describedby="modifiedid" placeholder="Modified ID">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="examplekpiid">Reason</label>
                                       <input type="name" class="form-control" id="name" aria-describedby="reason" placeholder="reason">
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-outline-secondary">Save changes</button>
                           </div>
                        </div>
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
