<form action="" method="POST">
Username : <input type="text" name="user"><br>
Password: <input type="password" name="pwd">
<button type="submit">Go</button>
</form>
<?php
 session_destroy();
$user;
$pwd;
$result;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname = $_POST['user'];
	$pword = $_POST['pwd'];
	// Create connection
	$con = mysql_connect("runmapperdb.db.10834469.hostedresource.com", "runmapperdb", "Devweekend#1");
	mysql_select_db("runmapperdb", $con);
	$query="SELECT password FROM user WHERE fbID = '$uname' AND password = '$pword'";
	echo $query;
	$result = mysql_query($query);
	echo $result;
	$password = mysql_fetch_array($result);
	$pwd_disp= $password['password']; 
}
if(strlen($pwd_disp)>1)
{
	header('Location:www.asiaoffshore.shekbagg.com/mainpage.php');	
}
?>