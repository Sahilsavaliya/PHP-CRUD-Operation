<?php
session_start();
require 'dbconnect1.php';

// require 'file.php';
if(!isset($_POST['submit']))
{
	header("location:form.php");
	exit();
}
$id = $_POST['id'];
$fn = $_POST['fname'];
$ln = $_POST['lname'];
$gen = $_POST['gender'];
$con = $_POST['contact'];
$em = $_POST['email'];
$des = $_POST['designation'];
$age = $_POST['age'];
$pass = $_POST['password'];
$fi = $_FILES['fileToUpload']['name'];
$check = $_POST['Country'];
$check = implode(", ", $_POST['Country']);

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

    $qem = mysqli_query($conn,"SELECT * from table1 WHERE email='$em'");

    if(mysqli_num_rows($qem)>0){
        // $_SESSION['status'] = "Email id already used!!";
        echo "<br>";
        echo "Email id already used!!";
        // header("location:form.php");

    }else{

   

$query = "INSERT INTO `table1`
 VALUES ('$id','$fn','$ln','$gen','$con','$em','$des','$age','$pass','$fi','$check')";
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
}	