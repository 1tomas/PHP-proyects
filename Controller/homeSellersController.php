<?php

require_once "./Model/homeSellersModel.php";
require_once "./View/homeSellersView.php";


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
        $vendedor = $_REQUEST['id_vendedor'];
        $nombre = $_REQUEST['nombre'];
        $legajo = $_REQUEST['legajo'];

        if(empty(($_REQUEST['id_vendedor'])) || empty(($_REQUEST['nombre'])) || empty(($_REQUEST['legajo']))){
            echo ('error');
            return;
        }else{
            $this->model->insertSeller($vendedor, $nombre, $legajo);
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

    function viewEditSeller($id){
        $this->view->viewEditSeller($id);
    }

    function editSeller(){   
            $this->model->updateSellerFromDB($_POST['id_vendedor'],$_POST['nombre'], $_POST['legajo']);
            $this->view->showHomeSeller();
     
    }

  
}