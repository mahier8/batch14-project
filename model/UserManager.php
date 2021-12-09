<?php
require("Manager.php");
class UserManager extends Manager {

    public function getUser(){
        $get = $this->_connexion->query("SELECT id,firstName, lastName, userName, role, phoneNumber FROM user");
        $getUsers= $get->fetchAll(PDO::FETCH_ASSOC);
        $get->closeCursor();
        return $getUsers;
    }
}