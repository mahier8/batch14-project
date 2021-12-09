<?php


function landing(){
    require("./view/landing.php");
}

function courseList(){
    require("./model/courseManager.php");
    $courseManager = new CourseManager();
    $courses = $courseManager->getCourses();
    require("./view/courseList.php");
}

// function userView(){
//     $getUsers = new UserManager();
//     $users = $getUsers->getUser();
//     require("./view/userView.php");
// }