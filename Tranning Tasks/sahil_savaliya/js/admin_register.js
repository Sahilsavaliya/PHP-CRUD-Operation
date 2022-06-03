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

var $FirstNameValidationFlag = false, $EmailValidationFlag = false, $PasswordValidationFlag = false;

// Initializing JQuery
$(document).ready(function () {


    // First Name Validation
    $('#name').blur(function () {
        $('#NameValidation').empty();
        if ($(this).val() == '') {
            $('#NameValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($FNameLNameRegEx)) {
                $('#NameValidation').html('Invalid First Name...!');
            }
        }
    });

        // // Checkbox Validation
        // $('#hobbies').blur(function () {
        //     $('#CheckboxValidation').empty();
        //     if ($(this).val() == '') {
        //         $('#CheckboxValidation').html('Checkbox is required...!');
        //     }
        // });

    // Email Validation
    $('#email').blur(function () {
        $('#EmailValidation').empty();
        if ($(this).val() == '') {
            $('#EmailIdValidation').html('Field is mandatory...!');
        }
        else {
            if (!$(this).val().match($EmailIdRegEx)) {
                $('#EmailIdValidation').html('Invalid Email...!');
            }
        }
    });


    // Password Validation
    $('#password').blur(function () {
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


    // First Name Validation on Keypress
    $('#name').keypress(function (e) {
        $('#NameValidation').empty();
        var flag = false;
        var ascciValue = parseInt(e.which);
        if ((ascciValue >= 65 && ascciValue <= 90) || (ascciValue >= 97 && ascciValue <= 122)) {
            flag = true;
        }
        else {
            $('#NameValidation').html('Invalid Input...!');
        }
        return flag;
    });


    // All Field Validation when Submit button is clicked
    $('#BtnSignUp').click(function () {

        // First Name Validation
        $FirstNameValidationFlag = false;
        $('#NameValidation').empty();
        if ($('#name').val() == '') {
            $('#NameValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#name').val().match($FNameLNameRegEx)) {
                $('#NameValidation').html('Invalid Name...!');
            }
            else {
                $FirstNameValidationFlag = true;
            }
        }



        // Email Validation
        $EmailValidationFlag = false;
        $('#EmailIdValidation').empty();
        if ($('#email').val() == '') {
            $('#EmailIdValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#email').val().match($EmailIdRegEx)) {
                $('#EmailIdValidation').html('Invalid Email...!');
            }
            else {
                $EmailValidationFlag = true;
            }
        }

        // Password Validation
        $PasswordValidationFlag = false;
        $('#PasswordValidation').empty();
        if ($('#password').val() == '') {
            $('#PasswordValidation').html('Field is mandatory...!');
        }
        else {
            if (!$('#password').val().match($PasswordRegEx)) {
                $('#PasswordValidation').html('Invalid password...!');
            }
            else {
                $PasswordValidationFlag = true;
            }
        }

                // Checkbox Validation
                $('#CheckboxValidation').empty();
                if ($(this).val() == '') {
                    $('#CheckboxValidation').html('Field is mandatory...!');
                }
               
    });       
});