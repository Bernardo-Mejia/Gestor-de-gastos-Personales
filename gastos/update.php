<?php

include("conexion.php");
$con=conectar();

$idIngreso=$_POST['idIngreso'];
$Ingreso=$_POST['Ingreso'];
$Fecha=$_POST['Fecha'];
$Hora=$_POST['Hora'];

$sql="UPDATE ingresos SET  Ingreso='$Ingreso', Fecha='$Fecha', Hora='$Hora'  WHERE idIngreso='$idIngreso'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>