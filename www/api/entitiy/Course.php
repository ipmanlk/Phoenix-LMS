<?php
class Course
{
    private $id = null;
    private $course_name = null;
    private $invite_code = null;
    private $instructor_id = null;
    private $description = null;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCourseName($course_name)
    {
        $this->course_name = $course_name;
    }

    public function setInviteCode($invite_code)
    {
        $this->invite_code = $invite_code;
    }

    public function setInstructorId($instructor_id)
    {
        $this->instructor_id = $instructor_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCourseName()
    {
        return $this->course_name;
    }

    public function getInviteCode()
    {
        return $this->invite_code;
    }

    public function getInstructorId()
    {
        return $this->instructor_id;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
