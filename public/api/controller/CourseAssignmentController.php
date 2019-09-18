<?php

require_once "./dao/CourseAssignmentDao.php";

class CourseAssignmentController
{
    public static function getAll($course_id)
    {
        $assignments = CourseAssignmentDao::getAll($course_id);
        if (sizeof($assignments) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $assignments));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }
}
