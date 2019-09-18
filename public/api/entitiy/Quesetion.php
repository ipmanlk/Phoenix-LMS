<?php
    class Question {
        private $id;
        private $question;
        private $testId;

    public function getTestId() 
    {
        return $this->testId;
    }

    public function setTestId($testId) 
    {
        $this->testId = $testId;
    }

    public function getQuestion() 
    {
        return $this->question;
    }

    public function setQuestion($question) 
    {
        $this->question = $question;
    }

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }
    }
