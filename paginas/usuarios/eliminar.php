<?php
include('../../clases/baseDatos.php');
include('../../clases/usuario.php');
include('../../clases/usuarioRepositorio.php');

if (isset($_GET['id'])) {
    $baseDatos = new BaseDatos();
    $conexion = $baseDatos->conectar();

    $usuarioRepositorio = new UsuarioRepositorio($conexion);
    $usuarioRepositorio->eliminar($_GET['id']);

    $conexion->close();
}

header('location:index.php');

