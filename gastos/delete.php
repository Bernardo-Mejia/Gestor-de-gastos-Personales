<?php

include("conexion.php");
session_start();
if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}

$con=conectar();

$ID_gasto=$_GET['id'];

$sql="DELETE FROM gastos WHERE ID_gasto='$ID_gasto'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>
