<?php
require_once "./config/db_config.php";

class TestResultDao
{
    public static function getAll($test_id)
    {
        $tests = R::getAll("SELECT * FROM studenttest WHERE test_id='$test_id'");
        return $tests;
    }
}
