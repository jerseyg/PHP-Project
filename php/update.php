<?php
require_once('PhpConsole.php');
PhpConsole::start();

require 'glob_functions.php';
require 'sql/connect.php';
	session_start();
	$title = '';
	$content = '';
	$title = mysql_real_escape_string ($_POST["title"]);
	$content = mysql_real_escape_string ($_POST["content"]);
	$id = $_GET['id'];

if(isset($_POST['update'])){
echo "Update";

$sql = "UPDATE blog SET title = '{$title}', content = '{$content}' WHERE id = '{$id}' ";

	$result = $db->query($sql);

	if ($result) {
		echo "<p>Success!</p>";
		header('Location: /index.php');
	}
	else{
		       	echo "<h1>Error Added to blog Table</h1>";
               printf(mysqli_error($db));
                    exit;
	}

exit;
}
if(isset($_POST['delete'])){
echo "Delete";

$sql = "DELETE FROM blog WHERE id = '{$id}'";

	$result = $db->query($sql);

	if ($result) {
		echo "<p>Success!</p>";
		header('Location: /index.php');
	}
	else{
		       	echo "<h1>Error Added to blog Table</h1>";
               printf(mysqli_error($db));
                    exit;
	}

exit;


}




?>