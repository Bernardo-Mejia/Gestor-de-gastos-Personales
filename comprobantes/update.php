<?php

include("conexion.php");
$con=conectar();

$idTipo_comp=$_POST['idTipo_comp'];
$Tipo_compra=$_POST['Tipo_compra'];

$sql="UPDATE tipo_comp SET  Tipo_compra='$Tipo_compra' WHERE idTipo_comp='$idTipo_comp'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }
?>