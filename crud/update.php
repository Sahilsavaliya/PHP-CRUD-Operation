<?php
 require 'dbconnect1.php';
 $gid=$_GET['id'];


if(isset($_POST['submit']))
{
 $fn = $_POST['fname'];
 $ln = $_POST['lname'];
 $gen = $_POST['gender'];
 $con = $_POST['contact'];
 $em = $_POST['email'];
 $des = $_POST['designation'];
 $age = $_POST['age'];
 $pass = $_POST['password'];
// $cpass = $_POST['cpassword'];
 $fi = $_FILES['fileToUpload']['name'];
 $rname=rand().$fi;
//  $check = $_POST['Country'];
//  $check1= $row['Country'];
//  $check2= explode(",", $row['Country']);


if($fn != "" && $ln != ""&& $gen != ""&& $con != "" && $em != "" && $des != "" && $age != "" )
{
	$target_dir = "uploads/";
	$target_file = $target_dir . $rname;
	$uploadOk = 1;
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(!empty($fi)){
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($filetype != "pdf" && $filetype != "docx" && $filetype != "xlsx") {
			echo "<center>"."Sorry, only PDF,DOC and XLS files are allowed."."</center><br>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "<center> ". "Sorry, your file was not uploaded." ."</center>";
		}
		// if everything is ok, try to upload file
		else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$sqlf = "select * FROM table1 WHERE id='$gid'";
				$dataf = mysqli_query($conn, $sqlf);
				$totalf = mysqli_num_rows($dataf);
				$rowf = mysqli_fetch_assoc($dataf);
				unlink("uploads/".$rowf['file']);
				$query = "UPDATE `table1` SET `fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`designation`='$des',`age`='$age',`password`='$pass',`file`='$rname' WHERE id=$gid"; 
				$result1 = $conn->query($query); 
				if ($result1 == TRUE) {
					
					header("Location:view.php");
				}else{
					echo "Error:" . $query . "<br>" . $conn->error;
				}
			} else {
				echo "<center>". "Sorry, there was an error uploading your file." . "<center>";
			}
		}
	}
	else{
		$query = "UPDATE `table1` SET `fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`designation`='$des',`age`='$age' WHERE `id` = '$gid'"; 
		$result1 = mysqli_query($conn, $query);
		if ($result1 == TRUE) {
			header("Location:view.php");
		}else{
			echo "Error:" . $query . "<br>" . $conn->error;
		}
	} 
}else{
	echo "<center>.Enter Required Fields.</center>";
}

}
?>