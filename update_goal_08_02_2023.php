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
    
   		
                 $role = $row['roleId'];
                 //printf($role);
             }
         
   }
   
    if (isset($_GET['kpi_id'])) {
        $goal_id = $_GET['kpi_id'];
    } else {
   
        $goal_id = $_GET['id'];
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
                  <div class="d-flex justify-content-between justify-content-center">
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
               </div>
            </div>
            </form>
            <div class="pl-4 pr-4">
               <table id="goal_table" class="table bg-white">
                  <thead>
                     <tr>
                        <?php  
                           $q="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id  inner join appraisal.set_goal p on r.userId=p.user_id where p.user_id=$goal_id ";
                           $run = mysqli_query($mysqli, $q);
                           
                           $roww = mysqli_fetch_array($run);
                           
                              ?>
                        <th scope="col">Objective</th>
                        <?php
                           if ($roww['department_id'] == 101 || $roww['department_id'] == 105) {
                            
                             ?>
                        <th scope="col">Sub objective</th>
                        <?php }
                           ?>
                        <th scope="col">Target Type</th>
                        <!-- <th scope="col">Strategic Action Description</th> -->
                        <th scope="col">Target Quantity</th>
                        <th scope="col">Target</th>
                        <th scope="col">Period</th>
                        <th scope="col">Project Dependency</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Closer Date</th>
                        <!-- <th scope="col">Desired Outcome</th> -->
                        <th scope="col">Additional Notes</th>
                        <th scope="col">Resources required</th>
                        <th scope="col">Success Definition</th>
                        <th scope="col">Manager Approval</th>
                        <th scope="col">Hod Approval</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <?php 
                        $qq="SELECT * from appraisal.department a inner join appraisal.user_master r on a.department_id=r.department_id  inner join appraisal.set_goal p on r.userId=p.user_id where p.user_id=$goal_id ";
                        $runn = mysqli_query($mysqli, $qq);
                        
                         while ($row = mysqli_fetch_array($runn)) {
                           echo $count=$row['id'];
                           //die;
                         
                          
                         
                          ?>
                  <tbody>
                     
                     <tr id = "tr<?php echo $row['id'] ?>">
                        <th > <?php echo $row['objective'] ?></th>
                        <?php
                           if ($row['department_id'] == 101 || $row['department_id'] == 105) {

                             ?>

                        <td>   <?php echo $row['sub_objective'] ?></td>
                        <?php 
                           }
                           ?>
                        <td>   <?php echo $row['target_type'] ?></td>
                        <td>   <?php echo $row['target_quantity'] ?></td>
                        <td>   <?php echo $row['target'] ?></td>
                        <td>   <?php echo $row['period'] ?></td>
                        <td>   <?php echo $row['project_depedency'] ?></td>
                        <td> <?php echo $row['begin_date'] ?></td>
                        <td> <?php echo $row['due_date'] ?></td>
                        <td><?php echo $row['notes'] ?></td>
                        <td> <?php echo $row['required'] ?> </td>
                        <td><?php echo $row['definition'] ?></td>
                        <td><?php  echo $row['Manager_Approval']?></td>
                        <td><?php  echo $row['Hod_Approval']?></td>
                        <td><?php  echo $row['Status']?></td>
                        <td> <button type='button' class='btn btn-outline-secondary' data-toggle='modal' data-target="#Modalupdate<?php echo $row['id'] ?>">Update</button></td>
            </div>
         </main>
         <!-- page-content" -->
      </div>
      
      <div class='modal fade' id="Modalupdate<?php echo $count ?>" tabindex='-1' role='dialog' aria-labelledby='Modalupdate' aria-hidden='true'>
      <div id="<?php printf($username);?>" class='modal-dialog' role='document'>
      <div class='modal-content'>
      <div class='modal-header'>
      <h5 class='modal-title' id='exampleModalLabel'>Update View Goal</h5>
      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
      <span aria-hidden = 'true'>&times;</span>
      </button>
      </div>
      <div class='modal-body'>
      <form action="update_viewgoal.php?kpi_id=<?php echo $goal_id ?>" method='POST'>
      <div class='row'>
      <?php
         $q="SELECT * FROM set_goal where user_id=$goal_id ";
        
                 $run = mysqli_query($mysqli, $q);
                 
                 while($row = mysqli_fetch_array($run))
                 {
                    ?>
      <div class='form-group col-sm-6'>
      <label for='name'> Objective</label>
      <input type='text' name='objective' class='form-control' id='name' aria-describedby='kpiname' value="<?php echo $row['objective'] ?>">
      </div>
      <div id="<?php printf($username);?>" class='form-group col-sm-6'>

      <label for='examplekpiid'>Sub Objective</label>
      <input type='text' name='sub_objective' class='form-control' id='examplekpidesc' aria-describedby='kpidesc' value="<?php echo $row['sub_objective'] ?>">
      </div>
      </div>
      <div class='row qant'>
      <div id="<?php printf($username);?>" class='form-group col-sm-6'>
      <label for="date">Start Date</label>
      <input type="date"  name="begin_date" class="form-control" id="date" value="<?php echo $row['begin_date'] ?>">
      </div>
      <div class='form-group col-sm-6'>
      <label for="date">Closer Date</label>
      <input type="date" name="due_date" class="form-control" id="date" value="<?php echo $row['due_date'] ?>">
      </div>
      </div>
      <?php
         if($role==3){
            
             ?> 
      <div id="<?php printf($username);?>" class='row update_all'>
      <div id="<?php printf($username);?>" class='form-group col-sm-6'>
      <label for='name'>Status</label>
      <select class='form-control' name='status' id='rating' required>
      <option value='Pending for Approval'>Pending for Approval</option>
      <option value='Pending for Approve'>Pending for Approve</option>
      </select>
      </div> 
      <div id="<?php printf($username); ?>" class='form-group col-sm-6'>
      <label for='name'><?php printf($username);?> Approval</label>
      <select class='form-control' name='approval' id='approval1'>
      <option value='Pending'>Pending</option>
      <option value='Approval'>Approval</option>
      <option value='Reject'>Reject</option>
      </select>
      </div>
      </div>
      <?php
         }
         ?>
      <!----for admin------>
      <?php
         if($role==2){
             ?>
      <div id="<?php printf($username);?>" class='row re'>
      <div id="<?php printf($username); ?>" class='form-group col-sm-6'>
      <label for='name'>Status</label>
      <select class='form-control' name='status' id='rating' required>
      <option value='Pending for Approval'>Pending for Approval</option>
      <option value='Pending for Approve'>Pending for Approve</option>
      </select>
      </div>
      <div id="<?php printf($username); ?>" class='form-group col-sm-6'>
      <label for='name'><?php printf($username);?> Approval</label>
      <select class='form-control' name='approval' id='approval'>
      <option value='Pending'>Pending</option>
      <option value='Approval'>Approval</option>
      <option value='Reject'>Reject</option>
      </select>
      </div>
      </div> 
      <?php
         }
         ?>
         <!-- <?php
       // break;  
         }
                 ?> -->
                 
      <div class='modal-footer'>
      <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Close</button>
      <button type='submit' name='update' class='btn btn-outline-secondary'> Save changes</button>
      </div>
      
      </form>
      
      </div>
      </div>
      </div>
      
      </tr>
     
     
      </tbody>
      <?php
         }
          ?>
      
      </table>
     
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