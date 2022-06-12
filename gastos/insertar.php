<?php
include("conexion.php");

session_start();
$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$idUsuario = $_SESSION['idUsuario'];

$con=conectar();

// TODO: Para insertar automáticamente el subtotal (Monto*cant)
// $ID_Zapato = $_POST['ID_Zapato'];
// $ID_Vendedor = $_POST['ID_Vendedor'];
// $ID_Cliente = $_POST['ID_Cliente'];
// $Cantidad = $_POST['Cantidad'];
// $Precio = $_POST['Precio'];
// $ins = $con -> query("INSERT INTO ventas(ID_Venta,ID_Zapato,ID_Vendedor,ID_Cliente,Fecha,Hora,Cantidad,Precio,Subtotal) VALUES('','$ID_Zapato','$ID_Vendedor','$ID_Cliente',curdate(),curtime(),'$Cantidad', '$Precio', $Cantidad*$Precio)");
// TODO


$ID_gasto=$_POST['ID_gasto'];
$Tipo_comp_idTipo_comp=$_POST['Tipo_comp_idTipo_comp'];
$Categorias_idCategorias=$_POST['Categorias_idCategorias'];
$forma_pago=$_POST['forma_pago'];
$Establecimiento=$_POST['Establecimiento'];
$IDGasto=$_POST['IDGasto'];
$producto_servicio=$_POST['producto_servicio'];
$Monto=$_POST['Monto'];
$cant=$_POST['cant'];

// 
$sql="INSERT INTO gastos VALUES('$ID_gasto', '$Tipo_comp_idTipo_comp', '$Categorias_idCategorias', '$idUsuario', '$forma_pago', '$Establecimiento', '$IDGasto', curdate(), curtime(), '$producto_servicio', '$Monto', '$cant', $cant*$Monto)";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: index.php");
    
}else {
}
?>