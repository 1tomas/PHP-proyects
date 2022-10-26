<?php
require_once('./Libs/smarty-4.2.1/libs/Smarty.class.php');

class loginView{
    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }
    function showHomeProduct(){
        header("Location:".BASE_URL. 'home');
    }
    function showRegister($error = ""){
        $this->smarty->assign('titulo','Registrarse');
        $this->smarty->assign('error',$error);
        $this->smarty->display("./Templates/User/register.tpl");
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo','Iniciar sesión');
        $this->smarty->assign('error',$error);
        $this->smarty->display("./Templates/User/login.tpl");
        
    }

   
}