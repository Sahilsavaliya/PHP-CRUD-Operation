<?php
session_start();
require 'dbconnect1.php';

if (!isset($_POST['submit'])) {
    header("location:signupform.php");
    exit();
}
@$id = $_POST['id'];
$fn = $_POST['fname'];
$ln = $_POST['lname'];
$gen = $_POST['gender'];
$con = $_POST['contact'];
$em = $_POST['email'];
$des = $_POST['designation'];
$age = $_POST['age'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$fi = $_FILES['fileToUpload']['name'];
// $rname=rand().$fi;
// @$check = $_POST['Country'];
// @$check = implode(",", $_POST['Country']);

if($fn != "" && $ln != ""&& $gen != ""&& $con != ""&& $em != "" && $des != "" && $age != "" && $pass != "" && $fi != "")
{
    if($pass != $cpass){
    header("location:signupform.php?pass=Not match password");
    exit();
}
 
$qem = mysqli_query($conn, "SELECT * from table1 WHERE email='$em'");
if (mysqli_num_rows($qem) > 0) {
    // $_SESSION['status'] = "Email id already used!!";
    // echo "<br>";
    header("location:signupform.php?pass=Email id already used!!");
    // echo "Email id already used!!";
}else {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<center>"."Sorry, your file is too large."."</center><br>";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($filetype != "docx" && $filetype != "pdf" && $filetype != "xlsx") {
        echo "<center>"."Sorry, only PDF,DOC and XLS files are allowed."."</center><br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<center>"."Sorry, your file was not uploaded."."</center><br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO `table1`(`id`, `fname`, `lname`, `gender`, `contact`, `email`, `designation`, `age`, `password`, `file`) VALUES
            ('$id','$fn','$ln','$gen','$con','$em','$des','$age','$pass','$fi')";
            if(mysqli_query($conn, $sql)){
                header("Location:index.php");
            } else{
                echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center><br>";
            }
                mysqli_close($conn);
        }
        else {
            echo "<center>"."Sorry, there was an error uploading your file."."</center><br>";
        }
    }
}
}
// if($pass != $cpass)
// {
//     header("location:signupform.php?pass=Not match password");
//     exit();
// }
 

// $qem = mysqli_query($conn, "SELECT * from table1 WHERE email='$em'");


// if (mysqli_num_rows($qem) > 0) {
//     // $_SESSION['status'] = "Email id already used!!";
//     // echo "<br>";
//     header("location:signupform.php?pass=Email id already used!!");
//     // echo "Email id already used!!";
//     // header("location:form.php");

// }
//  else {

//     if ($fn != "" && $ln != "" && $gen != "" && $em != "" && $des != "" && $age != "" && $pass != "" && $cpass != ""  && $con!= "") {

//         $query = "INSERT INTO `table1`(`id`, `fname`, `lname`, `gender`, `contact`, `email`, `designation`, `age`, `password`, `file`) VALUES
//          ('$id','$fn','$ln','$gen','$con','$em','$des','$age','$pass','$fi')";
//         echo "$query";


//         $result = mysqli_query($conn, $query);
//         if ($result) {

//             echo "Insert SUCCESS";
//             header("location:index.php");

//         }
//          else {
//             // header("location:signupform.php");
//             echo "not insert".mysqli_error($conn);
//         }
//     }
// }
?>
