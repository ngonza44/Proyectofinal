<?php
include('../../clases/baseDatos.php');
include('../../clases/usuario.php');
include('../../clases/usuarioRepositorio.php');

if (isset($_POST['insertar'])) {
    $baseDatos = new BaseDatos();
    $conexion = $baseDatos->conectar();

    $usuarioRepositorio = new UsuarioRepositorio($conexion);
    
    $usuario = new Usuario();
    $usuario->setIdentificacion($_POST['identificacion']);
    $usuario->setNombre($_POST['nombre']);
    $usuario->setApellidos($_POST['apellidos']);
    $usuario->setTelefono($_POST['telefono']);
    $usuario->setEmail($_POST['email']);

    $usuarioRepositorio->insertar($usuario);

    $conexion->close();

    header('location:index.php');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actividad 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php include('../navegacion.php') ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
            Nuevo usuario
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="identificacion" class="form-label">Identificación</label>
                        <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary" name="insertar">Guardar</button>
                </form>      
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>