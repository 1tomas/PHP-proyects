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
        $this->smarty->assign('titulo','Register');
        $this->smarty->assign('error',$error);
        $this->smarty->display("./Templates/login/register.tpl");
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo','LOG IN');
        $this->smarty->assign('error',$error);
        $this->smarty->display("./Templates/login/login.tpl");
        
    }

   
}