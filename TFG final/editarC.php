<?php
    include 'config.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
    
        $sql = "UPDATE clientes SET nombre='$nombre', telefono='$telefono' WHERE id=$id";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: indexC.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM clientes WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Cliente</title>
        <link rel="stylesheet" href="estiloF.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
    </head>
    <body>
        <img src="mog_system.png">
        <h2>Editar Cliente</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="">Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>
            <label for="">Teléfono: </label>
            <input type="tel" name="telefono" value="<?php echo $row['telefono']; ?>" required><br>
            <input type="submit" value="Guardar">
        </form>
        <p><a href="indexC.php">Volver a la lista</a></p>
    </body>
</html>