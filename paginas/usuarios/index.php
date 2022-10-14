<?php
include('../../clases/baseDatos.php');
include('../../clases/usuario.php');
include('../../clases/usuarioRepositorio.php');

$baseDatos = new BaseDatos();
$conexion = $baseDatos->conectar();

$usuarioRepositorio = new UsuarioRepositorio($conexion);
$usuarios = $usuarioRepositorio->consultarTodos();

$conexion->close();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actividad 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script>
        function confirmarEliminacion(idUsuario, nombre, apellidos) {
            if (confirm(`¿Desea eliminar el usuario ${nombre} ${apellidos}?`)) {
                location.href = 'eliminar.php?id=' + idUsuario;
            }
        }
    </script>
</head>
<body>
    <?php include('../navegacion.php') ?>

    <div class="container">
        <div class="card">
                <div class="card-header">
                Lista de usuarios
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Identificación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td><?php echo $usuario->getIdentificacion(); ?></td>
                                    <td><?php echo $usuario->getNombre(); ?></td>
                                    <td><?php echo $usuario->getApellidos(); ?></td>
                                    <td><?php echo $usuario->getTelefono(); ?></td>
                                    <td><?php echo $usuario->getEmail(); ?></td>
                                    <td>
                                        <a href="editar.php?id=<?php echo $usuario->getIdUsuario(); ?>" class="btn btn-warning">Editar</a>
                                        <a href="#" onclick="javascript:confirmarEliminacion(<?php echo $usuario->getIdUsuario(); ?>, '<?php echo $usuario->getNombre(); ?>', '<?php echo $usuario->getApellidos(); ?>')" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>      
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>