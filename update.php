<?php
//error_reporting(0);
 session_start();
 require 'dbconnect1.php';

 $id = $_GET['id'];
 $fn = $_GET['fname'];
 $ln = $_GET['lname'];
 $gen = $_GET['gender'];
 $con = $_GET['contact'];
 $em = $_GET['email'];
 $dob = $_GET['dob'];
 $age = $_GET['age'];
 $pass = $_GET['password'];
 $fi = $_FILES['fileToUpload']['name'];

 $query = "UPDATE `table1`SET `id`='$id',`fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`dob`='$dob',`age`='$age',`password`='$pass',`file`='$fi' WHERE id=$id";

$result=mysqli_query($conn,$query);

if($result)
{
	echo "Updated";
	 header("location:view.php");
	  exit();
}
else
{
	echo "Error...";

}

?>