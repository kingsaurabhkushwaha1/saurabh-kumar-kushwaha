<?php
   session_start();
   include("config/config.php");
   if(isset($_SESSION['userId'])){
    
      if(isset($_POST['userId'])){
         $idd=$_POST['userId'];
       }else{
         $idd=$_SESSION['userId'];
       }
   
    $idd=$_SESSION['userId'];
   
    $q="SELECT * FROM appraisal.user_master where email='$idd' or userId='$idd'";
   $result = $mysqli->query($q);
   if ($result->num_rows > 0) {        
    while ($row = $result->fetch_assoc()) {
       $id=$row['userId'];
       
      
   
     
   
   }
   }

   if(isset($_GET['kpi_id'])) {
       $Id=$_GET['kpi_id'];
      
   }
    
   
    if($_SERVER["REQUEST_METHOD"]=="POST"){
   
   
       $delay_date = $_POST['delay_date'];
       $reason=$_POST['reason'];
       $q="UPDATE appraisal.set_goal set delay_date='$delay_date',reason='$reason' where user_id='$id'";
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
    
      
                 $role = $row['roleId'];
   
             }
         
   }
   
   
   $goal_id=$_SESSION['userId'];
    $Id= $_GET['kpi_id'];
   
    
   
   
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
         body.achievement li.goal a{color:#16c7ff!important;}
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
            <h2>Update Your Achievement</h2>
            <button id="goal_btn" type="button" onclick="show()" class="btn btn-outline-secondary"> Achievement</button>
         </div>
         <form id="goal_form" class="bg-white border-radius p-3" style="display:none" action="achievement_recods.php" method="POST">
           
          <div class="row pb-1">
          <div class="form-group col-sm-6">
                <label for="eval">KPI</label> 
               <!-- <input type="text" name="sub_objective" class="form-control" id="targett"  value="" > -->
               <select type="option" name="kpi" class="form-control" name="kpi">
               <?php
                                 $q="SELECT * FROM appraisal.assign_kpi WHERE role_id=$id";
                                
                                 
                                 $run = mysqli_query($mysqli, $q);
                                 
                                 while($row = mysqli_fetch_array($run))
                                 {
                                 ?>
                              <option><?php  echo $row['assign_kpi']?></option>
                              <?php                        }
                                 ?>
               </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="eval">Target</label> 
               <!-- <input type="text" name="sub_objective" class="form-control" id="targett"  value="" > -->
               <select type="option" id ="targett" name="sub_objective" class="form-control" name="sub_objective">
               <?php
                                 $q="SELECT * FROM set_goal WHERE user_id=$id";
                                 
                                 $run = mysqli_query($mysqli, $q);
                                 
                                 while($row = mysqli_fetch_array($run))
                                 {
                                 ?>
                              <option><?php  echo $row['target']?></option>
                              <?php                        }
                                 ?>
                                  </select>
            </div>

          </div>
         
          <div class="row pb-1">
           
            <div class="form-group col-sm-6">
               <label for="eval">Achievement</label>
               <input type="text" name="achievement" class="form-control" id="achievement"  value="" >
            </div>
            <div class="form-group col-sm-6">
               <label for="exampleFormControlSelect1"> Priodicity</label>
               <select class="form-control" id="exampleFormControlSelect1" name='period'>
                  <option value="Yealy">Yealy</option>
                  <option value="Monthly">Monthly</option>
                  <option value="Quaterly">Quaterly</option>
               </select>
            </div>
           
        </div> 
            <div class="row">
           
              
                  <div class="form-group col-sm-6">
                     <label for="exampleFormControlSelect1"> Date</label>
                     <input type="date" name="date" class="form-control" id="exampleFormControlSelect1" value="">
                  </div>
                  <div class="form-group col-sm-6">
                     <label for="exampleFormControlSelect1">Achievement%</label>
                     <input type="" name="Achievement%" class="form-control" id="acheivement_percent" value="">
                  </div>
                  <!-- <div class="form-group col-sm-6">
                     <label for="exampleFormControlSelect1">Delay Date</label>
                     <input type="date" name="delay_date" class="form-control" id="exampleFormControlSel">
                     </div>
                     
                     <div class="form-group col-sm-6">
                     <label for="note">Reason</label>
                     <textarea  name="reason"  class="form-control"  cols="30" rows="3" placeholder="Please Mention Reason......"></textarea>
                     </div> -->
            </div>  
        
               <div class="col-sm-12 text-center">
                  <button type="submit" id="submit_btn" class="btn btn-secondary mt-2">Submit</button>
               </div>
         </form>
        </div>

         <table id="goal_table" class="table bg-white">
         <thead>
         <tr>
         <th scope="col" style="text-align:center">KPI</th>   
         <th scope="col" style="text-align:right">Target</th>
         <th scope="col" style="text-align:right">Achievement</th>
         <th scope="col"style="text-align:center"> Date</th>
         <th scope="col" style="text-align:right">Achievement %</th>
         <th scope="col" style="text-align:center">Manager Rating</th>
         </tr>
         </thead>
         <tbody>
         <?php
         if($role !=4){
          $q="SELECT * FROM achievement_recods where userId=$Id";}
           else{
             $q="SELECT * FROM achievement_recods where userId=$id";
             
           }
          
            
          
          
            $result = $mysqli->query($q);
            if ($result->num_rows > 0) {        
             while ($row = $result->fetch_assoc()) {
                
                
                ?>
         <tr>
         <td style="text-align:center"> <?php $assign_kpi=$row['assign_kpi'];
          echo $row['assign_kpi'];?> </td>   
         <td style="text-align:right"> <?php echo $row['target'];?>   </td> 
         <td style="text-align:right">  <?php echo $row['achievement'];?></td>
         <td style="text-align:center">  <?php echo $row['date'];?>   </td> 
         <td style="text-align:right"><?php echo $row['achievement_percent'];?>   </td>
        <?php
        $qq="SELECT * FROM assign_kpi where role_id=$Id and assign_kpi='$assign_kpi'";
         
         $resultt = $mysqli->query($qq);
          $c=0;
         
         if ($resultt->num_rows > 0) {
            
            $rot = $resultt->fetch_assoc() ;
            
         ?>
         
         <td style="text-align:center">  <?php echo $rot['Manager_rating'];?>   </td>
         <?php
         }
         ?> 
        
         <!-- <td> <button type="submit"  class="btn btn-outline-danger"> <a href="delete_setgoal.php?id=<?php  echo $row['id'];?> &  uid=<?php  echo $id;?>" >  Delete</button></a>  </td>       -->
         </tr>
         <?php
            }
            }
            ?>
         </tbody>
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
       
   </script>
   <script>
      let target=document.getElementById("targett");
      
      target.addEventListener('input',function(){
          var targett=this.value;
           console.log(targett);
          let achievement=document.getElementById("achievement");
          achievement.addEventListener('input',function(){
              var achievementt=this.value;
               console.log(achievementt);
             if(achievement.value == "" || achievement.value != null){
              let percent=achievementt/targett*100;
          //    let achev= Math.ceil(percent).toFixed(2)
          let achev= percent.toFixed(2);
              document.getElementById("acheivement_percent").value=achev;
             console.log(document.getElementById("acheivement_percent").value);
             }else{
              $("#acheivement_percent").val();
             console.log(document.getElementById("acheivement_percent").value);
      
      
             }
      
          });
              
              
          });
      
       
   </script>
</html>
<?php
   }
   
   
   ?>
