<?php
include("conexion.php");
$con=conectar();

$idUsuario=$_POST['idUsuario'];
$Nombre_Usuario=$_POST['Nombre_Usuario'];
$Edad=$_POST['Edad'];
$Genero=$_POST['Genero'];
$tipo_usuario=$_POST['tipo_usuario'];


$sql="INSERT INTO usuarios VALUES('$idUsuario','$Nombre_Usuario','$Edad','$Genero','$tipo_usuario')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>