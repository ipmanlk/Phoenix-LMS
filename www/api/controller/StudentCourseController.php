<?php
require_once "./dao/StudentCourseDao.php";

class StudentCourseController
{
    public static function getAll($id)
    {
        $courses = StudentCourseDao::getAll($id);
        if (sizeof($courses) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $courses));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function save()
    {
        // check if request method is post
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("student_id", "invite_code");

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // save to database
        try {
            $code = StudentCourseDao::save($data["student_id"], $data["invite_code"]);
            if ($code > 0) {
                return json_encode(array("error_code" => "2"));
            }
            return json_encode(array("res_code" => "0"));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "3"));
        }
    }

    public static function delete($student_id, $course_id)
    {
        try {
            StudentCourseDao::delete($student_id, $course_id);
            return json_encode(array("res_code" => "0"));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }
}
