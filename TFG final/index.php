<?php
include 'config.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estiloC.css">
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <p><a href="añadir.php">Nuevo Usuario</a></p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombreU']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='editar.php?id={$row['id']}'>Editar</a>
                        <a href='eliminar.php?id={$row['id']}'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
    </table>
</body>
</html>
