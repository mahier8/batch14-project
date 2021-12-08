<?php

function landing(){
    require("./view/landing.php");
}

function login(){
    // call the model to make sure we have the right user
    // if succeed then header location to mycourses list
    // else can display and error of login;
}

function logout() {
    // delete the session and redirect to landing page;
}