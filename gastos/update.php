<?php

include("conexion.php");
$con=conectar();

$ID_gasto=$_POST['ID_gasto'];
$Establecimiento=$_POST['Establecimiento'];
$IDGasto=$_POST['IDGasto'];
$producto_servicio=$_POST['producto_servicio'];
$Monto=$_POST['Monto'];
$cant=$_POST['cant'];

$sql="UPDATE gastos SET  Establecimiento='$Establecimiento', IDGasto='$IDGasto', producto_servicio='$producto_servicio', Monto='$Monto', cant='$cant', Subtotal=$cant*$Monto WHERE ID_gasto='$ID_gasto'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>