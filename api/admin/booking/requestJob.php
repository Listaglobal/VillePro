<?php

require_once '../../../config/bootstrap_file.php';

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

    $job_id = " ";
    if (isset($_POST['job_id'])) {
        $job_id = $utility_class_call::escape($_POST['job_id']);
    }

    $availability = " ";
    if (isset($_POST['availability'])) {
        $availability = $utility_class_call::escape($_POST['availability']);
    }

    $certificate = " ";
    if (isset($_FILES['certificate'])) {
        $certificate = $_FILES['certificate'];
    }

    $resume = " ";
    if (isset($_FILES['resume'])) {
        $resume = $_FILES['resume'];
    }


    // checking all paramater are passed
    if (
        $utility_class_call::validate_input($name) || $utility_class_call::validateEmail($email) || $utility_class_call::validate_input($location) || $utility_class_call::validate_input($job_id) || $utility_class_call::validate_input($availability) || $utility_class_call::validate_input($phoneNumber)
    ) {
        $text = $api_response_class_call::$invalidDataSent;
        $errorcode = "Internal Server Error";
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    $certificateUploaded = "";
    if (!is_array($certificate) ) {
        $text = $api_response_class_call::$certificateNoTSend;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }

    if ($certificate) {
        $path = $bookingDBCall::$imagePath;
        $certificateUploaded = $utility_class_call::uploadDocumentFile($certificate, $path);
    }

    $resumeUploaded = "";
    if (!is_array($resume) ) {
        $text = $api_response_class_call::$resumeNoTSend;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to the right user with right access add forum."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
    }
    
    if ($resume) {
        $path = $bookingDBCall::$imagePath;
        $resumeUploaded = $utility_class_call::uploadDocumentFile($resume, $path);
    }

    //inserting into Database 
    $data = [
        "name" => $name,
        "email" => $email,
        "job_id" => $job_id,
        "phonenumber" => $phoneNumber,
        "availability" => $availability,
        "certificate" => $certificateUploaded['name'],
        "location" => $location,
        "message" => $message,
        "resume" => $resumeUploaded['name'],
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
