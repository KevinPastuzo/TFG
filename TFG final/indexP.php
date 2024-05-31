<?php
include 'config.php';

$sql = "SELECT * FROM peluqueros";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estiloC.css">
    <meta charset="UTF-8">
    <title>Lista de Peluqueros</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
</head>
<body>
    <img src="mog_logo.png">
    <h2>Lista de Peluqueros</h2>
    <p><a href="indexClientes.php">Ver Clientes</a></p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>pass</th>
            <th>rol</th>
            <th>Acciones</th>
        </tr>
    <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['usuario']}</td>
                    <td>{$row['pass']}</td>
                    <td>{$row['rol']}</td>
                    <td>
                        <a href='editarP.php?id={$row['id']}'>Editar</a>
                        <a href='eliminarP.php?id={$row['id']}'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
    </table>
</body>
</html>
