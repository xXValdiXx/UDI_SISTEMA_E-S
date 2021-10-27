<?php
require_once "connection_config.php";

class connection{
    private $conexion_db;
    
    static public function Conexion(){

        try{
            $conexion_db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USER, DB_PASS);
            $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            return $conexion_db;

        }catch(PDOException $e){
            print "¡Error!: " . $e->getMessage() . "<br/>";
    			die();
        }
    }
}
?>