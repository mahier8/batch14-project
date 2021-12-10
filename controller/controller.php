<?php
require_once("./model/UserManager.php");

// define("TEST", "test constant"); // constant outside of a class
// function listUserData(){
//     $userManager = new UserManager();
//     $user = $userManager->getUser();
//     require("./view/userProfile.php");
// }

function landing(){
    require("./view/landing.php");
}

function userProfile(){
    $userManager = new UserManager();
    $user = $userManager->getUser();
    require("./view/userProfile.php");
}

