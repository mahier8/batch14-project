<?php
class Manager {    
    protected $_connexion;
    public $_user_id;

    const DBNAME = "school";
    const HOST = "localhost";
    const LOGIN = "root";
    const PWD = "";

    protected function __construct() {
        $this->_connexion =  new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::LOGIN, self::PWD);
    }
    // //accessor
    // public function getUserId() {
    //     return $this->_user_id;
    // }
    // //mutator
    // public function setUserId($user_id) {
    //     // if the user exists;
    //     $this->_user_id = $user_id;
    // }   
}
