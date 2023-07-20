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
      <style>
         .modal-dialog input{pointer-events:all!important;}
         .table ol li {
         margin: 10px;
         }
      </style>
   </head>
   <body class="goal">
      <div class="page-wrapper chiller-theme toggled">
         <?php include "includes/sidebar.php" ?>
         <!-- sidebar-wrapper  -->
         <main class="page-content">
            <div class="container-fluid tab-content">
               <div class="ople_prdct_dev tabcontent" id="deptname">
                  <div class="d-flex justify-content-between justify-content-center">
                     <h2 class="pb-4">Search Goal</h2>
                  </div>
               </div>
               <form action="" method="POST">
                  <div class="row">
                     <div class="form-group col-sm-6 d-flex">
                        <input type="text"  name="serach_id" class="form-control" id="exampleFormControlInput1" placeholder="Search Employee Code">
                        <button type="submit" class="btn btn-outline-secondary"> Search </button>
                     </div>
                  </div>
               </form>
               <table class="table mt-3">
                  <thead>
                     <tr>
                        <th scope="col"> Role </th>
                        <th scope="col"> List of Assign KPI </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                         $search_id=$_POST['serach_id'];
                        
                        
                        
                        $q="SELECT role_Name FROM role u INNER JOIN assign_kpi a on u.role_id=a.role_id where a.role_id=$search_id";
                        $e=$mysqli->query($q);
                        if ($e->num_rows > 0) {        
                         $ro = $e->fetch_assoc();
                        
                         ?>
                     <tr>
                        <td scope="row"><?php echo $ro['role_Name']; ?> </td>
                        <td>
                           <ol>
                              <?php $q="SELECT assign_kpi FROM role u INNER JOIN assign_kpi a on u.role_id=a.role_id where a.role_id=$search_id";
                                 $e=$mysqli->query($q);
                                      if ($e->num_rows > 0) { 
                                        while ($ro = $e->fetch_assoc()) {
                                           ?>
                              <li> <?php  echo$ro['assign_kpi'] ;?></li>
                              <?php }
                                 }
                                 
                                 ?>
                           </ol>
                        </td>
                     </tr>
                     <!-- <tr>
                        <th scope="row">RMCSRO</th>
                        <td> <ol>
                           <li>Primary Sale</li> 
                           <li>New Business Partner</li>
                           <li>Team Management</li>
                         <ol> </td>
                        </tr>
                        <tr>
                        <th scope="row">HODCSRO</th>
                        <td> <ol>
                           <li>Primary Sale</li> 
                           <li>New Business Partner</li>
                           <li>Team Management</li>
                         <ol> </td>
                        </tr> -->
                  </tbody>
                  <?php
                     }
                     else 
                     echo "Please Enter the correct Employee Code";
                     }
                     
                     ?>
               </table>
            </div>
         </main>
         <!-- page-content" -->
      </div>
      <!-- page-wrapper -->
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
   
   
   ?>