<?php
   session_start();
   include("config/config.php");
   
   if(isset($_SESSION['userId'])){
    echo $_SESSION['userId'];
   
   
   $id=$_SESSION['userId'];
   
   $sql = "SELECT * FROM pms.user_role_mapping u inner join pms.user_type v on u.roleId=v.roleId WHERE userId=$id";
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
         .dashboard .sidebar-wrapper ul li.dashboard a{color:#16c7ff!important;}
         /* .wrapper {
  width: 400px;
  height: 400px;
  background: blue;
  margin: 10px auto;
  border-radius: 50%;
  overflow: hidden;
  position: relative;
  transform: rotate(108deg);
}

.wrapper .d1 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(0deg);
}
.wrapper .d1 div {
  width: 800px;
  height: 800px;
}
.wrapper .d1 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: blue;
  position: relative;
  transform: scaleX(-3.07768);
}
.wrapper .d1 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-108deg);
}
.wrapper .d2 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(147.6deg);
}
.wrapper .d2 div {
  width: 800px;
  height: 800px;
}
.wrapper .d2 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: #FCB03C;
  position: relative;
  transform: scaleX(0.82727);
}
.wrapper .d2 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-255.6deg);
}

.wrapper .d3 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(201.6deg);
}
.wrapper .d3 div {
  width: 800px;
  height: 800px;
}
.wrapper .d3 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: #6FB07F;
  position: relative;
  transform: scaleX(0.25676);
}
.wrapper .d3 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-309.6deg);
}
.wrapper .d2 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(147.6deg);
}
.wrapper .d2 div {
  width: 800px;
  height: 800px;
}
.wrapper .d2 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: #FCB03C;
  position: relative;
  transform: scaleX(0.82727);
}
.wrapper .d2 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-255.6deg);
}


.wrapper .d3 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(201.6deg);
}
.wrapper .d3 div {
  width: 800px;
  height: 800px;
}
.wrapper .d3 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: #6FB07F;
  position: relative;
  transform: scaleX(0.25676);
}
.wrapper .d3 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-309.6deg);
}
.wrapper .d4 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(228.6deg);
}
.wrapper .d4 div {
  width: 800px;
  height: 800px;
}
.wrapper .d4 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: #068587;
  position: relative;
  transform: scaleX(0.22353);
}
.wrapper .d4 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-336.6deg);
}
.wrapper .d5 {
  width: 800px;
  height: 800px;
  position: absolute;
  top: -200px;
  left: -200px;
  transform: rotate(246.6deg);
}
.wrapper .d5 div {
  width: 800px;
  height: 800px;
}
.wrapper .d5 div:after {
  content: '';
  width: 0;
  height: 0;
  display: block;
  border: solid transparent;
  border-width: 400px;
  border-top-color: red;
  position: relative;
  transform: scaleX(0.09453);
}
.wrapper .d5 div span {
  display: block;
  width: 100%;
  position: absolute;
  left: 0;
  top: 34%;
  font-size: 12px;
  text-align: center;
  z-index: 100;
  color: #fff;
  transform: rotate(-354.6deg);
} */
      </style>
   </head>
   <body class="dashboard">
      <div class="page-wrapper chiller-theme toggled">
      <?php include "includes/sidebar.php" ?>
         <!-- sidebar-wrapper  -->
         <main class="page-content">
            <div class="container-fluid tab-content">
            <div class="ople_prdct_dev tabcontent" id="empl">

               <div class="d-flex justify-content-between justify-content-center">
                  <h2 class="pb-4"> Dashboard </h2>
               </div> 

                <div class="row">
                   <div class="col-sm-5 border p-3">
                     <h3 class="pb-2">Work Status</h3>

                     <table class="table">
  <thead>
    <tr>
      <th scope="col">List of Goal</th>
      <th scope="col">List of KPI</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
    </tr>
   
  </tbody>
</table>

                      

                   </div>


                   <div class="col-sm-6 border ml-4 p-3">
                      <h3 class="pb-2">Your Performance</h3>
                      <!-- <div class="wrapper">
                        <div class="d1"><div><span>60%</span></div></div>
                        <div class="d2"><div><span>22%</span></div></div>
                        <div class="d3"><div><span>8%</span></div></div>
                        <div class="d4"><div><span>7%</span></div></div>
                        <div class="d5"><div><span>3%</span></div></div>
                      </div> -->
                      <canvas id="performance_chart" width="600" height="400"></canvas>

                   </div>

                </div>



               </div>
             
            </div>

         </main>
         <!-- page-content" -->
      </div>
      <!-- page-wrapper -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
         crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
         crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
         
         
         
         
          
         });
         
        var performance = document.getElementById("performance_chart");

        // Chart.defaults.global.defaultFontFamily = "Lato";
        // Chart.defaults.global.defaultFontSize = 18;

        var perfomanceData = {
          labels: [
              "Your Success",
              "Your Remaining Work",
              "Compleated Work",
              "Work in Progress ",
              "Off Track"
          ],
          datasets: [
            {
              data: [133.3, 86.2, 52.2, 51.2, 50.2],
              backgroundColor: [
                  "blue",
                  "#63FF84",
                  "green",
                  "#8463FF",
                  "red"
              ]
            }]
          };

          var pieChart = new Chart(performance, {
            type: 'pie',
            data: perfomanceData
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