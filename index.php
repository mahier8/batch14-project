<?php
include("./controller/controller.php");
try {
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";
    switch($action) {
        case "landing" : landing();
            break;
        case "login" : 
            if(isset($_POST['username']) && isset($_POST['username'])){
                login($_POST);
            }else{
                echo "Please fill the form";
            }
            break;
        case "logout" : logout();
            break; 
        case "userView" : userView(); 
            break;
        case "userProfile" : userProfile();
            break;
        case "userDel"; 
            if(isset($_GET['delete']) && $_GET['delete'] > 0){
                userId($_GET['delete']);
                require("./view/userView.php");
            }
            break;
        case "courseList" : 
            courseList();
            break;   
        default : landing();
            break;
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    $code = $e->getCode();
    $file = $e->getFile();
    $line = $e->getLine();
    require("./view/exceptionView.php");
}
