<?php
include("conexion.php");
$con=conectar();

$idTipo_comp=$_POST['idTipo_comp'];
$Tipo_compra=$_POST['Tipo_compra'];


$sql="INSERT INTO tipo_comp VALUES('$idTipo_comp','$Tipo_compra')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>