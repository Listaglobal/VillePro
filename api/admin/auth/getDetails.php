<?php

use Firebase\JWT\JWT;

require_once '../../../config/bootstrap_file.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // Check for authorization
  $decodedToken = $api_status_code_class_call->ValidateAPITokenSentIN();
  $user_pubkey = $decodedToken->usertoken;

  $userid = $api_admin_table_class_call::checkIfIsAdmin($user_pubkey);
  // Unauthorized user
  if (!$userid) {
    $text = $api_response_class_call::$unauthorized_token;
    $errorcode = $api_error_code_class_call::$internalHackerFatal;
    $maindata = [];
    $hint = ["Only registered user can access this route"];
    $linktosolve = "https://";
    $api_status_code_class_call->respondUnauthorized($maindata, $text, $hint, $linktosolve, $errorcode);
  }

  // make database call to get all USers depending on paramaters passed
  $result = $api_admin_table_class_call::getUserByIdorEmailorUsername($userid);

  if ($result) {

    unset($result['password']);
    unset($result['updated_at']);
    unset($result['userpubkey']);
    unset($result['user_id']);

    $data = json_decode(json_encode($result), true);

    $maindata = $data;
    $text = $api_response_class_call::$getRequestFetched;
    $api_status_code_class_call->respondOK($maindata, $text);
  } else {
    $maindata = [];
    $text = $api_response_class_call::$getRequestNoRecords;
    $api_status_code_class_call->respondOK($maindata, $text);
  }
} else {
  $text = $api_response_class_call::$methodUsedNotAllowed;
  $errorcode = $api_error_code_class_call::$internalUserWarning;
  $maindata = [];
  $hint = ["Ensure to use the method stated in the documentation."];
  $linktosolve = "https://";
  $api_status_code_class_call->respondMethodNotAlowed($maindata, $text, $hint, $linktosolve, $errorcode);
}
