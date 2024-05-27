<?php

require_once '../../../config/bootstrap_file.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $admin_id = $adminManager;

    $jobs_id = " ";
    if (isset($_POST['jobs_id'])) {
        $jobs_id = $utility_class_call::escape($_POST['jobs_id']);
    }

    $date = " ";
    if (isset($_POST['date'])) {
        $date = $utility_class_call::escape($_POST['date']);
    }

    $days = " ";
    if (isset($_POST['days'])) {
        $days = $utility_class_call::escape($_POST['days']);
    }

    // checking all paramater are passed
    if (
        $utility_class_call::validate_input($user_id) || $utility_class_call::validate_input($admin_id) || $utility_class_call::validate_input($jobs_id) || $utility_class_call::validate_input($date) || $utility_class_call::validate_input($days)
    ) {
        $text = $api_response_class_call::$invalidDataSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    //inserting into Database 
    $data = [
        "user_id" => $user_id,
        "admin_id" => $admin_id,
        "jobs_id" => $jobs_id, 
        "date" => $date,
        "days" => $days
    ];

    $StaffReview = $bookingDBCall::requestShift($data);

    if (!$StaffReview) {
        $text = $api_response_class_call::$errorAdded;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    $maindata = [];
    $text = $api_response_class_call::$shiftRequest;
    $api_status_code_class_call->respondOK($maindata, $text);
} else {
    $text = $api_response_class_call::$methodUsedNotAllowed;
    $errorcode = $api_error_code_class_call::$internalUserWarning;
    $maindata = [];
    $hint = ["Ensure to use the method stated in the documentation."];
    $linktosolve = "https://";
    $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
