<?php 
require_once('./Libs/smarty-4.2.1/libs/Smarty.class.php');


class sellersProductsView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    function showSellers($sellers){
        $this->smarty->assign('sellers', $sellers);
        $this->smarty->display('./Templates/Sellers/homeSellers.tpl');
        
    }
    function showHomeSeller(){
        header("Location:".BASE_URL. 'sellersHome');
    }
     function viewSeller($seller){
        $this->smarty->assign('seller',$seller);
        $this->smarty->display('./Templates/Sellers/showOneSeller.tpl');
    }


   
}