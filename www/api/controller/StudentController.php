<?php
require_once "./dao/StudentDao.php";
require_once "./entitiy/Student.php";
require_once "./lib/extractor/Extractor.php";

class StudentController
{
    public static function getAll()
    {
        $students = StudentDao::getAll();
        if (sizeof($students) > 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $students));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function getOne($id)
    {
        $student =  StudentDao::getOne($id);

        if ($student["id"] !== 0) {
            return json_encode(array("res_code" => "0", "res_data" =>  $student));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function save()
    {
        // check if request method is post
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("fname", "lname", "email", "dob", "password", "nic");

        // create new student instance
        $student = new Student();

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // set properties
        $student->setFname($data["fname"]);
        $student->setLname($data["lname"]);
        $student->setEmail($data["email"]);
        $student->setDob($data["dob"]);
        $student->setNic($data["nic"]);
        $student->setPassword(password_hash($data["password"], PASSWORD_DEFAULT));

        // save to database
        try {
            $id = StudentDao::save($student);
            return json_encode(array("res_code" => "0", "res_data" =>  $id));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "3"));
        }
    }

    public static function update()
    {
        // check request method 
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("id", "fname", "lname", "email", "dob", "oldpassword", "password", "nic");

        // create new student instance
        $student = new Student();

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // check if user is authenticated to perform this action
        if (!password_verify($data["oldpassword"], $_SESSION["user_password"])) {
            return json_encode(array("error_code" => "6"));
        }

        // set properties
        $student->setId($data["id"]);
        $student->setFname($data["fname"]);
        $student->setLname($data["lname"]);
        $student->setEmail($data["email"]);
        $student->setDob($data["dob"]);
        $student->setNic($data["nic"]);

        if (!empty($data["password"])) {
            $student->setPassword(password_hash($data["password"], PASSWORD_DEFAULT));
        }

        // save to database
        try {
            $id = StudentDao::update($student);
            return json_encode(array("res_code" => "0", "res_data" =>  $id));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public static function delete($id)
    {
        try {
            $id = StudentDao::delete($id);
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
