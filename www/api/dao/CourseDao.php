<?php
require_once "./config/db_config.php";

class CourseDao
{
    public static function getOne($id)
    {
        $course = R::load('course', $id);
        $members = R::getAssocRow("SELECT COUNT(student_id) AS member_count FROM studentcourse WHERE course_id='$id'");
        $course["member_count"] = $members[0]["member_count"];
        return $course;
    }

    public static function getAll()
    {
        $courses = R::getAll('SELECT * FROM course');
        return $courses;
    }

    public static function save($course)
    {
        $bean = R::dispense('course');
        $bean->course_name = $course->getCourseName();
        $bean->invite_code = $course->getInviteCode();
        $bean->instructor_id = $course->getInstructorId();
        $bean->description = $course->getDescription();
        R::store($bean);
        return $bean->invite_code;
    }

    public static function update($course)
    {
        $bean = R::load('course', $course->getId());
        $bean->course_name = $course->getCourseName();
        $bean->description = $course->getDescription();
        return R::store($bean);
    }

    public static function delete($id)
    {
        $bean = R::load('course', $id);
        if ($bean->id !== 0) {
            R::trash($bean);
            return $id;
        }
        return 0;
    }
}
