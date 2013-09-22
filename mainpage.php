<?php include("header.php"); 
// Create connection
$con = mysql_connect("runmapperdb.db.10834469.hostedresource.com", "runmapperdb", "Devweekend#1");
mysql_select_db("runmapperdb", $con);
?><hr>
<?php include("stats.php"); ?><br/>  
<?php include("searcharea.php"); ?><br/>
<h4 style="text-align:center;">Upcoming runs</h4><br>
<?php include("runfeed.php"); ?>
<?php include("footer.php") ?>
