<?php

require("./controller/controller.php");
try{
$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : "";

switch($action) {
    case "landing" : landing();
        break;

    case "userView" : userView(); 
        break;
    
    case "userDel"; 
    if(isset($_GET['delete']) && $_GET['delete'] > 0){
        userId($_GET['delete']);
        require("./view/userView.php");
    }
        break;
    
    default : landing();
        break;
}


}catch(ErrorException $e){
    $msg = $e->getMessage();
    require("./view/errorView.php");
}
catch(Exception $e){
    $msg = $e->getMessage();
    $code = $e->getCode();
    $file = $e->getFile();
    $line = $e->getLine();
    require("./view/exceptionView.php");
}