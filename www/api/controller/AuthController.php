<?php

require_once "./dao/AuthDao.php";
require_once "./lib/extractor/Extractor.php";

class AuthController
{
    public static function login()
    {
        // check if request method is post
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0) {
            return json_encode(array("error_code" => "4"));
        }

        // extract json data
        $data = Extractor::extractData();

        // required fields
        $required = array("email", "password", "type");

        foreach ($required as $field) {
            if (empty($data[$field]) || !isset($data[$field])) {
                return json_encode(array("error_code" => "-1"));
            }
            $data[$field] = trim($data[$field]);
        }

        // get relevent user from the relevent table
        $user = null;
        switch ($data["type"]) {
            case '1':
                $user = AuthDao::getOne($data["email"], "student");
                break;
            case '2':
                $user = AuthDao::getOne($data["email"], "instructor");
                break;
            case '3':
                $user = AuthDao::getOne($data["email"], "admin");
                break;
        }

        // check if user exists
        if (sizeof($user) > 0) {
            $user = $user[0];
            if (password_verify($data["password"], $user["password"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_type"] = $data["type"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_name"] = $user["fname"] . " " . $user["lname"];
                setcookie("user", json_encode(array("id" => $user["id"], "type" => $data["type"], "name" => $user["fname"] . " " . $user["lname"], "email" => $user["email"])), 0, "/");
                return json_encode(array("res_code" => "0", "res_data" => ""));
            } else {
                return json_encode(array("error_code" => "7"));
            }
        } else {
            return json_encode(array("error_code" => "7"));
        }
    }

    public static function register()
    { }
}
