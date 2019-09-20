<?php
require_once "./dao/InstructorDao.php";
require_once "./entitiy/Instructor.php";
require_once "./lib/extractor/Extractor.php";

class InstructorController
{
    public static function getAll()
    {
        $instructors = InstructorDao::getAll();
        if (sizeof($instructors) > 0) {
            return json_encode(array("res_code" => "0", "res_data" => $instructors));
        } else {
            return json_encode(array("error_code" => "2"));
        }
    }

    public static function getOne($id)
    {
        $instructor =  InstructorDao::getOne($id);

        if ($instructor->id !== 0) {
            return json_encode(array("res_code" => "0", "res_data" => $instructor));
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

        // create new instructor instance
        $instructor = new Instructor();

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // set properties
        $instructor->setFname($data["fname"]);
        $instructor->setLname($data["lname"]);
        $instructor->setEmail($data["email"]);
        $instructor->setDob($data["dob"]);
        $instructor->setNic($data["nic"]);

        $instructor->setPassword(password_hash($data["password"], PASSWORD_DEFAULT));

        // save to database
        try {
            $id = InstructorDao::save($instructor);
            return json_encode(array("res_code" => "0", "res_data" => $id));
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
        $required = array("id", "fname", "lname", "email", "dob", "password", "nic");

        // create new instructor instance
        $instructor = new Instructor();

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // set properties
        $instructor->setId($data["id"]);
        $instructor->setFname($data["fname"]);
        $instructor->setLname($data["lname"]);
        $instructor->setEmail($data["email"]);
        $instructor->setDob($data["dob"]);
        $instructor->setNic($data["nic"]);

        if (!empty($data["password"])) {
            $instructor->setPassword(password_hash($data["password"], PASSWORD_DEFAULT));
        }

        // save to database
        try {
            $id = InstructorDao::update($instructor);
            return json_encode(array("res_code" => "0", "res_data" => ""));
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "1"));
        }
    }

    public static function delete($id)
    {
        try {
            $id = InstructorDao::delete($id);
            if ($id > 0) {
                return json_encode(array("res_code" => "0", "res_data" => ""));
            } else {
                return json_encode(array("error_code" => "2"));
            }
        } catch (\Throwable $th) {
            return json_encode(array("error_code" => "5"));
        }
    }
}
