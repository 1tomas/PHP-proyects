<?php

require_once "./App/Model/userModel.php";
require_once "./App/View/loginView.php";


class loginController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new userModel();
        $this->view = new loginView();

    }    
    function register(){
        $this->view->showRegister();
    }     

    function registerVerify(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password =  password_hash($_POST['password'],PASSWORD_BCRYPT);
            $user = $this->model->getUsers($email);

            if(!isset($user->email)){
                $this->model->insertUser($email,$password);
                session_start();
                $_SESSION["email"] = $email;

                $this->view->showHomeProduct();
            }else{
                $this->view->showRegister("Acceso denegado ya existe esa cuenta");
            }
        }
    }
    
    function login(){
        $this->view->showLogin();
    }  
    function loginVerify(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUsers($email);
            
            if($user && password_verify($password, $user->password) ){
                session_start();
                $_SESSION["email"] == $_POST['email'];
                $_SESSION['password'] ==  $user->password;
                $_SESSION['rol'] = $user->rol;
                $this->view->showHomeProduct();  
            }else{
                $this->view->showLogin('E-mail o contraseña incorrecta');  
            }
        }
    }
    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("te deslogueaste!!");
    }    
}   
