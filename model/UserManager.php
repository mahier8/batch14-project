<?php
require_once("Manager.php");
class UserManager extends Manager {
    public function __construct()
    {
        parent::__construct();
    }
    // public function getUsers() {
    //     $req = $this->_connexion->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y at %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY creation_date DESC LIMIT 0, 5');
    //     $users = $req->fetchAll(PDO::FETCH_ASSOC);
    //     $req->closeCursor();
    //     return $users;
    // }
    
    public function getUser() {
        $req = $this->_connexion->query('SELECT * FROM user WHERE id = 1');
        // $req->bindParam(1, $this->_user_id, PDO::PARAM_INT);
        // $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }

    // public function getUser() {
    //     $sql = 'SELECT * FROM user WHERE id = :id';
    //     $req = $this->_connexion->prepare($sql);
    //     // $req->bindParam(1, $this->_user_id, PDO::PARAM_INT);
    //     // $req->execute();
    //     $req->execute(['id' => $id]); 
    //     $user = $req->fetch(PDO::FETCH_ASSOC);
    //     $req->closeCursor();
    //     return $user;
    // }
}
