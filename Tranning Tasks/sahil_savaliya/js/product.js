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

            $('#ActiveValidation').html('Field is mandatory...!');
            var $FirstNameValidationFlag = false, $EmailValidationFlag = false, $PasswordValidationFlag = false, Category_IdValidationFlag = false,
            ActiveValidationFlag = false;

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

    // $("#designation").blur(function () {
    //     $("#DesignationValidation").empty();
    //     if ($(this).find("option:selected").text() == "") {
    //         $("#DesignationValidation").html("(*) Designation required..!!");
    //         DesignationValidationFlag = false;

    //     } else {

    //         DesignationValidationFlag = true;
    //     }
    // });

    // Category_Id Validation
    $('#category_id').blur(function () {
        $('#Category_IdValidation').empty();
        if ($(this).val() == '') {
            $('#Category_IdValidation').html('Field is mandatory...!');
            Category_IdValidationFlag = false;
        }else {

            Category_IdValidationFlag = true;
        }
    });

       // activite status Validation
       $('#active').blur(function () {
        $('#ActiveValidation').empty();
        if ($(this).val() == '') {
            $('#ActiveValidation').html('Field is mandatory...!');
            ActiveValidationFlag = false;
        }else {

            ActiveValidationFlag = true;
        }
    });

           // Image Validation
           $('#fileToUpload').blur(function () {
            $('#ImageValidation').empty();
            if ($(this).val() == '') {
                $('#ImageValidation').html('Field is mandatory...!');
            }
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

            // Category_Id Validation
    $('#category_id').blur(function () {
        $('#Category_IdValidation').empty();
        if ($(this).val() == '') {
            $('#Category_IdValidation').html('Field is mandatory...!');
            Category_IdValidationFlag = false;
        }
    });

       // activite status Validation
       $('#active').blur(function () {
        $('#ActiveValidation').empty();
        if ($(this).val() == '') {
            $('#ActiveValidation').html('Field is mandatory...!');
            ActiveValidationFlag = false;
        }
    });

           // Image Validation
           $('#fileToUpload').blur(function () {
            $('#ImageValidation').empty();
            if ($(this).val() == '') {
                $('#ImageValidation').html('Field is mandatory...!');
            }
        });


    });       
});