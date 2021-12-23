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
        $courseDayTime = isset($params['courseDayTime']) ? $params['courseDayTime'] : NULL;
        $courseDesc = isset ($params['courseDesc']) ? $params['courseDesc'] : NULL;
        $courseStartDate = isset($params['start']) ? $params['start'] : NULL;
        $courseEndDate = isset($params['end']) ? $params['end'] : NULL;
        $response = $this->_connexion->prepare("INSERT INTO course (name, teacher, courseDesc, dayTime, startDate, endDate) VALUES (:name, :teacher, :courseDesc, :dayTime, :startDate, :endDate)");
        $response->bindParam(":name", $courseName);
        $response->bindParam(":teacher", $courseTeacher);
        $response->bindParam(":courseDesc", $courseDesc);
        $response->bindParam(":dayTime", $courseDayTime);
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
        $courseDayTime = isset($params['courseDayTime']) ? $params['courseDayTime'] : NULL;
        $courseDesc = isset ($params['courseDesc']) ? $params['courseDesc'] : NULL;
        $courseStartDate = isset($params['start']) ? $params['start'] : NULL;
        $courseEndDate = isset($params['end']) ? $params['end'] : NULL;
        $response = $this->_connexion->prepare("UPDATE course SET name=:name, teacher=:teacher, courseDesc=:courseDesc, dayTime=:dayTime, startDate=:startDate, endDate=:endDate WHERE id=:id");
        $response->bindParam(":id", $courseId);
        $response->bindParam(":name", $courseName);
        $response->bindParam(":teacher", $courseTeacher);
        $response->bindParam(":courseDesc", $courseDesc);
        $response->bindParam(":dayTime", $courseDayTime);
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
    

    public function getPosts($id) {
        $response = $this->_connexion->query("SELECT id, course_id, type, title, post_date, content, due_date, file1_name, file1_type, file1_link, file2_name, file2_type, file2_link, file3_name, file3_type, file3_link FROM post_test WHERE course_id = '$id' ORDER BY post_date");
        $posts = $response-> fetchAll(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $posts;
    }

    public function createPost($courseId, $params) {
        $response = $this->_connexion->prepare("INSERT INTO post_test(title, course_id, content, type, due_date, file1_name, file1_type, file1_link, file2_name, file2_type, file2_link, file3_name, file3_type, file3_link) VALUES(:title, :course_id, :content, :type, :due_date, :file1_name, :file1_type, :file1_link, :file2_name, :file2_type, :file2_link, :file3_name, :file3_type, :file3_link) ");

        $response->execute(array(
            'title' => $params['pfTitle'],
            'course_id' => $courseId,
            'type' => $params['pfType'],
            'content' => $params['pfContent'],
            'due_date' => $params['pfDueDate'],
            'file1_name' => $params['pfLink1Name'],
            'file1_type' => $params['pfLink1Type'],
            'file1_link' => $params['pfLink1URL'],
            'file2_name' => $params['pfLink2Name'],
            'file2_type' => $params['pfLink2Type'],
            'file2_link' => $params['pfLink2URL'],
            'file3_name' => $params['pfLink3Name'],
            'file3_type' => $params['pfLink3Type'],
            'file3_link' => $params['pfLink3URL']
            ));
    
        $response->closeCursor();

        
    }

    public function updatePost($courseId, $params) {
        $hiddenid = $params['hiddenid']; $pfTitle = $params['pfTitle']; $pfType = $params['pfType']; 
        $pfContent = $params['pfContent']; $pfDueDate = $params['pfDueDate'];
        $pfLink1Name = $params['pfLink1Name']; $pfLink1Type = $params['pfLink1Type']; $pfLink1URL = $params['pfLink1URL'];
        $pfLink2Name = $params['pfLink2Name']; $pfLink2Type = $params['pfLink2Type']; $pfLink2URL = $params['pfLink2URL'];
        $pfLink3Name = $params['pfLink3Name']; $pfLink3Type = $params['pfLink3Type']; $pfLink3URL = $params['pfLink3URL'];

        $response = $this->_connexion->prepare("UPDATE post_test SET title = '$pfTitle', content = '$pfContent', due_date = '$pfDueDate', type = '$pfType', file1_link = '$pfLink1URL',  file1_type = '$pfLink1Type', file1_link = '$pfLink1URL', file2_name = '$pfLink2Name', file2_type = '$pfLink2Type', file2_link = '$pfLink2URL', file3_name = '$pfLink3Name', file3_type = '$pfLink3Type', file3_link = '$pfLink3URL' WHERE course_id = '$courseId' AND id = $hiddenid");
        #TODO    <!--Add the courseid and the post id after the WHERE

        $data = $response->execute();

        $response->closeCursor();

        //Rebuild with Bind Param
    }
}