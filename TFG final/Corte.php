<?php
include 'config.php';

class Corte {
    private $cliente_id;
    private $descripcion;
    private $datos_imagen;

    public function __construct($cliente_id, $descripcion, $datos_imagen) {
        $this->cliente_id = $cliente_id;
        $this->descripcion = $descripcion;
        $this->datos_imagen = $datos_imagen;
    }

    public function getClienteId() {
        return $this->cliente_id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDatosImagen() {
        return $this->datos_imagen;
    }

    public function setClienteId($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setDatosImagen($datos_imagen) {
        $this->datos_imagen = $datos_imagen;
    }

    public function crearCorte() {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO cortes (cliente_id, descripcion, datos_imagen) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $this->cliente_id, $this->descripcion, $this->datos_imagen);

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
