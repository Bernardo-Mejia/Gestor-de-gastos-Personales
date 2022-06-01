<?php

include("conexion.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

$con=conectar();

$idCategoria=$_GET['id'];

$sql="DELETE FROM categorias WHERE idCategoria='$idCategoria'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
