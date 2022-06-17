<?php
require '../dbconnect.php';
 $gid=$_GET['id'];
if(isset($_POST['submit']))
{
    $nm = $_POST['name'];
    $cat_id = $_POST['category_id'];
    $active = $_POST['active'];
    $name = $_FILES['fileToUpload']['name']; 
 	$rname=rand().$name;

if($nm != "" && $cat_id != "" && $active !="")
{
	$target_dir = "image/";
	$target_file = $target_dir . $rname;
	$uploadOk = 1;
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(!empty($name)){
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
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
				$sqlf = "select * FROM product WHERE id='$gid'";
				$dataf = mysqli_query($conn, $sqlf);
				$totalf = mysqli_num_rows($dataf);
				$rowf = mysqli_fetch_assoc($dataf);
				unlink("image/".$rowf['Image']);
				$query = "UPDATE `product` SET `name`='$nm',`category_id`='$cat_id',`Image`='$rname',`active`='$active' WHERE id=$gid";
				$result1=mysqli_query($conn,$query);
				if ($result1 == TRUE) {
					
					header("Location:dashboard.php");
				}else{
					echo "Error:" . $query . "<br>" . $conn->error;
				}
			} else {
				echo "<center>". "Sorry, there was an error uploading your image." . "<center>";
			}
		}
	}
	else{
		$query = "UPDATE `product` SET `name`='$nm', `category_id` ='$cat_id',`active`='$active' WHERE `id`='$gid'";
		$result1 = mysqli_query($conn, $query);
		if ($result1 == TRUE) {
			header("Location:dashboard.php");
		}else{
			echo "Error:" . $query . "<br>" . $conn->error;
		}
	} 
}else{
header("Location:product_edit.php?Please input all Required fields..!!");
	
	}

}
?>