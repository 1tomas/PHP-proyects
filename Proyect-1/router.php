<?php

require_once './App/Controller/homeProductsController.php';
require_once './App/Controller/homeSellersController.php';
require_once "./App/Controller/loginController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_REQUEST['action'])){
    $action = $_REQUEST['action'];
}
else {
    $action = 'home';
}

$params = explode('/',$action);


$homeSellersController = new homeSellersController();   
$homeProductsController = new homeProductsController(); 
$loginController = new loginController();

switch ($params[0]){
    //   ------------------------------------------------------------------------------ 
    case 'register':
        $loginController->register();
        break;
    case 'registerVerify':
        $loginController->registerVerify();
        break;
    //  ------------------------------------------------------------------------------
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'verify':
        $loginController->loginVerify();
        break;
     //   -----------------------------------------------------------------------------
    case 'home':
        $homeProductsController->showHome();
        break;
    case 'sellersHome':
        $homeSellersController->showHome();
        break;
    //   ------------------------------------------------------------------------------
    case 'createHomeProduct':
        $homeProductsController->createHomeProduct();
        break;
    case 'createHomeSeller':
        $homeSellersController->createHomeSeller();
        break;
    //   ------------------------------------------------------------------------------
    case 'deleteProduct':
        $homeProductsController->deleteProduct($params[1]);
        break;
    case 'deleteSeller':
        $homeSellersController->deleteSeller($params[1]);
        break;
     //   ------------------------------------------------------------------------------
    case 'getProduct':
        $homeProductsController->getProduct($params[1]);
        break;
    case 'getSeller':
        $homeSellersController->getSeller($params[1]);
        break;
    //   ------------------------------------------------------------------------------
    case 'editProduct':
        $homeProductsController->editProduct($params[1]);
        break;
    case 'editSeller':
        $homeSellersController->editSeller($params[1]);
        break;
    //   ------------------------------------------------------------------------------
        default:
        echo('404 pagina no encontrada');
        break;
}    