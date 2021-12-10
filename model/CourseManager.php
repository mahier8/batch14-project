<?php
require('Manager.php');
class CourseManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourses() {
    //If you want to use this query with a specific id, you need to convert to a prepare/execute/bind param structure
        $response = $this->_connexion->query("SELECT id, image, name, teacher, dayTime, nbStudents FROM course_test ORDER BY id");
        $courses = $response->fetchAll(\PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $courses;
    }


}