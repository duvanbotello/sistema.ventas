<?php 
//creando clase en php
class Controllers 
{
    //Metodo Contructor
    public function __construct(){
        echo 'Sistema de php';
    }

    function loadClassmodels(){
        //me traigo el nombre de la clase
        $model = get_class($this).'_model';
        //la ruta del nombre de la clase.
        $path = 'Models'.$model.'.php';
        //verifico que exista ese models dentro de la ruta.
        if(file_exists($path)){

            require $path;
            //asigno una instancia a this.
            $this->model = new $model();
        }
    }
}

?>