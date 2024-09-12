<?php

class Conexion {
    private $host="localhost";
    private $db="dbcliente";
    private $user="root";
    private $pwd="1234";

    public $conn;

public function Conectar(){
    $this->conn = null;
    try {
            $this->conn= new PDO("mysql:host=".$this->host."; dbname=".$this->db, $this->user, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexion Exitosa";
        } catch (PDOException $exec) {
            echo "Error en la conexion: ". $exec->getMessage();
        }
        
        return $this->conn;
}

}

?>