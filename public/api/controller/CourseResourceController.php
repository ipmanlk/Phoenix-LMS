<?php
require_once "FileController.php";
require_once "./dao/CourseResourceDao.php";

class CourseResourceController
{
    public static function save()
    {
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        $required = array("resource_name", "course_id", "instructor_id");
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

        $file_id = substr(hash("sha512", $data["resource_name"] . time()), 0, 10);
        $fileName = "resource-" . $data["course_id"] . "-" . $file_id . ".pdf";

        try {
            $resource_id = CourseResourceDao::save($data["resource_name"], $data["course_id"], $fileName);
            $uploaded = FileController::upload($tmpFileName, $fileName);
            if (!$uploaded) {
                CourseResourceDao::delete($resource_id);
                return json_encode(array("res_code" => "10"));
            }
            return json_encode(array("res_code" => "0"));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public function getAll($course_id)
    {
        $resources = CourseResourceDao::getAll($course_id);

        if (sizeof($resources) > 0) {
            return json_encode(array("res_code" => "0", "res_data" => $resources));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public function delete($course_id)
    {
        try {
            $data = CourseResourceDao::delete($course_id);
            if ($data !== 0) {
                FileController::delete($data["path"]);
                return json_encode(array("res_code" => "0", "res_data" =>  ""));
            } else {
                return json_encode(array("error_code" => "2"));
            }
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "5"));
        }
    }
}
