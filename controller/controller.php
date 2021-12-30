<?php
require_once("./model/security.php");
require_once("./model/UserManager.php");
require_once("./model/CourseManager.php");

function landing(){
    require("./view/landing.php");
}

// below i have access to the usermanager when the user logs in, i can pass in the 
// $params['userRole']

function login($params){
    $userManager = new UserManager();
    $userName = pageSecurity($params['username']);
    $password = pageSecurity($params['password']);
    $userConnected = $userManager->logInUser($userName , $password);
   
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

function updateProfilePass($userId, $oldPassword, $newPassword){
    $userManager = new UserManager();
    $id = pageSecurity($userId);
    $oldPass = pageSecurity($oldPassword);
    $newPass = pageSecurity($newPassword);
    $password = $userManager->passwordUpdate( $id, $oldPass, $newPass);
    $userProf = $userManager->getUser($_SESSION['userId']);
    require("./view/userProfile.php");
    // header("location:index.php?action=userProfile");
}

function userId($getId){
    $getId = new UserManager($getId);
    $getId->delete();
    header("location:index.php?action=userView");
}

function userProfile(){
    $profileUserManager = new UserManager();
    $userProf = $profileUserManager->getUser($_SESSION['userId']);
    require("./view/userProfile.php");
}


function course($courseid){
    $courseManager = new CourseManager();
    $course = $courseManager->getCourse($courseid);
    $posts = $courseManager->getPosts($courseid);
    $students = $courseManager->getStudents($courseid);
    require("./view/course.php");
}

function createPost($courseid, $params){
    $courseManager = new CourseManager();
    $createPost = $courseManager->createPost($courseid, $params);
    header('location:index.php?action=course&courseid=' . $courseid . '');
    require("./view/course.php");
}

// this is for the autocomplete step 4 
function autocompleteUsers($keywords, $role) { 
    $userManager = new UserManager(); // we get the user mananger object 
    echo $userManager->getUsersByRole($keywords, $role); // we echo what we get from our read (SELECT)
}

function assignCourses($teacher, $students, $courseID) {
    $userManager = new UserManager();
    $userManager->assignCourses($teacher, $students, $courseID);
    courseList(); // relocation not working
}

function delAssignedStudent($studentId, $courseID) {
    $userManager = new UserManager();
    $userManager->delAssignedStudent($studentId, $courseID);
    courseList(); 
}

function updatePost($courseid, $params){
    $courseManager = new CourseManager();
    $createPost = $courseManager->updatePost($courseid, $params);
    header('location:index.php?action=course&courseid=' . $courseid . '');
}

function addEditCourseForm($courseid=null){
    if($courseid){
        $courseManager = new CourseManager();
        $course = $courseManager->getCourse($courseid);
    }
    // in order to load the information inside the following view
    require("./view/addEditCourse.php");
}
function addEditCourse($params){
    $courseManager = new CourseManager();
    if(isset($params['edit'])) {
        $course_id = $courseManager->updateCourse($params);
    } else {
        $course_id = $courseManager->addCourse($params);
    }
    header("location:index.php?action=course&courseid=".$course_id);
}

function deleteCourse($courseid){
    $courseManager = new CourseManager();
    $course = $courseManager->delCourse($courseid);
    header("location:index.php?action=courseList");
}

function uploadImage(){
    $userid = $_SESSION['userId'];
    $maxSize = 1300000;
    $valid_extensions = array('jpg', 'jpeg','png');
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $image_sizes = getimagesize($_FILES['image']['tmp_name']);

    if($imageError > 0) {
        throw new Exception("Error during upload");
    } 
    if ($imageSize> $maxSize) {
        throw new Exception( "the size of your file is too big");
    }

    $uploadExtension =  strtolower(substr(strrchr($imageName,"."), 1));
    $relativePath = dirname(__DIR__, 1). "/private/profilePics/";
    $dir  = $relativePath.$userid;
    $imageName = "_profimg."  . $uploadExtension;
    $imageAndId = $userid . "_profimg."  . $uploadExtension;
    $imageLocation = $dir . $imageName;
    move_uploaded_file($imageTmpName, $imageLocation);
    

    $uploadManager = new UserManager();
    $uploadManager->updateImage($userid, $imageAndId);
    header('Location:index.php?action=userProfile');
}

function uploadCourseImage($courseId){
    
    $maxSize = 1300000;
    $valid_extensions = array('jpg', 'jpeg','png');
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $image_sizes = getimagesize($_FILES['image']['tmp_name']);

    if($imageError > 0) {
        throw new Exception("Error during upload");
    } 
    if ($imageSize> $maxSize) {
        throw new Exception( "the size of your file is too big");
    }

    $uploadExtension =  strtolower(substr(strrchr($imageName,"."), 1));
    $relativePath = dirname(__DIR__, 1). "/private/coursePics/";
    $dir  = $relativePath.$courseId;
    $imageName = "_coursimg."  . $uploadExtension;
    $imageAndId = $courseId . "_coursimg."  . $uploadExtension;
    $imageLocation = $dir . $imageName;
    move_uploaded_file($imageTmpName, $imageLocation);
    $uploadManager = new CourseManager();
    $uploadManager->updateCourseImage($courseId, $imageAndId);
    header("location:index.php?action=course&courseid=".$courseId);
}



function addEditUserForm($userId = null){
    if($userId) {
        $userManager = new UserManager();
        $user = $userManager->getUser($userId);
    }
    require("./view/addEditUserForm.php");
}

function addEditUser($params){
    $userManager = new UserManager();
    // print_r($params);
    if(isset($params['userId'])) {
        // pageSecurity($params['']);
        // pageSecurity($params['']);
        // pageSecurity($params['']);
        // pageSecurity($params['']);
        // pageSecurity($params['']);
        // pageSecurity($params['']);
        // pageSecurity($params['']);
        $userManager->updateUser($params);
    } else {
        $userManager->addUser($params);
    }
    
    header("Location:index.php?action=userView");
}
