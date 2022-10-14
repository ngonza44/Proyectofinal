<?php

include_once('../config/config.php');
include_once('..//config/database.php');

class reservacion{
    public $conexion;

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }
    function save($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $cel = $params['cel'];
        $email = $params['email'];
        $evento = $params['evento'];
        $padultos = $params['padultos'];
        $pninos = $params['pninos'];
        $fecha = $params['fecha'];
        $comentarios = $params['comentarios'];


        $insert ="INSERT INTO reservas VALUES (NULL,'$nombres','$apellidos','$cel','$email','$evento','$padultos','$pninos','$fecha','$comentarios') ";

        return mysqli_query($this->conexion, $insert);
    }

    function getALL(){
        $sql="SELECT * FROM reservas ORDER BY fecha ASC";
        return mysqli_query($this->conexion, $sql);
    }

    function getOne($id)
    {
        $sql="SELECT * FROM reservas WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
    }

    function update ($params) {
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $cel = $params['cel'];
        $email = $params['email'];
        $evento = $params['evento'];
        $padultos = $params['padultos'];
        $pninos = $params['pninos'];
        $fecha = $params['fecha'];
        $comentarios = $params['comentarios'];
        $id = $params['id'];

        $update="UPDATE reservas SET nombres ='$nombres',apellidos='$apellidos',cel='$cel',email='$email',evento='$evento',padultos='$padultos',pninos='$pninos',fecha='$fecha',comentarios='$comentarios' WHERE id= $id";

        return mysqli_query($this->conexion,$update);


    }

    function delete($id){
        $delete= "DELETE FROM reservas WHERE id = $id";
        return mysqli_query($this->conexion, $delete);

    }


}



?>