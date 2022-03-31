<?php
require 'dbconnect1.php';

// require 'file.php';
if(!isset($_POST['submit']))
{
	header("location:form.php");
	exit();
}

$fn = $_POST['fname'];
$ln = $_POST['lname'];
$gen = $_POST['gender'];
$con = $_POST['contact'];
$em = $_POST['email'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$pass = $_POST['password'];
$fi = $_FILES['fileToUpload']['name'];

$target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($filetype != "txt" && $filetype != "pdf" && $filetype != "jpg") {
        echo "Sorry, only PDF,DOC and XLS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


$query = "INSERT INTO `table1`
 VALUES ('$id','$fn','$ln','$gen','$con','$em','$dob','$age','$pass','$fi')";
// echo "$query";

$result=mysqli_query($conn,$query);
var_dump($result);
if ($result)
 {
	echo "Insert SUCCESS";
	 header("location:view.php");
}
else 
 {
	 header("location:form.php");
	echo "not insert";
 }	