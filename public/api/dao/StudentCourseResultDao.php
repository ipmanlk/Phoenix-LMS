<?php

class StudentCourseResultDao
{
    public static function getAll($student_id, $course_id)
    {
        $data = array();
        $data["test"] = array();
        $data["assignment"] = array();

        $test_results = R::getAll("SELECT * FROM studenttest WHERE student_id='$student_id' AND marks <> '-1' AND test_id IN (SELECT id FROM test WHERE course_id='$course_id' AND testtype_id='1')");

        foreach ($test_results as $result) {
            $test_id = $result["test_id"];
            $test = R::getRow("SELECT * FROM test WHERE id = '$test_id'");
            unset($result["test_id"]);
            $result["test"] = $test;
            array_push($data["test"], $result);
        }

        $assignment_results = R::getAll("SELECT * FROM studentassignment WHERE student_id='$student_id' AND marks <> '-1' AND test_id IN (SELECT id FROM test WHERE course_id='$course_id' AND testtype_id='2')");

        foreach ($assignment_results as $result) {
            $test_id = $result["test_id"];
            $test = R::getRow("SELECT * FROM test WHERE id = '$test_id'");
            unset($result["test_id"]);
            $result["test"] = $test;
            array_push($data["assignment"], $result);
        }

        return $data;
    }
}
