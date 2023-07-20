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
  $sq = "SELECT department_name from appraisal.user_master u inner join appraisal.department d on u.department_id=d.department_id
  where u.userId= $id";
   $re = $mysqli->query( $sq );
   if ( $re->num_rows > 0 ) {
       while ( $r = $re->fetch_assoc() ) {
           $department = $r[ 'department_name' ];
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
         #goal_form{margin-top:-23px;}
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

                     <button id="goal_btn" type="button" onclick="hide_viewgoal()" class="btn btn-outline-secondary">Set Your Goal</button>

                  </div>
                 
                  

                  <form id="goal_form" style="display:none" action="addset.php" method="POST">
                  <h2 id="iddid">Set Goal</h2>
                  <div class="bg-white p-3 border-radius mt-3">
  
<div class="row pb-1"> 
                   
  <div class="form-group col-sm-6">
    <label for="goal">Objective</label>
    <select type="option" name="objective" class="form-control" id="exampleFormControlSelect1">
                              <?php
                             
                              if($role==4){
                              
                              
                  
                                
                                 $q="SELECT * from appraisal.assign_kpi a inner join appraisal.role r on a.role_id=r.role_id where a.role_id=$id ";
                              }
                              else{
                                
                                
                                $q="SELECT * FROM appraisal.kpi where category='$department'";
                              }
                                 $run = mysqli_query($mysqli, $q);
                                 while($row = mysqli_fetch_array($run))
                                 {
                                  if($role==4){
                                 ?>
                                 <option><?php  echo $row['assign_kpi']?></option>
                              <?php                        }
                                 else{
                                  ?>
                                  <option><?php  echo $row['name_of_kpi']?></option>
                               <?php 
                                  

                                 }
                                }
                                 ?>
                           </select>
  </div>

  <?php
                                 $q="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id where userId=$id ";
                                 
                                 $run = mysqli_query($mysqli, $q);

                                      $row = mysqli_fetch_array($run);
                                      if($row['department_id']==101 or $row['department_id']==105)
                                 {
                                 ?>
                                   
                                   
                             
  <div class="form-group col-sm-6">
    <label for="eval">Sub Objective</label>
    <input type="text" name="sub_objective" class="form-control" id="dept"  placeholder="Sub Objective">
   
</div>
<?php
                                 }
                                
                                 ?>
 
</div>

 <div class="row pb-1">
<!-- <div class="form-group col-sm-6">
    <label for="eval">Evaluation Plan</label>
    <textarea  name ="plan" class="form-control" placeholder="Evaluation Plan" id="eval" rows="3"></textarea>
</div> -->
      </div> 

<div class="row pb-1">
<!-- <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Target Type</label>
    <input type="text" name="target_type" class="form-control" id="exampleFormControlSel">
   
  </div> -->
  <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Target Type</label>
    <!-- <input type="text" name="target_type" class="form-control" id="exampleFormControlSel"> -->
    <select class='form-control' name='target_type' >
      <option value='value'>Value</option>
       <option value='quantity'>Quantity</option>
       <option value='timeline'>Timeline</option> </select>
   
  </div>
    
  <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Target Quantity</label>
    <input type="text" name="target_quantity" class="form-control" id="exampleFormControlSel">
    
  </div> 
  <!-- <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Target Type</label>
    <input type="text" name="target_type" class="form-control" id="exampleFormControlSel">
   
  </div> -->
  <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Target</label>
    <input type="text" name="target" class="form-control" id="exampleFormControlSelect1">
    
  </div>
  <div class="form-group col-sm-6">
    <label for="exampleFormControlSelect1">Period</label>
    <!-- <input type="text" name="period" class="form-control" id="exampleFormControlSel"> -->
    <select class='form-control'  name="period"  id='tarapproval'>
      <option value='yearly'>Yearly</option>
      <option value='quarterly'>Quarterly</option>
       <option value='monthly'>Monthly</option>
      </select>
  </div>       
  <div class="form-group col-sm-6">
    <label for="dept">Project Dependency</label>
    <input type="text" name="project_depedency" class="form-control" id="dept" placeholder="Project Dependency">
  </div>
  

<div class="row pb-1 col-sm-6"> 
<div class="form-group col-sm-6">
    <label for="date">Start Date</label>
    <input type="date"  name="begin_date" class="form-control" id="date" placeholder="Date to Begin">
  </div>                 
  <div class="form-group col-sm-6">
    <label for="date">Closer Date</label>
    <input type="date" name="due_date" class="form-control" id="date" placeholder="Date Due">
  </div>
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

  
  <div class="form-group col-sm-6">
    <label for="date">Resources required</label>
    <input type="text" name="required" class="form-control" id="date" placeholder="resources required">
    <label for="goal"> Success Definition</label>
    <input type="text" name="definition" class="form-control" id="goal" placeholder="Success Definition">
  </div>

  
</div>

<div class="row">
<div class="form-group col-sm-6">
    
  </div>
</div>

<div class="row justify-content-center">
  <button type="submit" id="submit_btn" class="btn btn-secondary mt-2">Submit</button>
</div>




                                </div>

            </form>

            <table id="goal_table" class="table bg-white">
  <thead>
  
    <tr>
     
      <th scope="col">Objective</th><?php
    $q="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id inner join appraisal.set_goal s on r.userId=s.user_id where s.user_id=$goal_id ";
    $run = mysqli_query($mysqli, $q);

  while ($row = mysqli_fetch_array($run)) {
    ?>
      
        
      <?php
      if ($row['department_id'] == 101 or $row['department_id'] == 105) {
        ?>
      <th scope="col">Sub objective</th>
      <?php }
      break;
  }
      ?>
      <th scope="col">Target Type</th>
      <!-- <th scope="col">Strategic Action Description</th> -->
      <th scope="col">Target Quantity</th>
       
      <th scope="col">Target </th>
      <th scope="col">Period</th>
      <th scope="col">Project Dependency</th>

      <th scope="col">Start Date</th>

      <th scope="col">Closer Date</th>
      
      <!-- <th scope="col">Desired Outcome</th> -->
      <th scope="col">Additional Notes</th>

      <th scope="col">Resources required</th>

      <th scope="col">Success Definition</th>

      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php
    $q="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id inner join appraisal.set_goal s on r.userId=s.user_id where s.user_id=$goal_id ";
    $run = mysqli_query($mysqli, $q);

  while ($row = mysqli_fetch_array($run)) {
    ?>
    <tr>
  
      <td > <?php echo $row['objective'] ?></td>
      
  

            <?php
            if ($row['department_id'] == 101 || $row['department_id'] == 105)
             {
              
              
              ?>
             
         <td><?php echo $row['sub_objective'] ?>  </td>
      <?php
            }

            ?>
        <!-- <?php echo $row['sub_objective'] ?></td> -->
      <td>   <?php echo $row['target_type'] ?></td>
      <td>   <?php echo $row['target_quantity'] ?></td>
      <td>   <?php echo $row['target'] ?></td>
      <td>   <?php echo $row['period'] ?></td>
      <td>   <?php echo $row['project_depedency'] ?></td>



   
      <td type="date" > <?php echo $row['begin_date'] ?></td>


      <td type="date"> <?php echo $row['due_date'] ?></td>

      
      <td><?php echo $row['notes'] ?></td>
      
      <td> <?php echo $row['required'] ?> </td>
      <td><?php echo $row['definition'] ?></td>

     
      <!-- <td>          <?php echo $row['benchmark'] ?></td> -->
      <td> <button type="submit"  class="btn btn-outline-danger"> <a href="delete_setgoal.php?id=<?php echo $row['id']; ?> &  uid=<?php echo $id; ?>" >  Delete</button></a>  </td>      
    </tr>
   </tbody>
   <?php }
                        ?>
</table>

         </main>
         <!-- page-content" -->
      </div>
     
     
      
   </body>
   <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js></script>
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

