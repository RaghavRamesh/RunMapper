<div class="box">
<div class="container" style="width:100%;">
<div class="row" style="text-align:center;">
	<div class="span2 headingtext">Total Distance</div>
	<div class="span2 headingtext">Total Duration</div>
	<div class="span2 headingtext">Number of Runs</div>
	<div class="span2 headingtext">Total Calories Burnt</div>
</div><div id="space"></div>
<div class="row" style="text-align:center;">
  	<div class="span2">
  	<?php
  	// $totalDistanceQuery = "SELECT SUM(route.DISTANCE) FROM route, run, user WHERE run.CREATOR = user.FBID AND run.routeID = route.routeID UNION SELECT SUM(route.DISTANCE) FROM route, joinrun, user WHERE joinrun.userID = user.FBID AND joinrun.routeID = route.routeID";
  	// $resultSet = mysql_query($totalDistanceQuery); 
  	?>
    15 km
  	</div>
  	
    <div class="span2">
    <?php 
    $totalDurationQuery = "";
    ?>
    6:25:00 hrs
    </div>
  	
    <div class="span2">
    <?php
    $totalRunsQuery = "";
    ?>
    12
    </div>

  	<div class="span2">
    <?php
    $totalCaloriesQuery = "";
    ?>
    1600
    </div>
</div>
</div>
</div>