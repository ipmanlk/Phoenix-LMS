<?php
require_once "./config/db_config.php";

class InstructorDao
{
    public static function getOne($id)
    {
        $instructor = R::load('instructor', $id);
        unset($instructor["password"]);
        return $instructor;
    }

    public static function getAll()
    {
        $instructors = R::getAll('SELECT id, fname,lname,dob,email FROM instructor');
        return $instructors;
    }

    public static function save($instructor)
    {
        $bean = R::dispense('instructor');
        $bean->fname = $instructor->getFName();
        $bean->lname = $instructor->getLname();
        $bean->dob = $instructor->getDob();
        $bean->email = $instructor->getEmail();
        $bean->password = $instructor->getPassword();
        $bean->nic = $instructor->getNic();
        $id = R::store($bean);
        return $id;
    }

    public static function update($instructor)
    {
        $bean = R::load('instructor', $instructor->getId());
        $bean->fname = $instructor->getFName();
        $bean->lname = $instructor->getLname();
        $bean->dob = $instructor->getDob();
        $bean->email = $instructor->getEmail();
        $bean->nic = $instructor->getNic();
        if ($instructor->getPassword() !== null) {
            $bean->password = $instructor->getPassword();
        }
        return R::store($bean);
    }

    public static function delete($id)
    {
        $bean = R::load('instructor', $id);
        if ($bean->id !== 0) {
            R::trash($bean);
            return $id;
        }
        return 0;
    }
}
