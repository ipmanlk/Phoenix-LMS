<?php
require_once "./config/db_config.php";
require_once "AnswerDao.php";
require_once "QuestionDao.php";

class TestDao
{
    public static function getOne($id)
    {
        $data = array();

        $test = R::load('test', $id);
        if ($test->id == 0) return array();

        $test_id = $test->id;
        $test_name = $test->test_name;
        $test_duration = $test->duration;
        $test_description = $test->description;
        $test_deadline = $test->deadline;
        $test_add_date = $test->add_date;

        $data["test"] = array(
            "id" => $test_id,
            "test_name" => $test_name,
            "duration" => $test_duration,
            "description" => $test_description,
            "deadline" => $test_deadline,
            "add_date" => $test_add_date
        );

        $data["questions"] = array();

        $questions = QuestionDao::getAll($test_id);

        foreach ($questions as $question) {
            $answers = AnswerDao::getAll($question["id"]);
            array_push(
                $data["questions"],
                array(
                    "question" => array(
                        "id" => $question["id"],
                        "question" => $question["question"]
                    ),
                    "answers" => $answers
                )
            );
        }

        return $data;
    }

    public static function getAll()
    {
        $tests = R::getAll('SELECT * FROM test');
        return $tests;
    }

    public static function save($test)
    {
        $bean = R::dispense('test');
        $bean->test_name = $test->getTestName();
        $bean->duration = $test->getDuration();
        $bean->course_id = $test->getCourseId();
        $bean->description = $test->getDescription();
        $bean->deadline = $test->getDeadline();
        $bean->testtype_id = $test->getTesttypeId();
        $id = R::store($bean);
        return $id;
    }

    public static function update($test)
    {
        $bean = R::load('test', $test->getId());
        $bean->test_name = $test->getTestName();
        $bean->duration = $test->getDuration();
        $bean->course_id = $test->getCourseId();
        $bean->description = $test->getDescription();
        $bean->deadline = $test->getDeadline();
        return R::store($bean);
    }

    public static function delete($id)
    {
        $bean = R::load('test', $id);
        if ($bean->id !== 0) {
            R::trash($bean);
            return $id;
        }
        return 0;
    }
}
