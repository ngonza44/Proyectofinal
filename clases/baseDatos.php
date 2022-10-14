<?php
class BaseDatos {
    public function conectar($servidor = 'localhost', $usuario = 'root', $clave = '', $nombre = 'registro') {
        $conexion = new mysqli($servidor, $usuario, $clave, $nombre);

        if ($conexion->connect_errno != null) {
            echo "Error número $db->connect_errno conectando a la base de datos. $db->connect_error.";
            exit(); 
        }

        $conexion->set_charset("utf8");

        return $conexion;
    }
}