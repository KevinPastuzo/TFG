<?php
    session_start();

    include 'peluquero.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];

        // Autenticar al peluquero y obtener su ID si la autenticación es exitosa
        $idPeluquero = Peluquero::autenticar($usuario, $pass);

        if ($idPeluquero !== false) {
            // Si las credenciales son correctas, iniciar sesión
            $_SESSION["usuario"] = $usuario;
            $_SESSION["idPeluquero"] = $idPeluquero;
            
            $rolPeluquero = Peluquero::obtenerRolPorId($idPeluquero);
            // Verificar el rol y redirigir según corresponda
            if ($rolPeluquero === 'admin') {
                header("Location: indexP.php"); // Redirigir al panel de administrador
            } else {
                header("Location: indexC.php"); // Redirigir al panel de control
            }
            
        } else {
            $error = "Nombre de usuario o contraseña incorrectos";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mog System</title>
        <link rel="stylesheet" href="estiloF.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
    </head>
    <body>
        <img src="mog_system.png">
        <h2>Iniciar sesión</h2>
        <form method="post" action="">
            <label for="usuario">Usuario:</label> 
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="pass">Contraseña:</label> 
            <input type="password" id="pass" name="pass" required><br>    
            <input type="submit" value="Iniciar">
        </form>
        <p><a href="añadirP.php">¿No tienes cuenta? Crea una</a></p>
    </body>
</html>
