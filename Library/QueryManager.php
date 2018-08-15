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

    //creamos el metodo para hacer las consultas
    //pedimos como parametros las columnubas a consultas, el nombre de la tabla
    //la restriccion y los parametros de las restriciones
    function select1($attr, $table, $where, $param){
        try{
            //verificamos si el where trae datos.
            if($where == ""){
                //si el where no trae datos se hace una consulta sin restricciones.
                $query = " SELECT ".$attr." FROM ".$table;
            }else{
                //y si trae datos se hace la consulta con la restriccion
                $query = "SELECT".$attr." FROM ".$table." WHERE ".$where;
            }

            //utilizo la clase pdo para almacer el query en sth
            $sth = $this->pdo->prepare($query);
            //ejecuto el query
            $sth->execute($param);
            //guardo todos los datos de la consulta dentro de un array
            $response = $sth->fetch(PDO::FETCH_ASSOC);
            //retorno un array con el resultado
            return array("results" => $response);
        }catch(PDOExepcion $e){
            return $e->getMessage();
        }
        $pdo = null;
    }



}

?>