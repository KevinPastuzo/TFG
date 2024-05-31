<?php
    include 'Cliente.php';
    session_start();

    if (!isset($_SESSION["idPeluquero"])) {
        header("Location: login.php");
        exit();
    }

    $idPeluquero = $_SESSION["idPeluquero"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
    
        $cliente = new Cliente();
        $cliente->setNombre($nombre);
        $cliente->setTelefono($telefono);

        $resultado = $cliente->crearCliente($idPeluquero);
    
        if ($resultado === true) {
            header("Location: indexC.php");
        } else {
            echo "Error al añadir cliente: " . $resultado;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Crear Cliente</title>
        <link rel="stylesheet" href="estiloF.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
    </head>
    <body>
        <img src="mog_system.png">
        <h2>Crear Cliente</h2>
        <form method="post" action="">
            <label for="nombre">Nombre:</label> 
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="telefono">Telefono:</label> 
            <input type="tel" id="telefono" name="telefono" required><br>
            <input type="submit" value="Guardar">
        </form>
        <p><a href="indexC.php">Volver a la lista</a></p>
    </body>
</html>