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
    $users = $getUsers->getUser();
    require("./view/userView.php");
}

function userId($getId){
    $getId = new UserManager($getId);
    $getId->delete();
    header("location:index.php?action=userView");
}

