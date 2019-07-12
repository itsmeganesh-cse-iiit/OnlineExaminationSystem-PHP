<?php
session_start();
$user=$_SESSION['logged_user'];
include '../../config/dbconnect.php';
function generateRandomString($length = 30) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
if ($_POST["label"]) {
    $label = $_POST["label"];
}
$allowedExts = array("png","jpg","jpeg");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["type"] == "image/jpeg") ||
($_FILES["file"]["type"] == "image/png") ||
($_FILES["file"]["type"] == "image/jpg") ||
($_FILES["file"]["type"] == "image/gif") ||
($_FILES["file"]["type"] == "image/pjpeg")
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
    	$ran=generateRandomString();
        $filename = $ran.$_FILES["file"]["name"];
        

        if (file_exists("profile_pics/" . $filename)) {
            echo "Already Exists";
        } else {
        	
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "profile_pics/" . $filename);
			echo "Uploaded Successfully.";
			echo "<script>window.location.reload();</script>";
			
			$file_path_to_create="profile_pics/" . $filename;
			mysql_query("UPDATE exam_users SET photo='$file_path_to_create' WHERE email='$user'") or die(mysql_error());
			
        }
    }
} else {
    echo "Invalid file";
}
?>