<?php
//error_reporting(0);
 session_start();
 require 'dbconnect1.php';
if(isset($_POST))
{
 $id = $_POST['id'];
 $fn = $_POST['fname'];
 $ln = $_POST['lname'];
 $gen = $_POST['gender'];
 $con = $_POST['contact'];
 $em = $_POST['email'];
 $dob = $_POST['dob'];
 $age = $_POST['age'];
 $pass = $_POST['password'];
 $fi = $_POST['fileToUpload'];

 $query = "UPDATE `table1` SET `id`='$id',`fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`dob`='$dob',`age`='$age',`password`='[value-9]',`file`='[value-10]' WHERE id=$id";
// print_r($query);
$result=mysqli_query($conn,$query);
print_r($result);

if($result)
{
	// echo "Updated";
	header("location:view.php");
	//   exit();
}
else
{
	echo "Error...";

}
}
?>