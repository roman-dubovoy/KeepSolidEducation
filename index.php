<?php
    /*ini_set('display_errors', 1);
    error_reporting(E_ALL);*/

    //подключаем роутер
    require_once $_SERVER['DOCUMENT_ROOT'].'/library/Router.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/library/DBWorker.php';

    //connection to DB
    session_start();

    $router = new Router();
    $router->run();



    /*
    include $_SERVER['DOCUMENT_ROOT'].'/library/functions.php';
    
    session_start();

    $controller = createController();

    switch ($controller){
        case 'index': include $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/'.$controller.'_controller.php';
                      break;
        case 'authorization': include $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/'.$controller.'_controller.php';
                              break;
        case 'registration': include $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/'.$controller.'_controller.php';
                             break;
        default: include $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/ErrorController.php';
                 break;
    }*/

    //$_SESSION['username'] = "dubovoy1997rv";
    //$_SESSION['usergroup'] = 1;

    //include $_SERVER['DOCUMENT_ROOT'].'/protected/views/layout/header.php';
    //include $_SERVER['DOCUMENT_ROOT'].'/protected/views/index_view.php';
    //include $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/IndexController.php';
?>