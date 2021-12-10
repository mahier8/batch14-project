<?php
require("Manager.php");
class UserManager extends Manager {
    public function __construct($userid = 0) {
        parent::__construct();
        $this->userid = $userid;
     
    }

    public function getUser(){
        $get = $this->_connexion->query("SELECT id,firstName, lastName, userName,password, role, phoneNumber FROM user");
        $getUsers= $get->fetchAll();
        $get->closeCursor();
        return $getUsers;
    }
 
    public function delete(){
        $req = $this->_connexion->prepare("DELETE FROM user WHERE id = :userId");
        $req->bindParam("userId", $this->userid, PDO::PARAM_STR);
        $req->execute();
    }
}

