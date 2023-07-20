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
   <body class="department">
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


               <div class="ople_prdct_dev tabcontent p-3 mt-3" id="deptname">
                  <div class="d-flex justify-content-between justify-content-center">
                     <h2 class="pb-4">Department List</h2>
                     <button type="button" class="btn btn-outline-secondary h-25 mt-2 mr-4 add_dept">Add Department</button>
                  </div>
                  <form action="add_department.php" method="POST"  class="dept_field" style="display:none">
                     <div class="row">
                        <div class="form-group col-sm-6">
                           <label for="department">Department ID:</label>
                           <input type="text" name= "department_id" class="form-control" id="department" placeholder="ENTER DEPART ID" name="department_id">
                        </div>
                        <div class="form-group col-sm-6">
                           <label for="department name">Department Name:</label>
                           <input type="text" name= "department_name" class="form-control" id="department" placeholder="Enter department Name" name="department_name">
                        </div>
                     </div>
                     <div class="row justify-content-center">
                        <button type="submit" class="btn btn-outline-secondary submit_btn mt-2 mb-2">Submit</button>
                     </div>
                  </form>
                  <table class="table dept_table pt-3">
                     <thead>
                        <tr>
                           <!-- <th scope="col">ID</th> -->
                           <th scope="col">Department ID</th>
                           <th scope="col">Name of Department</th>
                           
                           <th scope="col">Category</th>
                           <th scope="col">Manage Department</th>
                           
                        </tr>
                     </thead>
                     <?php
                        $q="SELECT * FROM department ";
                        $run = mysqli_query($mysqli, $q);
                        
                        while($row = mysqli_fetch_array($run))
                        {
                           ?>
                     
                     </td>
                     </tr>
                     <tr>
                        <!-- <td scope="col"><?php  echo $row['id']?></td> -->
                        <td scope="col"><?php  echo $row['department_id']?></td>
                        <td scope="col"><?php  echo $row['department_name']?></td>
                        
                        <th scope="col"></th>
                      
                        </td>
                        <td>      
      <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#Modalupdate<?php  echo $row['id']?>">Update</button>
      <button type="button" class="btn btn-outline-danger"> <a href="delete_department.php?id=<?php  echo $row['id'];?> &  uid=<?php  echo $id;?> "class= "text-red">Delete</a> </button>
       </td>
                     </tr>
                     <tr>
                        
                        </td>
                        
                     </tr>
                     
                    

<!-- Modal -->

<div class="modal fade" id="Modalupdate<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="update_department.php"  method="POST">
        <div class="row">
        <div class="form-group col-sm-6">
            <label for="id"> ID</label>
           <input type="text" name="id1" class="form-control" id="id1" value="<?php echo $row['id'];?>">
          </div>    
         <div class="form-group col-sm-6">
            <label for="id">Department ID</label>
           <input type="text" name="department_id" class="form-control" id="id" value="<?php echo $row['department_id'];?>">
          </div>

          <div class="form-group col-sm-6">
            <label for="name">Department Name</label>
           <input type="text" name="department_name" class="form-control" id="name" value="<?php echo $row['department_name'];?>">
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

<?php                        }
                        ?>
                          
                  </table> 
               </div>
<!-- Modal -->
<div class="modal fade" id="Modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do You want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-outline-secondary">No</button>
      </div>
    </div>
  </div>
</div>



            </div>
         </main>
         <!-- page-content" -->
      </div>
      <!-- page-wrapper -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/bootstrap-select.min.js"></script>
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
         
         
         $('ul li a').click(function() {
         $('ul li.current').removeClass('current');
        $(this).closest('li').addClass('current');
         });
          
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