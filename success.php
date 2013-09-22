<?php include("header.php"); ?><hr>

<?php
		$routeID = $_GET['routeID'];
  		$creator=$_GET['creator'];
  		$starttime=$_GET['starttime'];
  		echo "You have successfully joined the run. Don't be late !";
 
$con = mysql_connect("runmapperdb.db.10834469.hostedresource.com", "runmapperdb", "Devweekend#1");
	mysql_select_db("runmapperdb", $con);	

$query = "INSERT INTO joinrun VALUES ($routeID, $creator, $starttime, 'president')";
  			mysql_query($query);
  				
 ?>
 
<?php include("footer.php") ?>
