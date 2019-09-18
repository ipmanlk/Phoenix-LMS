<?php
require_once "./dao/StudentTestDao.php";
require_once "./dao/AnswerDao.php";
require_once "./dao/QuestionDao.php";
require_once "./lib/extractor/Extractor.php";

class StudentTestController
{
    public static function getAll($id)
    {
        $assignments = StudentTestDao::getAll($id);
        if (sizeof($assignments) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $assignments));
        } else {
            return json_encode(array("error_code" => "2"));
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
        $required = array("student_id", "test_id");

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        try {
            StudentTestDao::save($data["student_id"], $data["test_id"]);
            return json_encode(array("res_code" => "0"));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "3"));
        }
    }

    public static function update()
    {
        // check if request method is post
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("student_id", "test_id");

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        if (!isset($data["answers"]) || sizeof($data["answers"]) < 0) return json_encode(array("error_code" => "-1"));

        $question_count = sizeof(QuestionDao::getAll($data["test_id"]));
        // this fill store correct answers for wrong ones
        $correct_answers = StudentTestController::checkAnswers($data["answers"]);
        // wrong answer count 
        $wrong_answer_count = sizeof($correct_answers);

        $marks = (($question_count - $wrong_answer_count) / $question_count) * 100.00;

        try {
            StudentTestDao::update($data["student_id"], $data["test_id"], $marks);
            return json_encode(array(
                "res_code" => "0",
                "res_data" =>  array(
                    "correct_answers" => $correct_answers,
                    "marks" => $marks
                )
            ));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "3"));
        }
    }

    public static function checkAnswers($answers)
    {

        $data = array();
        foreach ($answers as $question_id => $answer_id) {
            $correct_answer = AnswerDao::getAllwCorrect($question_id);
            // if answer is incorrect store correct one
            if ($correct_answer["answer_id"] !== $answer_id) {
                $data[] = array("question_id" => $question_id, "answer_id" => $correct_answer["answer_id"]);
            }
        }

        return $data;
    }
}
