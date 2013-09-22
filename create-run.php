<?php include("header.php"); ?>
<hr>
<div><h3>Create Your Run</h3></div><br>
<div class="container">
<div class="row">
<div class="span5">
<div id="map_canvas" style="height:400px;"></div>
<div id="pano1" style="height:400px;"></div>
</div>
<div class="span5">
<?php
// define variables and set to empty values
$routeName = $startTime= $duration = "";
$nameErr = $timeErr = $durationErr = $dateErr = "";
$nameFlag = $timeFlag = $durationFlag = $formFlag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["route_name"]))
    	{$nameErr = "Route name is required";}
  	else
    	{$routeName = test_input($_POST["route_name"]); $nameFlag = true;}

	if (empty($_POST["start_time"]))
    	{$timeErr = "Start time is required";}
  	else
    	{$startTime = test_input($_POST["start_time"]); $timeFlag = true;}
	
	if (empty($_POST["duration"]))
    	{$durationErr = "Duration is required";}
  	else
    	{$duration = test_input($_POST["duration"]); $durationFlag = true;}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>


<div>

<form action="<?php $_SERVER["PHP_SELF"];?>" method="POST"> 
	<label class="headingtext">Route Name: </label>
	<input type="text" name="route_name" placeholder="Enter Route Name"/>  <span class="error">* <?php echo $nameErr; ?></span> 
	<br/><br/>

	<label class="headingtext">Start date and time: </label>
	<input type="datetime" name="start_time" placeholder="yyyy-mm-ddThh:mm:ss"/> <span class="error">* <?php echo $timeErr; ?></span> 
	<br/><br/>
	
	<label class="headingtext">Approximate Duration: </label>
	<input type="text" name="duration" placeholder="in minutes" /> <span class="error">* <?php echo $durationErr; ?></span> 
	<br/><br/>
	
	<label class="headingtext">Address: </label>
	<!-- <label id="distance" name="distance">Distance</label>  -->
	<span id="address"></span>
	<br/><br/>

	<!-- <label id="distance" name="distance">Distance</label>  -->
	<span style="color:white;" id="url"></span>
	<br/><br/>
	
	<label class="headingtext">Distance: </label>
	<!-- <label id="distance" name="distance">Distance</label>  -->
	<span id="distance"></span>
	<br/><br/><br/>

	<!--<label>Elevation: </label>
	<!-- <label name="elevation">Elevation</label>  -->
<!--	<span id="elevation">5</span>
	<br/><br/>

	<label>Calories: </label>
	<!-- <label name="calories">Calories</label>  -->
<!--	<span id="calories">5</span>
	<br/><br/>-->
		
	<button class="btn btn-primary" type="submit">Create</button>
</form>

<button class="btn btn-success" name="submitRoute" id="submitRoute">Submit Route</button>
</div>
</div>
</div>
</div>

<?php 
// Create connection
$con = mysql_connect("runmapperdb.db.10834469.hostedresource.com", "runmapperdb", "Devweekend#1");
mysql_select_db("runmapperdb", $con);

// Check connection
// if (mysql_connect_errno($con)) {
// 	echo "Failed to connect to MySQL: " . mysql_connect_error();
// }

if ($nameFlag == true and $durationFlag == true and $timeFlag == true) {
	$formFlag = true;
	echo "Created " .$_POST['route_name']. " successfully!<br />"; 	
}

if ($formFlag == true) {

	$routeId = rand();

	// echo $startTime;
	// $newFormat = date_format($startTime, "Y/m/d H:i:s");
	// echo $newFormat;

	// $date = str_replace('-', '/', $date);
	// echo $date;
	// echo "   ".$startTime;


	// $hour = substr($startTime, 0, 2);
	// $min = substr($startTime, 3, 5);
	// $ampm = 'AM';
	// if ($hour > 12) {
	// 	$hour = $hour - 12;
	// 	$ampm = 'PM';
	// }
	// $newTime = $hour.':'.$min.':00';
	// $newFormat = $date." ".$newTime." ".$ampm;

	$location = "location";
	$distance = 1.0;
	$url = "a@a.com";
	
	$elevation = 10; // change after map
	$calories = 200; // change after map
	$creator = 'Raghav'; // change after fb login

	// Insert into Route
	$routeQuery = "INSERT INTO route VALUES ($routeId, '$routeName', '$location', $distance, $elevation, $calories, '$url')";
	mysql_query($routeQuery);
	
	// Insert into Run
	$runQuery = "INSERT INTO run VALUES ($routeId, '$creator', $startTime, $duration)";
	mysql_query($runQuery);
}

mysql_close($con);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.exp&libraries=geometry&sensor=false"></script>
<script src="routeCreate.js"></script>

<?php include("footer.php"); ?>
