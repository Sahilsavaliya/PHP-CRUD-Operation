<?php
	include 'dbconnect1.php';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

	$sql = "DELETE FROM `table1` WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
        echo"Deleted";
	 header("location:view.php");
	exit();
    } 
	else {
		
	}
	mysqli_close($conn);
?>
