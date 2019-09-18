<?php
require_once "./config/api_config.php";
require_once "./vendor/autoload.php";

foreach (glob("./controller/*.php") as $file) require_once $file;

$router = new \Delight\Router\Router(ROUTER_PATH);

// routing for instructor information
$router->get('/instructor', function () {
    echo InstructorController::getAll();
});

$router->get('/instructor/:id', function ($id) {
    echo InstructorController::getOne($id);
});

$router->post('/instructor', function () {
    echo InstructorController::save();
});

$router->put('/instructor', function () {
    echo InstructorController::update();
});

$router->delete('/instructor/:id', function ($id) {
    echo InstructorController::delete($id);
});

// instructor course routing
$router->get('/instructor/:id/course', function ($id) {
    echo InstructorCourseController::getAll($id);
});

// routing for course information
$router->get('/course', function () {
    echo CourseController::getAll();
});

$router->get('/course/:id', function ($id) {
    echo CourseController::getOne($id);
});

$router->post('/course', function () {
    echo CourseController::save();
});

$router->put('/course', function () {
    echo CourseController::update();
});

$router->delete('/course/:id', function ($id) {
    echo CourseController::delete($id);
});

// routing for course resources
$router->get('/course/:id/resource', function ($id) {
    echo CourseResourceController::getAll($id);
});

$router->post('/course/resource', function () {
    echo CourseResourceController::save();
});

$router->delete('/course/resource/:id', function ($id) {
    echo CourseResourceController::delete($id);
});

// course tests
$router->get('/course/:id/test', function ($course_id) {
    echo CourseTestController::getAll($course_id);
});

$router->put('/course/test', function () {
    echo CourseTestController::update();
});

$router->get('/course/:id/assignment', function ($course_id) {
    echo CourseAssignmentController::getAll($course_id);
});

$router->put('/course/assignment', function () {
    echo CourseTestController::update();
});

// routing information for student
$router->get('/student', function () {
    echo StudentController::getAll();
});

$router->get('/student/:id', function ($id) {
    echo StudentController::getOne($id);
});

$router->post('/student', function () {
    echo StudentController::save();
});

$router->put('/student', function () {
    echo StudentController::update();
});

$router->delete('/student/:id', function ($id) {
    echo StudentController::delete($id);
});

// routing for student course
$router->get('/student/:id/course', function ($id) {
    echo StudentCourseController::getAll($id);
});

$router->post('/student/course', function () {
    echo StudentCourseController::save();
});

$router->delete('/student/:student_id/course/:course_id', function ($student_id, $course_id) {
    echo StudentCourseController::delete($student_id, $course_id);
});

// student course result
$router->get('/student/:student_id/course/:course_id/result', function ($student_id, $course_id) {
    echo StudentCourseResultController::getAll($student_id, $course_id);
});

// routing for student assignment
$router->get('/student/:id/assignment', function ($id) {
    echo StudentAssignmentController::getAll($id);
});

$router->post('/student/assignment', function () {
    echo StudentAssignmentController::save();
});

// routing for student test
$router->get('/student/:id/test', function ($id) {
    echo StudentTestController::getAll($id);
});

$router->post('/student/test', function () {
    echo StudentTestController::save();
});

$router->put('/student/test', function () {
    echo StudentTestController::update();
});

// routing for tests
$router->get('/test', function () {
    echo TestController::getAll();
});

$router->get('/test/:id', function ($id) {
    echo TestController::getOne($id);
});

$router->post('/test', function () {
    echo TestController::save();
});

$router->put('/test', function () {
    echo TestController::update();
});

$router->delete('/test/:id', function ($id) {
    echo TestController::delete($id);
});

// test result
$router->get('/test/:id/result', function ($id) {
    echo TestResultController::getAll($id);
});

//assignment
$router->post('/assignment', function () {
    echo AssignmentController::save();
});

// assignment result
$router->get('/assignment/:id/result', function ($id) {
    echo AssignmentSubmissionController::getAll($id);
});

$router->put('/assignment/result', function () {
    echo AssignmentSubmissionController::update();
});

// basic auth routing
$router->post('/login', function () {
    echo AuthController::login();
});
