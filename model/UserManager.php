<?php
session_start();
require_once("Manager.php");
class UserManager extends Manager {
    public function __construct($userid = 0) {
        parent::__construct();
        $this->userid = $userid;
    }
    
    //userView function 
    public function getUsers(){
        $get = $this->_connexion->query("SELECT id, firstName, lastName, userName, password, role, phoneNumber FROM user");
        $getUsers= $get->fetchAll(PDO::FETCH_ASSOC);
        $get->closeCursor();
        return $getUsers;
    }


    public function getUser($userId) {
        $req = $this->_connexion->query("SELECT * FROM user WHERE id = $userId");
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }

    public function passwordUpdate($id, $oldPass, $newPass) {
        
        // $oldPassword = password_hash($oldPass, PASSWORD_DEFAULT);
        $pass = $this->_connexion->prepare("SELECT password FROM user WHERE id = ?");
        $pass->bindParam(1, $id, PDO::PARAM_INT);
        $pass->execute();
        $getPassword = $pass->fetch(PDO::FETCH_ASSOC);
        $pass->closeCursor();

        //need to hash oldpassword to compare line below
      
        if(password_verify($oldPass, $getPassword['password'])){
            //need to hash newpass before actual placing 
            $newPassword = password_hash($newPass, PASSWORD_DEFAULT);
            $req = $this->_connexion->prepare("UPDATE user SET password = ? WHERE id = ?");
            $req->bindParam(1, $newPassword , PDO::PARAM_STR);
            $req->bindParam(2, $id, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
        } 
    }


    // this is where i have access to the user role in the database, further below I 
    // assigned the the user role toa  description 
    public function logInUser($userName, $pwd){
        $req = $this->_connexion->prepare("SELECT id, userName, firstName, password, role, dob, email, phoneNumber, emergency, imagePath, address FROM user WHERE userName=? ");
        $req->bindParam(1,$userName, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
 
        if ($user && password_verify($pwd, $user['password'])){
     
            $_SESSION['userName'] = $user['userName']; 
            $_SESSION['firstName'] = $user['firstName']; 
            $_SESSION['userId'] = $user['id'];
            $_SESSION['userRole'] = $user['role'];
            $_SESSION['dob'] = $user['dob'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phoneNumber'] = $user['phoneNumber'];
            $_SESSION['emergency'] = $user['emergency'];
            $_SESSION['address'] = $user['address'];
            $_SESSION['imagePath'] = $user['imagePath'];
            $_SESSION['dbPassword'] = $user['password'];
    
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
        $req->bindParam(":userId", $this->userid, PDO::PARAM_STR);
        $req->execute();
    }

    public function updateImage($userid, $imagePath) {
        $req = $this->_connexion->prepare("UPDATE user SET imagePath = ? WHERE id = ?"); 
        $req->bindParam(1, $imagePath, PDO::PARAM_STR);
        $req->bindParam(2, $userid, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
        
    }

    public function addUser($params){
        $userName = $params['userName'];
        $firstName = $params['firstName'];
        $lastName = $params['lastName'];
        $password = $params['password'];
        $role = $params['role'];
        $email = $params['email'];
        $phoneNumber = $params['phoneNumber'];

        $dob = isset($params['dob'])? $params['dob'] : NULL;
        $address = isset($params['address']) ? $params['address'] : NULL;
        $emergency = isset($params['emergency']) ?  $params['emergency'] : NULL;


        $req = $this->_connexion->prepare("INSERT INTO user(id, firstName, lastName, userName, password, role, phoneNumber, dob, email, address, emergency, imagePath) 
        VALUES ( NULL , :firstName, :lastName, :userName, :password, :role, :phoneNumber, :dob, :email,:address, :emergency, 'default.jpg')");
        $arrayQueryExec = array(
            "userName"=> $userName,
            "firstName"=> $firstName,
            "lastName"=> $lastName,
            "password"=> password_hash($password, PASSWORD_DEFAULT), 
            "role"=> $role,
            "phoneNumber"=> $phoneNumber,
            "dob"=> $dob,
            "email"=> $email,
            "address"=> $address,
            "emergency"=> $emergency,
        );
        $req->execute($arrayQueryExec);
    }

    public function updateUser($params) {
        $userName = $params['userName'];
        $firstName = $params['firstName'];
        $lastName = $params['lastName'];
        $userId = $params['userId'];
        $role = $params['role'];
        $email = $params['email'];
        $phoneNumber = $params['phoneNumber'];

        $dob = isset($params['dob'])? $params['dob'] : NULL;
        $address = isset($params['address']) ? $params['address'] : NULL;
        $emergency = isset($params['emergency']) ?  $params['emergency'] : NULL;


        $req = $this->_connexion->prepare("UPDATE user SET firstName=:firstName, lastName=:lastName, userName=:userName, role=:role, phoneNumber=:phoneNumber, dob=:dob, email=:email, address=:address, emergency=:emergency WHERE id =:userId");
        $arrayQueryExec = array(
            "userName"=> $userName,
            "firstName"=> $firstName,
            "lastName"=> $lastName,
            "role"=> $role,
            "phoneNumber"=> $phoneNumber,
            "dob"=> $dob,
            "email"=> $email,
            "address"=> $address,
            "emergency"=> $emergency,
            "userId"=> $userId,
        );
        $req->execute($arrayQueryExec);
    }
}



