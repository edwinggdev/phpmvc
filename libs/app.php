<?php
require_once 'controllers/error.php';
class App{
    
    function __construct(){
        echo "ctrl App";
        $url = isset($_GET['url']) ? $_GET['url']  : null;
        //echo $url;
        $url = rtrim($url, '/');
        $url = explode('/',$url);

        // var_dump($url);
        if(empty($url[0])){
            $archivoController = 'controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/'. $url[0]. '.php';
        if(file_exists($archivoController)){
            require_once $archivoController;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            $nparam = sizeof($url);
            if($nparam> 1){
                if($nparam >2){
                    $param = [];
                    for($i=2;$i<$nparam;$i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }else{
                $controller->render();
            }

            // if(isset($url[1])){
            //     $controller->{$url[1]}();
            // }else{
            //     $controller->render();
            // }
        }else{
            $controller = new Errorr();
        }

        
    }
}
?>