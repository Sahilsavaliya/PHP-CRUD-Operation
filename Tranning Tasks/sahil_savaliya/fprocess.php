<?php
session_start();
require 'dbconnect.php';

if(!isset($_POST['submit']))
{
	header("location:admin_register.php");
	exit();
    // echo "not insert";
}else{
@$id = $_POST['id'];
$nm = $_POST['name'];
$gen = $_POST['gender'];
$hob = implode(',',$_POST['hobbies']);
$em = $_POST['email'];
$pass = $_POST['password'];
$usertype = "2";

     if($nm !="" && $gen !="" && $hob !=""  && $em !="" && $pass !=""){

        $query="INSERT INTO `login_admin` VALUES ('$id','$nm','$gen','$hob','$em','$pass',$usertype)";
         echo $query;
        // exit;      
        $result=mysqli_query($conn,$query);
        //  var_dump($result);
         

        if ($result)
          {
     
	        // echo "Insert SUCCESS";
	        header("location:admin_register_view.php");
        }
        else {
	        //  header("location:form.php");
            echo "Not Insert";
        }
}
} 

?>