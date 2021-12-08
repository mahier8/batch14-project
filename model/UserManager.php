<?php
require("Manager.php");
class UserManager extends Manager {
  
    public function __construct($article_id =0) {
        parent::__construct();
        $this->_article_id = $article_id;
    }


    public function getUser(){
        $get = $this->_connexion->query("SELECT id,firstName, lastName, userName, role, phoneNumber FROM");
        $getUsers= $get->fetchAll(PDO::FETCH_ASSOC);
        $get->closeCursor();
        return $getUsers;
    }
}