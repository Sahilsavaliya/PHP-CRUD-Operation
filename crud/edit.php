<?php 
session_start();
if(!($_SESSION['email'])) {
    header('location: index.php');
}
require 'dbconnect1.php';
// require 'file.php';
require 'update.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/bootstrap/SignUpForm.js"> </script>
    <link href="css/index.css" type="text/css" rel="stylesheet" />

</head>

<body>
    <?php
 $id = isset($_GET['id']) ? $_GET['id'] : '';
 
$query = "SELECT * FROM `table1` WHERE id=$id";

 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_assoc($result);

  ?>
    <form method="POST" enctype="multipart/form-data">
    <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" id="SignUpForm">
                    <h3 class="text-center"><i class=""></i>&nbsp;<i>Update Records</i></h3>

                    <hr/>

                    <!-- First Name -->
                    <div class="form-group">
                    <b>Firstname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="FirstName" name="fname" value="<?php echo $row['fname'];?>" placeholder="Enter your first name here..." maxlength="20" class="form-control" required>
                        </div>
                        <small id="FirstNameValidation" class="text-danger"></small>
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                    <b>Lastname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="LastName" name="lname" value="<?php echo $row['lname'];?>" placeholder="Enter your last name here..." maxlength="20" class="form-control" required>
                        </div>
                        <small id="LastNameValidation" class="text-danger"></small>
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                        <b>Gender</b>
                        <div class="input-group form-control ">
                            <span class="input-group-addon"><i class="fa fa-female"></i> | <i class="fa fa-male"></i></span>

                            <input type="radio" name="gender" value="female" <?php echo $row['gender'] == "female" ? "checked=checked" : ""; ?>>Female

                            <input type="radio" name="gender" value="male" <?php echo $row['gender'] == "male" ? "checked=checked" : ""; ?>>Male

                            <!-- <small id="lnValidation" class="text-danger"></small> -->
                        </div>
                    </div>

                    <!-- Contact No -->
                    <div class="form-group">
                    <b><i class="fa fa-phone"></i> Contact No.</b>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: green;">+91</span>
                            <input type="text" id="ContactNo" name="contact"  placeholder="Enter your contact no here..." maxlength="10" class="form-control" required value="<?php echo $row['contact'] ?>">
                        </div>
                        <small id="ContactNoValidation" class="text-danger"></small>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                    <b>Email</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" id="Email" name="email"  placeholder="Enter your email here..." class="form-control" required value="<?php echo $row['email'];?>">
                        </div>
                        <small id="EmailValidation" class="text-danger"></small>
                    </div>

                    <div class="form-group">
                        <b><i></i> Designation</b>
                        <!-- <div class="input-group"> -->
                            <select name="designation" class="form-control" id="designation" autoplay>
                            <!-- <option value="">please select any option</option> -->

                                <option value="Jr.Software Devloper" <?php echo $row['designation'] == "Jr.Software Devloper" ? "selected=selected" : ""; ?> class="form-control">Jr.Software Devloper</option>

                                <option value="Sr.Software Devloper" <?php echo $row['designation'] == "Sr.Software Devloper" ? "selected=selected" : ""; ?> class="form-control">Sr.Software Devloper</option>

                                <option value="Project Manager" <?php echo $row['designation'] == "Project Manager" ? "selected=selected" : ""; ?> class="form-control">Project Manager </option>

                                <option value="Business Analyst" <?php echo $row['designation'] == "Business Analyst" ? "selected=selected" : ""; ?> class="form-control"> Business Analyst</option>
                            </select>
                        <!-- </div> -->
                    </div>
                        <small id="DesignationValidation" class="text-danger"></small>
                    

                    <!-- Age -->
                    <div class="form-group">
                    <b>Age</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="Age" name="age" value="<?php echo $row['age'];?>" placeholder="Enter your age here..." maxlength="2" class="form-control" required>
                        </div>
                        <small id="AgeValidation" class="text-danger"></small>
                    </div>

                    <!-- File -->
                    <div class="form-group">
                        <b>File</b><BR>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="file" name="fileToUpload" value="<?php echo $row['file'];?>" class="form-control"  />
                            <div id="File"></div>
                        </div>                   
                        <span><b>Last uploaded:</b> <?=$row['file'];?></span>     
                        <!-- <input type="hidden" name="fileToUpdate" value="<//?hp echo $row['file'];?>" /><br> -->
						<label style="color: red;font-size:10px">(*/Only PDF,DOC and XLS files are allowed )</label>
                    </div>

                     <!-- Password -->
                    <div class="form-group">
                    <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" id="Password" name="password" placeholder="Enter your password here..." class="form-control">
                        </div>
                        <small id="PasswordValidation" class="text-danger"></small>
                    </div>

                    <!-- confirm password -->
                    <div class="form-group">
						<b>Confirm Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="cPassword" name="cpassword" type="password" placeholder="Enter confirm password here.." maxlength="12" class="form-control" />
						</div>
						<small id="cPasswordValidation" class="text-danger"></small>
					</div>


                    <center>
                        <div class="form-group">
                            <input id="BtnSignUp" class="btn btn-success" type="submit" value="Update" name="submit" value="Update">
                            <input type="button" value="Back" class="btn btn-primary" onclick="history.back()" />

                        </div>                        
                    </center>
                </div>
            </div>
        </div>
    </form>
  
</body>

</html>