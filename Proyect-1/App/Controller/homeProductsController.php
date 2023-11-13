<?php

require_once "./App/Model/homeProductsModel.php";
require_once "./App/View/homeProductsView.php";
require_once "./App/Controller/homeSellersController.php";
include_once './Helpers/auth.helper.php';


class homeProductsController{
     private $model;
     private $view;
     private $homeSellersController;
     private $authHelper;

     function __construct(){
           $this-> model = new homeProductsModel();
           $this-> view = new homeProductsView();
           $this-> homeSellersController = new homeSellersController();
           $this->authHelper = new AuthHelper();
     }
    
     function showHome(){
        session_start();
        $sellers = $this->homeSellersController->getSellers();
        $products = $this->model-> getProducts();
        $this->view->showProducts($products, $sellers);
     }

     function createHomeProduct(){
        $this->authHelper->checkLoggedIn();
        $sellerFk = $_REQUEST['id_vendedor_fk'];
        $type = $_REQUEST['tipo'];
        $description = $_REQUEST['descripcion'];
        $price = $_REQUEST['precio'];

        if(empty(($_REQUEST['id_vendedor_fk'])) || empty(($_REQUEST['tipo'])) || empty(($_REQUEST['descripcion'])) || empty(($_REQUEST['precio']))){
            echo ('error');
            return;
        }else{
            $this->model->insertProduct($sellerFk, $type ,$description, $price);
            $this->view->showHomeProduct();
        }
     }

     function deleteProduct($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteProductFromDB($id);
        $this->view->showHomeProduct();
        
    }
    
    function getProduct($id){
        session_start();
        $sellers = $this->homeSellersController->getSellers();
        $product = $this->model->getProduct($id);
        $this->view->viewProduct($product, $sellers);
    }


    function editProduct($id){   
        $this->authHelper->checkLoggedIn();
        $sellerFk = $_REQUEST['id_vendedor_fk'];
        $type = $_REQUEST['tipo'];
        $description = $_REQUEST['descripcion'];
        $price = $_REQUEST['precio'];

        if(empty(($_REQUEST['id_vendedor_fk'])) || empty(($_REQUEST['tipo'])) || empty(($_REQUEST['descripcion'])) || empty(($_REQUEST['precio']))){
            echo ('Debe completar todos los campos');
            return;
        }else{
        $this->model->updateProductFromDB($sellerFk, $type ,$description, $price, $id);
        $this->view->showHomeProduct();
        }
    }

  
}