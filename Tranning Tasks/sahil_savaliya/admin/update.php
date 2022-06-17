<?php
error_reporting(0);
 session_start();
 require '../dbconnect.php';
if(isset($_POST['submit']))
{
 @$id = $_POST['id'];
 $nm = $_POST['name'];
 $gen = $_POST['gender'];
 $hob = implode(',',$_POST['hobbies']);
 $em = $_POST['email'];
 $pass = $_POST['password'];

 $query = "UPDATE `login_admin` SET `id`='$id',`name`='$nm',`gender`='$gen',`hobbies`='$hob',`email`='$em',`password`='$pass' WHERE id=$id";

 // print_r($query);
$result=mysqli_query($conn,$query);
print_r($result);

if($result)
{
	// echo "Updated";
	 header("location:admin_register_view.php");
	//  exit();
}
else
{
	echo "Error...";

}
}
?>