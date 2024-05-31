<?php
include 'config.php';
include 'cliente.php';

// Verificar si el peluquero ha iniciado sesión
session_start();
if (!isset($_SESSION["idPeluquero"])) {
    // Si no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: login.php");
    exit(); // Asegurarse de que el script se detenga después de redirigir
}

// Obtener el ID del peluquero de la sesión
$idPeluquero = $_SESSION["idPeluquero"];

// Consulta para obtener los clientes asociados a este peluquero
$sql = "SELECT * FROM clientes WHERE peluquero_id = $idPeluquero";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="estiloC.css">
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
</head>
<body>
    <img src="mog_logo.png">
    <h2>Lista de Clientes</h2>
    <p><a href="añadirC.php">Nuevo Cliente</a></p>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['telefono']}</td>
                    <td>
                    <a href='indexCorte.php?cliente_id={$row['id']}'>Corte</a>
                        <a href='editarC.php?id={$row['id']}'>Editar</a>
                        <a href='eliminarC.php?id={$row['id']}'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
    </table>
</body>
</html>
