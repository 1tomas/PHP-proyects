<?php 
require_once('./Libs/smarty-4.2.1/libs/Smarty.class.php');


class homeProductsView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    function showProducts($products, $sellers){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('sellers', $sellers);
        $this->smarty->display('./Templates/Product/homeProducts.tpl');
        
    }
    function showHomeProduct(){
        header("Location:".BASE_URL. 'home');
    }
     function viewProduct($producto){
        $this->smarty->assign('producto',$producto);
        $this->smarty->display('./Templates/Product/showOneProduct.tpl');
    }

    function editProduct($tipo, $descripcion, $precio){
        $this->smarty->assign('tipo',$tipo);
        $this->smarty->assign('descripcion',$descripcion);
        $this->smarty->assign('precio',$precio);
        $this->smarty->display('./Templates/Product/viewEditProduct.tpl');
    }
   
}