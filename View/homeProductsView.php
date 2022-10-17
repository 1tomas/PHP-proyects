<?php 
require_once('./Libs/smarty-4.2.1/libs/Smarty.class.php');


class homeProductsView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    function showProducts($products){
        $this->smarty->assign('products', $products);
        $this->smarty->display('./Templates/Product/homeProducts.tpl');
        
    }
    function showHomeProduct(){
        header("Location:".BASE_URL. 'home');
    }
     function viewProduct($producto){
        $this->smarty->assign('producto',$producto);
        $this->smarty->display('./Templates/Product/showOneProduct.tpl');
    }

    function editProduct($id){
        $this->smarty->assign('id',$id);
        $this->smarty->display('./Templates/Product/editProduct.tpl');
    }
   
}