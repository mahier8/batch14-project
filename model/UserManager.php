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

    public function getUser() {
        $req = $this->_connexion->query('SELECT * FROM user WHERE id = 1');
        // $req->bindParam(1, $this->_user_id, PDO::PARAM_INT);
        // $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }

    // this is where i have access to the user role in the database, further below I 
    // assigned the the user role toa  description 
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
                // i can take the user to the admin section
            }elseif($_SESSION['userRole'] == 1) {
                $_SESSION['userRoleDesc'] = "teacher";
                // i can take the user to the teacher section 
            }else {
                $_SESSION['userRoleDesc'] = "student";
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

    public function updateImage($userid, $imagePath) {
        echo "Image:" . $imagePath;
        echo "User Id:" . $userid;
        $req = $this->_connexion->prepare("UPDATE user SET imagePath = :imagePath WHERE id = :userId"); 
        $req->bindParam("userId", $userid, PDO::PARAM_INT);
        $req->bindParam("imagePath", $imagePath, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
        
    }
}


