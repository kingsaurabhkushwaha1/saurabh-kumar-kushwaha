


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
   <!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript">
	window.onload = function () {

      var dps = [{x: 1, y: 10}, {x: 2, y: 13}, {x: 3, y: 18}, {x: 4, y: 20}, {x: 5, y: 17},{x: 6, y: 10}, {x: 7, y: 13}, {x: 8, y: 18}, {x: 9, y: 20}, {x: 10, y: 17}];   //dataPoints. 

      var chart = new CanvasJS.Chart("chartContainer",{
      	title :{
      		text: "Live Employee performance"
      	},
      	axisX: {						
      		title: "WORK"
      	},
      	axisY: {						
      		title: "At time"
      	},
      	data: [{
      		type: "line",
      		dataPoints : dps
      	}]
      });

      chart.render();
      var xVal = dps.length + 1;
      var yVal = 15;	
      var updateInterval = 1000;

      var updateChart = function () {
      	
      	
      	yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
      	dps.push({x: xVal,y: yVal});
      	
      	xVal++;
      	if (dps.length > 10 )
      	{
      		dps.shift();				
      	}

      	chart.render();		

	// update chart after specified time. 

};

setInterval(function(){updateChart()} , updateInterval); 
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
	<div id="chartContainer" style="height: 600px; width: 100%;">
	</div> 
   
</body>
</html>
<?php
   }
   else{
     header("location:login.php");
     echo "login first";
   }
   ?>