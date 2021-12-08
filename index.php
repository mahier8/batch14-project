<?php
include("./controller/controller.php");

$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";

switch($action) {
    case "landing" : 
        landing();
        break;
    case "courseList" : 
        courseList();
        break;
    default : 
    landing();
        break;
}