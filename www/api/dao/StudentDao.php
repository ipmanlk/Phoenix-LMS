<?php
require_once "./config/db_config.php";

class StudentDao
{
    public static function getOne($id)
    {
        $student = R::load('student', $id);
        return array("id" => $student["id"], "fname" => $student["fname"], "lname" => $student["lname"], "dob" => $student["dob"], "email" => $student["email"], "nic" => $student["nic"]);
    }

    public static function getAll()
    {
        $students = R::getAll('SELECT id, fname,lname,dob,email,nic FROM student');
        return $students;
    }

    public static function save($student)
    {
        $bean = R::dispense('student');
        $bean->fname = $student->getFName();
        $bean->lname = $student->getLname();
        $bean->dob = $student->getDob();
        $bean->email = $student->getEmail();
        $bean->password = $student->getPassword();
        $bean->nic = $student->getNic();
        $id = R::store($bean);
        return $id;
    }

    public static function update($student)
    {
        $bean = R::load('student', $student->getId());
        $bean->fname = $student->getFName();
        $bean->lname = $student->getLname();
        $bean->dob = $student->getDob();
        $bean->email = $student->getEmail();
        $bean->nic = $student->getNic();
        if ($student->getPassword() !== null) {
            $bean->password = $student->getPassword();
        }
        return R::store($bean);
    }

    public static function delete($id)
    {
        $bean = R::load('student', $id);
        if ($bean->id !== 0) {
            R::trash($bean);
            return $id;
        }
        return 0;
    }
}
