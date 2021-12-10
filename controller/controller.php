<?php
require("./model/UserManager.php");
function landing(){
    require("./view/landing.php");
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

