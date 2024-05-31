<?php
include 'corte.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $descripcion = $_POST['descripcion'];
    $datos_imagen = file_get_contents($_FILES['datos_imagen']['tmp_name']); // Leer datos de la imagen
    $cliente_id = $_GET['cliente_id'];
    
    if ($_FILES['datos_imagen']['error'] === 0) { 

        $corte = new Corte($cliente_id, $descripcion, $datos_imagen);
        $resultado = $corte->crearCorte();

        if ($resultado === true) {
            header("Location: indexC.php?cliente_id=$cliente_id");
            exit; 
        } else {
            echo "Error al guardar el corte: " . $resultado;
        }
    } else {
        echo "Por favor, selecciona una imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Corte</title>
    <link rel="stylesheet" href="estiloF.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap">
</head>
<body>
    <img src="mog_system.png">
    <h2>Añadir Corte</h2>
    <form method="post" action="" enctype="multipart/form-data"> <!-- Agregar enctype para enviar archivos -->
        <label for="descripcion">Descripción:</label> 
        <input type="text" id="descripcion" name="descripcion" required><br>
        <label for="datos_imagen">Selecciona una imagen:</label><br> 
        <input type="file" id="datos_imagen" name="datos_imagen" required><br>
        <input type="submit" value="Guardar">
    </form>
    <p><a href="indexC.php">Volver a la lista</a></p>
</body>
</html>
