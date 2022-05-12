<?php
session_start();
if(isset($_SESSION['email'])){
header('location:view.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SignUpForm</title>
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        
        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		
		<!--CDN LINK OF JQUERY PARENT PLUG IN - COMPULSORY TO BE HERE. -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
		
		<script src="Js/bootstrap/SignUpForm.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

        <style type="text/css">
            #SignUpForm {
                box-shadow: 0px 0px 5px green;
                margin-top: 20px;
                margin-bottom: 20px;
                background: white;
                border-top-right-radius: 25px;
                border-bottom-left-radius: 25px;
            }
            i.fa, i {
                color: green;
            }
            body {
                background-color: #666666;
            }
        </style>
    </head>
    <body>
    <?php
        require 'dbconnect1.php';
    ?>
    <form  name ="register" method="POST" enctype="multipart/form-data"  action="fprocess.php">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" id="SignUpForm">
                    <h3 class="text-center"><i class="fa fa-user-plus"></i>&nbsp;<i>Create New Account</i></h3>

                    <hr/>
                    <span style="color:red;text-align: center;">

                        <?php

                        if (isset($_REQUEST['pass'])) {

                            # code...

                            $pass = $_REQUEST['pass'];

                        ?>

                            <p> <?php echo $pass; ?></p>

                        <?php

                        } else {

                            $pass = "";

                        }

                        ?>

                    </span>
                    <hr>

                    <!-- First Name -->
                    <div class="form-group">
                    <b>Firstname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="FirstName" name="fname" placeholder="Enter your first name here..." maxlength="20" class="form-control" required>
                        </div>
                        <small id="FirstNameValidation" class="text-danger"></small>
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                    <b>Lastname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="LastName" name="lname" placeholder="Enter your last name here..." maxlength="20" class="form-control" required>
                        </div>
                        <small id="LastNameValidation" class="text-danger"></small>
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                    <b>Gender</b>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: green;"><i class="fa fa-female" ></i> | <i class="fa fa-male"></i></span>
                            <select id="Gender" name="gender" class="form-control" required>
								<option value='female'>Female</option>
								<option value='male'>Male</option>
							</select>
                        </div>
                        <small id="GenderValidation" class="text-danger"></small>
                    </div>

                    <!-- Contact No -->
                    <div class="form-group">
                    <b><i class="fa fa-phone"></i> Contact No.</b>
                        <div class="input-group">
                            <span class="input-group-addon" style="color: green;">+91</span>
                            <input type="text" id="ContactNo" name="contact" placeholder="Enter your contact no here..." maxlength="10" class="form-control" required>
                        </div>
                        <small id="ContactNoValidation" class="text-danger"></small>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                    <b>Email</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" id="Email" name="email" placeholder="Enter your email here..." class="form-control" required >
                        </div>
                        <small id="EmailValidation" class="text-danger"></small>
                    </div>

                    <div class="form-group">
                        <b><i></i> Designation</b>
                        <div class="input-group">
                            <select id="Designation" name="designation" class="form-control" required>
                                <option value="">Choose Designation</option>
                                <option value="Jr.Software Devloper">Jr.Software Devloper</option>
                                <option value="Sr.Software Devloper">Sr.Software Devloper</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Business Analyst"> Business Analyst</option>
                            </select>
                        </div>
                        <small id="DesignationValidation" class="text-danger"></small>
                    </div>

                    <!-- Age -->
                    <div class="form-group">
                    <b>Age</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="Age" name="age" placeholder="Enter your age here..." maxlength="2" class="form-control" required>
                        </div>
                        <small id="AgeValidation" class="text-danger"></small>
                    </div>

                    <!-- File -->
                    <div class="form-group">
                        <b>File</b><BR>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="file" id="checkfile" name="fileToUpload" class="form-control" required />
                            <div id="File"></div>
                        </div>
						<label style="color: red;font-size:10px">(*/ ONLY PDF,DOC,TEXT FILE )</label>
                        <small id="FileValidation" class="text-danger"></small>
                    </div>

                     <!-- Password -->
                    <div class="form-group">
                    <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" id="Password" name="password" placeholder="Enter your password here..." class="form-control" required>
                        </div>
                        <small id="PasswordValidation" class="text-danger"></small>
                    </div>

                    <!--Confirm Password -->
                    <div class="form-group">
						<b>Confirm Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="cPassword" name="cpassword" type="password" placeholder="Enter confirm password here.." maxlength="12" class="form-control" required />
						</div>
						<small id="cPasswordValidation" class="text-danger"></small>
					</div>

                    <center>
                        <div class="form-group">
                            <input id="BtnSignUp" class="btn btn-success" type="submit" value="Sign Up" name="submit" value="Sign Up">
                            <input type="button" value="Back" class="btn btn-primary" onclick="history.back()" />

                        </div>                        
                    </center>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>