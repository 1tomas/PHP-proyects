<?php
class userModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=bruma;charset=utf8', 'root', '');
    }


    function insertUser($email,$password){
        $sentencia = $this->db->prepare('INSERT INTO users(email, password) VALUES (?,?)');                                                                                                                   //PREPARO LA SENTENCIA (EL INSERT)
        $sentencia->execute(array($email,$password));
    }


    function getUsers($email){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ); 
        return $user;
    }
}