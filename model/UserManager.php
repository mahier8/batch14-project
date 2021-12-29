<?php
session_start();
require_once("Manager.php");
class UserManager extends Manager {
    public function __construct($userid = 0, $value=0) {
        parent::__construct();
        $this->userid = $userid;
        $this->value = "%".$value."%";
    }
    
    public function getUsers(){
        $get = $this->_connexion->query("SELECT id, firstName, lastName, userName, password, role, phoneNumber FROM user");
        $getUsers= $get->fetchAll(PDO::FETCH_ASSOC);
        $get->closeCursor();
        return $getUsers;
    }

    public function getUser($userid) {
        $req = $this->_connexion->prepare('SELECT id, firstName, lastName, userName, password, role, phoneNumber, dob, imagePath, emergency, address, email FROM user WHERE id = ?');
        $req->bindParam(1, $userid, PDO::PARAM_INT);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }

    // this is where i have access to the user role in the database, further below I 
    // assigned the the user role toa  description 
    public function logInUser($userName, $pwd){

        $req = $this->_connexion->prepare("SELECT id, userName, password, role, imagePath FROM user WHERE userName=? ");
        $req->bindParam(1, $userName, PDO::PARAM_STR); //1 = how many parameters? 1. ? = the parameter 
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        if ($user && password_verify($pwd, $user['password'])){
            $_SESSION['userName'] = $user['userName']; 
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userRole'] = $user['role'];
            $_SESSION['imagePath'] = $user['imagePath'];
            if ($_SESSION['userRole'] == 0) {
                $_SESSION['userRoleDesc'] = "Admin";
                // i can take the user to the admin section
            }elseif($_SESSION['userRole'] == 1) {
                $_SESSION['userRoleDesc'] = "Teacher";
                // i can take the user to the teacher section 
            }else {
                $_SESSION['userRoleDesc'] = "Student";
                // i can take the user to the student section 
            }
            return $user;
        } else {
            return false;
        }
    }
  
    public function delete(){
        $req = $this->_connexion->prepare("DELETE FROM user WHERE id = :userId");
        $req->bindParam("userId", $this->userid, PDO::PARAM_STR);
        $req->execute();
    }

    // this is for the autocomplete step 5, later I will need to change the role to include student, 
    // in the arguments to include the role of students. Maybe ill need to fetch as well
    public function getUsersByRole ($keywords, $role) {
        $keywords = trim($keywords)."%"; //from the query, i remove any whitesapce, as well as the percentage sign 
        $req = $this->_connexion->prepare(
            // queried into database, using like, in the case of firstName and lastName
            "SELECT id, firstName, lastName 
            FROM user 
            WHERE role=?
            AND  (firstName LIKE ?
            OR lastName LIKE ?)
            ORDER BY firstName");
        $req->bindParam(1, $role, PDO::PARAM_INT);
        $req->bindParam(2, $keywords, PDO::PARAM_STR); 
        $req->bindParam(3, $keywords, PDO::PARAM_STR);
        $req->execute();
        $teachers= $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        // we return a json object after, passing in the teachers variable 
        return json_encode($teachers); 
    }

    public function assignCourses ($teacher, $students, $courseId) {
        $req = $this->_connexion->prepare("UPDATE course SET teacher=:teacher WHERE id=:id"); 
        $req->bindParam(":teacher", $teacher);
        $req->bindParam(":id", $courseId); 
        $req->execute();
        $req->closeCursor();

        $studentsArr = explode(",", $students);

        for ($i = 0; $i < count($studentsArr); $i++) {
            $req = $this->_connexion->prepare("INSERT INTO coursesTaken (courseId, studentId) VALUES (:courseId, :studentId)"); // what are my conditions
            $req->bindParam(":courseId", $courseId);
            $req->bindParam(":studentId", $studentsArr[$i]);
            $req->execute();
            $req->closeCursor();
        }
    }

    public function updateImage($userid, $imagePath) {
        $req = $this->_connexion->prepare("UPDATE user SET imagePath = ? WHERE id = ?"); 
        $req->bindParam(1, $imagePath, PDO::PARAM_STR);
        $req->bindParam(2, $userid, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
        
    }
}

