<?php

require_once "./App/Model/homeSellersModel.php";
require_once "./App/View/homeSellersView.php";
include_once './Helpers/auth.helper.php';

class homeSellersController{
     private $model;
     private $view;
     private $authHelper;

     function __construct(){
           $this-> model = new sellersProductsModel();
           $this-> view = new sellersProductsView();
           $this->authHelper = new AuthHelper();
     }
     
    function getSellers(){
        return $this->model-> getSellers();
    }
     function showHome(){
        session_start();
        $sellers = $this->model-> getSellers();
        $this->view->showSellers($sellers) ;
     }

     function createHomeSeller(){
        $this->authHelper->checkLoggedIn();
        $seller = $_REQUEST['id_vendedor'];
        $name = $_REQUEST['nombre'];
        $file = $_REQUEST['legajo'];

        if(empty(($_REQUEST['id_vendedor'])) || empty(($_REQUEST['nombre'])) || empty(($_REQUEST['legajo']))){
            echo ('error');
            return;
        }else{
            $this->model->insertSeller($seller, $name, $file);
            $this->view->showHomeSeller();
        }
     }

     function deleteSeller($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteSellerFromDB($id);
        $this->view->showHomeSeller();
        
    }
    
    function getSeller($id){
        session_start();
        $seller = $this->model->getSeller($id);
        $this->view->viewSeller($seller);
    }

    function editSeller($id){   
        $this->authHelper->checkLoggedIn();
        $seller = $_REQUEST['id_vendedor'];
        $name = $_REQUEST['nombre'];
        $file = $_REQUEST['legajo'];
        $this->model->updateSellerFromDB($seller, $name, $file, $id);
        $this->view->showHomeSeller();
     
    }

  
}