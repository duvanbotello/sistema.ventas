<?php

//invoca todo lo que esta en config
require "config.php";

$url = isset($_GET["url"]) ? $_GET["url"]:"Index/index";

//el metodo explode funciona como el toquineizzer en java.
//separo todo lo que este en el vector url por "/"
$url = explode("/", $url);
    //verifico si el vector url contiene datos.
    $controller = "";
    $method = "";
    if(isset($url[0])){
        $controller = $url[0];
    }
    if(isset($url[1])){
        //verifica que no venga vacio la posicion del nombre del metodo que se utilziara.
        if($url[1] != ''){
            $method = $url[1];
        }
    }

    spl_autoload_register(function($class){});
?>