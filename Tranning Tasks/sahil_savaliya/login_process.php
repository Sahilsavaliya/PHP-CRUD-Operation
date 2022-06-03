<?php
session_start();
if(isset($_SESSION['email'])) {
    header('location: dashboard.php');
}
require 'dbconnect.php';
   
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

   
    $sel="SELECT * FROM s_admin WHERE email='$email' AND password='$password'";
   // echo $sel;
    $result=mysqli_query($conn,$sel);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
           $_SESSION["email"]=$email;
           header("location:dashboard.php");
        }
    }
    else{
        echo "<center>"."Email And Password Not Valid."."</center>";
    }

}
?>

<?php

require 'dbconnect.php';
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

   
    $sel="SELECT * FROM login_admin WHERE email='$email' AND password='$password'";
   // echo $sel;
    $result=mysqli_query($conn,$sel);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
           $_SESSION["email"]=$email;
           header("location:dashboard.php");
        }
    }
    else{
        echo "<center>"."Email And Password Not Valid."."</center>";
    }

}
?>
