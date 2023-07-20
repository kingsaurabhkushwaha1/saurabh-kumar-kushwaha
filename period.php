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
   <body class="period">
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
                     <h2 class="pb-4">Process Period </h2>
                  </div>

                  <form action="" method="post" >
            <div class="row"> 
            <div class="form-group col-sm-6 pt-2 pb-3">
                 <label for="exampleFormControlSelect1">Add Priodicity</label>
                 <select class="form-control" id="exampleFormControlSelect1" name='period'>
                 <option value="Yealy">Yealy</option>
                 <option value="Monthly">Monthly</option>
                 <option value="Quaterly">Quaterly</option>
                
            </select>
            <div class="row">
               
             <div class="col-sm-6 pt-3">
              <button type='submit' class='btn btn-primary'> search</button>
             </div>
         </div>

            </div>
          </div>
          </form>
        
            </div>

            

<!---  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">Annually</th>
      <th scope="col">Monthly</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"> <ol>
        <li>FY-22</li>
        <li>FY-23</li>
      </ol> </td>
      <td> <ol>
        <li>Jan-22</li>
        <li>Feb-23</li>
        <li>Mar-23</li>
      </ol> </td>
    </tr>
    </tbody>
</table> --->

<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
   ?>
<table class="table mt-3">
  <thead>
    <tr>
    <th scope="col">Assign Kpi/KPI</th>
    <?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){

         $period=$_POST['period'];
         if($period=="Yealy"){

         ?>
      <th scope="col">Financial Year</th>
         <?php 
         }
         elseif($period=="Monthly"){
         ?>
      <th scope="col">Monthly</th>
      <?php
         }
         elseif($period=="Quaterly"){
            ?>
      <th scope="col">Quaterly</th>
      <?php
         }
      }
         ?>
      <th scope="col">From Date</th>
      <th scope="col">To Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <?php
                        $q="SELECT * FROM period ";
                        $run = mysqli_query($mysqli, $q);
                        
                        while($row = mysqli_fetch_array($run))
                        {
                           ?>
                     
                     </td>
                     </tr>
                     <tr>
                     <td scope="col">Primary Sales</td>
                     <?php
                      if($period=="Yealy"){

                        ?>

                        <td scope="col"><?php  echo $row['Financial_year']?></td>
                        <?php
                      }
                      
                     
                     elseif($period=="Monthly"){
                     
                      
                      ?>
                      
                        <td scope="col"><?php  echo $row['Monthly']?></td>
                        <?php
                          }
                             elseif($period=="Quaterly"){
                            ?>
                        <td scope="col"><?php  echo $row['Quaterly']?></td>
                        <?php
                             }
                             ?>
                        <td scope="col"><?php  echo $row['from_date']?></td>
                        <td scope="col"><?php  echo $row['to_date']?></td>
                        <td scope="col"><?php  echo $row['status']?></td>
                        
                        <!-- <th scope="col"></th> -->
  <!-- <tbody>
    <tr>
      <td scope="row"> FY-22 </td>
      <td> <ol>
         <li> Apr-22 </li>
         <li> May-22 </li>

      </ol> </td>
      <td>
      <ol>
         <li> 02-04-22 </li>
         <li> 06-04-22 </li>

      </ol>
      </td>
      <td>
      <ol>
         <li> 02-04-22 </li>
         <li> 06-04-22 </li>

      </ol>
      </td>
      <td>
      <ol>
         <li> 03-05-22 </li>
         <li> 05-05-22 </li>

      </ol>
      </td>
      <td>Pending</td> -->
    </tr>
    </tbody>
    <?php                        }
                        ?>
</table>
<?php
  }
  ?>


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
   else{
     header("location:login.php");
     echo "login first";
   }
   ?>

   