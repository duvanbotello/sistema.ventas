<?php

class index_model extends Conexion{
    public function __construct() {
        //Ejecutamos el metodos Constructor de la clase Conexion.
        parent::__construct();
    }

    function userLogin($email, $password){
        //creo la restriccion
        $where = "Email = :Email";
        //creo un parametro llamado 'Email' y le asigno lo que venga por $email
        $param = array('Email' => $email);
        //utilizo el objeto db que esta en la clase conexion y es una instancia de la clase QueryManager
        //para utilizar el metodo select1 y hacer la consulta a la base de datos
        $response = $this->db->select1("*",'usuarios',$where,$param);
        return $password;
    }
}


?>