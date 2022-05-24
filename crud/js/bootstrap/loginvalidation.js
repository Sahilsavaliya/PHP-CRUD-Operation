var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
			var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
			var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
            var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;

            $(document).ready(function(){			
				
				var TxtEmailIdFlag=false, TxtpasswordFlag=false;

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
				$("#Password").blur(function(){
					$("#PasswordValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#PasswordValidation").html("(*)Password required..!!");
						TxtpasswordFlag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#PasswordValidation").html("(*) Invalid Password..!!");
							TxtpasswordFlag=false;
						}
						else{
							TxtpasswordFlag=true;
						}
					}
				});
			});

			$('#Submit').click(function(){
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
				$("#Password").blur(function(){
					$("#PasswordValidation").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#PasswordValidation").html("(*)Password required..!!");
						TxtpasswordFlag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#PasswordValidation").html("(*) Invalid Password..!!");
							TxtpasswordFlag=false;
						}
						else{
							TxtpasswordFlag=true;
						}
					}
				});
			});
