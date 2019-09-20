<?php

require_once "./dao/CourseTestDao.php";
require "TestController.php";

class CourseTestController
{
    public static function getAll($course_id)
    {
        $tests = CourseTestDao::getAll($course_id);
        if (sizeof($tests) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $tests));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function update()
    {
        return TestController::update();
    }
}
