<?php include("header.php"); 
// Create connection
$con = mysql_connect("runmapperdb.db.10834469.hostedresource.com", "runmapperdb", "Devweekend#1");
mysql_select_db("runmapperdb", $con);
?><hr>
<?php include("stats.php"); ?><br/> 
<h4 style="text-align:center;">Signed up runs</h4><br> 
<?php include("signedupruns.php"); ?>
<h4 style="text-align:center;">Created runs</h4><br> 
<?php include("createdruns.php"); ?>
<?php include("footer.php") ?>
