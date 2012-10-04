<?php

//REQUIRE/INCLUDE UP HERE
require 'sql/connect.php';
require 'glob_functions.php';


//GLOBAL POST variables
$username = mysql_real_escape_string($_POST['username']);
$password = $_POST['pass'];
$repassword = $_POST['repass'];

//Find the string length of $username
$user_length = strlen($username);

//SQL statements
$user_sql = "SELECT username FROM accounts WHERE username = '$username'; ";
$user_results = $db -> query($user_sql);
//Number of rows returned
$user_rows = $user_results->num_rows;


//Username Check
if (empty($username)){

	echo "<p>Username is empty</p>";
	exit;

}

else{

	if ($user_rows == 1){
		echo "<p>User already exists</p>";
	exit;
		}

}




?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title></title>
	</head>

	<body>

		<?php if ($user_length > 30 || $user_length <= 0): ?>
			<p>Username is to long or empty</p>
		<?php else: ?>
				<?php if (strlen($password) <= 0 || strlen($repassword) <= 0): ?>
					<p>Passwords are empty</p>
				<?php else: ?>
						<?php if($password != $repassword): ?>
							<p>Passwords do not match</p>
						<?php else: ?>
							<?php
								//HASHING TAKES PLACE!
								$hashed = hash('sha256', $password);
								$salt = createSalt();
								$rehashed = hash('sha256', $salt . $hashed);
								$sql = "INSERT INTO accounts (username, password, salt) VALUES ('{$username}', '{$rehashed}', '{$salt}' )";
								$result = $db -> query($sql);
								mysql_close();
							?>
							<?php header('Location: /index.php'); ?>
						<?php endif; ?>
				<?php endif; ?>
		<?php endif; ?>


	</body>
</html>

