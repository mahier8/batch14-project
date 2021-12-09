<?php
require('Manager.php');
class CourseManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourses() {
        $db = dbConnect();
        $response = $response = $db->query("SELECT image, name, teacher, dayTime, nbStudents FROM course ORDER BY id");
        $courses = $response->fetchAll(\PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $courses;
    }
}