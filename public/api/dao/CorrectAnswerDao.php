<?php
require_once "./config/db_config.php";

class CorrectAnswerDao
{
    public static function save($question_id, $answer_id)
    {
        R::exec("INSERT INTO questioncorrectanswer VALUES('$question_id', '$answer_id')");
        $id = R::getInsertID();
        return $id;
    }
}
