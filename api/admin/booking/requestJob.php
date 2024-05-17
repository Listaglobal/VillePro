<?php

require_once '../../../../config/bootstrap_file.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // data sent in the request
    $name = " ";
    if (isset($_POST['name'])) {
        $name = $utility_class_call::escape($_POST['name']);
    }

    $message = " ";
    if (isset($_POST['message'])) {
        $message = $utility_class_call::escape($_POST['message']);
    }

    $email = " ";
    if (isset($_POST['email'])) {
        $details = $utility_class_call::escape($_POST['email']);
    }

    $phoneNumber = " ";
    if (isset($_POST['phoneNumber'])) {
        $phoneNumber = $utility_class_call::escape($_POST['phoneNumber']);
    }

    $location = " ";
    if (isset($_POST['location'])) {
        $location = $utility_class_call::escape($_POST['location']);
    }

    $job = " ";
    if (isset($_POST['job'])) {
        $job = $utility_class_call::escape($_POST['job']);
    }

    $availability = " ";
    if (isset($_POST['availability'])) {
        $availability = $utility_class_call::escape($_POST['availability']);
    }

    $certificate = " ";
    if (isset($_FILES['certificate'])) {
        $certificate = $_FILES['certificate'];
    }


    // checking all paramater are passed
    if (
        $utility_class_call::validate_input($name) || $utility_class_call::validateEmail($email) || $utility_class_call::validate_input($location) || $utility_class_call::validate_input($job) || $utility_class_call::validate_input($availability) || $utility_class_call::validate_input($phoneNumber)
    ) {
        $text = $api_response_class_call::$invalidDataSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    $imageUploaded = "";
    if (!is_array($certificate)) {
        $text = $api_response_class_call::$imageNotSent;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    if ($file) {
        $path = $bookingDBCall::$imagePath;
        $imageUploaded = $utility_class_call::uploadDocumentFile($file, $path);
    }

    //inserting into Database 
    $data = [
        "name" => $name,
        "email" => $email,
        "job_id" => $job,
        "phonenumber" => $phoneNumber,
        "availability" => $availability,
        "file" => $imageUploaded['name'],
        "location" => $location,
        "message" => $message
        
    ];

    $StaffReview = $jobsDBCall::requestJobs($data);

    if (!$StaffReview) {
        $text = $api_response_class_call::$errorAdded;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    $maindata = [];
    $text = $api_response_class_call::$requestedSent;
    $api_status_code_class_call->respondOK($maindata, $text);
} else {
    $text = $api_response_class_call::$methodUsedNotAllowed;
    $errorcode = $api_error_code_class_call::$internalUserWarning;
    $maindata = [];
    $hint = ["Ensure to use the method stated in the documentation."];
    $linktosolve = "https://";
    $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
