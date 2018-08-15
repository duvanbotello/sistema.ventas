<?php

class index_model extends Conexion{
    public function __construct() {
        //Ejecutamos el metodos Constructor de la clase Conexion.
        parent::__construct();
    }

    function userLogin($email, $password){
        return $password;
    }
}


?>