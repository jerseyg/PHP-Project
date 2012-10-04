<?php

require 'sql/connect.php';
require 'glob_functions.php';
///Just incase for no errors

session_start(); //must call session_start before using any $_SESSION variables
$username = mysql_real_escape_string($_POST['username']);
$userlength = strlen($username);
$password = $_POST['pass'];

if(empty($username)){
	echo "<p>No username</p>";
	exit;
}
if (empty($password)){
	echo "<p>No Password</p>";
	exit;
}

$sql = "SELECT password, salt FROM accounts WHERE username = '$username'; ";

$result = $db -> query($sql);

$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);


$user_rows = $result->num_rows;

if($user_rows < 1){
echo "<p>User does not exist</p>";
	//Add header(location: login.html);
	exit;
}

$hashed = hash('sha256', $password);
$rehashed = hash('sha256', $rows['salt'] . $hashed);

if ($rehashed != $rows['password']){
	echo "<p>Your password is wrong</p>";
	//Add  header()

	//debug purpose
	echo $rehashed . "<br>";
	echo $rows['password'] . "<br />";
		echo $password . "<br />";
	echo $rows['salt'];
}
else {
	validateUser();
	$_SESSION['userid'] = $username;
	header('Location: /index.php');
}



?>
