<?php

$db = dbConnect();
$response = $response = $db->query("SELECT image, name, teacher, dayTime, nbStudents FROM course ORDER BY id");
$courses = $response->fetchAll(\PDO::FETCH_ASSOC);
$response->closeCursor();
return $courses;

function dbConnect() {
    try {
        return new PDO('mysql:host=localhost;dbname=school;charset=utf8', 'root', '');
    
    } catch(Exception $e) {
    
            die('Error : ' . $e->getMessage());
    }
}

?>