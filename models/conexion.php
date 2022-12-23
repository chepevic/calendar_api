<?php
class Conexion{
    public static function Connect(){
        $servername = "localhost";
        $dbname="calendar";
        $username = "root";
        $password = "root";
            try {
            $conexion = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);  
            $conexion->exec("set names utf8");
            // if($conexion){
            //     echo "database connected";
            // }
            } catch(PDOException $e) {
            echo "Falló la conexión: " . $e->getMessage();
            }
            return $conexion;
    } 
}