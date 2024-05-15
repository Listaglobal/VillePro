<?php

    use Config\Constants;
    use Firebase\JWT\JWT;
    
    require_once '../../config/bootstrap_file.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // add try and catch
        // Get the request body
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body);
    
        // Alldata sent in
        $name = "";
        if (isset($_POST['name'])) {
            $name = $utility_class_call::escape($_POST['name']);
        }
        $email = "";
        if (isset($_POST['email'])) {
            $email = $utility_class_call::escape($_POST['email']);
        }
        $phone = "";
        if (isset($_POST['phone'])) {
            $phone = $utility_class_call::escape($_POST['phone']);
        }   
        $location = "";
        if (isset($_POST['location'])) {
            $location = $utility_class_call::escape($_POST['location']);
        }   
        $team = "";
        if (isset($_POST['team'])) {
            $team = $utility_class_call::escape($_POST['team']);
        }        
        $message = "";
        if (isset($_POST['message'])) {
            $message = $utility_class_call::escape($_POST['message']);
        }
    
        // checking if field is empty
        if ($utility_class_call::validate_input($name) || $utility_class_call::validate_input($message) || $utility_class_call::validate_input($phone) || $utility_class_call::validate_input($team) || $utility_class_call::validate_input($location) ) {
            $text = $api_response_class_call::$invalidDataSent;
            $errorcode = $api_error_code_class_call::$internalUserWarning;
            $maindata = [];
            $hint = ["Ensure to send valid data to the API fields.", "pass in current and new password", "all fields should not be empty"];
            $linktosolve = "https://";
            $api_status_code_class_call->respondBadRequest($maindata, $text, $hint, $linktosolve, $errorcode);
        }
    
        //validate the email
        if(!$utility_class_call::validateEmail($email)){
            $text = $api_response_class_call::$invalidEmail;
            $errorcode = $api_error_code_class_call::$internalUserWarning;
            $maindata = [];
            $hint = ["Ensure to send valid data to the API fields.","pass in valid email", "all fields should not be empty"];
            $linktosolve = "https://";
            $api_status_code_class_call->respondBadRequest($maindata,$text,$hint,$linktosolve,$errorcode);
        }
        
        $userEmail = $email;
        
        $email = "";
        $emailFrom = "";
    
        
        $mailSent = $api_sns_email_class_call->sendContactUsEmail( $userEmail, $email, $name, $message, $country, $subject, $imageUrl );
    
        if (!$mailSent) {
            $text = "Error sending message";
            $errorcode = $api_error_code_class_call::$externalApiDetailsError;
            $maindata = [];
            $hint = ["Error from mail sender api", "Unable to send mail"];
            $linktosolve = "https://";
            $api_status_code_class_call->respondExternalError($maindata, $text, $hint, $linktosolve, $errorcode);
        }
        
        $mailSent2 = $api_sns_email_class_call->replyContactUsEmail( $emailFrom, $userEmail, $name, $message, $country, $subject, $imageUrl );
        
        if (!$mailSent2) {
            $text = "Error sending message";
            $errorcode = $api_error_code_class_call::$externalApiDetailsError;
            $maindata = [];
            $hint = ["Error from mail sender api", "Unable to send mail"];
            $linktosolve = "https://";
            $api_status_code_class_call->respondExternalError($maindata, $text, $hint, $linktosolve, $errorcode);
        }
    
        $text = "message sent successfully";
        $errorcode = $api_error_code_class_call::$internalInsertDBFatal;
        $maindata = [];
        $hint = ["Message sent successfully"];
        $linktosolve = "https://";
        $api_status_code_class_call->respondOK($maindata, $text, $hint, $linktosolve, $errorcode);
    } else {
        $text = $api_response_class_call::$methodUsedNotAllowed;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to use the method stated in the documentation."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
    }
?>