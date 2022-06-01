<?php

include("conexion.php");
$con=conectar();

$idCategoria=$_POST['idCategoria'];
$Categoria=$_POST['Categoria'];

$sql="UPDATE categorias SET  Categoria='$Categoria' WHERE idCategoria='$idCategoria'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>