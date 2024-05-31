<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Validar y convertir a entero el ID

    // Obtener el cliente_id antes de eliminar el corte
    $sql_cliente_id = "SELECT cliente_id FROM cortes WHERE id=$id";
    $result_cliente_id = $conn->query($sql_cliente_id);
    
    if ($result_cliente_id->num_rows > 0) {
        $row = $result_cliente_id->fetch_assoc();
        $cliente_id = $row['cliente_id'];

        // Eliminar el corte
        $sql_delete = "DELETE FROM cortes WHERE id=$id";

        if ($conn->query($sql_delete) === TRUE) {
            // Redirigir al mismo cliente después de eliminar el corte
            header("Location: indexCorte.php?cliente_id=$cliente_id");
            exit;
        } else {
            echo "Error al eliminar el corte: " . $conn->error;
        }
    } else {
        echo "No se encontró el cliente asociado al corte.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
