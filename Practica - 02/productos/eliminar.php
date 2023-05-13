<?php

include('../conexion.php');

$conexion = conectar();

$id=$_POST['txtID'];

mysqli_query($conexion, "DELETE FROM producto where idProducto='$id'") or die ("error al eliminar");

desconectar($conexion);

header("location:productos.php");

?>