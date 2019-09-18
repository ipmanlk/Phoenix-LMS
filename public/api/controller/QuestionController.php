<?php
require_once "./dao/QuestionDao.php";
require_once "./entitiy/Quesetion.php";
require_once "./lib/extractor/Extractor.php";

class QuestionController
{
    public static function getOne($id)
    {
        $question = QuestionDao::getOne($id);
        if ($question->id !== 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $question));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function save($ques, $test_id)
    {
        $question = new Question();

        // set properties
        $question->setQuestion($ques);
        $question->setTestId($test_id);

        // save to database
        return QuestionDao::save($question);
    }

    public static function update($id, $ques, $test_id)
    {
        $question = new Question();

        // set properties
        $question->setId($id);
        $question->setQuestion($ques);
        $question->setTestId($test_id);

        // save to database
        try {
            $id = QuestionDao::update($question);
            return json_encode(array("res_code" => "0", "res_data" =>  $id));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public static function delete($id)
    {
        try {
            $id = QuestionDao::delete($id);
            if ($id > 0) {
                return json_encode(array("res_code" => "0", "res_data" =>  ""));
            } else {
                return json_encode(array("error_code" => "2"));
            }
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "5"));
        }
    }
}
