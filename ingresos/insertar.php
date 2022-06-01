<?php
include("conexion.php");
$con=conectar();

$idCategoria=$_POST['idCategoria'];
$Categoria=$_POST['Categoria'];


$sql="INSERT INTO categorias VALUES('$idCategoria','$Categoria')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>