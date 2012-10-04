<?php


//Declare all functions
function createSalt() {
	$string = md5(uniqid(rand(), true));
	return substr($string, 0, 3);
}

function validateUser()
{
    session_regenerate_id (); //this is a security measure
    $_SESSION['valid'] = 1;
}

function isLoggedIn()
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}


function logout()
{
    $_SESSION = array(); //destroy all of the session variables
    session_destroy();
    //TEMP . use header to redirect
    echo "Session Destroyed";
    //TEMP
    header('Location: /index.php');
}

function imagefile()
{


              if ($_FILES["file"]["error"] > 0)
             {
                return false;
              //  echo "Error: " . $_FILES["file"]["error"] . "<br />";

             }
              else
             {
                return true;
                //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                //echo "Type: " . $_FILES["file"]["type"] . "<br />";
               // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
               // echo "Stored in: " . $_FILES["file"]["tmp_name"];

             }



}
?>