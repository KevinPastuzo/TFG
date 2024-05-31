<?php
include 'config.php';
include 'Corte.php';

$cliente_id = intval($_GET['cliente_id']);

$sql = "SELECT * FROM cortes WHERE cliente_id = $cliente_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estiloC.css">
    <meta charset="UTF-8">
    <title>Lista de Cortes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
</head>
<body>
    <img src="mog_logo.png">
    <p><a href="añadirCorte.php?cliente_id=<?php echo $cliente_id; ?>">Nuevo Corte</a></p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    <?php
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $descripcion = $row['descripcion'];
            $imagen_binaria = $row['datos_imagen']; // Datos binarios de la imagen

            // Convertir los datos binarios de la imagen a base64
            $imagen_base64 = base64_encode($imagen_binaria);

            // Mostrar la imagen en una fila de la tabla
            echo "<tr>
                    <td>$id</td>
                    <td>$descripcion</td>
                    <td><img src='data:image/png;base64,$imagen_base64' alt='Imagen'></td>
                    <td>
                    <a href='eliminarCorte.php?id=$id&cliente_id=$cliente_id'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
    </table>
</body>
</html>
