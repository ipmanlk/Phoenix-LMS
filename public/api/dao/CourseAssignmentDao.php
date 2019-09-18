<?php
require_once "./config/db_config.php";

class CourseAssignmentDao
{
    public static function getAll($course_id)
    {
        $data = array();
        $testtype = R::getAssocRow("SELECT * FROM testtype WHERE type = 'Assignment'");
        if (!sizeof($testtype) > 0) return $data;
        $testtype_id = $testtype[0]["id"];
        $data = R::getAll("SELECT * FROM test WHERE course_id='$course_id' AND testtype_id='$testtype_id'");
        $tests = array();
        foreach ($data as $test) {
            $date = date_create($test["deadline"]);
            $test["deadline"] = date_format($date, "Y-m-d");
            $tests[] = $test;
        }
        return $tests;
    }
}
