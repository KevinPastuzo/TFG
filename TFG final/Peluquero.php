<?php
include 'config.php';

class Peluquero {
    private $usuario;
    private $pass;
    private $rol;

    public function __construct($usuario, $pass, $rol) {
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function crearPeluquero() {
        global $conn;
    
        // Sentencia preparada para evitar la inyección de SQL
        $stmt = $conn->prepare("INSERT INTO peluqueros (usuario, pass, rol) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->usuario, $this->pass, $this->rol);
    
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return "Error: " . $conn->error;
        }
    }

    public static function autenticar($usuario, $pass) {
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM peluqueros WHERE usuario = ? AND pass = ?");
        $stmt->bind_param("ss", $usuario, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        
    
        if ($result->num_rows == 1) {
            // Si se encuentra un peluquero con el usuario y contraseña proporcionados, la autenticación es exitosa
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $stmt->close();
            return $id;
        }
    
        return false;
    } 
     
    public static function obtenerRolPorId($id) {
        global $conn;
    
        $stmt = $conn->prepare("SELECT rol FROM peluqueros WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $rol = $row['rol'];
            $stmt->close();
            return $rol;
        }
    
        return false;
    }
    
}
?>
