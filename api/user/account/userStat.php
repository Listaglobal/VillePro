<?php 

    require_once '../../../config/bootstrap_file.php';
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
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

        // get the details of the estate
        $details = $usersTableClassCall::getUserStat($userid);

        if ( $details ){

            $maindata= $details;
            $text = $api_response_class_call::$getRequestFetched;
            $api_status_code_class_call->respondOK($maindata,$text);
        }else{
            $maindata= [];
            $errorcode = $api_error_code_class_call::$internalHackerFatal;
            $hint = ["Only the right user with right access have ability to add tenants."];
            $linktosolve = "https://";
            $text = $api_response_class_call::$getRequestNoRecords;
            $api_status_code_class_call->respondOKButFailed($maindata, $text, $hint, $linktosolve, $errorcode);
        }

    }else{
        $text = $api_response_class_call::$methodUsedNotAllowed;
        $errorcode = $api_error_code_class_call::$internalUserWarning;
        $maindata = [];
        $hint = ["Ensure to use the method stated in the documentation."];
        $linktosolve = "https://";
        $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
    }

?>