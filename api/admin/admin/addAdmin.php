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
    $fullname = " ";
    if (isset($_POST['fullname'])) {
        $fullname = $utility_class_call::escape($_POST['fullname']);
    }

    $email = " ";
    if (isset($_POST['email'])) {
        $email = $utility_class_call::escape($_POST['email']);
    }

    $phoneNumber = " ";
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = $utility_class_call::escape($_POST['phoneNumber']);
    }

    $level = " ";
    if (isset($_POST['level'])) {
        $level = $utility_class_call::escape($_POST['level']);
    }

    $image = " ";
    if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
    }

    $password = " ";
    if (isset($_POST['password'])) {
        $password = $utility_class_call::escape($_POST['password']);
    }


    // checking all paramater are passed
    if ($utility_class_call::validate_input($fullname) || $utility_class_call::validate_input($email) ||
        $utility_class_call::validate_input($phoneNumber) ||  $utility_class_call::validate_input($level) ||  $utility_class_call::validate_input($password) ) {
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
        $path = $api_admin_table_class_call::$imagesPath;
        $imageUploaded = $utility_class_call::uploadImage($image, $path);
    }

    //inserting into Database 
    $data = [
        "email" => $email,
        "profile_pic" => $imageUploaded,
        "fullname" => $fullname,
        "phoneno" => $phoneNumber,
        "level" => $level,
        "password" => $password
    ];

    $addStaff = $api_admin_table_class_call::addAdmin($data);

    if (!$addStaff) {
        $text = $api_response_class_call::$errorAdded;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    $maindata = [];
    $text = $api_response_class_call::$adminCreated;
    $api_status_code_class_call->respondOK($maindata, $text);
} else {
    $text = $api_response_class_call::$methodUsedNotAllowed;
    $errorcode = $api_error_code_class_call::$internalUserWarning;
    $maindata = [];
    $hint = ["Ensure to use the method stated in the documentation."];
    $linktosolve = "https://";
    $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
