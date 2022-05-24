<?php
session_start();	
if(isset($_SESSION['email'])){
header('location:view.php');
}

require 'dbconnect1.php';

if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

$sel="SELECT * FROM table1 where email='$email' AND password='$password' ";
// echo $sel;
$result=mysqli_query($conn,$sel);
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result)){
	$_SESSION["email"]=$email;
	header("location:view.php");
 }
}
else{
 echo "<center>"."Email And Password Not Valid."."</center>";
}
}
// else{
// 	echo"<center>". "Enter Email And Password!!!"."</center>";
// }

?>


<html>
    <head>
        <title>Login Form</title>
                
		<link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>

		<script type="text/javascript" src="js/bootstrap/loginvalidation.js"> </script>
		<link href="css/index.css" type="text/css" rel="stylesheet" />

		
    </head>
    <body>	
	<form  method="POST">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" id="CNAForms">
					<h3 class="text-center"><i class="fa fa-user-plus"></i> Login Form</h3><hr/>
					<div class="form-group">
						<b>Email</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input id="EmailId" name="email" type="text" placeholder="Enter email id here.." maxlength="50" class="form-control" required>
						</div>
						<small id="EmailIdValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<b>Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="Password" name="password" type="password" placeholder="Enter password here.." maxlength="12" class="form-control" required>
						</div>
						<small id="PasswordValidation" class="text-danger"></small>
					</div>
					<div class="form-group">
						<!-- <a class="btn btn-primary" ><i class="fa fa-user-plus" name="btn" style="color:white;"></i> Create New Account</a> -->
						<input type="submit" id="Submit" name="submit" class="btn btn-primary" value="Login" style="border-radius: 5px;">
						
					</div>
                    <div>
						<a href="signupform.php">Registeration</a>
					</div>
				</div>
			</div>
		</div>
	</form>
    </body>
</html>