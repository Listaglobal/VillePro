<?php

use Config;
use Config\Constants;
use Config\Utility_Functions;

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
    $user_id = " ";
    if (isset($_POST['user_id'])) {
        $user_id = $utility_class_call::escape($_POST['user_id']);
    }

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
    if ( $utility_class_call::validate_input($user_id) || $utility_class_call::validate_input($fullname) || $utility_class_call::validate_input($email) ||
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

    $hashPassword = Utility_Functions::Password_encrypt($password);
    //inserting into Database 
    $data = [
        
        "email" => $email,
        "profile_pic" => $imageUploaded,
        "fullname" => $fullname,
        "phoneno" => $phoneNumber,
        "level" => $level,
        "password" => $password,
        "user_id" => $user_id,
    ];

    $addStaff = $api_admin_table_class_call::updateAdmin($email, $imageUploaded, $fullname, $hashPassword, $level,$phoneNumber, $user_id);

    if (!$addStaff) {
        $text = $api_response_class_call::$errorAdded;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    $maindata = [];
    $text = $api_response_class_call::$adminUpdated;
    $api_status_code_class_call->respondOK($maindata, $text);
} else {
    $text = $api_response_class_call::$methodUsedNotAllowed;
    $errorcode = $api_error_code_class_call::$internalUserWarning;
    $maindata = [];
    $hint = ["Ensure to use the method stated in the documentation."];
    $linktosolve = "https://";
    $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
