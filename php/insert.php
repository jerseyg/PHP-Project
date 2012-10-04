<?php


	require "sql/connect.php";
	require 'glob_functions.php';
	session_start();
	$title = '';
	$content = '';

	$title = mysql_real_escape_string ($_POST["title"]);
	$content = mysql_real_escape_string ($_POST["content"]);
	$user = $_SESSION['userid'];



	if (imagefile()) {

		$file_temp = $_FILES["file"]["tmp_name"];
		$file_location = 'uploads/' . $_FILES["file"]["name"];
		move_uploaded_file($file_temp, $file_location );
		$image = "php/uploads/" . $_FILES["file"]["name"];
	}
	else {
		// UPLOAD_ERR_OK         Value: 0; There is no error, the file uploaded with success.
		// UPLOAD_ERR_INI_SIZE   Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.
		// UPLOAD_ERR_FORM_SIZE  Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.
		// UPLOAD_ERR_PARTIAL    Value: 3; The uploaded file was only partially uploaded.
		// UPLOAD_ERR_NO_FILE    Value: 4; No file was uploaded.
		// UPLOAD_ERR_NO_TMP_DIR Value: 6; Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.
		// UPLOAD_ERR_CANT_WRITE Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.
		// UPLOAD_ERR_EXTENSION  Value: 8; File upload stopped by extension. Introduced in PHP 5.2.0.
		if ($_FILES["file"]["error"] == 4){
			$image = "http://fakeimg.pl/350x200/?text=N/A";
		}
		else{
		echo "Somethinhg else went wrong <br />";
		echo "Error: " . $_FILES["file"]["error"] . "<br />";

		exit;
	}

	}



	$sql = "INSERT INTO blog (user, title, content, images) VALUES ('{$user}', '{$title}', '{$content}', '{$image}')";



	if (empty($title)){
		//Output some empty error
	echo "<p>Title box is empty</p>";
	exit;
	}
	$title_len = strlen($title);


	if (empty($content)) {
		//Output another empty error_log(message)
	echo "<p>Content is empty</p>";
	exit;
	}
	$content_len = strlen($content);


	if ($title_len > 30) {
		echo "<p>Titl
		e is to long</p>";
		exit;
	}
	$result = $db->query($sql);

	if ($result) {
		echo "<p>Success!</p>";
		echo strlen($content);
		header('Location: /index.php');
	}
	else{
		        	echo "<h1>Error Added to blog Table</h1>";
               printf(mysqli_error($db));
                    exit;
	}
?>