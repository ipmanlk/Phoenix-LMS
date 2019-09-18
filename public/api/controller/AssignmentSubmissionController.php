<?php
require_once "./dao/AssignmentSubmissionDao.php";

class AssignmentSubmissionController
{
    public static function getAll($test_id)
    {
        $data = array();
        $data["submissions"] = array();
        $data["info"] = array();
        $assignments =  AssignmentSubmissionDao::getAll($test_id);

        foreach ($assignments as $as) {
            $student = StudentDao::getOne($as["student_id"]);
            $student["assignment"] = array("path" => $as["path"], "submit_date" => $as["submit_date"], "marks" => $as["marks"]);
            array_push($data["submissions"], $student);
        }

        $data["info"]["count"] = sizeof($assignments);

        if (sizeof($data) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $data));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function update()
    {
        // check request method 
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("student_id", "test_id", "marks");

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        AssignmentSubmissionDao::update($data["student_id"], $data["test_id"], $data["marks"]);

        try {
            return json_encode(array("res_code" => "0", "res_data" => ""));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }
}
