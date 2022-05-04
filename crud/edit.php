<?php 
if(! isset($_SESSION)) {
    session_start();
}if(!($_SESSION['email'])) {
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>


    <style type="text/css">
    #CNAForms {
        box-shadow: 0px 0px 3px blue;
        background-color: gainsboro;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    i.fa,
    b {
        color: teal;
    }
    </style>
</head>

<body>
    <?php
require 'dbconnect1.php';

//  session_start();

 $target_dir = "upload/";
 @$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Check file size
 if (@$_FILES["fileToUpload"]["size"] > 500000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($filetype != "txt" && $filetype != "pdf" && $filetype != "jpg") {
    //  echo "Sorry, only PDF,DOC and XLS files are allowed.";
     $uploadOk = 0;
 }

 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
    //  echo "Sorry, your file was not uploaded.";
     // if everything is ok, try to upload file
 } else {
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
     } else {
        //   echo "Sorry, there was an error uploading your file .";
     }
 }

 $id = isset($_GET['id']) ? $_GET['id'] : '';
// echo"$id"; 
$query = "SELECT * FROM `table1` WHERE id=$id";
//  $query= "SELECT 'id', 'Firstname', 'Lastname', 'Gender', 'Contact', 'Email', 'DOB', 'Age', 'Password' FROM 'table1' WHERE  'id'= $id";
//  echo"$query";




 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_assoc($result);
//  if($row = mysqli_fetch_array($result)) 
//  {
//      echo "sucessfully";
//     $check = explode(", ", $_POST['Country']);
 
// //  var_dump($row);
 
//  }
  ?>



    <form method="POST" action="update.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12"
                    id="CNAForms">
                    <h3 class="text-center"><i class="fa fa-user-plus"></i> Create New Account</h3>
                    <hr />
                    <div class="form-group">
                        <b>Firstname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="Firstname" name="fname" type="text" placeholder="Enter firstname here.."
                                maxlength="20" class="form-control" value="<?php echo $row['fname'];?>" />
                        </div>
                        <small id="FirstnameValidation" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Lastname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="Lastname" name="lname" type="text" placeholder="Enter lastname here.."
                                maxlength="20" class="form-control" value="<?php echo $row['lname'];?>" />
                        </div>
                        <small id="LastnameValidation" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Gender</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-female"></i> | <i
                                    class="fa fa-male"></i></span>
                            <select id="DDL_Gender" name="gender" class="form-control">

                                <option value="Male" name="gender" 
								<?php echo $row['gender']=="male"?"checked=checked":""; ?>>
                                    <label>Male</label></option>
                                <option value="Female" name="gender"
								<?php echo $row['gender']=="female"?"checked=checked":""; ?>>
                                    <label>Female</label>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <b><i class="fa fa-phone"></i> Contact No.</b>
                        <div class="input-group">
                            <span class="input-group-addon">+91</span>
                            <input id="Contactno" name="contact" type="text" placeholder="Enter contact no. here.."
                                maxlength="10" class="form-control" value="<?php echo $row['contact'];?>" />
                        </div>
                        <small id="ContactnoValidation" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Email</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="EmailId" name="email" type="text" placeholder="Enter email id here.."
                                maxlength="50" class="form-control" value="<?php echo $row['email'];?>" />
                        </div>
                        <small id="EmailIdValidation" class="text-danger"></small>
                    </div>

                    

                    <div class="form-group">

                        <b><i class="fa fa-"></i> designation</b>

                        <div class="input-group">
                            <select name="designation" class="form-control" id="designation" required>
                                <option class="form-control"></option>
                                <option value="Jr Devloper"
                                    <?php echo $row['designation']=="Jr.Software Devloper"?"selected=selected":""; ?>
                                    class="form-control">Jr Devloper</option>
                                <option value="Sr.Software Devloper"
                                    <?php echo $row['designation']=="Sr.Software Devloper"?"selected=selected":""; ?>
                                    class="form-control">Sr Devloper</option>
                                <option value="Project Manager"
								    <?php echo $row['designation']=="Project Manager"?"selected=selected":""; ?> class="form-control">Project Manager </option>
                                <option value="Business Analyst "
                                    <?php echo $row['designation']=="Business Analyst "?"selected=selected":""; ?>
                                    class="form-control"> Business Analyst</option>
                            </select>
                        </div>


                    </div>
                    <div class="form-group">
                        <b>Age</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                            <input id="Age" name="age" type="text" maxlength="50" placeholder="Enter Your age here.."
                                class="form-control" value="<?php echo $row['age'];?>" />
                        </div>
                        <small id="AgeValidation" class="text-danger"></small>
                    </div>

                    <div class="form-group">
                        <b>File</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"
                                    value="<?php echo $row['fileToUpload'];?>"></i></span>
                            <input type="file" name="fileToUpload" class="form-control" />
                            <div id=""></div>
                        </div>
                        <small id="FileValidation" class="text-danger"></small>
                    </div>

                    <!-- <div class="form-group">
					<b>Country</b>
					<div class="input-group">
					<input type="checkbox" id="Country" name="Country[]" value="India" <?php if(explode(",",$row['country']=="India")){echo "checked";}?>>India<br/>
            		<input type="checkbox" id="Country" name="Country[]" value="USA" <?php if(explode(",",$row['country']=="USA")){echo "checked";}?>>USA<br/>
            		<input type="checkbox" id="Country" name="Country[]" value="Australia" <?php if(explode(",",$row['country']=="Australia")){echo "checked";}?>>Australia<br/>
            		<input type="checkbox" id="Country" name="Country[]" value="Europe" <?php if(explode(",",$row['country']=="Europe")){echo "checked";}?>>Europe<br/>
           			<input type="checkbox" id="Country" name="Country[]" value="Italy" <?php if(explode(",",$row['country']=="Italy")){echo "checked";}?>>Italy<br/>
					</div>
					</div> -->


                    <div class="form-group">
                        <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="Password" name="password" type="text" placeholder="Enter password here.."
                                maxlength="12" class="form-control" value="<?php echo $row['password'];?>" />
                        </div>
                        <small id="PasswordValidation" class="text-danger"></small>
                    </div>
                    <div class="form-group">

                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <!-- <a class="btn btn-primary" ><i class="fa fa-user-plus" name="btn" style="color:white;"></i> Create New Account</a> -->
                        <input type="submit" name="submit" style="border-radius: 5px;">

                    </div>
                </div>
            </div>
        </div>
    </form>
  
</body>

</html>