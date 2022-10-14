<?php 
include_once('../config/config.php');
include('reservacion.php');

$p = new reservacion();
$data = $p->getALL();

if (isset($_GET['id'])&& !empty($_GET['id'])) {
  $remove= $p->delete($_GET['id']);
  if ($remove){
    header('location: index.php' );
  }else{
    $mensaje= '<div class="alert alert-danger" role="alert"> Error al eliminar </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocumentLista reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/stylein.css"> <!-- link css -->

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-ligth bg-ligth bg-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../imagenes/Inicio/logo.jpg" alt="" width="120px" height="115px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html">Pagina FrutiDomi</a>
                    </li>
                                     
                    <li class="nav-item">
                    <a class="nav-link" href="add.php">Agregar reserva </a>
                    </li>
                </ul>
               
            </div>
        </div>
</nav>
    <div class="containe" >
        <h2 class="text-center mb=2" > Reservas</h2>
        <div clas="row">
            <?php 
                
              while($usuarios= mysqli_fetch_object($data)){
                echo "<div class='col-6'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>Nombre: $usuarios->nombres  </h5>";
                echo "<p><b>Correo:</b> $usuarios->email
                <br>
                <b> Celular: </b>  $usuarios->cel
                </p>";
                

                echo "<div class='center'> <a class='btn btn-success' href='edit.php?id=$usuarios->id' >Modificar</a> - <a class='btn btn-danger' href='index.php?id=$usuarios->id' >Eliminar</a> </div>";

                echo "</div>";
                echo "</div>";
               }
            ?>
        </div>

    </div>
</body>
</html>