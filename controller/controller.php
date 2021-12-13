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

// below i have access to the usermanager when the user logs in, i can pass in the 
// $params['userRole']

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

