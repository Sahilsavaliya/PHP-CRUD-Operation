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
 $fi = $_FILES['fileToUpload']['name'];
 $rname=rand().$fi;
//  $check = $_POST['Country'];
//  $check1= $row['Country'];
//  $check2= explode(",", $row['Country']);

$qem = mysqli_query($conn, "SELECT * from table1 WHERE email='$em'");
if (mysqli_num_rows($qem) >= 1) {
    // $_SESSION['status'] = "Email id already used!!";
    // echo "<br>";
    echo  "<center>Email id already used!!</center>";


}else {
if($fn != "" && $ln != ""&& $gen != ""&& $con != ""&& $em != "" && $des != "" && $age != "" && $pass != "" && $fi != "")
{
	$target_dir = "upload/";
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
		if($filetype != "docx" && $filetype != "pdf" && $filetype != "xlsx") {
			echo "<center>"."Sorry, only PDF,DOC and XLS files are allowed."."</center><br>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		}
		// if everything is ok, try to upload file
		else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$query = "UPDATE `table1` Set `fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`designation`='$des',`age`='$age',`password`='$pass',`file`='$rname' WHERE `id` = '$gid'"; 
				$result1 = $conn->query($query); 
				if ($result1 == TRUE) {
					
					header("Location:view.php");
				}else{
					echo "Error:" . $query . "<br>" . $conn->error;
				}
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	else{
		$query = "UPDATE `table1` Set `fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`designation`='$des',`age`='$age',`password`='$pass',`file`='$rname' WHERE `id` = '$gid'"; 
		$result1 = $conn->query($query); 
		if ($result1 == TRUE) {
			header("Location:view.php");
		}else{
			echo "Error:" . $query . "<br>" . $conn->error;
		}
	} 
}
}
}
else{
	// echo "Enter Required Fields";
}



 

// $query = "UPDATE `table1` Set `fname`='$fn',`lname`='$ln',`gender`='$gen',`contact`='$con',`email`='$em',`designation`='$des',`age`='$age',`password`='$pass',`file`='$fi' WHERE `id` = '$gid'";
//  print_r($query);
// $result=mysqli_query($conn,$query);
// print_r($result);

// if($result)
// {
// 	// echo "Updated";
// 	header("location:view.php");
// 	//   exit();
// }
// else
// {
// 	echo "Error...".mysqli_error($conn);

// }

?>