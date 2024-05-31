<?php
include 'config.php';

class Cliente {
    private $nombre;
    private $telefono;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function crearCliente($peluquero_id) {
        global $conn;

        // Sentencia preparada para evitar la inyección de SQL
        $stmt = $conn->prepare("INSERT INTO clientes (peluquero_id, nombre, telefono) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $peluquero_id, $this->nombre, $this->telefono);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "Error: " . $conn->error;
        }
    }
}


?>
