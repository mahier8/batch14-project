<?php
require_once("./model/UserManager.php");
require_once("./model/CourseManager.php");

function landing(){
    require("./view/landing.php");
}

function login($params){
    $userManager = new UserManager();
    $userConnected = $userManager->logInUser($params['username'], $params['password']);
    if($userConnected){
        header('Location: index.php?action=courseList');
    } else {
        header('Location: index.php');
    }
}

function logout() {
    session_unset();
    session_destroy();
    header('Location: index.php');
}

function courseList(){
    $courseManager = new CourseManager();
    $courses = $courseManager->getCourses();
    require("./view/courseList.php");
}

function userView(){
    $getUsers = new UserManager();
    $users = $getUsers->getUsers();
    require("./view/userView.php");
}

function userId($getId){
    $getId = new UserManager($getId);
    $getId->delete();
    header("location:index.php?action=userView");
}

function userProfile($userId){
    $userManager = new UserManager();
    $user = $userManager->getUser($userId);
    require("./view/userProfile.php");
}
function course($courseid){
    $courseManager = new CourseManager();
    $course = $courseManager->getCourse($courseid);
    require("./view/course.php");
}
function addEditCourseForm($courseid=null){
    if($courseid){
        $courseManager = new CourseManager();
        $course = $courseManager->getCourse($courseid);
    }
    // in order to load the information inside the following view
    require("./view/addEditCourse.php");
}
function addEditCourse($params){
    $courseManager = new CourseManager();
    if(isset($params['edit'])) {
        $course_id = $courseManager->updateCourse($params);
    } else {
        $course_id = $courseManager->addCourse($params);
    }
    header("location:index.php?action=course&courseid=".$course_id);
}

function deleteCourse($courseid){
    $courseManager = new CourseManager();
    $course = $courseManager->delCourse($courseid);
    header("location:index.php?action=courseList");
}

