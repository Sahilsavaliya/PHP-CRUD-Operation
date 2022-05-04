<html>
    <head>
        <title>Registeration Form</title>
                
		<link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
		<link type="text/css" href="css/form.css"/>

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>

		<script type="text/javascript" src="js/bootstrap/formvalidation.js"> </script>
		<style>
			#CNAForms{box-shadow:0px 0px 3px blue; background-color: gainsboro; margin-top:30px;margin-bottom:30px;}
			i.fa,b{color:teal;}
		</style>
    </head>
    <body>

	<?php

	 require 'dbconnect1.php';
	//  require 'file.php';
	?>
	<form  method="POST"  enctype="multipart/form-data"  action="fprocess.php">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" id="CNAForms">
					<h3 class="text-center"><i class="fa fa-user-plus"></i> Create New Account</h3><hr/>
					<div class="form-group">
						<b>Firstname</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input id="Firstname" name="fname" type="text" placeholder="Enter firstname here.." maxlength="20" class="form-control" />
						</div>
						<small id="FirstnameValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Lastname</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input id="Lastname" name="lname" type="text" placeholder="Enter lastname here.." maxlength="20" class="form-control" />
						</div>
						<small id="LastnameValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Gender</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-female"></i> | <i class="fa fa-male"></i></span>
							<select id="DDL_Gender" name="gender" class="form-control">
								<option value='Female' >Female</option>
								<option value='Male'>Male</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<b><i class="fa fa-phone"></i> Contact No.</b>
						<div class="input-group">
							<span class="input-group-addon">+91</span>
							<input id="Contactno" name="contact" type="text" placeholder="Enter contact no. here.." maxlength="10" class="form-control" />
						</div>
						<small id="ContactnoValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Email</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input id="EmailId" name="email" type="text" placeholder="Enter email id here.." maxlength="50" class="form-control" />
						</div>
						<small id="EmailIdValidation" class="text-danger"></small>
					</div>

					<!-- <div class="form-group">
						<b>DOB</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input id="DOB" name="dob" type="text" maxlength="50" class="form-control" />
						</div>
						<small id="DOBValidation" class="text-danger"></small>
					</div> -->

					
					<div class="form-group">
                        <b><i class="fa fa-phone"></i> Designation</b>
                        <div class="input-group">
                            <select id="designation" name="designation" class="form-control">
                                <option value="">Choose Designation</option>
                                <option value="Jr.Software Devloper">Jr.Software Devloper</option>
                                <option value="Sr.Software Devloper">Sr.Software Devloper</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Business Analyst"> Business Analyst</option>
                            </select>
                        </div>
                        <small id="DesignationValidation" class="text-danger"></small>
                    </div>
				
			 
					<div class="form-group">
						<b>Age</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-child"></i></span>
							<input id="Age" name="age" type="text" maxlength="50" placeholder="Enter Your age here.." class="form-control" />
						</div>
						<small id="AgeValidation" class="text-danger"></small>
					</div>
					<!-- <div class="form-group">
					<b>File</b>
					<div class="input-group">
					 <input type="file" name="fileToUpload"  id="fileToUpload" style="border-radius: 5px;">
					 <span class="error" style="color: red;"><?//php echo $fileErr;?>
					</div>
					<small id="FileValidation" class="text-danger"></small>
					</div> -->

					<div class="form-group">
                        <b>File</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="file" name="fileToUpload" class="form-control" />
                            <div id=""></div>
                        </div>
                        <small id="FileValidation" class="text-danger"></small>
                    </div>

					<!-- <div class="form-group">
					<b>Country</b>
					<div class="input-group">
					<input type="checkbox" id="Country" name="Country[]" value="India">India<br/>
            		<input type="checkbox" id="Country" name="Country[]" value="USA">USA<br/>
            		<input type="checkbox" id="Country" name="Country[]" value="Australia">Australia<br/>
            		<input type="checkbox" id="Country" name="Country[]" value="Europe">Europe<br/>
           			<input type="checkbox" id="Country" name="Country[]" value="Italy">Italy<br/>
					</div>
					</div> -->


					<div class="form-group">
						<b>Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="Password" name="password" type="text" placeholder="Enter password here.." maxlength="12" class="form-control" />
						</div>
						<small id="PasswordValidation" class="text-danger"></small>
					</div>

					<div class="form-group">
						<b>Confirm Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="cPassword" name="cpassword" type="text" placeholder="Enter confirm password here.." maxlength="12" class="form-control" />
						</div>
						<small id="cPasswordValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<!-- <a class="btn btn-primary" ><i class="fa fa-user-plus" name="btn" style="color:white;"></i> Create New Account</a> -->
						<input type="submit" name="submit"  style="border-radius: 5px;">
						
						
					</div>
				</div>
			</div>
		</div>
	</form>
    </body>
</html>