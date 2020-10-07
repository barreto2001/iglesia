<?php
class conexion{
    public function get_conexion(){
        $host='localhost';
        $db='iglesia';
        $user='root';
        $pass='';

        $conexion = new PDO ("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
        return $conexion;
    }
}
?>