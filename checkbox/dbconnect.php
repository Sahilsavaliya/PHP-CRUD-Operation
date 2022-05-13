<?php
 
 $servername="localhost";
 $username="root";
 $password="";
 $databasename="crud";


 $conn=mysqli_connect("$servername","$username","$password","$databasename");
 
 if($conn)
 {
    // echo "Connection Establish";
 }
 else
 {
     echo "Connection Failed";
 }
 ?>