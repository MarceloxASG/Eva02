<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();


$Id=$_GET["id"];

// Consulta SQL
$sql = "SELECT * FROM producto where idProducto='$Id'";

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleEDI.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar</h1>

        <table class="table table-striped table-hover">
        
        <tbody>
            <?php

                $idProducto = $producto['idProducto'];
                $Nombre = $producto['Nombre'];
                $Descripcion = $producto['Descripcion'];
                $Stock = $producto['Stock'];
                $Precio = $producto['PrecioVenta'];
            ?>

            <?php
            // Recorremos el array con los datos de los alumnos
            
            while ($producto = mysqli_fetch_array($resultado)) {
                
                ?>

                <form action="procesar_edit.php" method="POST">
                    <input type="hidden" value="<?php echo $producto['idProducto'] ?>" name="txtID">
                    <p>Nombre: </p>
                    <input type="text" value="<?php echo $producto['Nombre'] ?>" name="txtNombre">
                    <p>Descripcion: </p>
                    <input type="text" value="<?php echo $producto['Descripcion'] ?>" name="txtDesc">
                    <p>Stock: </p>
                    <input style="width: 100%; margin-bottom: 20px; padding: 10px; font-size: 18px; border-radius: 5px; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" type="int" value="<?php echo $producto['Stock'] ?>" name="txtStock">
                    <p>Precio: </p>
                    <input style="width: 100%; margin-bottom: 20px; padding: 10px; font-size: 18px; border-radius: 5px; border: none; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" type="decimal" value="<?php echo $producto['PrecioVenta'] ?>" name="txtPrecio">
                    <p></p>
               
                <?php
            }

                ?>
    <input type="submit" value="ACTUALIZAR">
    </form>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>