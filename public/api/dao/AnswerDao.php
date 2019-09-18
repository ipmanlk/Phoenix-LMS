<?php
require_once "./config/db_config.php";

class AnswerDao
{
    public static function getAll($question_id)
    {
        $answers = R::getAll("SELECT * FROM answer WHERE question_id='$question_id'");
        $data = array();
        foreach ($answers as $answer) {
            $data[] = array("id" => $answer["id"], "answer" => $answer["answer"]);
        }

        return $data;
    }


    public static function getAllwCorrect($question_id)
    {
        $correct_answer = R::getRow("SELECT * FROM questioncorrectanswer WHERE question_id='$question_id'");
        return $correct_answer;
    }

    public static function save($answer)
    {
        $bean = R::dispense('answer');
        $bean->answer = $answer->getAnswer();
        $bean->question_id = $answer->getQuestionId();
        $id = R::store($bean);
        return $id;
    }

    public static function update($answer)
    {
        $bean = R::load('answer', $answer->getId());
        $bean->answer = $answer->getAnswer();
        $bean->question_id = $answer->getQuestionId();
        return R::store($bean);
    }

    public static function delete($id)
    {
        $bean = R::load('answer', $id);
        if ($bean->id !== 0) {
            R::trash($bean);
            return $id;
        }
        return 0;
    }
}
