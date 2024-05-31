<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombreU'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nombreU, email) VALUES ('$nombre', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="estiloF.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
</head>
<body>
    <h2>Crear Usuario</h2>
    <form method="post" action="">
        <label for="nombreU">Nombre:</label> 
        <input type="text" id="nombreU" name="nombreU" required><br>
        <label for="email">Email:</label> 
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="index.php">Volver a la lista</a></p>
</body>
</html>
