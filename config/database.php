<?php

class Database{
    public $host = 'localhost'; /* SERVIDOR */
    public $user = 'root'; /* USUARIO DE PHPMYADMIN */
    public $pass = '';  /* CONTRASEÑA PHPMYADMIN */
    public $db = 'reservas'; /* NOMBRE DE MI BASE DE DATOS */
    private $conexion; /* CONEXION DE MI BD PRIVADA */

    function __construct(){
        $this->conexion = $this->connectToDatabase(); /* Asignamos la funcion de conexion */
        return $this -> conexion; /* Me activa la conexion */
    }

    function connectToDatabase(){
        $conexion= mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if(mysqli_connect_error()){ /* Si hay un error que me lo muestre */
            echo "Tenemos un error de conexion " . mysqli_connect_error();
        }
        return $conexion; /* Me activa la conexion */
    }

  

}

?>

