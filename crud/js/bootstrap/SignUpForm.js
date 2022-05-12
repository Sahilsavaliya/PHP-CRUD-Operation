//Regular Expression Declaration - Globally.
var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
var $FullNameRegEx = /^([a-zA-Z ]{2,40})$/;
var $BankAccountNameRegEx = /^([a-zA-Z ]{2,60})$/;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;

var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
var $ConNoRegEx = /^([0-9]{10})$/;
var $AgeRegEx = /^([0-9]{1,2})$/;
var $AadhaarNoRegEx = /^([0-9]{12})$/;
var $GSTNoRegEx = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
var $IndianDrivingLicenseNoRegEx = /^([A-Z]{2,3}[-/0-9]{8,13})$/;
var $IndianVehicleRegNoRegEx = /^([A-Z]{2}[0-9]{1,2}[A-Z]{1,3}[0-9]{1,4})$/;
var $PincodeRegEx = /^[1-9][0-9]{5,6}$/;
var $PANNoRegEx = /^[A-Z]{3}[ABCFGHLJPT][A-Z][0-9]{4}[A-Z]$/;
var $IFSCCodeRegEx = /^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
var $BankAccountNoRegEx = /^([0-9]{9,18})$/;
var $PostTitleRegex = /^(.{30,300})$/;
var $PostDescRegex = /^(.{100,3000})$/;
var $LatitudeLongitude = /^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,8})?|180(?:\.0{1,8})?)$/;
var $cpassword = $PasswordRegEx;

var $FirstNameValidationFlag = false, $LastNameValidationFlag = false, $ContactNoValidationFlag = false, $EmailValidationFlag = false, $PasswordValidationFlag = false, $cPasswordValidationFlag = false, $AgeValidationFlag = false;

// Initializing JQuery
$(document).ready(function () {

    // Designation Validation
    $('#Designation').blur(function () {
        $('#FirstNameValidation').empty();
        if ($(this).val() == '') {
            $('#DesignationValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($FNameLNameRegEx)) {
                $('#DesignationValidation').html('Invalid First Name...!');
            }
        }
    });

    // First Name Validation
    $('#FirstName').blur(function () {
        $('#FirstNameValidation').empty();
        if ($(this).val() == '') {
            $('#FirstNameValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($FNameLNameRegEx)) {
                $('#FirstNameValidation').html('Invalid First Name...!');
            }
        }
    });

    // Last Name Validation
    $('#LastName').blur(function () {
        $('#LastNameValidation').empty();
        if ($(this).val() == '') {
            $('#LastNameValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($FNameLNameRegEx)) {
                $('#LastNameValidation').html('Invalid Last Name...!');
            }
        }
    });

    // Phone Validation
    $('#ContactNo').blur(function () {
        $('#ContactNoValidation').empty();
        if ($(this).val() == '') {
            $('#ContactNoValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($ConNoRegEx)) {
                $('#ContactNoValidation').html('Invalid Contact Number...!');
            }
        }
    });



    // Email Validation
    $('#Email').blur(function () {
        $('#EmailValidation').empty();
        if ($(this).val() == '') {
            $('#EmailValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($EmailIdRegEx)) {
                $('#EmailValidation').html('Invalid Email...!');
            }
        }
    });

    // Password Validation
    $('#Password').blur(function () {
        $('#PasswordValidation').empty();
        if ($(this).val() == '') {
            $('#PasswordValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($PasswordRegEx)) {
                $('#PasswordValidation').html('Invalid password...!');
            }
        }
    });



    $("#cPassword").blur(function () {
        $("#cPasswordValidation").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#cPasswordValidation").html("(*) Confirm Password required..!!");
            cPasswordValidationFlag = false;
        }
        else {
            if ($(this).val() != $("#Password").val()) {
                $("#cPasswordValidation").html("(*) Password Does Not Match..!!");

                cPasswordValidationFlag = false;
            }

            else {
                cPasswordValidationFlag = true;
            }

        }

    });



    // Age Validation
    $('#Age').blur(function () {
        $('#AgeValidation').empty();
        if ($(this).val() == '') {
            $('#AgeValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($AgeRegEx)) {
                $('#AgeValidation').html('Invalid Age...!');
            }
        }
    });

    // First Name Validation on Keypress
    $('#FirstName').keypress(function (e) {
        $('#FirstNameValidation').empty();
        var flag = false;
        var ascciValue = parseInt(e.which);
        if ((ascciValue >= 65 && ascciValue <= 90) || (ascciValue >= 97 && ascciValue <= 122)) {
            flag = true;
        }
        else {
            $('#FirstNameValidation').html('Invalid Input...!');
        }
        return flag;
    });

    // Last Name Validation on Keypress
    $('#LastName').keypress(function (e) {
        $('#LastNameValidation').empty();
        var flag = false;
        var ascciValue = parseInt(e.which);
        if ((ascciValue >= 65 && ascciValue <= 90) || (ascciValue >= 97 && ascciValue <= 122)) {
            flag = true;
        }
        else {
            $('#LastNameValidation').html('Invalid Input...!');
        }
        return flag;
    });

    // Contact Number Validation on Keypress
    $('#ContactNo').keypress(function (e) {
        $('#ContactNoValidation').empty();
        var flag = false;
        var ascciValue = parseInt(e.which);
        if (ascciValue >= 48 && ascciValue <= 57) {
            flag = true;
        }
        else {
            $('#ContactNoValidation').html('Invalid Input...!');
        }
        return flag;
    });

    // Age Validation on Keypress
    $('#Age').keypress(function (e) {
        $('#AgeValidation').empty();
        var flag = false;
        var ascciValue = parseInt(e.which);
        if (ascciValue >= 48 && ascciValue <= 57) {
            flag = true;
        }
        else {
            $('#AgeValidation').html('Invalid Input...!');
        }
        return flag;
    });

    // All Field Validation when Submit button is clicked
    $('#BtnSignUp').click(function () {

        // First Name Validation
        $FirstNameValidationFlag = false;
        $('#FirstNameValidation').empty();
        if ($('#FirstName').val() == '') {
            $('#FirstNameValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#FirstName').val().match($FNameLNameRegEx)) {
                $('#FirstNameValidation').html('Invalid Name...!');
            }
            else {
                $FirstNameValidationFlag = true;
            }
        }

        // Last Name Validation
        $LastNameValidationFlag = false;
        $('#LastNameValidation').empty();
        if ($('#LastName').val() == '') {
            $('#LastNameValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#LastName').val().match($FNameLNameRegEx)) {
                $('#LastNameValidation').html('Invalid Name...!');
            }
            else {
                $LastNameValidationFlag = true;
            }
        }

        // Contact No Validation
        $ContactNoValidationFlag = false;
        $('#ContactNoValidation').empty();
        if ($('#ContactNo').val() == '') {
            $('#ContactNoValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#ContactNo').val().match($ConNoRegEx)) {
                $('#ContactNoValidation').html('Invalid Contact Number...!');
            }
            else {
                $ContactNoValidationFlag = true;
            }
        }

        // Email Validation
        $EmailValidationFlag = false;
        $('#EmailValidation').empty();
        if ($('#Email').val() == '') {
            $('#EmailValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#Email').val().match($EmailIdRegEx)) {
                $('#EmailValidation').html('Invalid Email...!');
            }
            else {
                $EmailValidationFlag = true;
            }
        }

        // Password Validation
        $PasswordValidationFlag = false;
        $('#PasswordValidation').empty();
        if ($('#Password').val() == '') {
            $('#PasswordValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#Password').val().match($PasswordRegEx)) {
                $('#PasswordValidation').html('Invalid password...!');
            }
            else {
                $PasswordValidationFlag = true;
            }
        }

        //confirm password validation
        $("#cPassword").blur(function () {
            $("#cPasswordValidation").empty();
            if ($(this).val() == "" || $(this).val() == null) {
                $("#cPasswordValidation").html("(*)Confirm Password required..!!");
                TxtcPasswordFlag = false;
            }
            else {
                if (!$(this).val() != $("#Password").val()) {
                    $("#cPasswordValidation").html("(*)  Password not match..!!");
                    TxtcPasswordFlag = false;
                }
                else {
                    TxtcPasswordFlag = true;
                }
            }
        });

        // Age Validation
        $AgeValidationFlag = false;
        $('#AgeValidation').empty();
        if ($('#Age').val() == '') {
            $('#AgeValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#Age').val().match($AgeRegEx)) {
                $('#AgeValidation').html('Invalid Age...!');
            }
            else {
                $AgeValidationFlag = true;
            }
        }
        //file validation
        $FileValidationFlag = false;
        $('#FileValidation').empty();
        if ($('#File').val() == '') {
            $('#FileValidation').html('Field is mandatory...!');
        }

        if ($FirstNameValidationFlag == true && $LastNameValidationFlag == true && $ContactNoValidationFlag == true && $EmailValidationFlag == true && $PasswordValidationFlag == true && $FileValidationFlag == true && TxtcPasswordFlag == true) {
            alert('Form Submitted Successfully...!');
        }
    });

        // First Name Validation
        $('#Designation').blur(function () {
            $('#FirstNameValidation').empty();
            if ($(this).val() == '') {
                $('#DesignationValidation').html('Field is mandatory...!');
            }
            else {
                if (!$(this).val().match($FNameLNameRegEx)) {
                    $('#DesignationValidation').html('Invalid First Name...!');
                }
            }
        });
});