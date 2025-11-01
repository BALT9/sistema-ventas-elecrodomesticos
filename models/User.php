<?php
require_once './config/database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conectar();
    }

    public function login($usuario, $clave)
    {
        // Convertir la clave ingresada a MD5 (igual que la que tienes guardada)
        $clave = md5($clave);

        // Cambiamos la tabla 'users' por 'usuarios'
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND clave = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
