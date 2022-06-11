<?php 
    // CATEGORÍAS
    include("conexion.php");
    session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: ../index.php");
	}
    $con=conectar();

    $nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
    $idUsuario = $_SESSION['idUsuario'];



    $sql="SELECT *  FROM ingresos where Usuario_idUsuario = $idUsuario";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>INGRESOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./style/estilos_categoria.css" rel="stylesheet">
        <!-- partículas -->
        <link rel="stylesheet" href="../scripts/particles/css/estilos.css">
        <script src="../scripts/particles/js/app_c.js"></script> 
          
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container mt-5">
            <div id="particles-js"></div>
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Gastos de <?php echo $nombre ?></h1>
                            <!-- <h2><?php echo $idUsuario ?></h2> -->
                                <form action="insertar.php" method="POST">

                                    <input type="number" class="form-control mb-3" name="idIngreso" placeholder="ID del ingreso" required>
                                    <!-- <input type="number" class="form-control mb-3" name="Usuario_idUsuario" placeholder="ID de usuario" value="<?php echo $idUsuario ?>" required> -->
                                    <input type="number" class="form-control mb-3" name="Ingreso" placeholder="Ingreso" required>
                                    <!-- <input type="text" class="form-control mb-3" name="Fecha" placeholder="Fecha" required> -->
                                    <!-- <input type="text" class="form-control mb-3" name="Hora" placeholder="Hora" required> -->
                                    <input type="text" class="form-control mb-3" name="Subtotal" placeholder="Subtotal" required>
                                    <input type="text" class="form-control mb-3" name="Saldo" placeholder="Saldo" required>
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                <a href="../principal.php"><button class="btn btn-primary return">Regresar</button></a>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr class="center">
                                        <th>ID de ingreso</th>
                                        <th>Ingreso</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Subtotal</th>
                                        <th>Saldo</th>
                                        <th>-</th>
                                        <th>-</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr class="center">
                                                <th><?php  echo $row['idIngreso']?></th>
                                                <th><?php  echo $row['Ingreso']?></th>  
                                                <th><?php  echo $row['Fecha']?></th>  
                                                <th><?php  echo $row['Hora']?></th>  
                                                <th><?php  echo $row['Subtotal']?></th>  
                                                <th><?php  echo $row['Saldo']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['idIngreso'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['idIngreso'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script> -->
        <script src="../scripts/particles/js/particles.min.js"></script>
    </body>
</html>