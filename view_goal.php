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
   
   $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_type v on u.roleId=v.roleId WHERE userId=$id";
   $result = $mysqli->query($sql);
   if ($result->num_rows > 0) {        
   	while ($row = $result->fetch_assoc()) {
   		$username = $row['roleName'];
    
   		
                 $role = $row['roleId'];
                 //printf($role);
             }
         
   }
   
 
  
  $goal_id=$_GET['id'];
  
   
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
   <body class="set_goal" >
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
                  <div class="d-flex justify-content-between justify-content-center pb-4">
                     <h2 id="iddid">View Goal</h2>

                     <!-- <button id="goal_btn" type="button" onclick="hide_viewgoal()" class="btn btn-outline-secondary">Set Your Goal</button> -->

                  </div>
                 
                  

                  <form id="goal_form" style="display:none" action="addset.php" method="POST">
                  <h2 id="iddid">Set Goal</h2>
  
<div class="row pb-1"> 
                   
  <div class="form-group col-sm-6">
    <label for="goal">Goal</label>
    <input type="text" name="goal" class="form-control" id="goal" placeholder="Set Your Goal">
  </div>
  <div class="form-group col-sm-6">
    <label for="goal">Benchmark For Success</label>
    <input type="text" name="benchmark" class="form-control" id="goal" placeholder="Set Your Benchmark">
  </div>
</div>

<div class="row pb-1">
<div class="form-group col-sm-6">
    <label for="eval">Evaluation Plan</label>
    <textarea  name ="plan" class="form-control" placeholder="Evaluation Plan" id="eval" rows="3"></textarea>
</div>
<div class="form-group col-sm-6">
    <label for="eval">Strategic Action Description</label>
    <textarea name="discription" class="form-control" placeholder="Strategic Action Description" id="eval" rows="3"></textarea>
</div>
      </div>

<div class="row pb-1">                  
  <div class="form-group col-sm-6">
    <label for="dept">Party/Dept Responsible</label>
    <input type="text" name="responsible" class="form-control" id="dept" placeholder="Party Department Responsible">
  </div>
  <div class="form-group col-sm-6">
    <label for="date">Start Date</label>
    <input type="date"  name="begin_date" class="form-control" id="date" placeholder="Date to Begin">
  </div>
</div>


<div class="row pb-1">                  
  <div class="form-group col-sm-6">
    <label for="date">Closer Date</label>
    <input type="date" name="due_date" class="form-control" id="date" placeholder="Date Due">
  </div>
  <div class="form-group col-sm-6">
    <label for="date">Resources required</label>
    <input type="text" name="required" class="form-control" id="date" placeholder="resources required">
  </div>
</div>

<div class="row pb-1">                  
  <div class="form-group col-sm-6">
    <label for="date">Desired Outcome</label>
    <input type="text" name="outcome" class="form-control" id="date" placeholder="Desired Outcome">
  </div>
  <div class="form-group col-sm-6">
    <label for="note">Additional Notes</label>
    <input type="text" name="notes" class="form-control" id="note" placeholder="Additional Notes">
  </div>
</div>

<div class="row justify-content-center">
  <button type="submit" id="submit_btn" class="btn btn-secondary mt-2">Submit</button>
</div>








            </form>


            <table id="goal_table" class="table">
  <thead>
  <tr>
      <th scope="col">Objective</th>
      
      <th scope="col">Sub objective</th>
      <th scope="col">Target</th>
      <!-- <th scope="col">Strategic Action Description</th> -->
      <th scope="col">Target Quantity</th>
       
      <th scope="col">Target Type</th>
      <th scope="col">Period</th>
      <th scope="col">Project Dependency</th>

      <th scope="col">Start Date</th>
      <th scope="col">Closer Date</th>
      
      <!-- <th scope="col">Desired Outcome</th> -->
      <th scope="col">Additional Notes</th>
      <th scope="col">Resources required</th>
      <th scope="col">Success Definition</th>
      <!-- <th scope="col">Action</th> -->
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
   
                        $q="SELECT * FROM set_goal where user_id=$goal_id ";
                        $run = mysqli_query($mysqli, $q);
                        
                        while($row = mysqli_fetch_array($run))
                        {
                           ?>
      <th > <?php  echo $row['objective']?></th>
      
      <!-- <td></td> -->
      <!-- <td>   <?php  echo $row['plan']?></td> -->
      <td>   <?php  echo $row['sub_objective']?></td>
      <td>   <?php  echo $row['target']?></td>
      <td>   <?php  echo $row['target_quantity']?></td>
      <td>   <?php  echo $row['target_type']?></td>
      <td>   <?php  echo $row['period']?></td>
      <td>   <?php  echo $row['project_depedency']?></td>
   
      <td> <?php  echo $row['begin_date']?></td>
      <td> <?php  echo $row['due_date']?></td>
      <td><?php  echo $row['notes']?></td>
      
      <td> <?php  echo $row['required']?> </td>
      <td><?php  echo $row['definition']?></td>

      <!-- <td> <button type="submit"  class="btn btn-outline-danger"> <a href="delete_setgoal.php?id=<?php  echo $row['id'];?> &  uid=<?php  echo $id;?>" >  Delete</button></a>  </td>       -->
    </tr>
   </tbody>
   <?php                        }
                        ?>
</table>

         </main>
         <!-- page-content" -->
      </div>
     
     
      
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script>
         $(function(){
            $('#goal_btn').click(function(){
                $('#goal_table').hide();
                $('#goal_form').show();
            })
            $('#submit_btn').click(function(){
                $('#goal_table').show();
                $('#goal_form').hide();
            })
         })
         $(function(){
            $('#goal_btn').click(function(){
                $('#iddid').hide();
                $('#goal_btn').hide();
                $('#idd').show();
                
            })
          })
          
      </script>
</html>
<?php
   }
   
   
   ?>