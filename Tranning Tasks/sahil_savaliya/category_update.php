<?php
include 'dbconnect.php';

if (isset($_REQUEST['submit'])) {
    $gid=$_POST['id'];
    $name = $_POST["name"];
    $active = $_POST["active_data"];
if($name != "" && $active !=""){
    $edit = "UPDATE `category` SET `name`='$name',`active`='$active' WHERE id='$gid'";
    $result1 = $conn->query($edit);
    if ($result1 == TRUE) {
        header("Location:category_show.php");
    } else {
        echo "Error:" . $edit . "<br>" . $conn->error;
    }
}
}else {
header("Location:category_edit.php?Please input all Required fields..!!");
    
    }

?>