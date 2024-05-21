<?php

require_once '../../../config/bootstrap_file.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check Authorization
    $decodedToken = $api_status_code_class_call->ValidateAPITokenSentIN();
    $admin_pubkey = $decodedToken->usertoken;

    $adminManager = $api_admin_table_class_call::checkIfIsAdmin($admin_pubkey);

    if (!$adminManager) {
        $text = $api_response_class_call::$unauthorized_token;
        $errorcode = $api_error_code_class_call::$internalHackerFatal;
        $maindata = [];
        $hint = ["Only registered user can access this route"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondUnauthorized($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    // data sent in the request
    $name = " ";
    if (isset($_POST['name'])) {
        $name = $utility_class_call::escape($_POST['name']);
    }

    $email = " ";
    if (isset($_POST['email'])) {
        $email = $utility_class_call::escape($_POST['email']);
    }

    $phoneNumber = " ";
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = $utility_class_call::escape($_POST['phoneNumber']);
    }

    $location = " ";
    if (isset($_POST['location'])) {
        $location = $utility_class_call::escape($_POST['location']);
    }

    $skills = " ";
    if (isset($_POST['skills'])) {
        $skills = $utility_class_call::escape($_POST['skills']);
    }

    $image = " ";
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
    }

    $availability = " ";
    if (isset($_POST['availability'])) {
        $availability = $utility_class_call::escape($_POST['availability']);
    }

    $password = " ";
    if (isset($_POST['password'])) {
        $password = $utility_class_call::escape($_POST['password']);
    }

    // checking all paramater are passed

    if ($utility_class_call::validate_input($name) ||
        $utility_class_call::validate_input($location) ||  $utility_class_call::validate_input($phoneNumber)  || $utility_class_call::validate_input($availability) || $utility_class_call::validate_input($email) || $utility_class_call::validate_input($password) ) {
        $text = $api_response_class_call::$invalidDataSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }


    if (!$utility_class_call::validateEmail($email)) {
        $text = $api_response_class_call::$invalidDataSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }


    $imageUploaded = "";
    if (!is_array($image)) {
        $text = $api_response_class_call::$imageNotSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    if ($image) {
        $path = $bookingDBCall::$imagePath;
        $imageUploaded = $utility_class_call::uploadImage($image, $path);
    }

    //inserting into Database 
    $data = [
        "email" => $email,
        "image" => $imageUploaded,
        "name" => $name,
        "skills" => $skills,
        "availability" => $availability,
        "phoneNumber" => $phoneNumber,
        "location" => $location,
        "password" => $password
    ];

    $addStaff = $usersTableClassCall::addStaff($data);

    if (!$addStaff) {
        $text = $api_response_class_call::$errorAdded;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    $maindata = [];
    $text = $api_response_class_call::$staffCreated;
    $api_status_code_class_call->respondOK($maindata, $text);
} else {
    $text = $api_response_class_call::$methodUsedNotAllowed;
    $errorcode = $api_error_code_class_call::$internalUserWarning;
    $maindata = [];
    $hint = ["Ensure to use the method stated in the documentation."];
    $linktosolve = "https://";
    $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
