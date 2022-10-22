<?php

require_once "./App/Model/homeSellersModel.php";
require_once "./App/View/homeSellersView.php";


class homeSellersController{
     private $model;
     private $view;

     function __construct(){
           $this-> model = new sellersProductsModel();
           $this-> view = new sellersProductsView();
     }
     
    function getSellers(){
        return $this->model-> getSellers();
    }
     function showHome(){
        $sellers = $this->model-> getSellers();
        $this->view->showSellers($sellers) ;
     }

     function createHomeSeller(){
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
        $this->model->deleteSellerFromDB($id);
        $this->view->showHomeSeller();
        
    }
    
    function getSeller($id){
        $seller = $this->model->getSeller($id);
        $this->view->viewSeller($seller);
    }

    function editSeller($id){   
        $seller = $_REQUEST['id_vendedor'];
        $name = $_REQUEST['nombre'];
        $file = $_REQUEST['legajo'];
        $this->model->updateSellerFromDB($seller, $name, $file, $id);
        $this->view->showHomeSeller();
     
    }

  
}