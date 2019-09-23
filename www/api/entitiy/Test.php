<?php
class Test
{
    private $id = null;
    private $testName = null; 
    private $duration = null; 
    private $courseId = null; 
    private $description = null;
    private $deadline = null;
    private $testtypeId = null;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTestName(){
		return $this->testName;
	}

	public function setTestName($testName){
		$this->testName = $testName;
	}

	public function getDuration(){
		return $this->duration;
	}

	public function setDuration($duration){
		$this->duration = $duration;
	}

	public function getCourseId(){
		return $this->courseId;
	}

	public function setCourseId($courseId){
		$this->courseId = $courseId;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDeadline(){
		return $this->deadline;
	}

	public function setDeadline($deadline){
		$this->deadline = $deadline;
	}

	public function getTesttypeId(){
		return $this->testtypeId;
	}

	public function setTesttypeId($testtypeId){
		$this->testtypeId = $testtypeId;
	}
    
}
