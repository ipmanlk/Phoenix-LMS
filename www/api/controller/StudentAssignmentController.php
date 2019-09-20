<?php
require_once "./dao/StudentAssignmentDao.php";
require_once "FileController.php";
require_once "./lib/extractor/Extractor.php";

class StudentAssignmentController
{
    public static function getAll($id)
    {
        $assignments = StudentAssignmentDao::getAll($id);
        if (sizeof($assignments) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $assignments));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function save()
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        $required = array("student_id", "test_id");
        $data = array();

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($_POST[$field]);
        }

        // check file is present
        if (!isset($_FILES['file']) || empty($_FILES['file'])) return "-1";

        $tmpFileName = $_FILES['file']['tmp_name'];

        // check file extension
        if (!FileController::checkExtension($_FILES['file']['name'], "pdf")) {
            return json_encode(array("error_code" => "9"));
        }

        $fileName = "assignment-" . $data["student_id"] . "-" . $data["test_id"] . ".pdf";

        try {
            StudentAssignmentDao::save($data["student_id"], $data["test_id"], $fileName);
            $uploaded = FileController::upload($tmpFileName, $fileName);
            if (!$uploaded) {
                StudentAssignmentDao::delete($data["student_id"], $data["test_id"]);
                return json_encode(array("res_code" => "10"));
            }
            return json_encode(array("res_code" => "0"));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }
}
