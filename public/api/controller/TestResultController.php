<?php
require_once "./dao/TestResultDao.php";
require_once "./dao/StudentDao.php";

class TestResultController
{
    public static function getAll($test_id)
    {
        $data = array();
        $data["submissions"] = array();
        $data["info"] = array();

        $tests = TestResultDao::getAll($test_id);

        foreach ($tests as $test) {
            $student = StudentDao::getOne($test["student_id"]);
            $student["result"] = array("marks" => $test["marks"], "start_time" => $test["start_time"], "end_time" => $test["end_time"]);
            array_push($data["submissions"], $student);
        }

        $data["info"]["count"] = sizeof($tests);

        if (sizeof($data) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $data));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }
}
