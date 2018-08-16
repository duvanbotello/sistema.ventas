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
        //verifico si se devolvio un arrat
        if(is_array($response)){
            //le coloco un index al array llamado results
            $response = $response['results'];
            //verifico que el password enviado desde la vista se igual al almacenado en la BD
            if(password_verify($password,$response["pass"])){
                //si es correcto retorno un array con los datos del usuario.
                $data = array(
                    "IdUsuario" => $response["idusuario"],
                    "Nombre" => $response["nombre"],
                    "Apellido" => $response["apellido"],
                    "Roles" => $response["roles"],
                    "Imagen" => $response["imagen"],
                   
                );
                return $data;
            }else{
                //de lo contrario retorno IdUsuario 0, quiere decir que los datos de session son incorrectos.
                $data = array("IdUsuario" => 0);
                return $data;
            }
        }else{

        }
        return $response;
    }
}


?>