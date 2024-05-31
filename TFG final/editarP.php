<?php
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];

        $sql = "UPDATE peluqueros SET usuario='$usuario', pass='$pass', rol='$rol' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: indexP.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM peluqueros WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Peluquero</title>
        <link rel="stylesheet" href="estiloF.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
    </head>
    <body>
        <img src="mog_system.png">
        <h2>Editar Peluquero</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="">Usuario: </label>
            <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" required><br>
            <label for="">Contraseña: </label>
            <input type="password" name="pass" value="<?php echo $row['pass']; ?>" required><br>
            <label for="">Rol: </label>
            <input type="text" name="rol" value="<?php echo $row['rol']; ?>" required><br>
            <input type="submit" value="Guardar">
        </form>
        <p><a href="indexP.php">Volver a la lista</a></p>
    </body>
</html>
