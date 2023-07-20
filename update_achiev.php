<?php
   session_start();
   include("config/config.php");
   
   if(isset($_SESSION['userId'])){
  
   
   
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
   
  //  if($username=="Supervisor"){
  //   if(isset($_GET['id'])){
  //   $goal_id=$_GET['id'];}
  //   else{
  //     $goal_id=$_SESSION['userId'];

  //   }
  //  }
  //  elseif($username=="Employee"){
  //   $goal_id=$_SESSION['userId'];
  //  }
  //  else{
    
  //   $goal_id=$_SESSION['userId'];}
  $goal_id=$_SESSION['userId'];
    
  
   
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
               <div class="ople_prdct_dev tabcontent" id="deptname">
                  <div class="d-flex justify-content-between justify-content-center pb-4">
                     <h2 id="iddid">View Goal</h2>

                     <button id="goal_btn" type="button" onclick="hide_viewgoal()" class="btn btn-outline-secondary">Set Your Goal</button>

                  </div>
                 
                  

                  <form id="goal_form" style="display:none" action="addset.php" method="POST">
                  <h2 id="iddid">Set Goal</h2>
  
<div class="row pb-1"> 
                   
  <div class="form-group col-sm-6">
    <label for="goal">Objective</label>
    <input type="text" name="goal" class="form-control" id="goal" placeholder="Objective">
  </div>
  <div class="form-group col-sm-6">
    <label for="goal"> Success Definition</label>
    <input type="text" name="benchmark" class="form-control" id="goal" placeholder="Success Definition">
  </div>
</div>

<!-- <div class="row pb-1"> -->
<!-- <div class="form-group col-sm-6">
    <label for="eval">Evaluation Plan</label>
    <textarea  name ="plan" class="form-control" placeholder="Evaluation Plan" id="eval" rows="3"></textarea>
</div> -->
<!-- <div class="form-group col-sm-6">
    <label for="eval">Strategic Action Description</label>
    <textarea name="discription" class="form-control" placeholder="Strategic Action Description" id="eval" rows="3"></textarea>
</div> -->
      <!-- </div> -->

<div class="row pb-1">                  
  <div class="form-group col-sm-6">
    <label for="dept">Project Dependency</label>
    <input type="text" name="responsible" class="form-control" id="dept" placeholder="Project Dependency">
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
  <!-- <div class="form-group col-sm-6">
    <label for="date">Desired Outcome</label>
    <input type="text" name="outcome" class="form-control" id="date" placeholder="Desired Outcome">
  </div> -->
  <div class="form-group col-sm-6">
    <label for="note">Additional Notes</label>
    <textarea type="textbox" name="notes"  class="form-control" id="textbox" cols="30" rows="5" placeholder="Additional Notes">
        </textarea>
  </div>
</div>

<div class="row justify-content-center">
  <button type="submit" id="submit_btn" class="btn btn-secondary mt-2">Submit</button>
</div>








               </div>
            </div>
            </form>


            <table id="goal_table" class="table">
  <thead>
    <tr>
      <th scope="col">Objective</th>
      <th scope="col">Success Definition</th>
      <!-- <th scope="col">Evaluation Plan</th> -->
      <!-- <th scope="col">Strategic Action Description</th> -->
      <th scope="col">Project Dependency</th>
      <th scope="col">Start Date</th>
      <th scope="col">Closer Date</th>
      <th scope="col">Resources required</th>
      <!-- <th scope="col">Desired Outcome</th> -->
      <th scope="col">Additional Notes</th>
      <th scope="col">Action</th>
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
      <th > <?php  echo $row['goal']?></th>
      <td>          <?php  echo $row['benchmark']?></td>
      <!-- <td>   <?php  echo $row['plan']?></td> -->
      <!-- <td>   <?php  echo $row['discription']?></td> -->
      <td> <?php  echo $row['responsible']?></td>
      <td> <?php  echo $row['begin_date']?></td>
      <td> <?php  echo $row['due_date']?></td>
      <td> <?php  echo $row['required']?> </td>
      <!-- <td><?php  echo $row['outcome']?></td> -->
      <td><?php  echo $row['notes']?></td>
      <td> <button type="submit"  class="btn btn-outline-danger"> <a href="delete_setgoal.php?id=<?php  echo $row['id'];?> &  uid=<?php  echo $id;?>" >  Delete</button></a>  </td>      
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