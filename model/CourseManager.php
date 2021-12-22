<?php
require_once("Manager.php");
class CourseManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourses() {
    //If you want to use this query with a specific id, you need to convert to a prepare/execute/bind param structure
        $response = $this->_connexion->query("SELECT * FROM course ORDER BY id");
        $courses = $response->fetchAll(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $courses;
    }

    //changed the ? from kaba's code. need to make variables for each item i want shown.
    public function getCourse($id) {
        $response = $this->_connexion->prepare("SELECT * FROM course WHERE id=?");
        $response->bindParam(1,$id, PDO::PARAM_INT);
        $response->execute();
        $course = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $course;
    }
    
    public function addCourse($params){
        $courseName = isset($params['courseName']) ? $params['courseName'] : NULL;
        $courseTeacher = isset($params['courseTeacher']) ? $params['courseTeacher'] : NULL;
        $courseDesc = isset ($params['courseDesc']) ? $params['courseDesc'] : NULL;
        $courseStartDate = isset($params['start']) ? $params['start'] : NULL;
        $courseEndDate = isset($params['end']) ? $params['end'] : NULL;
        $response = $this->_connexion->prepare("INSERT INTO course (name, teacher, courseDesc, startDate, endDate) VALUES (:name, :teacher, :courseDesc, :startDate, :endDate)");
        $response->bindParam(":name", $courseName);
        $response->bindParam(":teacher", $courseTeacher);
        $response->bindParam(":courseDesc", $courseDesc);
        $response->bindParam(":startDate", $courseStartDate);
        $response->bindParam(":endDate", $courseEndDate);
        $response->execute();
        $last_id = $this->_connexion->lastInsertId();
        $response->closeCursor();
        return $last_id;
    }
    public function updateCourse($params){
        $courseId = isset($params['courseid']) ? $params['courseid'] : NULL;
        $courseName = isset($params['courseName']) ? $params['courseName'] : NULL;
        $courseTeacher = isset($params['courseTeacher']) ? $params['courseTeacher'] : NULL;
        $courseDesc = isset ($params['courseDesc']) ? $params['courseDesc'] : NULL;
        $courseStartDate = isset($params['start']) ? $params['start'] : NULL;
        $courseEndDate = isset($params['end']) ? $params['end'] : NULL;
        $response = $this->_connexion->prepare("UPDATE course SET name=:name, teacher=:teacher, courseDesc=:courseDesc, startDate=:startDate, endDate=:endDate WHERE id=:id");
        $response->bindParam(":id", $courseId);
        $response->bindParam(":name", $courseName);
        $response->bindParam(":teacher", $courseTeacher);
        $response->bindParam(":courseDesc", $courseDesc);
        $response->bindParam(":startDate", $courseStartDate);
        $response->bindParam(":endDate", $courseEndDate);
        $response->execute();
        $response->closeCursor();
        return $courseId;
        }

    public function delCourse($courseid){
        $req = $this->_connexion->prepare("DELETE FROM course WHERE id = :courseId");
        $req->bindParam(":courseId", $courseid);
        $req->execute();
        $req->closeCursor();
        }
    }

