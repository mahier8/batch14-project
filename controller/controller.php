<?php
require_once("./model/UserManager.php");
require_once("./model/CourseManager.php");

// define("TEST", "test constant"); // constant outside of a class
// function listUserData(){
//     $userManager = new UserManager();
//     $user = $userManager->getUser();
//     require("./view/userProfile.php");
// }

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

function userProfile(){
    $userManager = new UserManager();
    $user = $userManager->getUser();
    require("./view/userProfile.php");
}

function course($courseid){
    $courseManager = new CourseManager();
    $course = $courseManager->getCourse($courseid);
    require("./view/course.php");
}

// this is for the autocomplete step 4 
function autocompleteUsers($keywords, $role) { 
    $userManager = new UserManager(); // we get the user mananger object 
    echo $userManager->getUsersByRole($keywords, $role); // we echo what we get from our read (SELECT)

}
// added in role to 61 and 63

function assignCourses($teacher, $students, $courseID) {
    $userManager = new UserManager();
    $user = $userManager->assignCourses($teacher, $students, $courseID);

}

