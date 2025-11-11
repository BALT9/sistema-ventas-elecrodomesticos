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
        // Encripta la contraseña
        $clave = md5($clave);

        // Cambiamos la tabla 'users' por 'usuarios'
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND clave = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
