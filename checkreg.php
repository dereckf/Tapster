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
	echo "You must enter a username.<br> <a href=\"register.html\">Return</a>";
}else if(!$pass) {
	echo "You must enter a password <br> <a href=\"register.html\">Return</a>";
} else {

	$hostname = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$db = 'tapster';
	$table = 'tap_users';
	$name = 'name';
	$pw = 'password';
	
	$dbhandle = MYSQL_CONNECT($hostname, $dbuser, $dbpass)or die("Unable to connect to mysql");
	$selected = mysql_select_db($db, $dbhandle)or die("Unable to connect to database");

	$query = "select ".$name.", ".$pw." from ".$table;
	$return = mysql_query($query);

	$flag = TRUE;

	while($row = mysql_fetch_array($return)) {
		$vuser = $row{'name'};
		$vpass = $row{'password'};
		if($user == $vuser) { 
			echo "User already exists! <br> <a href=\"register.html\">Return</a>";
			$flag = FALSE;
			break;
		} elseif($pass == $vpass) { 
			echo "Pass already taken! <br> <a href=\"register.html\">Return</a>";
			$flag = FALSE;
			break;
		}
	}
	
	if($flag) {
		$command = "insert into ".$table." (".$name.", ".$pw.") values (\"".$user."\", \"".$pass."\")";
		$reg = mysql_query($command);
		if($reg) {
			echo "Registration successful! <br> <a href=\"tapster.html\">Return</a>";
		} else {
			echo "Something went wrong :( <br> <a href=\"register.html\">Try Again</a>";
		}
	}
}
mysql_close($dbhandle);	
?>
</html>
