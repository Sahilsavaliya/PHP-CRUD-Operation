<?php
include "dbconnect1.php";

$did=$_GET['id'];
  $query = "SELECT * FROM table1 where id = '$did'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  $row = mysqli_fetch_assoc($data);
  if($row == 0){
      echo "No Data available";
  }
  else
  {
      $sql = "DELETE FROM table1 WHERE id='$did'";
      if ($conn->query($sql) === TRUE) {
        unlink("uploads/".$row['file']);
        header('location: view.php');
      } else {
      echo "Error deleting record: " . $conn->error;
      }
  }