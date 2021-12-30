<?php
require_once("Manager.php");
class CourseManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }

    //Get the list of courses to display on CourseList.php
    public function getCourses() {
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
        $response = $this->_connexion->query("SELECT id, course_id, type, title, post_date, content, due_date, file1_name, file1_type, file1_link, file2_name, file2_type, file2_link, file3_name, file3_type, file3_link FROM post WHERE course_id = '$id' ORDER BY post_date DESC");
        $posts = $response-> fetchAll(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $posts;
    }

    public function createPost($courseId, $params) {

        if (empty($params['pfDueDate'])) {
            $response = $this->_connexion->prepare("INSERT INTO post(title, course_id, content, type, file1_name, file1_type, file1_link, file2_name, file2_type, file2_link, file3_name, file3_type, file3_link) VALUES(:title, :course_id, :content, :type, :file1_name, :file1_type, :file1_link, :file2_name, :file2_type, :file2_link, :file3_name, :file3_type, :file3_link)");
            $response->bindParam(':title', $params['pfTitle']);
            $response->bindParam(':course_id', $courseId);
            $response->bindParam(':type', $params['pfType']);
            $response->bindParam(':content', $params['pfContent']);
            $response->bindParam(':file1_name', $params['pfLink1Name']);
            $response->bindParam(':file1_type', $params['pfLink1Type']);
            $response->bindParam(':file1_link', $params['pfLink1URL']);
            $response->bindParam(':file2_name', $params['pfLink2Type']);
            $response->bindParam(':file2_type', $params['pfLink2Name']);
            $response->bindParam(':file2_link', $params['pfLink2URL']);
            $response->bindParam(':file3_name', $params['pfLink3Type']);
            $response->bindParam(':file3_type', $params['pfLink3Name']);
            $response->bindParam(':file3_link', $params['pfLink3URL']);
            $response->execute();
            $response->closeCursor();
            
        } else {
            $response = $this->_connexion->prepare("INSERT INTO post(title, course_id, content, type, due_date, file1_name, file1_type, file1_link, file2_name, file2_type, file2_link, file3_name, file3_type, file3_link) VALUES(:title, :course_id, :content, :type, :due_date, :file1_name, :file1_type, :file1_link, :file2_name, :file2_type, :file2_link, :file3_name, :file3_type, :file3_link)");
            $response->bindParam(':title', $params['pfTitle']);
            $response->bindParam(':course_id', $courseId);
            $response->bindParam(':due_date', $params['pfDueDate']);
            $response->bindParam(':type', $params['pfType']);
            $response->bindParam(':content', $params['pfContent']);
            $response->bindParam(':file1_name', $params['pfLink1Name']);
            $response->bindParam(':file1_type', $params['pfLink1Type']);
            $response->bindParam(':file1_link', $params['pfLink1URL']);
            $response->bindParam(':file2_name', $params['pfLink2Name']);
            $response->bindParam(':file2_type', $params['pfLink2Type']);
            $response->bindParam(':file2_link', $params['pfLink2URL']);
            $response->bindParam(':file3_name', $params['pfLink3Name']);
            $response->bindParam(':file3_type', $params['pfLink3Type']);
            $response->bindParam(':file3_link', $params['pfLink3URL']);
            $response->execute();
            $response->closeCursor();
        } 
    }

    public function updatePost($courseId, $params) {
        $hiddenid = $params['hiddenid'];

        if (empty($params['pfDueDate'])) {
            $response = $this->_connexion->prepare("UPDATE post SET title =:title, content = :content, type = :type, file1_name = :file1_name,  file1_type = :file1_type, file1_link = :file1_link, file2_name = :file2_name, file2_type = :file2_type, file2_link = :file2_link, file3_name = :file3_name, file3_type = :file3_type, file3_link = :file3_link WHERE course_id = '$courseId' AND id = $hiddenid");
            $response->bindParam(':title', $params['pfTitle']);
            $response->bindParam(':type', $params['pfType']);
            $response->bindParam(':content', $params['pfContent']);
            $response->bindParam(':file1_name', $params['pfLink1Name']);
            $response->bindParam(':file1_type', $params['pfLink1Type']);
            $response->bindParam(':file1_link', $params['pfLink1URL']);
            $response->bindParam(':file2_name', $params['pfLink2Name']);
            $response->bindParam(':file2_type', $params['pfLink2Type']);
            $response->bindParam(':file2_link', $params['pfLink2URL']);
            $response->bindParam(':file3_name', $params['pfLink3Name']);
            $response->bindParam(':file3_type', $params['pfLink3Type']);
            $response->bindParam(':file3_link', $params['pfLink3URL']);
            $response->execute();
            $response->closeCursor();
        } else {

            $response = $this->_connexion->prepare("UPDATE post SET title =:title, content = :content, due_date = :due_date, type = :type, file1_name = :file1_name,  file1_type = :file1_type, file1_link = :file1_link, file2_name = :file2_name, file2_type = :file2_type, file2_link = :file2_link, file3_name = :file3_name, file3_type = :file3_type, file3_link = :file3_link WHERE course_id = '$courseId' AND id = $hiddenid");
            $response->bindParam(':title', $params['pfTitle']);
            $response->bindParam(':due_date', $params['pfDueDate']);
            $response->bindParam(':type', $params['pfType']);
            $response->bindParam(':content', $params['pfContent']);
            $response->bindParam(':file1_name', $params['pfLink1Name']);
            $response->bindParam(':file1_type', $params['pfLink1Type']);
            $response->bindParam(':file1_link', $params['pfLink1URL']);
            $response->bindParam(':file2_name', $params['pfLink2Name']);
            $response->bindParam(':file2_type', $params['pfLink2Type']);
            $response->bindParam(':file2_link', $params['pfLink2URL']);
            $response->bindParam(':file3_name', $params['pfLink3Name']);
            $response->bindParam(':file3_type', $params['pfLink3Type']);
            $response->bindParam(':file3_link', $params['pfLink3URL']);
        }
        $data = $response->execute();
        $response->closeCursor();
    
        //Future Update - Insecure Query - Rebuild with Bind Param
    }
        public function updateCourseImage($courseId, $imagePath) {
            $req = $this->_connexion->prepare("UPDATE course SET image = ? WHERE id = ?"); 
            $req->bindParam(1, $imagePath, PDO::PARAM_STR);
            $req->bindParam(2, $courseId, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            
        }
    
    }

