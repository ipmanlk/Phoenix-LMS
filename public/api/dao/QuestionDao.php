<?php
require_once "./config/db_config.php";

class QuestionDao
{
    public static function getOne($id)
    {
        $question = R::load('question', $id);
        if ($question->id !== 0) {
            $answers = R::getAll(
                'SELECT id, answer FROM answer WHERE question_id = :id',
                [':id' => $question->id]
            );
            $question["answer"] = $answers;
        }
        return $question;
    }

    public static function getAll($test_id)
    {
        return R::getAll("SELECT * FROM question WHERE test_id='$test_id'");
    }

    public static function save($question)
    {
        $bean = R::dispense('question');
        $bean->question = $question->getQuestion();
        $bean->test_id = $question->getTestId();
        return R::store($bean);
    }

    public static function update($question)
    {
        $bean = R::load('question', $question->getId());
        $bean->question_name = $question->getquestionName();
        $bean->description = $question->getDescription();
        return R::store($bean);
    }

    public static function delete($id)
    {
        $bean = R::load('question', $id);
        if ($bean->id !== 0) {
            R::trash($bean);
            return $id;
        }
        return 0;
    }
}
