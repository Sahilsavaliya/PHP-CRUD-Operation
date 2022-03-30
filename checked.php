<?php
 session_start();

if(isset($_POST["submit"])) {
    header("loction:index.php");
    exit();
}

$us=$_POST['uname'];
$ps=$_POST['password'];

$query = "SELECT * FROM employee WHERE user='".$us."' AND password='".$ps."'";
$result = mysqli_query($conn, $result);

if(mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user']=$row['user'];
	$_SESSION['pass']=$row['password'];
}

?>