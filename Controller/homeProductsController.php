<?php

require_once "./Model/homeProductsModel.php";
require_once "./View/homeProductsView.php";
require_once "./Controller/homeSellersController.php";


class homeProductsController{
     private $model;
     private $view;
     private $homeSellersController;

     function __construct(){
           $this-> model = new homeProductsModel();
           $this-> view = new homeProductsView();
           $this-> homeSellersController = new homeSellersController();
     }
    
     function showHome(){
        $sellers = $this->homeSellersController->getSellers();
        $products = $this->model-> getProduct();
        $this->view->showProducts($products, $sellers);
     }

     function createHomeProduct(){
        $vendedor = $_REQUEST['id_vendedor_fk'];
        $tipo = $_REQUEST['tipo'];
        $descripcion = $_REQUEST['descripcion'];
        $precio = $_REQUEST['precio'];

        if(empty(($_REQUEST['id_vendedor_fk'])) || empty(($_REQUEST['tipo'])) || empty(($_REQUEST['descripcion'])) || empty(($_REQUEST['precio']))){
            echo ('error');
            return;
        }else{
            $this->model->insertProduct($vendedor, $tipo ,$descripcion, $precio);
            $this->view->showHomeProduct();
        }
     }

     function deleteProduct($id){
        $this->model->deleteProductFromDB($id);
        $this->view->showHomeProduct();
        
    }
    
    function getProduct($id){
        $producto = $this->model->getProducts($id);
        $this->view->viewProduct($producto);
    }

    function viewEditProduct($tipo , $descripcion, $precio){
        $this->view->editProduct($tipo, $descripcion, $precio);
    }

    function editProduct(){   
   
        $this->model->updateProductFromDB($_REQUEST['tipo'] ,$_REQUEST['descripcion'], $_REQUEST['precio']);
        $this->view->showHomeProduct();
    }

  
}