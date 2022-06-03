<?php
session_start();
require 'dbconnect.php';

if(!isset($_POST['submit']))
{
	header("location:category.php");
	// exit();
    // echo "not insert";
}
@$id = $_POST['id'];
$nm = $_POST['name'];
@$active = $_POST['active_data'];

     if($nm !="" && $active !=""){

        $query="INSERT INTO `category` VALUES ('$id','$nm','$active')";
        // echo $query;
        // exit;
        $result=mysqli_query($conn,$query);
        // var_dump($result);
        // exit;
        if ($result)
          {
     
	        // echo "Insert SUCCESS";
	        header("location:category_show.php");
        }
        else {
	         header("location:category.php");
            // echo "not insert";
        }
}


?>