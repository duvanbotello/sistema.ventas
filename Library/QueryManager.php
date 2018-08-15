<?php

class QueryManager{

    private $pdo;

    function __construct($USER, $PASS, $DB){
        try{
            //creamos una instancia de PDO y le enviamos los parametros de conexion
            $this->pdo = new PDO('pgsql:host=localhost;dbname='.$DB,$USER,$PASS,
                                //para mejorar la seguridad en la conexion
                                  [
                                      PDO:: ATTR_EMULATE_PREPARES => flase,
                                      PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                                  ]);
        }catch (PDOException $e){
            //Muestra un error si se presenta algun problema en la conexion.
            print "!Error!: ". $e->getMessage();
            die();
        }
    }

}

?>