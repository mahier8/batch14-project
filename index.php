<?php

session_start();
include("./controller/controller.php");
try {
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";
    switch($action) {
        case "landing" : 
            landing();
            break;
            
        case "login" : 
            if(isset($_POST['username']) && isset($_POST['password'])){
                login($_POST);
            }else{
                echo "Please fill the form";
            }
            break;
        case "logout" : 
            logout();
            break; 
            
        case "userView" : 
            if(isset($_SESSION['userName'])){
                userView(); 
            }else{
                landing();
            }
            break;

        case 'updatePassword':
            // if(isset($_POST['submit'])){
            updateProfilePass($_POST['userId'], $_POST['oldPassword'], $_POST['newPassword']);
            break;
        case "userProfile" : 
            if(isset($_SESSION['userName']) ){
                userProfile();
            }else{
                landing();
            }
            break;
       
        case "uploadImage" :
            uploadImage();
            break;
        
        case "uploadCourseImage" :
            uploadCourseImage($_POST["courseId"]);

            break;

        case "userDel"; 
            if(isset($_GET['delete']) && $_GET['delete'] > 0){
                userId($_GET['delete']);
                require("./view/userView.php");
            }
            break;

        case "addEditUserForm":
            if(isset($_REQUEST['edit'])) {
                addEditUserForm($_REQUEST['edit']);
            } else {
                addEditUserForm();
            }
            break;
            
        case "addEditUser": 
            if(!empty($_POST['userName']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) OR !empty($_POST['password']) &&
            !empty($_POST['role']) && !empty($_POST['email']) && !empty($_POST['phoneNumber'])
            ){
                addEditUser($_POST);
            } else {
                addEditUserForm();
            }
            break;
        case "courseList" : 
            if(isset($_SESSION['userName']) ){
                courseList();
            }else{
                landing();
            }
           break;
        case "course" :
            if(isset($_SESSION['userName'])){
                course($_GET["courseid"]);
            }else{
                landing();
            }
            break;
        case "autocompleteUsers" : 
            autocompleteUsers($_GET['keywords'], $_GET['role']); 
            break;
        case "assignCourses" :
            assignCourses($_GET['teacher'], $_GET['students'], $_GET['courseID']);
            break;
        case "delAssignedStudent" :
            delAssignedStudent($_GET['studentId'], $_GET['courseID']);
            break; 
        case "createPost" :
            if(isset($_SESSION['userName']) ){
                createPost($_GET["courseid"], $_POST);
            }else{
                landing();
            }
            break;

        case "updatePost" :
            if(isset($_SESSION['userName']) ){
                updatePost($_GET["courseid"], $_POST);
            }else{
                landing();
            }
            break;

        case "addEditCourseForm" : 
            if(isset($_SESSION['userName']) ){
                if(isset($_GET["courseid"])){
                    addEditCourseForm($_GET["courseid"]);
                } else {
                    addEditCourseForm();
                }
            }
            break;
        case "addEditCourse" : 
            if(isset($_SESSION['userName']) ){
                addEditCourse($_POST);
            }else{
                landing();
            }
            break;
        case "deleteCourse" : 
            if(isset($_SESSION['userName']) ){
                deleteCourse($_GET["courseid"]);
            }else{
                landing();
            }
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
