<?php
    include 'Peluquero.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];

        $peluquero = new Peluquero($usuario, $pass, $rol);

        $resultado = $peluquero->crearPeluquero();

        if ($resultado === true) {
            header("Location: indexP.php");
        } else {
            echo "Error al añadir peluquero: " . $resultado;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Crear Peluquero</title>
        <link rel="stylesheet" href="estiloF.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
    </head>
    <body>
        <img src="mog_system.png">
        <h2>Crear Peluquero</h2>
        <form method="post" action="">
            <label for="usuario">Usuario:</label> 
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="pass">Contraseña:</label> 
            <input type="password" id="pass" name="pass" required><br>    
            <label for="rol">Rol:</label> 
            <input type="text" id="rol" name="rol" required><br>
            <input type="submit" value="Guardar">
        </form>
        <p><a href="indexP.php">Volver a la lista</a></p>
    </body>
</html>
