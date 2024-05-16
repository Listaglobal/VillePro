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
class Jobs_Table extends Config\DB_Connect
{
    /**
     * Get all the posts as an associative array
     *
     * @return array
     */

    /*
    If a data is not needed send empty to it, bank name and namk code should be join as bankname^bankcode

     */
    // APi functions
    public const  tableName = "jobs";
    public static $baseurl = Constants::APP_BASE_URL;
    public static $assetUrl = Constants::APP_ASSET_PATH . "task/";
    private static $minId = 0;
    // public static $imagePath = "payroll/";

    public static function getAllJobs($page, $offset, $noPerPage, $searchQuery, $sortQuery, $paramString, $params)
    {
        //input type checks if its from post request or just normal function call
        $connect = static::getDB();
        $alldata = [];

        $tableName = self::tableName;

        // SELECT * FROM `jobs` WHERE 1
        

        $query = "SELECT $tableName.*, admin.fullname as fullname, admin.profile_pic as profile_pic  FROM $tableName LEFT JOIN admin ON $tableName.admin_id = admin.user_id WHERE $tableName.id > ? $sortQuery $searchQuery";
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
                'jobs' => $alldata
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
}
