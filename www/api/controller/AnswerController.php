<?php
require_once "./dao/AnswerDao.php";
require_once "./dao/CorrectAnswerDao.php";

require_once "./entitiy/Answer.php";
require_once "./lib/extractor/Extractor.php";

class AnswerController
{

    public static function save($question_id, $ans, $is_correct)
    {
        $answer = new Answer();

        $answer->setAnswer($ans);
        $answer->setQuestionId($question_id);

        // save to database
        $answer_id = AnswerDao::save($answer);

        if ($is_correct) {
            return CorrectAnswerDao::save($question_id, $answer_id);
        }

        return $answer_id;
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
        $required = array("id", "answer", "question_id");

        $answer = new Answer();

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // set properties
        $answer->setId($data["id"]);
        $answer->setAnswer($data["answer"]);
        $answer->setQuestionId($data["question_id"]);

        // save to database
        try {
            $id = AnswerDao::update($answer);
            return json_encode(array("res_code" => "0", "res_data" =>  $id));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public static function delete($id)
    {
        try {
            $id = AnswerDao::delete($id);
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
