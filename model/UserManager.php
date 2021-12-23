<?php
session_start();
require_once("Manager.php");
class UserManager extends Manager {
    public function __construct($userid = 0) {
        parent::__construct();
        $this->userid = $userid;
    }
    
    public function getUsers(){
        $get = $this->_connexion->query("SELECT id, firstName, lastName, userName, password, role, phoneNumber FROM user");
        $getUsers= $get->fetchAll(PDO::FETCH_ASSOC);
        $get->closeCursor();
        return $getUsers;
    }

    public function getUser() {
        $req = $this->_connexion->query('SELECT * FROM user WHERE id = 1');
        // $req->bindParam(1, $this->_user_id, PDO::PARAM_INT);
        // $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }

    public function logInUser($userName, $pwd){

        $req = $this->_connexion->prepare("SELECT id, userName, password, role FROM user WHERE userName=? ");
        $req->bindParam(1,$userName, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        if ($user && password_verify($pwd, $user['password'])){
            $_SESSION['userName'] = $user['userName']; 
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userRole'] = $user['role'];
            if ($_SESSION['userRole'] == 0) {
                $_SESSION['userRoleDesc'] = "admin";
            }elseif($_SESSION['userRole'] == 1) {
                $_SESSION['userRoleDesc'] = "teacher";
            }else {
                $_SESSION['userRoleDesc'] = "student";
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
            // Marie queried this into the database, using like, in the case of firstName and lastName
            "SELECT id, firstName, lastName 
            FROM user 
            WHERE role=?
            AND  (firstName LIKE ?
            OR lastName LIKE ?)
            ORDER BY firstName");
        $req->bindParam(1, $role, PDO::PARAM_INT);
        $req->bindParam(2, $keywords, PDO::PARAM_STR); 
        // there was a massive mistake here with the variable $keywords, we used the wrong one
        $req->bindParam(3, $keywords, PDO::PARAM_STR);
        $req->execute();
        $teachers= $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        // we return a json object after, passing in the teachers variable 
        return json_encode($teachers); 
    }
}

// i change the role, and remove the assignment 59
// What do i add to the WHERE 65

    

