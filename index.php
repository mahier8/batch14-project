<?php
include("./controller/controller.php");

$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";

switch($action) {
    case "landing" : landing();
        break;
    case "login" : login();
        break;
    case "logout" : logout();
        break;    
    default : landing();
        break;
}