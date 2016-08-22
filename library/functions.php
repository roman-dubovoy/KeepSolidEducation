<?php
    function createController(){
        $uri_parts = explode('/', $_SERVER['REQUEST_URI']);
        if(empty($uri_parts[1])){
            return 'index';
        }
        else{
            return $uri_parts[1];
        }
    }
?>