<?php
require_once "./dao/StudentCourseResultDao.php";

class StudentCourseResultController
{
    public static function getAll($student_id, $course_id)
    {
        $data = StudentCourseResultDao::getAll($student_id, $course_id);

        if (sizeof($data["test"]) > 0 || sizeof($data["assignment"]) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $data));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }
}
