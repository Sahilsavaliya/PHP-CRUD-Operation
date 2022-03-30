<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
 

    <style type="text/css">
			#CNAForms{box-shadow:0px 0px 3px blue; background-color: gainsboro; margin-top:30px;margin-bottom:30px;}
			i.fa,b{color:teal;}
		</style>
</head>
<body>
    <?php
require 'dbconnect1.php';

 session_start();
 $id = isset($_GET['id']) ? $_GET['id'] : '';
// echo"$id"; 
$query = "SELECT * FROM `table1` WHERE id=$id";
//  $query= "SELECT 'id', 'Firstname', 'Lastname', 'Gender', 'Contact', 'Email', 'DOB', 'Age', 'Password' FROM 'table1' WHERE  'id'= $id";
//  echo"$query";


 $result=mysqli_query($conn,$query);
 $row=mysqli_fetch_assoc($result);
//  var_dump($row);


  ?>

<form  method="GET"  action="update.php" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" id="CNAForms">
					<h3 class="text-center"><i class="fa fa-user-plus"></i> Create New Account</h3><hr/>
					<div class="form-group">
						<b>Firstname</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input id="Firstname" name="fname" type="text" placeholder="Enter firstname here.." maxlength="20" class="form-control"
                            value="<?php echo $row['fname'];?>" />
						</div>
						<small id="FirstnameValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Lastname</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input id="Lastname" name="lname" type="text" placeholder="Enter lastname here.." maxlength="20" class="form-control" 
                            value="<?php echo $row['lname'];?>"/>
						</div>
						<small id="LastnameValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Gender</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-female"></i> | <i class="fa fa-male"></i></span>
							<select id="DDL_Gender" name="gender" class="form-control">
								<option value="male" <?php if($row['gender']=="male"){echo "checked";} ?>>Female</option>
								<option value="female" <?php if($row['gender']=="female"){echo "checked";} ?>>Male</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<b><i class="fa fa-phone"></i> Contact No.</b>
						<div class="input-group">
							<span class="input-group-addon">+91</span>
							<input id="Contactno" name="contact" type="text" placeholder="Enter contact no. here.." maxlength="10" class="form-control"
                            value="<?php echo $row['contact'];?>" />
						</div>
						<small id="ContactnoValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Email</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input id="EmailId" name="email" type="text" placeholder="Enter email id here.." maxlength="50" class="form-control"
                            value="<?php echo $row['email'];?>" />
						</div>
						<small id="EmailIdValidation" class="text-danger"></small>
					</div>

					<div class="form-group">
						<b>DOB</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input id="DOB" name="dob" type="text" maxlength="50" class="form-control"
                            value="<?php echo $row['dob'];?>" />
						</div>
						<small id="DOBValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Age</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-child"></i></span>
							<input id="Age" name="age" type="text" maxlength="50" placeholder="Enter Your age here.." class="form-control" 
                            value="<?php echo $row['age'];?>"/>
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


					<div class="form-group">
						<b>Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="Password" name="password" type="text" placeholder="Enter password here.." maxlength="12" class="form-control" 
                            value="<?php echo $row['password'];?>"/>
						</div>
						<small id="PasswordValidation" class="text-danger"></small>
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