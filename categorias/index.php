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

   if($tipo_usuario != 2) { 
        header("Location: ../principal.php");
    }



    $sql="SELECT *  FROM categorias";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Categorías</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/estilos_categoria.css">
        <!-- partículas -->
        <link rel="stylesheet" href="../scripts/particles/css/estilos.css">
        <script src="../scripts/particles/js/app_c.js"></script> 
          
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <div id="particles-js"></div>
        <div class="pb-5"></div>
        <div class="container">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Categorías</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="number" class="form-control mb-3" name="idCategoria" placeholder="ID de la categoría" required>
                                    <input type="text" class="form-control mb-3" name="Categoria" placeholder="Categoría" required>
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                <a href="../principal.php"><button class="btn btn-primary return">Regresar</button></a>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr class="center">
                                        <th>ID de categoría</th>
                                        <th>Nombre de categoría</th>
                                        <th>-</th>
                                        <th>-</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr class="center">
                                                <th><?php  echo $row['idCategoria']?></th>
                                                <th><?php  echo $row['Categoria']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['idCategoria'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['idCategoria'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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