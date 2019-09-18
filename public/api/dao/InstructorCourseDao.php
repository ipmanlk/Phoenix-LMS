<?php
require_once "./config/db_config.php";

class InstructorCourseDao
{
    public static function getAll($id)
    {
        $courses = R::getAll("SELECT * FROM course WHERE instructor_id = '$id'");
        return $courses;
    }
}
