<?php
    class Router{
        private $routes;
        
        public function __construct(){
            $this->routes = include $_SERVER['DOCUMENT_ROOT'].'/library/configs/routes.php';
        }

        private function getURI(){
            if (!empty($_SERVER['REQUEST_URI'])){
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }

        public function run(){
            $uri = $this->getURI();

            foreach ($this->routes as $uriPattern => $path) {
                if (preg_match("~$uriPattern~", $uri)){
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                    $segments = explode('/', $internalRoute);

                    $controllerName = ucfirst(array_shift($segments)).'Controller';

                    $actionName = 'action'.ucfirst(array_shift($segments));

                    $parameters = $segments;

                    $controllerFile = $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/'.$controllerName.'.php';
                    if (file_exists($controllerFile)){
                        include_once $controllerFile;
                    }

                    $controllerObject = new $controllerName;
                    if (method_exists($controllerObject, $actionName)){
                        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                        if ($result != null){
                            break;
                        }
                    }
                }
            }
        }
            /*$controllerName = 'index';
            $actionName = 'index';

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            if (!empty($routes[1])){
                $controllerName = $routes[1];
            }

            if (!empty($routes[2])){
                $actionName = $routes[2];
            }

            $controller = ucfirst($controllerName . 'Controller');
            $action = 'action' . ucfirst($actionName);

            $path_to_controller = $_SERVER['DOCUMENT_ROOT'] . '/protected/controllers/'.$controller.'.php';
            if (file_exists($path_to_controller)){
                require $path_to_controller;
            }
            else{
                Router::ErrorPage404();
                exit();
            }

            if (class_exists($controller)){
                $controllerObject = new $controller;
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                }
                else{
                    Router::ErrorPage404();
                    exit();
                }
            }
            else{
                Router::ErrorPage404();
                exit();
            }
        }

        function ErrorPage404(){
            include $_SERVER['DOCUMENT_ROOT'] . '/protected/controllers/ErrorController.php';
        }*/
    }
?>
