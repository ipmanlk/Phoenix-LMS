<?php
require_once "./config/db_config.php";

class AssignmentSubmissionDao
{
    public static function getAll($test_id)
    {
        $tests = R::getAll("SELECT * FROM studentassignment WHERE test_id='$test_id'");
        return $tests;
    }

    public static function update($student_id, $test_id, $marks)
    {
        $tz = 'Asia/Colombo';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        $current_datetime = $dt->format('Y-m-d H:i:s');
        
        R::exec("UPDATE studentassignment SET marks = '$marks', checked_date = '$current_datetime' WHERE student_id='$student_id' AND test_id='$test_id'");
    }
}
