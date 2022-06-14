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



    $sql="SELECT * from gastos where Usuario_idUsuario = $idUsuario";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gastos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="./../assets/favicon1.png" type="image/x-icon">
        <link rel="stylesheet" href="../style/estilos_crud.css">
        <!-- partículas -->
        <link rel="stylesheet" href="../scripts/particles/css/estilos.css">
        <script src="../scripts/particles/js/app_c.js"></script> 
          
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
    </head>
    <body>
        <div id="particles-js" class="animate__animated animate__fadeIn"></div>
        <div class="pb-5"></div>
        <div class="container">
                    <div class="row"> 
                        
                        <div class="col-md-5">
                            <h1>Gastos de <?php echo $nombre ?></h1>
                            <!-- <h2><?php echo $idUsuario ?></h2> -->
                                <form action="insertar.php" method="POST">
                                    <input type="number" class="form-control mb-3" name="ID_gasto" placeholder="ID del gasto" required>
                                    <label for="select_comp">Comprobante</label>
                                    <select name="Tipo_comp_idTipo_comp" class="form-control" id="select_comp">
                                        <option selected="selected" disabled>Elija un Tipo de comprobante</option>
                                        <option value="1">1.- Ticket</option>
                                        <option value="2">2.- Boleto</option>
                                        <option value="3">3.- Nota de remisión</option>
                                        <option value="4">4.- Factura</option>
                                        <option value="5">5.- Recibo</option>
                                        <option value="6">6.- N/E</option>
                                    </select>
                                    <!-- <br> -->
                                    <label for="select_cat">Categoría</label>
                                    <select name="Categorias_idCategorias" class="form-control" id="select_cat">
                                        <option selected="selected" disabled>Elija una Categoría</option>
                                        <option value="1">1.- Alimentos</option>
                                        <option value="2">2.- Bebidas</option>
                                        <option value="3">3.- Vestido</option>
                                        <option value="4">4.- Transporte</option>
                                        <option value="5">5.- Entretenimiento/diversión</option>
                                        <option value="6">6.- Telefonía celular</option>
                                        <option value="7">7.- Educación</option>
                                        <option value="8">8.- Salud</option>
                                        <option value="9">9.- Electrónico</option>
                                        <option value="10">10.- Cuidado personal</option>
                                        <option value="11">11.- Otro</option>
                                    </select>
                                    <!-- <br> -->
                                    <label for="select_cat">Forma de pago</label>
                                    <select name="forma_pago" id="select" class="form-control">
                                        <option selected="selected" disabled>Elije una forma de pago</option>
                                        <option value="1">1.- Efectivo</option>
                                        <option value="2">2.- Tarjeta de crédito</option>
                                        <option value="3">3.- Tarjeta de débito</option>
                                    </select>
                                    <!-- <br> -->
                                    <br>
                                    <input type="text" class="form-control mb-3" name="Establecimiento" placeholder="Nombre del Establecimiento" required>
                                    <input type="number" class="form-control mb-3" name="IDGasto" placeholder="ID del gasto" required>
                                    <input type="text" class="form-control mb-3" name="producto_servicio" placeholder="Producto o servicio" required>
                                    <input type="text" class="form-control mb-3" name="Monto" placeholder="Monto" required>
                                    <input type="text" class="form-control mb-3" name="cant" placeholder="Cantidad" required>
                                    <!-- <input type="text" class="form-control mb-3" name="Subtotal" placeholder="Subtotal" required> -->
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                <a href="../principal.php"><button class="btn btn-primary return">Regresar</button></a>
                        </div>

                        <div class="">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr class="center">
                                        <th>ID</th>
                                        <th>Tipo de comprobante</th>
                                        <th>Categoría</th>
                                        <th>Forma de pago</th>
                                        <th>Establecimiento</th>
                                        <th>ID del Gasto</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Producto/servicio</th>
                                        <th>Monto</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>-</th>
                                        <th>-</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr class="center">
                                                <th><?php  echo $row['ID_gasto']?></th>
                                                <th><?php  echo $row['Tipo_comp_idTipo_comp']?></th>
                                                <th><?php  echo $row['Categorias_idCategorias']?></th>
                                                <th><?php  echo $row['Forma_Pago_idForma_Pago']?></th>
                                                <th><?php  echo $row['Establecimiento']?></th>
                                                <th><?php  echo $row['IDGasto']?></th>
                                                <th><?php  echo $row['Fecha']?></th>
                                                <th><?php  echo $row['Hora']?></th>
                                                <th><?php  echo $row['producto_servicio']?></th>
                                                <th><?php  echo $row['Monto']?></th>
                                                <th><?php  echo $row['cant']?></th>
                                                <th><?php  echo $row['Subtotal']?></th> 
                                                <th><a href="actualizar.php?id=<?php echo $row['ID_gasto'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['ID_gasto'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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