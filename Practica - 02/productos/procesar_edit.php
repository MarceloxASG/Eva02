<?php

include('../conexion.php');

$conexion = conectar();

$ID=$_POST['txtID'];
$NOMBRE=$_POST['txtNombre'];
$DESC=$_POST['txtDesc'];
$STOCK=$_POST['txtStock'];
$PRECIO=$_POST['txtPrecio'];

mysqli_query($conexion, "UPDATE `producto` SET `Nombre` = '$NOMBRE', `Descripcion` = '$DESC', `Stock` = '$STOCK', `PrecioVenta` = '$PRECIO' WHERE `producto`.`idProducto` = '$ID'") or die ("Error de actualización");

desconectar($conexion);

header("Location:productos.php");
?>