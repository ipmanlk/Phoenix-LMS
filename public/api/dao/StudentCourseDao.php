<?php
require_once "./config/db_config.php";

class StudentCourseDao
{
    public static function getAll($student_id)
    {
        $courses = R::getAssoc("SELECT course_id FROM studentcourse WHERE student_id = '$student_id'");
        $data = array();

        if (sizeof($courses) > 0) {
            foreach ($courses as $id) {
                $course = R::getAssocRow("SELECT id, course_name, instructor_id, description FROM course WHERE id = '$id'");
                $instructor_id = $course[0]["instructor_id"];
                $course[0]["instructor_id"] = R::getAssocRow("SELECT fname, lname FROM instructor WHERE id = '$instructor_id'")[0];
                $data[] = $course[0];
            }
        }

        return $data;
    }

    public static function save($student_id, $invite_code)
    {
        $course = R::getAssocRow("SELECT id FROM course WHERE invite_code = '$invite_code'");
        if (sizeof($course) !== 1) return 1;
        $course_id = $course[0]["id"];
        R::exec("INSERT INTO studentcourse VALUES('$student_id', '$course_id')");
        return 0;
    }

    public static function delete($student_id, $course_id)
    {
        R::exec("DELETE FROM studentcourse WHERE student_id = '$student_id' AND course_id = '$course_id'");
        return 0;
    }
}
