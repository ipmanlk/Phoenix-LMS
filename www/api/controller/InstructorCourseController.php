<?php
require_once "./dao/InstructorCourseDao.php";

class InstructorCourseController {
    public static function getAll($id)
    {
        $courses = InstructorCourseDao::getAll($id);
        if (sizeof($courses) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $courses));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }
}
?>