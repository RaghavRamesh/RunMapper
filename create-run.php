<html>
<head>
<title>Create Route</title>
</head>

<body>

<div><h2>Create Your Run</h2></div>

<?php
// define variables and set to empty values
$routeName = $startTime= $duration = $date = "";
$nameErr = $timeErr = $durationErr = $dateErr = "";
$nameFlag = $timeFlag = $durationFlag = $dateFlag = $formFlag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["route_name"]))
    	{$nameErr = "Route name is required";}
  	else
    	{$name = test_input($_POST["route_name"]); $nameFlag = true;}

	if (empty($_POST["start_time"]))
    	{$timeErr = "Start time is required";}
  	else
    	{$time = test_input($_POST["start_time"]); $timeFlag = true;}
	
	if (empty($_POST["duration"]))
    	{$durationErr = "Duration is required";}
  	else
    	{$duration = test_input($_POST["duration"]); $durationFlag = true;}
	
	if (empty($_POST["date"]))
    	{$dateErr = "Email is required";}
  	else
    	{$date = test_input($_POST["date"]); $dateFlag = true;}

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
	<label>Run Name: </label>
	<input type="text" name="route_name" placeholder="Enter Route Name"/>  <span class="error">* <?php echo $nameErr; ?></span> 
	<br/><br/>
	
	<label>Start Time: </label>
	<input type="time" name="start_time" /> <span class="error">* <?php echo $timeErr; ?></span> 
	<br/><br/>
	
	<label>Approximate Duration: </label>
	<input type="text" name="duration" /> minutes <span class="error">* <?php echo $durationErr; ?></span> 
	<br/><br/>
	
	<label>Date: </label>
	<input type="date" name="date" /> <span class="error">* <?php echo $dateErr; ?></span> 
	<br/><br/>
	
	<label>Elevation: </label>
	<label name="elevation">Elevation</label> 
	<br/><br/>

	<label>Calories: </label>
	<label name="calories">Calories</label> 
	<br/><br/>
	
	<label>Distance: </label>
	<label name="distance">Distance</label> 
	<br/><br/>
	
	<button type="submit">Create</button>
</form>
</div>


<?php 
// Create connection
$con = mysqli_connect("runmapperdb.db.10834469.hostedresource.com","runmapperdb","Devweekend#1","runmapperdb");

// Check connection
if (mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($nameFlag == true and $dateFlag == true and $durationFlag == true and $timeFlag == true) {
	$formFlag = true;
	echo "Created " .$_POST['route_name']. " successfully!"; 	
}

if ($formFlag == true) {
	mysqli_query($con, "INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin',35)");
}

mysqli_close($con);

?>

</body>
</html>