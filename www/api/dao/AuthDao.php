<?php
require_once "./config/db_config.php";

class AuthDao
{
    public static function getOne($email, $table)
    { 
        $user = R::getAssocRow(
            "SELECT * FROM $table WHERE email = :email",
            [':email'=> $email]
        );
        return $user;
    }
}
