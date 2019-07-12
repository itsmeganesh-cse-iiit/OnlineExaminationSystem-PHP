<?php
session_start();
if ($_POST["label"]) {
    $label = $_POST["label"];
}
$allowedExts = array("xls");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["type"] == "application/vnd.ms-excel")
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $filename = $label.$_FILES["file"]["name"];
        

        if (file_exists("exam_docs/" . $filename)) {
            echo "Already Exists";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "exam_docs/" . $filename);
			echo "Uploaded Successfully.";
			$file_path_to_create="exam_docs/" . $filename;
			$_SESSION['exam_file']=$file_path_to_create;
			$_SESSION['exam_file_name']=$temp[0];
			
        }
    }
} else {
    echo "Invalid file";
}
?>