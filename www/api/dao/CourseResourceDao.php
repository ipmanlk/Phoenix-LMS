<?php
class CourseResourceDao
{
    public static function getAll($course_id)
    {
        $resources = R::getAll("SELECT * FROM resource WHERE course_id = '$course_id'");
        return $resources;
    }

    public static function save($resource_name, $course_id, $file_name)
    {
        $bean = R::dispense('resource');
        $bean->resource_name = $resource_name;
        $bean->course_id = $course_id;
        $bean->path = $file_name;
        return R::store($bean);
    }

    public static function delete($resource_id)
    {
        $bean = R::load('resource', $resource_id);
        if ($bean->id !== 0) {
            $data = array("path" => $bean["path"]);
            R::trash($bean);
            return $data;
        }
        return 0;
    }
}
