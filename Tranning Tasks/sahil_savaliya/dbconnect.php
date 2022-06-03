<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_app";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else {
      // echo "successfully";
  }

  echo "<br>";
  $db = mysqli_select_db($conn,$dbname);

  if ($db)
     {
       
      // echo "Database Selected";
    
      }
  else
  {
  
     // echo "Database is not selected !";
  }


?>