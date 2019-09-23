<?php
require_once "./config/db_config.php";
require_once "StudentCourseDao.php";

class StudentTestDao
{
    public static function getAll($student_id)
    {
        $data = array();
        $courses = StudentCourseDao::getAll($student_id);
        if (!sizeof($courses) > 0) return $data;
        $testtype = R::getAssocRow("SELECT * FROM testtype WHERE type = 'MCQ'");
        if (!sizeof($testtype) > 0) return $data;
        $testtype_id = $testtype[0]["id"];

        foreach ($courses as $course) {
            $course_id = $course["id"];
            $course_tests = R::getAssoc("SELECT * FROM test WHERE course_id = '$course_id' AND testtype_id='$testtype_id'");
            // if there are no tests on that course continue
            if (!sizeof($course_tests) > 0) continue;
            foreach ($course_tests as $id => $course_test) {
                $test_id = $id;
                $submission = R::getAssoc("SELECT * FROM studenttest WHERE student_id = '$student_id' AND test_id='$test_id'");
                $is_submitted = (sizeof($submission) > 0) ? true : false;
                $data[] = array("id" => $test_id, "course_id" => $course_test["course_id"], "test_name" => $course_test["test_name"], "is_submitted" => $is_submitted, "duration" => $course_test["duration"], "description" => $course_test["description"], "deadline" => $course_test["deadline"]);
            }
        }

        return $data;
    }

    public static function update($student_id, $test_id, $marks)
    {
        $rows = R::getAll("SELECT * FROM studenttest WHERE test_id = '$test_id' AND student_id = '$student_id' AND marks <> '-1'");
        if (sizeof($rows) !== 0) {
            throw new Exception("Already submitted test!");
        }

        $tz = 'Asia/Colombo';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        $current_datetime = $dt->format('Y-m-d H:i:s');

        R::exec("UPDATE studenttest SET marks = '$marks', end_time = '$current_datetime' WHERE student_id = '$student_id' AND test_id = '$test_id'");
    }

    public static function save($student_id, $test_id)
    {
        R::exec("INSERT INTO studenttest (student_id, test_id, marks) VALUES('$student_id', '$test_id', '-1')");
    }
}
