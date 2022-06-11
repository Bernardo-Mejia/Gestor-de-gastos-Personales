<?php

include("conexion.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

$con=conectar();

$idIngreso=$_GET['id'];

$sql="DELETE FROM ingresos WHERE idIngreso='$idIngreso'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
