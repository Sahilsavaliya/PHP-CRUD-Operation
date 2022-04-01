<html>
    <head>
        <title>Registeration Form</title>
                
		<link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>


		
		<script type="text/javascript">

var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
			var $FullNameRegEx = /^([a-zA-Z ]{2,40})$/;
			var $BankAccountNameRegEx = /^([a-zA-Z ]{2,60})$/;
			var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;

			var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
			var $ConNoRegEx = /^([0-9]{10})$/;
			var $AgeRegEx = /^([0-9]{1,2})$/;
			var $AadhaarNoRegEx = /^([0-9]{12})$/;
			var $GSTNoRegEx=/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
			var $IndianDrivingLicenseNoRegEx = /^([A-Z]{2,3}[-/0-9]{8,13})$/;
			var $IndianVehicleRegNoRegEx = /^([A-Z]{2}[0-9]{1,2}[A-Z]{1,3}[0-9]{1,4})$/;
			var $PincodeRegEx = /^[1-9][0-9]{5,6}$/;
			var $PANNoRegEx = /^[A-Z]{3}[ABCFGHLJPT][A-Z][0-9]{4}[A-Z]$/;
			var $IFSCCodeRegEx = /^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
			var $BankAccountNoRegEx = /^([0-9]{9,18})$/;
			var $PostTitleRegex =/^(.{30,300})$/;
			var $PostDescRegex = /^(.{100,3000})$/;
			var $LatitudeLongitude=/^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,8})?|180(?:\.0{1,8})?)$/;
		

			$(document).ready(function(){			
				
				var TxtNameFlag=false,TxtContactNoFlag=false,TxtEmailIdFlag=false,TxtContactMsgFlag=false,TxtDOBFlag;
							
				$("#Firstname").blur(function(){
					$("#FirstnameValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#FirstnameValidation").html("(*) Firstname required..!!");
						TxtNameFlag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#FirstnameValidation").html("(*) Invalid firstname..!!");
							TxtNameFlag=false;
						}
						else{
							TxtNameFlag=true;
						}
					}
				});

				$("#Lastname").blur(function(){
					$("#LastnameValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#LastnameValidation").html("(*) Firstname required..!!");
						TxtNameFlag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#LastnameValidation").html("(*) Invalid firstname..!!");
							TxtNameFlag=false;
						}
						else{
							TxtNameFlag=true;
						}
					}
				});
				var $ConNoRegEx = /^([0-9]{10})$/;

				$("#Contactno").blur(function(){
					$("#ContactnoValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#ContactnoValidation").html("(*) Contact no. required..!!");
						TxtContactNoFlag=false;
					}
					else{
						if(!$(this).val().match($ConNoRegEx))
						{
							$("#ContactnoValidation").html("(*) Invalid contact no..!!");
							TxtContactNoFlag=false;
						}
						else{
							TxtContactNoFlag=true;
						}
					}
				});
				 

				$("#EmailId").blur(function(){
					$("#EmailIdValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#EmailIdValidation").html("(*) Email id required..!!");
						TxtEmailIdFlag=false;
					}
					else{
						if(!$(this).val().match($EmailIdRegEx))
						{
							$("#EmailIdValidation").html("(*) Invalid email id..!!");
							TxtEmailIdFlag=false;
						}
						else{
							TxtEmailIdFlag=true;
						}
					}
				});

				$("#DOB").blur(function(){
					$("#DOBValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#DOBValidation").html("(*) DOB id required..!!");
						TxtDOBFlag=false;
					}
				});

				$("#DOB").datepicker({
					changeMonth:true,
					changeYear:true,
					// yearRange:"1960:2022",
					maxDate:"-18y",
					
				});

				
				$("#Age").blur(function(){
					$("#AgeValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#AgeValidation").html("(*) Age id required..!!");
						TxtEmailIdFlag=false;
					}
					else{
						if(!$(this).val().match($AgeRegEx))
						{
							$("#AgeValidation").html("(*) Invalid Age..!!");
							TxtEmailIdFlag=false;
						}
						else{
							TxtEmailIdFlag=true;
						}
					}
				});



				
				$("#Password").blur(function(){
					$("#PasswordValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#PasswordValidation").html("(*)Password required..!!");
						TxtEmailIdFlag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#PasswordValidation").html("(*) Invalid Password..!!");
							TxtEmailIdFlag=false;
						}
						else{
							TxtEmailIdFlag=true;
						}
					}
				});

				


			});
		</script>
		<script>var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;</script>
		
		<style type="text/css">
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
								<option value='F'>Female</option>
								<option value='M'>Male</option>
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

					<div class="form-group">
						<b>DOB</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
							<input id="DOB" name="dob" type="text" maxlength="50" class="form-control" />
						</div>
						<small id="DOBValidation" class="text-danger"></small>
					</div>

					
					<!-- <div class="form-group">
                        <b><i class="fa fa-phone"></i> Designation</b>
                        <div class="input-group">
                            <select id="Designation" name="Designation" class="form-control">
                                <option value="">Choose Designation</option>
                                <option value="Jr.Software Devloper">Jr Devloper</option>
                                <option value="Sr.Software Devloper">Sr Devloper</option>
                                <option value="Project Manager">Associate Jr.Software Devloper</option>
                                <option value="Business Analyst"> Business Analyst</option>
                            </select>
                        </div>
                        <small id="DesignationValidation" class="text-danger"></small>
                    </div> -->
				
			 
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


					<div class="form-group">
						<b>Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="Password" name="password" type="text" placeholder="Enter password here.." maxlength="12" class="form-control" />
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