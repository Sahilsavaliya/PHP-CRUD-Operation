<?php
session_start();
require 'dbconnect.php';

if(!isset($_POST['submit'])){
	header("location:product.php");
    exit();
}
@$id = $_POST['id'];
$nm = $_POST['name'];
$cat_id = $_POST['category_id'];
$active = $_POST['active'];
$name = $_FILES['fileToUpload']['name'];
$created_by = $_SESSION['email1'];
// $rname=rand().$fi;
if($nm != "" && $cat_id != ""&& $active != ""&& $name != "")
 {
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<center>"."Sorry, your file is too large."."</center><br>";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
        echo "<center>"."Sorry, only PDF,DOC and XLS files are allowed."."</center><br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<center>"."Sorry, your file was not uploaded."."</center><br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql="INSERT INTO `product`(`id`, `name`, `category_id`, `Image`,`created_by_user`, `active`) VALUES ('$id','$nm','$cat_id','$name','$created_by','$active')";
            if(mysqli_query($conn, $sql)){
                header("Location:index.php");
            } else{
                echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center><br>";
            }
                mysqli_close($conn);
        }
        else {
            echo "<center>"."Sorry, there was an error image"."</center><br>";
        }
    }
}else{
header("Location:product.php?Please input all Required fields..!!");


}
?>
