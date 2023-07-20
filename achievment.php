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
 // "$id";
 

    if($_SERVER["REQUEST_METHOD"]=="POST"){
   

       $delay_date = $_POST['delay_date'];
       $achievement=$_POST['Achievement'];
       $reason=$_POST['reason'];
       $q="UPDATE appraisal.set_goal set delay_date='$delay_date',reason='$reason',achievement=' $achievement' where user_id='$id'";
       $run=mysqli_query($mysqli,$q);
        if($run==TRUE){
            
         header("location:achievment.php");
            

        }
     
    }

  
   
   
 

   
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
         body.achievement li.goal a{color:#16c7ff!important}
      </style>
   </head>
   <body class="achievement" >
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
                     <h2 id="iddid">Update Your Achievement</h2>

                     <button id="goal_btn" type="button" onclick="hide_viewgoal()" class="btn btn-outline-secondary">Achievement</button>

                  </div>
                 
                  

                  <form id="goal_form" style="display:none" action="" method="POST">
               
                 <div class="bg-white p-3 border-radius">

                    <h2 id="iddid">Update Your Achievement</h2>
                  
                    <?php
                    $q="SELECT * FROM appraisal.set_goal where user_id=$id";
                    $run = mysqli_query($mysqli, $q);
                    while($row = mysqli_fetch_array($run))
                    {
                      ?>
                      <?php } ?>

                    <div class="row pb-1"> 
                      <div class="form-group col-sm-6">
                        <label for="eval">Kpi</label>
                        <select type="option" name="objective" class="form-control" id="kpiselect">
                          <option>Team Management</option>
                          <option>Implementation of user Story</option>
                          <option>PMS</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="eval">Sub Objective</label>
                        <input type="text" name="sub_objective" class="form-control" id="deptt"  value="<?php  echo $row['sub_objective'];?>" >
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="eval">Achievement Till Today</label>
                        <input type="text" name="Achievement" class="form-control" id="deptt"  value="<?php  echo $row['Achievement'];?>" >
                      </div>
                    </div>
                    
                       

                    <div class="row pb-1">
                      <div class="form-group col-sm-6">
                        <label for="exampleFormControlSelect1">Start Date</label>
                        <input type="date" name="date" class="form-control" id="exampleFormControlSelect1" value="<?php echo $row['begin_date'];?>">
                      </div>    
                      <div class="form-group col-sm-6">
                        <label for="exampleFormControlSelect1">Closer Date</label>
                        <input type="date" name="target_quantity" class="form-control" id="exampleFormControlSel" value=<?php echo $row['due_date'];?>>
                      </div> 
                      <div class="form-group col-sm-6">
                        <label for="exampleFormControlSelect1">Delay Date</label>
                        <input type="date" name="delay_date" class="form-control" id="exampleFormControlSel">
                      </div>
                      
                      <div class="form-group col-sm-6">
                        <label for="note">Reason</label>
                        <textarea  name="reason"  class="form-control"  cols="30" rows="3" placeholder="Please Mention Reason......"></textarea>
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
      <th scope="col">Kpi</th>
      
      <th scope="col">Start Date</th>
      <th scope="col">Closer Date</th>
      
      <th scope="col">Delay Date</th>
      <th scope="col">Review</th>
       
      <th scope="col">Reason</th>
     
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
   
    
      
      <td>  <?php  echo $row['objective']?>  </td> 
       <td> <?php  echo $row['begin_date']?> </td>
      <td>  <?php  echo $row['due_date']?> </td>
      <td> <?php  echo $row['delay_date']?> </td>
      <td> <?php ?> </td>
      <td> <?php  echo $row['reason']?> </td>
      
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

