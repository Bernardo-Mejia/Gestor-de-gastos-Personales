<?php

include("conexion.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

$con=conectar();

$idUsuario=$_GET['id'];

$sql="DELETE FROM usuarios WHERE idUsuario='$idUsuario'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
