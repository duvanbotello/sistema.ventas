<?php
//esta clase es la encargada de gestionar la conexion a la base de datos.
class Conexion{
    function __construct(){
        //ejecutamos la clase QueryManager
        $this->db = new QueryManager("postgres","3156845188s1","sistem_facturacion");
    }
}

?>