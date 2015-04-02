<html>
	<style>
		body {
			background-color: #d3d3d3;
			font-family: "Ubuntu", sans-serif;
			color: purple;
		}
	</style>
<?php
$user = htmlspecialchars($_POST['user']);
$pass = htmlspecialchars($_POST['pass']);

if(!$user) {
	echo "You must enter a username.<br> <a href=\"login.html\">Return</a>";
}else if(!$pass) {
	echo "You must enter a password <br> <a href=\"login.html\">Return</a>";
} else {

	$hostname = 'localhost';
	$dbuser = 'root';
	$dbpass = 'l33th4XX';
	$db = 'tapster';
	$table = 'tap_users';
	$name = 'name';
	$pw = 'password';
	
	$dbhandle = MYSQL_CONNECT($hostname, $dbuser, $dbpass)or die("Unable to connect to mysql");
	$selected = mysql_select_db($db, $dbhandle)or die("Unable to connect to database");

	$query = "select ".$name.", ".$pw." from ".$table." where name=\"".$user."\"";
	$return = mysql_query($query);

	$row = mysql_fetch_array($return);
	$vuser = $row{'name'};
	$vpass = $row{'password'};

	if(!($user == $vuser)) { 
		echo "User not found! (login is case sensitive) <br> <a href=\"login.html\">Return</a>";
	} elseif(!($pass == $vpass)) { 
		echo "Invalid password! (login is case sensitive) <br> <a href=\"login.html\">Return</a>";
	} else {
		echo "Welcome, ".$user."!<br> <a href=\"tapster.html\">Return</a>";
	}
	
}
mysql_close($dbhandle);	
?>
</html>
