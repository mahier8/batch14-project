<?php
require_once("Manager.php");
class CourseManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourses() {
    //If you want to use this query with a specific id, you need to convert to a prepare/execute/bind param structure
        $response = $this->_connexion->query("SELECT id, image, name, teacher, dayTime, nbStudents FROM course ORDER BY id");
        $courses = $response->fetchAll(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $courses;
    }

    //changed the ? from kaba's code. need to make variables for each item i want shown.
    public function getCourse($id) {
        $response = $this->_connexion->prepare("SELECT id, image, name, teacher FROM course WHERE id=?");
        $response->bindParam(1,$id, PDO::PARAM_INT);
        $response->execute();
        $course = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $course;
    }

}
