<?php

require_once '../../../config/bootstrap_file.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for authorization
    $decodedToken = $api_status_code_class_call->ValidateAPITokenSentIN();
    $user_pubkey = $decodedToken->usertoken;

    $userid = $usersTableClassCall::checkIfUser($user_pubkey);
    // Unauthorized user
    if (!$userid) {
        $text = $api_response_class_call::$unauthorized_token;
        $errorcode = $api_error_code_class_call::$internalHackerFatal;
        $maindata = [];
        $hint = ["Only registered user can access this route"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondUnauthorized($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    $daysFrom = " ";
    if (isset($_POST['daysFrom'])) {
        $daysFrom = $utility_class_call::escape($_POST['daysFrom']);
    }

    $daysto = " ";
    if (isset($_POST['daysto'])) {
        $daysto = $utility_class_call::escape($_POST['daysto']);
    }

    $work_hour = " ";
    if (isset($_POST['work_hour'])) {
        $work_hour = $utility_class_call::escape($_POST['work_hour']);
    }

    // checking all paramater are passed

    if ($utility_class_call::validate_input($userid) || $utility_class_call::validate_input($daysFrom) || $utility_class_call::validate_input($daysto) ||  $utility_class_call::validate_input($work_hour)) {
        $text = $api_response_class_call::$invalidDataSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    //inserting into Database 
    $data = [
        "user_id" => $userid,
        "daysfrom" => $daysFrom,
        "daysto" => $daysto,
        "work_hour" => $work_hour
    ];

    $addPuPils = $availableDBCall::addRequest($data);

    if (!$addPuPils) {
        $text = $api_response_class_call::$errorAdded;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    $maindata = [];
    $text = $api_response_class_call::$requestSent;
    $api_status_code_class_call->respondOK($maindata, $text);
} else {
    $text = $api_response_class_call::$methodUsedNotAllowed;
    $errorcode = $api_error_code_class_call::$internalUserWarning;
    $maindata = [];
    $hint = ["Ensure to use the method stated in the documentation."];
    $linktosolve = "https://";
    $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
