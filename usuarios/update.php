<?php

include("conexion.php");
$con=conectar();

$idUsuario=$_POST['idUsuario'];
$Nombre_Usuario=$_POST['Nombre_Usuario'];
$Edad=$_POST['Edad'];
$Genero=$_POST['Genero'];
$tipo_usuario=$_POST['tipo_usuario'];

$sql="UPDATE usuarios SET Nombre_Usuario='$Nombre_Usuario', Edad='$Edad', Genero='$Genero', tipo_usuario='$tipo_usuario' WHERE idUsuario='$idUsuario'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>