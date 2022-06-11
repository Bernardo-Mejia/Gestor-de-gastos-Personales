<?php
include("conexion.php");

session_start();
$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$idUsuario = $_SESSION['idUsuario'];

$con=conectar();

// $idUsuario = $_SESSION['idUsuario'];

$idIngreso=$_POST['idIngreso'];
// $Usuario_idUsuario=$_POST['Usuario_idUsuario'];
$Ingreso=$_POST['Ingreso'];
// $Fecha=$_POST['Fecha'];
// $Hora=$_POST['Hora'];
$Subtotal=$_POST['Subtotal'];
$Saldo=$_POST['Saldo'];

// 
$sql="INSERT INTO ingresos VALUES('$idIngreso','$idUsuario', '$Ingreso', curdate(), curtime(), '$Subtotal', '$Saldo')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>