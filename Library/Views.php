<?php

class  Views{
    //funcion para renderizar nuestras vistas
    //pedimos como parametro el controlador y la vista
    function render($controller, $view){

        //optemos clase de nuestro controlador y la almacenamos dentro de $controllers
        $controllers = get_class($controller);
        
        //optenemos las vistas del head atraves de la constantes de config
        require VIEWS.DFT."head.html";

        require VIEWS.$controllers.'/'.$view.'.html';

        require VIEWS.DFT."footer.html";
    }
}


?>