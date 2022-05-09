<?php
 require 'dbconnect1.php';
 $gid=$_GET['id'];


if(isset($_POST['submit']))
{
 $fn = $_POST['fname'];
 $ln = $_POST['lname'];
 $gen = $_POST['gender'];
 $con = $_POST['contact'];
 $em = $_POST['email'];
 $des = $_POST['designation'];
 $age = $_POST['age'];
 $pass = $_POST['password'];
 $fi = $_FILES['fileToUpload']['name'];
//  $check = $_POST['Country'];
//  $check1= $row['Country'];
//  $check2= explode(",", $row['Country']);

 

$query = "UPDATE `table1` Set `fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`designation`='$des',`age`='$age',`password`='$pass',`file`='$fi' WHERE `id` = '$gid'";
 print_r($query);
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
	echo "Error...".mysqli_error($conn);

}
}
?>