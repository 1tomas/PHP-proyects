<?php

class AuthHelper{

    public function __construct(){

    }

    function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['readyLogged'])) {
            header("Location: " . BASE_URL . 'login');
            die();
        }
        
    } 
    
}