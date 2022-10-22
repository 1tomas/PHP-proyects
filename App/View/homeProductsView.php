<?php 
require_once('./Libs/smarty-4.2.1/libs/Smarty.class.php');


class homeProductsView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    function showHomeProduct(){
        header("Location:".BASE_URL. 'home');
    }

    function showProducts($products, $sellers){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('sellers', $sellers);
        $this->smarty->display('./Templates/Product/homeProducts.tpl');
    }
    
     function viewProduct($product, $sellers){
        $this->smarty->assign('product',$product);
        $this->smarty->assign('sellers', $sellers);
        $this->smarty->display('./Templates/Product/showOneProduct.tpl');
    }
   
}