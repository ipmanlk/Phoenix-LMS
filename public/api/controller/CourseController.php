<?php
require_once "./dao/CourseDao.php";
require_once "./entitiy/Course.php";
require_once "./lib/extractor/Extractor.php";

class CourseController
{
    // return all courses
    public static function getAll()
    {
        $courses = CourseDao::getAll();
        if (sizeof($courses) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $courses));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    // return one course
    public static function getOne($id)
    {
        $course = CourseDao::getOne($id);
        if ($course->id !== 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $course));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    // add course to database
    public static function save()
    {
        // check if request method is post
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("course_name", "instructor_id", "description");

        // create new instructor instance
        $course = new Course();

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // set properties
        $course->setCourseName($data["course_name"]);
        $course->setInstructorId($data["instructor_id"]);
        $course->setInviteCode(substr(hash("sha512", $data["course_name"] . time()), 0, 10));
        $course->setDescription($data["description"]);

        // save to database
        try {
            $invite_code = CourseDao::save($course);
            return json_encode(array("res_code" => "0", "res_data" =>  $invite_code));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    // update course info
    public static function update()
    {
        // check request method
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') != 0) {
            return json_encode(array("error_code" => "4"));
        }

         // extract json data
         $data = Extractor::extractData();

         // required fields
         $required = array("id", "course_name", "description");
 
         // create new instructor instance
         $course = new Course();
 
         foreach ($required as $field) {
             if (empty($data[$field]) || !isset($data[$field])) {
                 return json_encode(array("error_code" => "-1"));
             }
             $data[$field] = trim($data[$field]);
         }
 
         // set properties
         $course->setId($data["id"]);
         $course->setCourseName($data["course_name"]);
         $course->setDescription($data["description"]);

         // save to database
         try {
             $id = CourseDao::update($course);
             return json_encode(array("res_code" => "0", "res_data" =>  $id));
            } catch (\Throwable $th) {
             return json_encode(array("error_code" => "1"));
         }
    }

    // delete course from database
    public static function delete($id)
    {
        try {
            $id = CourseDao::delete($id);
            if ($id > 0) {
                return json_encode(array("res_code" => "0", "res_data" =>  ""));
            } else {
                return json_encode(array("error_code" => "2"));
            }
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "5"));
        }
    }
}
