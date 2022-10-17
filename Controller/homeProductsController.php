<?php

require_once "./Model/homeProductsModel.php";
require_once "./View/homeProductsView.php";


class homeProductsController{
     private $model;
     private $view;

     function __construct(){
           $this-> model = new homeProductsModel();
           $this-> view = new homeProductsView();
     }
    
     function showHome(){
        $products = $this->model-> getProduct();
        $this->view->showProducts($products) ;
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

    function viewEditProduct($id){
        $this->view->editProduct($id);
    }

    function editProduct(){   

        $this->model->updateProductFromDB($_REQUEST['id_producto'], $_REQUEST['id_vendedor_fk'], $_REQUEST['tipo'] ,$_REQUEST['descripcion'], $_REQUEST['precio']);
        $this->view->showHomeProduct();
    }

  
}