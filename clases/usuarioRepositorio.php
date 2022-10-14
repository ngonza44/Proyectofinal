<?php

class UsuarioRepositorio {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function consultar($idUsuario) {
        $sql = "SELECT id_usuario, identificacion, nombre, apellidos, telefono, email
                  FROM usuario
                 WHERE id_usuario = $idUsuario";

        $resultado = $this->conexion->query($sql);

        if ($resultado->num_rows === 0) {
            return null;
        }

        $registro = $resultado->fetch_assoc();

        $usuario = new Usuario();
        $usuario->setIdUsuario($registro['id_usuario']);
        $usuario->setIdentificacion($registro['identificacion']);
        $usuario->setNombre($registro['nombre']);
        $usuario->setApellidos($registro['apellidos']);
        $usuario->setTelefono($registro['telefono']);
        $usuario->setEmail($registro['email']);

        return $usuario;
    }

    public function consultarTodos() {
        $sql = "SELECT id_usuario, identificacion, nombre, apellidos, telefono, email
                  FROM usuario
                 ORDER BY nombre";

        $resultado = $this->conexion->query($sql, MYSQLI_USE_RESULT);

        $usuarios = array();

        while ($registro = $resultado->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->setIdUsuario($registro['id_usuario']);
            $usuario->setIdentificacion($registro['identificacion']);
            $usuario->setNombre($registro['nombre']);
            $usuario->setApellidos($registro['apellidos']);
            $usuario->setTelefono($registro['telefono']);
            $usuario->setEmail($registro['email']);

            $usuarios[] = $usuario;
        }

        $resultado->free();

        return $usuarios;
    }

    public function insertar(Usuario $usuario) {
        $sql = "INSERT INTO usuario (
                       identificacion, nombre, apellidos, telefono, email)
                VALUES('{$usuario->getIdentificacion()}', '{$usuario->getNombre()}', '{$usuario->getApellidos()}', '{$usuario->getTelefono()}', '{$usuario->getEmail()}')";

        $this->conexion->query($sql);
    }

    public function editar(Usuario $usuario) {
        $sql = "UPDATE usuario 
                   SET identificacion = '{$usuario->getIdentificacion()}',
                       nombre = '{$usuario->getNombre()}',
                       apellidos = '{$usuario->getApellidos()}',
                       telefono = '{$usuario->getTelefono()}',
                       email = '{$usuario->getEmail()}'
                 WHERE id_usuario = {$usuario->getIdUsuario()}";

        $this->conexion->query($sql);
    }

    public function eliminar($idUsuario) {
        $sql = "DELETE FROM usuario 
                 WHERE id_usuario = $idUsuario";

        $this->conexion->query($sql);
    }
}
