<?php
require_once "./config/db_config.php";
require_once "StudentCourseDao.php";

class StudentAssignmentDao
{
    public static function getAll($student_id)
    {
        $data = array();
        $courses = StudentCourseDao::getAll($student_id);
        if (!sizeof($courses) > 0) return $data;
        $testtype = R::getAssocRow("SELECT * FROM testtype WHERE type = 'Assignment'");
        if (!sizeof($testtype) > 0) return $data;
        $testtype_id = $testtype[0]["id"];

        foreach ($courses as $course) {
            $course_id = $course["id"];
            $course_tests = R::getAssoc("SELECT * FROM test WHERE course_id = '$course_id' AND testtype_id='$testtype_id'");
            if (!sizeof($course_tests) > 0) continue;
            foreach ($course_tests as $id => $course_test) {
                $test_id = $id;
                $submission = R::getAssoc("SELECT * FROM studentassignment WHERE student_id = '$student_id' AND test_id='$test_id'");
                $is_submitted = (sizeof($submission) > 0) ? true : false;
                $data[] = array("id" => $test_id, "test_name" => $course_test["test_name"], "is_submitted" => $is_submitted, "duration" => $course_test["duration"], "description" => $course_test["description"], "deadline" => $course_test["deadline"]);
            }
        }

        return $data;
    }

    public static function save($student_id, $test_id, $path)
    {
        R::exec("INSERT INTO studentassignment(student_id, test_id, path, marks) VALUES('$student_id', '$test_id', '$path', '-1')");
        return 0;
    }

    public static function delete($student_id, $test_id)
    {
        R::exec("DELETE FROM studentassignment WHERE student_id = '$student_id' AND test_id = '$test_id'");
        return 0;
    }
}
