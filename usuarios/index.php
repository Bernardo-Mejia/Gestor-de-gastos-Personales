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



    $sql="SELECT *  FROM usuarios";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./../assets/favicon1.png" type="image/x-icon">
        <link rel="stylesheet" href="../style/estilos_crud.css">
        <!-- partículas -->
        <link rel="stylesheet" href="../scripts/particles/css/estilos.css">
        <script src="../scripts/particles/js/app_c.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <div id="particles-js" class="animate__animated animate__fadeIn"></div>
        <div class="pb-5"></div>
        <div class="container">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Usuarios</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="idUsuario" placeholder="ID de Usuario" required>
                                    <input type="text" class="form-control mb-3" name="Nombre_Usuario" placeholder="Nombre completo" required>
                                    <input type="number" class="form-control mb-3" name="Edad" placeholder="Edad" required>
                                    <input type="text" class="form-control mb-3" name="Genero" placeholder="Género" required>
                                    <input type="text" class="form-control mb-3" name="tipo_usuario" placeholder="Tipo de usuario" required>
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                <a href="../principal.php"><button class="btn btn-primary return">Regresar</button></a>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr class="center">
                                        <th>ID de usuario</th>
                                        <th>Nombre de Usuario</th>
                                        <th>Edad</th>
                                        <th>Género</th>
                                        <th>Tipo de usuario</th>
                                        <th>-</th>
                                        <th>-</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr class="center">
                                                <th><?php  echo $row['idUsuario']?></th>
                                                <th><?php  echo $row['Nombre_Usuario']?></th>  
                                                <th><?php  echo $row['Edad']?></th>  
                                                <th><?php  echo $row['Genero']?></th>  
                                                <th><?php  echo $row['tipo_usuario']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['idUsuario'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['idUsuario'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
        <script src="../scripts/particles/js/particles.min.js"></script>
    </body>
</html>