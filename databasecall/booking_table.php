<?php

namespace DatabaseCall;

use Config;
use Config\Constants;
use Config\Mail_SMS_Responses;
use Config\Utility_Functions;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Booking_Table extends Config\DB_Connect
{
    /**
     * Get all the posts as an associative array
     *
     * 
     * @return array
     */

    /*
    If a data is not needed send empty to it, bank name and namk code should be join as bankname^bankcode

     */
    // APi functions
    public const  tableName = "booking";
    public static $baseurl = Constants::APP_BASE_URL;
    public static $assetUrl = Constants::APP_ASSET_PATH . "certificate/";
    private static $minId = 0;
    public static $imagePath = "certificate/";

    public static function getAllBooking($page, $offset, $noPerPage, $searchQuery, $sortQuery, $paramString, $params)
    {
        //input type checks if its from post request or just normal function call
        $connect = static::getDB();
        $alldata = [];

        $tableName = self::tableName;

        // SELECT * FROM `jobs` WHERE 1

        $query = "SELECT booking.*, staff.fullname as staff_fullname, staff.skills as staff_skills, staff.phoneno as staff_phoneno, staff.email as staff_email, admin.fullname as admin_fullname, jobs.name as jobs_name, jobs.details as jobs_details FROM `booking` LEFT JOIN staff on staff.staff_id = booking.user_id LEFT JOIN admin on admin.user_id = booking.admin_id LEFT JOIN jobs ON jobs.trackid = booking.jobs_id WHERE booking.user_id > ? $sortQuery $searchQuery";
        $checkdata = $connect->prepare($query);
        $checkdata->bind_param("s$paramString", self::$minId, ...$params);
        $checkdata->execute();
        $result = $checkdata->get_result();
        $total_numRow = $result->num_rows;
        $total_pages = ceil($total_numRow / $noPerPage);

        $paramString .= "ss";
        $params[] = $offset;
        $params[] = $noPerPage;

        $query = "$query ORDER BY $tableName.id DESC LIMIT ?,?";

        $checkdata = $connect->prepare($query);
        $checkdata->bind_param("s$paramString", self::$minId, ...$params);
        $checkdata->execute();
        $result = $checkdata->get_result();
        $numRow = $result->num_rows;

        if ($numRow > 0) {

            while ($row = $result->fetch_assoc()) {
                $row['id'] = $row['trackid'];

                $fullDate = Utility_Functions::gettheTimeAndDate(strtotime($row['created_at']));

                $row['created_at'] = $fullDate;

                unset($row['updated_at']);

                $data = json_decode(json_encode($row), true);

                array_push($alldata, $data);
            }

            $results = [
                'page' => $page,
                'per_page' => $noPerPage,
                'total_data' => $total_numRow,
                'totalPage' => $total_pages,
                'bookings' => $alldata
            ];

            return $results;
        }

        return false;
    }

    public static function getBooking($page, $offset, $noPerPage, $searchQuery, $sortQuery, $paramString, $params)
    {
        //input type checks if its from post request or just normal function call
        $connect = static::getDB();
        $alldata = [];

        $tableName = self::tableName;

        // SELECT * FROM `jobs` WHERE 1

        $query = "SELECT booking.*, staff.fullname as staff_fullname, staff.skills as staff_skills, staff.phoneno as staff_phoneno, staff.email as staff_email, admin.fullname as admin_fullname, jobs.name as jobs_name, jobs.details as jobs_details FROM `booking` LEFT JOIN staff on staff.staff_id = booking.user_id LEFT JOIN admin on admin.user_id = booking.admin_id LEFT JOIN jobs ON jobs.trackid = booking.jobs_id WHERE booking.user_id > ? $sortQuery $searchQuery ";
        $checkdata = $connect->prepare($query);
        $checkdata->bind_param("s$paramString", self::$minId, ...$params);
        $checkdata->execute();
        $result = $checkdata->get_result();
        $total_numRow = $result->num_rows;
        $total_pages = ceil($total_numRow / $noPerPage);

        $paramString .= "ss";
        $params[] = $offset;
        $params[] = $noPerPage;

        $query = "$query ORDER BY $tableName.id DESC LIMIT ?,?";

        $checkdata = $connect->prepare($query);
        $checkdata->bind_param("s$paramString", self::$minId, ...$params);
        $checkdata->execute();
        $result = $checkdata->get_result();
        $numRow = $result->num_rows;

        if ($numRow > 0) {

            while ($row = $result->fetch_assoc()) {
                $row['id'] = $row['trackid'];

                $fullDate = Utility_Functions::gettheTimeAndDate(strtotime($row['created_at']));

                $row['created_at'] = $fullDate;

                unset($row['updated_at']);

                $data = json_decode(json_encode($row), true);

                array_push($alldata, $data);
            }

            $results = [
                'page' => $page,
                'per_page' => $noPerPage,
                'total_data' => $total_numRow,
                'totalPage' => $total_pages,
                'bookings' => $alldata
            ];

            return $results;
        }

        return false;
    }

    public static function addJobs($data)
    {
        $connect = static::getDB();
        $trackid =  Utility_Functions::generateUniqueShortKey("jobs", "trackid");
        $status = 1;

        $params = [];
        $paramString = "";
        foreach ($data as $key => $val) {
            $params[] = $val;
            $paramString .= "s";
        }

        $query = "INSERT INTO `jobs`(`trackid`, `status`, `admin_id`, `name`, `details`, `location`, ) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ss$paramString", $trackid, $status, ...$params);
        $executed = $stmt->execute();
        if ($executed) {
            return true;
        } else {
            return false;
        }
    }

    public static function requestShift($data)
    {
        $connect = static::getDB();
        $trackid =  Utility_Functions::generateUniqueShortKey("booking", "trackid");
        $status = 1;

        $params = [];
        $paramString = "";
        foreach ($data as $key => $val) {
            $params[] = $val;
            $paramString .= "s";
        }

        $query = "INSERT INTO `booking`(`trackid`, `status`, `user_id`, `admin_id`, `jobs_id`, `date` , `days`, `work_hour` ) VALUES (?, ?, ?, ?, ?, ?, ? , ?)";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("ss$paramString", $trackid, $status, ...$params);
        $executed = $stmt->execute();
        if ($executed) {
            return true;
        } else {
            return false;
        }
    }
}
