<?php

include("conexion.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

$con=conectar();

$idTipo_comp=$_GET['id'];

$sql="DELETE FROM tipo_comp WHERE idTipo_comp='$idTipo_comp'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
