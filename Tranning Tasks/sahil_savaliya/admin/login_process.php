<?php
session_start();
// require 'login_process.php';
include '../dbconnect.php';


if(isset($_POST["submit"])) {
$username =$_POST['email'];
$password =$_POST['password'];

    $sql = "SELECT * FROM login_admin WHERE email = '".$username."' AND password = '".$password."'";

    $result =mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

            $row = mysqli_fetch_assoc($result);
    
            $_SESSION['email1'] = $username;
            $_SESSION['utype'] = $row['usertype'];
                // echo $_SESSION['email1'];
                // echo $_SESSION['utype'];
                // exit;

    if($usertype== 2){
        $_SESSION['user']= "2";
       header('Location:../index.php');
    }
    else{
        $_SESSION['admin']= "1";
    header('location:../index.php');

    }
}
}else {
    // echo 'invalid username and password';
    header("location:login.php");
    exit();
}