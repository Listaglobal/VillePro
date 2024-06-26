<?php

namespace Config;

use Config\Constants;

/**
 * System Messages Class
 *
 * PHP version 5.4
 */
class API_User_Response
{

    /**
     * Welcome message
     *
     * @var string
     */
    // General errors
    public  static $methodUsedNotAllowed = "Method Used is not valid";
    public  static $invalidDataSent = "Please insert all required data";
    public  static $invalidURLSent = "Invalid URL";
    public  static $invalidEstateType = "Invalid estate type passed";
    public  static $invalidUserDetail = "Invalid username or password";
    public  static $emailAlreadyVerified = "Email already verified";
    public  static $phoneAlreadyVerified = "Phone already verified";
    public  static $unabletogetUserDetail = "Unable to get user details";
    public  static $invalidUseridentity = "User with account not found";
    public  static $invalidPin = "Invalid Pin";
    public static $invalidLink = "Invalid link Sent";
    public static $invalidTrackid = "Invalid Trackid";
    public  static $userBanned = "Your account has been banned";
    public  static $loginSuccessful = "LogIn SuccessFully";
    public  static $userExist = "User exists";
    public  static $userDoesNotExist = "User does not exist";
    public  static $userWithEmailDoesNotExist = "User with details does not exist";
    public  static $unauthorized_token = "Unauthorized user (401)";
    public  static $invalidJoinid = "Invalid  join estate id";
    public  static $invalidPassword = "Invalid password";
    public  static $incorrectPassword = "Incorrect password";
    public  static $invalidEmail = "Invalid email";
    public  static $EmailExist = "Email already exist";
    public  static $usernameExist = "Username already exist";
    public  static $invalidPhone = "Invalid phone number";
    public  static $phoneExist = "Phone number already exist";
    public  static $weakPassword = "Password too weak";
    public  static $passRequirementNotMet = "Password must be up to 6 characters";
    public static $RegisterFail = "Unable to register";
    public static $unauthorized_user = "Login expired, kindly login (401)";
    public static $unableToVerified = "Unable to verify mail";
    public static $suspendReason = "Your account has been suspended";
    public static $frozenAccount = "Your account has been frozen";
    public static $bannedAccount = "Your account has been banned";
    public static $userNotAllowed = "User not allowed";
    public static $deletedAccount = "(401) Your account has been deleted";
    public static $errorAdded = "Error Occured";
    public static $getRequestFetched = "Request fetched successfully";
    public static $getRequestNoRecords = "No records found";
    public static $imageNotSent = "Image not sent";
    public static $fileTooLarge = "File too large";
    public static $fileTypeNotAllowed = "File type not allowed";
    public static $unknownErrorFileUpload = "Unable to upload file";
    public static $staffCreated = "Staff created successfully";
    public static $imageTypeNotAllowed = "Image type not allowed";
    public static $unknownErrorImgeUpload = "Unable to upload image";
    public static $imageTooLarge = "Image too large";
    public static $certificateNoTSend = "Certificate not sent";
    public static $resumeNoTSend = "Resume not sent";
    public static $adminCreated = "Admin created successfully";
    public static $adminUpdated = "Admin Updated successfully";



    // login status
    public static $accountSuspended = "Your account has been suspended";
    public static $accountFrozen = "Your account has been frozen";
    public static $accountBanned = "Your account has been banned";
    public static $loginFailedError = "Login Failed";

    // Jobs
    public static $jobAdded = "Job added successfully";
    public static $requestedSent = "Request sent successfully, YOu will be contacted soon";
    public static $shiftRequest = "Shift request sent successfully";

    // request 
    public static $requestSent = "Request Sent, Awaiting Approval";
    public static $invalidStatus = "Invalid Status Passed";
    public static $dbUpdatingError = "Error While Updating";
    public static $statusChangedMessage = "Request Status Changed";
    public static $statusChanged = "Admin Status Changed";
    
}
