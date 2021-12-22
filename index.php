<?php
include("./controller/controller.php");
try {
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";
    switch($action) {
        case "landing" : landing();
            break;
            
        case "login" : 
            if(isset($_POST['username']) && isset($_POST['password'])){
                login($_POST);
            }else{
                echo "Please fill the form";
            }
            break;

        case "logout" : logout();
        
            break; 

        case "userView" : userView(); 
            break;

        case "userProfile" : 
            userProfile();
            break;
            
        case "uploadImage" :
            uploadImage();
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
        case "course" :
            course($_GET["courseid"]);
            break;
        case "addEditCourseForm" : 
            if(isset($_GET["courseid"])){
                addEditCourseForm($_GET["courseid"]);
            } else {
                addEditCourseForm();
            }
            break;
        case "addEditCourse" : addEditCourse($_POST);
            break;
        case "deleteCourse" : deleteCourse($_GET["courseid"]);
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
