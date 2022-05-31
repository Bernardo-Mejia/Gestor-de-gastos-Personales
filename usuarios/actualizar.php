<?php 
    include("conexion.php");
    session_start();
    if(!isset($_SESSION['id'])){
		header("Location: ../index.php");
	}

    $con=conectar();

    $nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];

   if($tipo_usuario != 2) { 
        header("Location: ../principal.php");
    }

    $id=$_GET['id'];

    $sql="SELECT * FROM usuarios WHERE idUsuario='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Actualizar usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./style/estilos_categoria.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="idUsuario" value="<?php echo $row['idUsuario']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="Nombre_Usuario" placeholder="Nuevo nombre de Usuario" value="<?php echo $row['Nombre_Usuario']  ?>">

                                <input type="number" class="form-control mb-3" name="Edad" placeholder="Nueva Edad" value="<?php echo $row['Edad']  ?>">

                                <input type="text" class="form-control mb-3" name="Genero" placeholder="Género" value="<?php echo $row['Genero']  ?>">

                                <input type="text" class="form-control mb-3" name="tipo_usuario" placeholder="Tipo de usuario" value="<?php echo $row['tipo_usuario']  ?>">

                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    <a href="./index.php"><button class="btn btn-primary return">Regresar</button></a>
                    
                </div>
    </body>
</html>