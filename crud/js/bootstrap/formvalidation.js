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
				
				var TxtNameFlag=false,TxtContactNoFlag=false,TxtEmailIdFlag=false,TxtContactMsgFlag=false,TxtPassordMsgFlag=false,TxtcPasswordFlag=false,TxtAgeMsgFlag=false,TxtDOBFlag;
							
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
						TxtAgeFlag=false;
					}
					else{
						if(!$(this).val().match($AgeRegEx))
						{
							$("#AgeValidation").html("(*) Invalid Age..!!");
							TxtAgeFlag=false;
						}
						else{
							TxtAgeFlag=true;
						}
					}
				});



				
				$("#Password").blur(function(){
					$("#PasswordValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#PasswordValidation").html("(*)Password required..!!");
						TxtPasswordFlag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#PasswordValidation").html("(*) Invalid Password..!!");
							TxtPasswordFlag=false;
						}
						else{
							TxtPasswordFlag=true;
						}
					}
				});


				$("#cPassword").blur(function(){
					$("#cPasswordValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#cPasswordValidation").html("(*)Confirm Password required..!!");
						TxtcPasswordFlag=false;
					}
					else{
						if(!$(this).val()!= $("#Password").val())
						{
							$("#cPasswordValidation").html("(*)  Password not match..!!");
							TxtcPasswordFlag=false;
						}
						else{
							TxtcPasswordFlag=true;
						}
					}
				});
				


			});
		
		var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;