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
    
    //me permite obtener las clases que estan siendo invocada
    //de esta forma simplificamos codigo ya que no necesitamos colocar muchos require
    spl_autoload_register(function($class){
        //verifica si existe el archivo en la carpeta. Si llega existir
        //lo une a index.php
        if(file_exists(LBS.$class.".php")){
            require LBS.$class.".php";
        }
    });    
    
    //$obj = new Controllers();
    //Obtengo los datos del controlador Error
    require 'Controllers/Error.php';
    //Instancio la clase error para traerme los metodos.
    $error = new Errors();
    //llama a los controladores
    $controllersPath = "Controllers/".$controller.'.php';

    //verifica que existan los controladores
    if(file_exists($controllersPath)){
        require $controllersPath;
        //instanciamos la clase.
        $controller = new $controller();
       
        if(isset($method)){
            //verifico que el metodo exista dentro del controlador
            if(method_exists($controller, $method)){
                //Si el metodo existe lo ejecuto.
                $controller->{$method}();
            }else{
                //si no, ejecuto el metodo error() del controlador Error
                $error -> error();
            }

        }
    }else{
        $error -> error();
    }

?>