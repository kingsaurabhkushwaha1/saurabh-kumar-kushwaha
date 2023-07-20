<?php
    session_start();
    include 'config/config.php';
    
    if ( isset( $_SESSION[ 'userId' ] ) ) {
    
        // $now = time();
        // if ( time() - $_SESSION[ 'start' ] > 1000 ) {
        //     session_unset();
        //     session_destroy();
        //     die;
        //     header( 'location:login.php' );
        // }
        // $id = $_SESSION[ 'userId' ];
        $idd=$_SESSION['userId'];
  
   $q="SELECT * FROM appraisal.user_master where email='$idd' or userId='$idd'";
   $result = $mysqli->query($q);
  if ($result->num_rows > 0) {        
    while ($row = $result->fetch_assoc()) {
       $id=$row['userId'];
          
        }}
    }
        $sql = "SELECT * FROM appraisal.user_role_mapping u inner join appraisal.user_type v on u.roleId=v.roleId WHERE userId=$id";
        $result = $mysqli->query( $sql );
        if ( $result->num_rows > 0 ) {
            while ( $row = $result->fetch_assoc() ) {
                $username = $row[ 'roleName' ];
                // $password  = $row[ 'password' ];
                // $email = $row[ 'email' ];
                // $role = $row[ 'role' ];
                // $id = $row[ 'id' ];
                // printf( $username );
                $role = $row[ 'roleId' ];
                //printf( $role );
            }
    
       
        
        
        
    
        $sq = "SELECT department_name from appraisal.user_master u inner join appraisal.department d on u.department_id=d.department_id
        where u.userId= $id";
        $re = $mysqli->query( $sq );
        if ( $re->num_rows > 0 ) {
            while ( $r = $re->fetch_assoc() ) {
          $department = $r[ 'department_name'];
            }
        }
        
    }
        ?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <title>PMS Dashboard</title>
        <meta charset = 'UTF-8'>
        <?php include 'includes/library.php'?>
        <style>
            .modal-body{max-height:400px; overflow-y:auto; overflow-x:hidden;}
        </style>
    </head>
    <body class = 'kpi'>
        <div class = 'page-wrapper chiller-theme toggled'>
            <?php include 'includes/sidebar.php'?>
            <main class = 'page-content'>
                <div class = 'container-fluid tab-content'>


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

                    
                    <div class = 'people_prdct_dev tabcontent p-3 mt-3'  id = 'tab5'>
                        <h2 class = 'pb-4'> Key Performance Indicator</h2>
                        <div class = 'table-responsive'>
                            <table class = 'table pt-3 bg-white' id = <?php printf( $username );
                                ?>>
                                <thead>
                                    <tr>
                                        <?php
                                    if(isset($_GET['kpi_id'])){
                                        ?>
                                        <th scope = 'col' style="text-align:center">KPI</th>
                                        
                                        
                                        <th scope = 'col' >Manager Rating</th>
                                        <th class = 'emp' >Manager Feedback</th>
                                        <th scope = 'col' >HOD Rating</th>
                                        <th scope = 'col'>HOD Approval</th>
                                        <?php
                                        
        if ( $role != 4){
            ?>
                                        <th scope = 'col'>Manage KPI</th>
                                        <?php
        }?> 
                                    
                               <?php
                                }
                               
                                else{
                                    
                                    ?>
                                        <!-- <th scope = 'col'>  KPI ID </th> -->
                                        <th scope = 'col' style="text-align:center">KPI</th>
                                        <th scope = 'col'>Description</th>
                                        <!-- <th scope = 'col'>User Id</th> -->
                                        <!-- <th scope = 'col' style="text-align:center">Description</th> -->
                                        <th scope = 'col'>Target( Y/N )</th>
                                        <!-- <th scope = 'col'>Achievement</th> -->
                                        <!-- <th scope = 'col' >Quantity</th>
                                            <th scope = 'col' >Meet Quantity</th> -->
                                        <th scope = 'col'>Applicable For Category</th>
                                        <!-- <th scope = 'col'>Created By</th> -->
                                        <th scope = 'col' >Capture Frequency</th>
                                        <th scope = 'col' >Review Frequency</th>
                                
                                        <th scope = 'col' >Manager Rating</th>
                                        <th class = 'emp' >Manager Feedback</th>
                                        <th scope = 'col' >HOD Rating</th>
                                        <th scope = 'col'>HOD Approval</th>
                                        <th scope = 'col'>Manage KPI</th>
                                        <?php
                                }
                                ?>
                                    </tr>
                                </thead>
                                <?php
                                if(isset($_GET['kpi_id'])){
                                    $roleId=$_GET['kpi_id'];
                                    $q="SELECT * FROM assign_kpi where role_id = $roleId";

                                }
                                else{
          
                                    if ( $role == 1 ) {
                                        $q = 'SELECT * FROM kpi ';
                                    } elseif ( $role == 3 ) {
                                        
                                        //$q = "SELECT * FROM appraisal.kpi k INNER JOIN appraisal.user_master u on k.userId=u.userId WHERE u.Supervisor=$id";
                                     $q="SELECT * FROM appraisal.kpi where category='$department'";
                                
                                    } elseif ( $role == 2) {
                                        //$q = "SELECT * FROM appraisal.kpi k INNER JOIN appraisal.user_master u on k.userId=u.userId WHERE u.HOD=$id";
                                        $q="SELECT * FROM appraisal.kpi where category='$department'";
                                    } else {
                                        $q = "SELECT * FROM appraisal.kpi where userId=$id";
                                    }
                                }
                                    
                                    $run = mysqli_query( $mysqli, $q );
                                    
                                    while ( $row = mysqli_fetch_array( $run ) ) {
                                    
                                        // $_session[ 'kpi_id' ] = $row[ 'kpi_id' ];

                                        ?>
                                <tbody>
                              <?php  if(isset($_GET['kpi_id'])){

                                 

                                ?>


                               

<tr>
<td scope = 'col'><?php echo $row[ 'assign_kpi' ] ?></td>
<td scope = 'col'><?php echo $row[ 'Manager_rating' ] ?></td>


<td scope = 'col' ><?php echo $row[ 'Manager_feedback' ] ?></td>
<td scope = 'col' ><?php echo $row[ 'Hod_rating' ] ?></td>
<td scope = 'col' ><?php echo $row[ 'Hod_approval' ] ?></td>
<?php $new= $row[ 'id' ] ?>

<!-- <td scope = 'col'> -->
<?php
        if ( $role !=4  ) {
            ?>
    <button type = 'button' class = 'btn btn-outline-secondary' data-toggle = 'modal' data-target = "#Modalupdate<?php echo $row[ 'id' ] ?>">Update</button>
    <?php
    }
    ?>
    <!-- <button type = 'button' class = 'btn btn-outline-danger' data-toggle = 'modal' data-target = '#Modaldelete'>Delete</button>  -->
    <?php
        if ( $role == 1 && !isset($_GET['kpi_id']) ) {
            ?>
    <button type = 'button' class = 'btn btn-outline-danger'> <a href = "delete.php?id=<?php echo $row['kpi_id']; ?> &  uid=<?php echo $id; ?> "class = 'text-red'>delete</a> </button>
</td>
<?php

    }
}
    

                               else
                               { ?>
                                

                                    <tr id = "tr<?php echo $row['kpi_id'] ?>">
                                        <!-- <td scope = 'col'><?php $old= $row[ 'kpi_id' ] ?></td> -->
                                        <td scope = 'col'><?php echo $row[ 'name_of_kpi' ] ?></td>
                                        <!-- <td scope = 'col'><?php echo $row[ 'userId' ] ?></td> -->
                                        <td scope = 'col'><?php echo $row[ 'description_of_kpi' ] ?></td>
                                        <td scope = 'col'><?php echo $row[ 'target' ] ?></td>
                                        <!-- <td scope = 'col'><?php echo $row[ 'achievement' ] ?></td> -->
                                        <!-- <td scope = 'col'><?php echo $row[ 'Quantity' ] ?></td>
                                            <td scope = 'col' ><?php echo $row[ 'Quantity_meet' ] ?></td> -->
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'category' ] ?></td>
                                        <!-- <td scope = 'col' class = 'emp'><?php echo $row[ 'created_by' ] ?></td> -->
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'capture_frequency' ] ?></td>
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'review_frequency' ] ?></td>
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'Manager_rating' ] ?></td>
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'Manager_feedback' ] ?></td>
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'Hod_rating' ] ?></td>
                                        <td scope = 'col' class = 'emp'><?php echo $row[ 'Hod_Approval' ] ?></td>
                                       
                                        <td scope = 'col'>
                                            <button type = 'button' class = 'btn btn-outline-secondary' data-toggle = 'modal' data-target = "#Modalupdate<?php echo $row['kpi_id'] ?>">Update</button>
                                            <!-- <button type = 'button' class = 'btn btn-outline-danger' data-toggle = 'modal' data-target = '#Modaldelete'>Delete</button>  -->
                                            <?php
                                                if ( $role == 1 ) {
                                                    ?>
                                            <button type = 'button' class = 'btn btn-outline-danger'> <a href = "delete.php?id=<?php echo $row['kpi_id']; ?> &  uid=<?php echo $id; ?> "class = 'text-red'>delete</a> </button>
                                        </td>
                                        <?php
                                            } }
                                            ?>
                                        <?php  if(isset($_GET['kpi_id'])){
                                            $count=$new;}
                                            else{
                                                $count=$old;
                                            }

                                            ?>
                                        <div class = 'modal fade' id = "Modalupdate<?php echo $count ?>" tabindex = '-1' role = 'dialog' aria-labelledby = 'Modalupdate' aria-hidden = 'true'>
                                            <div id = <?php printf( $username );
                                                ?> class = 'modal-dialog' role = 'document'>
                                                <div class = 'modal-content'>
                                                    <div class = 'modal-header'>
                                                        <h5 class = 'modal-title' id = 'exampleModalLabel'>Update KPI Detail</h5>
                                                        <button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'>
                                                           
                                                        </button>
                                                    </div>
                                                    <div class = 'modal-body'>
                                                    <?php  if(!isset($_GET['kpi_id'])){
                                                        ?>
                                                        <form action = "update.php?id=<?php echo $row['kpi_id'] ?>" method = 'POST'>
                                                            <div class = 'row'>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'examplekpiid'>KPI ID</label>
                                                                    <input type = 'text' name = 'kpi_id' class = 'form-control' id = 'examplekpiid' aria-describedby = 'kpiid'  value = "<?php echo $row['kpi_id'] ?>">
                                                                </div>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'name'> KPI</label>
                                                                    <input type = 'text' name = 'name_of_kpi' class = 'form-control' id = 'name' aria-describedby = 'kpiname' value = "<?php echo $row['name_of_kpi'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class = 'row qant'>
                                                                <div id = <?php printf( $username );
                                                                    ?> class = 'form-group col-sm-6'>
                                                                    <label for = 'examplekpiid'>Quantity</label>
                                                                    <input type = 'text'  name = 'quantity'class = 'form-control' id = 'examplekpidesc' aria-describedby = 'kpidesc' value = <?php echo $row[ 'Quantity' ] ?>>
                                                                </div>
                                                                <div id = <?php printf( $username );
                                                                    ?> class = 'form-group col-sm-6'>
                                                                    <label for = 'name'>Quantity Meet</label>
                                                                    <input type = 'text' name = 'quantity_meet'class = 'form-control' id = 'examplekpidesc' aria-describedby = 'kpidesc' value = <?php echo $row[ 'Quantity_meet' ] ?>>
                                                                </div>
                                                            </div>
                                                            <div class = 'row'>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'examplekpiid'>Description</label>
                                                                    <input type = 'desc'  name = 'description_of_kpi'class = 'form-control' id = 'examplekpidesc' aria-describedby = 'kpidesc' value ="<?php echo $row[ 'description_of_kpi' ] ?>">
                                                                </div>
                                                                <div id = <?php printf( $username );
                                                                    ?> class = 'form-group col-sm-6 target'>
                                                                    <label for = 'name'>Target</label>
                                                                    <select class = 'form-control' name = 'tarapproval' id = 'tarapproval'>
                                                                        <option value = 'Yes'>Yes</option>
                                                                        <option value = 'No'>No</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class = 'row'>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'name'>Applicable For Department</label>
                                                                    <input type = 'text' name = 'department'class = 'form-control' id = 'examplekpidesc' aria-describedby = 'kpidesc' value = <?php echo $row[ 'category' ] ?>>
                                                                </div>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'examplekpiid'>Created By</label>
                                                                    <input type = 'created by' name = 'created_by' class = 'form-control' id = 'createdby' aria-describedby = 'createdby' value = <?php echo $row[ 'created_by' ] ?>>
                                                                </div>
                                                            </div>
                                                            <div class = 'row'>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'capture'>Capture Frequency</label>
                                                                    <select name = 'capture_frequency' class = 'form-control' id = 'capture'>
                                                                        <option>Monthly</option>
                                                                        <option>Quaterlly</option>
                                                                        <option>Yearlly</option>
                                                                    </select>
                                                                </div>
                                                                <div class = 'form-group col-sm-6'>
                                                                    <label for = 'review'>Review Frequency</label>
                                                                    <select name = 'review_frequency' class = 'form-control' id = 'review'>
                                                                        <option>Monthly</option>
                                                                        <option>Quaterlly</option>
                                                                        <option>Yearlly</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div id = <?php printf( $username );
                                                                ?> class = 'row update_all'>
                                                                <div id = <?php printf( $username );
                                                                    ?> class = 'form-group col-sm-6 rating'>
                                                                    <label for = 'rating'><?php printf( $username );
                                                                        ?>  Rating</label>
                                                                    <select class = 'form-control' name = 'rating' id = 'rating' required>
                                                                        <option  value = 'pending'>Pending</option>
                                                                        <option  value = 'Above expectaton'>Above expectations</option>
                                                                        <option  value = 'Meet expectation'>Meet expectation</option>
                                                                        <option  value = 'Below expectation'>Below expectation</option>
                                                                        <option  value = 'Meet expectation'>Not met expectation</option>
                                                                    </select>
                                                                </div>
                                                                <div id = <?php printf( $username );
                                                                    ?> class = 'form-group col-sm-6 feedback'>
                                                                    <label for = 'name'><?php printf( $username );
                                                                        ?>  Feedback</label>
                                                                    <input type = 'text' name = 'feedback' class = 'form-control' id = 'createdby' aria-describedby = 'createdby' value = <?php echo $row[ 'Manager_feedback' ] ?>>
                                                                </div>
                                                                <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                    <label for = 'name'><?php printf( $username );
                                                                        ?>  Approval</label>
                                                                    <select class = 'form-control' name = 'approval' id = 'approval'>
                                                                        <option value = 'Pending'>Pending</option>
                                                                        <option value = 'Approval'>Approval</option>
                                                                        <option value = 'Reject'>Reject</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!----for admin------>
                                                            
                                                             <div id = <?php printf( $username );
                                                                ?> class = 'row rem'>
                                                              
                                                               
                                                                <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                    <label for = 'name'>HOD Rating</label>
                                                                    <select class = 'form-control' name = 'hod_rating' id = 'rating' required>
                                                                        <option  value = 'pending'>Pending</option>
                                                                        <option  value = 'Above expectaton'>Above expectations</option>
                                                                        <option  value = 'Meet expectation'>Meet expectation</option>
                                                                        <option  value = 'Below expectation'>Below expectation</option>
                                                                        <option  value = 'Meet expectation'>Not met expectation</option>
                                                                    </select>
                                                                </div>
                                                                <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                    <label for = 'name'>HOD Approval</label>
                                                                    <select class = 'form-control' name = 'hod_approval' id = 'approval'>
                                                                        <option value = 'Pending'>Pending</option>
                                                                        <option value = 'Approval'>Approval</option>
                                                                        <option value = 'Reject'>Reject</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class = 'row achiev'>
                                                                
                                                            </div>
                                                    </div>
                                                    <div class = 'modal-footer'>
                                                    <button type = 'button' class = 'btn btn-outline-secondary' data-dismiss = 'modal'>Close</button>
                                                    <button type = 'submit' name = 'update' class = 'btn btn-outline-secondary'> Save changes</button>
                                                    </form>
                                                    <?php
                                                    }
                                                    else{
                                                        
                                                        ?>
                                                        <form action = "approve_kpi.php?id=<?php echo $new; ?> && idd=<?php echo  trim($_GET['kpi_id']); ?>" method = 'POST'>
                                                        <div class = 'row'>
                                                            <div class = 'form-group col-sm-6'>
                                                                <label for = 'examplekpiid'>KPI</label>
                                                                <input type = 'text' name = 'kpi' class = 'form-control' id = 'examplekpiid' aria-describedby = 'kpiid'  value = "<?php echo $row['assign_kpi'] ;?>">
                                                            </div>
                                                             <!-- <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                    <label for = 'name'>HOD Rating</label>
                                                                    <select class = 'form-control' name = 'hod_rating' id = 'rating' required>
                                                                        <option  value = 'pending'>Pending</option>
                                                                        <option  value = 'Above expectaton'>Above expectations</option>
                                                                        <option  value = 'Meet expectation'>Meet expectation</option>
                                                                        <option  value = 'Below expectation'>Below expectation</option>
                                                                        <option  value = 'Meet expectation'>Not met expectation</option>
                                                                    </select>
                                                                </div>
                                                                <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                    <label for = 'name'>HOD Approval</label>
                                                                    <select class = 'form-control' name = 'hod_approval' id = 'approval'>
                                                                        <option value = 'Pending'>Pending</option>
                                                                        <option value = 'Approval'>Approval</option>
                                                                        <option value = 'Reject'>Reject</option>
                                                                    </select>
                                                                </div> -->
                                                            </div>
                                               
                                                        
                                                        <!----for all------>
                                                        <?php  if(!isset($_GET['kpi_id'])){
                                                            echo "hi";
                                                            
                                                        ?>
                                                        
                                                        <div id = <?php printf( $username );
                                                            ?> class = 'row update_all'>
                                                            <div id = <?php printf( $username );
                                                                ?> class = 'form-group col-sm-6 rating'>
                                                                <label for = 'rating'><?php printf( $username );
                                                                    ?>  Rating</label>
                                                                <select class = 'form-control' name = 'rating' id = 'rating' required>
                                                                    <option  value = 'pending'>Pending</option>
                                                                    <option  value = 'Above expectaton'>Above expectations</option>
                                                                    <option  value = 'Meet expectation'>Meet expectation</option>
                                                                    <option  value = 'Below expectation'>Below expectation</option>
                                                                    <option  value = 'Meet expectation'>Not met expectation</option>
                                                                </select>
                                                        
                                                            </div>
                                                            <div id = <?php printf( $username );
                                                                ?> class = 'form-group col-sm-6 feedback'>
                                                                <label for = 'name'><?php printf( $username );
                                                                    ?>  Feedback</label>
                                                                <input type = 'text' name = 'feedback' class = 'form-control' id = 'createdby' aria-describedby = 'createdby' value = <?php echo $row[ 'Manager_feedback' ] ?>>
                                                            </div>
                                                            <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                <label for = 'name'><?php printf( $username );
                                                                    ?>  Approval</label>
                                                                <select class = 'form-control' name = 'approval' id = 'approval'>
                                                                    <option value = 'Pending'>Pending</option>
                                                                    <option value = 'Approval'>Approval</option>
                                                                    <option value = 'Reject'>Reject</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class = 'modal-footer'>
                                                    <button type = 'button' class = 'btn btn-outline-secondary' data-dismiss = 'modal'>Close</button>
                                                    <button type = 'submit' name = 'update' class = 'btn btn-outline-secondary'> Save changes</button>
                                                            
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!----for admin------>
                                                        <?php
                                                       if($role==3){
                                                            ?> 
                                                        <div id = <?php printf( $username );
                                                            ?> class = 'row rem'>
                                                            <div id = <?php printf( $username );
                                                                ?> class = 'form-group col-sm-6 rating'>
                                                              `  <div>
                                                                <label for = 'rating'>Manager Rating</label>
                                                                <select class = 'form-control' name = 'manager_rating' id = 'rating' placeholder = <?php echo $row[ 'Manager_rating' ] ?> required>
                                                                    <option  value = 'pending'>Pending</option>
                                                                    <option  value = 'Above expectaton'>Above expectations</option>
                                                                    <option  value = 'Meet expectation'>Meet expectation</option>
                                                                    <option  value = 'Below expectation'>Below expectation</option>
                                                                    <option  value = 'Meet expectation'>Not met expectation</option>
                                                                </select>
                                                                </div>`
                                                    
                                                            </div>
                                                            <div id = <?php printf( $username );
                                                                ?> class = 'form-group col-sm-6 feedback'>
                                                                <label for = 'rating'>Manager Feedback</label>
                                                                <select class = 'form-control' name = 'manager_feedback' id = 'feedback' placeholder = <?php echo $row[ 'Manager_feedback' ] ?> required>
                                                                    <option  value = 'pending'>Pending</option>
                                                                    <option  value = 'Above expectaton'>Above expectations</option>
                                                                    <option  value = 'Meet expectation'>Meet expectation</option>
                                                                    <option  value = 'Below expectation'>Below expectation</option>
                                                                    <option  value = 'Meet expectation'>Not met expectation</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <?php
                                                          }
                                                        ?> 
                                                         <?php
                                                       if($role==2){
                                                        ?>
                                                        <div id = <?php printf( $username );
                                                            ?> class = 'row rem'>   
                                                            <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                <label for = 'name'>HOD Rating</label>
                                                                <select class = 'form-control' name = 'hod_rating' id = 'rating' required>
                                                                    <option  value = 'pending'>Pending</option>
                                                                    <option  value = 'Above expectaton'>Above expectations</option>
                                                                    <option  value = 'Meet expectation'>Meet expectation</option>
                                                                    <option  value = 'Below expectation'>Below expectation</option>
                                                                    <option  value = 'Meet expectation'>Not met expectation</option>
                                                                </select>
                                                            </div>
                                                            <div id = "<?php printf($username);?>" class = 'form-group col-sm-6 approval'>
                                                                <label for = 'name'>HOD Approval</label>
                                                                <select class = 'form-control' name = 'hod_approval' id = 'approval'>
                                                                    <option value = 'Pending'>Pending</option>
                                                                    <option value = 'Approval'>Approval</option>
                                                                    <option value = 'Reject'>Reject</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php
                                                          }
                                                        ?> 
                                                    
                                                       
                                                       
                                                </div>
                                                <!-- <div class = 'modal-footer'>
                                                <button type = 'button' class = 'btn btn-outline-secondary' data-dismiss = 'modal'>Close</button>
                                                <button type = 'submit' name = 'update' class = 'btn btn-outline-secondary'> Save changes</button> -->
                                                </form>
                                                <?php
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                            ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php  if(!isset($_GET['kpi_id'])){ ?>
                        <button type = 'button' class = 'btn btn-outline-secondary mb-4 add_kpi' data-toggle = 'modal' id = <?php printf( $username );
                            ?> data-target = '#Modaladd' >Add KPI Detail</button>
                            <?php
                        }?>
                        <div class = 'modal fade' id = 'Modaladd' tabindex = '-1' role = 'dialog' aria-labelledby = 'Modaladd' aria-hidden = 'true'>
                            <div class = 'modal-dialog' role = 'document'>
                                <div class = 'modal-content'>
                                    <div class = 'modal-header'>
                                        <h5 class = 'modal-title' id = 'exampleModalLabel'>Add KPI Detail</h5>
                                        <button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'>
                                        <span aria-hidden = 'true'>&times;
                                        </span>
                                        </button>
                                    </div>
                                    <div class = 'modal-body'>
                                        <form action = "admin_addKpi.php?id=<?php echo $id; ?>" method = 'POST'>
                                           
                                            <div class = 'row'>
                                                
                                                <div class = 'form-group col-sm-6'>
                                                    <label for = 'name'>Name of KPI</label>
                                                    <input type = 'name' class = 'form-control' id = 'name' aria-describedby = 'kpiname' placeholder = 'Name of KPI' name = 'name_Of_kpi'>
                                                </div>
                                            </div>
                                            <div class = 'row'>
                                                <div class = 'form-group col-sm-6'>
                                                    <label for = 'examplekpiid'>Description of KPI</label>
                                                    <input type = 'desc' class = 'form-control' id = 'examplekpidesc' aria-describedby = 'kpidesc' placeholder = 'description of KPI' name = 'description_of_kpi'>
                                                </div>
                                                <div class = 'form-group col-sm-6'>
                                                    <label for = '' >target</label>
                                                    <select class = 'form-control' id = 'exampleFormControlSelect1' name = 'target' >
                                                        <option value = 'NO'>No</option>
                                                        <option value = 'Yes'>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class = 'row'>
                                                <div class = 'form-group col-sm-6'>
                                                    <label for = 'name'>Applicable For Department</label>
                                                    <!-- <input type = 'text' class = 'form-control' id = 'catagory'  placeholder = 'catagry' name = 'catagory'> -->
                                                    <select class = 'form-control' name = 'catagory' id = 'exampleFormControlSelect1'>
                                                        
                                                        <?php
                                 $q="SELECT * FROM department WHERE department_id";
                                 
                                 $run = mysqli_query($mysqli, $q);
                                 
                                 while($row = mysqli_fetch_array($run))
                                 {
                                 ?>
                              <option><?php  echo $row['department_name']?></option>
                              <?php                        }
                                 ?>
                                                    </select>
                                                </div>
                                                <div class = 'form-group col-sm-6'>
                                                    <label for = 'examplekpiid'>Quantity</label>
                                                    <input type = 'text'  class = 'form-control' id = 'examplekpidesc' aria-describedby = 'kpidesc' placeholder = '' name = 'quantity'>
                                                </div>
                                               
                                            </div>
                                            <div class = 'modal-footer'>
                                                <button type = 'button' class = 'btn btn-outline-secondary' data-dismiss = 'modal'>Close</button>
                                                <button type = 'submit'  class = 'btn btn-outline-secondary'>Add Detail</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class = 'modal fade' id = 'Modaldelete' tabindex = '-1' role = 'dialog' aria-labelledby = 'Modaldelete' aria-hidden = 'true'>
                                <div class = 'modal-dialog' role = 'document'>
                                    <div class = 'modal-content'>
                                        <div class = 'modal-header'>
                                            <h5 class = 'modal-title' id = 'exampleModalLabel'>Delete KPI Detail</h5>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal' aria-label = 'Close'>
                                            <span aria-hidden = 'true'>&times;
                                            </span>
                                            </button>
                                        </div>
                                       
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
    </body>
</html>
<?php 
 
?>