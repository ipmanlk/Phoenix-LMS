<?php
require_once "./dao/TestDao.php";
require_once "QuestionController.php";
require_once "AnswerController.php";
require_once "./entitiy/Test.php";
require_once "./lib/extractor/Extractor.php";

class TestController
{
    public static function getAll()
    {
        $tests = TestDao::getAll();
        if (sizeof($tests) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $tests));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function getOne($id)
    {
        try {
            $test =  TestDao::getOne($id);
            return json_encode(array("res_code" => "0", "res_data" =>  $test));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public static function save()
    {
        // check if request method is post
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("test_name", "duration", "course_id", "description", "deadline", "testtype_id");

        $test = new Test();

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        if (!isset($data["questions"]) || empty($data["questions"])) return json_encode(array("error_code" => "-1"));

        // set properties
        $test->setTestName($data["test_name"]);
        $test->setDuration($data["duration"]);
        $test->setCourseId($data["course_id"]);
        $test->setDescription($data["description"]);
        $test->setDeadline($data["deadline"]);
        $test->setTesttypeId($data["testtype_id"]);

        // save to database
        try {
            $test_id = TestDao::save($test);
            foreach ($data["questions"] as $question => $answers) {
                $question_id = QuestionController::save($question, $test_id);
                foreach ($answers as $answer) {
                    $ans = $answer["answer"];
                    $is_correct = $answer["correct"];
                    AnswerController::save($question_id, $ans, $is_correct);
                }
            }
            return json_encode(array("res_code" => "0"));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "3"));
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
        $required = array("id", "test_name", "duration", "course_id", "description", "deadline");

        // create new test instance
        $test = new Test();

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // set properties
        $test->setId($data["id"]);
        $test->setTestName($data["test_name"]);
        $test->setDuration($data["duration"]);
        $test->setCourseId($data["course_id"]);
        $test->setDescription($data["description"]);
        $test->setDeadline($data["deadline"]);

        // save to database
        try {
            $id = TestDao::update($test);
            return json_encode(array("res_code" => "0", "res_data" =>  $id));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public static function delete($id)
    {
        try {
            $id = TestDao::delete($id);
            if ($id > 0) {
                return json_encode(array("res_code" => "0", "res_data" => ""));
            } else {
                return json_encode(array("error_code" => "2"));
            }
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "5"));
        }
    }
}
